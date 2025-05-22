<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8" />
    <title>Admin | <?= $title ?? 'Tableau de bord' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: #f0f4f8;
            font-family: 'Poppins', sans-serif;
            color: #1e293b;
        }
        aside {
            width: 280px;
            background: linear-gradient(135deg, #f97316, #8b5cf6);
            padding: 2rem 1rem;
            border-radius: 0 1.5rem 1.5rem 0;
            box-shadow: 4px 0 15px rgba(139, 92, 246, 0.5);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
        }
        aside h2 {
            color: white;
            font-weight: 900;
            font-size: 2rem;
            margin-bottom: 2rem;
            letter-spacing: 0.1em;
            text-shadow: 0 0 8px rgba(255 255 255 / 0.5);
        }
        nav a {
            background: rgba(255 255 255 / 0.2);
            border-radius: 1.25rem;
            padding: 1rem 1.5rem;
            color: white;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15);
            transition:
                    transform 0.3s ease,
                    box-shadow 0.3s ease,
                    background 0.3s ease;
            text-decoration: none;
        }
        nav a:hover {
            background: white;
            color: #6b21a8;
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.6);
            transform: translateY(-4px);
        }
        nav a svg, nav a span.icon {
            font-size: 1.7rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            background: rgba(255 255 255 / 0.4);
            box-shadow: 0 2px 6px rgba(0,0,0,0.12);
            transition: background 0.3s ease;
        }
        nav a:hover svg, nav a:hover span.icon {
            background: #8b5cf6;
            color: white;
            box-shadow: 0 4px 12px #7c3aed;
        }
        main {
            margin-left: 300px;
            padding: 3rem;
            min-height: 100vh;
            background: white;
            border-radius: 1rem 0 0 1rem;
            box-shadow: -4px 0 15px rgba(139, 92, 246, 0.2);
            max-width: calc(100% - 300px);
        }
    </style>
</head>
<body>
<aside>
    <h2>ADMIN</h2>
    <nav>
        <?php
        $menuItems = [
            ['url' => '/admin', 'label' => 'Accueil', 'icon' => '🏠'],
            ['url' => '/admin/country', 'label' => 'Pays', 'icon' => '🌍'],
            ['url' => '/admin/city', 'label' => 'Villes', 'icon' => '🏙️'],
            ['url' => '/admin/trainers', 'label' => 'Formateurs', 'icon' => '👨‍🏫'],
            ['url' => '/admin/subjects', 'label' => 'Sujets', 'icon' => '📖'],
            ['url' => '/admin/courses', 'label' => 'Cours', 'icon' => '🎓'],
            ['url' => '/admin/formations', 'label' => 'Formations', 'icon' => '📆'],
            ['url' => '/admin/domaines', 'label' => 'Domaines', 'icon' => '📁'],
        ];
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/admin';
        foreach ($menuItems as $item) :
            $active = ($item['url'] === $currentUrl) ? 'font-extrabold bg-white text-purple-700 shadow-lg transform -translate-y-1' : '';
            ?>
            <a href="<?= $item['url'] ?>" class="<?= $active ?>">
                <span class="icon"><?= $item['icon'] ?></span>
                <span><?= $item['label'] ?></span>
            </a>
        <?php endforeach; ?>
    </nav>
</aside>
<main>
    <?= $content ?>
</main>
</body>
</html>
