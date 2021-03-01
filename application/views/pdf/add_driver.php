<?php require "main.php";
////////////////////////////////////////////////////Extra Functions


function getImage($value){
    if($value == 'Yes' || $value == 'yes' || $value == 'Positive'){
        return ['uploads/checkedbox.png','uploads/uncheckedbox.png'];
    }else if($value == 'No' || $value == 'no' || $value == 'Negative'){
        return ['uploads/uncheckedbox.png','uploads/checkedbox.png'];
    }else{
        return ['uploads/uncheckedbox.png','uploads/uncheckedbox.png'];
    }
            // 'uploads/checkedbox.png'
            // 'uploads/uncheckedbox.png'
            // 'uploads/emptybox.png'
}



function get_Position($value){
    $states = [
        'local'   =>  'City Driver',
        'long_haul'   =>  'long haul',
        'owner_operator'  =>  'Owner Operator',
        'driver_of_owner'  =>  'Driver Of Owner Operator'
    ];
    return (isset($states[$value]))?$states[$value]:'';
}

//////////////////////////////////////////////////////////////////page 1 start
/*All Variablles used in file*/

$comapnyName = rtrim(implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$driver['company_id']])));
$companyAddress = get_from('users','address',['id'=>$driver['company_id']]);
$companyCity = get_from('users','city',['id'=>$driver['company_id']]);
$companyState = get_from('users','state',['id'=>$driver['company_id']]);
$companyZip = get_from('users','postal_code',['id'=>$driver['company_id']]);
$companyPhone = get_from('users','contact_no',['id'=>$driver['company_id']]);
$companyFax = get_from('users','fax',['id'=>$driver['company_id']]);

/**/

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','BU',16);
$pdf->TextInCenter($comapnyName);
$pdf->ln(0);
$pdf->TextInCenter('DRIVER TRAINING LOG');
$pdf->ln(1);



$headings = ['DRIVERS NAME','TOPIC','REVIEWED BY','DATE','DRIVERS SIGNATURE'];
$data = [
            [$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'Appication','Any One',date('m/d/Y',strtotime($driver['created_date'])),'signs'],

        ];

$w = array(45,23,42,25,57);

$pdf->FancyTable($headings,$data,$w);

// var_dump($driver);
// die();
//////////////////////////////////////////////////////////////////page 1 end

//////////////////////////////////////////////////////////////////page 2 start
$driver_qc = unserialize($driver['qualification_check']);
$pdf->AddPage();
$pdf->SetFont('Arial','BU',16);
$pdf->TextInCenter('QUALIFICATION FILE CHECKLIST');

$arr = [
            [
                ['Driver\'s Name',$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name']],
                ['Phone #',$driver['phonenumber']]
            ],
            [
                ['Address',$driver['current_address']],
                ['Cellular #',$driver['phonenumber']]
            ],
            [
                ['City',$driver['current_city']],
                ['Postal Code',$driver['current_postal_code']]
            ],
            [
                ['E-Mail',$driver['email']],
                ['Postal Code',$driver['current_postal_code']]
            ],
            [
                ['Emg Name',$driver['emg_contact']],
                ['Emg contact #',$driver['emg_contact_number']]
            ]
       ];

$pdf->BasicTable($arr);


$pdf->ln(2);
$arr = [
            ['{123}','Photocopy of current Driver\'s license','Expires',$driver_qc[1]],
            ['{ }','Application for Employment','Completed',$driver_qc[2]],
            ['{ }','Employment References-(3 years)','Completed',$driver_qc[3]],
            ['{ }','Photocopy of current driver\'s abstract','Obtained',$driver_qc[4]],
            ['{ }','Photocopy of current deiver\'s CVOR abstract','Obtained',$driver_qc[5]],
            ['{ }','Certification of Violations/Annual Review','Completed',$driver_qc[6]],
            ['{ }','Driver\'s Statement of on-duty hours','',$driver_qc[7]],
            ['{ }','Driver\'s Medical Certification','Expires',$driver_qc[8]],
            ['{ }','Road Test (copy on file)','Completed',$driver_qc[9]],
            ['{ }','Driver Requirement(Ontario form)','Completed',$driver_qc[10]],
            ['{ }','Certificate of compliance','Completed',$driver_qc[11]],
            ['{ }','Photocopy of Police Criminal Search','Obtained',$driver_qc[12]],
            ['{ }','Authorization Letter','Obtained',$driver_qc[13]],
            ['{ }','Security policy','',$driver_qc[14]]
        ];


$pdf->ln(2);
$pdf->SetFont('','',11);
$set = [12,98,30,35];
$pdf->ArrInCenter($arr,$set,[3],[],5,NULL,5,[3]);
$pdf->ln(2);
$pdf->SetFont('Arial','B',18);
$pdf->TextInCenter('Written Tests');
$pdf->ln(0);
$arr = [
            ['{123}','Written Test','Score : '.$driver_qc[15][0].' %','Completed',$driver_qc[15][1]],
            ['{123}','Dangerous Goods Test','Score : '.$driver_qc[16][0].' %','Completed',$driver_qc[16][1]],
            ['{123}','Hours of Service','Score : '.$driver_qc[17][0].' %','Completed',$driver_qc[17][1]],
            ['{123}','Vehicle Inspection','Score : '.$driver_qc[18][0].' %','Completed',$driver_qc[18][1]],
            ['{123}','Load Security','Score : '.$driver_qc[19][0].' %','Completed',$driver_qc[19][1]],
            ['{123}','Accident Reporting','Score : '.$driver_qc[20][0].' %','Completed',$driver_qc[20][1]]
        ];
$pdf->SetFont('','',11);
$set = [12,50,48,30,35];
$pdf->ArrInCenter($arr,$set,[4],[],5,NULL,5,[4]);

$pdf->ln(2);
$pdf->SetFont('Arial','B',18);
$pdf->TextInCenter('Drug & Alcohol');

$pdf->ln(0);
$arr = [
            ['{123}','Pre-Employment Notification','Completed',$driver_qc[21]],
            ['{123}','Drug & Alcohol Statement','Completed',$driver_qc[22]],
            ['{123}','Drug & Alcohol Policy Receipt','Completed',$driver_qc[23]],
            ['{123}','Drug & Alcohol Orientation','Completed',$driver_qc[24]],
            ['{123}','Drug & Alcohol References-(3 years)','Completed',$driver_qc[25]],
            ['{123}','Pre-Employment Drug Test','Completed',$driver_qc[26]],
        ];
$pdf->SetFont('','',11);
$set = [12,98,30,35];
$pdf->ArrInCenter($arr,$set,[3],[],5,NULL,5,[3]);
$pdf->ln(0);

$pdf->ln(2);
$pdf->SetFont('Arial','B',18);
$pdf->TextInCenter('Owner Operator Checklist');

$pdf->ln(0);
$arr = [
            ['{123}','Copy of Vehicle ownership','Obtained',$driver_qc[27]],
            ['{123}','Copy of Vehicle Annual safety','Obtained',$driver_qc[28]],
            ['{123}','Copy of current emissions test','Obtained',$driver_qc[29]],
            ['{123}','Copy of bill of sale/lease agreement','Obtained',$driver_qc[30]],
            ['{123}','Copy of business/GST registration','Obtained',$driver_qc[31]],
            ['{123}','Copy of signed O/O Agreement/Contract','Completed',$driver_qc[32]],
            ['{123}','WSIB Registration (Independent Operator)','Completed',$driver_qc[33]],
        ];
$pdf->SetFont('','',11);
$set = [12,98,30,35];
$pdf->ArrInCenter($arr,$set,[3],[],5,NULL,5,[3]);
$pdf->ln(0);



//////////////////////////////////////////////////////////////////page 2 End

//////////////////////////////////////////////////////////////////page 3 start

$pdf->AddPage();
$pdf->SetFont('','B',20);
$pdf->TextInCenter('DRIVER\'S APPLICATION');
$pdf->TextInCenter('FOR EMPLOYMENT');
$pdf->ln(5);
$pdf->SetFont('','',10);
$arr = [
        ['Applicant Name :',$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'Date of Application :',date('m/d/Y',strtotime($driver['created_date']))]
];
$set = [28,86,33,36];
$pdf->ArrInCenter($arr,$set,[1,3],[],5,null,5,[1,3]);
$arr = [
        ['(print)']
];
$pdf->ln(-2);
$pdf->Cell(8);
$set = [27];
$pdf->ArrInCenter($arr,$set);

$pdf->ln(1);
$arr = [
        ['Company :',$comapnyName],
        ['Address :',$companyAddress]
];


$set = [25,120];
$pdf->ArrInCenter($arr,$set,[1],[1],20,NULL,5,[1]);

$arr =[
        ['City :',$companyCity,'State :',$companyState,'Zip :',$companyZip]
    ];
$set=[10,60,13,20,9,33];
$pdf->ArrInCenter($arr,$set,[1,3,5],[1,3,5],20,NULL,5,[1,3,5]);


$arr = [
        ['In compliance with Federal and State equal employment opportunity laws, qualiﬁed applicants'],
        ['are considered for all positions without regard to race, color, religion. sex, national origin, age,'],
        ['marital status, veteran status, non-job related disability, or any other protected group status.']
];

$set=[110];
$pdf->ln(4);
$pdf->ArrInCenter($arr,$set,[],[],17);


$pdf->ln(4);
$pdf->Cell(189,100,'',1);

$pdf->SetXY(65,85);
$pdf->SetFont('','B',12);
$pdf->Cell('','','TO BE READ AND SIGNED BY APPLICANT');
$pdf->ln(4);
$arr = [
            ['I authorize you to make such investigations and inquiries of my personal, employment, financial or medical history'],
['and other related matters as may be necessary in arriving at an employment decision. (Generally. inquiries'],
['regarding medical history will be made only if and after a conditional offer of employment has been extended.)'],
['I hereby release employers, schools, health care providersandnother persons from all liability in responding to'],
['inquiries and releasing information in connection With my application.'],

['In the event of employment, I understand that false .or misleading information given in my application or inter-'],
['view(s) may result in discharge. I understand, also. that I am required to abide by all rules and‘regulations of'],
['the Company.'],

['I understand that information I provide regarding current and/or previous employers may be used, and those'],
['employer(s) will be contacted, for the purpose of investigating mysafety performance history as required by 49'],
['CFR 391 .23(d) and (e). I understand that l have the right to: A '],[''],

['1) Review information provided by previous employers;'],

['2) Have errors in the information corrected by previous employers and for those previous employers to re-send '],
['the corrected information to the prospective employer; and'],

['3) Have a rebuttal statement attached to the alleged erroneous information, if the previous employer(s) and I '],
['cannot agree on the accuracy of the information.']


        ];
$set=[185];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[],[],14);
$arr=[
        ['Signature :','','Date :',date('m/d/Y',strtotime($driver['created_date']))]
    ];
$set=[20,100,10,40];
$pdf->ln(2);
$pdf->ArrInCenter($arr,$set,[1,3],[1,3],5,NUll,5,[3]);

$pdf->ln(1);
$pdf->SetFont('','B',12);
$pdf->TextInCenter('FOR COMPANY USE');
$pdf->ln(1);
$pdf->Cell(189,33,'',1);
$pdf->SetXY(5,192);
$pdf->TextInCenter('PROCESS RECORD',90);
$pdf->ln(-1);
$arr = [
        ['APPLICANT HIRED','','REGECTED',''],
        ['DATE EMPLOYED','','POINT EMPLOYED',''],
        ['DEPARTMENT','','CLASSIFICATION','']

];
$pdf->SetFont('','',9);
$set=[32,60,30,57];
$pdf->ArrInCenter($arr,$set,[1,3]);
$arr = [
            ['(IF REJECTED, SUMMARY REPORT OF REASONS SHOULD BE PLACED IN FILE)']
        ];
$set = [150];
$pdf->SetFont('','',6);
$pdf->ln(-1);
$pdf->ArrInCenter($arr,$set,[],[],10);
//$pdf->ln(2);
$arr = [
            ['SIGNATURE OF INTERVIEWING OFFICER','']
        ];
$set=[67,112];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1],[]);

$pdf->ln(2);
$pdf->SetFont('','B',10);
$pdf->TextInCenter("TERMINATION OF EMPLOYMENT");

$arr = [
            ['DATE TERMINATED','','DEPARTMENT RELEASED FROM','']
];
$pdf->SetFont('','',9);
$set=[31,57,52,50];
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1);

$pdf->ln(0.8);
$arr=[
        ['DISMISSED','','VOLUNTARILY QUIT','','OTHER','']
];
$set=[20,40,32,35,13,50];
$pdf->ArrInCenter($arr,$set,[1,3,5],[],0.1);

$pdf->ln(0.8);
$arr=[
        ['TERMINATION REPORT PLACED IN FILE','','SUPERVISOR','']
];
$set=[63,45,25,57];
$pdf->ArrInCenter($arr,$set,[1,3,5],[],0.1);

$pdf->ln(3);
// $pdf->Cell(189,9,'',1);

// $arr=[
//         ['This form is made available with the understanding that J.  Keller & Associates, Inc. Is not engaged in rendering legal. acoomllng. or other professional services.'],
//         ['J. J. Keller & Associates, Inc. assumes no responsibility tor the use of this form, or any decision made by an employer whlch may 9on local, state. or federal law.']
// ];
// $set=[150];
// $pdf->SetXY(10,256);
// $pdf->SetFont('','',7);
// $pdf->ArrInCenter($arr,$set,[],[],3);

// $pdf->ln(1);
// $arr=[
//         [iconv("UTF-8", "ISO-8859-1", "©").' Copyright $006 J. J. KELLER a. ASSOCIKI\'ES. IMO. Neenah. WI - USA'],
//         ['(000) 3276868 0 wwwjlkelewom - Printed in the United States']
// ];
// $set=[100];
// $pdf->ArrInCenter($arr,$set,[],[],5,3);
// $pdf->ln(-7);
// $pdf->TextInCenter('15f(Rev./05) 691',165);


//////////////////////////////////////////////////////////////////page 3 end

//////////////////////////////////////////////////////////////////page 4 start


$pdf->AddPage();
$pdf->SetFont('','BI',12);

$pdf->Cell(190,5,'THE BELOW DISCLOSURE AND AUTHORIZATION LANGUAGE IS FOR MANDATORY USE BY',0,0,'C');
$pdf->ln();
$pdf->Cell(190,5,'ALL ACCOUNT HOLDERS',0,0,'C');

$pdf->ln(7);
$pdf->SetFont('','B');
$pdf->Cell(190,5,'IMPORTANT DISCLOSURE',0,0,'C');
$pdf->ln();
$pdf->Cell(190,5,'REGARDING BACKGROUND REPORTS FROM THE PSP Online Service',0,0,'C');

$pdf->ln(9);

$pdf->SetFont('','',9);
$text = 'In connection with your application for employment with <u><b>'.$comapnyName.'</b></u> ("Prospective Employer"), Prospective Employer, its employees, agents or contractors may obtain one or more reports regarding your driving, and safety inspection history from the Federal Motor Carrier Safety Administration (FMCSA).';
$pdf->MultiCell(170,5,$pdf->WriteHTML($text));


$pdf->ln();
$arr=[
      ['When the application for employment is submitted in person, if the Prospective Employer uses any information it obtains from'],
      ['FMCSA in a decision to not hire you or to make any other adverse employment decision regarding you, the Prospective Employer'],
      ['will provide you with a copy of the report upon which its decision was based and a written summary of your rights under the Fair'],
      ['Credit Reporting Act before taking any final adverse action. If any final adverse action is taken against you based upon your driving'],
      ['history or safety report, the Prospective Employer will notify you that the action has been taken and that the action was based in part'],
      ['or in whole on this report.']
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);

$pdf->ln();
$arr=[
      ['When the application for employment is submitted by mail, telephone, computer, or other similar means, if the Prospective'],
      ['Employer uses any information it obtains from FMCSA in a decision to not hire you or to make any other adverse employment'],
      ['decision regarding you, the Prospective Employer must provide you within three business days of taking adverse action oral, written'],
      ['or electronic notification: that adverse action has been taken based in whole or in part on information obtained from FMCSA; the'],
      ['name, address, and the toll free telephone number of FMCSA; that the FMCSA did not make the decision to take the adverse action'],
      ['and is unable to provide you the specific reasons why the adverse action was taken; and that you may, upon providing proper'],
      ['identification, request a free copy of the report and may dispute with the FMCSA the accuracy or completeness of any information'],
      ['or report. If you request a copy of a driver record from the Prospective Employer who procured the report, then, within 3 business'],
      ['days of receiving your request, together with proper identification, the Prospective Employer must send or provide to you a copy of'],
      ['your report and a summary of your rights under the Fair Credit Reporting Act.'],
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);

$pdf->ln();
$arr=[
      ['Neither the Prospective Employer nor the FMCSA contractor supplying the crash and safety information has the capability to correct'],
      ['any safety data that appears to be incorrect. You may challenge the accuracy of the data by submitting a request to'],
      ['https://dataqs.fmcsa.dot.gov. If you challenge crash or inspection information reported by a State, FMCSA cannot change or correct'],
      ['this data. Your request will be forwarded by the DataQs system to the appropriate State for adjudication.']
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);


$pdf->ln();
$arr=[
      ['Any crash or inspection in which you were involved will display on your PSP report. Since the PSP report does not report, or assign,'],
      ['or imply fault, it will include all Commercial Motor Vehicle (CMV) crashes where you were a driver or co-driver and where those'],
      ['crashes were reported to FMCSA, regardless of fault. Similarly, all inspections, with or without violations, appear on the PSP report.'],
      ['State citations associated with Federal Motor Carrier Safety Regulations (FMCSR) violations that have been adjudicated by a court'],
      ['of law will also appear, and remain, on a PSP report.']
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);

$pdf->ln();
$arr=[
      ['The Prospective Employer cannot obtain background reports from FMCSA without your authorization.']
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);

$pdf->SetFont('','B',12);
$pdf->ln(6);
$pdf->Cell(190,5,'AUTHORIZATION',0,0,'C');


$pdf->ln(6);
$arr=[
      ['If you agree that the Prospective Employer may obtain such background reports, please read the following and sign below:']
];

$set=[170];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[],[],0.1);


$pdf->ln();

$text = 'I authorize <u><b>'.$comapnyName.'</b></u> ("Prospective Employer") to access the FMCSA Pre-Employment Screening Program (PSP)
system to seek information regarding my commercial driving safety record and information regarding my safety inspection history. I
understand that I am authorizing the release of safety performance information including crash data from the previous five (5) years
and inspection history from the previous three (3) years. I understand and acknowledge that this release of information may assist
the Prospective Employer to make a determination regarding my suitability as an employee';

$pdf->MultiCell(170,5,$pdf->WriteHTML($text));




$pdf->ln();
$arr=[
      ['I further understand that neither the Prospective Employer nor the FMCSA contractor supplying the crash and safety information has'],
      ['submitting a request to https://dataqs.fmcsa.dot.gov. If I challenge crash or inspection information reported by a State, FMCSA'],
      ['cannot change or correct this data. I understand my request will be forwarded by the DataQs system to the appropriate State for'],
      ['adjudication.']
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);


$pdf->ln();
$arr=[
      ['I understand that any crash or inspection in which I was involved will display on my PSP report. Since the PSP report does not'],
      ['report, or assign, or imply fault, I acknowledge it will include all CMV crashes where I was a driver or co-driver and where those'],
      ['crashes were reported to FMCSA, regardless of fault. Similarly, I understand all inspections, with or without violations, will appear'],
      ['on my PSP report, and State citations associated with FMCSR violations that have been adjudicated by a court of law will also'],
      ['appear, and remain, on my PSP report. I have read the above Disclosure Regarding Background Reports provided to me by'],
      ['Prospective Employer and I understand that if I sign this Disclosure and Authorization, Prospective Employer may obtain a report of'],
      ['my crash and inspection history. I hereby authorize Prospective Employer and its employees, authorized agents, and/or affiliates to'],
      ['obtain the information authorized above.'],
];

$set=[170];
$pdf->ArrInCenter($arr,$set,[],[],0.1);

$pdf->ln(13);
$arr=[
      ['Date :',date('m/d/Y',strtotime($driver['created_date'])),'',' ']
];

$set=[14,50,20,70];
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NUll,5,[1]);


$pdf->ln(2);
$arr=[
      ['','Signature']
];

$set=[84,40];
$pdf->ArrInCenter($arr,$set,[],[],0.1);


$pdf->ln(13);
$arr=[
      ['',$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name']]
];

$set=[84,70];
$pdf->ArrInCenter($arr,$set,[1],[],0.1,null,5,[1]);

$pdf->ln(2);
$arr=[
      ['','Name (Please Print)']
];

$set=[84,40];
$pdf->ArrInCenter($arr,$set,[],[],0.1);



$pdf->ln(11);
$pdf->SetFont('','',7);
$arr=[
      ['NOTICE: This form is made available to monthly account holders by NIC on behalf of the U.S. Department of Transportation, Federal Motor Carrier Safety'],
      ['Administration (FMCSA). Account holders are required by federal law to obtain an Applicant’s written or electronic consent prior to accessing the Applicant’s PSP'],
      ['report. Further, account holders are required by FMCSA to use the language contained in this Disclosure and Authorization form to obtain an Applicant’s consent. The'],
      ['language must be used in whole, exactly as provided. Further, the language on this form must exist as one stand-alone document. The language may NOT be included'],
      ['with other consent forms or any other language']
];

$set=[180];
$pdf->ArrInCenter($arr,$set,[],[],0.1);

$pdf->ln();
$arr=[
      ['LAST UPDATED 12/22/2015']
];

$set=[180];
$pdf->ArrInCenter($arr,$set,[],[],0.1);


//////////////////////////////////////////////////////////////////page 4 end
//////////////////////////////////////////////////////////////////page 6 start



$pdf->AddPage();
$pdf->SetFont('','B',16);
$pdf->TextInCenter('Drug Test CONSENT');

$pdf->ln(7);
$pdf->SetFont('','',12);

$text = 'I have received, read, and understood <u><b>'.$comapnyName.'</b></u> Drug Free Workplace Program including Annex "A" and I understand that compliance with the drug free workplace Program is a term and condition of employment at the company. I understand that the failure or refusal to co-operate fully, sign any required documents, or submit to any requested or recommended tests will constitute grounds for immediate termination. I agree to follow and abide by the  <u><b>'.$comapnyName.'</b></u> Drug Free Workplace Program.';

$pdf->MultiCell(180,5,$pdf->WriteHTML($text));


$pdf->ln();
$arr=[
      ['I understand that the company will be responsible for paying the cost of the random pool testing.'],
      ['Should I test positive for drugs or alcohol, I understand I am responsible for all other costs'],
      ['associated to "the drug and alcohol testing program such as, Substance Abuse Professional'],
      ['interviews, return to duty, and follow up testingetc.']

];

$set=[180];
$pdf->ArrInCenter($arr,$set,[],[],0.001);

$pdf->ln();
$arr=[
      ['The person designated by the company to answer driver\'s question is:','']

];

$set=[133,50];
$pdf->ArrInCenter($arr,$set,[1],[],4);

$pdf->ln(25);
$arr=[
      ['','',date('m/d/Y',strtotime($driver['created_date']))]

];

$set=[63,35,75];
$pdf->ArrInCenter($arr,$set,[0,2],[],8,NULL,5,[2]);


$arr=[
      ['EMPLOYEE SIGNATURE','','DATE']

];

$set=[75,55,60];
$pdf->ArrInCenter($arr,$set,[],[0,2],8);

$pdf->ln(25);

$arr=[
      [$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'',implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$driver['witnessname']]))]

];

$set=[63,35,75];

$pdf->ArrInCenter($arr,$set,[0,2],[],8,NULL,5,[0,2]);

$arr=[
      ['EMPLOYEE\'S NAME (printed)','','WITNESS NAME']

];

$set=[75,43,60];
$pdf->ArrInCenter($arr,$set,[],[0,2],8);


//////////////////////////////////////////////////////////////////page 6 end
/////////////////////////////////////////////////////////////////page 7 start
$pdf->AddPage();
$pdf->SetFont('','B',12);
$pdf->Cell(190,6,'APPLICANT TO COMPLETE',0,0,'C');
$pdf->SetFont('','',9);
$pdf->Cell(190,6,'answer all question-please print',0,0,'C');
$pdf->ln();
$arr=[
        ['Position(s) Applied for:',get_Position($driver['position_applied'])]
];
$set =  [35,151];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1],[],0.1,NULL,4,[1]);

$arr=[
        ['Name',$driver['last_name'],$driver['first_name'],$driver['middle_name'],'Social Security No.',$driver['sin_no']]
];
$set =  [12,36,36,36,30,36];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,2,3,5],[],0.1,NULL,6,[1,2,3,5]);


$arr=[
        ['Last','First','Middle']
];
$set =  [36,36,36];
$pdf->SetFont('','',7);
$pdf->ArrInCenter($arr,$set,[],[],12.1,NULL,4,[0,1,2]);

$pdf->ln(3);
$pdf->SetFont('','',9);
$pdf->Cell(150,4,'List your addresses of residency for the past 3 years.');

$pdf->ln(5);
$arr=[
        ['Current Address',$driver['street'],$driver['current_city']]
];
$set =  [27,85,74];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,2],[],0.1,NULL,6,[1,2]);

$arr=[
        ['Street','City']
];
$set =  [85,74];
$pdf->SetFont('','',7);
$pdf->ArrInCenter($arr,$set,[],[],27.1,NULL,4,[0,1]);



$arr=[
        ['',getstate($driver['current_province']),$driver['current_postal_code'],'Phone',$driver['phonenumber'],'How Long?',$driver['current_duration']]
];
$set =  [27,40,33,10,35,17,24];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,2,4,6],[],0.1,NULL,6,[1,2,4,6]);

$arr=[
        ['State','Zip Code','','yr./mo.']
];
$set =  [40,33,62,24];
$pdf->SetFont('','',7);
$pdf->ArrInCenter($arr,$set,[],[],27.1,NULL,4,[0,1,3]);
	$pre_count=0;

		$x=$pdf->GetX();
		$y=$pdf->GetY();
		$pdf->SetFont('','',9);
		$pdf->MultiCell(26.9,4," \nPrevious\nAddress");
		$pdf->SetXY($x,$y);
	if($driver['prv_add_no']>0){
		$previous_street = unserialize($driver['previous_street']);
		$previous_city = unserialize($driver['previous_city']);
		$previous_province = unserialize($driver['previous_province']);
		$previous_postal_code = unserialize($driver['previous_postal_code']);
		$previous_duration = unserialize($driver['previous_duration']);

		for(;$pre_count<$driver['prv_add_no'];$pre_count++){

			$arr=[
			        ['',$previous_street[$pre_count],$previous_city[$pre_count],$previous_province[$pre_count]."/",$previous_postal_code[$pre_count],'How Long?',$previous_duration[$pre_count]]
			];
			$set =  [27,53,20,20,25,17,24];
			$line = [1,2,3,4,6];
			$center = [1,2,3,4,6];

			$pdf->SetFont('','',9);
			$pdf->ArrInCenter($arr,$set,$line,[],0.1,NULL,6,$center);

			$arr=[
			        ['Street','City','State &',' Zip Code','','yr./mo.']
			];
			$set =  [53,20,20,25,17,24];
			$pdf->SetFont('','',7);
			$pdf->ArrInCenter($arr,$set,[],[],27.5,NULL,4,[0,1,2,3,5]);
		}
	}
	for(;$pre_count<3;$pre_count++){
			$arr=[
			        ['','','',''."/",'','How Long?','']
			];
			$set =  [27,53,20,20,25,17,24];
			$line = [1,2,3,4,6];
			$center = [1,2,3,4,6];

			$pdf->SetFont('','',9);
			$pdf->ArrInCenter($arr,$set,$line,[],0.1,NULL,6,$center);

			$arr=[
			        ['Street','City','State &',' Zip Code','','yr./mo.']
			];
			$set =  [53,20,20,25,17,24];
			$pdf->SetFont('','',7);
			$pdf->ArrInCenter($arr,$set,[],[],27.5,NULL,4,[0,1,2,3,5]);
	}


$arr=[
        ['Do you have the legal right to work in the United State?',$driver['legal_right']]
];
$set =  [80,106];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1],[],0.1,NULL,6,[1]);

$arr=[
        ['Date of Birth',$driver['dob'],'Can you provide proof of age?',$driver['provide_age_proof']]
];
$set =  [25,55,50,56];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NULL,6,[1,3]);

$arr=[
        ['(Required for Commercial Drivers)']
];
$set =  [80];
$pdf->SetFont('','',7);
$pdf->ArrInCenter($arr,$set,[],[],5,NULL,4);


$arr=[
        ['Have you worked for this company before?',$driver['worked_before'],'Where?',$driver['b_worked_when']]
];
$set =  [64,24,15,83];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NULL,6,[1,3]);

$arr=[
        ['Date: Form',$driver['b_from_date'],'To',$driver['b_to_date'],'Rate of Pay',$driver['b_pay_rate'],'Position',$driver['b_work_position']]
];
$set =  [18,27,7,33,20,30,14,37];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3,5,7],[],0.1,NULL,6,[1,3,5,7]);

$arr=[
        ['Reason for leaving',$driver['b_leaving_reason']]
];
$set =  [30,156];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3,5,7],[],0.1,NULL,6,[1]);


$arr=[
        ['Are you now employed?',$driver['employment_status'],'if not, how long since leaving last emplyment?',$driver['last_employment']]
];
$set =  [36,13,67,70];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NULL,6,[1,3]);


$arr=[
        ['Who referred you?',$driver['who_referred'],'Rate of pay expected',$driver['pay_rate_expected']]
];
$set =  [29,77,34,46];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NULL,6,[1,3]);

$arr=[
        ['Have you ever been bonded?',$driver['bond_status'],'Name of bonding company',$driver['bonding_company']]
];
$set =  [43,67,40,36];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NULL,6,[1,3]);

$arr=[
        ['(Answer only if a job Requirement)']
];
$set =  [110];
$pdf->SetFont('','',7);
$pdf->ArrInCenter($arr,$set,[],[],1,NULL,4);

$arr=[
        ['Have you ever been conviced of a felony?',$driver['felony_status']]
];
$set =  [60,126];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[1],[],0.1,NULL,6,[1]);

$pdf->ln(2);
$arr=[
        ['If yes, please explain fully on a separate sheet of paper. Conviction of a crime is not an automatic bar to emplyment-all circumstances will be considered.']
];
$set =  [186];
$pdf->SetFont('','',7.7);
$pdf->ArrInCenter($arr,$set,[],[],0.1,NULL,6);

$arr=[
        [''],
        [''],
];
$set =  [186];
$pdf->SetFont('','',8);
$pdf->ArrInCenter($arr,$set,[0],[],0.1,NULL,0.9);

$arr=[
        ['Is there any reason you might be unable to perform the functions of the job which you have applied [as described in the attached job desciption]?']
];
$set =  [186];
$pdf->SetFont('','',7.7);
$pdf->ArrInCenter($arr,$set,[],[],0.1,NULL,6);


$arr=[
        [''],
];
$set =  [186];
$pdf->SetFont('','',8);
$pdf->ArrInCenter($arr,$set,[0],[],0.1,NULL,0.9);


$arr=[
        ['If yes, explain if you wish.']
];
$set =  [186];
$pdf->SetFont('','',7.7);
$pdf->ArrInCenter($arr,$set,[],[],0.1,NULL,6);

$pdf->SetFont('','',9);
$pdf->MultiCell(186,4,$driver['conviction_crime'],'B');
// $arr=[
//         ['']
// ];
// $set =  [186];
// $pdf->SetFont('','',8);
// $pdf->ArrInCenter($arr,$set,[0],[],0.1,NULL,0.9);


$pdf->ln(5);
$pdf->SetFont('','B',12);
$pdf->Cell(190,5,'EMPLYMENT HISTORY',0,0,'C');

$pdf->ln();
$arr=[
        ['All drivers applicant to frive in interstate commerce must provide the fillowing information an all employers during the preceding 3 years. '],[' List complete mailing address, street number, city, state and zip code.']
];
$set =  [186];
$pdf->SetFont('','',8);
$pdf->ArrInCenter($arr,$set,[],[],0.1,NULL,4);

$pdf->ln();
$arr=[
        ['Applicants to dive a commercial motor vehical* in intrastate or interstate commerce sha;; also provide an additional years\' information on those '],[' employers for whome the applicant operated such vehicle. '],['(NOTE: List employers in reverse order starting with the most recent.Add another sheet as necessary)']
];
$set =  [186];
$pdf->SetFont('','',8);
$pdf->ArrInCenter($arr,$set,[],[],0.1,NULL,4);
///////
///////////////////////////////////////////////////////////////////////page 7 end
//////////////////////////////////////////////////////////////////////page 8 start
$emp_count = 0;
//////////////////////////
if($driver['prv_empl_his_no']>0){

	$employer_company_name =unserialize($driver['employer_company_name']);
	$employer_name =unserialize($driver['employer_name']);
	$employer_address =unserialize($driver['employer_address']);
	$employer_number =unserialize($driver['employer_number']);
	$employer_city =unserialize($driver['employer_city']);
	$employer_province =unserialize($driver['employer_province']);
	$emplyer_zip =unserialize($driver['emplyer_zip']);
	$position_held =unserialize($driver['position_held']);
	$salary_wage =unserialize($driver['salary_wage']);
	$employment_fron_date =unserialize($driver['employment_fron_date']);
	$employment_to_date =unserialize($driver['employment_to_date']);
	$employer_leaving_reason =unserialize($driver['employer_leaving_reason']);
	$fmcsr_status =unserialize($driver['fmcsr_status']);
	$safety_sensitive_status =unserialize($driver['safety_sensitive_status']);

	for(;$emp_count<$driver['prv_empl_his_no'];$emp_count++):
    $current =  strtotime(date('m/d/y'));
    $fix =  strtotime($employment_to_date[$emp_count]);
    if(($current-$fix) > 93312000){
      break;

    }
		$pdf->ln();
		$pdf->SetFont('','B',12);
		$pdf->Cell(130,8,'EMPLOYER',1,0,'C');
		$pdf->Cell(60,8,'DATE',1,0,'C');
		$pdf->ln();
		$pdf->SetFont('','',8);
		$pdf->Cell(20,8,"NAME","ULB",0);
		$pdf->Cell(110,8,$employer_company_name[$emp_count],"UBR",0,'C');
		$x2=$x=$pdf->GetX();
		$y2=$y=$pdf->GetY();
		$pdf->Cell(30,8,'',1,0);
		$pdf->Cell(30,8,'',1,0);
		$pdf->SetFont('','',5.5);

		$from_date =explode('/', $employment_fron_date[$emp_count]);
		$pdf->SetXY($x,$y+1);
		$pdf->Cell(8,2,'FROM ');
		$pdf->Cell(10,2,$from_date[1],'B',0,'C');
		$y=$pdf->GetY();

		$pdf->SetXY($x,$y+4.5);
		// $pdf->Cell(8,2,'MO.        ______  YR.______');
		$pdf->Cell(6,2,'MO. ');
		$pdf->Cell(6,2,$from_date[0],"B",0,'C');
		$pdf->Cell(6,2,' YR. ');
		$pdf->Cell(6,2,$from_date[2],"B",0,'C');


		$pdf->SetXY($x2+30,$y2+1);
		$to_date =explode('/', $employment_to_date[$emp_count]);
		$pdf->Cell(8,2,'TO ');
		$pdf->Cell(10,2,$to_date[1],'B',0,'C');
		$y2=$pdf->GetY();

		$pdf->SetXY($x2+30,$y2+4.5);
		$pdf->Cell(6,2,'MO. ');
		$pdf->Cell(6,2,$to_date[0],"B",0,'C');
		$pdf->Cell(6,2,' YR. ');
		$pdf->Cell(6,2,$to_date[2],"B",0,'C');


		$pdf->ln(2.5);
		$pdf->SetFont('','',8);
		$pdf->Cell(20,8,'ADDRESS',"UBL",0);
		$pdf->Cell(110,8,$employer_address[$emp_count],"UBR",0,"C");
		$pdf->SetFont('','',6.5);
		$pdf->Cell(20,8,'POSITION HELD',"UBL");
		$pdf->Cell(40,8,$position_held[$emp_count],"UBR",0,'C');

		$pdf->ln();
		$pdf->SetFont('','',8);
		// $pdf->Cell(130,8,'CITY                                                STATE                              ZIP',1);
		$pdf->Cell(10,8,'CITY',"UBL");
		$pdf->Cell(40,8,$employer_city[$emp_count],"UB",0,'C');
		$pdf->Cell(10,8,'STATE',"UB");
		$pdf->Cell(35,8,$employer_province[$emp_count],"UB",0,'C');
		$pdf->Cell(10,8,'ZIP',"UB");
		$pdf->Cell(25,8,$emplyer_zip[$emp_count],"UBR",0,'C');
		$pdf->SetFont('','',6.5);
		$pdf->Cell(30,8,'SALARY/WAGE',"UBL");
		$pdf->Cell(30,8,$salary_wage[$emp_count],"UBR",0,"C");


		$pdf->ln();
		$pdf->SetFont('','',8);
		// $pdf->Cell(130,8,'CONTACT PERSON                         PHONE NUMBER',1);
		$pdf->Cell(28,8,'CONTACT PERSON',"UBL");
		$pdf->Cell(47,8,$employer_name[$emp_count],"UB",0,'C');
		$pdf->Cell(20,8,'PHONE NUMBER',"UB");
		$pdf->Cell(35,8,$employer_number[$emp_count],"UBR",0,'C');
		$pdf->SetFont('','',6.5);
		$pdf->Cell(30,8,'REASON FOR LEAVING',"UBL");
		$pdf->Cell(30,8,$employer_leaving_reason[$emp_count],"UBR",0,"C");


		$pdf->ln();
		$pdf->SetFont('','',8);
		$pdf->Cell(87,8,"WERE YOU SUBJECT TO THE FMCSRs+ WHILE EMPLOYED?","BUL");
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		if($fmcsr_status[$emp_count] == 'Yes'){
			$pdf->Cell(15,8,$pdf->image(base_url('uploads/checkedbox.png'),$x,$y+2,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,8,$pdf->image(base_url('uploads/uncheckedbox.png'),$x+15,$y+2,3.5,3.5).'    NO',"BUR");
		}else{
			$pdf->Cell(15,8,$pdf->image(base_url('uploads/uncheckedbox.png'),$x,$y+2,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,8,$pdf->image(base_url('uploads/checkedbox.png'),$x+15,$y+2,3.5,3.5).'    NO',"BUR");
		}


		$pdf->ln();
		$pdf->SetFont('','',8);
		$pdf->Cell(190,4,"WAS YOUR JOB DESIGNATED AS A SAFETY-SENSITIVE FUNCTION IN ANY DOT-REGULATED MODE SUBJECT TO THE DRUG AND","RL");
		$pdf->ln();
		$pdf->Cell(87,4,"ALCOHOL TESTING REQUIREMENTS OF 49 CFR PART 40?","LB");
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		if($safety_sensitive_status[$emp_count]=='Yes'){
			$pdf->Cell(15,4,$pdf->image(base_url('uploads/checkedbox.png'),$x,$y,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,4,$pdf->image(base_url('uploads/uncheckedbox.png'),$x+15,$y,3.5,3.5).'    NO',"BUR");
		}else{
			$pdf->Cell(15,4,$pdf->image(base_url('uploads/uncheckedbox.png'),$x,$y,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,4,$pdf->image(base_url('uploads/checkedbox.png'),$x+15,$y,3.5,3.5).'    NO',"BUR");
		}
		$pdf->ln();
	endfor;
}

	for (; $emp_count<4  ; $emp_count++) {
		$pdf->ln();
		$pdf->SetFont('','B',12);
		$pdf->Cell(130,8,'EMPLOYER',1,0,'C');
		$pdf->Cell(60,8,'DATE',1,0,'C');
		$pdf->ln();
		$pdf->SetFont('','',8);
		$pdf->Cell(20,8,"NAME","ULB",0);
		$pdf->Cell(110,8,'',"UBR",0,'C');
		$x2=$x=$pdf->GetX();
		$y2=$y=$pdf->GetY();
		$pdf->Cell(30,8,'',1,0);
		$pdf->Cell(30,8,'',1,0);
		$pdf->SetFont('','',5.5);

		$from_date =explode('/', '');
		$pdf->SetXY($x,$y+1);
		$pdf->Cell(8,2,'FROM ');
		$pdf->Cell(10,2,$from_date[1],'B',0,'C');
		$y=$pdf->GetY();

		$pdf->SetXY($x,$y+4.5);
		// $pdf->Cell(8,2,'MO.        ______  YR.______');
		$pdf->Cell(6,2,'MO. ');
		$pdf->Cell(6,2,$from_date[0],"B",0,'C');
		$pdf->Cell(6,2,' YR. ');
		$pdf->Cell(6,2,$from_date[2],"B",0,'C');


		$pdf->SetXY($x2+30,$y2+1);
		$to_date =explode('/', '');
		$pdf->Cell(8,2,'TO ');
		$pdf->Cell(10,2,$to_date[1],'B',0,'C');
		$y2=$pdf->GetY();

		$pdf->SetXY($x2+30,$y2+4.5);
		$pdf->Cell(6,2,'MO. ');
		$pdf->Cell(6,2,$to_date[0],"B",0,'C');
		$pdf->Cell(6,2,' YR. ');
		$pdf->Cell(6,2,$to_date[2],"B",0,'C');


		$pdf->ln(2.5);
		$pdf->SetFont('','',8);
		$pdf->Cell(20,8,'ADDRESS',"UBL",0);
		$pdf->Cell(110,8,'',"UBR",0,"C");
		$pdf->SetFont('','',6.5);
		$pdf->Cell(20,8,'POSITION HELD',"UBL");
		$pdf->Cell(40,8,'',"UBR",0,'C');

		$pdf->ln();
		$pdf->SetFont('','',8);
		// $pdf->Cell(130,8,'CITY                                                STATE                              ZIP',1);
		$pdf->Cell(10,8,'CITY',"UBL");
		$pdf->Cell(40,8,'',"UB",0,'C');
		$pdf->Cell(10,8,'STATE',"UB");
		$pdf->Cell(35,8,'',"UB",0,'C');
		$pdf->Cell(10,8,'ZIP',"UB");
		$pdf->Cell(25,8,'',"UBR",0,'C');
		$pdf->SetFont('','',6.5);
		$pdf->Cell(30,8,'SALARY/WAGE',"UBL");
		$pdf->Cell(30,8,'',"UBR",0,"C");


		$pdf->ln();
		$pdf->SetFont('','',8);
		// $pdf->Cell(130,8,'CONTACT PERSON                         PHONE NUMBER',1);
		$pdf->Cell(28,8,'CONTACT PERSON',"UBL");
		$pdf->Cell(47,8,'',"UB",0,'C');
		$pdf->Cell(20,8,'PHONE NUMBER',"UB");
		$pdf->Cell(35,8,'',"UBR",0,'C');
		$pdf->SetFont('','',6.5);
		$pdf->Cell(30,8,'REASON FOR LEAVING',"UBL");
		$pdf->Cell(30,8,'',"UBR",0,"C");


		$pdf->ln();
		$pdf->SetFont('','',8);
		$pdf->Cell(87,8,"WERE YOU SUBJECT TO THE FMCSRs+ WHILE EMPLOYED?","BUL");
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		if($fmcsr_status[$emp_count] == 'Yes'){
			$pdf->Cell(15,8,$pdf->image(base_url('uploads/checkedbox.png'),$x,$y+2,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,8,$pdf->image(base_url('uploads/uncheckedbox.png'),$x+15,$y+2,3.5,3.5).'    NO',"BUR");
		}else{
			$pdf->Cell(15,8,$pdf->image(base_url('uploads/uncheckedbox.png'),$x,$y+2,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,8,$pdf->image(base_url('uploads/checkedbox.png'),$x+15,$y+2,3.5,3.5).'    NO',"BUR");
		}


		$pdf->ln();
		$pdf->SetFont('','',8);
		$pdf->Cell(190,4,"WAS YOUR JOB DESIGNATED AS A SAFETY-SENSITIVE FUNCTION IN ANY DOT-REGULATED MODE SUBJECT TO THE DRUG AND","RL");
		$pdf->ln();
		$pdf->Cell(87,4,"ALCOHOL TESTING REQUIREMENTS OF 49 CFR PART 40?","LB");
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		if($safety_sensitive_status[$emp_count]=='Yes'){
			$pdf->Cell(15,4,$pdf->image(base_url('uploads/checkedbox.png'),$x,$y,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,4,$pdf->image(base_url('uploads/uncheckedbox.png'),$x+15,$y,3.5,3.5).'    NO',"BUR");
		}else{
			$pdf->Cell(15,4,$pdf->image(base_url('uploads/uncheckedbox.png'),$x,$y,3.5,3.5).'    YES',"B");
			$pdf->Cell(88,4,$pdf->image(base_url('uploads/checkedbox.png'),$x+15,$y,3.5,3.5).'    NO',"BUR");
		}
		$pdf->ln();
	}




$pdf->ln(7);


$arr=[
        ['*lncludes vehicles having a GVWR of 26,001 lbs. or more, vehicles designed to transport 16 or more passengers'],
        ['(including the driver), or any size vehicle used to transport hazardous materials in a quantlty requiring placarding.'],
        ['*The Federal Motor Carrier Safety Regulations (FMCSRs) apply to anyone operating a motor vehicle on a highway in'],
        ['interstate commerce to transport passengers or property when the vehicle: (1) weighs or has a GVWR of 10,001 pounds'],
        ['or more, (2) is designed or used to transport more than 8\'passengers (including the driver), 0R (3) is of any size andvis'],
        ['used to transport hazardous materials in a quantity requiring placarding.']
];
$set =  [186];
$pdf->SetFont('','',10);
$pdf->ArrInCenter($arr,$set,[],[],0.1);




///////////////////////////////////////////////////////////////////////////////page 8 end
///////////////////////////////////////////////////////////////////////////////page 9 start



$pdf->AddPage();

$arr =[
        ['ACCIDENT RECORD','FOR PAST 3 YEARS OR MORE (ATTACH SHEET IF MORE SPACE IS NEEDED) IF, WRITE','NONE'],
    ];

$set = [32,133.5,50];
$pdf->SetFont('','',9);
$pdf->ArrInCenter($arr,$set,[],[0,2],0.1);

$pdf->SetFont('','',9);
$pdf->Cell(45,7,'DATES    ',1,'','R');
$c_x = $pdf->GetX();
$c_y = $pdf->GetY();
$pdf->MultiCell(60,3.5,"NATURE OF ACCIDENT \n (HEAD-ON, REAR-END. UPSET, ETC,)",1,'C');
$pdf->SetXY($c_x+60,$c_y);
$pdf->Cell(27,7,'FATALITIES',1,'','C');
$pdf->Cell(27,7,'INJURIES',1,'','C');
$pdf->MultiCell(31,3.5,"HAZARDOUS \n MATERIAL SPILL",1,'C');


$pdf->SetFont('','',7.5);
	$acc_count = 0;
	$accident_date = unserialize($driver['accident_date']);
	$accident_nature = unserialize($driver['accident_nature']);
	$accident_fatalities = unserialize($driver['accident_fatalities']);
	$accident_injuries = unserialize($driver['accident_injuries']);
	$accident_hazardous = unserialize($driver['accident_hazardous']);
	for(;$acc_count<$driver['prv_acc_his_no'];$acc_count++):
		if($acc_count == 0){
			$pdf->Cell(25,6,'LAST ACCIDENT',"UBL");
		}
		else{
			$pdf->Cell(25,6,'NEXT PREVIOUS',"UBL");
		}
		$pdf->Cell(20,6,$accident_date[$acc_count],"UBR",0,"R");
		$pdf->Cell(60,6,$accident_nature[$acc_count],1,0,'C');
		$pdf->Cell(27,6,$accident_fatalities[$acc_count],1,0,'C');
		$pdf->Cell(27,6,$accident_injuries[$acc_count],1,0,'C');
		$pdf->Cell(31,6,$accident_hazardous[$acc_count],1,0,'C');
		$pdf->ln();
	endfor;

	/*Exta empty boxes for accented*/
	for(;$acc_count<3;$acc_count++):
		if($acc_count == 0){
			$pdf->Cell(25,6,'LAST ACCIDENT',"UBL");
		}
		else{
			$pdf->Cell(25,6,'NEXT PREVIOUS',"UBL");
		}
		$pdf->Cell(20,6,'',"UBR",0,"R");
		$pdf->Cell(60,6,'',1,0,'C');
		$pdf->Cell(27,6,'',1,0,'C');
		$pdf->Cell(27,6,'',1,0,'C');
		$pdf->Cell(31,6,'',1,0,'C');
		$pdf->ln();
	endfor;
	/*end of Exta empty boxes for accented*/


$arr =[
        ['TRAFFIC CONVIVTIONS','AND FORFEITURED FOR THE PAST 3 YEARS (OTHER  THAN PARKING VIOLATIONS) IF NONE,WRITE','NONE'],
    ];

$set = [34,141.5,15];
$pdf->SetFont('','',8.3);
$pdf->ArrInCenter($arr,$set,[],[0,2],0.1);

$pdf->SetFont('','',9);
$pdf->Cell(81,6,'LOCATION',1,NULL,'C');
$pdf->Cell(27,6,'DATE',1,NULL,'C');
$pdf->Cell(37,6,'CHARGE',1,NULL,'C');
$pdf->Cell(45,6,'PENALTY',1,NULL,'C');
$traf_conviv=0;
if($driver['prv_traffic_conviv_no'] > 0):

	$traf_conviv_date	=unserialize($driver['traf_conviv_date']);
	$traf_conviv_loc	=unserialize($driver['traf_conviv_loc']);
	$traf_conviv_chrg	=unserialize($driver['traf_conviv_chrg']);
	$traf_conviv_pen	=unserialize($driver['traf_conviv_pen']);
	for(;$traf_conviv < $driver['prv_traffic_conviv_no'];$traf_conviv++):
		$pdf->ln();
		$pdf->Cell(81,6,$traf_conviv_loc[$traf_conviv],1,0,'C');
		$pdf->Cell(27,6,$traf_conviv_date[$traf_conviv],1,0,'C');
		$pdf->Cell(37,6,$traf_conviv_chrg[$traf_conviv],1,0,'C');
		$pdf->Cell(45,6,$traf_conviv_pen[$traf_conviv],1,0,'C');
	endfor;
endif;

for(;$traf_conviv < 3;$traf_conviv++):
		$pdf->ln();
		$pdf->Cell(81,6,'',1);
		$pdf->Cell(27,6,'',1);
		$pdf->Cell(37,6,'',1);
		$pdf->Cell(45,6,'',1);
endfor;

$pdf->ln();
$pdf->SetFont('','',7.5);
$pdf->Cell(190,4,'(ATTACH SHEET IF MORE SPACE IS NEEDED)',0,0,'C');
$pdf->ln();
$pdf->SetFont('','B',9);
$pdf->Cell(190,4,'EXPERIENCE AND QUALIFICATIONS - DRIVER',0,0,'C');
$pdf->ln();
$pdf->SetFont('','',7);
$pdf->Cell(190,4,'List all driver licenses or permits held in the past 3 years');

$pdf->ln();
$c_x = $pdf->GetX();
$c_y = $pdf->GetY();
$pdf->SetFont('','B',9);
$pdf->MultiCell(20,7,"\n  DRIVER \n LICENSES \n ",1,'C');

$pdf->SetFont('','',9);
$pdf->SetXY($c_x+20,$c_y);
$pdf->Cell(28,7,'STATE',1,0,'C');
$pdf->Cell(74,7,'LICENSE NO.',1,0,'C');
$pdf->Cell(28,7,'TYPE',1,0,'C');
$pdf->Cell(40,7,'EXPIRATION DATE',1,0,'C');

$pdf->ln();
$pdf->SetXY($c_x+20,$c_y +7);
$pdf->Cell(28,7,$driver['emp_license_state'],1,0,'C');
$pdf->Cell(74,7,$driver['emp_license_no'],1,0,'C');
$pdf->Cell(28,7,$driver['emp_license_class'],1,0,'C');
$pdf->Cell(40,7,$driver['emp_license_exp_date'],1,0,'C');

$pdf->ln();
$pdf->SetXY($c_x+20,$c_y +14);
$pdf->Cell(28,7,$driver[''],1,0,'C');
$pdf->Cell(74,7,$driver[''],1,0,'C');
$pdf->Cell(28,7,$driver[''],1,0,'C');
$pdf->Cell(40,7,$driver[''],1,0,'C');

$pdf->ln();
$pdf->SetXY($c_x+20,$c_y +21);
$pdf->Cell(28,7,$driver[''],1,0,'C');
$pdf->Cell(74,7,$driver[''],1,0,'C');
$pdf->Cell(28,7,$driver[''],1,0,'C');
$pdf->Cell(40,7,$driver[''],1,0,'C');

$pdf->ln();
$pdf->SetFont('','',8);
$arr = [
            ['A.','Have you ever been denied a license, permit or privilege to operate a motor vehicle?','',$driver['emp_den_license'],'',''],
            ['B.','Has any lincese, permit or privilege ever been suspended or revoked?','',$driver['emp_license_per'],'',''],
];


$set=[7,128,9,19,8,19];
$pdf->ArrInCenter($arr,$set,[3],[],0.1,NULL,5,[3]);



$str= 'IF THE ANSWER TO EITHER A OR B YES, GIVE DETAILS  :'.$driver['emp_exp_us_commercial'];

$pdf->MultiCell(183,7,$str,'B');

$arr=[
        ['DRIVING EXPERIENCE',' CHECK YES OR NO'],
];
$set=[30.5,100];
$pdf->ArrInCenter($arr,$set,[],[0]);

$pdf->SetFont('','B');
$pdf->Cell(73,7,'CLASS OF EQUIPMENT',1,0,'C');

$pdf->SetFont('');
$pdf->Cell(44,7,'CIRCLE TYPE OF EQUIPMENT',1,0,'C');
$c_x=$pdf->GetX();
$c_y=$pdf->GetY();
$pdf->MultiCell(35,3.5,"DATES\nFROM (M/Y)      TO(M/Y)",1,'C');
$pdf->SetXY($c_x+35,$c_y);
$pdf->MultiCell(38,3.5,"APPROX. NO. OF MILLES\n (TOTAL)",1,'C');

$pdf->SetFont('','',7);
// $pdf->Cell(73,7,'STRAIGHT TRUCK                           !!! YES  !!! NO',1);
// image_get($data,$Ypath,$Npath,$Yx,$Nx,$Yy,$Ny,$Yborder='0',$Nborder='0',$Cwidth=25,$Cheight=5,$width=3.5,$height=3.5)
// $pdf->Cell($Cwidth,$Cheight,$pdf->image(base_url($Ypath),$Yx,$Yy,$Pwidth,$Pheight).$Yes,$Yborder);
$pdf->Cell(40,7,'STRAIGHT TRUCK',"UBL");

$x = $pdf->GetX();
$y = $pdf->GetY();
$YNimage =[
	'data'		=> $status_de[0],
	'Yx'		=> $x+1,
	'Nx'		=> $x+10,
	'Yy'		=> $y+1.9,
	'Ny'		=> $y+1.9,
	'Cwidth'	=> 9,
	'Cheight'	=> 7,
	'Yborder'	=>"UB",
	'Nborder'	=>"UB",
	'Pwidth'	=>2.5,
	'Pheight'	=>2.5,
];

$pdf->image_get($YNimage);
$pdf->Cell(15,7,'',"UBR");

$six = $pdf->GetX();
$siy = $pdf->GetY();
$pdf->SetFont('','',5.5);
$pdf->Cell(8.8,7,' VAN',"UBL",0,'C');
$pdf->Cell(8.8,7,'TANK',"UB",0,'C');
$pdf->Cell(8.8,7,'FLAT',"UB",0,'C');
$pdf->Cell(8.8,7,'DUMP',"UB",0,'C');
$pdf->Cell(8.8,7,'REFER',"UBR",0,'C');
$pdf->SetFont('','',7);
	$status_de=unserialize($driver['status_de']);
	$type_de=unserialize($driver['type_de']);
	$from_de=unserialize($driver['from_de']);
	$to_de=unserialize($driver['to_de']);
	$miles_de=unserialize($driver['miles_de']);

	if($status_de[0]=='Yes'){
		$key = array_search($type_de[0], ['Van','Tank','Flat','Dump','Reefer']);
		$pdf->image(base_url('uploads/rectangularbox.png'),$six+8.8*$key,$siy+0.3,8.8,6.5);

		$from_date = explode('/', $from_de[0]);
		$to_date = explode('/', $to_de[0]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[0],1,0,'C');
	}else{
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}



$pdf->ln();
$pdf->Cell(40,7,'TRACTOR AND SEMI-TRAILER',"UBL");
$x = $pdf->GetX();
$y = $pdf->GetY();
$YNimage['data']= $status_de[1];
$YNimage['Yx']=$x+1 ;
$YNimage['Nx']=$x+10 ;
$YNimage['Yy']=$y+1.9 ;
$YNimage['Ny']=$y+1.9 ;

$pdf->image_get($YNimage);
$pdf->Cell(15,7,'',"UBR");

$six = $pdf->GetX();
$siy = $pdf->GetY();
$pdf->SetFont('','',5.5);
$pdf->Cell(8.8,7,' VAN',"UBL",0,'C');
$pdf->Cell(8.8,7,'TANK',"UB",0,'C');
$pdf->Cell(8.8,7,'FLAT',"UB",0,'C');
$pdf->Cell(8.8,7,'DUMP',"UB",0,'C');
$pdf->Cell(8.8,7,'REFER',"UBR",0,'C');
$pdf->SetFont('','',7);
	if($status_de[1]=='Yes'){
		$key = array_search($type_de[1], ['Van','Tank','Flat','Dump','Reefer']);
		$pdf->image(base_url('uploads/rectangularbox.png'),$six+8.8*$key,$siy+0.3,8.8,6.5);

		$from_date = explode('/', $from_de[1]);
		$to_date = explode('/', $to_de[1]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[1],1,0,'C');
	}else{
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}


$pdf->ln();
$pdf->Cell(40,7,'TRACTOR-TWO TRAILERS',"UBL");
$x = $pdf->GetX();
$y = $pdf->GetY();
$YNimage['data']= $status_de[2];
$YNimage['Yx']=$x+1 ;
$YNimage['Nx']=$x+10 ;
$YNimage['Yy']=$y+1.9 ;
$YNimage['Ny']=$y+1.9 ;


$pdf->image_get($YNimage);
$pdf->Cell(15,7,'',"UBR");

$six = $pdf->GetX();
$siy = $pdf->GetY();
$pdf->SetFont('','',5.5);
$pdf->Cell(8.8,7,' VAN',"UBL",0,'C');
$pdf->Cell(8.8,7,'TANK',"UB",0,'C');
$pdf->Cell(8.8,7,'FLAT',"UB",0,'C');
$pdf->Cell(8.8,7,'DUMP',"UB",0,'C');
$pdf->Cell(8.8,7,'REFER',"UBR",0,'C');
$pdf->SetFont('','',7);

	if($status_de[2]=='Yes'){
		$key = array_search($type_de[2], ['Van','Tank','Flat','Dump','Reefer']);
		$pdf->image(base_url('uploads/rectangularbox.png'),$six+8.8*$key,$siy+0.3,8.8,6.5);

		$from_date = explode('/', $from_de[2]);
		$to_date = explode('/', $to_de[2]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[2],1,0,'C');
	}else{
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}


$pdf->ln();
$pdf->Cell(40,7,'TRACTOR-THREE TRAILERS',"UBL");
$x = $pdf->GetX();
$y = $pdf->GetY();
$YNimage['data']= $status_de[3];
$YNimage['Yx']=$x+1 ;
$YNimage['Nx']=$x+10 ;
$YNimage['Yy']=$y+1.9 ;
$YNimage['Ny']=$y+1.9 ;


$pdf->image_get($YNimage);
$pdf->Cell(15,7,'',"UBR");

$six = $pdf->GetX();
$siy = $pdf->GetY();
$pdf->SetFont('','',5.5);
$pdf->Cell(8.8,7,' VAN',"UBL",0,'C');
$pdf->Cell(8.8,7,'TANK',"UB",0,'C');
$pdf->Cell(8.8,7,'FLAT',"UB",0,'C');
$pdf->Cell(8.8,7,'DUMP',"UB",0,'C');
$pdf->Cell(8.8,7,'REFER',"UBR",0,'C');
$pdf->SetFont('','',7);

	if($status_de[3]=='Yes'){
		$key = array_search($type_de[3], ['Van','Tank','Flat','Dump','Reefer']);
		$pdf->image(base_url('uploads/rectangularbox.png'),$six+8.8*$key,$siy+0.3,8.8,6.5);

		$from_date = explode('/', $from_de[3]);
		$to_date = explode('/', $to_de[3]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[3],1,0,'C');
	}else{
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}


$pdf->ln();
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Cell(40,7,'MOTORCOACH-SCHOOL BUS',"UBL");
$x2 = $pdf->GetX();
$y2 = $pdf->GetY();
$YNimage['data']= $status_de[4];
$YNimage['Yx']=$x2+1 ;
$YNimage['Nx']=$x2+10 ;
$YNimage['Yy']=$y2+1.9 ;
$YNimage['Ny']=$y2+1.9 ;


$pdf->image_get($YNimage);
$pdf->Cell(15,7,'',"UBR");
	if($status_de[4]=='Yes'){
		$pdf->Cell(44,7,$type_de[4],1,0,'C');

		$from_date = explode('/', $from_de[4]);
		$to_date = explode('/', $to_de[4]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[4],1,0,'C');
	}else{
		$pdf->Cell(44,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}


$pdf->ln();
$pdf->Cell(40,7,'MOTORCOACH-SCHOOL BUS',"UBL");
$x2 = $pdf->GetX();
$y2 = $pdf->GetY();
$YNimage['data']= $status_de[5];
$YNimage['Yx']=$x2+1 ;
$YNimage['Nx']=$x2+10 ;
$YNimage['Yy']=$y2+1.9 ;
$YNimage['Ny']=$y2+1.9 ;


$pdf->image_get($YNimage);
$pdf->Cell(15,7,'',"UBR");
	if($status_de[5]=='Yes'){
		$pdf->Cell(44,7,$type_de[5],1,0,'C');

		$from_date = explode('/', $from_de[5]);
		$to_date = explode('/', $to_de[5]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[5],1,0,'C');
	}else{
		$pdf->Cell(44,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}


$pdf->ln();
$pdf->Cell(73,7,'OTHER',1);
	if($status_de[6]=='Yes'){
		$pdf->Cell(44,7,$type_de[6],1,0,'C');

		$from_date = explode('/', $from_de[6]);
		$to_date = explode('/', $to_de[6]);
		$pdf->Cell(17.5,7,$from_date[0].' / '.$from_date[2],1,0,'C');
		$pdf->Cell(17.5,7,$to_date[0].' / '.$to_date[2],1,0,'C');
		$pdf->Cell(38,7,$miles_de[6],1,0,'C');
	}else{
		$pdf->Cell(44,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(17.5,7,'',1,0,'C');
		$pdf->Cell(38,7,'',1,0,'C');
	}



$pdf->SetFont('','',6.5);
$pdf->SetXY($x+58,$y);
$pdf->MultiCell(15,3.5,"More than 8\npassengers");

$pdf->SetXY($x+58,$y + 7);
$pdf->MultiCell(16,3.5,"More than 15\npassengers");

$pdf->ln();
$pdf->ln(5);
$pdf->SetFont('','',7);

$str='LIST STATES OPERATED IN FOR LAST FIVE YEARS :  ';
$pdf->MultiCell(190,5,$str.$driver['emp_pro_state_list'],'B');
$pdf->SetFont('');


$str='SHOW SPECIAL COURSES OR TRAINING THAT WILL HELP YOU AS A DRIVER :  ';
$pdf->MultiCell(190,5,$str.$driver['emp_spl_cor'],'B');
$pdf->SetFont('');

$str='WHICH SAFE DRIVING AWARDS DO TOU HOLD AND FROM WHOM  :   ';
$pdf->MultiCell(190,5,$str.$driver['emp_awards'],'B');
$pdf->SetFont('');

$pdf->SetFont('','B',9);
$pdf->Cell(190,6,"EXPERIENCE AND QUALIFICATION-OTHER",0,0,'C');
$pdf->SetFont('','',7);
$pdf->ln();
// $pdf->Cell(190,5,"SHOW ANY TRUCKING, TRANSPORTATION OR OTHER EXPERIENCE THAT MAY HELP IN YOUR WORK FOR THIS COMPANY");
// $pdf->ln();
$pdf->MultiCell(190,5,"SHOW ANY TRUCKING, TRANSPORTATION OR OTHER EXPERIENCE THAT MAY HELP IN YOUR WORK FOR THIS COMPANY ".$driver['emp_other_trk_exp'],'B');

$str="LIST COURSES AND TRAINING OTHER THAN SHOWN ELSEWHERE IN THIS APPILCATION :  ";
$pdf->MultiCell(190,5,$str.$driver['emp_cor_tra_list'],'B');

$str="LIST SPECIAL EQUIPMENT OR TECHNICAL MATERIALS YOU WORK WITH(OTHER THAN THOSE ALREADY SHOWN     ";

$pdf->MultiCell(190,5,$str.$driver['emp_spl_equ_list'],'B');
// $str = "<u>SHOW ANY TRUCKING, TRANSPORTATION OR OTHER EXPERIENCE THAT MAY HELP IN YOUR WORK FOR THIS COMPANY ".$driver['emp_other_trk_exp']." LIST COURSES AND TRAINING OTHER THAN SHOWN ELSEWHERE IN THIS APPILCATION : ".$driver['emp_cor_tra_list']." LIST SPECIAL EQUIPMENT OR TECHNICAL MATERIALS YOU WORK WITH(OTHER THAN THOSE ALREADY SHOWN ".$driver['emp_spl_equ_list']."</u>";
// $pdf->WriteHTML($str);
/////////////////////////////////*****************************
//$pdf->AddPage();
$pdf->SetFont('','B',10);
$pdf->Cell(190,6,"EDUCATION",0,0,'C');

$pdf->ln(5);
$pdf->SetFont('','',7);


// $pdf->Cell(190,9,"CIRCLE HIGHEST GRADE COMPLETED: 1  2  3  4  5  6  7  8                   HIGH SCHOOL: 1  2  3  4               COLLEGE: 1  2  3  4");

$pdf->Cell(55,9,"CIRCLE HIGHEST GRADE COMPLETED: ");
$highest_grade = [1,2,3,4,5,6,7,8];
for ($i=1; $i <=count($highest_grade); $i++) {
	if($driver['emp_highest_grade']==$i){
		$pdf->Cell(5,9,$i,0,0,'C');
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->image(base_url('uploads/circle2.png'),$x-4.3,$y+2.5,3.5,3.5);
		$pdf->SetXY($x,$y);
	}else{
		$pdf->Cell(5,9,$i,0,0,'C');
	}
}


$pdf->Cell(30,9,"HIGH SCHOOL: ",0,0,"R");
$highest_grade = [1,2,3,4];
for ($i=1; $i <=count($highest_grade); $i++) {
	if($driver['emp_high_school']==$i){
		$pdf->Cell(5,9,$i,0,0,'C');
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->image(base_url('uploads/circle2.png'),$x-4.3,$y+2.5,3.5,3.5);
		$pdf->SetXY($x,$y);
	}else{
		$pdf->Cell(5,9,$i,0,0,'C');
	}
}


$pdf->Cell(26,9,"COLLEGE: ",0,0,"R");
$highest_grade = [1,2,3,4];
for ($i=1; $i <=count($highest_grade); $i++) {
	if($driver['emp_college']==$i){
		$pdf->Cell(5,9,$i,0,0,'C');
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->image(base_url('uploads/circle2.png'),$x-4.3,$y+2.5,3.5,3.5);
		$pdf->SetXY($x,$y);
	}else{
		$pdf->Cell(5,9,$i,0,0,'C');
	}
}

$pdf->ln();
$arr=[
        ['LAST SCHOOL ATTENDED:',$driver['emp_last_school'],'(CITY,STATE)',$driver['emp_skl_complete_address']]
];
$set=[38,65,10,61+15];
$pdf->ArrInCenter($arr,$set,[1,2,3],[],0.1,NULL,5,[1,3]);

$pdf->ln(2);
$pdf->SetFont('','B',10);
$pdf->Cell(190,6,"TO BE READ AND SIGNED BY APPLICANT",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('','',8);
$pdf->MultiCell(189,6,"\nThis certifies that this applicantion was completed by me, and that all entries on it and information in it are true and complete to the best of my knowledge.\n\n");
$arr=[
        ['Signature:','','Date:',date('m/d/Y',strtotime($driver['created_date']))]
];
$set=[25,78,10,61+15];
$pdf->ArrInCenter($arr,$set,[1,3],[],0.1,NULL,5,[1,3]);

/////////////////////////////////////////////////////////////////page 9 end
/////////////////////////////////////////////////////////////////page 11 start

$emp_count = 0;
if($driver['prv_empl_his_no']>0){

    $employer_company_name =unserialize($driver['employer_company_name']);
    $employer_name =unserialize($driver['employer_name']);
    $employer_address =unserialize($driver['employer_address']);
    $employer_number =unserialize($driver['employer_number']);
    $employer_city =unserialize($driver['employer_city']);
    $employer_province =unserialize($driver['employer_province']);
    $emplyer_zip =unserialize($driver['emplyer_zip']);
    $position_held =unserialize($driver['position_held']);
    $position_held_other =unserialize($driver['position_held_other']);
    $salary_wage =unserialize($driver['salary_wage']);
    $employment_fron_date =unserialize($driver['employment_fron_date']);
    $employment_to_date =unserialize($driver['employment_to_date']);
    $employer_leaving_reason =unserialize($driver['employer_leaving_reason']);
    $fmcsr_status =unserialize($driver['fmcsr_status']);
    $safety_sensitive_status =unserialize($driver['safety_sensitive_status']);
    $fax_no =unserialize($driver['fax_no']);
    $is_employed =unserialize($driver['is_employed']);
    $employer_email =unserialize($driver['employer_email']);
    $totalDate = 0;
    $totalYear = 0;
    $currentTime = time();
    for(;($emp_count<$driver['prv_empl_his_no']) && ($is_employed[$emp_count]== 'Yes');$emp_count++):

      /* to get previous max 3 year history */
      $date1 = strtotime($employment_to_date[$emp_count]);

      $timeDiff = $currentTime - $date1;

      if($timeDiff > 94608000 ){
          break;
      }
      /* end previous max 3 year history */

      if($position_held[$emp_count] != 'other'){
        $pdf->AddPage();
        $pdf->SetFont('','B',14);
        $pdf->Cell(190,5,$comapnyName,0,0,'C');
        $pdf->ln(7);

        $pdf->SetFont('','',8);
        $pdf->Cell(190,1,"",'B',0,'C');
        $pdf->SetFont('','I',10);
        $pdf->ln(4);

        $pdf->Cell(190,5,"FAX COVER SHEET",0,0,'C');
        $pdf->ln(10);

        $pdf->SetFont('','',6);
        $y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->Cell(190,9,"",1,0);
        $pdf->SetXY($x+1,$y-1);
        $pdf->Cell(32,9,"RE: Pre employment check for",0,0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(156,9,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],0,0);
        $pdf->ln(10);

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"DL # ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$driver['emp_license_no'],"BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Company: ","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_company_name[$emp_count],"BR",0,"C");
        $pdf->ln();

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"To:  HR/Safety ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,"HUMAN RESOURCE / Safety","BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Attention: Safety","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_name[$emp_count],"BR",0,"C");
        $pdf->ln();

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Tel: ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_number[$emp_count],"BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Fax: ","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$fax_no[$emp_count],"BR",0,"C");
        $pdf->ln();

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Email: ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_email[$emp_count],"BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(59,7,"Pages (including cover sheet) ","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(36,7,"3","BR");
        $pdf->ln(15);



        $text = "Dear Sir/Madam <br> We are authorized to obtain the verification record for the above mentioned driver on behalf of    <b><u>".$comapnyName."</u></b>    Could you please fill out the attached forms and return by fax or email @  <b>".$company['fax']."</b> / ".$company['email'];
        $pdf->SetFont('','',8);
        $pdf->writeHTML($text);
        $pdf->ln(10);

        $pdf->SetFont('','',8);
        $text = "We will be obtaining this information to be compliant with regulations and therefore <b>expect a speedy response</b>. Safety performance history background investigations are required by part 391.23 for the Federal Motor Carrier Safety Regulations. There are three categories of information that must be requested from the previous employer which are General identification and employment information, accident information and drug/alcohol testing information. Inquiries into safety performance history must be answered by the former employer <b>within 30 days after receiving the request</b>. <b>Failure to respond within the confines of the deadline is a violation of the FMCSR</b>. The requesting party can lodge a complaint in accordance with 386.12 by calling the violation hotline (888-dot-saft) or using the website <b>www.1-800-dot-saft.com</b>. The FMCSA takes non-compliance with 391.23 by a former DOT regulated employer very seriously. ";
        $pdf->writeHTML($text);

        $pdf->ln(8);
        $pdf->SetFont('','IB',9);
        $pdf->Cell(190,7,"\"We thank you in advance for your cooperation\"",0,1,"C");
        $pdf->Cell(190,2,'',"B");
        $pdf->ln(8);

        $pdf->SetFont('','',9);
        $pdf->Cell(50,7,"For office use only :");
        $pdf->ln(8);

        $pdf->Cell(47.5,7,'',1);
        $pdf->Cell(47.5,7,'Date','TBR',0,"C");
        $pdf->Cell(47.5,7,'By Phone','TBR',0,"C");
        $pdf->Cell(47.5,7,'By Fax','TBR',1,"C");

        $pdf->Cell(47.5,7,'First Request',1,0,"C");
        $pdf->Cell(47.5,7,'','TBR');
        $pdf->Cell(47.5,7,'','TBR');
        $pdf->Cell(47.5,7,'','TBR',1);

        $pdf->Cell(47.5,7,'Second Request',1,0,"C");
        $pdf->Cell(47.5,7,'','TBR');
        $pdf->Cell(47.5,7,'','TBR');
        $pdf->Cell(47.5,7,'','TBR',1);

        $pdf->Cell(47.5,7,'Third Request',1,0,"C");
        $pdf->Cell(47.5,7,'','TBR');
        $pdf->Cell(47.5,7,'','TBR');
        $pdf->Cell(47.5,7,'','TBR',1);

        $pdf->Cell(47.5,7,'Comments',1,0,"C");
        $pdf->Cell(47.5*3,7,'','TBR',1);






        /////////////////////////////////////////////////////////////////page 11 end









        $pdf->AddPage();

        $pdf->SetFont('','B',10);
        $pdf->Cell(190,5,"SAFETY PREFORMANCE HISTORY RECORDS REQUEST",0,0,'C');
        $pdf->ln();
        $y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->Cell(30,4,"PART 1:",1);
        $pdf->Cell(160,4,"TO BE COMPLETED BY PROSPECTIVE EMPLOYEE",1,0,'C');
        $pdf->ln();
        $pdf->Cell(190,95,'',1);

        $pdf->SetXY($x,$y+7);
        $pdf->SetFont('','',8.5);
        $arr =[
                ['I (Print Name)',$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'',$driver['sin_no']]
        ];

        $set=[26,91,2,65];
        $pdf->ArrInCenter($arr,$set,[1,3],[],0.1,4,4);
        $arr =[
                ['First','M.L.','Last','Social Security Number']
        ];

        $pdf->SetFont('','',7.3);
        $set=[32,32,44,60];
        $pdf->ArrInCenter($arr,$set,[],[],32,3,3);
        $pdf->ln(1);
        $arr=[
                ['Hereby authorize:',$driver['dob']]
            ];
        $pdf->SetFont('','',8.5);
        $set=[140,39];
        $pdf->ArrInCenter($arr,$set,[1],[],0.1,3,3,[1]);

        $arr =[
                ['Date of Birth']
        ];

        $pdf->SetFont('','',7.3);
        $set=[40];
        $pdf->ArrInCenter($arr,$set,[],[],150,3,3);


        $arr=[
                ['Previous Employer:','','Email:',''],
                ['Street','','Telephone:',''],
                ['City,State,Zip:','','Fax No:','']
            ];
        $pdf->SetFont('','',8.5);
        $set=[27,98,17,42];
        $pdf->ArrInCenter($arr,$set,[1,3],[],0.1,4.5,4.5);

        $pdf->Cell(190,5,"To release and forward the information requested by section 3 of this document concerning my Alcohol and Controlled Substances Testing");
        $pdf->ln(4);
        $pdf->Cell(60,4,"Records Within the previous 3 years from ");
        $pdf->Cell(50,4,"",'B');

        $pdf->ln(4);
        $pdf->SetFont('','',7);
        $pdf->Cell(70);
        $pdf->Cell(46,4,'(emplyment application date)');



        $arr = [
                ['To','Prospective Employment:',$comapnyName]
        ];
        $pdf->SetFont('','',10);
        $pdf->ln();
        $set=[30,43,111];
        $pdf->ArrInCenter($arr,$set,[2],[2],0.1,2,3,[2]);

        $arr = [
                ['','Attention :','Safety & Compliance',' Telephone: ',$companyPhone]
        ];
        $pdf->SetFont('','',10);
        $pdf->ln();
        $set=[30,43,54,21,36];
        $pdf->ArrInCenter($arr,$set,[2,4],[2,4],0.1,2,3,[2,4]);

        $arr = [
                ['','Street :',$companyAddress],
                ['','City,State,Zip:',$companyCity.', '.$companyState.', '.$companyZip]
        ];
        $pdf->SetFont('','',10);
        $pdf->ln();
        $set=[30,43,54+21+36];
        $pdf->ArrInCenter($arr,$set,[2],[2],0.1,5,4,[2]);
        $pdf->SetFont('');
        $pdf->MultiCell(180,4,"In compliance with S40.25(g) and 391.23(h), release of this information must be made in a written form that ensures confidentiality, such as fax email, or letter.");

        $pdf->Cell(63,4,"Prospective emplyer's fax number:");
        $pdf->SetFont('','B');
        $pdf->Cell(60,4,$fax_no[$emp_count],'B',0,'C');

        $pdf->SetFont('','');
        $pdf->ln();
        $pdf->Cell(63,5,"Prospective Employer's email address:");
        $pdf->SetFont('','B');
        $pdf->Cell(60,5,$employer_email[$emp_count],'B',0,'C');

        $pdf->ln();
        $arr= [
                ['','',date('m/d/Y',strtotime($driver['created_date']))]
        ];
        $set=[100,5,70];
        $pdf->ArrInCenter($arr,$set,[0,2],[],5,5,5,[0,2]);

        //$pdf->ln(0);
        $pdf->SetFont('','',9);
        $arr= [
                ['Applicant\'s Signature','Date']
        ];
        $set=[110,20];
        $pdf->ArrInCenter($arr,$set,[],[],35,5,5);
        $pdf->Cell(150,4,'This information is being required in compliance with S40.25(g) and 3.23');

        $pdf->ln();
        $pdf->ln();
        $pdf->ln();
        $y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->SetFont('','B',11);
        $pdf->Cell(30,4,"PART 2:",1);
        $pdf->Cell(160,4,"TO BE COMPLETED BY PROSPECTIVE EMPLOYEE",1,0,'C');
        $pdf->ln();
        $pdf->Cell(190,150,'',1);
        $pdf->SetXY($x,$y+5);

        $pdf->Cell(190,4,'ACCIDENT HISTORY',0,0,'C');
        $pdf->SetFont('','',8.5);
        $pdf->ln();
        $pdf->Cell(76,4,'The applicant named above was employed by us. YES');
        $pdf->Cell(7,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(9,4,' NO');
        $pdf->Cell(15,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->ln(7);
        $arr = [
                    ['Employed as ','',' from (m/y) ','','to(m/y)','']
        ];
        $set=[20,50,15,42,15,42];
        $pdf->ArrInCenter($arr,$set,[1,3,5],[],0.1,5.6);

        $y=$pdf->GetY();
        $x=$pdf->GetX();

        $pdf->Cell(66,5,"1. Did he/she drive motor vehicle for you?   Yes");
        $pdf->Cell(7,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(9,4,' NO');
        $pdf->Cell(7,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(48,5," if yes, what type? Straight Truck ");
        $pdf->Cell(7,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));

        $pdf->SetXY($x+65,$y+4);
        $pdf->Cell(119,5,"",'B');
        $pdf->ln(7);
        // $pdf->MultiCell(185,5,"2. Reason for leaving your employ: Discharged !!!   Registration !!!   Lay Off !!!   Military Duty !!!   If there is no safety performance history to report, check here !!!,  sign below and return.");

        $pdf->Cell(66,5,"2. Reason for leaving your employ: Discharged");
        $pdf->Cell(7,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(18,4,'Registration');
        $pdf->Cell(5,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(11,4,'Lay Off');
        $pdf->Cell(5,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(18,4,'Military Duty');
        $pdf->Cell(5,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(48,5," if yes, what type? Straight Truck ");
        $pdf->ln();
        $pdf->Cell(40,5," history to report, check here");
        $pdf->Cell(5,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(55,5,"  sign below and return.");

        $pdf->ln();
        $pdf->SetFont('','B');
        $pdf->Cell(20,5,"ACCIDENTS: ");
        $pdf->SetFont('');
        $pdf->Cell(165,5,"Complete the following for any accident included on your accident register (S390.15(b)) that involved the applicant in the"); //"here if there is no accident register data for this driver.");
        $pdf->ln();
        $pdf->Cell(20,5);
        $pdf->Cell(80,5," 3 year prior to the application date shown above, or check ");
        $pdf->Cell(4,5,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(60,5,"here if there is no accident register data for this driver.");

        $pdf->ln();
        $arr=[
                ['   ','Date','','Location','','#Injuries','','#Fatallties','','Hazmat Spill']
        ];


        $set=[20,30,2,30,2,30,2,25,2,30];
        $pdf->ArrInCenter($arr,$set,[],[],0.1);

        $arr=[
                ['1. ','','','','','','','','',''],
                ['2. ','','','','','','','','',''],
                ['3. ','','','','','','','','',''],
        ];


        $set=[10,30,2,30,2,30,2,30,2,30];
        $pdf->ArrInCenter($arr,$set,[1,3,5,7,9],[],0.1);


        $y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->MultiCell(185,5,"Please provide information concerning any other accidents involving the application that were reported to government agencies or insurers or relained under internal company policies:");
        $pdf->SetXY($x+73,$y+4);
        $pdf->Cell(110,5,"",'B');
        $pdf->ln();

        $arr=[
                [''],
                [''],
        ];
        $set =  [181];
        // $pdf->SetFont('','',);
        $pdf->ArrInCenter($arr,$set,[0],[],2,6,6);
        $pdf->ln(3);
        $pdf->Cell(50,5,"Any other remarks:");

        $pdf->ln(3);

        $arr=[
                [''],
                [''],
                [''],
        ];
        $set =  [181];
        // $pdf->SetFont('','',);
        $pdf->ArrInCenter($arr,$set,[0],[],2,6,6);

        $pdf->ln();
        $pdf->ln();

        $arr = [
                    ['','Signature','']
        ];

        $set=[70,15,92];
        $pdf->ArrInCenter($arr,$set,[2]);
        $pdf->ln();
        $arr = [
                    ['','Title:','','Date:','']
        ];

        $set=[70,10,53,10,34];
        $pdf->ArrInCenter($arr,$set,[2,4]);


        /////////////////////////////////////////////////////////////////page 10 end
        /////////////////////////////////////////////////////////////////page 11 start




        $pdf->AddPage();

        $pdf->SetFont('');
        $pdf->Cell(2);
        $pdf->Cell(20,6,"Name");
        $pdf->Cell(150,6,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'B');

        $pdf->SetFont('','',10);
        $pdf->ln(8);
        $pdf->Cell(2);
        $pdf->Cell(140,5,"(1) Was the applicant subject to drug and alcohol testing under DOT regulations? ","TBL");

        $pdf->Cell(9,5,' Yes',"TB");
        $pdf->Cell(7,5,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"),"TB");
        $pdf->Cell(9,5,' NO',"TB");
        $pdf->Cell(7+13,5,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"),"TBR");

        $pdf->ln();
        $pdf->Cell(2);
        $pdf->Cell(185,5,"(2) For pre-employment testing exemption under 49 CFR 382.301:");

        $pdf->ln();
        $pdf->Cell(2);
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->Cell(185,22,'',1);
        $pdf->SetXY($x,$y+1);
        $pdf->Cell(85,5,"Date employee enrolled in program");
        $pdf->Cell(40,5,"",'B');
        $pdf->Cell(30,5,"(mm/dd/yy).");

        $pdf->ln();
        $pdf->Cell(2);
        $pdf->Cell(85,5,"Employee's ending date of participation to program");
        $pdf->Cell(40,5,"",'B');
        $pdf->Cell(30,5,"(mm/dd/yy).");

        $pdf->ln();
        $pdf->Cell(2);
        $pdf->Cell(85,5,"Program complies with DOT requirements?");
        $pdf->Cell(3,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(10,5,' Yes');
        $pdf->Cell(3,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(10,5,' NO');


        $pdf->ln();
        $pdf->Cell(2);
        $pdf->Cell(85,5,"Date of Last drug test");
        $pdf->Cell(40,5,"",'B');
        $pdf->Cell(30,5,"(mm/dd/yy).");

        $pdf->ln(6);
        $pdf->Cell(2);
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->Cell(185,32,'',1);
        $pdf->SetXY($x,$y+1);
        $pdf->SetFont('','B');
        $pdf->Cell(180,5,"DRUG & ALCOHOL TEST.RESULTS or any other violation of 49 CFR 382 Subpart B (last 6 months).");
        $pdf->SetFont('');

        $pdf->ln();




        $count =0;
        $emp_drug_test_date      = unserialize($driver['emp_drug_test_date']);
        $emp_drug_test_type      = unserialize($driver['emp_drug_test_type']);
        $emp_drug_test_status_yn = unserialize($driver['emp_drug_test_status_yn']);

        for($count=0;$count<$driver['emp_drug_test_his_no'];$count++):
            $image = getImage($emp_drug_test_status_yn[$count]);
        $pdf->Cell(2,5);
        $pdf->Cell(10,5,'Date');
        $pdf->Cell(33,5,$emp_drug_test_date[$count],'B',0,'C');
        $pdf->Cell(25,5,'Type of Test');
        $pdf->Cell(60,5,$emp_drug_test_type[$count],'B',0,'C');
        $pdf->Cell(8,5);
        $pdf->Cell(3,4,$pdf->WriteHTML("<img src='".base_url($image[0])."' width='9px' height='9px'>"));
        $pdf->Cell(20,5,' Positive');
        $pdf->Cell(3,4,$pdf->WriteHTML("<img src='".base_url($image[1])."' width='9px' height='9px'>"));
        $pdf->Cell(20,5,' Negative');
        $pdf->ln();
        endfor;

        for(;$count<3;$count++):

        $pdf->Cell(2,5);
        $pdf->Cell(10,5,'Date');
        $pdf->Cell(33,5,'','B');
        $pdf->Cell(25,5,'Type of Test');
        $pdf->Cell(60,5,'','B');
        $pdf->Cell(8,5);
        $pdf->Cell(3,4,$pdf->WriteHTML("<img src='".base_url('uploads/uncheckedbox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(20,5,' Positive');
        $pdf->Cell(3,4,$pdf->WriteHTML("<img src='".base_url('uploads/uncheckedbox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(20,5,' Negative');
        $pdf->ln();
        endfor;







        $pdf->ln(3);
        $pdf->Cell(2);
        $pdf->Cell(25,5,"Comments:");
        $pdf->Cell(155,5,"",'B');

        $pdf->ln(9);
        $pdf->Cell(2);
        $pdf->Cell(170,5,"(3 For verification of driver's participation in a compliant testing program under 49 CFR 382.413 & 40.25)");
        $pdf->ln();
        $pdf->Cell(2);
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->Cell(185,111,'',1);
        $pdf->SetXY($x,$y+1);
        $pdf->SetFont('','B');
        $pdf->Cell(50,5,"TESTING HISTORY");

        $pdf->ln();
        $pdf->Cell(2);
        $pdf->SetFont('');
        $pdf->MultiCell(180,5,"1. Has this person ever tested positive, as verified by an MRO, for controlled substance test in the last 3 years?                                                                                                                              Yes                NO");

        $pdf->Cell(2);
        $pdf->MultiCell(180,5,"2. Has this person ever has an alcohol tes with a Breath Alcohol Concentration of 0.04 or greater in the last 3 years?                                                                                                              Yes                NO");

        $pdf->Cell(2);
        $pdf->MultiCell(180,5,"3. Has this person ever ref used a DOT required test for drugs or alcohol in the last 3 years(including verified adulterated or substituted drug test results)?                                                   Yes                NO");

        $pdf->Cell(2);
        $pdf->MultiCell(180,5,"4. Do you have knowledge of any other violation by this driver, under 49 CFR Subject B or of any other DOT agency drug and alcohol testing regulation within the last 3 years(including all information you received from a previous employer)?                                                                                         Yes                NO");

        $pdf->Cell(2);
        $pdf->MultiCell(180,5,"5. If YES to any of the above, did the person comply with referral and rehabilitation requirements of the Substance Abuse Professional:?");

        $arr= [

            ['a) Was the person referred to a SAP?','YES       NO'],
            ['       If employment with your company continued:',''],
            ['b) Was the Person evaluated by the SAP?','YES       NO'],
            ['c) If Yes, did the SAP recommend treatment and/or education?','YES       NO'],
            ['d) Did the person complete the treatment and/or education as determined by the SAP?','YES       NO'],
            ['e) Did the person undergo a return-to-duty test?','YES       NO'],
            ['f) If yes, was the return-to-duty test negative?','YES       NO'],
            ['g) Did the SAP recommend follow-up testing?','YES       NO'],
            ['h) Did the person complete the follow-up testing?','YES       NO'],

        ];


        $set=[140,40];
        $pdf->ArrInCenter($arr,$set,[],[],9);
        $pdf->Cell(1);
        $pdf->Cell(151.5,4,"*If applicable, please submit copy of documentation of completion of return-to-duty and follow-up");
        $pdf->Cell(25,4,"testing records.",'B');
        $pdf->ln(5);
        $pdf->Cell(4);
        $pdf->Cell(150,5,'I confirm that the above information is accurate.');

        $pdf->ln(20);
        $arr = [
                    ['','','']
        ];
        $set = [60,30,60];
        $pdf->ArrInCenter($arr,$set,[0,2],[],5);

        $arr = [
                    ['Name of Company Rep(Print)','','Company']
        ];
        $set = [60,30,60];
        $pdf->ArrInCenter($arr,$set,[],[],5);


        $pdf->ln(10);
        $arr = [
                    ['','','']
        ];
        $set = [60,30,60];
        $pdf->ArrInCenter($arr,$set,[0,2],[],5);

        $arr = [
                    ['Signature','','Date']
        ];
        $set = [60,30,60];
        $pdf->ArrInCenter($arr,$set,[],[],5);
      }else{
        $pdf->AddPage();
        $pdf->SetFont('','B',14);
        $pdf->Cell(190,5,$comapnyName,0,0,'C');
        $pdf->ln();
        $pdf->Cell(190,5,$companyCity.', '.$companyState.', '.$companyZip,0,0,'C');
        $pdf->ln(7);

        $pdf->SetFont('','',8);
        $pdf->Cell(190,1,"",'B',0,'C');
        $pdf->SetFont('','I',10);
        $pdf->ln(8);


        $pdf->SetFont('','',6);
        $y=$pdf->GetY();
        $x=$pdf->GetX();
        $pdf->Cell(190,9,"",1,0);
        $pdf->SetXY($x+1,$y-1);
        $pdf->Cell(32,9,"Applicant Name:  ",0,0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(156,9,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],0,0);
        $pdf->ln(10);

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Date: ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$driver['emp_license_no'],"BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Position Applied for: ","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_company_name[$emp_count],"BR",0,"C");
        $pdf->ln();

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Reference Checked by: ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,"HUMAN RESOURCE / Safety","BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Previous Employer: ","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_name[$emp_count],"BR",0,"C");
        $pdf->ln();

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Contact Person:  ","BL",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$employer_number[$emp_count],"BR",0,"C");

        $pdf->SetFont('','',8);
        $pdf->Cell(25,7,"Contact Phone: ","B",0);
        $pdf->SetFont('','B',8);
        $pdf->Cell(70,7,$fax_no[$emp_count],"BR",0,"C");
        $pdf->ln(5);
        $pdf->ln(10);

        $pdf->SetFont('','',8);
        $pdf->Cell(85,4,'Was the applicant an employee of your company?                YES');
        $pdf->Cell(7,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->Cell(9,4,' NO');
        $pdf->Cell(15,4,$pdf->WriteHTML("<img src='".base_url('uploads/emptybox.png')."' width='9px' height='9px'>"));
        $pdf->ln(7); //Why did the applicant leave?

        $pdf->Cell(85,4,'What were the applicant\'s dates of employment?');
        $pdf->ln();
        $pdf->SetFont('','B',8);
        $pdf->Cell(30,4,'Start Date: ');
        $pdf->SetFont('','',8);
        $pdf->Cell(65,4,'1/25/2018');

        $pdf->SetFont('','B',8);
        $pdf->Cell(30,4,'End Date: ');
        $pdf->SetFont('','',8);
        $pdf->Cell(65,4,'1/25/2018');

        $pdf->ln(7);
        $pdf->Cell(40,4,'Why did the applicant leave? ');
        $pdf->Cell(150,4,"",'B',0,'C');
        $pdf->ln(7);
        $pdf->Cell(190,4,"",'B',0,'C');

        $pdf->ln(9);
        $pdf->Cell(73,4,'What was the applicant\'s position and responsibilities? ');
        $pdf->Cell(117,4,"",'B',0,'C');
        $pdf->ln(7);
        $pdf->Cell(190,4,"",'B',0,'C');

        $pdf->ln(9);
        $pdf->Cell(63,4,'What were the applicant\'s job responsibilities? ');
        $pdf->Cell(127,4,"",'B',0,'C');
        $pdf->ln(7);
        $pdf->Cell(190,4,"",'B',0,'C');

        $pdf->ln(9);
        $pdf->Cell(67,4,'How would you rate the applicant\'s performance? ');
        $pdf->Cell(123,4,"",'B',0,'C');
        $pdf->ln(7);
        $pdf->Cell(190,4,"",'B',0,'C');

        $pdf->ln(9);
        $pdf->Cell(66,4,'Did the applicant have any performance issues? ');
        $pdf->Cell(124,4,"",'B',0,'C');
        $pdf->ln(7);
        $pdf->Cell(190,4,"",'B',0,'C');

      }  // end of else
    endfor;
}// end of if


/////////////////////////////////////////////////////////////////page 11 end
/////////////////////////////////////////////////////////////////page 12 Start



 $pdf->AddPage();
 $pdf->SetFont('','B',12);
 $pdf->Cell(190,5,'Motor Vehicle Driver\'s',0,0,'C');
 $pdf->ln(8);
 $pdf->Cell(190,5,"CERTIFICATION OF COMPLIANCE",0,0,'C');
 $pdf->ln();
 $pdf->Cell(190,5,"WITH DRIVER LICENSE REQUIREMENTS",0,0,'C');

 $pdf->ln(11);
  $pdf->SetFont('','',10);
 $pdf->MultiCell(188,5,"MOTOR CARRIER INSTRUCTIONS: The requirements in Part 383 apply to every driver who operates in intrastate, interstate, or foreign commerce and operates a vehicle weighing 26,001 pounds or more, can transport more than 15 people, or transports hazardous materials that require placarding.");

 $pdf->ln();
 $pdf->MultiCell(188,5,"The requirements in Part 391 apply to every driver who operates in interstate commerce and operates a vehicle weighing 10,001 pounds or more, can transport more than 15 people. or transports hazardous materials that require placarding.");

 $pdf->ln();
 $pdf->ln();
 $pdf->MultiCell(188,5,"DRIVER REQUIREMENTS: Parts 383 and 391 of the Federal Motor Carrier Safety Regulations contain some requirements that you as a driver must comply with. They are as follows:");

 $pdf->ln(8);
 $pdf->SetFont('','B');
 $pdf->Cell(30);
 $pdf->Cell(60,5,"1) POSSESS ONLY ONE LICENSE:");
 $pdf->SetFont('');
 $pdf->Cell(80,5,"You, as a commercial vehicle driver, may not");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"possess more than one motor vehicle operator's license.");

 $pdf->ln(8);
 $pdf->SetFont('','B');
 $pdf->Cell(30);
 $pdf->Cell(160,5,"2) NOTIFICATION OF LICENSE SUSPENSION, REVOCATION OR CANCELLATION:");
 $pdf->SetFont('');
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"Sections 391 .15(b)(2) and 383.33 oi the Federal Motor Carrier Saiety Regulations");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"require that you notify your employer the NEXT BUSINESS DAY of any revocation");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"or suspension of your driver's license. In addition, Section 383.31 requires that");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"any time you violate a state or local trafic law (other than parking), you must");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"report it within 30 days to: 1) your employing motor carrier, and 2) the state that");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"issued your license (If the violation occurs in a state other than the one which");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"issued your license). The notification to both the employer and state must be in");
 $pdf->ln();
 $pdf->Cell(30);
 $pdf->Cell(140,5,"writing.");

 $pdf->ln(10);

 $pdf->Cell(188,5,"The following license is the only one I possess:");
 $pdf->ln(10);
 $pdf->Cell(40,5,'Driver\' Name (Printed):');
 $pdf->Cell(148,5,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],"B",0,"C");
 $pdf->ln(12);
 $pdf->Cell(33,5,'Driver\'s License No.');
 $pdf->Cell(55,5,$driver['emp_license_no'],'B',0,"C");
 $pdf->Cell(12,5,' State');
 $pdf->Cell(25,5,getstate($driver['current_province']),'B',0,"C");
 $pdf->Cell(20,5,' Exp.Date');
 $pdf->Cell(44,5,$driver['emp_license_exp_date'],'B',0,"C");
 $pdf->ln(12);
 $pdf->Cell(42,5,'DRIVER CERTIFICATION:');
 $pdf->Cell(140,5,' I certify that I have read and understood the above requirements.');

 $pdf->ln(15);
 $pdf->Cell(33,5,'Driver\'s Signature:');
 $pdf->Cell(80,5,'','B');
 $pdf->Cell(15,5,' Date:');
 $pdf->Cell(60,5,date('m/d/Y',strtotime($driver['created_date'])),'B',0,'C');
 $pdf->ln(8);

 $pdf->ln(10);
 $pdf->Cell(15,5,'Notes:');
 $pdf->Cell(173,5,'',"B");
 $pdf->ln(12);

 $pdf->ln(10);
 $pdf->SetFont('','',8);
 $pdf->Cell(120,5,"(This form is not required for DOT compliance)");


/////////////////////////////////////////////////////////////////page 12 end


//////////////////////////////////////////////////////////////// page 13 start


 $pdf->AddPage();
 $pdf->SetFont('','B',12);
 $pdf->Cell(190,5,'DRIVER STATEMENT OF ON-DUTY HOURS',0,0,'C');
 $pdf->ln();
 $pdf->Cell(190,5,'(For Newly Hired Drivers)',0,0,'C');
 $pdf->ln(15);
 $pdf->SetFont('','',10);

$pdf->MultiCell(188,5,"INSTRUCTIONS: Motor carriers when using a driver for the first time shall obtain from the driver a signed statement giving the total time on duty during the immediately preceding 7 days and time at which such driver was last relieved from duty prior to beginning work for such carrier. Rule 395.80)(2) Federal Motor Carrier Safety Regulations. NOTE: Hours for any compensated work during the preceding 7 days, including work for a non-motor carrier entity, must be recorded on this form.");


$pdf->ln(8);
$pdf->Cell(31,5,'Driver Name(Print)');
$pdf->Cell(157,5,$driver['first_name'].' '.$driver['middle_name'].' '.$driver['last_name'],"B",0,'C');

$pdf->ln(8);
$pdf->Cell(40,5,'Social Security Number');
$pdf->Cell(148,5,$driver['sin_no'],"B",0,'C');

$pdf->ln(8);
$arr = [
        ['Driver\'s License:State',getstate($driver['emp_license_state']),'Number',$driver['emp_license_no'],'Class',$driver['emp_license_class'],'Endorsement(s)',$driver['emp_license_endrosments'],'Restriction(s)',$driver['emp_license_restrictions']]
];

$set =[35,15,13,40,10,11,25,8,21,10];
$pdf->ArrInCenter($arr,$set,[1,3,5,7,9],[],0.01,NULL,5,[1,3,5,7,9]);

$pdf->ln(3);
$arr = [
        ['Type of license','','Issuing State',getstate($driver['emp_license_state'])]
];

$set =[28,70,25,65];
$pdf->ArrInCenter($arr,$set,[1,3],[],0.01,NULL,5,[1,3]);

$pdf->ln(5);

$pdf->SetFont('','',6);
$arr = [
            ['DAY','1','2','3','4','5','6','7','8','9','10','11','12','13','14'],
];
$set=[20,12,12,12,12,12,12,12,12,12,12,12,12,12,12];
$pdf->ArrInCenter2($arr,$set,[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14],[],0.001,10,10);


$getdate = unserialize($driver['work_date']);
for($i=0;$i<count($getdate);$i++){
    $explodeD = explode('-', $getdate[$i]);
    $date[] = rtrim($explodeD[0].'/'.$explodeD[1],'/');
}

$hours = unserialize($driver['hours_worked']);

$arr = [
            ['DATE',$date[0],$date[1],$date[2],$date[3],$date[4],$date[5],$date[6],$date[7],$date[8],$date[9],$date[10],$date[11],$date[12],$date[13]],
            ['HOURS WORKED',$hours[0],$hours[1],$hours[2],$hours[3],$hours[4],$hours[5],$hours[6],$hours[7],$hours[8],$hours[9],$hours[10],$hours[11],$hours[12],$hours[13]],
];
$set=[20,12,12,12,12,12,12,12,12,12,12,12,12,12,12];
$pdf->ArrInCenter2($arr,$set,[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14],[],0.001,10,10);
$pdf->SetFont('','',10);
$total_hours = $hours[0]+$hours[1]+$hours[2]+$hours[3]+$hours[4]+$hours[5]+$hours[6]+$hours[7]+$hours[8]+$hours[9]+$hours[10]+$hours[11]+$hours[12]+$hours[13];
// $x =$pdf->GetX();
// $y =$pdf->GetY();

//$pdf->SetXY($x+30+10+10+10+10+10+10+10+10+10+10+10+10+10+10,$y-10);

$pdf->MultiCell(20+12,10,"Total Hours ".$total_hours,1,'C');

$pdf->ln(3);
$pdf->Cell(30);
$pdf->MultiCell(110,5,"I hereby certify that the information given above is correct to the best of my knowledge and belief, and that I was last relieved from work at");

$pdf->SetFont('','',8);
$pdf->Cell(65);
$pdf->Cell(50,3,'A.M');
$pdf->ln();
$arr = [
            ['','P.M      On','']
];
$set = [60,20,60];
$pdf->ArrInCenter($arr,$set,[0,2],[],5,3,3);

$arr = [
            ['                            TIME','','Day              Month            Year']
];
$set = [50,39,60];
$pdf->ArrInCenter($arr,$set,[],[],5,3,3);


$pdf->ln(5);
$arr = [
            ['','','']
];
$set = [60,30,60];
$pdf->ArrInCenter($arr,$set,[0,2],[],5,3,3);

$arr = [
            ['                       Driver\'s Signature','','                                Date']
];
$set = [60,30,60];
$pdf->ArrInCenter($arr,$set,[],[],5,3,3);


$pdf->ln();
$pdf->Cell(188,1,'','B');
$pdf->ln(2);
$pdf->Cell(188,1,'','B');

$pdf->ln(3);
$pdf->SetFont('','B',12);
$pdf->Cell(190,5,'DRIVER CERTIFICATION FOR OTHER COMPENSATED WORK',0,0,'C');


$pdf->ln(8);
$pdf->SetFont('','',9);
$pdf->MultiCell(188,5,"INSTRUCTIONS: When employed by a motor carrier. a driver must report to the carrier ail on-duty time including time working for other employers. The definition of on-duty time found In Section 395.2 paragraphs (8) and (9) of the Federal Motor Carrier Safety Regulations includes time performing any other work in the capacity of, or in the employ or service of, a common, contract or private motor carrier, also performin any compensated work for any nonmotor carrier entity.");
$pdf->ln(1);
$pdf->Cell(188,4,"(Check One)                  ",0,0,'R');
$pdf->ln();



// $set = [150,5,10,5,10];
// $pdf->ArrInCenter($arr,$set);
//$driver['emp_curr_work_status'];
$image = getImage($driver['emp_curr_work_status']);
$pdf->Cell(150,5,"Are you currently working for another employer?");
$pdf->Cell(5,5,$pdf->WriteHTML("<img src='".base_url($image[0])."' width='9px' height='9px'>"));
$pdf->Cell(10,5,'Yes');
$pdf->Cell(5,5,$pdf->WriteHTML("<img src='".base_url($image[1])."' width='9px' height='9px'>"));
$pdf->Cell(10,5,'No');
$pdf->ln();

$image = getImage($driver['emp_another_emply_status']);
$pdf->Cell(150,5,"At this time do you intend to work for another employer while still employed by this company");
$pdf->Cell(5,5,$pdf->WriteHTML("<img src='".base_url($image[0])."' width='9px' height='9px'>"));
$pdf->Cell(10,5,'Yes');
$pdf->Cell(5,5,$pdf->WriteHTML("<img src='".base_url($image[1])."' width='9px' height='9px'>"));
$pdf->Cell(10,5,'No');

$pdf->ln();
$pdf->ln();
$pdf->MultiCell(188,5,"I hereby certify that the information given above is true and I understand that once I become employed with this company, if I begin working for any additional employer(s) for compensation that I must Inform this company immediately of such employment actlvlty.");

$pdf->ln(10);
$arr=[
      ['','','',date('m/d/Y',strtotime($driver['created_date']))]

];

$set=[30,65,20,50];
$pdf->ArrInCenter($arr,$set,[1,3],[],8,NULL,5,[3]);


$arr=[
      ['','Driver\'s Signature','','DATE']

];

$set=[30,65,20,50];
$pdf->ArrInCenter($arr,$set,[],[1,3],8);

$pdf->ln(10);
$arr=[
      ['',implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$driver['witnessname']])),'',date('m/d/Y',strtotime($driver['created_date']))]

];

$set=[30,65,20,50];

$pdf->ArrInCenter($arr,$set,[1,3],[],8,NULL,5,[1,3]);

$arr=[
      ['   Witness:','Company representative','','Date']

];

$set=[30,65,20,50];
$pdf->ArrInCenter($arr,$set,[],[0,1,3],8);




/////////////////////////////////////////////////////////////// page 13 end
/////////////////////////////////////////////////////////////// page 14 start



$pdf->AddPage();
$pdf->SetFont('','B',18);
$pdf->SetLineWidth(1);
$pdf->Cell(190,14,'MEDICAL DECLARATION',1,0,'C');
$pdf->ln(26);
$pdf->SetFont('','',10);
$pdf->MultiCell(190,5,'On March\'30, 1999, Transport Canada and the U.S. Federal Highway Administration (FHWA) entered into a reciprocal agreement regarding the physical requirements for a Canadian driver of a commercial vehicle in the U.S., as cmrently contained in the federal Motor Carrier Safety Regulations, Part 391.41 et seq., and vice versa. The reciprocal agreement removes the requirement for a Canadian driver to carry a copy of a medical examiners certificate indicating that the driver is physically qualified. (In effect, the existence of a valid driver\'s license issued by the Province of Ontario is deemed to be proof that a driver is physically qualified to drive in the U.S.). However, FHWA will not recognize an Ontario license if the driver has certain medical conditions, and these conditions would prohibit him ﬁom driving in the U.S.');

$pdf->ln();
$pdf->SetLineWidth(0.2);
$pdf->Cell(5);
$pdf->Cell(15,5,"1.     I,");
$pdf->Cell(95,5,$driver['first_name'].' '.$driver['middle_name']." ".$driver['last_name'],'B',0,"C");
$pdf->Cell(70,5,"certify that I am qualified to operate");
$pdf->ln();
$pdf->Cell(12);
$pdf->Cell(70,5,"a commercial motor vehicle in the United States. I further certify that:");


$pdf->ln();
$pdf->Cell(5);
$pdf->Cell(11,5,"2.     I");
$pdf->Cell(120,5,"have no clinical diagnosis of diabetes currently requiring insulin for control.");
$pdf->ln();
$pdf->Cell(5);
$pdf->Cell(11,5,"3.     I");
$pdf->Cell(120,5,"have no established medical history or clinical diagnosis of epilepsy.");

$pdf->ln();
$pdf->Cell(5);
$pdf->Cell(8,5,"4.     ");
$pdf->MultiCell(168,5,"I do not have impaired hearing. (A driver must be able to first perceive a forced whispered voice in the better ear at not less than 5 feet with or without the use of a hearing aid,or does not have an average hearing loss in the better ear greater than 40 decibels at 500Hz, 1000Hz, or 2000Hz with or without a hearing aid when tested by an audiometric device calibrated to American National Standard Z24.5 - 1951).");

$pdf->Cell(5);
$pdf->Cell(8,5,"5.     ");
$pdf->MultiCell(168,5,"I have not been issued a waiver by the Province of Ontario allowing me to operate a commercial motor vehicle pursuant to Section 20 or 21 of Ontario Regulation 340/94.");

$pdf->ln();
$pdf->Cell(5);
$pdf->MultiCell(178,5,"I further agree to immediately inform the Safety or Operations Manager should my medical status change, or if I can no longer certify conditions A to D, described above.");

$pdf->ln(30);
$arr=[
      [$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'',date('m/d/Y',strtotime($driver['created_date']))]

];

$set=[65,20,65];
$pdf->ArrInCenter($arr,$set,[0,2],[],20,NULL,5,[0,2]);


$arr=[
      ['Driver\'s Name(Printed)','','DATE']

];

$set=[65,20,65];
$pdf->ArrInCenter($arr,$set,[],[0,2],20);

$pdf->ln(15);
$arr=[
      ['','',implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$driver['witnessname']]))]

];

$set=[65,20,65];

$pdf->ArrInCenter($arr,$set,[0,2],[],20,NULL,5,[2]);

$arr=[
      ['Driver\'s Signature','','Witness']

];

$set=[65,20,65];
$pdf->ArrInCenter($arr,$set,[],[0,2],20);




/////////////////////////////////////////////////////////////// page 14 end
/////////////////////////////////////////////////////////////// page 15 start



$pdf->AddPage();

$pdf->SetFont('','B',14);
$pdf->Cell(190,5,'DRIVER REQUIREMENTS',0,0,'C');
$pdf->ln(15);

$pdf->SetFont('','',10);
$pdf->Cell(190,10,"Rules",1,0,'C');
$pdf->ln();
$pdf->MultiCell(190,5,'In order to ensure safe operation of the company\'s fleet vehicles, all drivers must be aware of and comply with all regulations governing their conduct.',1,'C');

$pdf->ln();
$pdf->SetFont('','B');
$pdf->Cell(155,10,'Licensing',1,0,'C');
$pdf->Cell(35,10,'Initials',1,0,'C');

$pdf->ln();
$pdf->SetFont('');
$pdf->Cell(155,10,'a)   I know that I must have a valid driver\'s license.',1,0);
$pdf->Cell(35,10,'',1,0,'C');

$pdf->ln();
$pdf->Cell(155,10,'b)   I agree to report all traffic violations to my employer in writing.',1,0);
$pdf->Cell(35,10,'',1,0,'C');

$pdf->ln();
$pdf->Cell(155,10,'c)   I Understand that I must not operate a vehicle while under the influence of drugs or alcohol.',1,0);
$pdf->Cell(35,10,'',1,0,'C');


$pdf->ln();
$pdf->ln(5);
$pdf->SetFont('','B');
$pdf->Cell(155,10,'Hours of Work',1,0,'C');
$pdf->Cell(35,10,'Initials',1,0,'C');

$pdf->ln();
$pdf->SetFont('');
$pdf->Cell(155,10,'a)   I Have been informed of and understand the hours of work regulations.',1,0);
$pdf->Cell(35,10,'',1,0,'C');

$pdf->ln();
$pdf->Cell(155,10,'b)   I am aware that I must arrange my work schedule to comply with these regulations.',1,0);
$pdf->Cell(35,10,'',1,0,'C');

$pdf->ln();
$pdf->Cell(155,10,'c)   I agree to submit a record of all on-duty hours accumulated while working for other operators.',1,0);
$pdf->Cell(35,10,'',1,0,'C');


$pdf->ln();
$pdf->ln(5);
$pdf->SetFont('','B');
$pdf->Cell(155,10,'Pre-trip Inspections',1,0,'C');
$pdf->Cell(35,10,'Initials',1,0,'C');

$pdf->ln();
$pdf->SetFont('');
$pdf->Cell(155,10,'a)   I am aware of the pre-trip inspection requirements and understand them.',1,0);
$pdf->Cell(35,10,'',1,0,'C');

$pdf->ln();
$pdf->ln(5);
$pdf->SetFont('','B');
$pdf->Cell(155,10,'Load Security',1,0,'C');
$pdf->Cell(35,10,'Initials',1,0,'C');

$pdf->ln();
$pdf->SetFont('');
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(155,5,"a)   I have been informed of and understand the load security regulations. \n (i.e Ensure that the load is tarped as required)",1,'C');
$pdf->SetXY($x+155,$y);
$pdf->Cell(35,10,'',1,0,'C');


$pdf->ln(30);
$arr=[
      ['','',date('m/d/Y',strtotime($driver['created_date']))]

];

$set=[65,20,50];
$pdf->ArrInCenter($arr,$set,[0,2],[],20,NULL,5,[2]);


$arr=[
      ['Driver\'s Signature','','DATE']

];

$set=[65,20,50];
$pdf->ArrInCenter($arr,$set,[],[0,2],20,NULL,5,[2]);

$pdf->ln(15);
$arr=[
      [implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$driver['witnessname']])),'',date('m/d/Y',strtotime($driver['created_date']))]

];

$set=[65,20,50];

$pdf->ArrInCenter($arr,$set,[0,2],[],20,NULL,5,[0,2]);

$arr=[
      ['Witness','','Date']

];

$set=[65,20,50];
$pdf->ArrInCenter($arr,$set,[],[0,2],20);

$pdf->ln(31);
$pdf->SetFont('');
$pdf->Cell(190,5,'Road Safety,,,It starts with you',0,0,'C');


/////////////////////////////////////////////////////////////// page 15 end
/////////////////////////////////////////////////////////////// page 16 Start



$pdf->AddPage();

$pdf->SetFont('','B',14);
$pdf->Cell(190,7,'40.25(j) Driver Pre-Employment Verification of Testong Results',1,0,'C');
$pdf->ln(10);

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(190,26,'',1);

$pdf->SetXY($x+3,$y+2);

$pdf->SetFont('','B',12);
$pdf->Cell(40,7,"Comapny Name:");

$pdf->SetFont('');
$pdf->Cell(70,7,$comapnyName);

$pdf->SetFont('','B',12);
$pdf->Cell(20,7,"TElE:");

$pdf->SetFont('');
$pdf->Cell(40,7,$companyPhone);

$pdf->ln();
$pdf->Cell(3);
$pdf->SetFont('','B',12);
$pdf->Cell(40,7,"Address:");

$pdf->SetFont('');
$pdf->Cell(70,7,$companyAddress);

$pdf->SetFont('','B',12);
$pdf->Cell(20,7,"FAX:");

$pdf->SetFont('');
$pdf->Cell(40,7,$companyFax);

$pdf->ln();
$pdf->Cell(3);
$pdf->SetFont('','B',12);
$pdf->Cell(40,7,"City, ST, ZIP");

$pdf->SetFont('');
$pdf->Cell(70,7,$companyCity.', '.$comapny['state'].', '.$companyZip);

$pdf->ln();
$pdf->ln();
$pdf->SetFont('','B',12);
$pdf->Cell(90,7,"DRIVER APPLICANT NAME:    ",'TLB',0,'C');
$pdf->SetFont('','',12);
$pdf->Cell(100,7,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'TRB',0,'C');
$pdf->ln();
$pdf->SetFont('','B',12);
$pdf->Cell(90,7,"Social Security Number:     ","TLB",0,'C');
$pdf->SetFont('','',12);
$pdf->Cell(100,7,$driver['sin_no'],"TRB",0,'C');


$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(150,8,"In the past 3 year have you:",1);
$pdf->Cell(20,8,"YES",1,0,'C');
$pdf->Cell(20,8,"NO",1,0,'C');

$pdf->ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(150,5,"Test position for any Controlled Substances Pre-emplyment \ntest for any other company?",1);
$pdf->SetXY($x+150,$y);
$pdf->Cell(20,10,'',1,0,'C');
$pdf->Cell(20,10,"",1,0,'C');

$pdf->ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(150,5,"Tested above.04 on any Alcohol pre-employment test for any other\n company?",1);
$pdf->SetXY($x+150,$y);
$pdf->Cell(20,10,'',1,0,'C');
$pdf->Cell(20,10,"",1,0,'C');

$pdf->ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(150,5,"Refused to be tested for any pre-employment test for any other \n company?",1);
$pdf->SetXY($x+150,$y);
$pdf->Cell(20,10,'',1,0,'C');
$pdf->Cell(20,10,"",1,0,'C');

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->MultiCell(190,5,"If You answer \"Yes\" to any of the above question, provide the following information on the Substance Abuse Professional (SAP) you consulted.",1);
$pdf->MultiCell(190,5,"Name of SAP:\n ",1);
$pdf->MultiCell(190,5,"Address:\n ",1);
$pdf->MultiCell(190,5,"City, ST, ZIP:\n ",1);
$pdf->MultiCell(190,5,"Tele Number:\n ",1);
$pdf->MultiCell(190,5,"Date(s) Visited:\n ",1);

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(120,20,"SIGNED:",1);
$pdf->Cell(70,20,"DATE:      ".date('m/d/Y',strtotime($driver['created_date'])),1);





/////////////////////////////////////////////////////////////// page 16 end
/////////////////////////////////////////////////////////////// page 17 Start


$pdf->AddPage();

$pdf->SetFont('','B',14);
$pdf->Cell(190,7,'CERTIFICATE OF DRIVER\'S ROAD TEST',0,0,'C');


$pdf->ln(10);
$pdf->SetFont('','',12);
$pdf->MultiCell(190,5,'Intructions: If the road test is successfully completed, the person who gave it shall complete a certificate of the driver\'s road test. The original or copy of the certificate shall be retained in the employing motor carrier\'s driver qualification file of the person examined and a copy given to the person who was examined. (49 CFR 391.31 (e) (t) (g) ');

$pdf->ln();
$pdf->ln();

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(190,162,'',1);
$pdf->SetXY($x,$y);

$pdf->SetFont('','B');
$pdf->Cell(190,7,'CERTIFICATE OF ROAD TEST',0,0,'C');
$pdf->SetFont('');

$pdf->ln();
$pdf->ln();
$pdf->Cell(30,8,'Driver\'s Name');
$pdf->Cell(155,8,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'B',0,'C');

$pdf->ln(10);
$pdf->Cell(48,8,'Social Security Number');
$pdf->Cell(137,8,$driver['sin_no'],'B',0,"C");

$pdf->ln(10);
$pdf->Cell(81,8,'Operator\'s or Chauffeur\'s License Number');
$pdf->Cell(104,8,$driver['emp_license_no'],'B',0,'C');

$pdf->ln(10);
$pdf->Cell(12,8,'State');
$pdf->Cell(173,8,getstate($driver['current_province']),'B',0,'C');

$pdf->ln(10);
$pdf->Cell(38,8,'Type of Power Unit');
$pdf->Cell(147,8,'','B');

$pdf->ln(10);
$pdf->Cell(38,8,'Type of Trailer(s)');
$pdf->Cell(147,8,'','B');


$pdf->ln(10);
$pdf->Cell(62,8,'if passenger carrier, type of bus');
$pdf->Cell(123,8,'','B');


$pdf->ln();
$pdf->ln();
$pdf->Cell(55);
$pdf->Cell(62,8,"This is to certify that the above-named driver");
$pdf->ln();
$pdf->Cell(55);
$pdf->Cell(62,8,"Was given a road test under my supervision on");
$pdf->ln();
$pdf->Cell(60);
$pdf->Cell(30,8,"",'B');
$pdf->Cell(7,8,",20");
$pdf->Cell(20,8,"",'B');
$pdf->Cell(15,8,", consisting of");

$pdf->ln();
$pdf->Cell(55);
$pdf->Cell(28.5,8,"approximately");
$pdf->Cell(30,8,"",'B');
$pdf->Cell(30,8,"miles of driving.");

$pdf->ln();
$pdf->ln();
$pdf->Cell(70);
$pdf->Cell(62,8,"It is my considered opinion that this driver",0,0,'C');

$pdf->ln();
$pdf->Cell(70);
$pdf->Cell(62,8,"possesses sufficient driving shill to operate safely the",0,0,'C');

$pdf->ln();
$pdf->Cell(70);
$pdf->Cell(62,8,"type of commercial motor vehicle listed above.",0,0,'C');



$pdf->ln(16);
$pdf->SetFont('','',9);
$pdf->MultiCell(190,10,"(Signature of Examiner)\n ",1,'C');

$pdf->MultiCell(190,10,"(Title)\n ",1,'C');

$pdf->MultiCell(190,10,"(Organization and Address of Examiner)\n ",1,'C');




/////////////////////////////////////////////////////////////// page 17 end
/////////////////////////////////////////////////////////////// page 18 start



$pdf->AddPage();

$pdf->SetFont('','B',16);
$pdf->Cell(190,8,"Advance Trucking Solution",0,0,'C');

$pdf->ln();
$pdf->SetFont('','B',11);
$pdf->Cell(190,8,'DRIVER\'S ROAD TEST EXAMINATION',0,0,'C');

$pdf->SetFont('','',12);
$pdf->ln(15);
$pdf->Cell(30,10,'Driver\'s Name','B');
$pdf->Cell(100,10,$driver['first_name'].' '.$driver['middle_name'].' '.$driver['last_name'],'B',0,"C");
$pdf->Cell(20,10,'Phone','B');
$pdf->Cell(40,10,$driver['phonenumber'],'B',0,"C");

$pdf->ln(10);
$pdf->Cell(35,10,'Driver\'s Address','B');
$pdf->Cell(155,10,$driver['current_address'],'B',0,"C");

$pdf->ln(10);
$pdf->Cell(15,10,'City','B');
$pdf->Cell(62,10,$driver['current_city'],'B',0,"C");
$pdf->Cell(15,10,'State','B');
$pdf->Cell(38,10,getstate($driver['current_province']),'B',0,"C");
$pdf->Cell(20,10,'Zip Code','B');
$pdf->Cell(40,10,$driver['current_postal_code'],'B',0,"C");

$pdf->ln(15);
$pdf->SetFont('','',10);
$pdf->MultiCell(190,5,"The road test shall be given by the motor carrier or a person designated by it. Howeva, a driver who is a motor carrier must be given the test by another person. The test shall be given by a person who is competent to evaluate and determine whether the person who takes the test has demonstrated that he or she is capable of operating the vehicle and associated equipment that the motor carrier intends to assign.");

$pdf->ln();
$pdf->MultiCell(190,5,"Rating of");
$pdf->MultiCell(190,5,"Performance: ( 1 - 10 )");

$arr =[
        ['','','The pretrip inspection. (As required by Sec. 392.7)'],

];

$set = [25,10,150];
$pdf->ArrInCenter($arr,$set,[0],[],5,8,8);


$pdf->Cell(5,8,'');
$pdf->Cell(25,8,'','B');
$pdf->Cell(10,8,'');
$pdf->Cell(150,8,'Coupling and uncoupling of combination units, if the equipment he or she may');
$pdf->ln();
$pdf->Cell(5+25+10);
$pdf->Cell(150,8,'drive includes combination units.');

$pdf->ln();
$arr =[
        ['','','Placing the equipment in operation'],
        ['','','Use of vehicle’s controls and emergency equipment'],
        ['','','Operating the vehicle  trafﬁc and while passing other vehicles'],
        ['','','Turning the vehicle'],
        ['','','Braking, and slowing the vehicle by means other than braking'],
        ['','','Backing, and parking the vehicle'],
        ['','','Observes Speeding Limits'],
        ['','','Maintain Constant speed where Possible'],

];

$set = [25,10,150];
$pdf->ArrInCenter($arr,$set,[0],[],5,8,8);

$pdf->ln();
$pdf->Cell(5,8,'');
$pdf->Cell(25,8,'','B');
$pdf->Cell(10,8,'');
$pdf->Cell(27,8,'Other, Explain:');
$pdf->Cell(123,8,'','B');
$pdf->ln();
$pdf->Cell(5,8,'');
$pdf->Cell(185,8,'','B');
$pdf->ln();
$pdf->Cell(5,8,'');
$pdf->Cell(185,8,'','B');

$pdf->ln();
$pdf->ln();
$pdf->Cell(15,8,'Remarks:');
$pdf->Cell(175,8,'','B');
$pdf->ln();
$pdf->Cell(5,8,'');
$pdf->Cell(185,8,'','B');
$pdf->ln();
$pdf->Cell(5,8,'');
$pdf->Cell(185,8,'','B');

$pdf->ln();
$pdf->ln();
$pdf->Cell(10,8,'Date');
$pdf->Cell(40,8,date('m/d/Y'),'B',0,"C");
$pdf->Cell(40,8,'Examiner\'s Signature:');
$pdf->Cell(100,8,'','B');



/////////////////////////////////////////////////////////////// page 18 end
/////////////////////////////////////////////////////////////// page 19 start



$pdf->AddPage();
$pdf->SetFont('','B',14);
$pdf->Cell(190,10,'Company Name: '.$comapnyName,0,0,'C');
$pdf->ln();
$pdf->SetFont('','B',12);
$pdf->Cell(190,10,'Address: '.$companyAddress.', '.$companyCity.', '.$companyState.', '.$companyZip,0,0,'C');

$pdf->ln(20);
$pdf->SetFont('','B',13);
$pdf->Cell(50);
$pdf->Cell(89,7,'CMV Inspection Policy Acknowledgement','B',0,'C');

$pdf->ln(15);
$pdf->Cell(20);
$pdf->SetFont('','',12);
$pdf->Cell(5,8,'I,');
$pdf->Cell(110,8,$driver['first_name'].' '.$driver['middle_name'].' '.$driver['last_name'],'B',0,'C');
$pdf->Cell(70,8,'acknowledge that');

$pdf->ln();
$pdf->Cell(20);
$pdf->MultiCell(150,8,"I have been trained on the proper procedures to conduct a Pre-trip inspection, Couple, Uncouple and Sttl wheel tug test of a CMV.\n\nI further agree that I shall each day conduct a full Pre-Trip and Post-Trip Inspection of every CMV, which I drive in accordance with Regulation 199/07 of the Highway Traffic Act and FMCSA reg 392.7. And that I will record the inspections correctly in a vehicle inspection booklet. As well that each times I couple to a trailer I will ensure that 5th wheel is properly.connected by performing a visual and tug test inspection.\n\nI will report to dispatch any and all defects which I discover during any vehicle inspection immediately.");
$pdf->ln();
$pdf->Cell(20);
$pdf->SetFont('','B');
$pdf->MultiCell(150,8,"I understand that failure to follow this policy or regulations will result in disciplinary action which may include termination.");
$pdf->SetFont('');

$pdf->ln(20);
$pdf->Cell(20);
$pdf->Cell(30,8,"Driver Name:");
$pdf->Cell(121,8,$driver['first_name']." ".$driver['middle_name']." ".$driver['last_name'],'B',0,'C');
$pdf->ln(10);
$pdf->ln(5);

$pdf->Cell(20);
$pdf->Cell(35,8,"Driver Signature:");
$pdf->Cell(116,8,"",'B');


$pdf->ln(10);
$pdf->ln(5);

$pdf->Cell(20);
$pdf->Cell(13,8,"Date:");
$pdf->Cell(40,8,date('m/d/Y',strtotime($driver['created_date'])),'B',0,'C');
$pdf->Cell(18,8," Witness:");
$pdf->Cell(80,8,implode(' ',get_from('users','first_name,middle_name,last_name',['id'=>$driver['witnessname']])),'B',0,'C');



/////////////////////////////////////////////////////////////// page 19 end

$pdf->Output('this.pdf','I');
