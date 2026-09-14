<x-layout titre="Détails de l'équipement">

    <!-- Styles CSS optimisés -->
    <style>
        :root {
            --primary: #3b82f6;
            --primary-hover: #1d4ed8;
            --success: #10b981;
            --success-hover: #059669;
            --warning: #f59e0b;
            --warning-hover: #d97706;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
        }

        .detail-container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--slate-700);
        }

        /* Barre d'actions supérieure */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .back-link {
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--primary-hover);
        }

        .btn-edit {
            text-decoration: none;
            background-color: var(--warning);
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.95em;
            box-shadow: 0 4px 6px -1px rgba(245, 158, 11, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s ease, transform 0.1s ease, box-shadow 0.2s ease;
        }

        .btn-edit:hover {
            background-color: var(--warning-hover);
            box-shadow: 0 6px 8px -1px rgba(217, 119, 6, 0.3);
        }

        .btn-edit:active {
            transform: scale(0.98);
        }

        /* Titre de l'équipement */
        .device-title {
            font-size: 1.8em;
            color: var(--slate-800);
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Fiche technique de l'appareil */
        .spec-card {
            background-color: #ffffff;
            padding: 28px;
            border-radius: 10px;
            border: 1px solid var(--slate-200);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
            transition: box-shadow 0.3s ease;
        }

        .spec-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .spec-group {
            display: flex;
            flex-direction: column;
        }

        .spec-label {
            font-size: 0.8em;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--slate-600);
            margin-bottom: 6px;
            font-weight: 700;
        }

        .spec-value {
            font-size: 1.05em;
            font-weight: 600;
            color: var(--slate-800);
        }

        .spec-code {
            background-color: var(--slate-100);
            padding: 3px 8px;
            border-radius: 4px;
            font-family: SFMono-Regular, Consolas, "Liberation Mono", Menlo, monospace;
            font-size: 0.9em;
            color: var(--slate-800);
            border: 1px solid var(--slate-200);
        }

        /* Badge d'état dynamique */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
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
            border-top: 1px solid var(--slate-100);
            padding-top: 20px;
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
            background-color: var(--slate-50);
            color: var(--slate-600);
            font-size: 0.8em;
            padding: 4px 12px;
            border-radius: 12px;
            border: 1px solid var(--slate-200);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* Message flash de succès */
        .success-alert {
            padding: 14px 20px;
            background-color: #ecfdf5;
            color: #065f46;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #a7f3d0;
            font-weight: 600;
            font-size: 0.95em;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.05);
        }

        /* Layout à deux colonnes */
        .grid-layout {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            margin-top: 25px;
        }

        /* Titres des sections */
        .section-title {
            font-size: 1.3em;
            color: var(--slate-800);
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Historique des interventions */
        .intervention-list {
            padding-left: 0;
            list-style: none;
            margin: 0;
        }

        .intervention-item {
            margin-bottom: 16px;
            padding: 18px;
            background-color: #ffffff;
            border-left: 4px solid var(--primary);
            border-radius: 0 8px 8px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
            border-top: 1px solid var(--slate-200);
            border-right: 1px solid var(--slate-200);
            border-bottom: 1px solid var(--slate-200);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .intervention-item:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .intervention-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.85em;
            color: var(--slate-600);
            margin-bottom: 10px;
        }

        .intervention-comment {
            margin: 0;
            font-style: italic;
            color: var(--slate-700);
            line-height: 1.5;
        }

        .empty-state {
            color: var(--slate-600);
            font-style: italic;
            padding: 30px;
            background-color: var(--slate-50);
            border: 2px dashed var(--slate-300);
            border-radius: 8px;
            text-align: center;
        }

        /* Formulaire d'ajout d'intervention */
        .form-card {
            background-color: var(--slate-50);
            padding: 24px;
            border-radius: 10px;
            border: 1px solid var(--slate-200);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            font-weight: 600;
            color: var(--slate-700);
            font-size: 0.9em;
            display: block;
            margin-bottom: 6px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 11px 14px;
            border-radius: 6px;
            border: 1px solid var(--slate-300);
            box-sizing: border-box;
            font-size: 0.9em;
            background-color: #ffffff;
            color: var(--slate-800);
            transition: all 0.2s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .btn-submit {
            background-color: var(--success);
            color: white;
            border: none;
            padding: 12px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            font-size: 0.95em;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-submit:hover {
            background-color: var(--success-hover);
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

        /* Responsive */
        @media (max-width: 768px) {
            .grid-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .action-bar {
                flex-direction: column;
                align-items: flex-start;
            }
            .btn-edit {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="detail-container">
        <!-- Barre d'actions supérieure -->
        <div class="action-bar">
            <a href="/" class="back-link">
                <!-- Icône Flèche Retour -->
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Retour à la liste des équipements
            </a>
            <!-- BOUTON DE MODIFICATION -->
            <a href="{{ route('dev.edit', $device->id) }}" class="btn-edit">
                <!-- Icône Crayon -->
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                Modifier cet équipement
            </a>
        </div>

        <h1 class="device-title">
            <!-- Icône Équipement -->
            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: var(--slate-600);"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
            Type Équipement : {{ $device->nom }}
        </h1>
        
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

            <!-- Affichage des catégories -->
            <div class="spec-group">
                <span class="spec-label">Catégories</span>
                <div class="categories-list">
                    @forelse($device->categories as $category)
                        <span class="category-badge">
                            <!-- Icône Dossier -->
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            {{ $category->nom }}
                        </span>
                    @empty
                        <span style="color: #94a3b8; font-style: italic; font-size: 0.9em;">Aucune</span>
                    @endforelse
                </div>
            </div>

            <div class="spec-group spec-description">
                <span class="spec-label">Description</span>
                <span class="spec-value" style="font-weight: normal; color: var(--slate-600); line-height: 1.5;">
                    {{ $device->description ?? 'Aucune description' }}
                </span>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--slate-200); margin: 30px 0;">

        @if(session('success'))
            <div class="success-alert">
                <!-- Icône Coche de validation -->
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid-layout">
            
            <!-- SECTION 1 : Historique des interventions -->
            <div class="column-left">
                <h2 class="section-title">
                    <!-- Icône Historique -->
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Historique des interventions
                </h2>
                
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
                    <h3 class="section-title" style="font-size: 1.15em; margin-bottom: 15px;">
                        <!-- Icône Plus / Ajouter -->
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Ajouter une intervention
                    </h3>
                    
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