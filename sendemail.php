<?php

// Define some constants
define( "RECIPIENT_NAME", "Dozy Mmobuosi Foundation" );
define( "RECIPIENT_EMAIL", "info@dozymmobuosifoundation.com" );


// Read the form values
$success = false;
$senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$senderSubject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$senderCountry = isset( $_POST['country'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['country'] ) : "";
$senderState = isset( $_POST['state'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['state'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Message:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $senderPhone && $senderSubject && $message && $senderCountry && $senderState) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $name . " <" . $senderEmail . ">";
  $msgBody = " Phone: " . $senderPhone . " Subject: " . $senderSubject . " Country: " . $senderCountry . " State: " . $senderState . "". "". " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.html?message=Message sent Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Message Failed');	
}

?>