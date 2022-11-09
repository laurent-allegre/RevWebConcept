<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "laurent.allegre1@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nSujet: $website\n\nMessage:\n$message\n\nEnvoyé depuis le site WebConceptSite";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Votre message a été envoyé";
      }else{
         echo "Désolé, impossible d'envoyer votre message !";
      }
    }else{
      echo "Entrez une adresse mail valide!";
    }
  }else{
    echo "(required) Le champs email et message sont requis";
  }
?>