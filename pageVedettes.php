<html>
<head>
  <title>Pirate Book</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<header>
	<center><h1>pages des vedettes</h1></center>
	<nav>
			<ul>
				<li><a href="accueil.html">Rechercher livre</a></li>
				<li><a href="auteur.html">Rechercher auteur</a></li>
				<li><a href="profilUtilisateur.php">Mon profil</a></li>
				<li><a href="pageIdentificationUtilisateur.html">Se connecter</a></li>
        <li><a href="deco.php">Se déconnecter</a></li>
        <li><a href="don.html">Faire un don</a></li>
        <li><a href="pageVedettes.php">Livres en Vedette</a></li>
			<ul/>
		</nav>
</header>
<body>
  <?php


    //connection à la base de donnée
    $dbUser = 'nf17p165';
    $userPw = 'wUANb2Da';
    $vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

    $vSql ="SELECT * FROM vVedette;";

    $vQuery = $vConn->prepare($vSql);
    $vQuery->execute();

    echo "<br><br>Livres : <br>";
    echo '<table border="1">';
    echo '<tr><th>titre</th><th>langue</th><th>page</th><th>resume</th><th>categorie</th><th>licence</th><th>phraseaccroche</th><th>auteur</th></tr>';

    while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>$row[titre]</td>";
      echo "<td>$row[langue]</td>";
      echo "<td>$row[page]</td>";
      echo "<td>$row[resume]</td>";
      echo "<td>$row[categorie]</td>";
      echo "<td>$row[licence]</td>";

      echo "<td>$row[phraseaccroche]</td>";
      echo "<td>$row[auteurprenom]"." "."$row[auteurnom]</td>";
      echo "</tr>";
    }
    echo '</table>';

    //déconnection de la base de donnée
    $vConn=NULL;
  ?>
</body>
</html>
