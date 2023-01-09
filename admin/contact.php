<?php
  
  include_once('message.php');
  include('contact_forms.php');
  include('contact_logic.php');

  class ContactPage {

  // main function, to display contact forms, and perform logic in other methods
  function contactMethods() {

    $contactForms = new ContactForms();
    $contactLogic = new ContactLogic();

    echo $contactForms->showContactForm();
    echo $contactForms->showRemindPasswordForm();

    if(isset($_POST['send_email'])) {
      include('cfg.php'); // including cfg.php to gain access to $adminMail variable
      $result = $contactLogic->sendEmailContact($adminMail);
      $message = new Message($result);
      $message->printMessage();
      header('Location:?idp=contact');
    }

    if(isset($_POST['remind_password'])) {
      $result = $contactLogic->remindPassword();
      $message = new Message($result);
      $message->printMessage();
      header('Location:?idp=contact');
    }
  }

}

?>