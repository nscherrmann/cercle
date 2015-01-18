<?php
include 'session.php';
	if(!isset($_SESSION['id'])){
		header('Location: login.php');
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
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Gestion cotisant Cercle des Eleves</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
	<!-- Bootstrap theme -->
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost:8888/cercle/">Cercle</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost:8888/cercle/">Accueil</a></li>
            <li><a href="ajout_cotiz.php">Ajouter Cotisant</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gérer les Cotisants <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="modif_cotiz.php">Modifier un Cotisant</a></li>
                <li><a href="supprim_cotiz.php">Supprimer un Cotisant</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Événements<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="ajout_event.php">Ajouter un event</a></li>
                <li><a href="index_event.php">Afficher event</a></li>
              </ul>
            </li>
            <li><a href="mail.php">Envoyer un Mail aux Cotisants</a></li>
			<li><a href="exporter.php">Exporter la liste des Cotisants</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Paramètres<b class="caret"></b></a>
			<ul class="dropdown-menu">
                <li><a href="ajout_admin.php">Ajouter un administrateur</a></li>
				<li><a href="deconnexion.php">Deconnexion</a></li>
              </ul>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>