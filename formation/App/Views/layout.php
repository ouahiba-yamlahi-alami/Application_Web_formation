<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'FormExpert' ?></title>
    <link rel="stylesheet" href="../../css/styles.css" />
</head>
<body>
<?php require_once __DIR__ . '/../../includes/header.html'; ?>

<!-- Contenu spécifique à la page -->
<?= $content ?>

<?php require_once __DIR__ . '/../../includes/footer.html'; ?>
</body>
</html>
