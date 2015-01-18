<?php
include "header.php";

if(isset($_POST['nom'])){
 	
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	$requete="CREATE TABLE ".$_POST['nom']." (
	    id INT NOT NULL AUTO_INCREMENT,
	    Date VARCHAR(40) NOT NULL,
		PrixCotiz VARCHAR(40) NOT NULL,
		PrixnoCotiz VARCHAR(40) NOT NULL,
		Places VARCHAR(40) NOT NULL,";
	if(isset($_POST['champ']))
	{
		for($i=0; $i < $_POST['champ']; $i++)
		{
			$requete = $requete.$_POST['nomoption'.$i]." VARCHAR(40) NOT NULL,";
		}
	}
	$requete=$requete."PRIMARY KEY (id)
	)
	CHARACTER SET utf8 COLLATE utf8_bin
	ENGINE=INNODB";
	//echo $requete;
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	$stmt = mysqli_prepare($mysqli, $requete);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	
	$mysqli2 = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli2->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli2->error);
		exit();
	}
	$requete2="INSERT INTO ".$_POST['nom']." (Date, PrixCotiz, PrixnoCotiz, Places";
	if(isset($_POST['champ']))
	{
		for($i=0; $i < $_POST['champ']; $i++)
		{
			$requete2 = $requete2.", ".$_POST['nomoption'.$i];
		}
	}
	$requete2=$requete2.") VALUE ('".$_POST['date']."', '".$_POST['prixCotiz']."', '".$_POST['prixnoCotiz']."', '".$_POST['places'];
	if(isset($_POST['champ']))
	{
		for($i=0; $i < $_POST['champ']; $i++)
		{
			$requete2 = $requete2."', '".$_POST['option'.$i];
		}
	}
	$requete2=$requete2."')";
	$stmt2 = mysqli_prepare($mysqli2, $requete2);
	mysqli_stmt_execute($stmt2);
	mysqli_stmt_close($stmt2);
	mysqli_close($mysqli2);
	echo "<h1>Evenement ajouté</h1>";
}

?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="ajout_event.php" method="post">
    <div class="form-group">
	    <label for="nom" class="control-label">Nom de l'événement</label>
	    <div class="col-lg-5">
	      <input type="text" class="form-control" name="nom" placeholder="Nom">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="date" class="control-label">Date</label>
	    <div class="col-lg-5">
	      <input type="text" class="form-control" name="date" placeholder="Date (format jj/mm/aa)">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="prixCotiz" class="control-label">Prix cotisant</label>
	    <div class="col-lg-5">
	      <input type="text" class="form-control" name="prixCotiz" placeholder="Cotisant">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="prixnoCotiz" class=" control-label">Prix non cotisant</label>
	    <div class="col-lg-5">
	      <input type="text" class="form-control" name="prixnoCotiz" placeholder="non Cotisant">
	    </div>
	 </div>
	<div class="form-group">
	    <label for="places" class=" control-label">Places</label>
	    <div class="col-lg-5">
	      <input type="text" class="form-control" name="places" placeholder="Places">
	    </div>
	 </div>
<?php
	if(isset($_GET['champ']))
	{	
		for($i=0; $i < $_GET['champ']; $i++)
		{
			echo '<div class="form-group">
			    <div class="col-lg-5">
			      <input type="text" class="form-control" name="nomoption'.$i.'" placeholder="Nom option">
			    </div>
		    	<div class="col-lg-5">
		      		<input type="text" class="form-control" name="option'.$i.'" placeholder="Option">
		    	</div>
			 </div>';
		}
		echo '<input type="hidden" name="champ" value="'.$_GET['champ'].'">';
		$champ = $_GET['champ'] + 1;
		echo '<a href="./ajout_event.php?champ='.$champ.'">Ajouter champ</a>';
	}
	else
	{
		echo '<a href="./ajout_event.php?champ=1">Ajouter champ</a>';
	}
?>
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
