<?php
session_start();
//database connection and query
$conn = mysqli_connect('localhost','root','','your_contact_book');
$username = "User # ".$_SESSION['name'];
$email = "Email # ".$_SESSION['email'];
$tablename = $_SESSION['tablename'];
$phone = "Phone # ".$_SESSION['phone'];
$query = "SELECT * FROM ".$tablename;
$result = mysqli_query($conn,$query);


require("fpdf/fpdf.php");
$pdf = new FPDF('p','mm','a4');
$pdf->AddPage();


// heading part
$pdf->SetFont("Arial","B",20);
$pdf->Cell(189,10,'Your Contact Book',0,1,'C');
$pdf->SetFont("Arial","",12);
$pdf->Cell(189,5,'Website: http://contbook.suvashkumar.xyz',0,1,'C');
$pdf->Cell(189,5,'Developer : Suvash Kumar, http://suvashkumar.xyz',0,1,'C');
$pdf->Cell(189,10,'',0,1,'C');

// user part
$pdf->SetFont("Arial","",14);
$pdf->Cell(189,6,$username,0,1);
$pdf->Cell(189,6,$email,0,1);
$pdf->Cell(189,6,$phone,0,1);
$pdf->Cell(189,6,'',0,1);

// table header part
$pdf->SetFont("Arial","B",10);
$pdf->Cell(54,5,'Name',1,0);
$pdf->Cell(45,5,'Address',1,0);
$pdf->Cell(65,5,'Email',1,0);
$pdf->Cell(25,5,'Phone',1,1);

// table data part
$pdf->SetFont("Arial","",10);
while($row = mysqli_fetch_assoc($result)) {
    
    $pdf->Cell(54,5,$row['Contact_Name'],1,0);
    $pdf->Cell(45,5,$row['Address_info'],1,0);
    $pdf->Cell(65,5,$row['Email'],1,0);
    $pdf->Cell(25,5,$row['Phone'],1,1);
    
}

$pdf->Output();

?>