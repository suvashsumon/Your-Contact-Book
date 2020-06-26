<?php
	session_start();
	if (!isset($_SESSION['name'])) {
        header("location: ../index.php");
    }


	include('database.php');
	$database = new Database();
	$queryTable = "SELECT Contact_Name,Address_info,Email,Phone,Tags FROM ".$_SESSION['tablename'];
	$result = $database->runQuery($queryTable);
	$queryColamn = "SELECT UCASE(`COLUMN_NAME`) 
		FROM `INFORMATION_SCHEMA`.`COLUMNS` 
		WHERE `TABLE_SCHEMA`= 'your_contact_book',
		AND `TABLE_NAME`=".$_SESSION['tablename']."
		and `COLUMN_NAME` in ('Contact_Name','Address_info','Email','Phone','Tags')";
	//$header = $database->runQuery($queryColamn);
	$header = ['Contact_Name','Address_info','Email','Phone','Tags'];

	require('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);

	foreach($header as $heading) {
		foreach($heading as $column_heading)
			$pdf->Cell(95,12,$column_heading,1);
	}
	foreach($result as $row) {
		$pdf->Ln();
		foreach($row as $column)
			$pdf->Cell(95,12,$column,1);
	}
	$pdf->Output();
?>