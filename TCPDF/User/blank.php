<?php
require_once('tcpdf_include.php');

include ('../../connections.php'); // connection to database


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('PHP TUTORIAL TAGALOG: LESSON 5');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavusans', '', 10);

$pdf->AddPage('P');

    $html = '<br><h1 align="center">Inventory Report</h1><br>';

    $html .= '<br><br>
                <table border = "1" width="100%" cellpadding="10">';

    $html .= '<tr align="center">
                    <td width="20%"><b>ID#</b></td>
                    <td width="30%"><b>Laptop Brands</b></td>
                    <td width="30%"><b>Prices</b></td>    
                    <td width="20%"><b>Availability</b></td>        
              </tr>';

    $query = mysqli_query($cn, "SELECT * FROM product");

    while($row = mysqli_fetch_assoc($query)){

        $id_name = $row['id'];
        $db_pname = $row['pname'];
        $db_price = number_format($row['price']);
        $db_stock = $row['stock'];

        $html .= '<tr align="center">
                        <td>'. $id_name.'</td>   
                        <td>'. $db_pname .'</td>
                        <td>Php '. $db_price .'</td>
                        <td>'. $db_stock .'</td>                  
                  </tr>';
    }

    $html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

$pdf->Output('Plain.pdf', 'I');

