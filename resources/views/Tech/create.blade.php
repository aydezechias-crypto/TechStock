<x-layout titre="Nouvel équipement">

    <!-- Styles CSS spécifiques à la création -->
    <style>
        .form-container {
            max-width: 650px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .form-title {
            font-size: 1.6em;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 700;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 12px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.95em;
            display: block;
            margin-bottom: 8px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-size: 0.95em;
            background-color: #fff;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Container des catégories */
        .categories-grid {
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            margin-top: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px 20px;
        }

        .checkbox-label {
            display: inline-flex;
            align-items: center;
            font-size: 0.95em;
            color: #334155;
            cursor: pointer;
            font-weight: 500;
        }

        .checkbox-input {
            margin-right: 8px;
            cursor: pointer;
            width: 16px;
            height: 16px;
        }

        .btn-submit {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            font-size: 1.05em;
            margin-top: 15px;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-submit:hover {
            background-color: #2563eb;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }
    </style>

    <div class="form-container">
        <h1 class="form-title">Écrire un nouvel équipement</h1>

        <form action="{{ route('dev.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-input" placeholder="Ex: Dell Latitude 5420" required>
            </div>

            <div class="form-group">
                <label class="form-label">Marque :</label>
                <input type="text" name="marque" class="form-input" placeholder="Ex: Dell">
            </div>

            <div class="form-group">
                <label class="form-label">Numéro de série :</label>
                <input type="text" name="numero_serie" class="form-input" placeholder="Ex: SN-89237492" required>
            </div>

            <div class="form-group">
                <label for="etat" class="form-label">État :</label>
                <select name="etat" id="etat" class="form-select">
                    <option value="">-- Choisir un état --</option>
                    <option value="Neuf">Neuf</option>
                    <option value="Bon état">Bon état</option>
                    <option value="En panne">En panne</option>
                    <option value="En réparation">En réparation</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Date d'achat :</label>
                <input type="date" name="dateA" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Description :</label>
                <textarea name="description" class="form-textarea" placeholder="Détails supplémentaires sur le matériel..."></textarea>
            </div>

            <div class="form-group">
                <label for="room_id" class="form-label">Attribuer à une salle :</label>
                <select name="room_id" id="room_id" class="form-select" required>
                    <option value="">-- Choisir une salle existante --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- SECTION STYLISÉE POUR LES CATÉGORIES -->
            <div class="form-group">
                <label class="form-label">Catégories :</label>
                <div class="categories-grid">
                    @foreach($categories as $category)
                        <label class="checkbox-label">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="checkbox-input">
                            {{ $category->nom }}
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn-submit">Enregistrer l'équipement</button>
        </form>
    </div>

</x-layout>