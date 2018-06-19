<html>
<head>
  <title>Pirate Book</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<header>
	<center><h1>Profil d'auteur</h1></center>
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
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];

    //connection à la base de donnée
    $dbUser = 'nf17p165';
    $userPw = 'wUANb2Da';
    $vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

    $vSql ="SELECT A.nom, A.prenom, A.biographie, C.pays
            FROM Auteur A JOIN Citoyen C
            ON A.nom = C.auteurNom AND A.prenom = C.auteurPrenom
            WHERE A.nom = '$nom' AND A.prenom = '$prenom';";

    $vQuery = $vConn->prepare($vSql);
    $vQuery->execute();
    while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
      echo "Nom : $row[nom]<br>";
      echo "Prénom : $row[prenom]<br>";
      echo "Biographie : $row[biographie]<br>";
      echo "Pays : $row[pays]<br>";
    }

    echo "<br><br>Livres : <br>";
    $vSql ="SELECT L.titre, L.langue, L.page, L.resume
            FROM Livre L JOIN Ecrire E
            ON L.titre = E.titre AND L.langue = E.langue
            WHERE E.auteurNom LIKE '%$nom%' AND E.auteurPrenom LIKE '%$prenom%';";

    echo '<table border="1">';
    echo '<tr><th>titre</th><th>langue</th><th>page</th><th>resume</th></tr>';
    $vQuery = $vConn->prepare($vSql);
    $vQuery->execute();
    while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>$row[titre]</td>";
      echo "<td>$row[langue]</td>";
      echo "<td>$row[page]</td>";
      echo "<td>$row[resume]</td>";
      echo "</tr>";
    }
    echo '</table>';

    if(isset($_SESSION['email'])){
      echo '<br><a href="ajouterAbonnement.php?nom='.$nom.'&prenom='.$prenom.'">S abonner</a>';
    }

    //déconnection de la base de donnée
    $vConn=NULL;
  ?>
</body>
</html>
