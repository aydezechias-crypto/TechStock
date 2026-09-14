<x-layout titre="Détails de la salle">

    <!-- Styles CSS spécifiques aux détails de la salle -->
    <style>
        :root {
            --primary: #3b82f6;
            --primary-hover: #1d4ed8;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
        }

        .salle-detail-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--slate-700);
        }

        /* Barre de retour supérieure */
        .back-bar {
            margin-bottom: 25px;
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

        /* En-tête principal */
        .room-title {
            font-size: 1.8em;
            color: var(--slate-800);
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Fiche d'informations de la salle */
        .room-card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: 10px;
            border: 1px solid var(--slate-200);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            margin-bottom: 35px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            transition: box-shadow 0.3s ease;
        }

        .room-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .info-group {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.8em;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--slate-600);
            margin-bottom: 6px;
            font-weight: 700;
        }

        .info-value {
            font-size: 1.1em;
            font-weight: 600;
            color: var(--slate-800);
        }

        .capacity-badge {
            background-color: #fef3c7;
            color: #b45309;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.9em;
            font-weight: 700;
            display: inline-block;
            width: fit-content;
        }

        /* Section Liste d'équipements */
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

        .device-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .device-item {
            background-color: #ffffff;
            padding: 16px 20px;
            border-radius: 8px;
            border: 1px solid var(--slate-200);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .device-item:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-color: var(--slate-300);
        }

        .device-details {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .device-icon {
            color: var(--slate-600);
            background-color: var(--slate-100);
            padding: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .device-meta {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .device-name {
            font-size: 1.05em;
            font-weight: 600;
            color: var(--slate-800);
        }

        .device-sub {
            font-size: 0.85em;
            color: var(--slate-600);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .spec-code {
            background-color: var(--slate-100);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: SFMono-Regular, Consolas, "Liberation Mono", Menlo, monospace;
            font-size: 0.9em;
            color: var(--slate-800);
            border: 1px solid var(--slate-200);
        }

        /* Bouton Fiche technique */
        .btn-sheet {
            text-decoration: none;
            background-color: var(--primary);
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.85em;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.15);
            transition: background-color 0.2s ease, transform 0.1s ease;
            white-space: nowrap;
        }

        .btn-sheet:hover {
            background-color: var(--primary-hover);
        }

        .btn-sheet:active {
            transform: scale(0.97);
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

        /* Responsivité */
        @media (max-width: 600px) {
            .device-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .btn-sheet {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="salle-detail-container">
        <!-- Retour à la liste -->
        <div class="back-bar">
            <a href="{{ route('salle') }}" class="back-link">
                <!-- Icône Flèche Retour -->
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Retour à la liste des salles
            </a>
        </div>

        <!-- Titre principal -->
        <h1 class="room-title">
            <!-- Icône Salle / Bureau -->
            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: var(--slate-600);"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            Salle : {{ $room->nom }}
        </h1>

        <!-- Fiche d'informations de la salle -->
        <div class="room-card">
            <div class="info-group">
                <span class="info-label">Bâtiment</span>
                <span class="info-value">{{ $room->batiment ?? 'Non spécifié' }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">Capacité d'accueil</span>
                <span class="info-value">
                    <span class="capacity-badge">
                        {{ $room->capacite ?? 'Non spécifiée' }} personnes
                    </span>
                </span>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--slate-200); margin: 30px 0;">

        <!-- Équipements présents -->
        <h2 class="section-title">
            <!-- Icône Outils -->
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Équipements présents dans cette salle
        </h2>

        <ul class="device-list">
            @forelse($room->devices as $device)
                <li class="device-item">
                    <div class="device-details">
                        <span class="device-icon">
                            <!-- Icône Équipement Électronique -->
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </span>
                        <div class="device-meta">
                            <span class="device-name">{{ $device->nom }}</span>
                            <span class="device-sub">
                                <span><strong>Marque :</strong> {{ $device->marque ?? 'N/A' }}</span>
                                <span style="color: var(--slate-300);">•</span>
                                <span>S/N : <code class="spec-code">{{ $device->numero_serie }}</code></span>
                            </span>
                        </div>
                    </div>

                    <!-- Action vers la fiche -->
                    <a href="{{ route('device.show', $device->id) }}" class="btn-sheet">
                        <!-- Icône de document / Fiche -->
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Voir la fiche
                    </a>
                </li>
            @empty
                <li class="empty-state">
                    <p style="margin: 0; font-size: 1.1em;">Aucun équipement n'est actuellement affecté à cette salle.</p>
                </li>
            @endforelse
        </ul>
    </div>

</x-layout>