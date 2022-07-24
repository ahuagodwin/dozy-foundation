
<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $subject = htmlspecialchars($_POST['subject']);
  $country = htmlspecialchars($_POST['country']);
  $state = htmlspecialchars($_POST['state']);
  $message = htmlspecialchars($_POST['message']);
  


  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "info@dozymmobuosifoundation.com"; //enter that email address where you want to receive all messages
     
      $subject = "$subject";
      $body = "Name: $name\nEmail: $email\n\nCountry:\n$country\n\nState:\n$state\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>