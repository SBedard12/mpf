
<!DOCTYPE html>

<?php
	require_once("inc/scripts/validationInscription.php");
?>
<html>
<head>
<title>Ma premiere fois</title>
<link rel="stylesheet" type="text/css" href="css/app.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>
<body id="front-page">

	<div class="logo">
		<p> Ma première fois </p>
		<ul class="media-sociaux">
			<li>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;" xml:space="preserve">
				<g>
					<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803   c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654   c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246   c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z" fill="#FFFFFF"/>
				</g>
				</svg>
			</li>
			<li>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve" width="25px" height="25px">
					<g>
						<path d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411    c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513    c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101    c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104    c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194    c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485    c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z" fill="#FFFFFF"/>
					</g>
				</svg>
			</li>
		</ul>
	</div>
<div class="container">
	<main id="pageConInsc">
			<div class="cont-Header-wrapper">
				<ul>
					<li class="connexion"> <i class="icon-person"></i>Connexion </li>
					<li class="inscription"> <i class="icon-person"></i> Inscription</li>
				</ul>
			</div>
			<div class="content-page-index">
				<div class="cont-inscription-wrapper">
						<form action="index.php" method="post">

							<label> Username  <input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>"placeholder="Enter username"></label>
							<label> Password  <input type="password" name="password" placeholder="Mot de passe"></label>
							<label> Password Vérification  <input type="password" name="passwordVerif" placeholder=" Valider mot de passe"></label>
							<label> Courriel  <input type="email" name="courriel" value="<?php if(isset($courriel)){echo $courriel;} ?>"placeholder="Courriel"></label>
							<label> Courriel Vérification <input type="email" value="<?php if(isset($courrielVerification)){echo $courrielVerification;} ?>"name="courrielVerif" placeholder="Valider courriel"></label>
							<p class="erreurForm"><?php if(isset($courriel)){echo $msgErreur;} ?></p>
							<input class="btn-action" type="submit" value="inscription" name="inscription">
						</form>
				</div>
				<div class="cont-connexion-wrapper">
						<form action="index.php" method="post">
							<label> Courriel  <input type="email" name="courriel" value="<?php if(isset($courriel)){echo $courriel;} ?>"placeholder="Enter courriel"></label>
							<label> Password  <input type="password" name="password" placeholder="Mot de passe"></label>
							<p class="erreurForm"><?php if(isset($courriel)){echo $msgErreurCon;} ?></p>
							<input class="btn-action" type="submit" value="connexion" name="connexion">

						</form>
				</div>
		</div>
	</main>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/index.js"></script>
</html>
