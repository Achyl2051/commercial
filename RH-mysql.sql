create table Users(
  idUser int primary key auto_increment,
  name varchar(50),
  email varchar(50),
  password varchar(255)
) ENGINE = InnoDB;

create table Services(
  idService int primary key auto_increment,
  nom varchar(50)
) ENGINE = InnoDB;

insert into Services(nom)
values ('Administration');
insert into Services(nom)
values ('Commerce');
insert into Services(nom)
values ('Marketing');
insert into Services(nom)
values ('Informatique');

create table Offres(
  idOffre int primary key auto_increment,
  nom varchar(50),
  nombre int,
  idservice int,
  date date not null,
  isValid int default 0,
  description text
) ENGINE = InnoDB;

create table Questionnaires(
  idQuestionnaire int primary key auto_increment,
  idOffre int,
  question text,
  coefficient int
) ENGINE = InnoDB;

create table Qreponses(
  idQuestionnaire int,
  reponse varchar(200)
) ENGINE = InnoDB;

create table Qreponsejustes(
  idQuestionnaire int,
  reponse varchar(200)
) ENGINE = InnoDB;

-- Admin 
create table Domainecvs(
  idDomainecv int primary key auto_increment,
  nom varchar(50)
) ENGINE = InnoDB;

insert into domainecvs(nom)
values('Diplomes');
insert into domainecvs(nom)
values('Experience');
insert into domainecvs(nom)
values('Situation');
insert into domainecvs(nom)
values('Sexe');
insert into domainecvs(nom)
values('Nationalite');

create table Typedomainecvs(
  idTypedomainecv int primary key auto_increment,
  idOffre int,
  idDomainecv int,
  nom varchar(50),
  points float,
  foreign key (idOffre) REFERENCES Offres(idOffre)
) ENGINE = InnoDB;

-- candidats
create table Candidats(
  idCandidat int primary key auto_increment,
  nom varchar(50),
  prenom varchar(100),
  genre varchar(25),
  telephone varchar(25),
  datenaissance date,
  nationalite varchar(50),
  adresse varchar(50),
  idVille int
) ENGINE = InnoDB;

create table Cvcandidats(
  idCvcandidat int primary key auto_increment,
  idOffre int,
  idTypedomainecv int,
  note float,
  foreign key (idOffre) REFERENCES Offres(idOffre),
  foreign key (idTypedomainecv) REFERENCES Typedomainecvs(idTypedomainecv)
) ENGINE = InnoDB;

create table Pointcvs(
  idPointcv int primary key auto_increment,
  idOffre int REFERENCES offre(idOffre),
  idCandidat int REFERENCES Candidats(idCandidat),
  points double precision
) ENGINE = InnoDB;

create table Cvreponses(
  idCandidat int,
  idOffre int,
  idQuestionnaire int,
  note float,
  foreign key (idCandidat) REFERENCES Candidats(idCandidat),
  foreign key (idOffre) REFERENCES Offres(idOffre),
  foreign key (idQuestionnaire) REFERENCES Questionnaires(idQuestionnaire)
) ENGINE = InnoDB;
-- Création de la table pointtests
CREATE TABLE Pointtests (
  idPointtest INT AUTO_INCREMENT PRIMARY KEY,
  idOffre INT REFERENCES offres(idOffre),
  idCandidat INT REFERENCES candidats(idCandidat),
  point DOUBLE PRECISION
);
-- Création de la table pointcriteres
CREATE TABLE Pointcriteres (
  idPointcritere INT AUTO_INCREMENT PRIMARY KEY,
  idOffre INT REFERENCES offres(idOffre),
  idCandidat INT REFERENCES candidats(idCandidat),
  points DOUBLE PRECISION
);
-- Création de la table resultatoffres
CREATE TABLE Resultatoffres (
  idResultatOffre INT AUTO_INCREMENT PRIMARY KEY,
  idOffre INT,
  idCandidat INT,
  points DOUBLE PRECISION
);
-- Création de la table entretiens
CREATE TABLE Entretiens (
  idEntretien INT AUTO_INCREMENT PRIMARY KEY,
  idOffre INT,
  idCandidat INT,
  daty DATE
);
-- SUJET 2 10/10/23
-- Employés
create table Directions(
  idDirection INT AUTO_INCREMENT PRIMARY KEY,
  nom varchar(200)
) ENGINE = InnoDB;

insert into Directions values(1,'Ressources Humaine');
insert into Directions values(2,'Informatique');
insert into Directions values(3,'Marketing');
insert into Directions values(4,'Finance');


create table Fonctions(
  idFonction INT AUTO_INCREMENT PRIMARY KEY,
  idDirection int ,
  nom varchar(200),
  foreign key (idDirection) REFERENCES Directions(idDirection)
) ENGINE = InnoDB;

insert into Fonctions values(1,2,'Developpeur');
insert into Fonctions values(2,2,'Maintenance');
insert into Fonctions values(3,2,'Team leader');


create table Type_contrats(
  idTypeContrat INT AUTO_INCREMENT PRIMARY KEY,
  abreviation varchar(50),
  signification text
) ENGINE = InnoDB;

insert into Type_contrats values(1,'CDD','Contrat à Durée Determiné');
insert into Type_contrats values(2,'CDI','Contrat à Durée Indeterminé');
insert into Type_contrats values(3,'CE','Contrat d"essai');



create table Statut_maritals(
  idStatutMarital INT AUTO_INCREMENT PRIMARY KEY,
  situation varchar(200)
) ENGINE = InnoDB;

insert into Statut_maritals values(1,'Celibataire');
insert into Statut_maritals values(2,'Marié sans enfant(s)');
insert into Statut_maritals values(3,'Marié avec enfant(s)');

create table Employes(
  idEmploye INT AUTO_INCREMENT PRIMARY KEY,
  matricule varchar(100),
  nom varchar(200),
  prenom varchar(200),
  genre varchar(50),
  adresse varchar(200),
  telephone varchar(100),
  email varchar(100),
  photo varchar(255),
  dateNaissance date,
  dateEmbauche date,
  idDirection int ,
  idFonction int,  
  idSuperieur int,
  idStatutMarital int,
  foreign key (idDirection) REFERENCES Directions(idDirection),
  foreign key (idFonction) REFERENCES Fonctions(idFonction),
  foreign key (idSuperieur) REFERENCES Employes(idEmploye),
  foreign key (idStatutMarital) REFERENCES Statut_maritals(idStatutMarital)
) ENGINE = InnoDB;

-- Informations sur les avantages , exemple assurance santé, les prestations de retraite,
-- gestion des Congés et absence :  Incluez les détails sur les jours de congé, les congés payés et les autres congés auxquels l'employé a droit.
create table Type_conges(
  idTypeConge INT AUTO_INCREMENT PRIMARY KEY,
  nom varchar(255),
  duree int ,
  sexe varchar(50)
) ENGINE = InnoDB;
insert into Type_conges(nom,duree,sexe) values('Maternite',90,'homme');
insert into Type_conges(nom,duree,sexe) values('Normal',90,'');

create table Conges(
  idConge int auto_increment primary key,
  idEmploye int not null,
  idTypeConge int,
  dateDebut datetime,
  duree float,
  etat VARCHAR(50),
  choisisseur VARCHAR(100),
  valid int,
  foreign key (idEmploye) REFERENCES Employes(idEmploye),
  foreign key (idTypeConge) REFERENCES Type_conges(idTypeConge)
) ENGINE = InnoDB;
-- valid 0 oui 1 non
-- choisisseur employer, employeur 

-- Contre de travail
create table Contrats(
  idContrat INT AUTO_INCREMENT PRIMARY KEY,
  idTypeContrat int,
  idEmploye int not null,
  dateDebut date,
  dateFin date,
  lieuTravail varchar(100),
  salaire float,
  attentes text,
  conditionResiliation text,
  avantagesdEtDroits text,
  ModalitesDeTransition text,
  foreign key (idTypeContrat) REFERENCES Type_contrats(idTypeContrat),
  foreign key (idEmploye) REFERENCES Employes(idEmploye)
) ENGINE = InnoDB;

create table Horaires(
  idEmploye int ,
  idContrat int,
  debut TIME,
  fin TIME,
  foreign key (idEmploye) REFERENCES Employes(idEmploye),
  foreign key (idContrat) REFERENCES Contrats(idContrat)
) ENGINE = InnoDB;

-- liste de tous les personnels

create table ficheDePaies(
  idFichePaie INT AUTO_INCREMENT PRIMARY KEY,
  idEmploye int not null,
  salaireBase float,
  modePaiement VARCHAR(20),
  periodePaiement VARCHAR(25),
  foreign key (idEmploye) REFERENCES Employes(idEmploye)
) ENGINE = InnoDB;

create table detailFichePaies(
  idFichePaie int,
  designation varchar(30),
  nombre int,
  taux float,
  type int,
  foreign key (idFichePaie) REFERENCES ficheDePaies(idFichePaie)
);

INSERT INTO ficheDePaies (idEmploye, salaireBase, modePaiement, periodePaiement) VALUES (1, 30000, 'virement', 'Novembre 2023');

insert into detailFichePaies values(1,'Montant imposable',1,100,1);
insert into detailFichePaies values(1,'Rendement',1,500,1);
insert into detailFichePaies values(1,'Deductions volontaires',1,400,-1);
insert into detailFichePaies values(1,'Salaire brut',1,10000,1);
insert into detailFichePaies values(1,'Couverture sociale',1,1000,-1);
insert into detailFichePaies values(1,'IRSA',1,900,-1);

create table Presences(
    idEmploye int,
    dateEntree datetime,
    dateSortie datetime ,
    FOREIGN KEY (idEmploye) REFERENCES Employes(idEmploye)
);

-- commerciale

CREATE TABLE fournisseurs (
    idFournisseur SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255),
    telephone VARCHAR(15),
    email VARCHAR(255),
    typeProduit VARCHAR(100)
);
INSERT INTO fournisseurs (nom, adresse, telephone, email, typeProduit) VALUES ('Lala', 'Analakely Lot II bis', '0385421645', 'fournisseur1@example.com', 'Sante');

CREATE TABLE produits (
    idProduit SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    nature VARCHAR(100)
);
INSERT INTO produits (nom, nature) VALUES ('Gel Main', 'sante');
INSERT INTO produits (nom, nature) VALUES ('Savon', 'sante');

CREATE TABLE prix_produits (
    idProduit int not null,
    idFournisseur int not null,
    prix double precision
);
INSERT INTO prix_produits (idProduit, idFournisseur, prix) VALUES (1,1,7500);
INSERT INTO prix_produits (idProduit, idFournisseur, prix) VALUES (2,1,700);

CREATE TABLE tvas (
    idTva serial primary key,
    valeur double precision
);
insert into tvas(valeur) values(0);
insert into tvas(valeur) values(20);

CREATE TABLE bon_commandes (
    idBonCommande SERIAL PRIMARY KEY,
    date DATE,
    idFournisseur INT,
    livraison DOUBLE PRECISION,
    modePaiement VARCHAR(100),
    dureePaiement DOUBLE PRECISION,
    etat int
);
  --  FOREIGN KEY (idFournisseur) REFERENCES fournisseurs(idFournisseur)

 --etat:  0 non valide , 1 non modifiable , 5 valide finance , 10 valide daf
CREATE TABLE detail_bon_commandes (
    idBonCommande INT,
    idProduit INT,
    quantite DOUBLE PRECISION,
    prixUnitaire DOUBLE PRECISION,
    tva DOUBLE PRECISION
);
  --  FOREIGN KEY (idProduit) REFERENCES produits(idProduit),
  --  FOREIGN KEY (idBonCommande) REFERENCES bonCommandes(idBonCommande)