<?php

$nom=$_POST['nomAuteur'];
$prenom=$_POST['prenomAuteur'];
$biographie=$_POST['biographieAuteur'];

/** Connexion **/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

/** Préparation et exécution de la requête **/
$sql = "INSERT INTO Auteur (nom, prenom, biographie)
 VALUES ('$nom', '$prenom', '$biographie')";
$result = $vConn->prepare($sql);
$result->execute();

/** Traitement du résultat **/

if ($result) {
  echo "Insertion de $nom $prenom";
}
else {
  echo "Erreur lors de l'insertion";
}

/** Déconnexion **/
$vConn=null;


?>
