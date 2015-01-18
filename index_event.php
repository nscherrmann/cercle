<?php
include 'header.php';
?>
    <div class="container">

		<center><table id='evenement' class="table table-hover">
		<?php
			$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
			if ($mysqli->errno) {
				printf("Unable to connect to database:<br /> %s", $mysqli->error);
				exit();
			}
			$stmt = mysqli_prepare($mysqli, "SHOW TABLES");
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $table);
			
			echo '<tr><th>Événements</th></tr>';
			while (mysqli_stmt_fetch($stmt)) {
				if($table != "admin" && $table != "cotisants"){
					echo '<tr><td><a href="inscription.php?table='.$table.'">'.$table.'</a></td></tr>';

				}
			}
		?>
		</table></center>
      </div>

    </div><!-- /.container -->

<?php
include 'footer.php'
?>
