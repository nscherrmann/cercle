<?php
include "header.php";

if(isset($_POST['login'])){
 	
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	$stmt = mysqli_prepare($mysqli, "INSERT INTO admin (login, mdp) VALUE (?, ?)");
	//on insert les paramètres
	$mdp = $_POST['mdp'];
	mysqli_stmt_bind_param($stmt, "ss", $_POST['login'], $mdp);
	
	//on execute la procédure
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	echo "<h1>Admin ajouté</h1>";
}

?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="ajout_admin.php" method="post">
    <div class="form-group">
	    <label for="login" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="login" placeholder="Login" autocomplete="off">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="mdp" class="col-sm-2 control-label">Mot de passe</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" autocomplete="off">
	    </div>
	 </div>
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Ajouter</button>
	    </div>
	  </div>
</form>
</div>
<?php
include "footer.php";
?>
