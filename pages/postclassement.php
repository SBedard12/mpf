<!DOCTYPE html>
<?php
	session_start();
if(!isset($_SESSION['id'])) {
header('location: ../index.php');
exit() ;
}else{
	  require_once("../inc/scripts/classement.php");
	   $post_id = '';
?>
<html>
	<?php  include '../inc/pieces/meta.php';?>
<body>
	<div class="container">
	<?php  include '../inc/pieces/header.php';?>


	<main id="accueil">
    <div class="btn-retour">
      <a href="accueil.php"<i class="mpf-arrow-left"> </i></a>
    </div>

    <h2 class="classement-title"> <?php echo $arrPostsCat[0]['nom_categorie']; ?> </h2>

		<?php foreach($arrPostsCat as $monArraycat): ?>
			<div class="un-post">
				<div class="cat-post">
					<p class="nom-cat-post"> <?php echo $monArraycat['nom_categorie']; ?> </p>
				</div>
				<div class="info-post">
					<div class="info-perso-post">
						<img src="../images/profile.png" alt="images profiles">
						<h2 class="username-post"> 	<?php echo $monArraycat['nom_utilisateur']; ?> </h2>
					</div>
					<p class="date-post"> <i class="mpf-calender"> </i> <?php echo $monArraycat['date_post']; ?></p>
					<h3 class="titre-post">	<?php echo $monArraycat['titre_post']; ?> </h3>
					<p class="description-post"> <?php echo $monArraycat['description_post']; ?> </p>
					<p class="description-post"> <?php echo $monArraycat['id_post']; ?> </p>

				</div>
			</div>

		<?php
		endforeach;
		// $post_id = $arrPostsCat['id_post'];
	  ?>
    <div class="classement-post">
			<i class="btn-menu-open mpf-th-small-outline"></i>
			<ul>
				<li class="Famille" data-vid="1"> </li>
				<li class="Amour" data-vid="2"> </li>
				<li class="Alcool" data-vid="4">  </li>
				<li class="Humour" data-vid="3"> </li>
			</ul>
		</div>



	</main>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/accueil.js"></script>
<script src="../js/header.js"></script>
</html>
<?php
}
?>
