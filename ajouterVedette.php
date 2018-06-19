<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<header>
	<center><h1>ajout du livre en vedette</h1></center>
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
session_start();

if(isset($_POST['datelimite']) == false){
	$titre = $_GET['titre'];
	$langue = $_GET['langue'];
	echo '<div align="left">';
	echo "<h2>Rentrer la date limite et une phrase d'accroche pour plébisciter le livre :</h2>";
	echo '<form method="post" action="ajouterVedette.php">';
	echo '<label>Date </label> <input type="date" name="datelimite" />';
	echo '<br><label>Phrase d accroche </label> <input type="text" name="phraseaccroche" />';
	echo '<input type="hidden" name="titre" value="'.$titre.'"/>';
	echo '<input type="hidden" name="langue" value="'.$langue.'"/>';
	echo '<input type="submit" value="Ajouter"/>';
	echo '</form>';
	echo '</div>';

} else {
	$datelimite = $_POST['datelimite'];
	$phraseaccroche = $_POST['phraseaccroche'];
	$titre = $_POST['titre'];
	$langue = $_POST['langue'];


		$dbUser = 'nf17p165';
		$userPw = 'wUANb2Da';
		$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

		$sql = "INSERT INTO vedette (datelimite, phraseaccroche, titre, langue)
		VALUES ('$datelimite', '$phraseaccroche', '$titre', '$langue')";

		$result = $vConn->prepare($sql);
		$result->execute();

		echo "<p>Livre ajouté en vedette</p>";
	}

?>
</html>
