<!-- views/admin/subject/create.php -->
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter une matière</h1>
    <form action="/admin/subjects/store" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow">
        <div>
            <label class="block">Nom :</label>
            <input type="text" name="name" class="w-full border rounded px-4 py-2" required>
        </div>
        <div>
            <label class="block">Description courte :</label>
            <input type="text" name="shortDescription" class="w-full border rounded px-4 py-2" required>
        </div>
        <div>
            <label class="block">Description longue :</label>
            <textarea name="longDescription" class="w-full border rounded px-4 py-2" required></textarea>
        </div>
        <div>
            <label class="block">Bénéfice individuel :</label>
            <textarea name="individualBenefit" class="w-full border rounded px-4 py-2" required></textarea>
        </div>
        <div>
            <label class="block">Bénéfice entreprise :</label>
            <textarea name="businessBenefit" class="w-full border rounded px-4 py-2" required></textarea>
        </div>
        <div>
            <label class="block">Logo :</label>
            <input type="file" name="logo" class="w-full">
        </div>
        <div>
            <label class="block">Domaine :</label>
            <select name="domain_id" class="w-full border rounded px-4 py-2">
                <?php
                 /** @var Domaine[] $domaines */
                 use App\Models\Domaine;  ?>
                <?php foreach ($domaines as $domain): ?>
                    <option value="<?php echo $domain['id']; ?>"><?php echo htmlspecialchars($domain['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Enregistrer</button>
            <a href="/admin/subjects" class="ml-4 text-gray-600 hover:underline">Annuler</a>
        </div>
    </form>
</div>
