/* REQUETES FONCTIONS */

/* Récupération du nom prenom pour l'affichage sur la page d'accueil */
SELECT nom, prenom
FROM UtilisateursEnregistres
WHERE email = 'email_voulu';

/* un utilisateur peut afficher l’ensemble des livres référencés sur le site */
SELECT *
FROM Livre;

/* un utilisateur peut rechercher un livre par auteur ou par titre (ou les 2) */
SELECT *
FROM Livre, Ecrire
WHERE Livre.titre=Ecrire.titre
AND Livre.langue=Ecrire.langue
AND Livre.titre LIKE '%titreVoulu%'
AND auteurNom LIKE '%nomVoulu%'
AND auteurPrenom LIKE '%prenomVoulu%';

/* un utilisateur peut effectuer une recherche dans les livres d’une catégorie seulement */
SELECT *
FROM Livre
WHERE categorie='categorieVoulue';

/* Afficher une fiche auteur */
SELECT *
FROM Auteur
WHERE Auteur.nom = 'nomVoulu'
AND Auteur.prenom = 'prenomVoulu';
SELECT *
FROM Livre, Ecrire
WHERE Livre.titre=Ecrire.titre
AND Ecrire.auteurNom = 'nomVoulu'
AND Ecrire.auteurPrenom = 'prenomVoulu';

/* Afficher les livres téléchargés par un utilisateur */
SELECT titre, langue, prixAchat
FROM Telechargement
WHERE utilisateur = 'emailUtilisateur';

/* Afficher les livres aimés par un utilisateur */
SELECT titre, langue
FROM Aime
WHERE utilisateur = 'emailUtilisateur';

/* Afficher les abonnement d'un utilisateur */
SELECT auteurNom, auteurPrenom
FROM Abonnement
WHERE utilisateur = 'emailUtilisateur';

/* Afficher les dons d'un utilisateur */
SELECT dateDon, montantDon
FROM Don 
WHERE utilisateur = 'emailUtilisateur';

/* Afficher les auteurs référencé dans un livre */
SELECT auteurNom, auteurPrenom
FROM Reference
WHERE titre = 'titreVoulu'
AND langue = 'LangueVoulu';


