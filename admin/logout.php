<?php

  class Logout {

    function logoutForm() {

      $logoutForm = 
      '
          <div class="container mt-5 text-dark">
            <div class="row justify-content-center">
              <div class="col-md-5">
                <div class="card">
                  <div class="card-header">
                    <h1> Logout </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">
  
                      <div class="mb-3">
                        <button type="submit" name="logout" class="btn btn-success">Logout</button>
                      </div>
  
                    </form>
  
                  </div>
  
                </div>
              </div>
            </div>
          </div>
        ';
        
      return $logoutForm;
  
    }
  
    // an logout method, to logout from admin page, with redirection to main page
    function logoutUser(){
      unset($_SESSION['loggedIn']);
      session_destroy();
      session_write_close();
      header('Location:?idp=main'); // redirect to main page
      die;
    }

  }

?>