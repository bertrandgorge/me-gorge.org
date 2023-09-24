<!DOCTYPE html>
<html lang="en">
<?php
include_once(__dir__ . '/config/config.php');
$GLOBALS['indexpage'] = basename(__FILE__);
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $GLOBALS['config']['Site title']; ?></title>
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
<?php echo $GLOBALS['config']['AdditionalJS']; ?>
</script>

</head>

<body>
    <header>
        <!--Navbar-->
       <nav class="navbar navbar-expand-lg navbar-dark navbar-dark">
            <a class="navbar-brand" href="#"><?php echo $GLOBALS['config']['Site title']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?">Accueil</a>
                    </li>

                    <?php echoMenus(); ?>

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
<div class="row wow fadeIn" data-wow-delay="0.2s">
<div class="col-md-12">
    <h1 class="h1-responsive"><?php echo $GLOBALS['config']['Nom']; ?>
	<small class="text-muted">Biographie</small>
    </h1>
</div>
</div>
<hr>

	<?php echo $GLOBALS['config']['bio'] ?>


<?php
}
else
	include('listAll.php');

?>


        </div>
    </main>


    <!--Footer-->
    <footer class="page-footer center-on-small-only">
      <!--Footer links-->
        <div class="container-fluid">
            <div class="row">
                <!--First column-->
                <div class="col-lg-5 col-md-6 ml-auto">
                    <h5 class="title mb-3"><strong><?php echo $GLOBALS['config']['Nom']; ?></strong></h5>
                    <p><img src="<?php echo $GLOBALS['config']['Photo']; ?>" style="float: left; margin: 0 5px 10px 0"><?php $GLOBALS['config']['Bio courte']; ?></p>
                    <p><a href="?bio=<?php echo htmlspecialchars($GLOBALS['config']['Nom']) ?>">En savoir plus...</a></p>
                </div>
                <!--/.First column-->
                
              	<?php echoFooterMenus(); ?>

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
<?php

function echoMenus()
{
    foreach ($GLOBALS['config']['menus'] as $menuName => $v)
    {
        if (is_array($v))
        {
            // drop down menu

            echo '<li class="nav-item btn-group">' . "\n";
            echo '<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.htmlentities($menuName).'</a>' . "\n";
            echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">' . "\n";
            foreach ($v as $subMenuName => $subMenuQuery)
            echo '    <a class="dropdown-item" href="?'.$subMenuQuery.'">'.htmlentities($subMenuName).'</a>' . "\n";
            echo '</div>' . "\n";
            echo '</li>' . "\n";

        }
        else 
        {
            // Regular menu
            $classes = '';
            if (strtolower($_GET['q']) == strtolower($v)) 
                $classes .= ' active';

            echo "<li class=\"nav-item $classes \"><a class=\"nav-link\" href=\"?".$v."\">".htmlentities($menuName)."</a></li>";
        }
    }

    if (!empty($GLOBALS['config']['Bio courte']))
    {
        $classes = '';
        if (strtolower($_GET['q']) == 'bio') 
            $classes .= ' active';

        echo '    <li class="nav-item '.$classes.'"><a class="nav-link" href="?bio=' . htmlspecialchars($GLOBALS['config']['Nom']) . '">Biographie</a></li>';
    }
}

function echoFooterMenus()
{
    foreach ($GLOBALS['config']['footer_menus'] as $menuName => $subMenus)
    {
        echo '<hr class="w-100 clearfix d-sm-none">';
        echo '<div class="col-lg-2 col-md-6 ml-auto">';
        echo '  <h5 class="title mb-3"><strong>'.$menuName.'</strong></h5>';
        echo '<ul>';

        foreach ($subMenus as $menuName => $query)
            echo '<li><a href="?' . $query. '">'.htmlentities($menuName).'</a></li>';
        echo '</ul></div>';
    }
}
