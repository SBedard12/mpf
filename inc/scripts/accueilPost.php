<?php
$servernameBd = "localhost";
$usernameBd = "root";
$passwordBd = "";
$dbname = "TIM_bedards_mpf_DB";
// Create connection
$conn = new mysqli($servernameBd, $usernameBd, $passwordBd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {

      $SqlPostAccueil= "SELECT id_post, titre_post, description_post,date_post, nom_utilisateur, nom_categorie
      FROM t_posts
      INNER JOIN t_utilisateur ON t_posts.user_id = t_utilisateur.id
      INNER JOIN t_categorie ON t_posts.id_categorie = t_categorie.id_categorie
      ORDER BY id_post desc
      LIMIT 2";
      
      $objResPost = $conn->query($SqlPostAccueil);
      $arrPosts[] = array();
      if($objResPost == false) {
          throw new Exception('La page Accueil n\'est présentement pas disponible.');
      } else {
          unset($arrPosts);
          while($objLignePost = $objResPost->fetch_object()) {
              $arrPosts[] = array(
                  'id_post' => $objLignePost->id_post,
                  'titre_post' => $objLignePost->titre_post,
                  'description_post' => $objLignePost->description_post,
                  'date_post' => $objLignePost->date_post,
                  'nom_utilisateur' => $objLignePost->nom_utilisateur,
                  'nom_categorie' => $objLignePost->nom_categorie,
              );
          }
          $objResPost->free_result();

      }
  }
  catch(Exception $e) {
      $strErreur = $e->getMessage();
  }
  $conn->close();
