<style>
    /* Centrage vertical et horizontal de la page */
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        /* Image de fond avec overlay bleu clair semi-transparent */
        background:
                linear-gradient(135deg, #a1c4fd99, #c2e9fb99), /* overlay semi-transparent */
                url('/includes/imagesCrud/pays.jpg') no-repeat center center fixed;

        background-size: cover;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .admin-form-container {
        width: 100%;
        max-width: 450px;
        background-color: #ffffffdd; /* blanc semi-transparent */
        padding: 30px 35px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        text-align: center;
    }

    .admin-form-container h2 {
        font-size: 26px;
        margin-bottom: 25px;
        color: #1d3557;
        font-weight: 700;
    }

    .admin-form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #457b9d;
        text-align: left;
    }

    .admin-form-container input[type="text"],
    .admin-form-container select {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 20px;
        border: 1.5px solid #a8dadc;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s ease;
        box-sizing: border-box;
    }

    .admin-form-container input[type="text"]:focus,
    .admin-form-container select:focus {
        border-color: #1d3557;
        outline: none;
        box-shadow: 0 0 5px #1d3557aa;
    }

    .admin-form-container button {
        width: 100%;
        padding: 12px 0;
        background-color: #F95E16ED
        color: #f1faee;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .admin-form-container button:hover {
        background-color: #F95E16ED;
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
