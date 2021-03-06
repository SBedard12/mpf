<?php

// Importation du fichier de configuration
require_once("config.php");

// Variables
$msgErreur = "";
$msgAccept = "";
$strErreur ="";

// Si le btn publier est clicker
if(isset($_POST['publier'])){

  $strTitre = $_POST['titre'];
  $strDesciption = $_POST['description'];
  $idCategorie = $_POST['categories'];
  $datePost = $_POST['date'];
  $useid = $_SESSION['id'];

  // Validation sur les informations du formulaire d'un article
  if($strTitre == "" || $strDesciption == ""){
    $msgErreur = "Remplir tous les champs svp !";
  }elseif(strlen($strTitre) < 3){
      $msgErreur = "Le titre est trop petit";
  }elseif(strlen($strDesciption) < 10){
      $msgErreur = "La description est trop court";
  }
  else{
    try {
    // Requête SQL pour ajouter un article dans la base de donnée
    $sqlPost = "INSERT INTO t_posts (titre_post, description_post, id_categorie, date_post, user_id)
        VALUES ('$strTitre', '$strDesciption', '$idCategorie', '$datePost', '$useid')";

      if (mysqli_query($objConnMySQLi, $sqlPost)) {
          $msgAccept = "Votre article a été crée avec succes ";
      } else {
          throw new Exception('Un problème est survenu, veuillez réessayer plus tard ');
      }
    }
    catch(Exception $e) {
        $strErreur = $e->getMessage();
    }
  }
}
$objConnMySQLi->close();
