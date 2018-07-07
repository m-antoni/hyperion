<?php
session_start();
require_once('tcpdf_include.php');

include ('../../../connections.php'); // DATABASE CONNECTION

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


$html = '<table class="table table-hover table-responsive" border="1">
                <tr align="center">
                    <td width="40%"><b>Brand</b></td>
                    <td width="15%"><b>Quantity</b></td>
                    <td width="15%"><b>Details</b></td>
                    <td width="20%"><b>Total Price</b></td>
                </tr>';

                if(!empty($_SESSION['cart'])){

                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value){

                  $html .=  
                            '<tr align="center">
                                <td>' . $value['item_name'] .' </td>
                                <td>' . $value['item_quantity'] . '</td>
                                <td>' . number_format($value['product_price']) . '.00' . '</td>
                                <!--//converting into numbers here and make a computation-->
                                <td>' . number_format($value['item_quantity'] * $value['product_price']) . '.00' . '</td>
                            </tr>';

                      $total = $total + ($value['item_quantity'] * $value['product_price']);

                        }

                  $html .='<tr align="center">
                                <td></td>
                                <td></td>
                                <td><b>Total Price:</b></td>
                                <td><b>' . number_format($total,2) . '</b></td>
                            </tr>';

                }

             $html .=   '</table><br><br><br><br>';

             $html .= 'Please keep this temporary receipt you will be given an original copy after the transaction has been made. dont forget to present at least 2 valid ID';

             $html .= '<span><p>Receipt No: <b>' .$value['receipt_no']. '</b></p></span>';


$pdf->writeHTML($html, true, false, true, false, '');
	


$pdf->lastPage();

$pdf->Output('Plain.pdf', 'I');

