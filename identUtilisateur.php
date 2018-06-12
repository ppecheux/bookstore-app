<?php

/** Connexion **/
$dbUser = 'nf17p164';
$userPw = 'Ku1AVtps';
$connexion = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=db'.$dbUser.'', $dbUser, $userPw);

$identification=false;

if(isset($_POST['email'])){
  $pemail=$_POST['email'];
  $sql = "SELECT email, prenom FROM UtilisateursEnregistres WHERE email = ".$pemail.";";
  $result = $connexion->prepare($sql);
  $result->execute();
}else{
  echo "<p> veuillez choisir une adresse email.<p>";
}
if(isset($_POST['mdp'])){
  $pmdp=$_POST['mdp'];
}else{
  echo "<p> veuillez choisir un mdp<p>";
}
/** veirfication de la validité des informatins **/

if (isset($pmdp) && isset($pemail)){
  $sql = "SELECT email, motDePasse
  FROM UtilisateursEnregistres
  WHERE email = ".$pemail."
  AND motDePasse = ".$pmdp.";";

  $result = $connexion->prepare($sql);
  $result->execute();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $identification=true;
  }
}

/** Traitement du résultat **/
if ($identification) {
/**rediriger vers la page utilisateur**/
}
else {
  echo "<p>Erreur lors de l'identification</p>";
}

/** Déconnexion **/
$connexion=null;

?>
