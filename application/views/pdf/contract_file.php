<?php 

 
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
$pdf->SetFont('Times', 'B', 10);

// add a page
$pdf->setPrintHeader(false);
$pdf->AddPage();
//////////// page border
// $pdf->writeHTMLCell($w='', $h='', $x='', $y='', $pdf->header, $border=0, $ln=0, $fill=0, $reseth=true, $align='L', $autopadding=true);
// $pdf->SetLineStyle( array( 'width' => 0.40, 'color' => array(153, 204, 0)));

// $pdf->Line(5, 5, $pdf->getPageWidth()-5, 5); 

// $pdf->Line($pdf->getPageWidth()-5, 5, $pdf->getPageWidth()-5,  $pdf->getPageHeight()-5);
// $pdf->Line(5, $pdf->getPageHeight()-5, $pdf->getPageWidth()-5, $pdf->getPageHeight()-5);
// $pdf->Line(5, 5, 5, $pdf->getPageHeight()-5);
//////////
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

// test Cell stretching

//function writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')


$pdf->SetFont('', 'BU',17);
$pdf->Cell(0, 0, 'DRIVER CONTRACT',0,1,'C');
$pdf->SetFont('', '', 12);

$pdf->Ln(5);

$txt = <<<EOD

    <div style="text-align:center;">THIS AGREEMENT is made_06th day of __May_, 2016   DRAFT</div>
    <div style="text-align:center;">B E T W E E N</div>
    <div style="text-align:center;"><b>ADVANCE TRUCKING SOLUTIONS INC</b>, a Company incorporated under the laws of the Province of Ontario,</div>
    <div style="text-align:center;"><b>Main Address: </b> # 14- 7686 Kimbel Street, Mississauga ON L5S 1E9</div>
    <div style="text-align:center;"><b>Physical Address: </b> # 14- 7686 Kimbel Street,Mississauga, ON L5S 1E9 </div>
    <div style="text-align:center;">Here in after called the "COMPANY."OF THE FIRST PART</div>
    <div style="text-align:center;">- and -</div>
    <div style="text-align:center;">Print Inc. Name: H & Y TRANSPORT INC</div>
    <div style="text-align:center;">A company incorporated under the laws of the Province of Ontario,</div>
    <div style="text-align:center;"><b>Address:  </b> 37 DANUM ROAD BRAMPTON ONTARIO CANADA L6Y3G2</div>
    <div style="text-align:center;">Here in after called the "INDEPENDENT OPERATOR" OF THE SECOND PART</div>
    <div style="text-align:center;">-And- </div>
    <div style="text-align:center;"><b>Print Name:  </b> ABDUL RAUF NASIR</div>
    <div style="text-align:center;"><b>Address: </b> 92 WILDBERRY CRES BRAMPTON, ON, L6R 1J9</div>
    <div style="text-align:center;">Hereinafter called the "GUARANTOR" OF THE THIRD PART</div>
    <div style="text-align:center;">WHEREAS the COMPANY is licensed to transport goods ("the business") within the terms of its authorities</div>
    <div style="text-align:center;">AND WHEREAS the INDEPENDENT OPERATOR wishes to work for the COMPANY under the terms and conditions as set out hereinafter</div>
    <div style="text-align:center;">AND WHEREAS the GUARANTOR is the principal Shareholder and/or Officer or Director of the INDEPENDENT OPERATOR</div>
    <div style="text-align:center;">NOW THEREFORE THIS AGREEMENT WITNESS that in consideration of the mutual covenants and agreements herein contained, the COMPANY, the INDEPENDENT OPERATOR and the GUARANTOR hereby covenant and agree as follows:</div>

EOD;
$pdf->writeHTML($txt, false, false, false, false, '');


$pdf->SetFont('', '', 8);
$pdf->AddPage();
$txt= <<<EOD
        <ol type="I">
            <li><h4>INDEPENDENT OPERATOR</h4></li>
            <p>The INDEPENDENT OPERATOR represents and warrants that the INDEPENDENT OPERATOR hereby desires to engage in the business as an INDEPENDENT OPERATOR and is fully qualified and adequately equipped to carry on such business.  The INDEPENDENT OPERATOR agrees to perform such transportation and ancillary services including loading and unloading as required by the COMPANY\'S customers.  The parties agree that the relationship between the parties reflects a contract for service.</p>
            <li><h4>TENDER OF FREIGHT</h4></li>
            <p>The COMPANY agrees to tender freight, goods, merchandise and cargo of such kinds and descriptions for the purposes of custody or transport and agrees to compensate the INDEPENDENT OPERATOR for the services performed by the INDEPENDENT OPERATOR, provided however that nothing contained in this Agreement shall be construed as obligating the COMPANY to provide the INDEPENDENT OPERATOR with any specific number of shipments.</p>
            <li><h4>RESPONSIBILITY FOR COMPANY\'S EQUIPMENT</h4></li>
            <p>The COMPANY shall be responsible for the maintenance of any equipment supplied for use by the INDEPENDENT OPERATOR.  Provided however if any COMPANY equipment is damaged by the negligence or omission of the INDEPENDENT OPERATOR, the INDEPENDENT OPERATOR shall pay any expenses incurred to repair the COMPANY equipment.  Prior to using the COMPANY equipment, the INDEPENDENT OPERATOR shall carefully inspect same and note any damages or defects. The INDEPENDENT OPERATOR shall also be responsible for the repair or replacement of any other COMPANY equipment or ancillary parts or components which are lost, stolen, damaged or destroyed while in the INDEPENDENT OPERATOR’s care and control. INDEPENDENT OPERATOR shall also be responsible for the deductable (Insurance deductable) in case of collisions, property and cargo damage, which is at fault.</p>
            <ol type="1">
                <li><i>In case any driver causes a preventable or at fault accident or damage to the company equipment, the driver shall be liable for the complete amount as liquidated damages, deductible to the company and on account of the damage caused to the Company’s CVOR. The payable amount can be mutually decided between the contracted driver and the company in writing.</i></li>
                <li><i>Any damage to tractor or trailer due to driver’s error is charged from driver’s pay roll amount in part or full, immediately after the offence.</i></li>


            </ol>

            <li type="I"><h4>RESPONSIBILITY FOR SHIPPER\'S GOODS/FACILITIES</h4></li>
            <p>The INDEPENDENT OPERATOR shall at all times protect all goods and merchandise tendered to the INDEPENDENT OPERATOR and shall exercise extreme caution and care to prevent said goods and merchandise from being lost, stolen, damaged or destroyed in any way.  The INDEPENDENT OPERATOR is also responsible for any damage to any shipper or receiver\'s facilities or equipment caused by its negligence or omission.</p>
            <li><h4>OPERATION BY INDEPENDENT OPERATOR IN ACCORDANCE WITH LAWS</h4></li>
            <p>The INDEPENDENT OPERATOR agrees to operate the vehicles at all times in accordance with the laws of any Municipality, Province or State in which the INDEPENDENT OPERATOR operates.   Without limiting the generality of the foregoing the INDEPENDENT OPERATOR will ensure compliance with all legislation and regulations with respect to all rules relating to safety, traffic, highway protection or road requirements, including any rules and regulations as may be required by any governmental bodies. The INDEPENDENT OPERATOR also agrees to keep such records as required by the law including, but not limited to trip inspections, logs, mileage reports, fuel receipts, violation notices, etc. The INDEPENDENT OPERATOR agrees to follow all rules and regulations set out in the INDEPENDENT OPERATOR DRIVER’S MANUAL which has been provided to the INDEPENDENT OPERATOR.</p>
            <li><h4>EMPLOYEES OF INDEPENDENT OPERATOR</h4></li>
            <ol type="a">
                <li>The INDEPENDENT OPERATOR shall be fully and solely responsible for any employees/workers. The INDEPENDENT OPERATOR shall be responsible for all payments to its employees/workers including wages, benefits, income tax deductions, vacation pay, statutory holiday pay and severance \termination pay or any other charges required by law.  The INDEPENDENT OPERATOR hereby waives all its rights to sue the COMPANY or any shipper or receiver or customer of the COMPANY for any injuries incurred by the INDEPENDENT OPERATOR \'S workers/employees. </li>
                <li><b>Passengers & Pets:</b> The INDEPENDENT OPERATOR agrees to ensure that it will not allow any passengers or pets in the COMPANY vehicle unless authorized in writing by the COMPANY. Independent operator is fully aware that if permission is granted, he/she is entirely responsible for the actions of his/her rider.</li>
                <li><b>Drug and Alcohol Policy:</b> The COMPANY maintains a <b>Zero Tolerance Policy</b> concerning controlled substance use and abuse while on duty. The INDEPENDENT OPERATOR agrees to ensure that its drivers will not consume any alcoholic beverages within 12 hours prior to "on-duty" status and never while on-duty.
                    <ol type="i">
                        <li>If any INDEPENDENT OPERATOR driver is found under the influence or in possession of alcohol or any controlled substance the INDEPENDENT OPERATOR agreement will be terminated immediately without notice.
                        </li>
                        <li>The INDEPENDENT OPERATOR agrees to follow all rules and regulations outlined in the "ALCOHOL & SUBSTANCE ABUSE POLICY" document issued on behalf of the COMPANY.
                        </li>
                        <li>The INDEPENDENT OPERATOR\'S drivers agree to undergo random Urinalysis and/or Alcohol Breath tests, administered by a special laboratory appointed by the COMPANY.  The cost of the initial random-tests is to be borne by the INDEPENDENT OPERATOR. If the initial test result is positive, a second urine sample will be provided to the laboratory. The cost of the 2nd test will be paid entirely by the INDEPENDENT OPERATOR.  If the second test result is positive as well, this Agreement will be terminated immediately.
                        </li>
                    </ol>   
                </li>
                <li>Right to Inspect/Monitor: The COMPANY reserves the right to check/monitor the conduct and driving behaviour of any INDEPENDENT OPERATOR driver at any time and any place (in the yard or on the road) without advance notice. The results of any such inspections will be made available to the INDEPENDENT OPERATOR who agrees to abide by any recommendations contained herein. </li>
                <li>) SPEEDING WILL NOT BE TOLERATED. All INDEPENDENT OPERATOR drivers must drive within the lower of the Company speed limit or the posted speed limit.</li>
            </ol>
            <li><h4>INSURANCE</h4></li>
            <p>The equipment operated by the INDEPENDENT OPERATOR shall be insured under the Company’s fleet public liability and property damage and cargo insurance coverage.   The INDEPENDENT OPERATOR shall immediately report all accidents involving damage or loss of any kind whatsoever to the COMPANY.</p>
            <li><h4>FINES AND PENALTIES</h4></li>
            <p>The INDEPENDENT OPERATOR will be responsible for all fines whether issued to the INDEPENDENT OPERATOR or the COMPANY, and expenses incurred as a result of any proven infraction of any law, including any regulation or by-law, whether Federal, Provincial, State or Municipal.  The INDEPENDENT OPERATOR shall promptly report to the COMPANY all such matters and will supply the COMPANY with any documents or reports relating thereto. The COMPANY and INDEPENDENT OPERATOR will cooperate to defend all charges which should be defended.  All tickets paid by the COMPANY will be charged back to the INDEPENDENT OPERATOR. The INDEPENDENT OPERATOR will also pay all reasonable costs for defending any charges including legal fees. The COMPANY will pay all fines resulting from a dispatch order or a COMPANY error.</p>
            <li><h4>PAYMENT TO THE INDEPENDENT OPERATOR</h4></li>
            <p>Payment for services rendered by the INDEPENDENT OPERATOR shall be paid by the COMPANY on the days and in the manner set out in Schedule "A". </p>
            <li><h4>CONFIDENTIALITY/NON COMPETITION</h4></li>
            <p>The INDEPENDENT OPERATOR  agrees that it and its principals, directors or employees/workers will not disclose any information relating to the accounts or operations of the COMPANY nor will it or its principals, officers, directors or employees/workers either individually or in partnership or in cooperation with any person, firm, corporation or in any manner whatsoever directly or indirectly solicit or work for any accounts or customers of the COMPANY for a period of one year after the termination of this Agreement.</p>



            <li><h4>TERM OF AGREEMENT</h4></li>
            <p>Notwithstanding anything to the contrary contained in this Agreement, the <b>INDEPENDENT OPERATOR must provide 14 (Fourteen) day’s written notice but Company may terminate this Agreement without cause.  Verbal notices will not be accepted or considered as informed.</b>
                
            </p>
            <ol type="a">
                    <li><i>Failure to provide such notice will result in the Independent Operator’s final pay being held for sixty (60) days after termination. </i></li>
                    <li><i>Any owner operator’s driver that is terminated by the company for whatever reason will be subject to the driver’s final pay being withheld for sixty (60) days in the event that freight claims or damage claims are outstanding and for the security reason if any driver hide any violation or collision and quit without any reason.</i></li>
                    <li><i>14 days’ notice requirements will be in effect from the 1st day of driver’s, owner-operator, owner operator’s driver’s work and as soon as this contract is signed.</i></li>
            </ol>
            <p>
                Provided however that in the case of any notice given by the INDEPENDENT OPERATOR, at the option of the COMPANY, such notice shall not be effective unless and until the INDEPENDENT OPERATOR has satisfied the COMPANY that all accounts in connection with the operation have been paid in full or have been secured to the satisfaction of the COMPANY
            </p>
            <p>
                In the event that either party commits a material breach of any provision of the Agreement the other party has the right to terminate this Agreement at any time without notice. The term "material breach" shall include but not be limited to:
            </p>
            <ol type="a">
                <li>The use of any alcohol or drugs by an INDEPENDENT   OPERATOR'S driver while operating the vehicle or the breach of any alcohol or drug policy;</li>
                <li>An unauthorized passenger in the vehicle;</li>
                <li>Falsification of any documentation;</li>
                <li>Loss or suspension of the INDEPENDENT OPERATOR'S or its Employee’s/worker's drivers licence;</li>
                <li>Any conviction for speeding, theft, careless/dangerous driving or related offenses;</li>
                <li>Abandonment/unauthorized drop off of any COMPANY equipment Or customer's goods;</li>
                <li>Failure to obey instructions of the COMPANY’S authorized Personnel;</li>
                <li>failure to comply with COMPANY or government safety regulations or policies including hours of work regulations, accident reporting, accurate log book completion, health and safety requirements; </li>
                <li>The operation of the vehicle by a driver without the prior written authority of the COMPANY.</li>
                <li>Improper or non-declaration of personal goods;</li>
                <li>Theft of any COMPANY property or customer's property once reported to the authorities.</li>
                <li>Motor vehicle accident which is deemed by the COMPANY to have been preventable;</li>
                <li>Any act of “workplace violence”.</li>
            </ol>

            <li><h4>RESPONSIBILITIES OF INDEPENDENT OPERATOR ON TERMINATION</h4></li>
            <p>Upon the termination of this agreement by either party with or without notice, the INDEPENDENT OPERATOR, within two (2) days of such termination, will provide the COMPANY with all signed bills of lading, freight bills, delivery slips, all trip reports and all unused documentation, licenses, copies of operating authorities, INDEPENDENT OPERATOR Drivers Manual and any other material provided to the INDEPENDENT OPERATOR by the COMPANY. </p>
            <p>Any money owing for services net of all charges shall be paid to the INDEPENDENT OPERATOR/Contracted driver after the completion of full and final documentation. Full & final documentation will be signed between 9 am to 5 pm, Monday to Friday during the scheduled pay-roll of the contracted driver. Any delay in meeting these requirements will delay the release of the final payment. No balance payment will be released if the INDEPENDENT OPERATOR does not give notice in accordance with agreement until all formalities are completed.</p>

            <li><h4>NOTICE</h4></li>
            <p>Any notice required to be given hereunder may be given by any party, mailing the same to the other party/parties by prepaid registered mail to the address shown on the first page of this Agreement. It shall be deemed to have been given by the sender and received by the party/parties hereto to whom it was addressed seventy-two (72) hours after the due mailing thereof at any post office in Canada by prepaid registered mail addressed to the COMPANY'S or INDEPENDENT OPERATOR'S or GUARANTOR'S address, as the case may be, as hereinbefore set forth.  The COMPANY, INDEPENDENT OPERATOR and GUARANTOR may, from time to time, give notice of any change of their address in the manner aforesaid and in such event; any such address shall be deemed to have changed accordingly. Notice can also be given in writing to the Hiring department.</p>

            <h5>Days Off</h5>
            <p>All drivers will be required to notify the company in writing if time off is required. Notification must be submitted at least 7 days in advance of requested days off.</p>

            <li><h4>RELATIONSHIP OF PARTIES</h4></li>
            <p>It is understood and agreed that the relationship created herein is not one of principal and agent, master and servant, or employer and employee, between the COMPANY and the INDEPENDENT OPERATOR.  The INDEPENDENT OPERATOR covenants and agrees that it will not at any time enter into any contract, agreement or engagement whatsoever for and on behalf of the COMPANY or do any other act or thing which would result in any liability or responsibility of the COMPANY in respect of its business or otherwise.  The INDEPENDENT OPERATOR agrees to be fully responsible for all government charges for itself and its employees/workers including all taxes, corporate or income, payroll taxes, Canada Pension Plan, contribution and GST and hereby indemnifies the COMPANY against any of these charges.</p>

            <li><h4>GUARANTOR</h4></li>
            <p>The guarantor hereby guarantees the due performance of all covenants of the INDEPENDENT OPERATOR.</p>
            <li><h4>ASSIGNMENT</h4></li>
            <p>This Agreement is not assignable by the INDEPENDENT OPERATOR but is binding on its successors and shall ensure to the benefit of and be enforceable by the COMPANY, its successors and assigns.</p>

            <li><h4>REMEDIES</h4></li>
            <p>The remedies of the COMPANY herein provided for are cumulative and shall not affect in any manner any other remedies that the COMPANY may have by reason of the default or breach by the INDEPENDENT OPERATOR of the provisions of this Agreement.</p>
            <li><h4>LAW</h4></li>
            <p>This Agreement shall be governed by the laws of the Province of Ontario and Canada as appropriate.</p>
            <li><h4>INDEPENDENT LEGAL ADVICE</h4></li>
            <p>The INDEPENDENT OPERATOR and GUARANTOR acknowledge that they have read and understand this Agreement, and acknowledge that they have had the opportunity to obtain independent legal advice with respect to this agreement.</p>
            <li><h4>DRESS CODE</h4></li>
            <p>All Independent Operators that are hired, must meet all the requirements of a shipper/receiver, and must represent the company in a respectable manner. Shirts-Short or Long sleeves or Golf Shirts, Pants-Long, Safety shoes to be carried in truck at all times and any load delayed due to not wearing safety shoes or safety vests will be compensated by the driver itself. On no account is any driver or substitute driver permitted to wear clothing that may offend anyone, or be a hazard to one’s safety Every driver or substitute driver will purchase and wear safety footwear/safety vests, while on duty with <b>Advance Trucking Solution</b>.  This will comprise of <b>STEEL TOED</b> and <b>STEEL-SHANK</b> safety boots and vests meeting the requirements of labor laws
            </p>
            
        </ol>


EOD;

$pdf->writeHTML($txt, false, false, false, false, '');

$pdf->Ln(5);
$txt = <<<EOD

    <u><h4 style="text-align:center;">Mandatory Contract Requirements</h4></u>

EOD;

$pdf->SetFont('', 'BU',12);
$pdf->Cell(0, 0, 'Mandatory Contract Requirements',0,1,'C');
$pdf->SetFont('', '', 8);

$txt = <<<EOD

    <p>Whereas all drivers, including Independent Operators or their drivers must agree to and follow the terms and conditions set out in this agreement as follows</p>
    <table>
        <tr>
            <td width="2%">I</td>
            <td width="46%" style="border-bottom-width:0.7px"></td>
            <td width="5%" style="text-align:center">O/A</td>
            <td width="46%" style="border-bottom-width:0.7px"></td>
        </tr>
    </table>
    <p>do hereby agree that for whatever reason my contract with <b>_ADVANCE TRUCKING SOLUTION_</b> is <b>Terminated within six (6) months</b> of my starting date, an amount of <b>CAD $ 0.00</b> will be deducted from my final settlement.</p>
    <table>
        <tr>
            <td width="2%">I</td>
            <td width="46%" style="border-bottom-width:0.7px"></td>
            <td width="5%" style="text-align:center">O/A</td>
            <td width="46%" style="border-bottom-width:0.7px"></td>
        </tr>
    </table>
    <p>do hereby agree that for whatever reason my contract with <b>_ADVANCE TRUCKING SOLUTION_</b> is <b>Terminated within six (6) months</b> of my starting date, an amount of <b>CAD $ 0.00</b> will be deducted from my final settlement.</p>
    <p>This amounts represent the cost associated with Hiring application, Pre-Employment drug testing, Pre-Employment road testing and driver orientation. This cost applies to all company drivers and all drivers for owner operators.
IN WITNESS WHEREOF the parties hereto have caused this Agreement to be executed by their proper authorized
    <table>
        <tr>
            <td width="10%">signatures this</td>
            <td width="12%" style="border-bottom-width:0.7px" ></td>
            <td width="5%" style="text-align:center;">day of</td>
            <td width="20%" style="border-bottom-width:0.7px"></td>
            <td width="6%" style="text-align:center;">(Year) </td>
            <td width="7%" style="border-bottom-width:0.7px"></td>
        </tr>
    </table>
</p>

EOD;
$pdf->writeHTML($txt, false, false, false, false, '');

$pdf->Ln(4);
$pdf->SetFont('', 'BU',12);
$pdf->Cell(0, 0, 'SIGNED, SEALED AND DELIVERED In the presence of',0,1,'C');
$pdf->SetFont('', '', 8);

$txt = <<<EOD

    <table>
        <tr><td colspan='3'></td></tr>
        <tr>
            <td width="40%">Advance Trucking Solutions Inc.</td>
            <td width="5%">Per:</td>
            <td width="54%" style="border-bottom-width:0.7px"></td>
        </tr>
        <tr><td colspan='3'></td></tr>
        <tr>
            <td width="40%" >GUARANTOR (Print driver name & Signatures) per: </td>
            <td width="5%">Per:</td>
            <td width="54%" style="border-bottom-width:0.7px"></td>
        </tr>
        <tr><td colspan='3'></td></tr>
        <tr>
            <td width="40%" style="text-align:center"></td>
            <td></td>
            <td width="54%" style="border-bottom-width:0.7px"></td>
        </tr>
    </table>

EOD;
$pdf->writeHTML($txt, false, false, false, false, '');

$pdf->Ln(4);
$pdf->SetFont('', 'BU',12);
$pdf->Cell(0, 0, 'Schedule "A"',0,1);
$pdf->SetFont('', '', 8);


$txt = <<<EOD

<p>The INDEPENDENT OPERATOR or CONTRACTED Driver’s payment schedule will commence following a two trips hold back at any time. The INDEPENDENT OPERATOR will be paid based on the trips he will make in a month on respective dates but two trips are always on hold.</p>
<p><b>The INDEPENDENT OPERATOR will be paid as follows</b></p>
<ul>
    <li>CAD 26 cents per mile until further notice.</li>
    <li>Payments will be made on 15th and 30th of every month</li>
    <li>First and last pick & drop is free</li>
    <li>$25 will be paid for extra pick and drop. Lay-over charges will be paid as CAD $50/night.</li>
    <li>Payment will be made if paper work is complete</li>
    <li>Pay per mile include Vocational pay (4%) and statuary holidays</li>
    <li>Contractor/Employee will be responsible for his/her own taxes. Company will not be responsible for any taxes owned and will issue T4A slip at the end of every year.</li>
    <li>Company has advised Independent operator to have disability insurance for out of province and company will not be responsible for any damages other than WSIB Coverage. In case of an individual policy, please provide a copy as soon as possible</li>
    <li>Pay Increase ___________ cents/mile on Date _____________________</li>
    <li>Pay Increase ___________ cents/mile on Date _____________________</li>
    <li>Pay Increase ___________ cents/mile on Date _____________________</li>
    <li>Pay Increase ___________ cents/mile on Date _____________________</li>
</ul>

EOD;
$pdf->writeHTML($txt, false, false, false, false, '');

$pdf->Ln(4);
$pdf->SetFont('', 'BU',12);
$pdf->Cell(0, 0, 'Acknowledgement of Acceptance',0,1,'C');
$pdf->SetFont('', '', 8);


$txt = <<<EOD

<table>
    <tr><td></td></tr>
    <tr>
        <td width="5%">Dated</td>
        <td width="30%" style="border-bottom-width:0.7px"></td>
        <td width="2%" style="text-align:center;">I</td>
        <td width="60%" style="border-bottom-width:0.7px"></td>
        <td width="3%"><b>O/A</b></td>
    </tr>
</table>

<table>
    <tr><td colspan="2"></td></tr>
    <tr>
        <td width="40%" style="border-bottom-width:0.7px"></td>
        <td width="58%"> accept the terms and conditions set forth in this contract and respect to abide by them in all efforts,</td>
    </tr>
</table>
<table>
    <tr><td></td></tr>
    <tr>
        <td width="60%">failure to do so may result in immediate termination of contract and immediate dismissal of services. I, </td>
        <td width="40%" style="border-bottom-width:0.7px"></td>
    </tr>
</table>
<table>
    <tr><td colspan="3"></td></tr>
    <tr>
        <td width="4%" style="text-align:center;"><b>O/A</b></td>
        <td width="43%" style="border-bottom-width:0.7px"></td>
        <td width="55%"> have read and understood the contents of this contract. I have been explained this contract </td>
    </tr>
    <tr><td colspan="3"></td></tr>
    <tr>
        <td colspan="3"> in my own language and I understand it completely. </td>
    </tr>
</table>


<table>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2"></td></tr>
    <tr>
        <td width="35%"><b>Print name & sign of Independent Operator: </b></td>
        <td  width="65%" style="border-bottom-width:0.7px"></td>
    </tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2"></td></tr>
    <tr>
        <td width="35%"><b>O/A: </b></td>
        <td width="65%"  style="border-bottom-width:0.7px"></td>
    </tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2"></td></tr>
    <tr>
        <td width="35%"><b>Witness name & sign: </b></td>
        <td width="65%"  style="border-bottom-width:0.7px"></td>
    </tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2"></td></tr>
    <tr>
        <td width="35%"><b>Witness designation: </b></td>
        <td width="65%"  style="border-bottom-width:0.7px"></td>
    </tr>

</table>
EOD;
$pdf->writeHTML($txt, false, false, false, false, '');
//////////////////////////////////////////
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



 ?>