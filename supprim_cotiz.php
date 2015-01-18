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
<br/>
<br/>
<center>
	Nom : <b><?php echo $nom; ?></b><br/>
	Prenom : <b><?php echo $prenom; ?></b><br/>
	Date de cotiz : <b><?php echo $date_cotiz; ?></b><br/>
	Login : <b><?php echo $login; ?></b><br/>
	Carte : <b><?php echo $carte; ?></b><br/>
	Type : <b><?php echo $type; ?></b><br/>
	Année : <b><?php echo $annee; ?></b><br/>
	<div id="formulaire">
	<form class="form-horizontal" role="form" action="supprim_cotiz.php" method="post">
		<input type="hidden" name="login" value="<?php echo $login; ?>" />
		<button type="submit" class="btn btn-default">Supprimer</button>
	</form>
</center>

<?php
}
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
}
else{
?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="supprim_cotiz.php" method="get">
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
	$stmt = mysqli_prepare($mysqli, "DELETE FROM cotisants WHERE login=?");

	
	//on insert les paramètres
	mysqli_stmt_bind_param($stmt, "s", $_POST['login']);
	
	//on execute la procédure
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	echo "<center><h1>Cotisant supprimer</h1></center>";
}
include "footer.php";
?>
