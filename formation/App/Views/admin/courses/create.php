<!-- views/admin/courses/create.php -->
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Créer un cours</h2>

    <form action="/admin/courses/store" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-4">
        <div>
            <label class="block mb-1 font-medium">Nom</label>
            <input name="name" type="text" placeholder="Nom" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-1 font-medium">Contenu</label>
            <textarea name="content" placeholder="Contenu" required
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" placeholder="Description" required
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Audience</label>
            <input name="audience" type="text" placeholder="Audience" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-1 font-medium">Durée</label>
            <input name="duration" type="text" placeholder="Durée" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-1 font-medium">Test inclus</label>
            <input name="testIncluded" type="text" placeholder="Test inclus" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-1 font-medium">Contenu du test</label>
            <textarea name="testContent" placeholder="Contenu du test" required
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Logo</label>
            <input type="file" name="logo">
        </div>

        <div>
            <label class="block mb-1 font-medium">Sujet</label>
            <select name="subject_id" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Choisir un sujet</option>
                <?php foreach ($subjects as $subject): ?>
                    <option value="<?= $subject['id'] ?>"><?= htmlspecialchars($subject['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded shadow">
                Créer
            </button>
            <a href="/admin/courses" class="ml-4 text-gray-600 hover:underline">Annuler</a>
        </div>
    </form>
</div>
