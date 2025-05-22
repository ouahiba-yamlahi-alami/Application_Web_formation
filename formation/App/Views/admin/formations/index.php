<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px;
        background-color: #f4f6f8;
        color: #333;
    }

    h1 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: center; /* ajout */
    }

    .btn {
        display: inline-block;
        background: linear-gradient(to right, #ff4d00, rgba(179, 33, 0, 0.98));
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    th, td {
        padding: 16px 20px;
        text-align: left;
    }

    th {
        background-color: rgba(249, 143, 22, 0.8);
        color: black;
        font-size: 15px;
        font-weight: 600;
    }

    td {
        border-top: 1px solid #e8eaf0;
        font-size: 14px;
    }

    tr:hover {
        background-color: #f9fbfd;
    }

    td a {
        color: #e74c3c;
        text-decoration: none;
        font-weight: 500;
    }

    td a:hover {
        text-decoration: underline;
    }

    @media screen and (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr {
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        th, td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        th::before, td::before {
            position: absolute;
            left: 20px;
            width: 45%;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
        }

        th:nth-of-type(1)::before,
        td:nth-of-type(1)::before { content: "Prix"; }
        th:nth-of-type(2)::before,
        td:nth-of-type(2)::before { content: "Mode"; }
        th:nth-of-type(3)::before,
        td:nth-of-type(3)::before { content: "Cours"; }
        th:nth-of-type(4)::before,
        td:nth-of-type(4)::before { content: "Ville"; }
        th:nth-of-type(5)::before,
        td:nth-of-type(5)::before { content: "Formateur"; }
        th:nth-of-type(6)::before,
        td:nth-of-type(6)::before { content: "Actions"; }
    }
    .add-button-wrapper {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
    }
    .filter-form {
        margin: 20px 0;
        background: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .filter-form div label {
        font-weight: 600;
        color: #2c3e50;
    }

    .filter-form input,
    .filter-form select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #f8f9fa;
        width: 160px;
    }

</style>


<h1 class="text-6xl font-extrabold text-center mb-10 text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-purple-600 to-indigo-700 drop-shadow-lg">
    Liste des formations
</h1>

<!-- Formulaire de filtre -->
<form method="GET" class="filter-form">
    <div style="display: flex; flex-wrap: wrap; gap: 15px; align-items: flex-end;">
        <div>
            <label for="filter_price">Prix</label><br>
            <input type="number" name="filter_price" id="filter_price" value="<?= $_GET['filter_price'] ?? '' ?>" style="padding: 8px; width: 120px;">
        </div>

        <div>
            <label for="filter_mode">Mode</label><br>
            <select name="filter_mode" id="filter_mode" style="padding: 8px;">
                <option value="">Tous</option>
                <option value="présentiel" <?= ($_GET['filter_mode'] ?? '') === 'présentiel' ? 'selected' : '' ?>>Présentiel</option>
                <option value="distanciel" <?= ($_GET['filter_mode'] ?? '') === 'distanciel' ? 'selected' : '' ?>>Distanciel</option>
            </select>
        </div>

        <div>
            <label for="filter_course_id">Cours</label><br>
            <select name="filter_course_id" id="filter_course_id" style="padding: 8px;">
                <option value="">Tous</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= $course['id'] ?>" <?= ($_GET['filter_course_id'] ?? '') == $course['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($course['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="filter_city_id">Ville</label><br>
            <select name="filter_city_id" id="filter_city_id" style="padding: 8px;">
                <option value="">Toutes</option>
                <?php foreach ($cities as $city): ?>
                    <option value="<?= $city['id'] ?>" <?= ($_GET['filter_city_id'] ?? '') == $city['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($city['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="filter_trainer_id">Formateur</label><br>
            <select name="filter_trainer_id" id="filter_trainer_id" style="padding: 8px;">
                <option value="">Tous</option>
                <?php foreach ($trainers as $trainer): ?>
                    <option value="<?= $trainer['id'] ?>" <?= ($_GET['filter_trainer_id'] ?? '') == $trainer['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($trainer['firstName']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <button type="submit" class="btn">Filtrer</button>
        </div>
    </div>
</form>

<table>
    <thead>
    <tr>
        <th>Prix</th>
        <th>Mode</th>
        <th>Cours</th>
        <th>Ville</th>
        <th>Formateur</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($formations as $formation): ?>
        <tr>
            <td><?= $formation['price'] ?> €</td>
            <td><?= ucfirst($formation['mode']) ?></td>
            <td><?= htmlspecialchars($formation['course_name']) ?></td>
            <td><?= htmlspecialchars($formation['city_name']) ?></td>
            <td><?= htmlspecialchars($formation['trainer_name']) ?></td>
            <td>
                <a href="/admin/formations/delete/<?= $formation['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="add-button-wrapper">
    <a href="/admin/formations/create" class="btn">Ajouter une formation</a>
</div>