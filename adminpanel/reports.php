<?php
include "../db.php";
include "fpdf/fpdf.php";

$pdf=new FPDF();

$pdf->AddPage();


$sql="SELECT fname, factoryid,email FROM users";


$results=mysqli_query($conn,$sql);

if($results){
    $data=mysqli_num_rows($results);
    if($data>0){
        
        while($row=mysqli_fetch_array($results)){
            foreach($results as $row){
                $pdf->SetFont('Arial','',12);
                $pdf->Ln();
                foreach($row as $column){
                    $pdf->Cell(41,12,$column,1);
                }
            }
            $pdf->Output();
        }
        
    }else{
        echo "no data found $sql";
    }
    
}else{
    echo "error executing query $sql";
}






?>