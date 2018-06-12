<?php

/** Connexion **/
/*$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=db'.$dbUser.'', $dbUser, $userPw);*/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

$identification=false;

/** veirfication de la validité des informatins **/
$pEmail = $_POST['email'];
//echo "$pEmail";
$pMdp=$_POST['mdp'];
//echo "$pMdp";

if (isset($pMdp) && isset($pEmail)){
  $sql = "SELECT email, motdepasse, prenom
  FROM utilisateursenregistres
  WHERE email = '".$pEmail."'
  AND motdepasse = '".$pMdp."';";

  $result = $vConn->prepare($sql);
  $result->execute();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<p>bonjour <b>$row[prenom]</b> !!!</p>";
    $identification = true;
  }
}

/** Traitement du résultat **/
if ($identification == true) {
	echo '<p><a href="profilUtilisateur.php">Profil</a>  ';
  echo '<a href="accueil.html">Faire une recherche</a></p>';
}
else {
  echo "<p>Erreur lors de l'identification</p>";
}

/** Déconnexion **/
$connexion=null;
?>
