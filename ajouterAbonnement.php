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
				<li><a href="deco.php">Se déconnecter</a></li>
			<ul/>
		</nav>
</header>
<?php

$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
session_start();
$email=$_SESSION['email'];
/** Connexion **/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

/** Préparation et exécution de la requête **/
$sql = "INSERT INTO abonnement (auteurnom, auteurprenom, utilisateur)
 VALUES ('$nom', '$prenom', '$email')";
$result = $vConn->prepare($sql);
$result->execute();

if ($result) {
  echo "<p>Vous vous êtes bien abonné à $nom $prenom</p>";
}
else {
  echo "<p>Erreur lors de l'insertion</p>";
}

/** Déconnexion **/
$vConn=null;
?>
</html>
