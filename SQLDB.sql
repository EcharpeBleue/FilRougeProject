
drop database if exists GuildeDB;
create database GuildeDB;
use GuildeDB;

CREATE TABLE `API_KEY`(
  PRIMARY KEY (idApi),
  idApi         int NOT NULL auto_increment,
  intitule      VARCHAR(42),
  idUtilisateur int NOT NULL,
  avecSesPersos VARCHAR(42)
);

CREATE TABLE `RELATION_DEMANDER`(
  PRIMARY KEY (idPersonnage, idEvenement),
  idPersonnage int NOT NULL,
  idEvenement  int NOT NULL
);

CREATE TABLE `EVENEMENT`(
  PRIMARY KEY (idEvenement),
  idEvenement   int NOT NULL auto_increment,
  date          DATE,
  idUtilisateur int NOT NULL,
  idZone        int NULL,
  idPrerequis   int NULL
);

CREATE TABLE `MESSAGES`(
  PRIMARY KEY (idMessages),
  idMessages int NOT NULL auto_increment,
  envoyer    VARCHAR(42),
  intitule   VARCHAR(42)
);

CREATE TABLE `PERSONNAGE`(
  PRIMARY KEY (idPersonnage),
  idPersonnage int NOT NULL auto_increment,
  niveau       VARCHAR(42),
  equipement   VARCHAR(42)
);

CREATE TABLE `PREREQUIS`(
  PRIMARY KEY (idPrerequis),
  idPrerequis int NOT NULL auto_increment,
  equipement  VARCHAR(42),
  niveauMin   int,
  niveauMax   int
);

CREATE TABLE `RANG`(
  PRIMARY KEY (idRang),
  idRang   int NOT NULL auto_increment,
  intitule VARCHAR(42),
  rang     VARCHAR(42)
);

CREATE TABLE `RELATION_SIGNALE`(
  PRIMARY KEY (idUtilisateur, idSignalement),
  idUtilisateur int NOT NULL,
  idSignalement int NOT NULL
);

CREATE TABLE `SIGNALEMENT`(
  PRIMARY KEY (idSignalement),
  idSignalement     int NOT NULL auto_increment,
  intitule          VARCHAR(42),
  date              DATE,
  idTypeSignalement int NOT NULL,
  idUtilisateur     int NOT NULL
);

CREATE TABLE `TYPE_EVENEMENT`(
  PRIMARY KEY (idTypeEvenement),
  idTypeEvenement int NOT NULL auto_increment,
  intitule        VARCHAR(42)
);

CREATE TABLE `TYPE_SIGNALEMENT`(
  PRIMARY KEY (idTypeSignalement),
  idTypeSignalement int NOT NULL auto_increment,
  intitule          VARCHAR(42)
);

CREATE TABLE `TYPE_ZONE`(
  PRIMARY KEY (idTypeZone),
  idTypeZone int NOT NULL auto_increment,
  intitule   VARCHAR(42)
);

CREATE TABLE `UTILISATEUR`(
  PRIMARY KEY (idUtilisateur),
  idUtilisateur int NOT NULL auto_increment,
  pseudo        VARCHAR(42),
  mail          VARCHAR(42),
  motDePasse    VARCHAR(42),
  idRang        int NOT NULL
);

CREATE TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS`(
  PRIMARY KEY (idRang, idEvenement),
  idRang      int NOT NULL,
  idEvenement int NOT NULL
);

CREATE TABLE `RELATION_VOIR_INFO`(
  PRIMARY KEY (idEvenement, idTypeEvenement),
  idEvenement     int NOT NULL,
  idTypeEvenement int NOT NULL
);

CREATE TABLE `RELATION_VOIR_LES_PERSONNAGES`(
  PRIMARY KEY (idPersonnage, idEvenement),
  idPersonnage int NOT NULL,
  idEvenement  int NOT NULL,
  niveau       VARCHAR(42)
);

CREATE TABLE `ZONE`(
  PRIMARY KEY (idZone),
  idZone     int NOT NULL auto_increment,
  intitule   VARCHAR(42),
  rang       VARCHAR(42),
  idTypeZone int NOT NULL
);

ALTER TABLE `API_KEY` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (idUtilisateur);

ALTER TABLE `RELATION_DEMANDER` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (idEvenement);
ALTER TABLE `RELATION_DEMANDER` ADD FOREIGN KEY (idPersonnage) REFERENCES `PERSONNAGE` (idPersonnage);

ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (idPrerequis) REFERENCES `PREREQUIS` (idPrerequis);
ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (idZone) REFERENCES `ZONE` (idZone);
ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (idUtilisateur);

ALTER TABLE `RELATION_SIGNALE` ADD FOREIGN KEY (idSignalement) REFERENCES `SIGNALEMENT` (idSignalement);
ALTER TABLE `RELATION_SIGNALE` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (idUtilisateur);
ALTER TABLE `SIGNALEMENT` ADD FOREIGN KEY (idUtilisateur) REFERENCES `UTILISATEUR` (idUtilisateur);
ALTER TABLE `SIGNALEMENT` ADD FOREIGN KEY (idTypeSignalement) REFERENCES `TYPE_SIGNALEMENT` (idTypeSignalement);

ALTER TABLE `UTILISATEUR` ADD FOREIGN KEY (idRang) REFERENCES `RANG` (idRang);

ALTER TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (idEvenement);
ALTER TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` ADD FOREIGN KEY (idRang) REFERENCES `RANG` (idRang);

ALTER TABLE `RELATION_VOIR_INFO` ADD FOREIGN KEY (idTypeEvenement) REFERENCES `TYPE_EVENEMENT` (idTypeEvenement);
ALTER TABLE `RELATION_VOIR_INFO` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (idEvenement);

ALTER TABLE `RELATION_VOIR_LES_PERSONNAGES` ADD FOREIGN KEY (idEvenement) REFERENCES `EVENEMENT` (idEvenement);
ALTER TABLE `RELATION_VOIR_LES_PERSONNAGES` ADD FOREIGN KEY (idPersonnage) REFERENCES `PERSONNAGE` (idPersonnage);

ALTER TABLE `ZONE` ADD FOREIGN KEY (idTypeZone) REFERENCES `TYPE_ZONE` (idTypeZone);
