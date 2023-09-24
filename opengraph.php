<?php
include_once('config/config.php');

if (!empty($_GET['peinture']))
{
	$mysqli = new mysqli($GLOBALS['config']['dbserver'], $GLOBALS['config']['dbuser'], $GLOBALS['config']['dbspass'], $GLOBALS['config']['dbname']);

	if ($mysqli->connect_errno)
	{
	    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$mysqli->query("SET NAMES 'utf8'");

	$sql = "SELECT id, number, title, keyword, filename, 
		      painting_date, location_fr, location_en, lighthouse, painting_location 
	       FROM peintures
	       WHERE number='".$_GET['peinture']."%'
	       ORDER BY number DESC";

	$res = $mysqli->query($sql);

	$paintings = array();
	while ($row = $res->fetch_assoc())
	{
	    $paintings[] = $row;
	}

	$res->close();

	// Now we can start playing with all the paintings

	foreach ($paintings as $aPainting)
	{
		if (!empty($aPainting['filename']))
		{
			echo '<meta property="og:title" content="'.htmlspecialchars($aPainting['title']).'" />' . "\n";
			echo '<meta property="og:type" content="article" />' . "\n";
			echo '<meta property="og:url" content="'.$GLOBALS['config']['Site URL'] . $GLOBALS['indexpage'].'?peinture='.$aPainting['number'].'" />' . "\n";
			echo '<meta property="og:image" content="'.$GLOBALS['config']['Site URL'] . 'peintures/'.$aPainting['filename'].'" />' . "\n";
			echo '<meta property="article:published_time" content="'.$aPainting['painting_date'].'T09:01:56+00:00" />' . "\n";

			list($width, $height, $type, $attr) = getimagesize('peintures/'.$aPainting['filename']);

			echo '<meta property="og:image:type" content="image/jpeg" />' . "\n";
			echo '<meta property="og:image:width" content="'.$width.'" />' . "\n";
			echo '<meta property="og:image:height" content="'.$height.'" />' . "\n";
			echo '<meta property="og:image:alt" content="'.htmlspecialchars($aPainting['title']).'" />' . "\n";

			echo '<meta property="og:description" content="Une peinture de '.htmlspecialchars($GLOBALS['config']['Nom']).'" />' . "\n";
			echo '<meta property="og:site_name" content="'.htmlspecialchars($GLOBALS['config']['Nom']).'" />' . "\n";
			echo '<meta property="article:author" content="'.htmlspecialchars($GLOBALS['config']['Nom']).'" />' . "\n";	
		}
	}
}
