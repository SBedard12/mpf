<?php
require_once("../inc/scripts/config.php");

$post_id = $_POST['last_post_id'];
echo $post_id;

$sqlDeletePost = "DELETE FROM t_posts WHERE id_post = '".$post_id."' ";

$conn->query($sqlDeletePost);
