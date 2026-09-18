<x-layout titre="Les Salles">

    <!-- Styles CSS optimisés -->
    <style>
        :root {
            --primary: #3b82f6;
            --primary-hover: #1d4ed8;
            --success: #10b981;
            --success-hover: #059669;
            --info: #06b6d4;
            --info-hover: #0891b2;
            --danger: #ef4444;
            --danger-hover: #dc2626;
            --danger-bg: #fef2f2;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
        }

        .salle-container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--slate-700);
        }

        /* En-tête de la page */
        .page-header {
            border-bottom: 2px solid var(--slate-100);
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.8em;
            color: var(--slate-800);
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Layout à deux colonnes */
        .grid-layout {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 40px;
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

        /* Formulaire d'ajout de salle (Carte gauche) */
        .form-card {
            background-color: var(--slate-50);
            padding: 24px;
            border-radius: 10px;
            border: 1px solid var(--slate-200);
            height: fit-content;
            position: sticky;
            top: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
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

        .form-input {
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

        .form-input:focus {
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-submit:hover {
            background-color: var(--success-hover);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* Liste des salles (Colonne droite) */
        .room-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .room-item {
            background-color: #ffffff;
            padding: 18px 20px;
            border-radius: 8px;
            border: 1px solid var(--slate-200);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .room-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
            border-color: var(--slate-300);
        }

        .room-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .room-icon {
            color: var(--slate-600);
            background-color: var(--slate-100);
            padding: 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .room-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .room-name {
            font-size: 1.1em;
            font-weight: 700;
            color: var(--slate-800);
        }

        .room-meta {
            font-size: 0.85em;
            color: var(--slate-600);
            display: flex;
            gap: 10px;
        }

        .meta-badge {
            background-color: var(--slate-100);
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 500;
        }

        /* Conteneur des actions (Boutons voir / supprimer) */
        .room-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Bouton "Voir les équipements" */
        .btn-info {
            text-decoration: none;
            background-color: var(--info);
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.85em;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(6, 182, 212, 0.15);
            transition: background-color 0.2s ease, transform 0.1s ease;
            white-space: nowrap;
        }

        .btn-info:hover {
            background-color: var(--info-hover);
        }

        .btn-info:active {
            transform: scale(0.97);
        }

        /* Bouton de suppression */
        .btn-danger {
            background-color: var(--danger-bg);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            background-color: var(--danger);
            color: #ffffff;
            border-color: var(--danger);
            box-shadow: 0 2px 4px rgba(239, 68, 68, 0.2);
        }

        .btn-danger:active {
            transform: scale(0.95);
        }

        .empty-state {
            color: var(--slate-600);
            font-style: italic;
            padding: 40px;
            background-color: var(--slate-50);
            border: 2px dashed var(--slate-200);
            border-radius: 8px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 868px) {
            .grid-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .room-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .room-actions {
                width: 100%;
            }
            .btn-info {
                flex: 1;
                justify-content: center;
            }
        }
    </style>

    <div class="salle-container">
        
        <!-- En-tête -->
        <div class="page-header">
            <h1 class="page-title">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Gestion des Salles
            </h1>
        </div>

        <div class="grid-layout">
            
            <!-- COLONNE GAUCHE : Formulaire d'ajout -->
            <div class="column-left">
                <div class="form-card">
                    <h2 class="section-title" style="font-size: 1.15em; margin-bottom: 15px;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Ajouter une nouvelle salle
                    </h2>

                    <form action="{{ route('salle.store') }}" method="POST">
                        @csrf

                        <!-- Champ Nom -->
                        <div class="form-group">
                            <label class="form-label">Nom de la salle :</label>
                            <input type="text" name="nom" class="form-input" placeholder="Ex: Salle 001" required>
                            @error('nom')
                                <small style="color: red; display: block; margin-top: 5px;">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!-- Champ Bâtiment -->
                        <div class="form-group">
                            <label class="form-label">Bâtiment :</label>
                            <input type="text" name="batiment" class="form-input" placeholder="Ex: Bâtiment 001" required>
                            
                        </div>

                        <!-- Champ Capacité -->
                        <div class="form-group">
                            <label class="form-label">Capacité (max 75 places) :</label>
                            <input type="number" name="capacite" class="form-input" max="75" placeholder="Ex: 50" required>
                        </div>

                        <button type="submit" class="btn-submit">
                            Ajouter la salle
                        </button>
                    </form>
                </div>
            </div>

            <!-- COLONNE DROITE : Liste des salles -->
            <div class="column-right">
                <h2 class="section-title">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Liste des salles
                </h2>

                <ul class="room-list">
                    @forelse($rooms as $room)
                        <li class="room-item">
                            <div class="room-info">
                                <span class="room-icon">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                                </span>
                                <div class="room-details">
                                    <span class="room-name">{{ $room->nom }}</span>
                                    <div class="room-meta">
                                        <span class="meta-badge">Bât. {{ $room->batiment ?? 'N/A' }}</span>
                                        <span class="meta-badge" style="background-color: #fef3c7; color: #b45309;">{{ $room->capacite ?? 'Non définie' }} places</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="room-actions">
                                <a href="{{ route('salle.show', $room->id) }}" class="btn-info">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Voir les équipements
                                </a>

                                <!-- Formulaire de suppression -->
                                <form action="{{ route('salle.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Supprimer cette salle ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger" title="Supprimer la salle">
                                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="empty-state">
                            <p style="margin: 0; font-size: 1.1em;">Aucune salle enregistrée pour le moment.</p>
                        </li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>

</x-layout>