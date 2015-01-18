<?php
$results = array();
$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
if ($mysqli->errno) {
	printf("Unable to connect to database:<br /> %s", $mysqli->error);
	exit();
}
$stmt = mysqli_prepare($mysqli, "SELECT login FROM cotisants WHERE login like '".$_GET['s']."%'");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $login);
while (mysqli_stmt_fetch($stmt)) {
	array_push($results, $login); // On ajoute alors le résultat à la liste à retourner
}

                
            
   

    echo implode('|', $results); // Et on affiche les résultats séparés par une barre verticale |

?>