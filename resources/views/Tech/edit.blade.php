<x-layout titre="Modifier l'équipement">

    <!-- Styles CSS identiques à la page de détails -->
    <style>
        .edit-container {
            max-width: 900px;
            margin: 30px auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #334155;
            padding: 0 20px;
        }

        /* Barre d'actions supérieure */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .back-link {
            text-decoration: none;
            color: #3b82f6;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #1d4ed8;
        }

        /* Titre principal */
        .page-title {
            font-size: 1.8em;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 700;
        }

        /* Carte de formulaire */
        .form-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.9em;
            display: block;
            margin-bottom: 8px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 11px 14px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            box-sizing: border-box;
            font-size: 0.95em;
            background-color: #ffffff;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* Grille des cases à cocher pour catégories */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 10px;
            background-color: #f8fafc;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
        }

        .category-option {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9em;
            color: #334155;
            cursor: pointer;
        }

        .category-option input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #3b82f6;
            cursor: pointer;
        }

        /* Zone des boutons */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 10px;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
        }

        .btn-cancel {
            text-decoration: none;
            background-color: #f1f5f9;
            color: #475569;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95em;
            transition: background-color 0.2s ease;
        }

        .btn-cancel:hover {
            background-color: #e2e8f0;
        }

        .btn-submit {
            background-color: #f59e0b;
            color: #ffffff;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 0.95em;
            box-shadow: 0 2px 4px rgba(245, 158, 11, 0.2);
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-submit:hover {
            background-color: #d97706;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85em;
            display: block;
            margin-top: 5px;
            font-weight: 500;
        }
    </style>

    <div class="edit-container">
        <!-- Barre d'actions supérieure -->
        <div class="action-bar">
            <a href="{{ route('device.show', $device->id) }}" class="back-link">
                ← Annuler et revenir aux détails
            </a>
        </div>

        <h1 class="page-title">Modifier l'équipement : {{ $device->nom }}</h1>

        <div class="form-card">
            <form action="{{ route('dev.update', $device->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    
                    <!-- Nom de l'équipement -->
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom de l'équipement *</label>
                        <input type="text" name="nom" id="nom" class="form-input" value="{{ old('nom', $device->nom) }}" required>
                        @error('nom')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Marque -->
                    <div class="form-group">
                        <label for="marque" class="form-label">Marque</label>
                        <input type="text" name="marque" id="marque" class="form-input" value="{{ old('marque', $device->marque) }}">
                        @error('marque')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Numéro de série -->
                    <div class="form-group">
                        <label for="numero_serie" class="form-label">Numéro de série *</label>
                        <input type="text" name="numero_serie" id="numero_serie" class="form-input" value="{{ old('numero_serie', $device->numero_serie) }}" required>
                        @error('numero_serie')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- État actuel -->
                    <div class="form-group">
                        <label for="etat" class="form-label">État actuel *</label>
                        <select name="etat" id="etat" class="form-select" required>
                            @php $currentEtat = old('etat', $device->etat); @endphp
                            <option value="Neuf" {{ $currentEtat == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                            <option value="Bon état" {{ $currentEtat == 'Bon état' ? 'selected' : '' }}>Bon état</option>
                            <option value="En panne" {{ $currentEtat == 'En panne' ? 'selected' : '' }}>En panne</option>
                            <option value="En réparation" {{ $currentEtat == 'En réparation' ? 'selected' : '' }}>En réparation</option>
                        </select>
                        @error('etat')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <!-- Description -->
                    <div class="form-group full-width">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-textarea" placeholder="Détails complémentaires sur l'équipement...">{{ old('description', $device->description) }}</textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Actions du formulaire -->
                <div class="form-actions">
                    <a href="{{ route('device.show', $device->id) }}" class="btn-cancel">Annuler</a>
                    <button type="submit" class="btn-submit">
                        Mettre à jour l'équipement
                    </button>
                </div>

            </form>
        </div>
    </div>

</x-layout>