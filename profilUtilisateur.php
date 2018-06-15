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

  if(isset($_SESSION['email'])){
    $dbUser = 'nf17p165';
    $userPw = 'wUANb2Da';
    $connexion = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=db'.$dbUser.'', $dbUser, $userPw);
    $sql = "SELECT nom, prenom FROM UtilisateursEnregistres WHERE email = '".$_SESSION['email']."';";
    $result = $connexion->prepare($sql);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "<p>Bonjour ".$row['nom']." ".$row['prenom']."</p>";
    }
    if ($_SESSION['email'] == "admin@admin.fr"){
      echo '<nav>
    			<ul>
    				<li><a href="ajoutlivre.php">Ajouter livre</a></li>
    				<li><a href="ajoutauteur.html">Ajouter auteur</a></li>
    				<li><a href="ajoutcategorie.html">Ajouter catégorie</a></li>
    			<ul/>
    		</nav>';
    }
  } else {
		header('Location: pageIdentificationUtilisateur.html');
	  exit();
	}

?>
</html>
