<html>
<head>
  <title>Pirate Book</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
<body>
  <p>Voici les résultat de la recherche pour le mot clé <?php echo $_POST['motCle']?> : <p>

  <table border="1">
    <tr><th>titre</th><th>langue</th><th>page</th><th>resume</th></tr>
	<?php 
		$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', 'nf17p165', 'wUANb2Da');
		
		$vSql ="SELECT titre, langue, page, resume
						FROM Livre
						WHERE titre LIKE '%".$_POST['motCle']."%';";
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
	?>
	</table>
  <div align = "right"><a href="accueil.html">Retour à l'accueil</a></div>
</body>
</html>
