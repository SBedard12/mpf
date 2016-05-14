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

$msgErreur = "";


if(isset($_POST['publier'])){

  $strTitre = $_POST['titre'];
  $strDesciption = $_POST['description'];
  $idCategorie = $_POST['categories'];
  $datePost = $_POST['date'];
  $useid = $_SESSION['id'];

  if($strTitre == "" || $strDesciption == ""){
    $msgErreur = "Remplir tous les champs svps";
  }elseif(strlen($strTitre) < 3){
      $msgErreur = "Le titre est trop petit";
  }elseif(strlen($strDesciption) < 10){
      $msgErreur = "La description est trop court";
  }
  else{
    $sqlPost = "INSERT INTO t_posts (titre_post, description_post, id_categorie, date_post, user_id)
        VALUES ('$strTitre', '$strDesciption', '$idCategorie', '$datePost', '$useid')";

    if (mysqli_query($conn, $sqlPost)) {

        echo "New records created successfully";

    } else {

        echo "Error: " . $sqlPost . "<br>" . $conn->error;
    }
  }

}
