<?php
include("phpToPDF.php");

$PDF=new phpToPDF();
$PDF->AddPage();
$PDF->SetFont('Arial','B',16);

// Définition des propriétés du tableau.
$proprietesTableau = array(
	'TB_ALIGN' => 'L',
	'L_MARGIN' => 15,
	'BRD_COLOR' => array(0,92,177),
	'BRD_SIZE' => '0.3',
	);

// Définition des propriétés du header du tableau.	
$proprieteHeader = array(
	'T_COLOR' => array(150,10,10),
	'T_SIZE' => 12,
	'T_FONT' => 'Arial',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'T',
	'T_TYPE' => 'B',
	'LN_SIZE' => 7,
	'BG_COLOR_COL0' => array(170, 240, 230),
	'BG_COLOR' => array(170, 240, 230),
	'BRD_COLOR' => array(0,92,177),
	'BRD_SIZE' => 0.2,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
	);

// Contenu du header du tableau.	
$contenuHeader = array(
	30, 30, 20, 60,
	"Nom", "Prenom", "Date de cotiz", "Mail"
	);

// Définition des propriétés du reste du contenu du tableau.	
$proprieteContenu = array(
	'T_COLOR' => array(0,0,0,0),
	'T_SIZE' => 10,
	'T_FONT' => 'Arial',
	'T_ALIGN_COL0' => 'L',
	'T_ALIGN' => 'R',
	'V_ALIGN' => 'M',
	'T_TYPE' => '',
	'LN_SIZE' => 6,
	'BG_COLOR_COL0' => array(245, 245, 150),
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,92,177),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
	);	
	// Contenu du tableau.	
	$contenuTableau = array();

	if(isset($_GET['type']) && $_GET['type'] != "exterieur"){
		$mysqli = new mysqli("localhost", "login", "passwd", "cotisant");
		if ($mysqli->errno) {
			printf("Unable to connect to database:<br /> %s", $mysqli->error);
			exit();
		}
		$stmt = mysqli_prepare($mysqli, "SELECT nom, prenom, date_cotiz, type, annee, mail FROM cotisants WHERE annee = '".$_GET['type']."'");
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $nom, $prenom, $date_cotiz, $type, $annee, $mail);

		while (mysqli_stmt_fetch($stmt)) {
			array_push($contenuTableau, $nom);
			array_push($contenuTableau, $prenom);
			array_push($contenuTableau, $date_cotiz);
			array_push($contenuTableau, $mail);
		}
	}

	// D'abord le PDF, puis les propriétés globales du tableau. 
	// Ensuite, le header du tableau (propriétés et données) puis le contenu (propriétés et données)
	$PDF->drawTableau($PDF, $proprietesTableau, $proprieteHeader, $contenuHeader, $proprieteContenu, $contenuTableau);

	$PDF->Output();
	//affiche le document test.PDF dans une iframe.
	echo '
		<iframe src="test.PDF" width="100%" height="100%">
		[Your browser does <em>not</em> support <code>iframe</code>,
		or has been configured not to display inline frames.
		You can access <a href="./test.PDF">the document</a>
		via a link though.]</iframe>
	';
	
?>