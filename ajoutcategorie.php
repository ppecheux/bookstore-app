<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <h1>Ajout de Catégorie</h1>

	<div align="center">
	<p>Remplissez le formulaire suivant :</p>
		<form method="post" action="ajouterCategorie.php">
			<label>Nom (*):</label> <input type="text" name="nomCategorie" required/>
			<br><br>
			<label>Description :</label> <input type="text" name="descriptionCategorie" />
			<br><br><br>

		  <input type="submit" value="Ajouter"/>
		</form>
	</div>

</body>
</html>
