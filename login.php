<?php
include 'session.php';
if(isset($_POST['login']) && isset($_POST['mdp'])){
	//on se connecte à la BDD
	$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
	if ($mysqli->errno) {
		printf("Unable to connecto to database:<br /> %s", $mysqli->error);
		exit();
	}
	
	//on prépare l'appel de de la procédure qui permet d'ajout les informations du tiers à la base de données
	$stmt = mysqli_prepare($mysqli, "SELECT id, login from admin WHERE login='".mysql_real_escape_string($_POST['login'])."' AND mdp='".mysql_real_escape_string($_POST['mdp'])."'");
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $id, $login);
	
	//on execute la procédure
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	if(isset($id)){
		$_SESSION['id'] = $id;
		$_SESSION['login'] = $login;
		header('Location: index.php');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>Page de connexion</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="login.php" method="post">
        <h2 class="form-signin-heading">Se connecter</h2>
        <input type="text" class="form-control" placeholder="Login" required autofocus name="login" autocomplete="off">
        <input type="password" class="form-control" placeholder="Password" required name="mdp" autocomplete="off">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
