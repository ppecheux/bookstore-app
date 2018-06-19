<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<header>
	<center><h1>Merci pour votre trésor, moussaillon ! De nombreuses bouteilles de rhum en perspective.</h1></center>
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
	session_start();
	if(isset($_SESSION['email'])){
		$montant=$_POST['don'];
		$email=$_SESSION['email'];
		/** Connexion **/
		$dbUser = 'nf17p165';
		$userPw = 'wUANb2Da';
		$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

		/** Préparation et exécution de la requête **/
		$sql = "INSERT INTO don (montantdon, datedon, utilisateur)
		 VALUES ('$montant', NOW(), '$email')";
		$result = $vConn->prepare($sql);
		$result->execute();

		if ($result) {
		  echo "<p>Le don a bien été enregistré</p>";
		}

	}

	else{
		echo "Merci de votre don anonyme";
	}


/** Déconnexion **/
$vConn=null;
?>
</html>
