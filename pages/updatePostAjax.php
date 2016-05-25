<?php

require_once("../inc/scripts/config.php");

$id_post = $_POST['id_post'];
$description_post = $_POST['description_post'];
$titre_post = $_POST['titre_post'];
$categorie_post = $_POST['categorie_post'];



$sqlUpdate ="UPDATE t_posts SET titre_post='$titre_post', description_post='$description_post', id_categorie='$categorie_post'
WHERE id_post = '".$id_post."'";

$conn->query($sqlUpdate);


$conn->close();
