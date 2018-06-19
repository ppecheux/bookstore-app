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

  if(isset($_POST['montant']) == false){
    $titre = $_GET['titre'];
    $langue = $_GET['langue'];
    echo '<div align="left">';
  	echo "<h2>Rentrer le montant que vous souhaitez donner à l'auteur :</h2>";
  	echo '<form method="post" action="telecharger.php">';
  	echo '<label>Montant </label> <input type="number" name="montant" />';
    echo '<input type="hidden" name="titre" value="'.$titre.'"/>';
    echo '<input type="hidden" name="langue" value="'.$langue.'"/>';
  	echo '<input type="submit" value="Donner"/>';
  	echo '</form>';
    echo '</div>';

  } else {
    $montant = $_POST['montant'];
    $titre = $_POST['titre'];
    $langue = $_POST['langue'];
    if(isset($_SESSION['email'])){
      $email = $_SESSION['email'];

      $dbUser = 'nf17p165';
      $userPw = 'wUANb2Da';
      $vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

      $sql = "INSERT INTO telechargement (utilisateur, titre, langue, prixachat)
      VALUES ('$email', '$titre', '$langue', '$montant')";

      $result = $vConn->prepare($sql);
      $result->execute();

      echo "<p>Merci de votre coopération matelot, encore deux ou trois et je pourrai m'acheter ma jambe de bois !</p>";
    } else {
      echo "<p>Merci de votre coopération matelot anonyme, encore deux ou trois et on dominera les mers !</p>";
    }
  }
  ?>
</body>
</html>
