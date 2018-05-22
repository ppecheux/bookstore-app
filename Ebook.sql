CREATE TABLE Categorie (
    nom VARCHAR(255) PRIMARY KEY,
    description VARCHAR );

CREATE TABLE Licence (
  nom VARCHAR(255) PRIMARY KEY,
  droitModification BOOLEAN NOT NULL ,
  partageMemeCondition BOOLEAN NOT NULL ,
  droitUtilisationCommercial BOOLEAN NOT NULL ,
  UNIQUE (droitModification,partageMemeCondition,droitUtilisationCommercial)
);

INSERT INTO Licence (nom, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES ('cc_by',TRUE,FALSE,TRUE);
INSERT INTO Licence (nom, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES ('cc_by_sa',TRUE,TRUE,TRUE);
INSERT INTO Licence (nom, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES ('cc_by_nd',FALSE,FALSE,TRUE);
INSERT INTO Licence (nom, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES ('cc_by_cd',TRUE,FALSE,FALSE);
INSERT INTO Licence (nom, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES ('cc_by_cc_sa',TRUE,TRUE,FALSE);
INSERT INTO Licence (nom, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES ('cc_by_nc_nd',FALSE,TRUE,FALSE);


CREATE TABLE Auteur (
  nom VARCHAR(255),
  prenom VARCHAR(255),
  biographie VARCHAR(255) UNIQUE,
  nationalite VARCHAR(255),
  PRIMARY KEY (nom,prenom)
);
