-- Désactivation des contraintes de clés étrangères
SET FOREIGN_KEY_CHECKS = 0;

-- Suppression des données de toutes les tables
DELETE FROM `student_module`;
DELETE FROM `favorite`;
DELETE FROM `module`;
DELETE FROM `chapter`;
DELETE FROM `student`;
DELETE FROM `manager`;

-- Réactivation des contraintes de clés étrangères
SET FOREIGN_KEY_CHECKS = 1;
