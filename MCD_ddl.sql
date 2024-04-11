drop database if exists GuildeDB;
create database GuildeDB;
use GuildeDB;
CREATE TABLE `API_KEY` (
  PRIMARY KEY (id),
  id            int NOT NULL auto_increment,
  codePerso     INT NOT NULL,
  id_2          INT NOT NULL,
);

CREATE TABLE `RELATION_PARTICIPER` (
  PRIMARY KEY (id_1, id_2),
  id_1 INT NOT NULL,
  id_2 INT NOT NULL,
);

CREATE TABLE `EVENEMENT` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  date     DATE,
  intitule VARCHAR(42) NULL,
  id_2     INT NULL,
  id_3     INT NOT NULL
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
  id_2       VARCHAR(42) NOT NULL
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
  PRIMARY KEY (id_1, id_2),
  id_1 VARCHAR(42) NOT NULL,
  id_2 VARCHAR(42) NOT NULL
);

CREATE TABLE `SIGNALEMENT` (
  PRIMARY KEY (id),
  id       int NOT NULL auto_increment,
  intitule VARCHAR(42),
  date     VARCHAR(42),
  id_2     VARCHAR(42) NOT NULL,
  id_3     VARCHAR(42) NOT NULL
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
  id_2               VARCHAR(42) NOT NULL
);

CREATE TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` (
  PRIMARY KEY (id_1, id_2),
  id_1 INT NOT NULL,
  id_2 INT NOT NULL
);

CREATE TABLE `RELATION_VOIR_INFO` (
  PRIMARY KEY (id_1, id_2),
  id_1 INT NOT NULL,
  id_2 INT NOT NULL
);

CREATE TABLE `ZONE` (
  PRIMARY KEY (id),
  id int NOT NULL auto_increment,       
  intitule VARCHAR(42) NOT NULL
  rang     VARCHAR(42),
);

ALTER TABLE `API_KEY` ADD FOREIGN KEY (id_2) REFERENCES `UTILISATEUR` (id);

ALTER TABLE `PARTICIPER` ADD FOREIGN KEY (id_2) REFERENCES `EVENEMENT` (id);
ALTER TABLE `PARTICIPER` ADD FOREIGN KEY (id_1) REFERENCES `PERSONNAGE` (id);

ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (id_3) REFERENCES `UTILISATEUR` (id);
ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (id_2) REFERENCES `PREREQUIS` (id);
ALTER TABLE `EVENEMENT` ADD FOREIGN KEY (id_4) REFERENCES `ZONE` (id);

ALTER TABLE `PERSONNAGE` ADD FOREIGN KEY (id_2) REFERENCES `UTILISATEUR` (id);

ALTER TABLE `RELATION_SIGNALE` ADD FOREIGN KEY (id_2) REFERENCES `SIGNALEMENT` (id);
ALTER TABLE `RELATION_SIGNALE` ADD FOREIGN KEY (id_1) REFERENCES `UTILISATEUR` (id);
ALTER TABLE `SIGNALEMENT` ADD FOREIGN KEY (id_3) REFERENCES `TYPE_SIGNALEMENT` (id);
ALTER TABLE `SIGNALEMENT` ADD FOREIGN KEY (id_2) REFERENCES `UTILISATEUR` (id);

ALTER TABLE `UTILISATEUR` ADD FOREIGN KEY (id_2) REFERENCES `RANG` (id);

ALTER TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` ADD FOREIGN KEY (id_2) REFERENCES `EVENEMENT` (id);
ALTER TABLE `RELATION_VERIFIER_LE_RANG_POUR_LES_EVENEMENTS` ADD FOREIGN KEY (id_1) REFERENCES `RANG` (id);

ALTER TABLE `RELATION_VOIR_INFO` ADD FOREIGN KEY (id_2) REFERENCES `TYPE_EVENEMENT` (id);
ALTER TABLE `RELATION_VOIR_INFO` ADD FOREIGN KEY (id_1) REFERENCES `EVENEMENT` (id);

-- ALTER TABLE voirLesPersonnages ADD FOREIGN KEY (id_2) REFERENCES evenement (id);
-- ALTER TABLE voirLesPersonnages ADD FOREIGN KEY (id_1) REFERENCES personnage (id);

ALTER TABLE `ZONE` ADD FOREIGN KEY (id) REFERENCES `TYPE_ZONE` (id);
