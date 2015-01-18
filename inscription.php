<?php
include 'header.php';
?>
    <div class="container">

		<center>
		<?php
			$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
			if ($mysqli->errno) {
				printf("Unable to connect to database:<br /> %s", $mysqli->error);
				exit();
			}
			echo "DESCRIBE ".$_GET['table'];
			$stmt = mysqli_prepare($mysqli, "SHOW COLUMNS FROM ".$_GET['table']);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $table);
			
			//echo '<tr><th>Événements</th></tr>';
			while (mysqli_stmt_fetch($stmt)) {
				echo "fetch";
				echo $table;
			}
		?>
		</center>
      </div>

    </div><!-- /.container -->

<?php
include 'footer.php'
?>
