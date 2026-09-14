<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titre ?? 'TechStock' }}</title>
    
    <!-- Styles CSS globaux de l'application -->
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

        /* Reset & Base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--slate-50);
            color: var(--slate-700);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.5;
        }

        /* En-tête / Barre de navigation */
        header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--slate-200);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Marque / Logo */
        .brand {
            font-size: 1.4em;
            font-weight: 800;
            color: var(--slate-800);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: -0.02em;
        }

        .brand-icon {
            color: var(--primary);
        }

        /* Navigation */
        nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav a {
            text-decoration: none;
            color: var(--slate-600);
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95em;
            transition: all 0.2s ease;
        }

        nav a:hover {
            color: var(--slate-800);
            background-color: var(--slate-100);
        }

        /* Style spécial pour le bouton d'ajout d'équipement */
        nav a[href="/create"] {
            background-color: var(--primary);
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.15);
        }

        nav a[href="/create"]:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        /* Zone de contenu principal */
        main {
            flex: 1;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Message flash global */
        .alert-success {
            max-width: 1100px;
            margin: 20px auto 0 auto;
            padding: 14px 20px;
            background-color: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95em;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.05);
        }

        /* Pied de page */
        footer {
            background-color: #ffffff;
            border-top: 1px solid var(--slate-200);
            padding: 25px 20px;
            text-align: center;
            margin-top: auto;
        }

        footer p {
            font-size: 0.9em;
            color: var(--slate-600);
        }

        /* Responsive */
        @media (max-width: 640px) {
            .header-container {
                flex-direction: column;
                text-align: center;
                padding: 15px 10px;
            }
            nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 5px;
            }
            nav a {
                padding: 6px 12px;
                font-size: 0.85em;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <!-- Logo de l'application -->
            <a href="/" class="brand">
                <svg class="brand-icon" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                TechStock
            </a>
            
            <!-- Menu de navigation -->
            <nav>
                <a href="/">Équipements</a>
                <a href="/categorie">Catégories</a>
                <a href="/salle">Salles</a>
                <a href="/create">Ajouter un équipement</a>
            </nav>
        </div>
    </header>

    <!-- Affichage des messages flashs de succès globales -->
    @if(session('success'))
        <div style="padding: 0 20px;">
            <div class="alert-success">
                <!-- Icône Coche de validation -->
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Conteneur principal pour le contenu de tes vues -->
    <main>
        {{ $slot }}
    </main>

    <!-- Pied de page -->
    <footer>
        <p>© 2026 TechStock — Propulsé par Laravel.</p>
    </footer>
</body>
</html>