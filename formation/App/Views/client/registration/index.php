<!DOCTYPE html>
<html>
<head>
    <title>Inscription à la formation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/formations.css" />
    <link rel="stylesheet" href="../../../../css/registration.css" />
</head>
<body>
<section class="page-header">
    <div class="container">
        <h1>Inscrivez-vous à cette formation</h1>
        <p>Découvrez notre large gamme de formations professionnelles conçues pour améliorer vos compétences et faire avancer votre carrière.</p>
    </div>
</section>
<form action="/client/registration/store" method="post">
    <h2>Formulaire d'inscription</h2>
    <input type="hidden" name="formation_id" value="<?= htmlspecialchars($formationId) ?>">

    <label>Prénom :</label><br>
    <input type="text" name="firstName" required><br>

    <label>Nom :</label><br>
    <input type="text" name="lastName" required><br>

    <label>Téléphone :</label><br>
    <input type="text" name="phone" required><br>

    <label>Email :</label><br>
    <input type="email" name="email" required><br>

    <label>Entreprise :</label><br>
    <input type="text" name="company" required><br>

    <label>Payé :</label>
    <div class="paid-group">
        <input type="radio" name="paid" value="1" id="paid_yes">
        <label for="paid_yes">Oui</label>

        <input type="radio" name="paid" value="0" id="paid_no" checked>
        <label for="paid_no">Non</label>
    </div>

    <button type="submit">Envoyer</button>
</form>
</body>
</html>
