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
    <h2>Ajouter un domaine </h2>
    <form action="/admin/domaines/store" method="POST">
        <div class="mb-4">
            <input type="text" name="name" placeholder="Nom du domaine" required
                   class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <input type="text" name="description" placeholder="Description" required
                   class="w-full p-2 border border-gray-300 rounded">
        </div>
        <button type="submit" name="ajouter"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Ajouter
        </button>
    </form>
</div>
