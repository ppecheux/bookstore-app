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
session_start();
/** Connexion **/
/*$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=db'.$dbUser.'', $dbUser, $userPw);*/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

$identification=false;

/** veirfication de la validité des informatins **/
$pEmail = $_POST['email'];
//echo "$pEmail";
$pMdp=$_POST['mdp'];
//echo "$pMdp";

if (isset($pMdp) && isset($pEmail)){
  $sql = "SELECT email, motdepasse, prenom
  FROM utilisateursenregistres
  WHERE email = '".$pEmail."'
  AND motdepasse = '".$pMdp."';";

  $result = $vConn->prepare($sql);
  $result->execute();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<p>bonjour <b>$row[prenom]</b> !!!</p>";
    $identification = true;
  }
}

/** Traitement du résultat **/
if ($identification == true) {
  $_SESSION['email'] = $pEmail;
  header('Location: profilUtilisateur.php');
  exit();
}
else {
  echo "<p>Erreur lors de l'identification</p>";
}

/** Déconnexion **/
$connexion=null;
?>
</html>
