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

CREATE TABLE Auteur (
  nom VARCHAR(255),
  prenom VARCHAR(255),
  biographie VARCHAR(255) UNIQUE,
  nationalite VARCHAR(255),
  PRIMARY KEY (nom,prenom)
);

CREATE TABLE Livre (
  titre VARCHAR(255), 
  langue VARCHAR(255), 
  DatePublication DATE, 
  categorie VARCHAR(255) NOT NULL, 
  licence VARCHAR(255) NOT NULL, 
  FOREIGN KEY(categorie) REFERENCES Categorie(nom), 
  FOREIGN KEY(licence) REFERENCES Licence(nom), 
  PRIMARY KEY(titre, langue)
); 

CREATE TABLE Vedette (
  DateLimite DATE, 
  PhraseAccroche VARCHAR(255), 
  titre VARCHAR(255),
  langue VARCHAR(255), 
  PRIMARY KEY (DateLimite, PhraseAccroche, titre, langue), 
  FOREIGN KEY (titre, langue) REFERENCES Livre(titre, langue)
);