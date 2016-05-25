<?php

// Importation du fichier de configuration
require_once("config.php");

// Variables
$msgErreur="";
$msgAccept = "";
$arrUserPosts="";
$user = $_SESSION['id'];



try {

  // Requête SQL pour aller chercher les articles de l'utilisateur.
  $SqlRecentsPosts= "SELECT id_post, titre_post,description_post,date_post,user_id, t_posts.id_categorie, nom_categorie
  FROM t_posts
  INNER JOIN t_categorie ON t_categorie.id_categorie = t_posts.id_categorie
  WHERE user_id = '$user'";

      $objResPostUser = $conn->query($SqlRecentsPosts);
      $arrUserPost[] = array();
      if($objResPostUser == false) {
          throw new Exception('La page Accueil n\'est présentement pas disponible.');
      } else {
          unset($arrUserPost);
          while($objLigneUserPost = $objResPostUser->fetch_object()) {
              $arrUserPost[] = array(
                  'id_post' => $objLigneUserPost->id_post,
                  'titre_post' => $objLigneUserPost->titre_post,
                  'description_post' => $objLigneUserPost->description_post,
                  'date_post' => $objLigneUserPost->date_post,
                  'user_id' => $objLigneUserPost->user_id,
                  'id_categorie' => $objLigneUserPost->id_categorie,
                  'nom_categorie' => $objLigneUserPost->nom_categorie,

              );
          }
          $objResPostUser->free_result();

      }
  }
  catch(Exception $e) {
      $strErreur = $e->getMessage();
  }

  //-------------------------------------------//
  // POUR ALLER CHERCHER LES INFO USER
  //-------------------------------------------//
try {

      // Requête SQL pour aller chercher les informations du profile
      $SqlUserProfile= "SELECT id, nom_utilisateur, courriel
      FROM t_utilisateur
      WHERE id = '$user'";

      $objResUser = $conn->query($SqlUserProfile);
      $arrUser[] = array();
      if($objResUser == false) {
          throw new Exception('La page Accueil n\'est présentement pas disponible.');
      } else {
          unset($arrUser);
          while($objLigneUser = $objResUser->fetch_object()) {
              $arrUser[] = array(
                  'id' => $objLigneUser->id,
                  'nom_utilisateur' => $objLigneUser->nom_utilisateur,
                  'courriel' => $objLigneUser->courriel,
              );
          }
          $objResUser->free_result();
      }
  }
  catch(Exception $e) {
      $strErreur = $e->getMessage();
  }


// Si le btn enregistrer est clicker
if(isset($_POST['Enregistrer'])){
  $strUsername = $_POST['username'];
  $strEmail = $_POST['email'];

  // Validation du formulaire d'uptdate
  if($strUsername == "" || $strEmail == ""){
    $msgErreur = "Remplir tous les champs svps";
  }elseif(strlen($strUsername) < 3){
      $msgErreur = "Le nom d'utilisateur est trop petit";
  }
  else{

    // Requête SQL pour la modification du profile
    $sqlUserUpdate = "UPDATE  t_utilisateur
                      SET nom_utilisateur = '$strUsername', courriel='$strEmail'
                      WHERE id = '$user'";

    if (mysqli_query($conn, $sqlUserUpdate)) {

        $msgAccept = "Enregistrement des données";

    } else {

        echo "Error: " . $sqlUserUpdate . "<br>" . $conn->error;
    }
  }
}

$conn->close();
