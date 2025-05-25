<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Contact</title>
    <link rel="stylesheet" href="../../../../css/contact.css">
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>
<section class="hero-section">
    <div class="container">
        <h1>Contactez-nous</h1>
        <p>Vous avez des questions sur nos formations ? Notre équipe est là pour vous aider à trouver la solution adaptée.</p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Entrer en contact</h2>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Notre adresse</h3>
                        <p>123 rue de la Formation, Quartier des Affaires, 75000 Paris, France</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h3>Numéro de téléphone</h3>
                        <p>+33 1 23 45 67 89</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Adresse e-mail</h3>
                        <p>contact@formexpert.com</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h3>Horaires</h3>
                        <p>Lundi - Vendredi : 9h00 - 18h00</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h2>Envoyez-nous un message</h2>
                <form action="/client/contact/store" method="post">
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse e-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Numéro de téléphone</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="subject">Objet</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Votre message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Envoyer le message</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
