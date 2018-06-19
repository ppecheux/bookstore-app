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

$titre=$_POST['titreLivre'];
$langue=$_POST['langueLivre'];
$page=$_POST['NbPagesLivre'];
$resume=$_POST['ResumeLivre'];
$date=$_POST['datePublicationLivre'];
$categorie=$_POST['categorie'];
$licence=$_POST['licence'];
$auteur=$_POST['auteur'];
$reference=$_POST['reference'];

list($auteurnom, $auteurprenom) = split('[/]', $auteur);
list($referenceNom, $referencePrenom) = split('[/]', $reference);

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

/** Preparation de la requête **/

$sql = "INSERT INTO Reference (auteurnom, auteurprenom, titre, langue)
 VALUES ('$referenceNom', '$referencePrenom', '$titre', '$langue')";
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
</html>
