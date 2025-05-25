-- Supprimer les tables si elles existent déjà (ordre inverse pour les relations)
DROP TABLE IF EXISTS registrations;
DROP TABLE IF EXISTS formationDate;
DROP TABLE IF EXISTS formations;
DROP TABLE IF EXISTS trainers;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS subjects;
DROP TABLE IF EXISTS domain;
DROP TABLE IF EXISTS cities;
DROP TABLE IF EXISTS countries;
DROP TABLE IF EXISTS contacts;

-- Table des pays
CREATE TABLE countries (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           name VARCHAR(100) NOT NULL
);

-- Table des villes
CREATE TABLE cities (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        country_id INT NOT NULL,
                        FOREIGN KEY (country_id) REFERENCES countries(id)
);

-- Table des domaines
CREATE TABLE domain (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        description VARCHAR(250) NOT NULL
);

-- Table des sujets
CREATE TABLE subjects (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100) NOT NULL,
                          shortDescription VARCHAR(100) NOT NULL,
                          longDescription VARCHAR(250) NOT NULL,
                          individualBenefit VARCHAR(250) NOT NULL,
                          businessBenefit VARCHAR(250) NOT NULL,
                          logo VARCHAR(250) NOT NULL,
                          domain_id INT NOT NULL,
                          FOREIGN KEY (domain_id) REFERENCES domain(id)
);

-- Table des cours
CREATE TABLE courses (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(100) NOT NULL,
                         content VARCHAR(250) NOT NULL,
                         description VARCHAR(250) NOT NULL,
                         audience VARCHAR(250) NOT NULL,
                         duration VARCHAR(250) NOT NULL,
                         testIncluded VARCHAR(250) NOT NULL,
                         testContent VARCHAR(250) NOT NULL,
                         logo VARCHAR(250) NOT NULL,
                         subject_id INT NOT NULL,
                         FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

-- Table des formateurs
CREATE TABLE trainers (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          firstName VARCHAR(100) NOT NULL,
                          lastName VARCHAR(100) NOT NULL,
                          description VARCHAR(250) NOT NULL,
                          photo VARCHAR(255)
);

-- Table des formations
CREATE TABLE formations (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            price DECIMAL(10,2) NOT NULL,
                            mode ENUM('présentiel', 'distanciel') NOT NULL,
                            course_id INT NOT NULL,
                            city_id INT NOT NULL,
                            trainer_id INT NOT NULL,
                            FOREIGN KEY (course_id) REFERENCES courses(id),
                            FOREIGN KEY (city_id) REFERENCES cities(id),
                            FOREIGN KEY (trainer_id) REFERENCES trainers(id)
);

-- Table des dates de formation
CREATE TABLE formationDate (
                               id INT AUTO_INCREMENT PRIMARY KEY,
                               date DATE NOT NULL,
                               formation_id INT NOT NULL,
                               FOREIGN KEY (formation_id) REFERENCES formations(id)
);

-- Table des inscriptions
CREATE TABLE registrations (
                               id INT AUTO_INCREMENT PRIMARY KEY,
                               firstName VARCHAR(100) NOT NULL,
                               lastName VARCHAR(100) NOT NULL,
                               phone VARCHAR(100) NOT NULL,
                               email VARCHAR(100) NOT NULL,
                               company VARCHAR(100) NOT NULL,
                               paid BOOLEAN,
                               formation_id INT NOT NULL,
                               registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                               FOREIGN KEY (formation_id) REFERENCES formations(id)
);

CREATE TABLE contacts (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100) NOT NULL,
                          email VARCHAR(100) NOT NULL,
                          phone VARCHAR(50),
                          subject VARCHAR(150) NOT NULL,
                          message TEXT NOT NULL,
                          submitted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

