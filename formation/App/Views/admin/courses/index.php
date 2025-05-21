<div class="container mx-auto px-4 py-8">
    <!-- Formulaire de filtrage -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="/admin/courses" method="GET" class="flex space-x-6">
            <div class="flex items-center space-x-2">
                <label for="filter_id" class="text-lg">Filtrer par ID :</label>
                <input type="text" id="filter_id" name="filter_id" value="<?php echo isset($_GET['filter_id']) ? htmlspecialchars($_GET['filter_id']) : ''; ?>" placeholder="ID du cours" class="border border-gray-300 rounded-lg px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-2">
                <label for="filter_name" class="text-lg">Filtrer par nom :</label>
                <input type="text" id="filter_name" name="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>" placeholder="Nom du cours" class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                Appliquer
            </button>
        </form>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Liste des cours</h2>
        <a href="/admin/courses/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
            Ajouter un cours
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Contenu</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Description</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Public cible</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Durée</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Test inclus</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Contenu du test</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Logo</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Sujet</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <?php foreach ($courses as $course): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['id']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['name']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['content']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['description']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['audience']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['duration']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['testIncluded']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['testContent']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        <?php if (!empty($course['logo'])): ?>
                            <img src="<?= htmlspecialchars($course['logo'])?>" alt="Logo" class="h-10">
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['subject_name'] ?? '') ?></td>
                    <td class="px-6 py-4 text-sm">
                        <a href="/admin/courses/edit/<?= $course['id'] ?>" class="text-blue-600 hover:underline">Modifier</a>
                        <span class="text-gray-400 mx-2">|</span>
                        <a href="/admin/courses/delete/<?= $course['id'] ?>"
                           onclick="return confirm('Supprimer ce cours ?')"
                           class="text-red-500 hover:underline">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
