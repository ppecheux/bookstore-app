<?php

$nom=$_POST['nomCategorie'];
$description=$_POST['descriptionCategorie'];

/** Connexion **/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

/** Préparation et exécution de la requête **/
$sql = "INSERT INTO Categorie (nom, description)
 VALUES ('$nom', '$description')";
$result = $vConn->prepare($sql);
$result->execute();

/** Traitement du résultat **/

if ($result) {
  echo "Insertion de $nom";
}
else {
  echo "Erreur lors de l'insertion";
}

/** Déconnexion **/
$vConn=null;


?>
