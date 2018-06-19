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
<body>
	<?php
		//connection à la base de donnée
		$dbUser = 'nf17p165';
		$userPw = 'wUANb2Da';
		$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

		echo '<p>Voici l ensemble des livres : </b></p>';
		$vSql ="SELECT L.titre AS titre, L.langue AS langue, L.page AS page, L.resume AS resume, E.auteurNom AS auteurNom, E.auteurPrenom AS auteurPrenom
					FROM Livre L, Ecrire E
					WHERE L.titre=E.titre AND L.langue=E.langue";

		echo '<table border="1">';
		echo '<tr><th>titre</th><th>langue</th><th>page</th><th>resume</th><th>Auteur</th></th><th>Action</th></tr>';

		$vQuery = $vConn->prepare($vSql);
		$vQuery->execute();
		while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>$row[titre]</td>";
			echo "<td>$row[langue]</td>";
			echo "<td>$row[page]</td>";
			echo "<td>$row[resume]</td>";
			echo "<td>".$row['auteurprenom']." ".$row['auteurnom']."</td>";
			echo '<td><a href="ajouterVedette.php?titre='.$row['titre'].'&langue='.$row['langue'].'">Ajouter en Vedette</a>';
			echo "</tr>";
		}
		echo '</table>';

		//déconnection de la base de donnée
		$vConn=NULL;
	?>

</body>
</html>
