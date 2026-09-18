<x-layout titre="Détails de l'équipement">

    <!-- Styles CSS spécifiques à la fiche de détails -->
    <style>
        .detail-container {
            max-width: 1100px;
            margin: 30px auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #334155;
        }

        /* Barre d'actions supérieure */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .back-link {
            text-decoration: none;
            color: #3b82f6;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #1d4ed8;
        }

        .btn-edit {
            text-decoration: none;
            background-color: #f59e0b;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.95em;
            box-shadow: 0 2px 4px rgba(245, 158, 11, 0.2);
            transition: background-color 0.2s ease, transform 0.1s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-edit:hover {
            background-color: #d97706;
        }

        .btn-edit:active {
            transform: scale(0.98);
        }

        /* Styles pour le bouton de suppression */
        .btn-delete-form {
            display: inline-block;
            margin: 0;
        }

        .btn-danger {
            background-color: #ef4444;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.95em;
            font-family: inherit;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(239, 68, 68, 0.2);
            transition: background-color 0.2s ease, transform 0.1s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-danger:hover {
            background-color: #dc2626;
            box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3);
        }

        .btn-danger:active {
            transform: scale(0.98);
        }

        /* Titre de l'équipement */
        .device-title {
            font-size: 1.8em;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 700;
        }

        /* Fiche technique de l'appareil */
        .spec-card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .spec-group {
            display: flex;
            flex-direction: column;
        }

        .spec-label {
            font-size: 0.85em;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            margin-bottom: 4px;
            font-weight: 600;
        }

        .spec-value {
            font-size: 1.05em;
            font-weight: 500;
            color: #1e293b;
        }

        .spec-code {
            background-color: #f1f5f9;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.95em;
            color: #0f172a;
        }

        /* Badge d'état dynamique */
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            text-align: center;
            width: fit-content;
        }
        .status-neuf { background-color: #dcfce7; color: #15803d; }
        .status-bon { background-color: #dbeafe; color: #1d4ed8; }
        .status-panne { background-color: #fee2e2; color: #b91c1c; }
        .status-reparation { background-color: #fef3c7; color: #b45309; }

        .spec-description {
            grid-column: 1 / -1;
            border-top: 1px solid #f1f5f9;
            padding-top: 15px;
            margin-top: 5px;
        }

        /* Zone d'affichage des catégories */
        .categories-list {
            margin-top: 5px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .category-badge {
            background-color: #f1f5f9;
            color: #475569;
            font-size: 0.8em;
            padding: 3px 10px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-weight: 500;
        }

        /* Message flash de succès */
        .success-alert {
            padding: 12px 16px;
            background-color: #ecfdf5;
            color: #065f46;
            border-radius: 6px;
            margin-bottom: 25px;
            border: 1px solid #a7f3d0;
            font-weight: 500;
            font-size: 0.95em;
        }

        /* Layout à deux colonnes */
        .grid-layout {
            display: flex;
            gap: 40px;
            margin-top: 25px;
        }

        .column-left {
            flex: 1.2;
        }

        .column-right {
            flex: 0.8;
        }

        /* Titres des sections */
        .section-title {
            font-size: 1.3em;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 700;
        }

        /* Historique des interventions */
        .intervention-list {
            padding-left: 0;
            list-style: none;
            margin: 0;
        }

        .intervention-item {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #ffffff;
            border-left: 4px solid #3b82f6;
            border-radius: 0 8px 8px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            border-top: 1px solid #f1f5f9;
            border-right: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .intervention-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.85em;
            color: #64748b;
            margin-bottom: 8px;
        }

        .intervention-comment {
            margin: 0;
            font-style: italic;
            color: #334155;
            line-height: 1.4;
        }

        .empty-state {
            color: #64748b;
            font-style: italic;
            padding: 20px;
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            text-align: center;
        }

        /* Formulaire d'ajout d'intervention */
        .form-card {
            background-color: #f8fafc;
            padding: 24px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            height: fit-content;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.9em;
            display: block;
            margin-bottom: 6px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            box-sizing: border-box;
            font-size: 0.9em;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .btn-submit {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 12px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            font-size: 0.95em;
            transition: background-color 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #059669;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85em;
            display: block;
            margin-top: 5px;
        }
    </style>

    <div class="detail-container">
        <!-- Barre d'actions supérieure -->
        <div class="action-bar">
            <a href="/" class="back-link">← Retour à la liste des équipements</a>
            
            <div class="action-buttons">
                <!-- BOUTON DE MODIFICATION -->
                <a href="{{ route('dev.edit', $device->id) }}" class="btn-edit">
                    Modifier cet équipement ✏️
                </a>
                
                <!-- BOUTON DE SUPPRESSION -->
                <form action="{{ route('dev.destroy', $device->id) }}" method="POST" class="btn-delete-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">
                        Supprimer 🗑️
                    </button>
                </form>
            </div>
        </div>

        <h1 class="device-title">Nom de L'equipement : {{ $device->nom }}</h1>
        
        <!-- Fiche technique de l'appareil -->
        <div class="spec-card">
            <div class="spec-group">
                <span class="spec-label">Marque</span>
                <span class="spec-value">{{ $device->marque ?? 'Non spécifiée' }}</span>
            </div>
            
            <div class="spec-group">
                <span class="spec-label">N° Série</span>
                <span class="spec-value"><code class="spec-code">{{ $device->numero_serie }}</code></span>
            </div>

             <div class="spec-group">
                <span class="spec-label">Date d'Achat</span>
                <span class="spec-value"><code class="spec-code">{{ $device->date_achat }}</code></span>
            </div>

            <div class="spec-group">
                <span class="spec-label">État actuel</span>
                <span class="spec-value">
                    <span class="status-badge 
                        {{ $device->etat == 'Neuf' ? 'status-neuf' : '' }}
                        {{ $device->etat == 'Bon état' ? 'status-bon' : '' }}
                        {{ $device->etat == 'En panne' ? 'status-panne' : '' }}
                        {{ $device->etat == 'En réparation' ? 'status-reparation' : '' }}">
                        {{ $device->etat }}
                    </span>
                </span>
            </div>

            <!-- Affichage des catégories associées de l'appareil (Many-to-Many) -->
            <div class="spec-group">
                <span class="spec-label">Catégories</span>
                <div class="categories-list">
                    @forelse($device->categories as $category)
                        <span class="category-badge">{{ $category->nom }}</span>
                    @empty
                        <span style="color: #94a3b8; font-style: italic; font-size: 0.9em;">Aucune</span>
                    @endforelse
                </div>
            </div>

            <div class="spec-group spec-description">
                <span class="spec-label">Description</span>
                <span class="spec-value" style="font-weight: normal; color: #475569;">
                    {{ $device->description ?? 'Aucune description' }}
                </span>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 30px 0;">

        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid-layout">
            
            <!-- SECTION 1 : Historique des interventions -->
            <div class="column-left">
                <h2 class="section-title">Historique des interventions</h2>
                
                <ul class="intervention-list">
                    @forelse($device->interventions as $intervention)
                        <li class="intervention-item">
                            <div class="intervention-meta">
                                <span><strong>Type :</strong> {{ $intervention->type }}</span>
                                <span>Fait le : {{ date('d/m/Y', strtotime($intervention->date)) }}</span>
                            </div>
                            <p class="intervention-comment">
                                " {{ $intervention->commentaire }} "
                            </p>
                        </li>
                    @empty
                        <li class="empty-state">Aucune intervention enregistrée pour le moment.</li>
                    @endforelse
                </ul>
            </div>

            <!-- SECTION 2 : Nouveau Formulaire d'ajout d'intervention -->
            <div class="column-right">
                <div class="form-card">
                    <h3 class="section-title" style="font-size: 1.15em; margin-bottom: 15px;">Ajouter une intervention</h3>
                    
                    <form action="{{ route('intervention.store', $device->id) }}" method="POST">
                        @csrf
                        
                        <!-- Champ Date -->
                        <div class="form-group">
                            <label for="date" class="form-label">Date de l'intervention :</label>
                            <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-input" required>
                        </div>

                        <!-- Champ Type d'intervention -->
                        <div class="form-group">
                            <label for="type" class="form-label">Type d'intervention :</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="">-- Choisir un type --</option>
                                <option value="Maintenance préventive">Maintenance préventive</option>
                                <option value="Dépannage / Réparation">Dépannage / Réparation</option>
                                <option value="Mise à jour système">Mise à jour système</option>
                                <option value="Nettoyage matériel">Nettoyage matériel</option>
                            </select>
                        </div>

                        <!-- Champ Commentaire -->
                        <div class="form-group">
                            <label for="commentaire" class="form-label">Commentaire :</label>
                            <textarea name="commentaire" id="commentaire" rows="4" class="form-textarea" placeholder="Détaillez vos observations et actions réalisées..." required></textarea>
                            @error('commentaire')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-submit">
                            Enregistrer l'intervention
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-layout>