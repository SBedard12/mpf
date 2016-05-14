
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
				<form action="profil.php" method="post">
					<?php foreach($arrUser as $monArray): ?>
					<label> Nom <input type="text" name="username" value="<?php echo $monArray['nom_utilisateur']; ?>" placeholder="Nom D'utilisateur"></label>
					<label> Email <input type="email" name="email" value="<?php echo $monArray['courriel']; ?>" placeholder="courriel"></label>
					<p class="erreurForm"><?php echo $msgErreur; ?></p>
					<input class="btn-action" type="submit" value="Enregistrer" name="Enregistrer">
					<?php endforeach; ?>
				</form>
			</div>
		</div>
	</main>
  <footer></footer>
</body>
</html>
<?php
}
?>
