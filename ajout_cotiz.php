<?php
include "header.php";

if(isset($_POST['nom'])){
 	
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	$stmt = mysqli_prepare($mysqli, "INSERT INTO cotisants (nom, prenom, date_cotiz, login, carte, type, annee, mail) VALUE (?, ?, ?, ?, ?, ?, ?, ?)");
	
	if($_POST['annee'] != "Ext"){
		$mail = $_POST['login']."@etu.univ-lorraine.fr";
	}
	else{
		$mail = $_POST['mail'];
	}
	//on insert les paramètres
	mysqli_stmt_bind_param($stmt, "ssssssss", $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['login'], $_POST['Carte'], $_POST['type'], $_POST['Annee'], $mail);
	
	//on execute la procédure
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	echo "<h1>Cotisant ajouté</h1>";
}

?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="ajout_cotiz.php" method="post">
    <div class="form-group">
	    <label for="nom" class="col-sm-2 control-label">Nom</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="nom" placeholder="Nom">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="prenom" class="col-sm-2 control-label">Prénom</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="prenom" placeholder="Prénom">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="mail" class="col-sm-2 control-label">Mail</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="mail" placeholder="(si extérieur)">
	    </div>
	 </div>
	<div class="form-group">
		<label for="Annee" class="col-sm-2 control-label">Annee</label>
		<select name="Annee" class="form-control">
			<option value="Ext">Ext</option>
			<option value="1A">1A</option>
    		<option value="2A">2A</option>
    		<option value="3A">3A</option>
    		<option value="4A">4A</option>
    		<option value="5A">5A</option>
    		<option value="Erasmus">Erasmus</option>
		</select>
	</div>
	<div class="form-group">
	    <label for="login" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="login" placeholder="Login">
	    </div>
	</div>
	  <div class="form-group">
	    <label for="Carte">Carte : </label>
	    <select name="Carte" class="form-control">
			<option value="oui">oui</option>
	    	<option value="non">non</option>
		</select>
	  </div>
	<div class="form-group">
	    <label for="date" class="col-sm-2 control-label">Date</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="date" placeholder="Date format jj/mm/annee">
	    </div>
	</div>
	<div class="form-group">
		<label for="type" class="col-sm-2 control-label">Type</label>
		<select name="type" class="form-control">
			<option value="etudiant">Etudiant</option>
    		<option value="exterieur">Exterieur</option>
    		<option value="personnel">Personnel</option>
    		<option value="honneur">Honneur</option>
		</select>
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
