-- Insertion des managers
INSERT INTO `manager` (`name`) VALUES 
('Alice Dupont'),
('Bob Martin'),
('Charlie Durand');

-- Insertion des étudiants
INSERT INTO `student` (`username`, `firstname`, `lastname`, `email`, `phone_number`, `manager_id`)
VALUES
('jdoe', 'John', 'Doe', 'jdoe@example.com', '1234567890', (SELECT id FROM manager WHERE name = 'Alice Dupont')),
('asmith', 'Anna', 'Smith', 'asmith@example.com', '1234567891', (SELECT id FROM manager WHERE name = 'Alice Dupont')),
('bwilliams', 'Brian', 'Williams', 'bwilliams@example.com', '1234567892', (SELECT id FROM manager WHERE name = 'Bob Martin')),
('cmiller', 'Carol', 'Miller', 'cmiller@example.com', '1234567893', (SELECT id FROM manager WHERE name = 'Bob Martin')),
('djohnson', 'David', 'Johnson', 'djohnson@example.com', '1234567894', (SELECT id FROM manager WHERE name = 'Charlie Durand')),
('ewilson', 'Emma', 'Wilson', 'ewilson@example.com', '1234567895', (SELECT id FROM manager WHERE name = 'Charlie Durand')),
('ffrancis', 'Frank', 'Francis', 'ffrancis@example.com', '1234567896', (SELECT id FROM manager WHERE name = 'Alice Dupont')),
('ggarcia', 'Grace', 'Garcia', 'ggarcia@example.com', '1234567897', (SELECT id FROM manager WHERE name = 'Bob Martin')),
('hrodriguez', 'Hank', 'Rodriguez', 'hrodriguez@example.com', '1234567898', (SELECT id FROM manager WHERE name = 'Charlie Durand')),
('ijones', 'Ivy', 'Jones', 'ijones@example.com', '1234567899', (SELECT id FROM manager WHERE name = 'Alice Dupont'));

-- Insertion des chapitres
INSERT INTO `chapter` (`title`) VALUES
('Introduction à la Programmation'),
('Bases de Données'),
('Développement Web'),
('Intelligence Artificielle');

-- Insertion des modules
INSERT INTO `module` (`title`, `chapter_id`) VALUES
('Variables et Types de Données', (SELECT id FROM chapter WHERE title = 'Introduction à la Programmation')),
('Structures de Contrôle', (SELECT id FROM chapter WHERE title = 'Introduction à la Programmation')),
('Fonctions et Modules', (SELECT id FROM chapter WHERE title = 'Introduction à la Programmation')),
('Conception de Bases de Données', (SELECT id FROM chapter WHERE title = 'Bases de Données')),
('SQL Avancé', (SELECT id FROM chapter WHERE title = 'Bases de Données')),
('Indexation et Optimisation', (SELECT id FROM chapter WHERE title = 'Bases de Données')),
('HTML et CSS', (SELECT id FROM chapter WHERE title = 'Développement Web')),
('JavaScript', (SELECT id FROM chapter WHERE title = 'Développement Web')),
('Frameworks Frontend', (SELECT id FROM chapter WHERE title = 'Développement Web')),
('Backend avec Node.js', (SELECT id FROM chapter WHERE title = 'Développement Web')),
('Introduction au Machine Learning', (SELECT id FROM chapter WHERE title = 'Intelligence Artificielle')),
('Réseaux de Neurones', (SELECT id FROM chapter WHERE title = 'Intelligence Artificielle')),
('Apprentissage Profond', (SELECT id FROM chapter WHERE title = 'Intelligence Artificielle')),
('Traitement du Langage Naturel', (SELECT id FROM chapter WHERE title = 'Intelligence Artificielle')),
('Vision par Ordinateur', (SELECT id FROM chapter WHERE title = 'Intelligence Artificielle')),
('Algorithmes Génétiques', (SELECT id FROM chapter WHERE title = 'Intelligence Artificielle'));

-- Insertion des associations de modules aux étudiants (5 cours par étudiant)
INSERT INTO `student_module` (`module_id`, `student_id`)
VALUES
((SELECT id FROM module WHERE title = 'Variables et Types de Données'), (SELECT id FROM student WHERE username = 'jdoe')),
((SELECT id FROM module WHERE title = 'Structures de Contrôle'), (SELECT id FROM student WHERE username = 'jdoe')),
((SELECT id FROM module WHERE title = 'Fonctions et Modules'), (SELECT id FROM student WHERE username = 'jdoe')),
((SELECT id FROM module WHERE title = 'Conception de Bases de Données'), (SELECT id FROM student WHERE username = 'jdoe')),
((SELECT id FROM module WHERE title = 'SQL Avancé'), (SELECT id FROM student WHERE username = 'jdoe')),

((SELECT id FROM module WHERE title = 'Indexation et Optimisation'), (SELECT id FROM student WHERE username = 'asmith')),
((SELECT id FROM module WHERE title = 'HTML et CSS'), (SELECT id FROM student WHERE username = 'asmith')),
((SELECT id FROM module WHERE title = 'JavaScript'), (SELECT id FROM student WHERE username = 'asmith')),
((SELECT id FROM module WHERE title = 'Frameworks Frontend'), (SELECT id FROM student WHERE username = 'asmith')),
((SELECT id FROM module WHERE title = 'Backend avec Node.js'), (SELECT id FROM student WHERE username = 'asmith')),

((SELECT id FROM module WHERE title = 'Introduction au Machine Learning'), (SELECT id FROM student WHERE username = 'bwilliams')),
((SELECT id FROM module WHERE title = 'Réseaux de Neurones'), (SELECT id FROM student WHERE username = 'bwilliams')),
((SELECT id FROM module WHERE title = 'Apprentissage Profond'), (SELECT id FROM student WHERE username = 'bwilliams')),
((SELECT id FROM module WHERE title = 'Traitement du Langage Naturel'), (SELECT id FROM student WHERE username = 'bwilliams')),
((SELECT id FROM module WHERE title = 'Vision par Ordinateur'), (SELECT id FROM student WHERE username = 'bwilliams')),

((SELECT id FROM module WHERE title = 'Variables et Types de Données'), (SELECT id FROM student WHERE username = 'cmiller')),
((SELECT id FROM module WHERE title = 'Fonctions et Modules'), (SELECT id FROM student WHERE username = 'cmiller')),
((SELECT id FROM module WHERE title = 'SQL Avancé'), (SELECT id FROM student WHERE username = 'cmiller')),
((SELECT id FROM module WHERE title = 'HTML et CSS'), (SELECT id FROM student WHERE username = 'cmiller')),
((SELECT id FROM module WHERE title = 'Frameworks Frontend'), (SELECT id FROM student WHERE username = 'cmiller')),

((SELECT id FROM module WHERE title = 'Structures de Contrôle'), (SELECT id FROM student WHERE username = 'djohnson')),
((SELECT id FROM module WHERE title = 'Conception de Bases de Données'), (SELECT id FROM student WHERE username = 'djohnson')),
((SELECT id FROM module WHERE title = 'Indexation et Optimisation'), (SELECT id FROM student WHERE username = 'djohnson')),
((SELECT id FROM module WHERE title = 'JavaScript'), (SELECT id FROM student WHERE username = 'djohnson')),
((SELECT id FROM module WHERE title = 'Backend avec Node.js'), (SELECT id FROM student WHERE username = 'djohnson')),

((SELECT id FROM module WHERE title = 'Introduction au Machine Learning'), (SELECT id FROM student WHERE username = 'ewilson')),
((SELECT id FROM module WHERE title = 'Réseaux de Neurones'), (SELECT id FROM student WHERE username = 'ewilson')),
((SELECT id FROM module WHERE title = 'Apprentissage Profond'), (SELECT id FROM student WHERE username = 'ewilson')),
((SELECT id FROM module WHERE title = 'Traitement du Langage Naturel'), (SELECT id FROM student WHERE username = 'ewilson')),
((SELECT id FROM module WHERE title = 'Vision par Ordinateur'), (SELECT id FROM student WHERE username = 'ewilson')),

((SELECT id FROM module WHERE title = 'Algorithmes Génétiques'), (SELECT id FROM student WHERE username = 'ffrancis')),
((SELECT id FROM module WHERE title = 'Variables et Types de Données'), (SELECT id FROM student WHERE username = 'ffrancis')),
((SELECT id FROM module WHERE title = 'Structures de Contrôle'), (SELECT id FROM student WHERE username = 'ffrancis')),
((SELECT id FROM module WHERE title = 'Fonctions et Modules'), (SELECT id FROM student WHERE username = 'ffrancis')),
((SELECT id FROM module WHERE title = 'Conception de Bases de Données'), (SELECT id FROM student WHERE username = 'ffrancis')),

((SELECT id FROM module WHERE title = 'SQL Avancé'), (SELECT id FROM student WHERE username = 'ggarcia')),
((SELECT id FROM module WHERE title = 'Indexation et Optimisation'), (SELECT id FROM student WHERE username = 'ggarcia')),
((SELECT id FROM module WHERE title = 'HTML et CSS'), (SELECT id FROM student WHERE username = 'ggarcia')),
((SELECT id FROM module WHERE title = 'JavaScript'), (SELECT id FROM student WHERE username = 'ggarcia')),
((SELECT id FROM module WHERE title = 'Frameworks Frontend'), (SELECT id FROM student WHERE username = 'ggarcia')),

((SELECT id FROM module WHERE title = 'Backend avec Node.js'), (SELECT id FROM student WHERE username = 'hrodriguez')),
((SELECT id FROM module WHERE title = 'Introduction au Machine Learning'), (SELECT id FROM student WHERE username = 'hrodriguez')),
((SELECT id FROM module WHERE title = 'Réseaux de Neurones'), (SELECT id FROM student WHERE username = 'hrodriguez')),
((SELECT id FROM module WHERE title = 'Apprentissage Profond'), (SELECT id FROM student WHERE username = 'hrodriguez')),
((SELECT id FROM module WHERE title = 'Traitement du Langage Naturel'), (SELECT id FROM student WHERE username = 'hrodriguez')),

((SELECT id FROM module WHERE title = 'Vision par Ordinateur'), (SELECT id FROM student WHERE username = 'ijones')),
((SELECT id FROM module WHERE title = 'Algorithmes Génétiques'), (SELECT id FROM student WHERE username = 'ijones')),
((SELECT id FROM module WHERE title = 'Variables et Types de Données'), (SELECT id FROM student WHERE username = 'ijones')),
((SELECT id FROM module WHERE title = 'Structures de Contrôle'), (SELECT id FROM student WHERE username = 'ijones')),
((SELECT id FROM module WHERE title = 'Fonctions et Modules'), (SELECT id FROM student WHERE username = 'ijones'));
