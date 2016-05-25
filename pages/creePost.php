<!DOCTYPE html>
<?php
	session_start();
if(!isset($_SESSION['id'])) {
header('location: ../index.php');
exit() ;
}else{

  require_once("../inc/scripts/creationPost.php");
  ?>
<html>
<?php  include '../inc/pieces/meta.php';?>
<body>
  <?php  include '../inc/pieces/header.php';?>
	<main id="creePost">
		<div class="cont-creePost-wrapper">
			<div class="entete-section section-add-post">
				<h1 class="titre-section"> <i class="mpf-pencil"> </i> Ma première fois </h1>
			</div>
			<div class="info-section">
					<form action="creePost.php" method="post">
						<label> Catégorie
							<select name="categories">
								<option value="1">Famille</option>
								<option value="2">Amour</option>
								<option value="3">Humour</option>
									<option value="4">Alcool</option>
							</select>
						</label>
						<label> Titre <input type="text" name="titre" value="<?php if(isset($strTitre)){echo $strTitre;} ?>" placeholder="Mon titre"></label>
						<label> Votre article <textarea type="text"name="description" placeholder="Rancontez votre histoire ..."><?php if(isset($strDesciption)){echo $strDesciption;} ?></textarea></label>

						<p class="erreurForm"><?php echo $msgErreur; ?></p>
						<p class="acceptForm"><?php echo $msgAccept; ?></p>
							<input type="hidden" name="date" value="<?php echo date("Y-m-j"); ?>">
	          <input class="btn-action" type="submit" value="Publier" name="publier">
					</form>
				</div>
		</div>
	</main>
  <footer></footer>
</body>
<script src="../js/header.js"></script>
<script src="../js/header.js"></script>
</html>

<?php
}
?>
