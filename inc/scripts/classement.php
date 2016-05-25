<?php

// Importation du fichier de configuration
require_once("config.php");

// Variable
$id_post_categorie = $_GET['categorie'];

// Requête SQL pour aller chercher les articles à afficher sur selon la catégorie choisie.
$SqlPostClas= "SELECT id_post, titre_post, description_post,date_post, nom_utilisateur, nom_categorie
FROM t_posts
INNER JOIN t_utilisateur ON t_posts.user_id = t_utilisateur.id
INNER JOIN t_categorie ON t_posts.id_categorie = t_categorie.id_categorie
WHERE t_posts.id_categorie = '".$id_post_categorie."'";

  $objResPost = $conn->query($SqlPostClas);

$arrPostsCat[] = array();

    unset($arrPostsCat);
    while($objLignePost = $objResPost->fetch_object()) {
        $arrPostsCat[] = array(
            'id_post' => $objLignePost->id_post,
            'titre_post' => $objLignePost->titre_post,
            'description_post' => $objLignePost->description_post,
            'date_post' => $objLignePost->date_post,
            'nom_utilisateur' => $objLignePost->nom_utilisateur,
            'nom_categorie' => $objLignePost->nom_categorie,
        );
    }
    $objResPost->free_result();

$conn->close();
