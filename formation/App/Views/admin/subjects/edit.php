<?php
// Initialisation sécurisée des variables avec des valeurs par défaut
$name = htmlspecialchars($subject['name'] ?? '');
$shortDescription = htmlspecialchars($subject['shortDescription'] ?? '');
$longDescription = htmlspecialchars($subject['longDescription'] ?? '');
$individualBenefit = htmlspecialchars($subject['individualBenefit'] ?? '');
$businessBenefit = htmlspecialchars($subject['businessBenefit'] ?? '');
$logo = $subject['logo'] ?? '';
$domainId = $subject['domain_id'] ?? null;
?>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Modifier une matière</h1>

    <?php if (!isset($subject)): ?>
        <p class="text-red-500">Erreur : la matière n'a pas été trouvée.</p>
    <?php else: ?>
    <form method="POST" action="/admin/subjects/update/<?php echo $subject['id']; ?>" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow">
            <div>
                <label class="block">Nom :</label>
                <input type="text" name="name" value="<?= $name ?>" class="w-full border rounded px-4 py-2" required>
            </div>
            <div>
                <label class="block">Description courte :</label>
                <input type="text" name="shortDescription" value="<?= $shortDescription ?>" class="w-full border rounded px-4 py-2" required>
            </div>
            <div>
                <label class="block">Description longue :</label>
                <textarea name="longDescription" class="w-full border rounded px-4 py-2" required><?= $longDescription ?></textarea>
            </div>
            <div>
                <label class="block">Bénéfice individuel :</label>
                <textarea name="individualBenefit" class="w-full border rounded px-4 py-2" required><?= $individualBenefit ?></textarea>
            </div>
            <div>
                <label class="block">Bénéfice entreprise :</label>
                <textarea name="businessBenefit" class="w-full border rounded px-4 py-2" required><?= $businessBenefit ?></textarea>
            </div>
            <div>
                <label class="block">Logo :</label>
                <?php if (!empty($logo)): ?>
                    <img src="<?= $logo ?>" class="h-12 mb-2">
                <?php endif; ?>
                <input type="file" name="logo" class="w-full">
            </div>
            <div>
                <label class="block">Domaine :</label>
                <select name="domain_id" class="w-full border rounded px-4 py-2">
                    <?php foreach ($domains as $domain): ?>
                        <option value="<?= $domain['id'] ?>" <?= $domainId == $domain['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($domain['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à jour</button>
                <a href="/admin/subjects" class="ml-4 text-gray-600 hover:underline">Annuler</a>
            </div>
        </form>
    <?php endif; ?>
</div>
