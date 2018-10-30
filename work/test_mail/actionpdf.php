<?php
include("fpdf181/fpdf.php");
require("fpdf181/html_table.php");
 
$pdf=new FPDF();
 
//$pdf->AliasNbPages();
//$pdf->SetAutoPageBreak(true, 15);
 
//$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

 
$pdf->SetFont('Arial','B',7); 
$htmlTable='<TABLE>
<TR>
<TD>Name:</TD>
<TD>'.$_POST['name'].'</TD>
</TR>
<TR>
<TD>Email:</TD>
<TD>'.$_POST['email'].'</TD>
</TR>
<TR>
<TD>URl:</TD>
<TD>'.$_POST['url'].'</TD>
</TR>
<TR>
<TD>Comment:</TD>
<TD>'.$_POST['comment'].'</TD>
</TR>
</TABLE>';
//$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>