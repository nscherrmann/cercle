<?php
include "header.php";
?>
<div id="formulaire">
<form class="form-horizontal" role="form" action="mail.php" method="post">
	<input type="text" name="objet" class="form-control" placeholder="Objet" /><br/>
	<textarea class="form-control" name="corps" rows="3"></textarea><br/>
	<button type="submit" class="btn btn-default">Envoyer le mail</button>
</form>
</div>
<?php
if(isset($_POST['objet'])){
	$to      = 'nico.loginrmann@gmail.com';
	$subject = $_POST['objet'];
	$message = $_POST['corps'];
	$headers = 'From: webmaster@example.com' . "\r\n" .
	    'Reply-To: webmaster@example.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
	echo "<center>Mail envoyé</center>";
}
include "footer.php";
?>