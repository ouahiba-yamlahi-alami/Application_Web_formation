# Project Setup
## Concepts clés et configuration
- Architecture MVC
- Programmation Orientée Objet (POO)
- Autoloading (Chargement automatique des classes)

## Step 1: Create a Project Folder

- mkdir Application_Web
- cd Application_Web/
  
## Step 2: Create the docker-compose.yml file

Create a simple LAMP stack (Linux + Apache + MySQL + PHP) to run 
my web application using **Docker**.

Note : Docker/Composer versions
```
docker -v
composer -v
```
- Docker version 27.3.1, build ce12230
- Composer version 2.8.4 2024-12-11 11:57:47

## Step 3: Create formation/index.php
This will help test if PHP is working.

```php
<?php
phpinfo()
```

## Step 4: Start Docker Environment

```
docker-compose up -d
```
## Step 5: Lancer la commande pour générer l’autoload :
```
composer init
composer dump-autoload
```
### Then go to:

- http://localhost:8080 → PHP web app

- http://localhost:8081 → phpMyAdmin

### Login with:

- User: root
- Password: root

### Warning: mkdir(): Permission denied : 

sudo chown -R www-data:www-data uploads              
sudo chmod -R 755 uploads

## Simple Data :

```
-- Insert countries
INSERT INTO countries (name) VALUES
('France'), ('Germany'), ('UK'), ('Spain'), ('Remote');
```
```
-- Insert cities
INSERT INTO cities (name, country_id) VALUES
('Paris', 1), ('Berlin', 2), ('London', 3), ('Madrid', 4), ('Remote', 5);
```

```
-- Insert domains
INSERT INTO domain (name, description) VALUES 
('Management', 'Project management methodologies including Scrum, Prince2, and service management frameworks like ITIL and COBIT.'),
('Computer Science', 'Technical computer science topics including programming and data processing'),
('Networking', 'Network infrastructure and certification courses including CISCO certifications and network security.'),
('IT Development', 'Programming and development courses covering JEE, Web Technologies, and other cutting-edge frameworks.'),
('Big Data', 'Advanced courses on data processing frameworks including Hadoop, Spark, and modern analytics tools.');
```

```
-- Insert subjects
INSERT INTO subjects (name, shortDescription, longDescription, individualBenefit, businessBenefit, logo, domain_id) VALUES
('Project Management', 'Project management methodologies', 'Various methodologies for project management including agile and traditional approaches', 'Career advancement and improved leadership skills', 'Better project outcomes and efficient resource utilization', '/images/project-management.png', 1),
('Service Management', 'IT service management frameworks', 'Frameworks for managing IT services and operations', 'Professional certification and expertise', 'Improved service delivery and operational efficiency', '/images/service-management.png', 1),
('Programming', 'Modern programming languages and paradigms', 'Various programming languages and development approaches', 'Technical skill development', 'Development capability and digital transformation', '/images/programming.png', 2),
('Data Processing', 'Big data frameworks and tools', 'Technologies for processing and analyzing large datasets', 'Data analysis skills', 'Data-driven decision making capabilities', '/images/data-processing.png', 3),
('Web Development', 'Modern web technologies', 'Frontend and backend technologies for web applications', 'Web development expertise', 'Digital presence and application development', '/images/web-dev.png', 2);
```

```
-- Insert courses
INSERT INTO courses (name, content, description, audience, duration, testIncluded, testContent, logo, subject_id) VALUES
('Scrum Fundamentals', 'Scrum methodology basics and implementation', 'Core principles and practices of the Scrum framework', 'Project managers, team leads, and developers', '3 days', 'Yes', 'Multiple choice and scenario-based questions', '/images/scrum.png', 1),
('ITIL Foundation', 'ITIL framework basics and best practices', 'Core concepts of IT service management using ITIL', 'IT managers and service delivery professionals', '3 days', 'Yes', 'ITIL Foundation certification exam preparation', '/images/itil.png', 1),
('COBIT 2019 Foundation', 'COBIT governance framework principles', 'Comprehensive overview of the COBIT governance framework', 'IT governance professionals and managers', '3 days', 'Yes', 'COBIT certification examination', '/images/cobit.png', 1),
('Advanced JEE Development', 'Enterprise Java programming techniques', 'Advanced Java EE development principles and practices', 'Experienced Java developers', '5 days', 'No', 'Practical project implementation', '/images/jee.png', 3),
('Big Data with Hadoop', 'Hadoop ecosystem and implementation', 'Working with the Hadoop framework for big data processing', 'Data engineers and analysts', '5 days', 'Yes', 'Hadoop certification preparation', '/images/hadoop.png', 4),
('Modern Web Technologies', 'Current web development frameworks', 'Frontend and backend technologies for modern web applications', 'Web developers of all levels', '5 days', 'No', 'Portfolio project development', '/images/web-tech.png', 5);
```

```
-- Insert trainers
INSERT INTO trainers (firstName, lastName, description, photo) VALUES
('Michel', 'Dubois', 'Certified Scrum Master with 10+ years of experience in agile methodologies', '/images/trainers/michel.jpg'),
('Sophie', 'Martin', 'ITIL Expert with extensive experience in service management', '/images/trainers/sophie.jpg'),
('Hans', 'Mueller', 'Java architect with 15 years of enterprise development experience', '/images/trainers/hans.jpg'),
('James', 'Wilson', 'Big Data specialist and Apache committer', '/images/trainers/james.jpg'),
('Elena', 'Rodriguez', 'COBIT certified consultant with governance expertise', '/images/trainers/elena.jpg'),
('David', 'Chen', 'Full-stack developer specializing in modern web frameworks', '/images/trainers/david.jpg');
```

```
-- Insert formations
INSERT INTO formations (price, mode, course_id, city_id, trainer_id) VALUES
(1200.00, 'présentiel', 1, 1, 1), -- Scrum in Paris with Michel
(950.00, 'distanciel', 2, 5, 2), -- ITIL Remote with Sophie
(1800.00, 'présentiel', 4, 2, 3), -- JEE in Berlin with Hans
(2200.00, 'présentiel', 5, 3, 4), -- Hadoop in London with James
(1350.00, 'présentiel', 3, 4, 5), -- COBIT in Madrid with Elena
(1500.00, 'distanciel', 6, 5, 6); -- Web Tech Remote with David
```

```
-- Insert formation dates
INSERT INTO formationDate (date, formation_id) VALUES
('2025-06-15', 1), -- Scrum day 1
('2025-06-16', 1), -- Scrum day 2
('2025-06-17', 1), -- Scrum day 3
('2025-07-05', 2), -- ITIL day 1
('2025-07-06', 2), -- ITIL day 2
('2025-07-07', 2), -- ITIL day 3
('2025-06-22', 3), -- JEE day 1
('2025-06-23', 3), -- JEE day 2
('2025-06-24', 3), -- JEE day 3
('2025-06-25', 3), -- JEE day 4
('2025-06-26', 3), -- JEE day 5
('2025-07-10', 4), -- Hadoop day 1
('2025-07-11', 4), -- Hadoop day 2
('2025-07-12', 4), -- Hadoop day 3
('2025-07-13', 4), -- Hadoop day 4
('2025-07-14', 4), -- Hadoop day 5
('2025-08-03', 5), -- COBIT day 1
('2025-08-04', 5), -- COBIT day 2
('2025-08-05', 5), -- COBIT day 3
('2025-07-20', 6), -- Web Tech day 1
('2025-07-21', 6), -- Web Tech day 2
('2025-07-22', 6), -- Web Tech day 3
('2025-07-23', 6), -- Web Tech day 4
('2025-07-24', 6); -- Web Tech day 5

-- Insert some sample registrations
INSERT INTO registrations (firstName, lastName, phone, email, company, paid, formation_id, registration_date) VALUES
('Jean', 'Dupont', '+33612345678', 'jean.dupont@example.com', 'Acme Corp', true, 1, '2025-05-10 14:30:00'),
('Marie', 'Laurent', '+33698765432', 'marie.laurent@example.com', 'Tech Solutions', false, 1, '2025-05-12 09:15:00'),
('Thomas', 'Schmidt', '+49123456789', 'thomas.schmidt@example.de', 'German Tech', true, 3, '2025-05-15 11:20:00'),
('Anna', 'Müller', '+49987654321', 'anna.mueller@example.de', 'Deutsche Software', false, 3, '2025-05-16 13:45:00'),
('John', 'Smith', '+44123456789', 'john.smith@example.co.uk', 'British Systems', true, 4, '2025-06-01 10:30:00'),
('Carlos', 'Garcia', '+34123456789', 'carlos.garcia@example.es', 'Spanish IT', false, 5, '2025-06-05 16:20:00'),
('Pierre', 'Martin', '+33687654321', 'pierre.martin@example.com', 'French Tech', true, 2, '2025-06-10 08:45:00'),
('Li', 'Wei', '+33612378945', 'li.wei@example.com', 'Global Solutions', false, 6, '2025-06-15 14:10:00');
```