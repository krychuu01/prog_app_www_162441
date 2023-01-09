<?php

  // simple class implemented for creating and displaying messages on page
  // for example, messages about result of some action, like editing a page or deleting it.
  class Message {

    private $message;

    function __construct($message) {
      $this->message = $message;
    }

    private function getMessage() {
      return $this->message;
    }

    // this method prints message with value given in constructor
    function printMessage() {
      
      $printedMessage = '<div class="alert alert-primary mt-3" role="alert">'.$this->getMessage().'</div>';

      echo $printedMessage;
    }

  }

?>