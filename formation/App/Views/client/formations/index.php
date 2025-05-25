<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Nos Formations</title>
    <link rel="stylesheet" href="../../../../css/formations.css" />
</head>
<body>
<section class="page-header">
    <div class="container">
        <h1>Nos Programmes de Formation</h1>
        <p>Découvrez notre gamme complète de cours de formation professionnelle conçus pour améliorer vos compétences et booster votre carrière.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="search-filters">
            <h2>Trouvez votre cours idéal</h2>
            <form id="filter-form">
                <div class="filter-group">

                    <div class="filter-item">
                        <label for="domain">Domaine</label>
                        <select id="domain" name="domain">
                            <option value="">Tous les domaines</option>
                            <?php foreach ($domains as $domain): ?>
                                <option value="<?= htmlspecialchars($domain['id']) ?>"
                                    <?= (isset($filters['domain_id']) && $filters['domain_id'] == $domain['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($domain['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label for="subject">Sujet</label>
                        <select id="subject" name="subject">
                            <option value="">Tous les sujets</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= htmlspecialchars($subject['id']) ?>"
                                    <?= (isset($filters['subject_id']) && $filters['subject_id'] == $subject['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($subject['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label for="course">Cours</label>
                        <select id="course" name="course">
                            <option value="">Tous les cours</option>
                            <?php foreach ($courses as $course): ?>
                                <option value="<?= htmlspecialchars($course['id']) ?>"
                                    <?= (isset($filters['course_id']) && $filters['course_id'] == $course['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($course['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="filter-group">
                    <div class="filter-item">
                        <label for="city_id">Lieu</label>
                        <select id="city_id" name="city_id">
                            <option value="">Tous les lieux</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?= htmlspecialchars($city['id']) ?>"
                                    <?= (isset($filters['city_id']) && $filters['city_id'] == $city['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($city['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="filter-actions">
                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                    <button type="submit" class="btn">Rechercher des cours</button>
                </div>
            </form>
        </div>

        <div class="formation-grid">
            <?php foreach ($formations as $formation): ?>
                <div class="formation-card" data-domain-id="<?= htmlspecialchars($formation['domain_id']) ?>"
                     data-subject-id="<?= htmlspecialchars($formation['subject_id']) ?>"
                     data-course-id="<?= htmlspecialchars($formation['course_id']) ?>">
                    <div class="formation-image">
                        <img src="<?= htmlspecialchars($formation['subject_logo']) ?>" alt="<?= htmlspecialchars($formation['course_name']) ?>">
                    </div>
                    <div class="formation-content">
                        <h3 class="formation-title"><?= htmlspecialchars($formation['title'] ?? $formation['course_name']) ?></h3>
                        <div class="formation-meta">
                            <span class="formation-domain"><strong>Domaine :</strong> <?= htmlspecialchars($formation['domain_name']) ?></span><br>
                            <span class="formation-subject"><strong>Sujet :</strong> <?= htmlspecialchars($formation['subject_name']) ?></span>
                        </div>
                        <div class="formation-details">
                            <div class="formation-detail" data-city-id="<?= htmlspecialchars($formation['city_id']) ?>">
                                <span class="formation-detail-icon">📍</span>
                                <span><?= htmlspecialchars($formation['city_name']) ?></span>
                            </div>
                            <div class="formation-detail">
                                <span class="formation-detail-icon">📅</span>
                                <span><?= htmlspecialchars($formation['start_date'] ?? 'À déterminer') ?></span>
                            </div>
                            <div class="formation-detail">
                                <span class="formation-detail-icon">👨‍🏫</span>
                                <span><?= htmlspecialchars($formation['trainer_name']) ?></span>
                            </div>
                            <div class="formation-detail">
                                <span class="formation-detail-icon"><?= $formation['mode'] === 'online' ? '🖥️' : '🏢' ?></span>
                                <span><?= $formation['mode'] === 'online' ? 'En ligne' : 'Sur site' ?></span>
                            </div>
                        </div>
                        <div class="formation-actions">
                            <span class="formation-price">€<?= htmlspecialchars($formation['price']) ?></span>
                            <a href="registration/index/<?= $formation['id'] ?>" class="btn">S'inscrire</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('filter-form');

        const citySelect = document.getElementById('city_id');
        const domainSelect = document.getElementById('domain');
        const subjectSelect = document.getElementById('subject');
        const courseSelect = document.getElementById('course');

        const formationCards = document.querySelectorAll('.formation-card');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const selectedCity = citySelect.value;
            const selectedDomain = domainSelect.value;
            const selectedSubject = subjectSelect.value;
            const selectedCourse = courseSelect.value;

            formationCards.forEach(card => {
                const cityId = card.querySelector('[data-city-id]')?.getAttribute('data-city-id');
                const domainId = card.getAttribute('data-domain-id');
                const subjectId = card.getAttribute('data-subject-id');
                const courseId = card.getAttribute('data-course-id');

                const matchCity = !selectedCity || cityId === selectedCity;
                const matchDomain = !selectedDomain || domainId === selectedDomain;
                const matchSubject = !selectedSubject || subjectId === selectedSubject;
                const matchCourse = !selectedCourse || courseId === selectedCourse;

                if (matchCity && matchDomain && matchSubject && matchCourse) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        form.addEventListener('reset', function () {
            setTimeout(() => {
                formationCards.forEach(card => {
                    card.style.display = '';
                });
            }, 0);
        });
    });
</script>

</body>
</html>
