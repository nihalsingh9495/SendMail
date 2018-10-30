<?php
include("html_table.php");

      if(isset($_REQUEST['send']))
      {
   		 //Generate Html pdf file
		 $pdf=new PDF();
		 $pdf->AddPage();
		 $pdf->SetFont('Arial','B',14);

		$htmlTable='<TABLE border="1">
					<TR>
					<TD>Name:</TD>
					<TD>'.$_POST['fname'].'</TD>
					</TR>
					<TR>
					<TD>Email:</TD>
					<TD>'.$_POST['email'].'</TD>
					</TR>
					<TR>
					<TD>Price:</TD>
					<TD>'.$_POST['price'].'</TD>
					</TR>
					<TR>
					<TD>Discription:</TD>
					<TD>'.$_POST['desc'].'</TD>
					</TR>
					</TABLE>';


		 $pdf->WriteHTML($htmlTable);
		 $pdf->Output();


		 // email stuff (change data below)
			$to = $_REQUEST['email'];
			$from = "aman.zestgeek@gmail.com";
			$subject = "send email with pdf attachment";
			$message = "<p>Please see the attachment.</p>";

		 // a random hash will be necessary to send mixed content
			$separator = md5(time());

		// carriage return type (we use a PHP end of line constant)
			$eol = PHP_EOL;

		// attachment name
			$filename = "demo.pdf";

		// encode data (puts attachment in proper format)
			$pdfdoc = $pdf->Output("", "S");
			$attachment = chunk_split(base64_encode($pdfdoc));

		// main header
		$headers  = "From: ".$from.$eol;
		$headers .= "MIME-Version: 1.0".$eol;
		$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

		// attachment
		$body .= "--".$separator.$eol;
		$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
		$body .= "Content-Transfer-Encoding: base64".$eol;
		$body .= "Content-Disposition: attachment".$eol.$eol;
		$body .= $attachment.$eol;
		$body .= "--".$separator."--";

		// send message
		mail($to, $subject, $body, $headers);

      }
      ?>
<html>
<head>
      <title>send mail using mail function in php</title>
</head>
<body>
      <div class="container">
      <h2>Mail sending form of Web Preparations</h2>
      <form action="" method="POST">
      <div class="form-group">
	  <label for="name">Name:</label>
	  <input type="text" name="fname" class="form-control" id="name" placeholder="Please enter your Name" name="fname"><br>
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Please enter your email" name="email"><br>
	  <label for="price">Price:</label>
	  <input type="text" name="price" class="form-control" id="price" placeholder="Please enter Price" name="price"><br>
	  <label for="desc">Discription:</label>
	  <textarea name="desc"></textarea>
      </div>


      <button type="submit" name="send" class="btn btn-info">Send Mail</button>
      </form>
      </div>

</body>
</html>
