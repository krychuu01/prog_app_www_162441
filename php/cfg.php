<?php

  //credentials to login to admin page
  $login = 'gkrych';
  $pass = 'gkrych';

  // admin mail to recieve mails
  $adminMail = 'test.mail@gmail.com';
  
  // data needed for a db connection
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $database = 'my_page';

  // creating db connection
  $link = new mysqli($dbhost, $dbuser, $dbpass);
  // this variable is used in different methods that require db connection

  if (!$link) echo '<b>Connection lost!</b>';
  if (!mysqli_select_db($link, $database)) echo 'Db is not chosen!';

?>