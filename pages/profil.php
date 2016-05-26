
<!DOCTYPE html>
<?php
	session_start();
if(!isset($_SESSION['id'])) {
header('location: ../index.php');
exit() ;
}else{
	require_once("../inc/scripts/profile.php");
?>
<html>
	<?php  include '../inc/pieces/meta.php';?>
<body>
  <?php  include '../inc/pieces/header.php';?>
	<main id="profile">
		<div class="cont-profile-wrapper">
				<div class="entete-section section-add-post">
					<h1 class="titre-section"> <i class="mpf-profile"></i> Mon profile </h1>
				</div>
				<div class="info-section">
					<form action="profil.php" method="post" style="text-align:center;">
						<?php foreach($arrUser as $monArray): ?>
						<img class="profile-image" src="../images/profile.png" alt="images profiles">

						<label> Nom <input type="text" name="username" value="<?php echo $monArray['nom_utilisateur']; ?>" placeholder="Nom D'utilisateur"></label>
						<label> Email <input type="email" name="email" value="<?php echo $monArray['courriel']; ?>" placeholder="courriel"></label>
						<p class="erreurForm"><?php echo $msgErreur; ?></p>
						<p class="acceptForm"><?php echo $msgAccept; ?></p>
						<input class="btn-action" type="submit" value="Enregistrer" name="Enregistrer">
						<?php endforeach; ?>
					</form>

					<div class="recents-posts">
						<h2> Mes articles </h2>
						<!-- <p class="succes-modification"> Les modifications ont bien été enregistrer </p> -->
							<?php if(isset($arrUserPost)){ ?>
							<?php foreach($arrUserPost as $monArrayPost): ?>
							<div class="recent-post">
									<div class="recent-post-categorie <?php echo $monArrayPost['nom_categorie']; ?>"></div>
									<input id="cat-hidden" type="hidden" name="categorie_post" value="<?php echo $monArrayPost['id_categorie']; ?>">
									<p class="recent-post-title"> <?php echo $monArrayPost['titre_post']; ?> </p>
									<ul>
										<li><i class="mpf-pencil"></i></li>
										<li><i class="mpf-trash" data-vid="<?php echo $monArrayPost['id_post']; ?>"></i> </li>
									</ul>
									<div class="modifer-post">
										<p class="closePopup"> fermer x </p>
										<h2> Modifier un post</h2>
											<label> Catégorie
												<select id="catSelect"name="categories" >
													<option value="1">Famille</option>
													<option value="2">Amour</option>
													<option value="3">Humour</option>
													<option value="4">Alcool</option>
												</select>
											</label>
											<label> Titre <input type="text" name="titre" value="<?php echo $monArrayPost['titre_post']; ?> " placeholder="Mon titre"></label>
											<label> Votre article <textarea id="description_post" type="text"name="description" placeholder="Rancontez votre histoire ..."><?php echo $monArrayPost['description_post']; ?></textarea></label>
											<p class="erreurForm"><?php echo $msgErreur; ?></p>
											<p class="acceptForm"><?php echo $msgAccept; ?></p>
												<input type="hidden" name="date" value="<?php echo date("Y-m-j"); ?>">
											<button class="btn-action update-post" data-vid="<?php echo $monArrayPost['id_post']; ?>" name="enregistrer"> Enregistrer les modifications </button>
									</div>
							</div>

									<?php endforeach; ?>
								<?php }else{ ?>
							<div class="emptyPost">
										<p> Aucun post pour le moment.</p>
										<a href="creePost.php"><i class="mpf-pencil"></i> </a>
									</p>
									<?php } ?>
							</div>
					</div>
			</div>
		</div>
		<p> <?php echo $strErreur ?> </p>
	</main>
  <footer></footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/profile.js"></script>
<script src="../js/header.js"></script>

</html>
<?php
}
?>
