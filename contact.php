<?php 


$to="ravi@iconiche.in";

$from=$_REQUEST['Email']; 

$Subject = "Enquiry"; 

$Name = $_POST['Name'];

$Email = $_POST['Email'];

$Company = $_POST['Company'];

$Phone = $_POST['Phone'];

$Message = $_POST['Message'];


$headers = "From: $Email\r\n";

$headers .= "MIME-Version: 1.0\r\n";

$boundary = uniqid("HTMLDEMO");

$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

$body = "This Enquiry was generated from the enquiry form at http://inconiche.in\n\n";



$message .= "Name : $Name \n <br>";

$message .= "Email : $Email \n <br>";

$message .= "Company : $Company \n <br>";

$message .= "Phone  : $Phone \n <br>";

$message .= "Message : $Message \n <br>";



$body = "--$boundary\r\n" .

        "Content-Type: text/html; charset=ISO-8859-1\r\n" .

        "Content-Transfer-Encoding: base64\r\n\r\n";

        $body .= chunk_split(base64_encode($message));



        ini_set(sendmail_from,'$Email');  // the INI lines are to force the From Address to be used ! 

	   $to="ravi@iconiche.in";

        mail($to, $Subject, $body, $headers); 	   



$headers2  = "From:ravi@iconiche.in"; 

$subject2  = "Acknowledgement from http://inconiche.in"; 

$autoreply = "

Dear  $Name



Thank you for visiting our website.

Your query has been registered and will be responded to at the earliest. 



Best regards,

Iconiche Team ";


//HTML version of message

$body = "--$boundary\r\n" .

"Content-Type: text/html; charset=ISO-8859-1\r\n" .

"Content-Transfer-Encoding: base64\r\n\r\n";

$body .= chunk_split(base64_encode($message));



if($from == '') {print "You have not entered an Email, please go back and try again";} 

else { 

if($Name == '') {print "You have not entered a name, please go back and try again";} 

else { 

$send = mail($from, $subject2, $autoreply, $headers2); 



if($send) 

{header( "Location: thanks.html" );} 

else 

{

	print "We encountered an error sending your mail, please notify"; } 

}

}

?>
