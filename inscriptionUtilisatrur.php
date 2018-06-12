<?php

/** Connexion **/
$dbUser = 'nf17p165';
$userPw = 'wUANb2Da';
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p165', $dbUser, $userPw);

if(isset($_POST['email'])){
  $pemail=$_POST['email'];
}else{$pemail=NULL;}
if(isset($_POST['mdp'])){
  $pmdp=$_POST['mdp'];
}else{$pmdp=null;}
if(isset($_POST['nom'])){
  $pnom=$_POST['nom'];
}else{$pnom=null;}
if(isset($_POST['prenom'])){
  $pprenom=$_POST['prenom'];
}else{$pprenom=null;}

/** veirfication de la validité des informatins **/

$sql = "SELECT email, prenom FROM UtilisateursEnregistres WHERE email = ".$pemail.";";
$result = $connexion->prepare($sql);
$result->execute();
$uniqueEmail = true;
while ($row = $vQuery->fetch(PDO::FETCH_ASSOC)) {
  	   echo "<p>cette adresse email est déjà utilisée par <p>";
		    echo "<p>$row[titre]<p>";$pemail
        echo "<p> veuillez choisir une autre adresse email.<p>";
        $valideEmail = false;
}

if ($uniqueEmail && !is_null($pmdp) && !is_null($pemail) && !is_null($pprenom)){
  $sql = "INSERT INTO UtilisateursEnregistres (nom, prenom, motDePasse, email)
  VALUES (".$pnom.",".$pprenom.",".$pmdp.",".$pemail.");";
  $result = $connexion->prepare($sql);
  $result->execute();
}

/** Traitement du résultat **/
if ($result) {
  echo "votre compte utilisateur a été enregegisté avec succes";
}
else {
  echo "Erreur lors de l'insertion";
}

/** Déconnexion **/
$connexion=null;

?>
