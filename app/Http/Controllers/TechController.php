<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryDevice;
use App\Models\Device;
use App\Models\Intervention;
use App\Models\Room;

class TechController extends Controller
{
    public function create(){
        $rooms = Room::all(); 
        $categories = Category::all(); // On récupère les catégories pour la création
        return view('Tech.create', compact('rooms', 'categories'));
    }

    // Les equipements (affichage)
    public function index () {
        $devices = Device::all();
        $interventions = Intervention::all();
        $rooms = Room::all();
        return view('Tech.equipement', compact('devices', 'interventions', 'rooms'));
    }

    // Les différentes catégories (affichage + listing sur la même page)
    public function category () {
        $categories = Category::all(); // On récupère toutes les catégories existantes
        return view('Tech.categorie', compact('categories'));
    }

    // Les différentes salles
    public function room () {
        $rooms = Room::all();
        return view('Tech.salle', compact('rooms'));
    }

    public function store(Request $request){
        $request->validate([
            'numero_serie'=>'required|unique:devices,numero_serie',
            'nom'=> 'required|min:3|max:255',
            'categories' => 'nullable|array', // Validation des catégories cochées
        ]);

        $device = Device::create([
            'nom' => $request->nom,
            'marque' => $request->marque,
            'numero_serie' => $request->numero_serie,
            'etat' => $request->etat,
            'date_achat' => $request->dateA,
            'description' => $request->description,
            'room_id' => $request->room_id,
        ]);

        // On associe les catégories cochées à l'équipement créé (relation Many-to-Many)
        if ($request->has('categories')) {
            $device->categories()->attach($request->categories);
        }

        return redirect()->back()->with('success','Appareil enregistré avec succès !');
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
            'nom' => 'required|min:3|max:255',
            'categories' => 'nullable|array',
        ]);

        $device->update([
            'nom' => $request->nom,
            'marque' => $request->marque,
            'numero_serie' => $request->numero_serie,
            'etat' => $request->etat,
            'date_achat' => $request->dateA,
            'description' => $request->description,
            'room_id' => $request->room_id,
        ]);

        // On synchronise les catégories pour mettre à jour la table pivot (Many-to-Many)
        // sync() va détacher les anciennes et attacher les nouvelles
        $device->categories()->sync($request->categories ?? []);

        return redirect()->route('device.show', $device->id)->with('success', 'Équipement mis à jour avec succès !');
    }

    public function storeS( Request $request){
        Room::create([
            'nom' => $request->nom,
            'batiment' => $request->batiment,
            'capacite' => $request->capacite,
        ]);
         return redirect()->back()->with('success','Salle enregistré avec succès !');
    }

    public function storeC (Request $request){
        $donneesValidees = $request->validate([
            'nom' => 'required|min:3|max:255',
        ]);
        Category::create($donneesValidees);
        return redirect()->back()->with('success','Categorie enregistré avec succès !');
    }

    public function showDevice($id)
    {
        // On charge l'appareil avec ses interventions ET ses catégories
        $device = Device::with(['interventions', 'categories'])->findOrFail($id);

        return view('Tech.detail', compact('device'));
    }

    public function storeIntervention(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|string|max:255',
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

    // Afficher les détails d'une salle spécifique avec ses équipements
    public function showRoom($id) {
        // On charge la salle avec ses équipements (relation 'devices')
        $room = Room::with('devices')->findOrFail($id);
        return view('Tech.show_salle', compact('room'));
    }
}