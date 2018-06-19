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
    //connection à la base de donnée
    $dbUser = 'nf17p165';
    $userPw = 'wUANb2Da';
    $vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

    if(isset($_POST['titre'])){
      $titre = $_POST['titre'];
      echo '<p>Voici les livres dont les titres correspondent à : <b>'.$titre.'</b></p>';
      $vSql ="SELECT L.titre, L.langue, L.page, L.resume, E.auteurNom, E.auteurPrenom
              FROM Livre L JOIN Ecrire E
              ON L.titre=E.titre AND L.langue=E.langue
              WHERE titre LIKE '%$titre%';";
    }else if(isset($_POST['auteurNom']) || isset($_POST['auteurPrenom'])) {
      $nom = $_POST['auteurNom'];
      $prenom = $_POST['auteurPrenom'];
      echo "<p>Voici les livres dont l'auteur correspond à : <b>".$nom." ".$prenom."</b></p>";
      $vSql ="SELECT L.titre, L.langue, L.page, L.resume
              FROM Livre L JOIN Ecrire E
              ON L.titre = E.titre AND L.langue = E.langue
              WHERE E.auteurNom LIKE '%$nom%' AND E.auteurPrenom LIKE '%$prenom%';";
    }else if(isset($_POST['categorie'])) {
      $categorie = $_POST['categorie'];
      echo '<p>Voici les livres dont la catégorie correspond à : <b>'.$categorie.'</b></p>';
      $vSql ="SELECT titre, langue, page, resume
              FROM Livre
              WHERE categorie LIKE '%$categorie%';";
    }

    echo '<table border="1">';
    echo '<tr><th>titre</th><th>langue</th><th>page</th><th>resume</th><th>Auteur</th></th><th>Aime</th></tr>';
    $vQuery = $vConn->prepare($vSql);
    $vQuery->execute();
    while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>$row[titre]</td>";
      echo "<td>$row[langue]</td>";
      echo "<td>$row[page]</td>";
      echo "<td>$row[resume]</td>";
      echo "<td>$row[auteurPrenom] $row[auteurNom]</td>";
      echo '<td><a href="aime.php?titre='.$row['titre'].'&langue='.$row['langue'].'">Aime</a>';
      echo "</tr>";
    }
    echo '</table>';

    //déconnection de la base de donnée
    $vConn=NULL;
  ?>
</body>
</html>
