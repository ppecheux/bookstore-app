DROP VIEW vVedette;
DROP TABLE Ecrire;
DROP TABLE Reference; 
DROP TABLE Telechargement;
DROP TABLE Aime;  
DROP TABLE Abonnement; 
DROP TABLE Don; 
DROP TABLE UtilisateursEnregistres; 
DROP TABLE Vedette; 
DROP TABLE Livre;
DROP TABLE Citoyen; 
DROP TABLE Nationalite; 
DROP TABLE Auteur;
DROP TABLE Licence;
DROP TABLE Categorie;

CREATE TABLE Categorie (
    nom VARCHAR(255) PRIMARY KEY,
    description VARCHAR );


CREATE TABLE Licence (
  id INTEGER PRIMARY KEY,
  droitModification BOOLEAN NOT NULL ,
  partageMemeCondition BOOLEAN NOT NULL ,
  droitUtilisationCommercial BOOLEAN NOT NULL ,
  UNIQUE (droitModification,partageMemeCondition,droitUtilisationCommercial)
);

CREATE TABLE Auteur (
  nom VARCHAR(255),
  prenom VARCHAR(255),
  biographie VARCHAR(255) UNIQUE,
  PRIMARY KEY (nom,prenom)
);

CREATE TABLE Nationalite (
  pays VARCHAR(255) PRIMARY KEY
);

INSERT INTO Nationalite (pays) VALUES ('Pays-Bas');
INSERT INTO Nationalite (pays) VALUES ('Norvège');
INSERT INTO Nationalite (pays) VALUES ('Biélorussie');
INSERT INTO Nationalite (pays) VALUES ('Belgique');
INSERT INTO Nationalite (pays) VALUES ('Azerbaïdjan');
INSERT INTO Nationalite (pays) VALUES ('Arménie');
INSERT INTO Nationalite (pays) VALUES ('Autriche');
INSERT INTO Nationalite (pays) VALUES ('Andorre');
INSERT INTO Nationalite (pays) VALUES ('Albanie');
INSERT INTO Nationalite (pays) VALUES ('Allemagne');

CREATE TABLE Citoyen (
  pays VARCHAR(255), 
  auteurNom VARCHAR(255), 
  auteurPrenom VARCHAR(255),
  FOREIGN KEY(pays) REFERENCES Nationalite(pays), 
  FOREIGN KEY(auteurNom, auteurPrenom) REFERENCES Auteur(nom, prenom),
  PRIMARY KEY(pays, auteurNom, auteurPrenom)
);


CREATE TABLE Livre (
  titre VARCHAR(255), 
  langue VARCHAR(255), 
  page INTEGER NOT NULL, 
  resume VARCHAR(255), 
  datePublication DATE, 
  categorie VARCHAR(255) NOT NULL, 
  licence INTEGER NOT NULL, 
  FOREIGN KEY(categorie) REFERENCES Categorie(nom), 
  FOREIGN KEY(licence) REFERENCES Licence(id), 
  PRIMARY KEY(titre, langue)
); 

CREATE TABLE Vedette (
  dateLimite DATE, 
  phraseAccroche VARCHAR(255), 
  titre VARCHAR(255),
  langue VARCHAR(255), 
  PRIMARY KEY (DateLimite, PhraseAccroche, titre, langue), 
  FOREIGN KEY (titre, langue) REFERENCES Livre(titre, langue)
);
CREATE TABLE UtilisateursEnregistres (
    email VARCHAR(255) PRIMARY KEY,
    motDePasse VARCHAR(255) NOT NULL,
    nom VARCHAR(255),
    prenom VARCHAR(255) NOT NULL
);

INSERT INTO UtilisateursEnregistres (nom, prenom, motDePasse, email)
VALUES ('Kevin','Integration', 'pcqeudçjdé','cenestpasuneaddresse');
INSERT INTO UtilisateursEnregistres (nom, prenom, motDePasse, email)
VALUES ('Kevin','Integration', 'pcqeudçjdé','adresse@etu.utc.fr');
INSERT INTO UtilisateursEnregistres (email , motDePasse, prenom)
VALUES ('cettePersonneNaPasDAdresse','passe','Jose');

CREATE TABLE Don (
    montantDon FLOAT NOT NULL,
    dateDon DATE,
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    PRIMARY KEY (montantDon,dateDon,utilisateur),
    CHECK (montantDon>0)
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
    FOREIGN KEY (titre,langue) REFERENCES Livre(titre,langue)
);

CREATE TABLE Telechargement (
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    titre VARCHAR(255),
    langue VARCHAR(255),
    prixAchat FLOAT NOT NULL,
    PRIMARY KEY(utilisateur,titre,langue),
    FOREIGN KEY (titre,langue) REFERENCES Livre(titre,langue)
);

CREATE TABLE Reference (
    auteurNom VARCHAR(255),
    auteurPrenom VARCHAR(255),
    titre VARCHAR(255),
    langue VARCHAR(255),
    FOREIGN KEY (auteurNom,auteurPrenom) REFERENCES Auteur(nom,prenom),
    PRIMARY KEY (auteurNom,auteurPrenom,titre, langue),
    FOREIGN KEY (titre,langue) REFERENCES Livre(titre,langue)
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

CREATE VIEW vVedette AS
SELECT titre,langue,phraseAccroche,page,resume,datePublication,categorie,licence
FROM(
    SELECT Livre.titre, Livre.langue, Livre.datePublication, Livre.page, Livre.resume, Livre.categorie, Livre.licence, Vedette.dateLimite, Vedette.phraseAccroche
    FROM Livre,Vedette
    WHERE (Livre.titre=Vedette.titre) AND (Livre.langue=Vedette.langue)
) AS sousRequete
WHERE sousRequete.dateLimite>DATE(NOW());
    
INSERT INTO Categorie (nom, description)
VALUES ('Fiction','Aventure & Action Classiques Erotique Espionnage Fantastique Frisson & Terreur');
INSERT INTO Categorie (nom, description)
VALUES ('Bande Dessinée','Aventure Classiques Fantastique Heroïc Fantasy');
INSERT INTO Categorie (nom, description)
VALUES ('Culture','Arts généraux Architecture Cinéma Cinéma - Scénarios');


INSERT INTO Licence (id, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES (1,TRUE,FALSE,TRUE);
INSERT INTO Licence (id, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES (2,TRUE,TRUE,TRUE);
INSERT INTO Licence (id, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES (3,FALSE,FALSE,TRUE);
INSERT INTO Licence (id, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES (4,TRUE,FALSE,FALSE);
INSERT INTO Licence (id, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES (5,TRUE,TRUE,FALSE);
INSERT INTO Licence (id, droitModification, partageMemeCondition, droitUtilisationCommercial)
VALUES (6,FALSE,TRUE,FALSE);

INSERT INTO Auteur (nom, prenom, biographie)
VALUES ('Kevin','Integration', 'integre les étudiants en automne et au printemps');
INSERT INTO Auteur (nom, prenom )
VALUES ('Kevin','Olivera');
INSERT INTO Auteur (nom,prenom )
VALUES ('Dominique','DesMaths');
