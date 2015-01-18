<?php
include "header.php";

if(isset($_GET['login'])){
 	
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	//$stmt = mysqli_prepare($mysqli, "INSERT INTO cotisants (nom, prenom, date_cotiz, login, carte, type, annee) VALUE (?, ?, ?, ?, ?, ?, ?)");
	$stmt = mysqli_prepare($mysqli, 'SELECT nom, prenom, date_cotiz, login, carte, type, annee FROM cotisants WHERE login = "'.$_GET['login'].'"');
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $nom, $prenom, $date_cotiz, $login, $carte, $type, $annee);
	
	//on insert les paramètres
	//mysqli_stmt_bind_param($stmt, "sssssss", $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['login'], $_POST['Carte'], $_POST['type'], $_POST['Annee']);
	while (mysqli_stmt_fetch($stmt)) {
?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="modif_cotiz.php" method="post">
    <div class="form-group">
	    <label for="nom" class="col-sm-2 control-label">Nom</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="prenom" class="col-sm-2 control-label">Prénom</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="prenom" value="<?php echo $prenom; ?>">
	    </div>
	 </div>
	<div class="form-group">
		<label for="Annee" class="col-sm-2 control-label">Annee</label>
		<select name="Annee" class="form-control">
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
	      <input type="text" class="form-control" name="login" value="<?php echo $login; ?>">
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
	      <input type="text" class="form-control" name="date" value="<?php echo $date_cotiz; ?>">
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
	      <button type="submit" class="btn btn-default">Modifier</button>
	    </div>
	  </div>
</form>
</div>
<?php
}
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
}
else{
?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="modif_cotiz.php" method="get">
	<div class="form-group">
	    <label for="login" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="login" placeholder="Login">
	    </div>
	 </div>
</form>
</div>
<?php
}
if(isset($_POST['login'])){
 	
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	$stmt = mysqli_prepare($mysqli, "UPDATE cotisants set nom=?, prenom=?, date_cotiz=?, carte=?, type=?, annee=? WHERE login=?");

	
	//on insert les paramètres
	mysqli_stmt_bind_param($stmt, "sssssss", $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['Carte'], $_POST['type'], $_POST['Annee'], $_POST['login']);
	
	//on execute la procédure
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	echo "<center><h1>Cotisant modifié</h1></center>";
}
if(isset($_GET['mail'])){
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	//$stmt = mysqli_prepare($mysqli, "INSERT INTO cotisants (nom, prenom, date_cotiz, login, carte, type, annee) VALUE (?, ?, ?, ?, ?, ?, ?)");
	$stmt = mysqli_prepare($mysqli, 'SELECT nom, prenom, date_cotiz, login, carte, type, annee FROM cotisants WHERE mail = "'.$_GET['mail'].'"');
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $nom, $prenom, $date_cotiz, $login, $carte, $type, $annee);
	
	//on insert les paramètres
	//mysqli_stmt_bind_param($stmt, "sssssss", $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['login'], $_POST['Carte'], $_POST['type'], $_POST['Annee']);
	while (mysqli_stmt_fetch($stmt)) {
?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="modif_cotiz.php" method="post">
    <div class="form-group">
	    <label for="nom" class="col-sm-2 control-label">Nom</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="prenom" class="col-sm-2 control-label">Prénom</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="prenom" value="<?php echo $prenom; ?>">
	    </div>
	 </div>
	<div class="form-group">
		<label for="Annee" class="col-sm-2 control-label">Annee</label>
		<select name="Annee" class="form-control">
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
	      <input type="text" class="form-control" name="login" value="<?php echo $login; ?>">
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
	      <input type="text" class="form-control" name="date" value="<?php echo $date_cotiz; ?>">
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
	      <button type="submit" class="btn btn-default">Modifier</button>
	    </div>
	  </div>
</form>
</div>
<?php
}
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
}
else{
?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="modif_cotiz.php" method="get">
	<div class="form-group">
	    <label for="login" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="login" placeholder="Login">
	    </div>
	 </div>
</form>
</div>
<?php
}
include "footer.php";
?>
