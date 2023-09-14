<!DOCTYPE html>
<html lang="en">
<?php

$GLOBALS['indexpage'] = basename(__FILE__);

// Identify on which section we are currently:
$section = 'home';
if (!empty($_GET['q']))
{
	$q = trim(strtolower($_GET['q']));

	if (strpos($q, 'phare') !== false  || strpos($q, 'lighthouse') !== false)
	{
		$section = 'lighthouses';
	}

	if (strpos($q, 'fleurs') !== false  || strpos($q, 'fleur') !== false)
	{
		$section = 'Fleurs';
	}

	if (strpos($q, 'djibouti') !== false)
	{
		$section = 'Djibouti';
	}
}

if (!empty($_GET['bio']))
{
	$section = 'bio';
}


?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Peintures de Marie-Elisabeth Gorge</title>
<?php
include('opengraph.php');

?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        main {
            margin-top: 3rem;
        }

        .lead {
            text-align: justify;
        }

        @media only screen and (max-width: 768px) {
            .post-title {
                margin-top: 1rem;
            }
        }

        @media only screen and (max-width: 768px) {
            .read-more {
                text-align: center;
            }
        }

        .extra-margin {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .navbar {
            background-color: #555658;
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }

	.navbar .dropdown-menu a {
	    padding: 0px 10px;
	}

        footer.page-footer {
            background-color: #555658;
            margin-top: 2rem;
        }

	.trigger {
	  padding: 1px 10px;
	  font-size: 12px;
	  font-weight: 400;
	  border-radius: 10px;
	  background-color: #eee;
	  color: #212121;
	  display: inline-block;
	  margin: 2px 5px;
	}

	.hoverable, .trigger {
	  transition: box-shadow 0.55s;
	  box-shadow: 0;
	}

	.hoverable:hover, .trigger:hover {
	  transition: box-shadow 0.45s;
	  box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
    </style>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-51359952-1', 'me-gorge.org');
ga('require', 'displayfeatures');
ga('send', 'pageview');
</script>

</head>

<body>
    <header>
        <!--Navbar-->
       <nav class="navbar navbar-expand-lg navbar-dark navbar-dark">
            <a class="navbar-brand" href="#">Peintures de Marie-Elisabeth Gorge</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if ($section=='home') echo 'active'; ?>">
                        <a class="nav-link" href="?">Accueil</a>
                    </li>
                    <li class="nav-item <?php if ($section=='Terre') echo 'active'; ?>">
                        <a class="nav-link" href="?q=Terre">Djibouti</a>
                    </li>
                    <li class="nav-item <?php if ($section=='Mer') echo 'active'; ?>">
                        <a class="nav-link" href="?q=Mer">Phares</a>
                    </li>
                    <li class="nav-item <?php if ($section=='Ciel') echo 'active'; ?>">
                        <a class="nav-link" href="?q=Ciel">Fleurs</a>
                    </li>

                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Saisons</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=Automne">Automne</a>
                            <a class="dropdown-item" href="?q=Hiver">Hiver</a>
                            <a class="dropdown-item" href="?q=Printemps">Printemps</a>
                            <a class="dropdown-item" href="?q=Été">Été</a>

                        </div>
                    </li>

                   <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Provence</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=Cap d'Antibes">Cap d'Antibes</a>
                            <a class="dropdown-item" href="?q=Caussol">Caussol</a>
                            <a class="dropdown-item" href="?q=Châteauneuf de Grasse">Châteauneuf de Grasse</a>
                            <a class="dropdown-item" href="?q=Grasse">Grasse</a>
                            <a class="dropdown-item" href="?q=Iles de Lerins">Iles de Lerins</a>
                            <a class="dropdown-item" href="?q=Plan de Grasse">Plan de Grasse</a>
                            <a class="dropdown-item" href="?q=Plascassier">Plascassier</a>
                            <a class="dropdown-item" href="?q=Roquefort les Pins">Roquefort les Pins</a>
                            <a class="dropdown-item" href="?q=Saint Laurent du Var">Saint Laurent du Var</a>
                        </div>
                    </li>

                   <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Provence</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=Cap d'Antibes">Cap d'Antibes</a>
                            <a class="dropdown-item" href="?q=Caussol">Caussol</a>
                            <a class="dropdown-item" href="?q=Châteauneuf de Grasse">Châteauneuf de Grasse</a>
                            <a class="dropdown-item" href="?q=Grasse">Grasse</a>
                            <a class="dropdown-item" href="?q=Iles de Lerins">Iles de Lerins</a>
                            <a class="dropdown-item" href="?q=Plan de Grasse">Plan de Grasse</a>
                            <a class="dropdown-item" href="?q=Plascassier">Plascassier</a>
                            <a class="dropdown-item" href="?q=Roquefort les Pins">Roquefort les Pins</a>
                            <a class="dropdown-item" href="?q=Saint Laurent du Var">Saint Laurent du Var</a>
                        </div>
                    </li>

                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bretagne</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=Trégastel">Trégastel</a>
                            <a class="dropdown-item" href="?q=Belle Ile en Mer">Belle Ile en Mer</a>
                            <a class="dropdown-item" href="?q=Golfe du Morbihan">Golfe du Morbihan</a>
                        </div>
                    </li>

                    <li class="nav-item <?php if ($section=='bio') echo 'active'; ?>">
                        <a class="nav-link" href="?bio=Bertrand d'Arrentières">Biographie</a>
                    </li>
                </ul>
                <form class="form-inline" method="GET">
                    <input name="q" class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search" value="<?php if (isset($_GET['q'])) echo htmlspecialchars($_GET['q']);?>">
                </form>
            </div>
        </nav>

        <!--/.Navbar-->
    </header>

    <main>
        <!--Main layout-->
        <div class="container">




<?php

if (!empty($_GET['bio']))
{
?>
<!--Page heading-->
<div class="row wow fadeIn" data-wow-delay="0.2s">
<div class="col-md-12">
    <h1 class="h1-responsive">Bertrand d'Arrentières
	<small class="text-muted">Biographie</small>
    </h1>
</div>
</div>
<!--/.Page heading-->
<hr>



<?php
}
else
	include('listAll.php');

?>




            <!--repeat-->




        </div>
        <!--/.Main layout-->
    </main>


    <!--Footer-->
    <footer class="page-footer center-on-small-only">
      <!--Footer links-->
        <div class="container-fluid">
            <div class="row">
                <!--First column-->
                <div class="col-lg-5 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Bertrand d'Arrentières</strong></h5>
                    <p><img src="peintures/me_footer.jpg" style="float: left; margin: 0 5px 10px 0">Peintures de Provence et d'ailleurs</p>
                    <p><a href="?bio=biography">En savoir plus...</a></p>
                </div>
                <!--/.First column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Second column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Saisons</strong></h5>
                    <ul>
                        <li><a href="?q=Automne">Automne</a></li>
                        <li><a href="?q=Hiver">Hiver</a></li>
                        <li><a href="?q=Printemps">Printemps</a></li>
                        <li><a href="?q=Été">Été</a></li>
                    </ul>
                </div>

                <hr class="w-100 clearfix d-sm-none">
                <!--Second column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>&nbsp;</strong></h5>
                    <ul>
                        <li><a href="?q=Terre">Terre</a></li>
                        <li><a href="?q=Mer">Mer</a></li>
                        <li><a href="?q=Ciel">Ciel</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!--/.Footer links-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="js/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
    new WOW().init();
    </script>

    <!-- Lazy load the images -->
    <script type="text/javascript" src="js/jquery.lazy.min.js"></script>
    <script>
    $(function() {
        $('.lazy').Lazy();
    });
    </script>


</body>

</html>