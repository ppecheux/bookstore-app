
<html>
<head>
	<title>Pirate Book</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php

/** Connexion **/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$connexion = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=db'.$dbUser.'', $dbUser, $userPw);


$uniqueEmail = true;

$pEmail=$_POST['email'];
$sql = "SELECT email FROM UtilisateursEnregistres WHERE email = '".$pEmail."';";
$result = $connexion->prepare($sql);
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  echo "<p>Cette adresse email est déjà utilisée. Veuillez choisir une autre adresse email.</p>";
  $uniqueEmail = false;
}

$pMdp=$_POST['mdp'];
if(isset($_POST['nom'])){
  $pNom=$_POST['nom'];
}
$pPrenom=$_POST['prenom'];


/** veirfication de la validité des informations **/

//$resultat=false;
if ($uniqueEmail && isset($pNom)){
  $sql = "INSERT INTO utilisateursenregistres (nom, prenom, motDePasse, email)
  VALUES ('$pNom','$pPrenom','$pMdp','$pEmail');";
  $result = $connexion->prepare($sql);
  $result->execute();
} else {
  $sql = "INSERT INTO utilisateursenregistres (prenom, motDePasse, email)
  VALUES ('$pPrenom','$pMdp','$pEmail');";
  $result = $connexion->prepare($sql);
  $result->execute();
}

/** Traitement du résultat **/
if ($result) {
  echo "<p>Cher ".$pPrenom.", votre compte utilisateur est enregistré avec succès. </p>";
}
else {
  echo "<p>Echec de l'inscription</p>";
}

/** Déconnexion **/
$connexion=null;

?>
</body>
</html>
