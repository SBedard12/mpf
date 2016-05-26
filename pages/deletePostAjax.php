<?php
require_once("../inc/scripts/config.php");

$post_id = $_POST['last_post_id'];

try{
    // Requête SQL pour suprimmer un article
  $sqlDeletePost = "DELETE FROM t_posts WHERE id_post = '".$post_id."' ";
  if($objConnMySQLi == false) {
      throw new Exception('Un problème est survenu, veuillez réessayer plus tard ');
  } else {
    $objConnMySQLi->query($sqlDeletePost);
  }
}
catch(Exception $e) {
  $strErreur = $e->getMessage();
}
