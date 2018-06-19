<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<header>
	<center><h1>Ajout Catégorie</h1></center>
	<nav>
			<ul>
				<li><a href="accueil.html">Rechercher livre</a></li>
				<li><a href="auteur.html">Rechercher auteur</a></li>
				<li><a href="profilUtilisateur.php">Mon profil</a></li>
				<li><a href="pageIdentificationUtilisateur.html">Se connecter</a></li>
				<li><a href="don.html">Faire un don</a></li>
				<li><a href="pageVedettes.php">Livres en Vedette</a></li>
			<ul/>
		</nav>
</header>

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
</html>
