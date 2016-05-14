<?php
//connexion à la base de donnée en locale
$servernameBd = "localhost";
$usernameBd = "root";
$passwordBd = "";
$dbname = "TIM_bedards_mpf_DB";
// Create connection
$conn = new mysqli($servernameBd, $usernameBd, $passwordBd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$msgErreur="";

$user = $_SESSION['id'];
try {

      $SqlUserProfile= "SELECT id, nom_utilisateur, courriel
      FROM t_utilisateur
      WHERE id = '$user'";

      $objResUser = $conn->query($SqlUserProfile);
      $arrUser[] = array();
      if($objResUser == false) {
          throw new Exception('La page Accueil n\'est présentement pas disponible.');
      } else {
          unset($arrUser);
          while($objLigneUser = $objResUser->fetch_object()) {
              $arrUser[] = array(
                  'id' => $objLigneUser->id,
                  'nom_utilisateur' => $objLigneUser->nom_utilisateur,
                  'courriel' => $objLigneUser->courriel,
              );
          }
          $objResUser->free_result();
      }
  }
  catch(Exception $e) {
      $strErreur = $e->getMessage();
  }
if(isset($_POST['Enregistrer'])){
  $strUsername = $_POST['username'];
  $strEmail = $_POST['email'];

  if($strUsername == "" || $strEmail == ""){
    $msgErreur = "Remplir tous les champs svps";
  }elseif(strlen($strUsername) < 3){
      $msgErreur = "Le nom d'utilisateur est trop petit";
  }
  else{
    $sqlUserUpdate = "UPDATE  t_utilisateur
                      SET nom_utilisateur = '$strUsername', courriel='$strEmail'
                      WHERE id = '$user'";

    if (mysqli_query($conn, $sqlUserUpdate)) {

        echo "New records created successfully";

    } else {

        echo "Error: " . $sqlUserUpdate . "<br>" . $conn->error;
    }
  }
}

  $conn->close();
