<?php

  class ContactLogic {

      // method for sending an email, using filled fields from showContactForm() method
    function sendEmailContact($recipient) {

      if(empty($_POST['subject']) || empty($_POST['content']) || empty($_POST['sender'])) {
        $result = "Please fill every field.";
      }
      else {

        $mail['subject'] = htmlspecialchars($_POST['subject']);
        $mail['body'] = htmlspecialchars($_POST['content']);
        $mail['sender'] = htmlspecialchars($_POST['sender']);

        $header = "From: Contact Form <".$mail['sender'].">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: 8bit\n";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender']."\n";

        mail($recipient, $mail['subject'], $mail['body'], $header);

        $result ='Email has been sent.';

      }

      return $result;
    }

    // method created for sending email with admin password to given email in form
    function remindPassword() {

      include('cfg.php');

      if(empty($_POST['recipient'])) {
        $result = "Please fill your email.";
      }
      else {

        $mail['subject'] = 'Your password for admin';
        $mail['body'] = 'Here is your password for admin page: '.$pass."";
        $mail['recipient'] = htmlspecialchars($_POST['recipient']);
        $mail['sender'] = $adminMail;

        $header = "From: Contact Form <".$mail['sender'].">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: 8bit\n";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender']."\n";

        mail($mail['recipient'], $mail['subject'], $mail['body'], $header);

        $result = 'Email has been sent.';

      }

      return $result;
    }

  }

?>