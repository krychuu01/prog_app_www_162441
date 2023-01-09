<?php

  class ContactForms {

      // method for displaying contact form
    function showContactForm() {

      $contactForm = '
      <div class="container mt-5 text-dark">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1> Contact </h1>
              </div>

              <div class="card-body">

                <form method="POST">

                  <div class="mb-3">
                    <label for="sender">Your Email</label>
                    <input type="text" name="sender" class="form-control" placeholder="Put your email here">
                  </div>

                  <div class="mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                  </div>
                
                  <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows=5></textarea>
                  </div>

                  <div class="mb-3">
                    <button type="submit" name="send_email" class="btn btn-success">Send email</button>
                  </div>

                </form>

              </div>

            </div>
          </div>
        </div>
      </div>
    ';

      return $contactForm;
    }

      // method for displaying remind password form
    function showRemindPasswordForm() {

      $remindPasswordForm = '
      <div class="container mt-5 text-dark">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1> Remind Password </h1>
              </div>

              <div class="card-body">

                <form method="POST">

                  <div class="mb-3">
                    <label for="sender">Your Email</label>
                    <input type="text" name="recipient" class="form-control" placeholder="Put your email here">
                  </div>

                  <div class="mb-3">
                    <button type="submit" name="remind_password" class="btn btn-success">Remind Password</button>
                  </div>

                </form>

              </div>

            </div>
          </div>
        </div>
      </div>
    ';

      return $remindPasswordForm;
    }

  }

?>