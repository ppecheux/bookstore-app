<html>
<head>
  <title>Pirate Book</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<body>
<?php
  session_start();
  if(isset($_SESSION['email'])){
    unset($_SESSION['email']);
    echo '<p>Déconnection réussie';
  } else {
    echo "<p>Vous n'êtes pas connecté";
  }
?>
</body>
</html>
