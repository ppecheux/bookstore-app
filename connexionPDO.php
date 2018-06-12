<?php

/** Connexion **/
$dbUser = 'nf17p164';
$userPw = 'Ku1AVtps';
$connexion = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=db'.$dbUser.'', $dbUser, $userPw);

$uniqueEmail = false;
$pemail=$_GET['email'];
if(isset($_GET['email'])){
  $pemail=$_GET['email'];
  $sql = "SELECT email, prenom FROM UtilisateursEnregistres WHERE email = ".$pemail.";";
  $result = $connexion->prepare($sql);
  $result->execute();
  $uniqueEmail = true;
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    	   echo "<p>cette adresse email est déjà utilisée par </p>";
  		    echo "<p>".$row['prenom']."</p>";
          echo "<p> veuillez choisir une autre adresse email.</p>";
          $uniqueEmail = false;
  }

}else{echo "<p> Veuillez renseigner une adresse email.</p>";}

if(isset($_GET['mdp'])){
  $pmdp=$_GET['mdp'];
}
if(isset($_GET['nom'])){
  $pnom=$_GET['nom'];
}
if(isset($_GET['prenom'])){
  $pprenom=$_GET['prenom'];
}

/** veirfication de la validité des informations **/

$result=false;
if ($uniqueEmail && isset($pmdp) && isset($pemail) && isset($pprenom)){
  $sql = "INSERT INTO UtilisateursEnregistres (nom, prenom, motDePasse, email)
  VALUES (".$pnom.",".$pprenom.",".$pmdp.",".$pemail.");";
  $result = $connexion->prepare($sql);
  $result->execute();
}

/** Traitement du résultat **/
if ($result) {
  echo "<p>Cher ".$pprenom.", votre compte utilisateur s enregistra avec succes. </p>";
}
else {
  echo "<p>Echec de l'inscription</p>";
}

/** Déconnexion **/
$connexion=null;

?>
