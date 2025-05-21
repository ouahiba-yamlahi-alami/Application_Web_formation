<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        max-width: 600px;
        margin: 0 auto;
    }

    input[type="number"],
    input[type="date"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #555;
    }

    button[type="submit"] {
        background-color: #28a745;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #218838;
    }
</style>

<h2>Créer une formation</h2>

<form action="/admin/formations/store" method="post">
    <label for="price">Prix</label>
    <input type="number" step="0.01" name="price" placeholder="Prix" required>

    <label for="mode">Mode</label>
    <select name="mode" required>
        <option value="présentiel">Présentiel</option>
        <option value="distanciel">Distanciel</option>
    </select>

    <label for="course_id">Cours</label>
    <select name="course_id" required>
        <option value="">Choisir un cours</option>
        <?php foreach ($courses as $course): ?>
            <option value="<?= $course['id'] ?>"><?= $course['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="city_id">Ville</label>
    <select name="city_id" required>
        <option value="">Choisir une ville</option>
        <?php foreach ($cities as $city): ?>
            <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="trainer_id">Formateur</label>
    <select name="trainer_id" required>
        <option value="">Choisir un formateur</option>
        <?php foreach ($trainers as $trainer): ?>
            <option value="<?= $trainer['id'] ?>"><?= $trainer['firstName'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Dates de la formation :</label>
    <input type="date" name="dates[]">
    <input type="date" name="dates[]">
    <input type="date" name="dates[]">

    <button type="submit">Créer</button>
</form>
