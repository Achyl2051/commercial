create database rh;
use rh;

-- Création de la table services
CREATE TABLE services (
    idService INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

-- Insertion de données dans la table services
INSERT INTO services (nom) VALUES ('Administration');
INSERT INTO services (nom) VALUES ('Commerce');
INSERT INTO services (nom) VALUES ('Marketing');
INSERT INTO services (nom) VALUES ('Informatique');
INSERT INTO services (nom) VALUES ('Security');

-- Création de la table offres
CREATE TABLE offres (
    idOffre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    nombre INT,
    idService INT,
    isValid INT
);

-- Insertion de données dans la table offres
INSERT INTO offres (nom, nombre, idService, isValid) VALUES ('Gardien de nuit', 1, 5, 0);

-- Création de la table villes
CREATE TABLE villes (
    idVille INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

-- Insertion de données dans la table villes
INSERT INTO villes (nom) VALUES ('Antananarivo-Andoharanofotsy');
INSERT INTO villes (nom) VALUES ('Antanananrivo-Analakely');
INSERT INTO villes (nom) VALUES ('Toamasina-barikadimy');
INSERT INTO villes (nom) VALUES ('Antananarivo-Ambondrona');

-- Création de la table candidats
CREATE TABLE candidats (
    idCandidat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(100),
    genre VARCHAR(25),
    telephone VARCHAR(25),
    datenaissance DATE,
    nationalite VARCHAR(50),
    adresse VARCHAR(50),
    idVille INT
);

-- Insertion de données dans la table candidats
INSERT INTO candidats (nom, prenom, genre, telephone, datenaissance, nationalite, adresse, idVille)
VALUES ('Dupont', 'Jean', 'Homme', '+123456789', '1990-05-15', 'Française', '123 Rue de la Ville', 1);

-- Création de la table domainecvs
CREATE TABLE domainecvs (
    idDomainecv INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

-- Insertion de données dans la table domainecvs
INSERT INTO domainecvs (nom) VALUES ('Diplomes');
INSERT INTO domainecvs (nom) VALUES ('Experience');
INSERT INTO domainecvs (nom) VALUES ('Situation');

-- Création de la table typedomainecvs
CREATE TABLE typedomainecvs (
    idTypecv INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT,
    idDomainecv INT,
    nom VARCHAR(50),
    point DOUBLE PRECISION
);

-- Insertion de données dans la table typedomainecvs
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (1, 1, 'Bacc', 2);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (1, 1, 'License', 5);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (1, 1, 'Master I', 10);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (1, 1, 'Master II', 14);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (1, 1, 'Doctorat', 18);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (2, 1, '0-1 ans', 2);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (2, 1, '1-2 ans', 4);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (2, 1, '2-5 ans', 8);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (2, 1, '5-10 ans', 12);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (2, 1, '+10 ans', 15);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (3, 1, 'Celibataires', 5);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (3, 1, 'Maries', 8);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (3, 1, 'Maries + enfant(s)', 10);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (3, 1, 'Veuf/veuve', 10);
INSERT INTO typedomainecvs (idDomainecv, idOffre, nom, point) VALUES (3, 1, 'Divorces', 2);

-- Création de la table cvcandidats
CREATE TABLE cvcandidats (
    idCvcandidat INT AUTO_INCREMENT PRIMARY KEY,
    idDomainecv INT,
    idTypecv INT
);

-- Création de la table questionnaires
CREATE TABLE questionnaires (
    idQuestionnaire INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT,
    question VARCHAR(100),
    coefficient DOUBLE PRECISION
);

-- Insertion de données dans la table questionnaires
INSERT INTO questionnaires (idOffre, question, coefficient) VALUES (1, 'Que feriez-vous à votre arrivée', 2);
INSERT INTO questionnaires (idOffre, question, coefficient) VALUES (1, 'Que feriez-vous en cas de cambriolage', 5);
INSERT INTO questionnaires (idOffre, question, coefficient) VALUES (1, 'Votre vie ou la société', 5);

-- Création de la table qreponses
CREATE TABLE qreponses (
    idQreponse INT AUTO_INCREMENT PRIMARY KEY,
    idQuestionnaire INT,
    reponse VARCHAR(50)
);

-- Insertion de données dans la table qreponses
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (1, 'Se préparer au travail');
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (1, 'Se reposer');
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (2, 'Senfuir');
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (2, 'Appeler la police');
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (2, 'Défendre les lieux');
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (3, 'Ma vie');
INSERT INTO qreponses (idQuestionnaire, reponse) VALUES (3, 'La société');

-- Création de la table qreponsejustes
CREATE TABLE qreponsejustes (
    idQuestionnaire INT,
    idQreponse INT
);

-- Insertion de données dans la table qreponsejustes
INSERT INTO qreponsejustes (idQuestionnaire, idQreponse) VALUES (1, 1);
INSERT INTO qreponsejustes (idQuestionnaire, idQreponse) VALUES (2, 4);
INSERT INTO qreponsejustes (idQuestionnaire, idQreponse) VALUES (2, 5);
INSERT INTO qreponsejustes (idQuestionnaire, idQreponse) VALUES (3, 6);
INSERT INTO qreponsejustes (idQuestionnaire, idQreponse) VALUES (3, 7);

-- Création de la table qreponsecandidats
CREATE TABLE qreponsecandidats (
    idCandidat INT,
    idQuestionnaire INT,
    idQreponse INT
);

-- Création de la table pointcvs
CREATE TABLE pointcvs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT REFERENCES offres(idOffre),
    idCandidat INT REFERENCES candidats(idCandidat),
    point DOUBLE PRECISION
);

-- Création de la table pointtests
CREATE TABLE pointtests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT REFERENCES offres(idOffre),
    idCandidat INT REFERENCES candidats(idCandidat),
    point DOUBLE PRECISION
);

-- Création de la table pointcriteres
CREATE TABLE pointcriteres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT REFERENCES offres(idOffre),
    idCandidat INT REFERENCES candidats(idCandidat),
    point DOUBLE PRECISION
);

-- Création de la table resultatoffres
CREATE TABLE resultatoffres (
    idResultatOffre INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT,
    idCandidat INT,
    point DOUBLE PRECISION
);

-- Création de la table entretiens
CREATE TABLE entretiens (
    idEntretien INT AUTO_INCREMENT PRIMARY KEY,
    idOffre INT,
    idCandidat INT,
    daty DATE
);