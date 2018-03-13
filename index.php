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
                    <li class="nav-item <?php if ($section=='Djibouti') echo 'active'; ?>">
                        <a class="nav-link" href="?q=Djibouti">Djibouti</a>
                    </li>
                    <li class="nav-item <?php if ($section=='lighthouses') echo 'active'; ?>">
                        <a class="nav-link" href="?q=phare">Phares</a>
                    </li>
                    <li class="nav-item <?php if ($section=='Fleurs') echo 'active'; ?>">
                        <a class="nav-link" href="?q=fleurs">Fleurs</a>
                    </li>
                   <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">France et Europe</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=Normandie">Normandie</a>
                            <a class="dropdown-item" href="?q=Dalles">Les Petites Dalles</a>
                            <a class="dropdown-item" href="?q=Rouen et ses environs">Rouen et ses environs</a>
                            <a class="dropdown-item" href="?q=Bretagne">Bretagne</a>
                            <a class="dropdown-item" href="?q=St Gildas du Rhuys">St Gildas du Rhuys</a>
                            <a class="dropdown-item" href="?q=Charentes">Vendée-Charentes</a>
                            <a class="dropdown-item" href="?q=Provence">Provence-Côte d'azur</a>
                            <a class="dropdown-item" href="?q=Autres régions">Autres régions</a>
                            <a class="dropdown-item" href="?q=Portugal">Portugal</a>
                            <a class="dropdown-item" href="?q=Italie">Italie</a>
                            <a class="dropdown-item" href="?q=Grèce">Grèce</a>
                            <a class="dropdown-item" href="?q=Suède">Suède</a>
                            <a class="dropdown-item" href="?q=Islande">Islande</a>
                            <a class="dropdown-item" href="?q=Norvège">Norvège</a>
                        </div>
                    </li>



                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Océan Indien et Caraïbes</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=La Réunion">La Réunion</a>
                            <a class="dropdown-item" href="?q=Ile Maurice">Ile Maurice</a>
                            <a class="dropdown-item" href="?q=Rodrigues">Rodrigues</a>
                            <a class="dropdown-item" href="?q=Les Seychelles">Les Seychelles</a>
                            <a class="dropdown-item" href="?q=Tanzanie">Tanzanie</a>
                            <a class="dropdown-item" href="?q=Zanzibar">Zanzibar</a>
                            <a class="dropdown-item" href="?q=Jamaïque">La Jamaïque</a>
                            <a class="dropdown-item" href="?q=Martinique">Martinique et Ste Lucie</a>
                            <a class="dropdown-item" href="?q=Les Grenadines">Les Grenadines</a>
                            <a class="dropdown-item" href="?q=La Barbade">La Barbade</a>
                            <a class="dropdown-item" href="?q=Autres Iles">Autres Iles</a>
                        </div>
                    </li>

                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Autres pays</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?q=Turquie">Turquie</a>
                            <a class="dropdown-item" href="?q=Maroc">Maroc</a>
                            <a class="dropdown-item" href="?q=Egypte">Egypte</a>
                            <a class="dropdown-item" href="?q=Yémen">Yémen</a>
                            <a class="dropdown-item" href="?q=Djibouti">Djibouti</a>
                            <a class="dropdown-item" href="?q=Les USA">Les USA</a>
                            <a class="dropdown-item" href="?q=Amérique Latine">Amérique Latine</a>
                            <a class="dropdown-item" href="?q=Sri Lanka">Sri Lanka</a>
                            <a class="dropdown-item" href="?q=Bali">Bali</a>
                            <a class="dropdown-item" href="?q=Inde">Inde</a>
                            <a class="dropdown-item" href="?q=Thailande">Thailande</a>
                            <a class="dropdown-item" href="?q=Australie">Australie</a>
                            <a class="dropdown-item" href="?q=Polynésie">Polynésie</a>
                            <a class="dropdown-item" href="?q=Canada">Canada</a>
                        </div>
                    </li>

                    <li class="nav-item <?php if ($section=='bio') echo 'active'; ?>">
                        <a class="nav-link" href="?bio=Marie-Elisabeth Gorge">Biographie</a>
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
    <h1 class="h1-responsive">Marie-Elisabeth Gorge
	<small class="text-muted">Biographie</small>
    </h1>
</div>
</div>
<!--/.Page heading-->
<hr>

<p>Marie-Elisabeth Gorge-Tesnière nait à Yvetot (76) le 26 mai 1944.</p>
<p>Elle commence à peindre à l'âge de 14 ans alors qu'elle est pensionnaire près de Paris (1955-1960). A cette époque, elle réalise une maquette de décor de théatre.</p>
<p>Elle est étudiante à Rouen (1960-61) puis à Paris (1961-65) dont 2 ans à l'atelier Charpentier.</p>
<p>Elle travaille ensuite au Havre (1965-66) puis à Rennes (1966-68).</p>

<div style="text-align: center; margin: 0 10px 10px 0; width:240px; float: left"><b><img width="234" height="325" border="0" alt="Marie-Elisabeth Gorge lors de son exposition en novembre 2002" src="http://me-gorge.org/peintures/me.jpg" /><br />
            Marie-Elisabeth Gorge lors de son exposition en novembre 2002</b></div>

<p>En 1969, elle épouse Olivier Gorge et ils auront 3 enfants.</p>
<p>La vie militaire de son mari les amènera à déménager souvent :</p>
<table cellspacing="0" cellpadding="2" border="0">
<tbody>
    <tr> <td width="100">1970</td> <td>Salon de Provence</td> </tr>
    <tr> <td width="100">1970-71</td> <td>Aix en Provence</td> </tr>
    <tr> <td width="100">1971-73</td> <td>Mont de Marsan</td> </tr>
    <tr> <td width="100">1973-81</td> <td>Ris-Orangis / Paris</td> </tr>
    <tr> <td width="100">1981-84</td> <td>Abidjan (C&ocirc;te d'Ivoire)</td> </tr>
    <tr> <td width="100">1984-87</td> <td>Dijon (Couchey) et les Petites-Dalles de 84 à 89</td> </tr>
    <tr> <td width="100">1987-92</td> <td>Rouen / Paris</td> </tr>
    <tr> <td width="100">1992-95</td> <td>Djibouti</td> </tr>
    <tr> <td width="100">1995-97</td> <td>Rouen / Paris</td> </tr>
    <tr> <td width="100">1997-</td> <td>Paris...</td> </tr>
</tbody>
</table>


<p style="clear: both">Entre 1970 et 1989, ME. Gorge cesse quasiment de peindre, pendant les années o&ugrave; ses enfants sont jeunes. Elle fait alors de nombreux patchworks (et participe à plusieurs expositions) ainsi que des poupées de chiffons (entre autres pour &quot;le Petit Faune&quot;). Elle crèe aussi des ouvrages pour des journaux.</p>

<img style="float:right" width="250" border="0" alt="Affiche de l'exposition de Djibouti" src="peintures/affiche.jpg" />

<p align="left">En 89-90 elle se remet à peindre et participe à plusieurs expositions :</p>
<ul>
<li>Salon des indépendants (Rouen-1992) - expositions à Houppeville (1992), à Mesnières (1996), à Yvetot (salon de l'AYAC-1996), et à la galerie Rollin de Rouen (1997).</li>
<li>En décembre 1993 : exposition personnelle à Djibouti, organisée par le centre culturel fran&ccedil;ais à l'h&ocirc;tel Sheraton (voir l'affiche ci-contre).</li>
<li>En juin 1994 : participation à l'exposition &quot;Salon de Normandie&quot; (état de New-York - USA) organisée par le &quot;NORMANDY REMEMBERED committee of Locust valley&quot;, pour le 50<sup>e</sup> anniversaire du débarquement (vente d'une peinture des Petites-Dalles...)</li>
<li>En mai 1999, novembre 2000 et novembre 2002 : trois expositions personnelles privées à Paris.</li>
<li>En octobre 2003 : illustration de couverture d'un livre sur l'océan indien (<a href="?peinture=199">peinture de Zanzibar-199</a>).</li>
<li>Au printemps 2005 : exposition à Levallois.</li>
<li>de 2006 à 2012 : Salon des artistes de Neuilly</li>
</ul>


<p>Marie-Elisabeth Gorge aime avec passion tous les rivages ainsi que la végétation (en particulier tropicale). Avec son mari, elle a gardé de leurs nombreux déménagements le go&ucirc;t des voyages et une grande curiosité pour notre planète et ses habitants.</p>
<p style="text-align:center">e-mail : <a href="mailto:me.gorge+peintures@free.fr">me.gorge+peintures@free.fr</a></p>





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
                    <h5 class="title mb-3"><strong>Marie-Elisabeth Gorge</strong></h5>
                    <p><img src="peintures/me_footer.jpg" style="float: left; margin: 0 5px 10px 0">Marie-Elisabeth Gorge aime avec passion tous les rivages ainsi que la végétation (en particulier tropicale). Avec son mari, elle a gardé de leurs nombreux déménagements le goût des voyages et une grande curiosité pour notre planète et ses habitants.</p>
                    <p><a href="?bio=biography">En savoir plus...</a></p>
                </div>
                <!--/.First column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Second column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Années</strong></h5>
                    <ul>
                        <li>
                            <a href="?years=1950_1975">1950 -&gt; 1975</a>
                        </li>
                        <li>
                            <a href="?years=1976_1995">1976 -&gt; 1995</a>
                        </li>
                        <li>
                            <a href="?years=1996_now">1996 -&gt; Maintenant</a>
                        </li>
                    </ul>
                </div>
                <!--/.Second column-->
                <hr class="w-100 clearfix d-sm-none">
                <!--Third column-->
                <div class="col-lg-2 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong>Lieux</strong></h5>
                    <ul>
                        <li><a href="?q=djibouti">Djibouti</a></li>
                        <li><a href="?q=St Gildas">St Gildas du Rhuys</a></li>
                        <li><a href="?q=USA">Les USA</a></li>
                        <li><a href="?q=Seychelles">Les Seychelles</a></li>
                        <li><a href="?q=Dalles">Les Petites Dalles</a></li>
                        <li><a href="?q=Bretagne">Bretagne</a></li>
                        <li><a href="?q=Jamaïque">La Jamaïque</a></li>
                        <li><a href="?q=Provence">Provence</a></li>
                        <li><a href="?q=Maurice">Ile Maurice</a></li>
                        <li><a href="?q=Martinique">Martinique et Ste Lucie</a></li>
                        <li><a href="?q=Barbade">La Barbade</a></li>
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