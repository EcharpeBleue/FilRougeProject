drop database if exists GuildeDB;
create database GuildeDB;
use GuildeDB;
CREATE TABLE `API_KEY` (
  PRIMARY KEY (id),
  id            int NOT NULL auto_increment,
  codePerso     INT NOT NULL,
  idUtilisateur          INT NOT NULL
);

CREATE TABLE `RELATION_PARTICIPER` (
  PRIMARY KEY (idEvenement, idPersonnage),
  idEvenement INT NOT NULL,
  idPersonnage INT NOT NULL
);

CREATE TABLE `EVENEMENT` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  Edate     DATE,
  Etitre VARCHAR(42) NULL,
  Eintitule VARCHAR(200) NULL,
  idUtilisateur     INT NULL,
  idPrerequis     INT NOT NULL,
  idZone   INT NOT NULL
);

CREATE TABLE `LISTE_BLANCHE` (
  PRIMARY KEY (id),
  id          INT NOT NULL,
  pseudoEnJeu VARCHAR(42)
);

CREATE TABLE `MESSAGES` (
  PRIMARY KEY (id),
  id       INT NOT NULL,
  envoyer  VARCHAR(42),
  intitule VARCHAR(42)
);

CREATE TABLE `PERSONNAGE` (
  PRIMARY KEY (id),
  id         int NOT NULL auto_increment,
  niveau     VARCHAR(42),
  equipement VARCHAR(42),
  idUtilisateur       int NOT NULL
);

CREATE TABLE `PREREQUIS` (
  PRIMARY KEY (id),
  id         int NOT NULL auto_increment,
  equipement VARCHAR(42),
  niveauMin  VARCHAR(42),
  niveauMax  VARCHAR(42)
);

CREATE TABLE `RANG` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  intitule VARCHAR(42),
  rang     VARCHAR(42)
);

CREATE TABLE `RELATION_SIGNALE` (
  PRIMARY KEY (idUtilisateur, idSignalement),
  idUtilisateur int NOT NULL,
  idSignalement int NOT NULL
);

CREATE TABLE `SIGNALEMENT` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  intitule VARCHAR(42),
  Sdate     DATE,
  idUtilisateur     int NOT NULL,
  idTypeSignalement     int NOT NULL
);

CREATE TABLE `TYPE_EVENEMENT` (
  PRIMARY KEY (id),
  id            int NOT NULL auto_increment,
  typeEvenement VARCHAR(42)
);

CREATE TABLE `TYPE_SIGNALEMENT` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  intitule VARCHAR(42)
);

CREATE TABLE `TYPE_ZONE` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  intitule VARCHAR(42)
);

CREATE TABLE `UTILISATEUR` (
  PRIMARY KEY (id),
  id                 int NOT NULL auto_increment,
  pseudoListeBlanche VARCHAR(42),
  mail               VARCHAR(42),
  motDePasse         VARCHAR(42),
  idRang               int NOT NULL
);

CREATE TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` (
  PRIMARY KEY (idEvenement, idRang),
  idEvenement INT NOT NULL,
  idRang INT NOT NULL
);

CREATE TABLE `RELATION_VOIR_INFO` (
  PRIMARY KEY (idEvenement, idTypeEvenement),
  idEvenement INT NOT NULL,
  idTypeEvenement INT NOT NULL
);

CREATE TABLE `ZONE` (
  PRIMARY KEY (id),
  id int NOT NULL auto_increment,       
  intitule VARCHAR(42) NOT NULL,
  rang     VARCHAR(42),
  idTypeZone int NOT NULL
);

ALTER TABLE `API_KEY` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (id);

ALTER TABLE `RELATION_PARTICIPER` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (id);
ALTER TABLE `RELATION_PARTICIPER` ADD FOREIGN KEY (idPersonnage) REFERENCES `PERSONNAGE` (id);

ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (id);
ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (idPrerequis) REFERENCES `PREREQUIS` (id);
ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (idZone) REFERENCES `ZONE` (id);

ALTER TABLE `PERSONNAGE` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (id);

ALTER TABLE `RELATION_SIGNALE` ADD FOREIGN KEY (idSignalement) REFERENCES `SIGNALEMENT` (id);
ALTER TABLE `RELATION_SIGNALE` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (id);
ALTER TABLE `SIGNALEMENT` ADD FOREIGN KEY (idTypeSignalement) REFERENCES `TYPE_SIGNALEMENT` (id);
ALTER TABLE `SIGNALEMENT` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (id);

ALTER TABLE `UTILISATEUR` ADD FOREIGN KEY (idRang) REFERENCES `RANG` (id);

ALTER TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (id);
ALTER TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` ADD FOREIGN KEY (idRang) REFERENCES `RANG` (id);

ALTER TABLE `RELATION_VOIR_INFO` ADD FOREIGN KEY (idTypeEvenement) REFERENCES `TYPE_EVENEMENT` (id);
ALTER TABLE `RELATION_VOIR_INFO` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (id);

ALTER TABLE `ZONE` ADD FOREIGN KEY (idTypeZone) REFERENCES `TYPE_ZONE` (id);
