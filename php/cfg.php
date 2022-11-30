<?php

  $login = 'gkrych';
  $pass = 'gkrych';

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $database = 'my_page';

  $link = new mysqli($dbhost, $dbuser, $dbpass);

  if (!$link) echo '<b>przerwane polaczenie </b>';
  if (!mysqli_select_db($link, $database)) echo 'nie wybrano bazy';

  function getLink() {
    GLOBAL $link;
    return $link;
  }

?>