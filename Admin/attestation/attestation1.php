<?php
// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF-main/tcpdf.php');
include_once '../../DB/dbh.php' ;
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id=$id; " ;
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    $Nom = $row['Nom'];
    $Prenom = $row['Prenom'];
    $cne = $row['cne'];
    $Date_Recrutement = date('d-m-Y', strtotime($row['Date_Recrutement']));
    

}

// create new PDF document
$pdf = new TCPDF('p', 'mm', 'A4', true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


// set font
$pdf->SetFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('times', 'BI', 24);
// set some text to print
$txt = <<<EOD
ATTESTATION DE TRAVAIL


EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);


// set font
$pdf->SetFont('times', 'BI', 16);
// set some text to print
$txt = <<<EOD




Nous soussignés Ecole Normale Supérieure domiciliée à   BP 2400 Hay Hassani Route d'essaouira 40000  , attestons par la présente que Mr (Mlle)(Mme)  $Nom $Prenom , Immatriculé à la CNI sous le numéro $cne , est employé au sein de notre ecole en qualité de XXXXXXXXXXXXX .


Et ce depuis le $Date_Recrutement  à ce jour .


La présente attestation lui est délivrée à sa demande pour servir et valoir ce que de droit.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);






//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');