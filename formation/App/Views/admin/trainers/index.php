<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des formateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmDelete(event) {
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce formateur");
            if (!confirmation) {
                event.preventDefault(); // cancel navigation
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">
    <!-- Filter Form -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="/admin/trainers" method="GET" class="flex space-x-6">
            <div class="flex items-center space-x-2">
                <label for="filter_id" class="text-lg">Filtrer par ID:</label>
                <input type="text" id="filter_id" name="filter_id" value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="Filtrer par ID" class="border border-gray-300 rounded-lg px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-2">
                <label for="filter_name" class="text-lg">Filtrer par  Nom:</label>
                <input type="text" id="filter_name" name="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du Formateur" class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                Apply
            </button>
        </form>
    </div>

    <h1 class="text-3xl font-bold text-center mb-6">Liste des formateurs</h1>

    <div class="text-right mb-4">
        <a href="/admin/trainers/create" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Ajouter Formateur</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($trainers): ?>
                <?php foreach ($trainers as $trainer): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $trainer['id']): ?>
                        <!-- Inline Edit Row -->
                        <tr class="border-t bg-yellow-50">
                            <form action="/admin/trainers/update/<?= $trainer['id'] ?>" method="POST" enctype="multipart/form-data">
                                <td class="py-2 px-4"><?= $trainer['id'] ?></td>
                                <td class="py-2 px-4">
                                    <input type="text" name="name" value="<?= htmlspecialchars($trainer['firstName']. ' ' . $trainer['lastName']) ?>" class="border rounded px-2 py-1 w-full">
                                </td>
                                <td class="py-2 px-4">
                                    <textarea name="description" class="border rounded px-2 py-1 w-full"><?= htmlspecialchars($trainer['description']) ?></textarea>
                                </td>
                                <td class="py-2 px-4">
                                    <?php if ($trainer['photo']): ?>
                                        <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="photo" width="50" class="mb-1">
                                    <?php endif; ?>
                                    <input type="file" name="photo" class="w-full">
                                </td>
                                <td class="py-2 px-4">
                                    <button type="submit" class="text-green-600 hover:text-green-800">✔ Enregistrer</button>
                                    <a href="/admin/trainers" class="text-gray-500 ml-4 hover:underline">Annuler</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- Normal Row -->
                        <tr class="border-t">
                            <td class="py-2 px-4"><?= $trainer['id'] ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($trainer['firstName']. ' ' . $trainer['lastName']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($trainer['description']) ?></td>
                            <td class="py-2 px-4">
                                <?php if ($trainer['photo']): ?>
                                    <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="photo" width="50">
                                <?php endif; ?>
                            </td>
                            <td class="py-2 px-4">
                                <a href="/admin/trainers?edit_id=<?= $trainer['id'] ?>" class="text-blue-500 hover:text-blue-700">Modifier</a>
                                <a href="/admin/trainers/delete/<?= $trainer['id'] ?>" onclick="return confirmDelete(event)" class="text-red-500 hover:text-red-700 ml-4">Supprimer</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3" class="text-center py-4">Aucun Formateur trouvé.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
