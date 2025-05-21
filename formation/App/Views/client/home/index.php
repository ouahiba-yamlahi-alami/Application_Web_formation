<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Professional Training Solutions</title>
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>
<section class="hero">
    <div class="container hero-content">
        <h1>Excellence in Professional Training</h1>
        <p>Enhance your skills with our expert-led courses in management, IT, big data, and networking across multiple locations worldwide.</p>
        <a href="#courses" class="btn">Explore Courses</a>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <h2 class="section-title">About Us</h2>
        <div class="about-content">
            <div class="about-text">
                <p>FormExpert is a leading training provider dedicated to delivering high-quality professional development courses across multiple disciplines. Our courses are designed to help professionals enhance their skills and stay ahead in today's competitive market.</p>
                <p>With experienced trainers, flexible learning options (both in-person and remote), and a wide variety of specialized courses, we provide tailored solutions to meet your training needs.</p>
                <p>Our training programs are conducted in various cities around the world, making quality education accessible to professionals globally.</p>
            </div>
            <div class="about-image">
                <img src="../../../../uploads/about_us.jpeg" alt="Training session">
            </div>
        </div>
    </div>
</section>

<section class="section stats">
    <div class="container">
        <h2 class="section-title">Our Performance</h2>
        <div class="stats-container">
            <div class="stat-item">
                <h3>98%</h3>
                <p>Client Satisfaction</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>Success Rate</p>
            </div>
            <div class="stat-item">
                <h3>85%</h3>
                <p>Global Coverage</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Previous Trainings</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="../../../../uploads/Professional-Scrum-Master-2-Certificate.webp" alt="Training Session 1">
                <div class="gallery-caption">
                    <h3>Scrum Certification - Paris</h3>
                </div>
            </div>
            <div class="gallery-item">
                <img src="../../../../uploads/Certificate-Final-london.png" alt="Training Session 2">
                <div class="gallery-caption">
                    <h3>JEE Workshop - London</h3>
                </div>
            </div>
            <div class="gallery-item">
                <img src="../../../../uploads/berlin.jpeg" alt="Training Session 3">
                <div class="gallery-caption">
                    <h3>ITIL Masterclass - Berlin</h3>
                </div>
            </div>
            <div class="gallery-item">
                <img src="../../../../uploads/bigData.jpeg" alt="Training Session 4">
                <div class="gallery-caption">
                    <h3>Big Data Summit - New York</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section domains" id="courses">
    <div class="container">
        <h2 class="section-title">Our Training Domains</h2>
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
                    <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($domain['name']) ?> Domain">
                    <div class="domain-content">
                        <h3><?= htmlspecialchars($domain['name']) ?></h3>
                        <p><?= htmlspecialchars($domain['description']) ?></p>
                        <a href="client/formations?domain=<?= urlencode($domain['name']) ?>" class="btn">View Courses</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section cta">
    <div class="container">
        <h2>Ready to Enhance Your Professional Skills?</h2>
        <p>Explore our comprehensive catalog of courses and find the perfect training program to meet your career development goals.</p>
        <a href="client/formations" class="btn">Browse Formations</a>
    </div>
</section>
</body>
</html>