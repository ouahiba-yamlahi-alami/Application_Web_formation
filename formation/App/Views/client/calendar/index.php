<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormExpert - Training Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../../../../css/calendar.css" />
    <link rel="stylesheet" href="../../../../css/styles.css" />
</head>
<body>
<!-- Banner -->
<section class="banner">
    <div class="container">
        <h1>Training Calendar</h1>
        <p>Explore our upcoming training sessions and register for the courses that match your career goals.</p>
    </div>
</section>

<!-- Calendar Section -->
<section class="calendar-section">
    <div class="container">
        <div class="calendar-filter">
            <h2>Find Upcoming Training Sessions</h2>
            <form id="calendar-filter-form">
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="domain">Domain</label>
                        <select id="domain" name="domain">
                            <option value="">All Domains</option>
                            <option value="1">Management</option>
                            <option value="2">Computer Science</option>
                            <option value="3">Data Science</option>
                            <option value="4">Design</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject">
                            <option value="">All Subjects</option>
                            <!-- Subjects will be loaded dynamically based on domain selection -->
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="course">Course</label>
                        <select id="course" name="course">
                            <option value="">All Courses</option>
                            <!-- Courses will be loaded dynamically based on subject selection -->
                        </select>
                    </div>
                </div>
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="location">Location</label>
                        <select id="location" name="location">
                            <option value="">All Locations</option>
                            <option value="1">Paris, France</option>
                            <option value="2">London, UK</option>
                            <option value="3">New York, USA</option>
                            <option value="4">Online</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="date_from">Date From</label>
                        <input type="date" id="date_from" name="date_from">
                    </div>
                    <div class="filter-group">
                        <label for="date_to">Date To</label>
                        <input type="date" id="date_to" name="date_to">
                    </div>
                </div>
                <div class="filter-buttons">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="calendar-results">
            <h2>Upcoming Training Sessions</h2>
            <table class="calendar-table">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Format</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Example Data - This would be generated dynamically from PHP -->
                <tr>
                    <td>Scrum Master Certification</td>
                    <td>May 15-17, 2025</td>
                    <td><span class="location"><i class="fas fa-map-marker-alt"></i> Paris, France</span></td>
                    <td><span class="format in-person">In-person</span></td>
                    <td><span class="price">€1,200</span></td>
                    <td><a href="#" class="btn-register">Register</a></td>
                </tr>
                <tr>
                    <td>Web Technologies Bootcamp</td>
                    <td>May 20-25, 2025</td>
                    <td><span class="location"><i class="fas fa-desktop"></i> Online</span></td>
                    <td><span class="format online">Online</span></td>
                    <td><span class="price">€950</span></td>
                    <td><a href="#" class="btn-register">Register</a></td>
                </tr>
                <tr>
                    <td>ITIL Foundation</td>
                    <td>June 5-7, 2025</td>
                    <td><span class="location"><i class="fas fa-map-marker-alt"></i> London, UK</span></td>
                    <td><span class="format in-person">In-person</span></td>
                    <td><span class="price">€1,100</span></td>
                    <td><a href="#" class="btn-register">Register</a></td>
                </tr>
                <tr>
                    <td>Big Data with Hadoop</td>
                    <td>June 10-14, 2025</td>
                    <td><span class="location"><i class="fas fa-desktop"></i> Online</span></td>
                    <td><span class="format online">Online</span></td>
                    <td><span class="price">€1,300</span></td>
                    <td><a href="#" class="btn-register">Register</a></td>
                </tr>
                <tr>
                    <td>Prince 2 Foundation</td>
                    <td>June 20-22, 2025</td>
                    <td><span class="location"><i class="fas fa-map-marker-alt"></i> New York, USA</span></td>
                    <td><span class="format in-person">In-person</span></td>
                    <td><span class="price">$1,400</span></td>
                    <td><a href="#" class="btn-register">Register</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    // JavaScript to handle dynamic loading of subjects and courses based on domain selection
    document.addEventListener('DOMContentLoaded', function() {
        const domainSelect = document.getElementById('domain');
        const subjectSelect = document.getElementById('subject');
        const courseSelect = document.getElementById('course');

        // Sample data structure - In a real application, this would come from a database
        const courseData = {
            '1': { // Management
                'name': 'Management',
                'subjects': {
                    '1': {
                        'name': 'Project Management',
                        'courses': [
                            { 'id': '1', 'name': 'Scrum' },
                            { 'id': '2', 'name': 'Prince 2' }
                        ]
                    },
                    '2': {
                        'name': 'Service Management',
                        'courses': [
                            { 'id': '3', 'name': 'ITIL' },
                            { 'id': '4', 'name': 'COBIT' }
                        ]
                    }
                }
            },
            '2': { // Computer Science
                'name': 'Computer Science',
                'subjects': {
                    '3': {
                        'name': 'IT',
                        'courses': [
                            { 'id': '5', 'name': 'JEE' },
                            { 'id': '6', 'name': 'Web Technologies' }
                        ]
                    },
                    '4': {
                        'name': 'Big Data',
                        'courses': [
                            { 'id': '7', 'name': 'Hadoop' },
                            { 'id': '8', 'name': 'Spark' }
                        ]
                    }
                }
            }
        };

        // Function to update subject dropdown based on domain selection
        function updateSubjects() {
            // Clear current options
            subjectSelect.innerHTML = '<option value="">All Subjects</option>';
            courseSelect.innerHTML = '<option value="">All Courses</option>';

            const selectedDomain = domainSelect.value;
            if (selectedDomain && courseData[selectedDomain]) {
                const subjects = courseData[selectedDomain].subjects;
                for (const subjectId in subjects) {
                    const option = document.createElement('option');
                    option.value = subjectId;
                    option.textContent = subjects[subjectId].name;
                    subjectSelect.appendChild(option);
                }
            }
        }

        // Function to update course dropdown based on subject selection
        function updateCourses() {
            // Clear current options
            courseSelect.innerHTML = '<option value="">All Courses</option>';

            const selectedDomain = domainSelect.value;
            const selectedSubject = subjectSelect.value;

            if (selectedDomain && selectedSubject &&
                courseData[selectedDomain] &&
                courseData[selectedDomain].subjects[selectedSubject]) {

                const courses = courseData[selectedDomain].subjects[selectedSubject].courses;
                courses.forEach(course => {
                    const option = document.createElement('option');
                    option.value = course.id;
                    option.textContent = course.name;
                    courseSelect.appendChild(option);
                });
            }
        }

        // Add event listeners
        domainSelect.addEventListener('change', updateSubjects);
        subjectSelect.addEventListener('change', updateCourses);

        // Form submission handler
        document.getElementById('calendar-filter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Search functionality would be implemented with PHP and AJAX');
        });
    });
</script>
</body>
</html>