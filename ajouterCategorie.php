<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<header>
	<center><h1>Bienvenue sur THE PIRATE BOOK !!!!!</h1></center>
	<nav>
			<ul>
				<li><a href="accueil.html">Rechercher livre</a></li>
				<li><a href="auteur.html">Rechercher auteur</a></li>
				<li><a href="profilUtilisateur.php">Mon profil</a></li>
				<li><a href="pageIdentificationUtilisateur.html">Se connecter</a></li>
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
<li><a href="deco.php">Se déconnecter</a></li>

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
