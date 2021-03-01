<?php  
require_once APPPATH.'third_party/fpdf/fpdf-1.8.php';
require_once APPPATH.'third_party/fpdf/library/html2pdf.php';
class PDF extends PDF_HTML
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}




// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

public function TextInCenter($text,$space = 85){
    
    //$this->SetFillColor(255,0,0);
    $this->Cell($space);

    $this->Cell(20,10,$text,0,1,'C');

}


public function ArrInCenter($data,$sCol,$Under=[],$bold=[],$space=5,$ln=NULL,$ht=5,$center=[]){

    foreach($data as $row)
    {   $this->Cell($space);
         
        for($i=0;$i<(count($sCol));$i++){
            if(!in_array($i,$bold))
                {
                    $this->SetFont('');
                }
            else{
                $this->SetFont('','B');
            }
            if(!in_array($i,$Under))
                {
                    if(!in_array($i,$center)){
                        $this->Cell($sCol[$i],$ht,$row[$i]);
                    }else{
                        $this->Cell($sCol[$i],$ht,$row[$i],0,0,'C');
                    }
                }
            else{
                    if(!in_array($i,$center)){
                        $this->Cell($sCol[$i],$ht,$row[$i],'B');
                    }else{
                        $this->Cell($sCol[$i],$ht,$row[$i],'B',0,'C');
                    }
                }
        }
        $this->Ln($ln);
    }

}

public function ArrInCenter2($data,$sCol,$Under=[],$bold=[],$space=5,$ln=NULL,$ht=5){

    foreach($data as $row)
    {   $this->Cell($space);
         
        for($i=0;$i<(count($sCol));$i++){
            if(!in_array($i,$bold))
                {
                    $this->SetFont('');
                }
            else{
                $this->SetFont('','B');
            }
            if(!in_array($i,$Under))
                {$this->Cell($sCol[$i],$ht,$row[$i]);}
            else{
                $this->Cell($sCol[$i],$ht,$row[$i],1,0,'C');
            }
        }
        $this->Ln($ln);
    }

}

// Colored table
function FancyTable($header, $data, $w)
{
    // Colors, line width and bold font
    $this->SetFillColor(204, 204, 204 );//176
    
    $this->SetFont('','B',14);
    // Header
    
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('','',12);
    // Data
    $fill = false;
    foreach($data as $row)
    {
        
        for($i=0;$i<count($row);$i++)
            $this->Cell($w[$i],6,$row[$i],'1',0,'L',$fill);
        $this->ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Simple table
function BasicTable(/*$header,*/ $data)
{

    foreach($data as $row)
    {
        foreach($row as $col){
            $this->SetFont('','B',12);
            $this->Cell(30,10,$col[0],1);
            $this->SetFont('','',11);
            $this->Cell(65,10,$col[1],1);
        }
        $this->Ln();
    }
}


function image_get($options = []){
    // image_get($data,$Ypath,$Npath,$Yx,$Nx,$Yy,$Ny,$Yborder='0',$Nborder='0',$Cwidth=25,$Cheight=25,$width=3.5,$height=3.5)
    $defaults = [
        'Yborder'           => '0',
        'Nborder'           => '0',
        'Cwidth'            => 15 ,
        'Cheight'           =>  5 ,
        'Pwidth'            =>  3.5  ,
        'Pheight'           =>  3.5  ,
        'Pheight'           =>  3.5  ,
        'Yes'               => '    YES',
        'No'                => '    NO',
        'Ypath'             => 'uploads/checkedbox.png',
        'Npath'             => 'uploads/uncheckedbox.png',
    ];

    $options = array_merge($defaults, $options);

    extract($options);


    if($data=='Yes'){
        $this->Cell($Cwidth,$Cheight,$this->image(base_url($Ypath),$Yx,$Yy,$Pwidth,$Pheight).$Yes,$Yborder);
        $this->Cell($Cwidth,$Cheight,$this->image(base_url($Npath),$Nx,$Ny,$Pwidth,$Pheight).$No,$Nborder);
    }else{
        $this->Cell($Cwidth,$Cheight,$this->image(base_url($Npath),$Yx,$Yy,$Pwidth,$Pheight).$Yes,$Yborder);
        $this->Cell($Cwidth,$Cheight,$this->image(base_url($Ypath),$Nx,$Ny,$Pwidth,$Pheight).$No,$Nborder);
    }
}

}//class end


$pdf = new PDF();
$pdf->SetFont('Arial','BU',16);