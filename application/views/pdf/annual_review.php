<?php 

        // create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(8, 8, 8);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//     require_once(dirname(__FILE__).'/lang/eng.php');
//     $pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 10);

// add a page
$pdf->setPrintHeader(false);
$pdf->AddPage();
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

// test Cell stretching
$pdf->Cell(0, 0, 'MOTOR VEHICLE DRIVER\'S', 0, 1, 'C', 0, '');
$pdf->Cell(0, 0, 'Certification of Violations/Annual Review of Driving Record', 0, 5, 'C', 0, '');
//  public function MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0, $valign='T', $fitcell=false)
$pdf->SetFont('helvetica', '', 8);
$txt = 'MOTOR CARRIER INSTRUCTIONS: Each motor carrier shall at least once every 12 months, require each driver it employs to prepare and furnish it with a list of all violations of motor vehicle traffic laws and ordinances (other than violations involving only parking) of which the driver has been convicted, or on account of which he/she has forfeited bond or collateral during the preceding 12 months (Section 391.27). Drivers who have provided information required by Section 383.31 need not repeat that information on this form.

DRIVER REQUIREMENTS: Each driver shall furnish the list as required by the motor carrier above. If the driver has not been convicted of, or forfeited bond or collateral on account of any violation which must be listed, he/she shall so certify (Section 391.27).
';
$pdf->MultiCell(0, 0, $txt);
$pdf->Ln(4);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 0, 'COMPLETED BY DRIVER - CERTIFICATION OF VIOLATIONS', 1, 5, 'C', 0, '');
$pdf->Ln(3);
// -----------------------------------------------------------------------------
$pdf->SetFont('', '', 8);

$tbl = <<<EOD
<table border="0.7" cellpadding="3">
    <tr>
        <td width="45%">NAME OF DRIVER: (PRINT) <br />&nbsp; {$driver['first_name']} {$driver['middle_name']} {$driver['last_name']}</td>
        <td width="35%">SOCIAL SECURITY NUMBER <br />&nbsp; {$driver['sin']}</td>
        <td width="20%">DATE OF EMPLOYMENT</td>
    </tr>
    <tr>
        <td width="45%">HOME TERMINAL (CITY AND STATE) <br />&nbsp; xxxxxxxxxxxxxxxxxxxxxxxxx</td>
        <td width="25%">DRIVER'S LICENSE NUMBER</td>
        <td width="10%">STATE<br />xxxxxxxx xxxxxx xxxx</td>
        <td width="20%">EXPIRATION DATE</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, false, false, false, false, '');

$pdf->Ln(3);
$tbl = <<<EOD
<table border="0.7" cellpadding="3">
    <tr>
        <td>
            <table>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td colspan="7">I certify that the following is a true and complete list of traffic violations required to be listed (other than those I have provided under part 383) for which I have been convicted or forfeited bond or collateral during the last 12 months.<br />
                        <span style="font-size: 7px;'">(If you have had no violations, check the following box <input type="checkbox" name="agree" value="1" checked="" readonly="true" /> <label for="agree">I agree </label>None.)</span>
                    </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td style="text-align:center;" width="10%"> DATE </td>
                    <td width="2%"></td>
                    <td style="text-align:center;" width="33%"> OFFENSE </td>
                    <td width="2%"></td>
                    <td style="text-align:center;" width="23%"> LOCATION </td>
                    <td width="2%"></td>
                    <td style="text-align:center;" width="27%"> TYPE OF VEHICLE OPERATED </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td style="text-align:center; border-bottom-width:1px;" width="10%"> xxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="33%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="23%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="27%"> xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td style="text-align:center; border-bottom-width:1px;" width="10%"> xxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="33%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="23%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="27%"> xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td style="text-align:center; border-bottom-width:1px;" width="10%"> xxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="33%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="23%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="27%"> xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td style="text-align:center; border-bottom-width:1px;" width="10%"> xxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="33%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="23%"> xxxxxxxxxxxxxxxxxxxx </td>
                    <td width="2%"></td>
                    <td style="text-align:center; border-bottom-width:1px;" width="27%"> xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td colspan="7">If no violations are listed above, I certify that I have not been convicted or forfeited bond or collateral on account of any violation (other than those I have provided under Part 383) required to be listed during the past 12 months.
                    </td>
                </tr>
                <tr><td colspan="7"> </td></tr>
                <tr>
                    <td width="15%">Date of Certification</td>
                    <td width="2%"></td>
                    <td width="28%"  style="text-align:center; border-bottom-width:1px;">XXXXXXXXXXXXXX</td>
                    <td width="2%"></td>
                    <td width="15%">Driver's Signature</td>
                    <td width="2%"></td>
                    <td width="35%" style="text-align:center; border-bottom-width:1px;">XXXXXXXXXXXXXX</td>
                </tr>
                <tr><td colspan="7"> </td></tr>
            </table>
        </td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, false, false, false, false, '');
$pdf->Ln(3);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 0, 'COMPLETED BY MOTOR CARRIER - ANNUAL REVIEW OF DRIVING RECORD', 1, 5, 'C', 0, '');
$pdf->Ln(5);
$pdf->SetFont('', '', 8);


$tbl = '
<table border="0.7" cellpadding="3">
    <tr>
        <td>
            <table cellpadding="3">
                <tr>
                    <td colspan="4">MOTOR CARRIER INSTRUCTIONS: Review the Certification of Violations listed above and other information described in Section 391.25 of the Federal Motor Carrier Safety Regulations. Complete the information requested below.<br />
                        I have hereby reviewed the driving record of the above named driver in accordance with Section 391.25 and find that he/she (check one):<br /><br />
                        <input type="checkbox" name="safedriving" id="safedriving" value="1" checked=""  /><label for="safedriving"> &nbsp; &nbsp; &nbsp; Meets minimum requirements for safe driving</label>
                            <span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</span>
                       <input type="checkbox" name="disqualified" id="disqualified" value="1" checked=""  /><label for="disqualified"> &nbsp; &nbsp; &nbsp; Is disqualified to drive a motor vehicle pursuant to Section 391.25</label> <br /> 
                       <input type="checkbox" name="disqualified" id="disqualified" value="1" checked=""  /><label for="disqualified"> &nbsp; &nbsp; &nbsp; Does not adequately meet satisfactory safe driving performance</label> 
                    </td>
                </tr>
                <tr><td colspan="4"></td></tr>
                <tr>
                    <td width="25%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action taken with driver</td>
                    <td width="74%" style="border-bottom-width:1px;" colspan="3"></td>
                </tr>
                <tr><td colspan="4"></td></tr>
                <tr>
                    <td width="4%" ></td>
                    <td width="21%" style="border-bottom-width:1px;"></td>
                    <td width="74%" style="border-bottom-width:1px;" colspan="2"></td>
                </tr>
                <tr><td colspan="4"></td></tr>
                <tr>
                    <td width="16%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reviewed by:</td>
                    <td width="40%"  style="border-bottom-width:1px;"></td>
                    <td width="3%"></td>
                    <td width="40%" style="border-bottom-width:1px;"></td>
                </tr>
                <tr>
                    <td width="16%"></td>
                    <td width="40%">Signature</td>
                    <td width="3%"></td>
                    <td width="40%">Date</td>
                </tr>
                <tr><td colspan="4"></td></tr>
                <tr>
                    <td width="16%"></td>
                    <td width="40%"  style="border-bottom-width:1px;"></td>
                    <td width="3%"></td>
                    <td width="40%" style="border-bottom-width:1px;"></td>
                </tr>
                <tr>
                    <td width="16%"></td>
                    <td width="40%">Printed Name</td>
                    <td width="3%"></td>
                    <td width="40%">Title</td>
                </tr>
                <tr><td colspan="4"></td></tr>
                <tr>
                    
                    <td width="46%"  style="border-bottom-width:1px;" colspan="2"></td>
                    <td width="3%"></td>
                    <td width="50%" style="border-bottom-width:1px;"></td>
                </tr>
                <tr>
                    <td width="49%" colspan="2">Motor Carrier Name</td>
                    <td width="40%" colspan="2">Motor Carrier Address</td>
                </tr>
            </table>
        </td>
    </tr>
</table>';

$pdf->writeHTML($tbl, false, false, false, false, '');

//////////////////////////////////////////
if(!empty($generate) && $generate == 'true'){
    $pdf->Output(realpath('.').'/uploads/annual_reviews/'.$file_name, 'FI');
}else{
    $pdf->Output(realpath('.').'/uploads/annual_reviews/'.$file_name, 'FI');
}
// $pdf->Output(base_url().'/uploads/annual_reviews/example_048.pdf', 'F');
// echo realpath('.');
//============================================================+
// END OF FILE
//============================================================+



 ?>