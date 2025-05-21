<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin | <?= $title ?? 'Tableau de bord' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<div class="flex">

    <!-- Barre latérale -->
    <div class="w-64 min-h-screen bg-gray-800 text-white flex flex-col">
        <div class="px-6 py-4 text-xl font-bold border-b border-gray-700">📊 Administration</div>
        <nav class="flex-1 px-4 py-4 space-y-2">
            <a href="/admin" class="block py-2 px-3 rounded hover:bg-gray-700">🏠 Accueil</a>
            <a href="/admin/country" class="block py-2 px-3 rounded hover:bg-gray-700">🌍 Pays</a>
            <a href="/admin/city" class="block py-2 px-3 rounded hover:bg-gray-700">🏙️ Villes</a>
            <a href="/admin/trainers" class="block py-2 px-3 rounded hover:bg-gray-700">👨‍🏫 Formateurs</a>
            <a href="/admin/subjects" class="block py-2 px-3 rounded hover:bg-gray-700">📖 Sujets</a>
            <a href="/admin/courses" class="block py-2 px-3 rounded hover:bg-gray-700">🎓 Cours</a>
            <a href="/admin/formations" class="block py-2 px-3 rounded hover:bg-gray-700">📆 Formations</a>
            <a href="/admin/domaines" class="block py-2 px-3 rounded hover:bg-gray-700">📁 Domaines</a>
        </nav>
    </div>

    <!-- Contenu principal -->
    <div class="flex-1 p-8">
        <?= $content ?>
    </div>
</div>
</body>
</html>
