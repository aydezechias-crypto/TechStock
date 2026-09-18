<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Device;
use App\Models\Intervention;
use App\Models\Room;

class TechController extends Controller
{
    public function create() {
        $rooms = Room::all(); 
        $categories = Category::all();
        return view('Tech.create', compact('rooms', 'categories'));
    }

    // Les equipements (affichage)
    public function index() {
        $devices = Device::all();
        $interventions = Intervention::all();
        $rooms = Room::all();
        return view('Tech.equipement', compact('devices', 'interventions', 'rooms'));
    }

    // Les différentes catégories
    public function category() {
        $categories = Category::all();
        return view('Tech.categorie', compact('categories'));
    }

    // Les différentes salles
    public function room() {
        $rooms = Room::all();
        return view('Tech.salle', compact('rooms'));
    }

    public function store(Request $request) {
        $request->validate([
            'numero_serie' => 'required|unique:devices,numero_serie',
            'nom'          => 'required|min:3|max:255',
            'categories'   => 'nullable|array',
        ]);

        $device = Device::create([
            'nom'          => $request->nom,
            'marque'       => $request->marque,
            'numero_serie' => $request->numero_serie,
            'etat'         => $request->etat,
            'date_achat'   => $request->date_achat ?? $request->dateA,
            'description'  => $request->description,
            'room_id'      => $request->room_id,
        ]);

        if ($request->has('categories')) {
            $device->categories()->attach($request->categories);
        }

        return redirect()->back()->with('success', 'Appareil enregistré avec succès !');
    }

    public function edit($id) {
        $device = Device::findOrFail($id);
        $rooms = Room::all();
        $categories = Category::all();
        
        return view('Tech.edit', compact('device', 'rooms', 'categories'));
    }

    public function update(Request $request, $id) {
        $device = Device::findOrFail($id);

        $request->validate([
            'numero_serie' => 'required|unique:devices,numero_serie,' . $device->id,
            'nom'          => 'required|min:3|max:255',
            'categories'   => 'nullable|array',
        ]);

        $device->update([
            'nom' => $request->nom,
            'marque' => $request->marque,
            'numero_serie' => $request->numero_serie,
            'etat' => $request->etat,
            // 'date_achat' => $request->date_achat,
            'description' => $request->description,
            // 'room_id' => $request->room_id
        ]);

        // Mise à jour de la table pivot Many-to-Many
        $device->categories()->sync($request->categories ?? []);

        // Assure-toi que 'dev.show' ou 'device.show' concorde avec ton web.php
        return redirect()->route('device.show', $device->id)->with('success', 'Équipement mis à jour avec succès !');
    }

    public function storeS(Request $request) {
            $request->validate([ 
            'batiment' => 'required|string|max:255',
            'nom'      => [
                'required',
                'min:3',
                'max:255',
                // Vérifie que le couple (nom + batiment) est unique dans la table rooms
                Rule::unique('rooms')->where(function ($query) use ($request) {
                    return $query->where('batiment', $request->batiment);
                }),
            ],
            'capacite' => 'required|integer|min:1',
        ], [
            'nom.unique' => 'La salle "'.$request->nom.'" existe déjà dans le bâtiment "'.$request->batiment.'" !',
        ]);

        Room::create([
            'nom'      => $request->nom,
            'batiment' => $request->batiment,
            'capacite' => $request->capacite,
        ]);

        return redirect()->back()->with('success', 'Salle enregistrée avec succès !');
    }

    public function storeC(Request $request) {
        $request->merge([
            'nom' => mb_strtoupper($request->nom, 'UTF-8')
        ]);

        $donneesValidees = $request->validate([
            'nom' => 'required|min:3|max:255|unique:categories,nom',
        ]);

        Category::create($donneesValidees);

        return redirect()->back()->with('success', 'Catégorie enregistrée avec succès !');
    }

    public function showDevice($id) {
        $device = Device::with(['interventions', 'categories'])->findOrFail($id);
        return view('Tech.detail', compact('device'));
    }

    public function storeIntervention(Request $request, $id) {
        $request->validate([
            'date'        => 'required|date',
            'type'        => 'required|string|max:255',
            'commentaire' => 'required|string|min:5',
        ]);

        $intervention = new Intervention();
        $intervention->date = $request->date;
        $intervention->type = $request->type;
        $intervention->commentaire = $request->commentaire;
        $intervention->device_id = $id; 
        $intervention->save();

        return redirect()->back()->with('success', 'Intervention ajoutée avec succès !');
    }

    public function showRoom($id) {
        $room = Room::with('devices')->findOrFail($id);
        return view('Tech.show_salle', compact('room'));
    }

        // Supprimer un équipement
    public function destroyDevice($id) {
        $device = Device::findOrFail($id);
            // 1. Détacher les catégories (Many-to-Many)
        $device->categories()->detach();

        // 2. Supprimer les interventions associées (One-to-Many)
        $device->interventions()->delete();

        $device->delete();

        return redirect()->route('dev.index')->with('success', 'Équipement supprimé avec succès !');
    }

    // Supprimer une catégorie
    public function destroyCategory($id) {
        $category = Category::findOrFail($id);
        $category->devices()->detach(); // Détache la catégorie des équipements associés
        $category->delete();

        return redirect()->back()->with('success', 'Catégorie supprimée avec succès !');
    }

    // Supprimer une salle
    public function destroyRoom($id) {
        $room = Room::findOrFail($id);
        $room->devices()->update(['room_id' => null]); 
        $room->delete();

        return redirect()->back()->with('success', 'Salle supprimée avec succès !');
    }
}