<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Exercice</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
  <h1>Notes des UVS</h1>
  <table border="1">
    <tr><th>Devoir</th><th>Date de rendu</th><th>Note</th></tr>
    <?php
      $vConn = new PDO('psql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p164','nf17p165','Ku1AVtps');
      $vSql = "select D.description, D,dateRendu, N.va
        from tDevoir D join tNote N
        on D.num= .Devoir
        where N.etudiant = 'bfrankli';";
      $vQuery = $vConn->prepare($vSql);
      $vQuery->execute();
      $somme = 0;
      $nbNote = 0;
      while($row = $vQuery->fetch(PDO::FETCH-ASSOC)){
        $somme  = $somme +1;
        echo "<tr>";
        echo "<td>$row[description]<\td>";
        echo "<td>$row[description]<\td>";
        echo "<td>$row[description]<\td>";
        echo "<\tr>";
      }
      $moyenne = $somme/$nbNote;
      echo "<\table>"
    ?>

  <ul>
    <li>Département le plus peuplé : <b>Paris</b> (<i>2147857</i>)</li>

  </ul>
</body>
</html>
