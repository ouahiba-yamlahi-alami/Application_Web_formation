<h2 class="text-2xl font-bold mb-6">Modifier un cours</h2>

<form method="POST" action="/admin/courses/update/<?php echo $course['id']; ?>"  enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-4 max-w-2xl">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nom du cours *</label>
        <input name="name" value="<?= htmlspecialchars($course['name']) ?>" required class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Contenu</label>
        <textarea name="content" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($course['content']) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($course['description']) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Public concerné</label>
        <input name="audience" value="<?= htmlspecialchars($course['audience']) ?>" class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Durée</label>
        <input name="duration" value="<?= htmlspecialchars($course['duration']) ?>" class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Test inclus</label>
        <input name="testIncluded" value="<?= htmlspecialchars($course['testIncluded']) ?>" class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Contenu du test</label>
        <textarea name="testContent" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($course['testContent']) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Logo actuel</label><br>
        <img src="<?= htmlspecialchars($course['logo']) ?>" width="100" class="mb-2 rounded shadow">
        <input type="file" name="logo" class="mt-2">
        <input type="hidden" name="old_logo" value="<?= htmlspecialchars($course['logo']) ?>">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Sujet associé *</label>
        <select name="subject_id" required class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring-2 focus:ring-blue-500">
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['id'] ?>" <?= $subject['id'] == $course['subject_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($subject['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="text-right">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-300">
            Mettre à jour
        </button>
    </div>
</form>
