<?php
include 'header.php';
?>
    <div class="container">

      <div class="starter-template">
        <h1>Liste cotisant</h1>
		<div id="results">
		<form class="form-horizontal" role="form" action="modif_cotiz.php" method="get">
			<div class="form-group">
			    <div class="col-sm-10">
			      <center><input id="search" type="text" autocomplete="off" class="form-control" name="login" placeholder="Rechercher" /></center>
			    </div>
			 </div>
		</form>
		</div>
		<div id="results"></div>
		<script>

		    (function() {

		        var searchElement = document.getElementById('search'),
		            results = document.getElementById('results'),
		            selectedResult = -1, // Permet de savoir quel résultat est sélectionné : -1 signifie "aucune sélection"
		            previousRequest, // On stocke notre précédente requête dans cette variable
		            previousValue = searchElement.value; // On fait de même avec la précédente valeur



		        function getResults(keywords) { // Effectue une requête et récupère les résultats

		            var xhr = new XMLHttpRequest();
		            xhr.open('GET', './search.php?s='+ encodeURIComponent(keywords));

		            xhr.onreadystatechange = function() {
		                if (xhr.readyState == 4 && xhr.status == 200) {

		                    displayResults(xhr.responseText);

		                }
		            };

		            xhr.send(null);

		            return xhr;

		        }

		        function displayResults(response) { // Affiche les résultats d'une requête

		            results.style.display = response.length ? 'block' : 'none'; // On cache le conteneur si on n'a pas de résultats

		            if (response.length) { // On ne modifie les résultats que si on en a obtenu

		                response = response.split('|');
		                var responseLen = response.length;

		                results.innerHTML = ''; // On vide les résultats

		                for (var i = 0, div ; i < responseLen ; i++) {

		                    div = results.appendChild(document.createElement('div'));
		                    div.innerHTML = response[i];

		                    div.onclick = function() {
		                        chooseResult(this);
		                    };

		                }

		            }

		        }

		        function chooseResult(result) { // Choisi un des résultats d'une requête et gère tout ce qui y est attaché

		            searchElement.value = previousValue = result.innerHTML; // On change le contenu du champ de recherche et on enregistre en tant que précédente valeur
		            results.style.display = 'none'; // On cache les résultats
		            result.className = ''; // On supprime l'effet de focus
		            selectedResult = -1; // On remet la sélection à "zéro"
		            searchElement.focus(); // Si le résultat a été choisi par le biais d'un clique alors le focus est perdu, donc on le réattribue

		        }



		        searchElement.onkeyup = function(e) {

		            e = e || window.event; // On n'oublie pas la compatibilité pour IE

		            var divs = results.getElementsByTagName('div');

		            if (e.keyCode == 38 && selectedResult > -1) { // Si la touche pressée est la flèche "haut"

		                divs[selectedResult--].className = '';

		                if (selectedResult > -1) { // Cette condition évite une modification de childNodes[-1], qui n'existe pas, bien entendu
		                    divs[selectedResult].className = 'result_focus';
		                }

		            }

		            else if (e.keyCode == 40 && selectedResult < divs.length - 1) { // Si la touche pressée est la flèche "bas"

		                results.style.display = 'block'; // On affiche les résultats

		                if (selectedResult > -1) { // Cette condition évite une modification de childNodes[-1], qui n'existe pas, bien entendu
		                    divs[selectedResult].className = '';
		                }

		                divs[++selectedResult].className = 'result_focus';

		            }

		            else if (e.keyCode == 13 && selectedResult > -1) { // Si la touche pressée est "Entrée"

		                chooseResult(divs[selectedResult]);

		            }

		            else if (searchElement.value != previousValue) { // Si le contenu du champ de recherche a changé

		                previousValue = searchElement.value;

		                if (previousRequest && previousRequest.readyState < 4) {
		                    previousRequest.abort(); // Si on a toujours une requête en cours, on l'arrête
		                }

		                previousRequest = getResults(previousValue); // On stocke la nouvelle requête

		                selectedResult = -1; // On remet la sélection à "zéro" à chaque caractère écrit

		            }

		        };

		    })();

		    </script>
<div class="masthead">
<?php
	$ann = $_GET['annee'];
	if(!isset($ann)){
		$ann = "1A";
	}
	
	switch($ann){
		case "1A":
		echo '<ul class="nav nav-justified">';
        echo '  <li class="active"><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		case "2A":
		echo '<ul class="nav nav-justified">';
        echo '  <li><a href="?annee=1A">1A</a></li>';
        echo '  <li class="active"><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		case "3A":
		echo '<ul class="nav nav-justified">';
        echo '  <li><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li class="active"><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		case "4A":
		echo '<ul class="nav nav-justified">';
        echo '  <li><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li class="active"><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		case "5A":
		echo '<ul class="nav nav-justified">';
        echo '  <li><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li class="active"><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		case "Erasmus":
		echo '<ul class="nav nav-justified">';
        echo '  <li><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li class="active"><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		case "Ext":
		echo '<ul class="nav nav-justified">';
        echo '  <li><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
 		echo '  <li class="active"><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		break;
		default:
		echo '<ul class="nav nav-justified">';
        echo '  <li class="active"><a href="?annee=1A">1A</a></li>';
        echo '  <li><a href="?annee=2A">2A</a></li>';
        echo '  <li><a href="?annee=3A">3A</a></li>';
        echo '  <li><a href="?annee=4A">4A</a></li>';
        echo '  <li><a href="?annee=5A">5A</a></li>';
        echo '  <li><a href="?annee=Erasmus">Erasmus</a></li>';
		echo '  <li><a href="?annee=Ext">Exterieur</a></li>';
        echo '</ul>';
		$ann = "1A";
	}
?>
</div>
		<center><table id='cotisant' class="table table-hover">
		<?php
			$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
			if ($mysqli->errno) {
				printf("Unable to connect to database:<br /> %s", $mysqli->error);
				exit();
			}
			$stmt = mysqli_prepare($mysqli, "SELECT nom, prenom, date_cotiz, login, carte, type, annee, mail FROM cotisants WHERE annee = '".$ann."'");
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $nom, $prenom, $date_cotiz, $login, $carte, $type, $annee, $mail);
			
			echo '<tr><th>Nom</th><th>Prénom</th><th>Date cotiz</th><th>Login</th><th>Carte</th><th>Type</th><th>Annee</th><th>Mail</th></tr>';
			while (mysqli_stmt_fetch($stmt)) {
				if($login != ""){
					echo '<tr><td>'.$nom.'</td>';
					echo '<td>'.$prenom.'</td>';
					echo '<td>'.$date_cotiz.'</td>';
					echo '<td><a href="modif_cotiz.php?login='.$login.'">'.$login.'</a></td>';
					echo '<td>'.$carte.'</td>';
					echo '<td>'.$type.'</td>';
					echo '<td>'.$annee.'</td>';
					echo '<td>'.$mail.'</td></tr>';
				}
				else{
					echo '<tr><td>'.$nom.'</td>';
					echo '<td>'.$prenom.'</td>';
					echo '<td>'.$date_cotiz.'</td>';
					echo '<td>'.$login.'</a></td>';
					echo '<td>'.$carte.'</td>';
					echo '<td>'.$type.'</td>';
					echo '<td>'.$annee.'</td>';
					echo '<td><a href="modif_cotiz.php?mail='.$mail.'">'.$mail.'</td></tr>';
				}
			}
		?>
		</table></center>
      </div>

    </div><!-- /.container -->

<?php
include 'footer.php'
?>
