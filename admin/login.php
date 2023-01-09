<?php

  class Login{

    function loginForm() {

      $loginForm = 
      '
          <div class="container mt-5 text-dark">
            <div class="row justify-content-center">
              <div class="col-md-5">
                <div class="card">
                  <div class="card-header">
                    <h1> Login </h1>
                  </div>
  
                  <div class="card-body">
  
                    <form method="POST">
                    
                      <div class="mb-3">
                        <label for="page_title">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                      </div>
                      
                      <div class="mb-3">
                        <label for="page_title">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
  
                      <div class="mb-3">
                        <button type="submit" name="login" class="btn btn-success">Login</button>
                      </div>
  
                    </form>
  
                  </div>
  
                </div>
              </div>
            </div>
          </div>
        ';
        
      return $loginForm;
  
    }
  
    function loginUser() {
  
      $given_username = htmlspecialchars($_POST['username']);
      $given_password = htmlspecialchars($_POST['password']);

      // if user is logged in, just skip the rest of method
      if($this->isAdminLoggedIn()) {
        return;
      }
      
      // here, we create a 'loggedIn' variable in session, which consist data that tells if user is logged in or not
      if($this->isCredentialsValid($given_username, $given_password)) {
        $_SESSION['loggedIn'] = true; 
      }
      else{
        $_SESSION['loggedIn'] = false;
      }
  
      return $this->isAdminLoggedIn() ? "Successfully logged in!" : "Invalid credentials."; 
    }
  
    // method to check, if credentials given from user are equals to one from cfg.php file
    function isCredentialsValid($given_username, $given_password) {
      include('cfg.php');
  
      if($given_password == $login && $given_password == $pass){
        return true;
      }
  
      return false;
    }
  
    // method to check if admin is logged in
    function isAdminLoggedIn() {
      return $_SESSION['loggedIn'] != null && $_SESSION['loggedIn'] == true;
    }

    // method to check, if it's user first time displaying admin page 
    function isFirstTimeOnPage() {
      return isset($_SESSION['loggedIn']);
    }

  }
?>