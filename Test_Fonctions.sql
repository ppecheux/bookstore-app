/* REQUETES FONCTIONS */

/* un utilisateur peut afficher l’ensemble des livres référencés sur le site */

SELECT *
FROM Livre;

/* un utilisateur peut rechercher un livre par auteur ou par titre (ou les 2) */

SELECT *
FROM Livre, Ecrire
WHERE Livre.titre=Ecrire.titre
AND Livre.titre LIKE '%titreVoulu%'
AND auteurnom LIKE '%nomVoulu%'
AND auteurprenom LIKE '%prenomVoulu%';

/* un utilisateur peut effectuer une recherche dans les livres d’une catégorie seulement */

SELECT *
FROM Livre
WHERE categorie='categorieVoulue';

/* Afficher une fiche auteur */

SELECT *
FROM Auteur
WHERE Auteur.nom = 'nomVoulu'
AND Auteur.prenom = 'prenomVoulu';