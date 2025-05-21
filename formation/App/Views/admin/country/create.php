<!-- Style CSS -->
<style>
    .admin-form-container {
        max-width: 500px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-family: Arial, sans-serif;
        margin-bottom: 40px;
    }

    .admin-form-container h2 {
        font-size: 22px;
        margin-bottom: 20px;
        color: #333;
    }

    .admin-form-container label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    .admin-form-container input[type="text"] {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .admin-form-container button {
        padding: 10px 18px;
        background-color: #4c6ef5;
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        font-size: 14px;
    }

    .admin-form-container button:hover {
        background-color: #3b5bdb;
    }
</style>

<!-- Formulaire HTML -->
<div class="admin-form-container">
    <h2>Ajouter un pays</h2>
    <form action="/admin/country/store" method="POST">
        <label for="name">Nom du pays :</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Enregistrer</button>
    </form>
</div>
