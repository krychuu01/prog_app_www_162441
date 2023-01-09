<?php

    // includes, $path is added because it's need to be here to include
    // files from admin package
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/moj_projekt";
    include('showpage.php');
    include('../admin/admin.php');
    include('../admin/contact.php');
    include('cfg.php');
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

    // assign values to $page variable by if statement. 
    // When user click on one of element from header menu, app will try to find id of 
    // the chosen page here, and then it will redirect user to this page
    if($_GET['idp'] == 'main') $page = 1;
    if($_GET['idp'] == 'interestingfacts') $page = 3;
    if($_GET['idp'] == 'mostlovedmovies') $page = 4;
    if($_GET['idp'] == 'mostrewardedactors') $page = 5;
    if($_GET['idp'] == 'oscars2022') $page = 6;
    if($_GET['idp'] == 'worstmoviesroles') $page = 7;
    if($_GET['idp'] == 'films') $page = 8;
    if($_GET['idp'] == 'loginpage') $page = 9;
    if($_GET['idp'] == 'admin_page') $page = 11;
    if($_GET['idp'] == 'contact') $page = 33;

?>

<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Language" content="pl" />
  <meta name="Author" content="Grzegorz Krych" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if($_GET['idp'] == 'admin_page' || $_GET['idp'] == 'contact'): ?> <!--> condition to add bootstrap on admin and contact page <-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php endif ?>
  <link rel="stylesheet" href="../basic/basic.css">
  <link rel="stylesheet" href="../css/welcome_style.css">
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <title>Oscar movies</title>
  <script src="../js/clock.js" type="text/javascript"></script>
  <script src="../js/rotate_oscar.js" type="text/javascript"></script>
</head>

<body>

  <header>

    <div class="header-content">
        <h1>Oscar movies</h1>
        <img class="fota" src="../img/basic/golder-oscar-statue-small.svg " id="golden-oscar-statue" alt="Golden Oscar Statue Logo">
        <div id="clock">00:00:00 PM</div>
    </div>

        <nav class="header-menu">
            <ul>
                <li class="nav-item"> <a href="?idp=main" class="nav-link">Home</a> </li>
                <li class="nav-item"> <a href="?idp=oscars2022" class="nav-link">Oscars 2022</a> </li>
                <li class="nav-item"> <a href="?idp=mostlovedmovies" class="nav-link">Most loved movies</a> </li>
                <li class="nav-item"> <a href="?idp=mostrewardedactors" class="nav-link">Most rewarded actors</a> </li>
                <li class="nav-item"> <a href="?idp=worstmoviesroles" class="nav-link">Worst movies/roles</a> </li>
                <li class="nav-item"> <a href="?idp=interestingfacts" class="nav-link">Interesting facts</a> </li>
                <li class="nav-item"> <a href="?idp=films" class="nav-link">Films</a> </li>
                <li class="nav-item"> <a href="?idp=admin_page" class="nav-link">Login</a> </li>
                <li class="nav-item"> <a href="?idp=contact" class="nav-link">Contact</a> </li>
            </ul>
        </nav>


    </header>

    <main class="main">

    <?php

        showPage($link, $page);

        if($page == 11) {
            $adminPage = new AdminPage();
            $adminPage->adminMethods();
        }

        if($page == 33) {
            $contactPage = new ContactPage();
            $contactPage->contactMethods();
        }

    ?>

        
        <div class="identifier" style="margin-top:30px; font-size: 25px; color: gold;">
        
    
        <?php
            // page identifier, shown on every page, it just print data of site author
           $nr_indeksu = '162441';
           $nr_grupy = '2';
           $imie_nazwisko = "Grzegorz Krych";

           echo "{$imie_nazwisko}, {$nr_indeksu}, grupa {$nr_grupy} <br/><br/>";
    
        ?>

        </div>
    </main>


    
    <footer>
        <p>Author: <span style="color:gold">Grzegorz Krych</span></p>
        <p>Have some questions about website?  Mail me: <a href="mailto:test@test.com">example@email.com</a></p>
    </footer>

    <!-- loading javascript scripts -->
    <script src="../js/rotate_oscar.js" type="text/javascript"></script>
    <script src="../js/clock_background.js" type="text/javascript"></script>
</body>
  