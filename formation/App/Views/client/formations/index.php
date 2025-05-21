<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Our Formations</title>
    <link rel="stylesheet" href="../../../../css/formations.css" />
</head>
<body>
<section class="page-header">
    <div class="container">
        <h1>Our Training Programs</h1>
        <p>Discover our comprehensive range of professional training courses designed to enhance your skills and boost your career.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="search-filters">
            <h2>Find Your Perfect Course</h2>
            <form id="filter-form">
                <div class="filter-group">

                    <div class="filter-item">
                        <label for="domain">Domain</label>
                        <select id="domain" name="domain">
                            <option value="">All Domains</option>
                            <?php foreach ($domains as $domain): ?>
                                <option value="<?= htmlspecialchars($domain['id']) ?>"
                                    <?= (isset($filters['domain_id']) && $filters['domain_id'] == $domain['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($domain['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject">
                            <option value="">All Subjects</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= htmlspecialchars($subject['id']) ?>"
                                    <?= (isset($filters['subject_id']) && $filters['subject_id'] == $subject['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($subject['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label for="course">Course</label>
                        <select id="course" name="course">
                            <option value="">All Courses</option>
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
                        <label for="city_id">Location</label>
                        <select id="city_id" name="city_id">
                            <option value="">All Locations</option>
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
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn">Search Courses</button>
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
                            <span class="formation-domain"><strong>Domain:</strong> <?= htmlspecialchars($formation['domain_name']) ?></span><br>
                            <span class="formation-subject"><strong>Subject:</strong> <?= htmlspecialchars($formation['subject_name']) ?></span>
                        </div>
                        <div class="formation-details">
                            <div class="formation-detail" data-city-id="<?= htmlspecialchars($formation['city_id']) ?>">
                                <span class="formation-detail-icon">📍</span>
                                <span><?= htmlspecialchars($formation['city_name']) ?></span>
                            </div>
                            <div class="formation-detail">
                                <span class="formation-detail-icon">📅</span>
                                <span><?= htmlspecialchars($formation['start_date'] ?? 'TBD') ?></span>
                            </div>
                            <div class="formation-detail">
                                <span class="formation-detail-icon">👨‍🏫</span>
                                <span><?= htmlspecialchars($formation['trainer_name']) ?></span>
                            </div>
                            <div class="formation-detail">
                                <span class="formation-detail-icon"><?= $formation['mode'] === 'online' ? '🖥️' : '🏢' ?></span>
                                <span><?= $formation['mode'] === 'online' ? 'Online' : 'On-site' ?></span>
                            </div>
                        </div>
                        <div class="formation-actions">
                            <span class="formation-price">€<?= htmlspecialchars($formation['price']) ?></span>
                            <a href="#" class="btn">Register</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <a href="#" class="pagination-item active">1</a>
            <a href="#" class="pagination-item">2</a>
            <a href="#" class="pagination-item">3</a>
            <a href="#" class="pagination-item">4</a>
            <a href="#" class="pagination-item">5</a>
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