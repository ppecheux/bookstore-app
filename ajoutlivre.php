<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <h1>Ajout de livre</h1>

	<div align="center">
	<p>Remplissez le formulaire suivant :</p>
		<form method="post" action="ajouterLivre.php">

			Auteur (*): <select name="auteur">
      <?php

      $dbUser = 'nf17p165';
	    $userPw = 'wUANb2Da';
			$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

			$vSql ="SELECT nom, prenom
						FROM Auteur ;";

			$vQuery = $vConn->prepare($vSql);
			$vQuery->execute();

			while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
				echo "<option value='".$row['nom']."/".$row['prenom']."'>".$row['nom']." ".$row['prenom']."</option>";
		}

      ?>
		</select><br><br>
			Catégorie (*): <select name="categorie">
      <?php

      $dbUser = 'nf17p165';
	    $userPw = 'wUANb2Da';
			$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

			$vSql ="SELECT nom
						FROM categorie ;";

			$vQuery = $vConn->prepare($vSql);
			$vQuery->execute();

			while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
				echo "<option value='".$row['nom']."'>".$row['nom']."</option>";
		}

      ?>
		</select> <br><br>
			Licence (*): <select name="licence">
      <?php

      $dbUser = 'nf17p165';
	    $userPw = 'wUANb2Da';
			$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

			$vSql ="SELECT id
						FROM licence;";

			$vQuery = $vConn->prepare($vSql);
			$vQuery->execute();

			while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
				echo "<option value='".$row['id']."'>".$row['id']."</option>";
		}

      ?>


			</select>
			<br><br>
			<label>Titre (*):</label> <input type="text" name="titreLivre" required/>
			<br><br>
			<label>Langue (*):</label> <input type="text" name="langueLivre" required/>
			<br><br>
			<label>NbPages (*):</label> <input type="text" name="NbPagesLivre" required/>
			<br><br>
			<label>Resume :</label> <input type="text" name="ResumeLivre" />
			<br><br>
			<label>Date de Publication :</label> <input type="text" name="datePublicationLivre" />
			<br><br><br>

		  <input type="submit" value="Ajouter"/>
		</form>
	</div>

</body>
</html>
