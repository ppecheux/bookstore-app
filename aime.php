<html>
<head>
  <title>Pirate Book</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<header>
	<center><h1>AIMER</h1></center>
	<nav>
			<ul>
				<li><a href="accueil.html">Rechercher livre</a></li>
				<li><a href="auteur.html">Rechercher auteur</a></li>
				<li><a href="profilUtilisateur.php">Mon profil</a></li>
				<li><a href="pageIdentificationUtilisateur.html">Se connecter</a></li>
        <li><a href="deco.php">Se déconnecter</a></li>
        <li><a href="don.html">Faire un don</a></li>
        <li><a href="pageVedettes.php">Livres en Vedette</a></li>
        <li><a href="don.html">Faire un don</a></li>
				<li><a href="pageVedettes.php">Livres en Vedette</a></li>
			<ul/>
		</nav>
</header>
<body>
<?php
  session_start();

  if(isset($_SESSION['email'])){
    //connection à la base de donnée
    $dbUser = 'nf17p165';
    $userPw = 'wUANb2Da';
    $vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

    $titre = $_GET['titre'];
    $langue = $_GET['langue'];
    $email = $_SESSION['email'];

    $sql = "INSERT INTO aime (utilisateur, titre, langue)
     VALUES ('$email', '$titre', '$langue')";

    $result = $vConn->prepare($sql);
    $result->execute();

    echo "Vous avez aimé le livre";

  } else {
    echo "Vous devez être connecté pour aimer un livre";
  }

 ?>
</body>
</html>
