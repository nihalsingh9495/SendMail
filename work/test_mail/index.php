<?php
require('fpdf181/fpdf.php'); 
require 'lib/PHPMailer/PHPMailerAutoload.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'hello india');
$pdf->Output("F",'./uploads/OrderDetails.pdf'); 
$mail = new PHPMailer;
$mail->isSMTP();                                // Set mailer to use SMTP
$mail->Host = SmtpServer;                       // SMTP server
$mail->SMTPAuth = true;                         // Enable SMTP authentication
$mail->Username = SmtpUsername;                 // SMTP username
$mail->Password = SmtpPassword;                 // SMTP password
$mail->SMTPSecure = 'tls';                      // Enable TLS encryption, `ssl` also accepted
$mail->From = FromEmail;
$mail->Port = 587;                              // SMTP Port
$mail->FromName  = 'testing';

$mail->Subject   = $subject;
$mail->Body      = $body;
$mail->AddAddress($emails);
$mail->AddAttachment("./uploads/OrderDetails.pdf", '', $encoding = 'base64', $type = 'application/pdf');
return $mail->Send();
?>