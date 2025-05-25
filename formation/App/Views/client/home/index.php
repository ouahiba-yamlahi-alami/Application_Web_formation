<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Solutions de Formation Professionnelle</title>
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>
<section class="hero">
    <div class="container hero-content">
        <h1>Excellence en Formation Professionnelle</h1>
        <p>Améliorez vos compétences avec nos cours animés par des experts en management, informatique, big data et réseaux dans plusieurs villes à travers le monde.</p>
        <a href="#courses" class="btn">Découvrir les Formations</a>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <h2 class="section-title">À Propos de Nous</h2>
        <div class="about-content">
            <div class="about-text">
                <p>FormExpert est un leader de la formation professionnelle, dédié à fournir des cours de développement professionnel de haute qualité dans plusieurs disciplines. Nos formations sont conçues pour aider les professionnels à améliorer leurs compétences et à rester compétitifs sur le marché actuel.</p>
                <p>Avec des formateurs expérimentés, des options d'apprentissage flexibles (en présentiel et à distance), et une large variété de cours spécialisés, nous proposons des solutions adaptées à vos besoins en formation.</p>
                <p>Nos programmes de formation sont dispensés dans plusieurs villes du monde, rendant l'éducation de qualité accessible aux professionnels à l’échelle mondiale.</p>
            </div>
            <div class="about-image">
                <img src="../../../../uploads/about_us.jpeg" alt="Session de formation">
            </div>
        </div>
    </div>
</section>

<section class="section stats">
    <div class="container">
        <h2 class="section-title">Nos Performances</h2>
        <div class="stats-container">
            <div class="stat-item">
                <h3>98%</h3>
                <p>Satisfaction Client</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>Taux de Réussite</p>
            </div>
            <div class="stat-item">
                <h3>85%</h3>
                <p>Couverture Mondiale</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Nos Formateurs</h2>
        <div class="trainers-grid">
            <?php foreach ($trainers as $trainer): ?>
                <div class="trainer-card">
                    <img src="<?= htmlspecialchars($trainer['photo']) ?>" alt="<?= htmlspecialchars($trainer['firstName']) ?> <?= htmlspecialchars($trainer['lastName']) ?>">
                    <h3><?= htmlspecialchars($trainer['firstName']) ?> <?= htmlspecialchars($trainer['lastName']) ?></h3>
                    <p><?= htmlspecialchars($trainer['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section domains" id="courses">
    <div class="container">
        <h2 class="section-title">Nos Domaines de Formation</h2>
        <div class="domain-cards">
            <?php foreach ($domains as $domain): ?>
                <div class="domain-card">
                    <?php
                    $imagePath = "../../../../uploads/";
                    switch(strtolower($domain['name'])) {
                        case 'management':
                            $imagePath .= "cobit.webp";
                            break;
                        case 'computer science':
                        case 'it development':
                            $imagePath .= "it.png";
                            break;
                        case 'big data':
                            $imagePath .= "Big-data-main-application-areas.png";
                            break;
                        case 'networking':
                            $imagePath .= "PhysicalNetworkDiagram.jpg";
                            break;
                        default:
                            $imagePath .= "default-domain.jpg";
                    }
                    ?>
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($domain['name']) ?> Domaine">
                    <div class="domain-content">
                        <h3><?= htmlspecialchars($domain['name']) ?></h3>
                        <p><?= htmlspecialchars($domain['description']) ?></p>
                        <a href="/client/formations" class="btn">Voir les Formations</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section cta">
    <div class="container">
        <h2>Prêt à Améliorer Vos Compétences Professionnelles ?</h2>
        <p>Parcourez notre catalogue complet de formations et trouvez le programme parfait pour atteindre vos objectifs professionnels.</p>
        <a href="/client/formations" class="btn">Consulter les Formations</a>
    </div>
</section>
</body>
</html>
