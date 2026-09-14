<x-layout titre="Les Catégories">

    <!-- Styles CSS spécifiques à cette page -->
    <style>
        .container {
            display: flex;
            gap: 40px;
            margin-top: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        /* Panneau du formulaire */
        .form-panel {
            flex: 1;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            height: fit-content;
        }

        .form-title {
            font-size: 1.2em;
            color: #1e293b;
            display: block;
            margin-bottom: 20px;
            font-weight: 700;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.95em;
        }

        .form-input {
            width: 100%;
            padding: 10px 12px;
            margin-top: 8px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-size: 0.95em;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .btn-submit {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            font-size: 1em;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-submit:hover {
            background-color: #059669;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85em;
            display: block;
            margin-top: 6px;
            font-weight: 500;
        }

        /* Panneau de la liste */
        .list-panel {
            flex: 1.2;
        }

        .list-title {
            font-size: 1.5em;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .category-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .category-item {
            padding: 14px 18px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            margin-bottom: 10px;
            font-weight: 600;
            color: #334155;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .category-item:hover {
            border-color: #cbd5e1;
            transform: translateX(4px);
            background-color: #f8fafc;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .category-icon {
            margin-right: 12px;
            color: #64748b;
        }

        .empty-message {
            color: #64748b;
            font-style: italic;
            padding: 20px;
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
            text-align: center;
        }
    </style>

    <div class="container">
        <!-- Formulaire d'ajout d'une catégorie -->
        <div class="form-panel">
            <span class="form-title">Ajouter une nouvelle catégorie</span>

            <form action="{{ route('cat.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nom de la Catégorie :</label>
                    <input type="text" name="nom" class="form-input" value="{{ old('nom') }}" placeholder="Ex: Ordinateur portable" required>
                    @error('nom')
                        <span class="error-message">Veuillez renvoyer un nom de catégorie valide.</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn-submit">
                    Ajouter la catégorie
                </button>
            </form>
        </div>

        <!-- Liste des catégories existantes -->
        <div class="list-panel">
            <h2 class="list-title">Liste des catégories</h2>
            <ul class="category-list">
                @forelse($categories as $category)
                    <li class="category-item">
                        <span class="category-icon">📁</span>
                        <span>{{ $category->nom }}</span>
                    </li>
                @empty
                    <li class="empty-message">Aucune catégorie enregistrée pour le moment.</li>
                @endforelse
            </ul>
        </div>
    </div>

</x-layout>