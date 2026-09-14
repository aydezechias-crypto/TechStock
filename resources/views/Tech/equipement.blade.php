<x-layout titre="Nos équipements">

    <!-- Styles CSS spécifiques à la liste des équipements -->
    <style>
        :root {
            --primary: #3b82f6;
            --primary-hover: #1d4ed8;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
        }

        .list-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--slate-700);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 2px solid var(--slate-100);
            padding-bottom: 15px;
        }

        .page-title {
            font-size: 1.8em;
            color: var(--slate-800);
            margin: 0;
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
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .device-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
            border-color: var(--slate-300);
        }

        .device-info {
            display: flex;
            align-items: center;
            gap: 12px;
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

        .device-name {
            font-size: 1.1em;
            font-weight: 600;
            color: var(--slate-800);
        }

        .btn-details {
            text-decoration: none;
            background-color: var(--primary);
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9em;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.15);
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-details:hover {
            background-color: var(--primary-hover);
        }

        .btn-details:active {
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
    </style>

    <div class="list-container">
        <!-- En-tête de la page -->
        <div class="header-section">
            <h1 class="page-title">
                <!-- Icône Équipements -->
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                Les équipements
            </h1>
        </div>

        <!-- Liste principale -->
        <div>
            <ul class="device-list">
                @forelse ($devices as $device)
                    <li class="device-item">
                        <div class="device-info">
                            <span class="device-icon">
                                <!-- Icône d'appareil générique -->
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            </span>
                            <span class="device-name">{{ $device->nom }}</span>
                        </div>
                        
                        <!-- Redirection vers la fiche de l'appareil -->
                        <a href="{{ route('device.show', $device->id) }}" class="btn-details">
                            Détails
                            <!-- Petite flèche pointant vers la droite -->
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                @empty
                    <li class="empty-state">
                        <p style="margin: 0; font-size: 1.1em;">Aucun équipement trouvé</p>
                    </li>    
                @endforelse
            </ul>
        </div>
    </div>

</x-layout>