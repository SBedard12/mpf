<?php

require_once("../inc/scripts/config.php");



$post_id = $_POST['last_post_id'];

$output = '';
$post = '';

$sql = "SELECT id_post, titre_post, description_post,date_post, nom_utilisateur, nom_categorie
      FROM t_posts
      INNER JOIN t_utilisateur ON t_posts.user_id = t_utilisateur.id
      INNER JOIN t_categorie ON t_posts.id_categorie = t_categorie.id_categorie
      WHERE id_post < '".$post_id."'
      ORDER BY id_post DESC
      LIMIT 5 ";

      $result = $conn->query($sql);

	 if(mysqli_num_rows($result) > 0)
	 {
	      while($row = mysqli_fetch_array($result))
	      {
	           $post_id = $row["id_post"];
	           $output .= '
	                <div class="un-post">
						<div class="cat-post">
							<p class="nom-cat-post"> '.$row["nom_categorie"].'</p>
						</div>
						<div class="info-post">
							<div class="info-perso-post">
								<img src="../images/profile.png" alt="images profiles">
								<h2 class="username-post"> 	'.$row["nom_utilisateur"].' </h2>
							</div>
							<p class="date-post"> '.$row["date_post"].'</p>
							<h3 class="titre-post">	'.$row["titre_post"].'</h3>
							<p class="description-post"> '.$row["description_post"].' </p>
							<p class="description-post"> '.$row["id_post"].' </p>
						</div>
					</div>

	                ';

	      }
	      $output .= '
	                <div id="remove_row" class="load-more">
			             <button type="button" name="btn_more" data-vid="'. $post_id  .'" id="btn_more" class="btn btn-success form-control">Voir plus</button>
			        </div>
	      ';
	      echo $output;
	 }


 ?>
