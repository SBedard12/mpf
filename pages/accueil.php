<!DOCTYPE html>
<?php
	session_start();
if(!isset($_SESSION['id'])) {
header('location: ../index.php');
exit() ;
}else{
	  require_once("../inc/scripts/accueilPost.php");
	   $post_id = '';  
?>
<html>
	<?php  include '../inc/pieces/meta.php';?>
<body>
	<div class="container">
	<?php  include '../inc/pieces/header.php';?>
	<main id="accueil">

		<?php foreach($arrPosts as $monArray): ?>
			<div class="un-post">
				<div class="cat-post">
					<p class="nom-cat-post"> <?php echo $monArray['nom_categorie']; ?> </p>
				</div>
				<div class="info-post">
					<div class="info-perso-post">
						<img src="../images/profile.png" alt="images profiles">
						<h2 class="username-post"> 	<?php echo $monArray['nom_utilisateur']; ?> </h2>
					</div>
					<p class="date-post"> <?php echo $monArray['date_post']; ?></p>
					<h3 class="titre-post">	<?php echo $monArray['titre_post']; ?> </h3>
					<p class="description-post"> <?php echo $monArray['description_post']; ?> </p>
					<p class="description-post"> <?php echo $monArray['id_post']; ?> </p>

				</div>
			</div>

		<?php
		endforeach; 
		$post_id = $monArray['id_post'];
	
		
		?>
		<div id="remove_row" class="load-more">  

             <button type="button" name="btn_more" data-vid="<?php echo $post_id; ?>" id="btn_more" class="btn btn-success form-control">more</button> 
        </div> 
	</main>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/accueil.js"></script>
</html>
<?php
}
?>
