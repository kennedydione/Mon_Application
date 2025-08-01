CREATE DATABASE IF NOT EXISTS navetane;
USE navetane;

CREATE TABLE IF NOT EXISTS match (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipe1 VARCHAR(100),
    equipe2 VARCHAR(100),
    date_match DATE,
    heure_convocation TIME,
    statut ENUM('à venir', 'en cours', 'terminé')
);

INSERT INTO match (equipe1, equipe2, date_match, heure_convocation, statut)
VALUES ('ASC HLM', 'ASC Médina', CURDATE(), '16:00:00', 'à venir');
