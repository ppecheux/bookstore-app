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

CREATE TABLE UtilisateursEnregistres (
    email VARCHAR(255) PRIMARY KEY,
    motDePasse VARCHAR(255),
    nom VARCHAR(255),
    prenom VARCHAR(255)
);

CREATE TABLE Don (
    montantDon FLOAT,
    dateDon DATE,
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
     PRIMARY KEY (montantDon,dateDon,utilisateur)
);

CREATE TABLE Abonnement (
    auteurNom VARCHAR(255),
    auteurPrenom VARCHAR(255),
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    PRIMARY KEY (auteurNom,auteurPrenom,utilisateur),
    FOREIGN KEY (auteurNom,auteurPrenom) REFERENCES Auteur(nom,prenom)
);

CREATE TABLE Aime (
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    titre VARCHAR(255),
    langue VARCHAR(255),
    PRIMARY KEY(utilisateur,titre,langue),
    FOREIGN KEY (titre,langue) REFERENCES Livre(langue)
);

CREATE TABLE Telechargement (
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    titre VARCHAR(255),
    langue VARCHAR(255),
    prixAchat FLOAT,
    PRIMARY KEY(utilisateur,titre,langue),
    FOREIGN KEY (titre,langue) REFERENCES Livre(langue)
);

CREATE TABLE Ecrire (
    auteurNom VARCHAR(255),
    auteurPrenom VARCHAR(255),
    titre VARCHAR(255),
    langue VARCHAR(255),
    PRIMARY KEY (auteurNom,auteurPrenom,titre,langue),
    FOREIGN KEY(auteurNom,auteurPrenom) REFERENCES Auteur(prenom,nom),
    FOREIGN KEY(titre,langue) REFERENCES Livre(titre,langue)
);

