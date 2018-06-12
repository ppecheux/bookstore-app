<?php

$titre=$_POST['titreLivre'];
$langue=$_POST['langueLivre'];
$page=$_POST['NbPagesLivre'];
$resume=$_POST['ResumeLivre'];
$date=$_POST['datePublicationLivre'];
$categorie=$_POST['categorie'];
$licence=$_POST['licence'];
$auteur=$_POST['auteur'];

list($auteurnom, $auteurprenom) = split('[/]', $auteur);

/** Connexion **/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

/** Préparation et exécution de la requête **/
$sql = "INSERT INTO Livre (titre, langue, page, resume, datePublication, categorie, licence)
 VALUES ('$titre', '$langue', '$page', '$resume', '$date', '$categorie', '$licence')";
$result = $vConn->prepare($sql);
$result->execute();

/** Traitement du résultat **/

if ($result) {
  echo "Insertion de $titre";
}
else {
  echo "Erreur lors de l'insertion";
}

/** Préparation et exécution de la requête **/
$sql = "INSERT INTO Ecrire (auteurnom, auteurprenom, titre, langue)
 VALUES ('$auteurnom', '$auteurprenom', '$titre', '$langue')";
$result = $vConn->prepare($sql);
$result->execute();

/** Traitement du résultat **/

if ($result) {
  echo "<br>Insertion de l'ecriture";
}
else {
  echo "<br>Erreur lors de l'insertion";
}

/** Déconnexion **/
$vConn=null;


?>
