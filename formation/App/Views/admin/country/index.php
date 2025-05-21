<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pays</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmDelete(event) {
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce pays ?");
            if (!confirmation) {
                event.preventDefault(); // annuler la navigation
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <!-- Formulaire de filtrage -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="/admin/country" method="GET" class="flex space-x-6">
            <div class="flex items-center space-x-2">
                <label for="filter_id" class="text-lg">Filtrer par ID :</label>
                <input type="text" id="filter_id" name="filter_id" value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="ID du pays" class="border border-gray-300 rounded-lg px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-2">
                <label for="filter_name" class="text-lg">Filtrer par nom :</label>
                <input type="text" id="filter_name" name="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du pays" class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                Appliquer
            </button>
        </form>
    </div>

    <h1 class="text-3xl font-bold text-center mb-6">Liste des pays</h1>

    <div class="text-right mb-4">
        <a href="/admin/country/create" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Ajouter un pays</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Nom</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($countries): ?>
                <?php foreach ($countries as $country): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $country['id']): ?>
                        <!-- Ligne de modification -->
                        <tr class="border-t bg-yellow-50">
                            <form action="/admin/country/update/<?= $country['id'] ?>" method="POST">
                                <td class="py-2 px-4"><?= $country['id'] ?></td>
                                <td class="py-2 px-4">
                                    <input type="text" name="name" value="<?= htmlspecialchars($country['name']) ?>" class="border rounded px-2 py-1 w-full">
                                </td>
                                <td class="py-2 px-4">
                                    <button type="submit" class="text-green-600 hover:text-green-800">✔ Enregistrer</button>
                                    <a href="/admin/country" class="text-gray-500 ml-4 hover:underline">Annuler</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- Ligne normale -->
                        <tr class="border-t">
                            <td class="py-2 px-4"><?= $country['id'] ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($country['name']) ?></td>
                            <td class="py-2 px-4">
                                <a href="/admin/country?edit_id=<?= $country['id'] ?>" class="text-blue-500 hover:text-blue-700">Modifier</a>
                                <a href="/admin/country/delete/<?= $country['id'] ?>" onclick="return confirmDelete(event)" class="text-red-500 hover:text-red-700 ml-4">Supprimer</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3" class="text-center py-4">Aucun pays trouvé.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
