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

INSERT INTO Categorie (nom, description)
VALUES ('Fiction','Aventure & Action Classiques Erotique Espionnage Fantastique Frisson & Terreur');
INSERT INTO Categorie (nom, description)
VALUES ('Bande Dessinée','Aventure Classiques Fantastique Heroïc Fantasy');
INSERT INTO Categorie (nom, description)
VALUES ('Culture','Arts généraux Architecture Cinéma Cinéma - Scénarios');
INSERT INTO Categorie (nom)
VALUES ('Musique');
INSERT INTO Categorie (nom)
VALUES ('Film');


CREATE TABLE Licence (
  id INTEGER PRIMARY KEY,
  droitModification BOOLEAN NOT NULL ,
  partageMemeCondition BOOLEAN NOT NULL ,
  droitUtilisationCommercial BOOLEAN NOT NULL ,
  UNIQUE (droitModification,partageMemeCondition,droitUtilisationCommercial)
);

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

CREATE TABLE Auteur (
  nom VARCHAR(255),
  prenom VARCHAR(255),
  biographie VARCHAR(255) UNIQUE,
  PRIMARY KEY (nom,prenom)
);

INSERT INTO Auteur (nom, prenom, biographie)
VALUES ('Kevin','Integration', 'integre les étudiants en automne et au printemps');
INSERT INTO Auteur (nom, prenom )
VALUES ('Kevin','Olivera');
INSERT INTO Auteur (nom,prenom )
VALUES ('Dominique','DesMaths');

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

INSERT INTO Citoyen (pays,auteurNom,auteurPrenom) VALUES ('Allemagne','Kevin','Integration');
INSERT INTO Citoyen (pays,auteurNom,auteurPrenom) VALUES ('Albanie','Kevin','Integration');
INSERT INTO Citoyen (pays,auteurNom,auteurPrenom) VALUES ('Albanie','Kevin','Olivera');
INSERT INTO Citoyen (pays,auteurNom,auteurPrenom) VALUES ('Azerbaïdjan','Kevin','Integration');

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
  PRIMARY KEY(titre, langue),
  CHECK (page>0)
); 

/*INSERT INTO Livre (titre,langue,page,resume,datePublication,categorie,licence) 
VALUES ('Yeux Revolver','France',-3,
'Était si différent de toi Quand jétais enfant, mon prince charmant Était bien autrement',
'2000/01/13','Musique', 1); viole la contrainte de vérification « livre » de la relation « livre_page_check » */
INSERT INTO Livre (titre,langue,page,resume,datePublication,categorie,licence) 
VALUES ('Yeux Revolver','France',3,
'Était si différent de toi Quand jétais enfant, mon prince charmant Était bien autrement',
'2000/01/13','Musique', 1);
INSERT INTO Livre (titre,langue,page,resume,datePublication,categorie,licence) 
VALUES ('Ce soir je ne dors pas','France',3,
'Était si différent de toi Quand jétais enfant, mon prince charmant Était bien autrement',
'2000/01/13','Musique', 1);
INSERT INTO Livre (titre,langue,page,resume,datePublication,categorie,licence) 
VALUES ('Ce soir je ne dors pas','Allemand',3,
'Était si différent de toi Quand jétais enfant, mon prince charmant Était bien autrement',
'2000/01/13','Musique', 1);
VALUES ('Ce soir je ne dors pas','Italien',3,
'Était si différent de toi Quand jétais enfant, mon prince charmant Était bien autrement',
'2000/01/13','Musique', 9);



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
INSERT INTO UtilisateursEnregistres (email , motDePasse, prenom)
VALUES ('Ron@edu','passe','Ronald');
INSERT INTO UtilisateursEnregistres (email , motDePasse, prenom)
VALUES ('MariannaRo@tub','passe','Rose');
INSERT INTO UtilisateursEnregistres (email , motDePasse, prenom)
VALUES ('Phil234@etu','passe','Phil');


CREATE TABLE Don (
    montantDon FLOAT NOT NULL,
    dateDon DATE,
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    PRIMARY KEY (montantDon,dateDon,utilisateur),
    CHECK (montantDon>0)
);

INSERT INTO Don (montantDon, dateDon, utilisateur) VALUES (0.1,'2000/01/13','Ron@edu');
INSERT INTO Don (montantDon, dateDon, utilisateur) VALUES (0.2,'2000/01/13','Ron@edu');
INSERT INTO Don (montantDon, dateDon, utilisateur) VALUES (0.1,'2000/01/14','Ron@edu');
--INSERT INTO Don (montantDon, dateDon, utilisateur) VALUES (0.1,'2000/01/13','Alfred@edu'); impossible car alfred n'est pas dans la relation utilisateur
INSERT INTO Don (montantDon, dateDon, utilisateur) VALUES (0.1,'2000/01/13','Phil234@etu');
--INSERT INTO Don ( dateDon, utilisateur) VALUES ('2000/01/13','Phil234@etu'); une valeur NULL viole la contrainte NOT NULL de la colonne « montantdon » DETAIL: La ligne en échec contient (null, 2000-01-13, Phil234@etu)
--INSERT INTO Don (montantDon, utilisateur) VALUES (0.1,'Phil234@etu'); ERREUR: une valeur NULL viole la contrainte NOT NULL de la colonne « datedon » DETAIL: La ligne en échec contient (0.1, null, Phil234@etu)

CREATE TABLE Abonnement (
    auteurNom VARCHAR(255),
    auteurPrenom VARCHAR(255),
    utilisateur VARCHAR(255) REFERENCES UtilisateursEnregistres(email),
    PRIMARY KEY (auteurNom,auteurPrenom,utilisateur),
    FOREIGN KEY (auteurNom,auteurPrenom) REFERENCES Auteur(nom,prenom)
);

INSERT INTO Abonnement (auteurNom,auteurPrenom,utilisateur) VALUES ('Kevin','Integration','Phil234@etu');
INSERT INTO Abonnement (auteurNom,auteurPrenom,utilisateur) VALUES ('Kevin','Integration','Ron@edu');
INSERT INTO Abonnement (auteurNom,auteurPrenom,utilisateur) VALUES ('Kevin','Integration','MariannaRo@tub');
INSERT INTO Abonnement (auteurNom,auteurPrenom,utilisateur) VALUES ('Kevin','Olivera','Phil234@etu');
--INSERT INTO Abonnement (auteurNom,utilisateur) VALUES ('Kevin','Phil234@etu'); La clé (auteurnom, auteurprenom)=(Kevin, Integration) n'est pas présente dans la table « auteur ».


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