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
    prixAchat FLOAT, 
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
    FOREIGN KEY(auteurNom,auteurPrenom) REFERENCES Auteur(nom,prenom), 
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
INSERT INTO Auteur (nom,prenom)
VALUES ('Dominique','DesMaths');

INSERT INTO Nationalite (pays)
VALUES ('France'); 
INSERT INTO Nationalite (pays)
VALUES ('UK');
INSERT INTO Nationalite (pays)
VALUES ('USA');

INSERT INTO Citoyen (pays, auteurNom, auteurPrenom)
VALUES ('France', 'Kevin', 'Integration'); 
INSERT INTO Citoyen (pays, auteurNom, auteurPrenom)
VALUES ('UK', 'Kevin', 'Olivera'); 
INSERT INTO Citoyen (pays, auteurNom, auteurPrenom)
VALUES ('USA', 'Dominique', 'DesMaths'); 


INSERT INTO Livre (titre, langue, page, resume, datePublication, categorie, licence)
VALUES ('plaquette de l integration', 'français', '30','bonne integ !', '2015-06-22', 'Culture', '1'); 
INSERT INTO Livre (titre, langue,  page, categorie, licence)
VALUES ('maths for all', 'anglais', '351', 'Fiction', '5'); 


INSERT INTO Vedette (dateLimite, phraseAccroche, titre, langue)
VALUES ('2018-12-31', 'integ 4 ever', 'plaquette de l integration', 'français'); 
INSERT INTO Vedette (dateLimite, phraseAccroche, titre, langue)
VALUES ('2022-08-13', 'An amazing journey through maths !', 'maths for all', 'anglais'); 

INSERT INTO UtilisateursEnregistres (nom, prenom, motDePasse, email)
VALUES ('Kevin','Integration', 'pcqeudçjdé','cenestpasuneaddresse');
INSERT INTO UtilisateursEnregistres (nom, prenom, motDePasse, email)
VALUES ('Kevin','Integration', 'pcqeudçjdé','adresse@etu.utc.fr');
INSERT INTO UtilisateursEnregistres (prenom, email , motDePasse)
VALUES ('anonyme','cettePersonneNaPasDAdresse','passe');


INSERT INTO Don (montantDon, dateDon, utilisateur)
VALUES ('5.20', '2015-04-11', 'adresse@etu.utc.fr'); 
INSERT INTO Don (montantDon, dateDon, utilisateur)
VALUES ('100.001', '2018-12-08', 'cettePersonneNaPasDAdresse');

INSERT INTO Abonnement (auteurNom, auteurPrenom, utilisateur)
VALUES ('Dominique', 'DesMaths', 'cenestpasuneaddresse'); 
INSERT INTO Abonnement (auteurNom, auteurPrenom, utilisateur)
VALUES ('Kevin', 'Olivera', 'adresse@etu.utc.fr'); 


INSERT INTO Aime (utilisateur, titre, langue)
VALUES ('adresse@etu.utc.fr', 'maths for all', 'anglais'); 
INSERT INTO Aime (utilisateur, titre, langue)
VALUES ('cettePersonneNaPasDAdresse', 'plaquette de l integration', 'français'); 


INSERT INTO Telechargement (utilisateur, titre, langue, prixAchat)
VALUES ('adresse@etu.utc.fr', 'plaquette de l integration', 'français', '5.30'); 
INSERT INTO Telechargement (utilisateur, titre, langue)
VALUES ('cettePersonneNaPasDAdresse', 'maths for all', 'anglais'); 


INSERT INTO Reference (auteurNom, auteurPrenom, titre, langue)
VALUES ('Kevin', 'Olivera', 'maths for all', 'anglais'); 


INSERT INTO Ecrire (auteurNom, auteurPrenom, titre, langue)
VALUES ('Kevin', 'Integration', 'plaquette de l integration', 'français'); 
INSERT INTO Ecrire (auteurNom, auteurPrenom, titre, langue)
VALUES ('Dominique', 'DesMaths', 'maths for all', 'anglais'); 

