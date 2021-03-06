<?php
session_start();

// Importation du fichier de configuration
require_once("config.php");

// Variables
$msgErreurCon = "";
$msgErreur = "";
$msgAccept = "";
$strErreur="";


// Valeur envoyées en post sur l'instriction d'un utilisateur
if(isset($_POST['inscription'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordVerification = $_POST['passwordVerif'];
	$courriel = $_POST['courriel'];
	$courrielVerification = $_POST['courrielVerif'];

    // vérifie si tous les champs sont remplies et prêtes pour la base de donnée
	if(!empty($username) AND !empty($password) AND !empty($passwordVerification) AND !empty($courriel) AND !empty($courrielVerification)){

		$username = htmlspecialchars($username);
		$courriel = htmlspecialchars($courriel);
		$courrielVerification = htmlspecialchars($courrielVerification);

		// vérifie si le nom est plus grand que 3.
		if(strlen($username) < 3 ){
			$msgErreur = "Votre nom doit être entre 3 et 20 caractères";
		}
		// vérifie si les 2 mot de passe sont identique
		elseif($password != $passwordVerification){

			$msgErreur = "Votre mot de passe n'est pas identique";

		}
		// vérifie si le mot de passe est plus de 3 caractères
		elseif(strlen($password) < 3 ){

			$msgErreur = "Votre mot de passe doit être plus de 3 caractères";

		}
		// vérifie si les deux courriels sont identiques
		elseif($courriel != $courrielVerification){

			$msgErreur = "Votre courriel n'est pas identique";
		}
		else{
			try{
			// requête pour vérifier si le courriel existe déja
			$query = ("SELECT id FROM t_utilisateur WHERE courriel = '$courriel'");
			if($query == false) {
					throw new Exception('Un problème est survenu, veuillez réessayer plus tard ');
			} else {
				if ($result=mysqli_query($objConnMySQLi,$query))
				  {
				  // Retourne le nombre de ligne que contien la requête sql
				  $rowcount=mysqli_num_rows($result);
				  // Free result set
				  mysqli_free_result($result);
				  }
				}
			}
			catch(Exception $e) {
					$strErreur = $e->getMessage();
			}

			// vérifie si le courriel existe déja si 1 oui
			if($rowcount == 1){

			   $msgErreur = "Ce courriel existe déja !";

			}else{
				 $msgErreur = "";
				 try{
				 //insertion d'un nouvelle account dans la bd
				$sql = "INSERT INTO t_utilisateur (nom_utilisateur, courriel, mot_de_passe)
						VALUES ('$username', '$courriel', '$password')";

				if (mysqli_query($objConnMySQLi, $sql)) {

				    $msgAccept = "Votre compte a bien été crée";

				} else {

				    throw new Exception('Un problème est survenu, veuillez réessayer plus tard ');
				}
			}
			catch(Exception $e) {
					$strErreur = $e->getMessage();
			}
			}
		}
	}
	else{
		$msgErreur = " Tous les champs doivent être remplie !";
	}
}

//si le bouton connexion est click
if(isset($_POST['connexion'])){


	$courriel = $_POST['courriel'];
	$password = $_POST['password'];
	$monCourriel = "";
	//vérifie si les deux champs sont bien remplie
	if($courriel == "" || $password == ""){

		$msgErreurCon = " Tous les champs doivent être remplie !";

	}
	else{

		try{

		// on va chercher les données de la bd pour la connexion
		$queryConnexion = ("SELECT id, courriel, mot_de_passe FROM t_utilisateur WHERE courriel = '$courriel'");

		$result = $objConnMySQLi->query($queryConnexion);
		if($result == false) {
				throw new Exception('Un problème est survenu, veuillez réessayer plus tard ');
		} else {
			
				if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    		$monId = $row["id"];
			        $monCourriel = $row["courriel"];
			        $monPassword = $row["mot_de_passe"];
			    	}
				}
			}
		}
		catch(Exception $e) {
				$strErreur = $e->getMessage();
		}

		// vérifie si les données entré par l'utilisateur sont identique à celle de la bd
		if($courriel ==  $monCourriel && $password == $monPassword){

			$msgErreurCon = "";
			$_SESSION['id'] = $monId;
			$_SESSION['courriel'] = $monCourriel;
			$_SESSION['mot_de_passe'] = $monPassword;
			header("Location: pages/accueil.php?id=".$_SESSION['id']);
		}
		else{
			$msgErreurCon = "une erreur dans le formulaire";
		}
	}
}

mysqli_close($objConnMySQLi);
?>
