<html>
<head>
  <title>Pirate Book</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<header>
	<center><h1>Page Auteur</h1></center>
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
    //connection à la base de donnée
    $dbUser = 'nf17p165';
    $userPw = 'wUANb2Da';
    $vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

    if(isset($_POST['auteurNom']) || isset($_POST['auteurPrenom'])) {

      $nom = $_POST['auteurNom'];
      $prenom = $_POST['auteurPrenom'];
      echo "<p>Résultat de la recherche de <b>".$nom." ".$prenom."</b></p>";
      $vSql ="SELECT nom, prenom
              FROM Auteur
              WHERE nom LIKE '%$nom%' AND prenom LIKE '%$prenom%';";
    }

    echo '<table border="1">';
    echo '<tr><th>Nom</th><th>Prénom</th><th>Profil</th></tr>';
    $vQuery = $vConn->prepare($vSql);
    $vQuery->execute();
    while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>$row[nom]</td>";
      echo "<td>$row[prenom]</td>";
      echo '<td><a href="pageAuteur.php?nom='.$row['nom'].'&prenom='.$row['prenom'].'">Page Profil</a>';
      echo "</tr>";
    }
    echo '</table>';


    //déconnection de la base de donnée
    $vConn=NULL;
  ?>
</body>
</html>
