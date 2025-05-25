<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Calendrier des formations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../../../../css/calendar.css" />
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>
<section class="banner">
    <div class="container">
        <h1>Calendrier des formations</h1>
        <p>Découvrez nos prochaines sessions de formation et inscrivez-vous à celles qui correspondent à vos objectifs professionnels.</p>
    </div>
</section>

<section class="calendar-section">
    <div class="container">
        <div class="calendar-results">
            <h2>Prochaines sessions de formation</h2>
            <table class="calendar-table">
                <thead>
                <tr>
                    <th>Formation</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Format</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($formations as $formation): ?>
                    <tr>
                        <td><?= htmlspecialchars($formation['course_name']) ?></td>
                        <td>
                            <?php
                            echo implode(', ', array_map(fn($d) => date('j F Y', strtotime($d)), $formation['dates']));
                            ?>
                        </td>
                        <td>
                            <?php if ($formation['mode'] === 'présentiel'): ?>
                                <span class="location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($formation['city_name']) ?></span>
                            <?php else: ?>
                                <span class="location"><i class="fas fa-desktop"></i> En ligne</span>
                            <?php endif; ?>
                        </td>
                        <td>
                        <span class="format <?= $formation['mode'] === 'distanciel' ? 'online' : 'in-person' ?>">
                            <?= $formation['mode'] === 'distanciel' ? 'En ligne' : 'En présentiel' ?>
                        </span>
                        </td>
                        <td><span class="price"><?= number_format((float)$formation['price'], 2, ',', ' ') ?> €</span></td>
                        <td><a href="registration/index/<?= $formation['id'] ?>" class="btn-register">S'inscrire</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
