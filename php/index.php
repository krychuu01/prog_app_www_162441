<?php

    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

    if($_GET['idp'] == 'main') $page = '../html/main.html';
    if($_GET['idp'] == 'interestingfacts') $page = '../html/interestingfacts.html';
    if($_GET['idp'] == 'mostlovedmovies') $page = '../html/mostlovedmovies.html';
    if($_GET['idp'] == 'mostrewardedactors') $page = '../html/mostrewardedactors.html';
    if($_GET['idp'] == 'oscars2022') $page = '../html/oscars2022.html';
    if($_GET['idp'] == 'worstmoviesroles') $page = '../html/worstmoviesroles.html';
    if($_GET['idp'] == 'films') $page = '../html/films.html';

?>

<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Language" content="pl" />
  <meta name="Author" content="Grzegorz Krych" />
  <link rel="stylesheet" href="../basic/basic.css">
  <link rel="stylesheet" href="../css/welcome_style.css">
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <title>Oscar movies</title>
  <script src="../js/clock.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            </ul>
        </nav>


    </header>

    <main class="main">

    <?php

        if(!file_exists($page)) {
            echo "Page {$page} doesn't exists!";
        }

        include($page);

    ?>


        <div class="identifier" style="margin-top:30px; font-size: 25px; color: gold;">

    
        <?php

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

    <script src="../js/rotate_oscar.js" type="text/javascript"></script>
    <script src="../js/clock_background.js" type="text/javascript"></script>
</body>
  