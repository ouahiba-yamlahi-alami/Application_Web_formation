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
<div class="admin-form-container">
    <h2>Ajouter un formateur</h2>
    <form action="/admin/trainers/store" method="post" enctype="multipart/form-data">
        <label>Prénom :</label><br>
        <input type="text" name="firstName" required><br>

        <label>Nom :</label><br>
        <input type="text" name="lastName" required><br>

        <label>Description :</label><br>
        <textarea name="description" required></textarea><br>

        <label>Photo :</label><br>
        <input type="file" name="photo" accept="image/*"><br><br>

        <button type="submit">Ajouter</button>
    </form>
</div>