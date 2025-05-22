<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #f0f4f8, #d9e4f5);
        padding: 40px;
        margin: 0;
    }

    h2 {
        text-align: center;
        color: #1d3557;
        font-size: 32px;
        margin-bottom: 30px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    form {
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
        font-size: 15px;
    }

    input[type="number"],
    input[type="date"],
    select {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input[type="number"]:focus,
    input[type="date"]:focus,
    select:focus {
        border-color: #1d3557;
        outline: none;
        box-shadow: 0 0 5px rgba(29, 53, 87, 0.2);
    }

    button[type="submit"] {
        background-color: #1d3557;
        color: white;
        padding: 14px 24px;
        border: none;
        border-radius: 6px;
        font-size: 17px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: block;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #16324f;
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

    <button type="submit" class="btn">Créer</button>
</form>
