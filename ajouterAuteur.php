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
				<li><a href="don.html">Faire un don</a></li>
				<li><a href="pageVedettes.php">Livres en Vedette</a></li>
			<ul/>
		</nav>
</header>
<?php

$nom=$_POST['nomAuteur'];
$prenom=$_POST['prenomAuteur'];
$biographie=$_POST['biographieAuteur'];
$pays=$_POST['pays'];

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
  echo "<p>Insertion de $nom $prenom</p>";
}
else {
  echo "<p>Erreur lors de l'insertion</p>";
}

$sql = "INSERT INTO Nationalite (pays)
 VALUES ('$pays')";
$result = $vConn->prepare($sql);
$result->execute();

/** Traitement du résultat **/

if ($result) {
  echo "<p>Insertion de $pays</p>";
}
else {
  echo "<p>Erreur lors de l'insertion</p>";
}
$sql = "INSERT INTO Citoyen (pays,auteurNom, auteurPrenom)
 VALUES ('$pays', '$nom', '$prenom')";
$result = $vConn->prepare($sql);
$result->execute();

/** Traitement du résultat **/

if ($result) {
  echo "<p>Insertion de citoyen</p>";
}
else {
  echo "<p>Erreur lors de l'insertion</p>";
}
/** Déconnexion **/
$vConn=null;
?>
</html>
