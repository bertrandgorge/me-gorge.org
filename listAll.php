<?php

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1' ||
	$_SERVER['SERVER_ADDR'] == 'localhost' || 
	$_SERVER['SERVER_ADDR'] == '::1')
	$mysqli = new mysqli('localhost', 'root', '', 'peintures_me');
else
	$mysqli = new mysqli('localhost', 'gorge', 'roger', 'peintures_me');

if ($mysqli->connect_errno)
{
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->query("SET NAMES 'utf8'");

$where = '';

$SecondaryText = "";

if (!empty($_GET['years']))
{
	switch ($_GET['years'])
	{
		case '1950_1975':
			$where = " AND painting_date BETWEEN '1950-01-01' AND '1976-01-01'";
			$SecondaryText = "Peintures des années 1950 à 1975";
			break;
		case '1976_1995': $where = " AND painting_date BETWEEN '1976-01-01' AND '1996-01-01'";
			$SecondaryText = "Peintures des années 1976 à 1995";
			break;
		case '1996_now': $where = " AND painting_date >= '1996-01-01'";
			$SecondaryText = "Peintures des années 1995 à nos jours";
			break;
	}
}

if (!empty($_GET['year']))
{
	$where = " AND painting_date LIKE '".$_GET['year']."%'";
	$SecondaryText = "Peintures de l'année " . $_GET['year'];
}

if (!empty($_GET['peinture']))
{
	$where = " AND number='".$_GET['peinture']."%'";
}

if (!empty($_GET['q']))
{
	$q = trim($_GET['q']);
	$q = mb_convert_case($q, MB_CASE_LOWER, "UTF-8");

	$where = " AND (title LIKE '%".$mysqli->escape_string($q)."%' OR
	keyword LIKE '%".$mysqli->escape_string($q)."%' OR
	location_fr LIKE '%".$mysqli->escape_string($q)."%' OR
	location_en LIKE '%".$mysqli->escape_string($q)."%')";

	$SecondaryText = "Recherche : " . $_GET['q'];

	if (strpos($q, 'phare') !== false  || strpos($q, 'lighthouse') !== false)
	{
		$where = " AND lighthouse=1 ";
		$SecondaryText = "Peintures de phares";
	}
}


$sql = "SELECT id, number, title, keyword, filename,
	      painting_date, location_fr, location_en, lighthouse, painting_location
       FROM peintures
       WHERE number > 0 $where
       ORDER BY number DESC";

$res = $mysqli->query($sql);

$numRows = $res->num_rows;

if ($numRows > 1)
	$SecondaryText .= " ($numRows peintures)";


$paintings = array();
while ($row = $res->fetch_assoc())
{
    $paintings[] = $row;
}

$res->close();

if ($numRows == 0)
{
?>

            <!--Page heading-->
            <div class="row wow fadeIn" data-wow-delay="0.2s">
                <div class="col-md-12">
                    <h1 class="h1-responsive">Peintures de Marie-Elisabeth Gorge
                        <small class="text-muted">Aucune peinture trouvée</small>
                    </h1>
                </div>
            </div>
            <!--/.Page heading-->
            <hr>

            <!--repeat-->

<?php
}
else if ($numRows == 1)
{
	$aPainting = reset($paintings);

?>

            <!--Page heading-->
            <div class="row wow fadeIn" data-wow-delay="0.2s">
                <div class="col-md-6">
                    <h1 class="h1-responsive"><?php echo $aPainting['title']; ?></h1>

		<?php 
			echoTags($aPainting);

		?>

                </div>

                <div class="col-md-6">

		<?php 

			$encodedURL = urlencode('http://me-gorge.org/'.$GLOBALS['indexpage'].'?peinture='.$aPainting['number']);
			$encodedName = urlencode($aPainting['title']);
			$encodedMedia = urlencode('http://me-gorge.org/peintures/'.$aPainting['filename']);

echo <<<social
<p style="text-align:right">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=$encodedURL" class="Share-icon"><img src="img/facebook.png" /></a>
	    <a target="_blank" href="https://twitter.com/home?status=$encodedName - $encodedURL" class="Share-icon"><img src="img/twitter.png" /></a>
	    <a target="_blank" href="https://pinterest.com/pin/create/button/?url=$encodedURL&amp;media=$encodedMedia&amp;description=$encodedName" class="Share-icon"><img src="img/pinterest.png" /></a>
	    <a target="_blank" href="https://plus.google.com/share?url=$encodedURL" class="Share-icon"><img src="img/googleplus.png" /></a>

</p>
social;
		?>

                </div>

            </div>


<?php
	if (!empty($aPainting['filename']))
	{
		echo '<div class="row wow fadeIn" data-wow-delay="0.2s">';
		echo '	<div class="col-lg-12">';
		echo '		<div class="view z-depth-1-half">';
		echo '			<img style="width:100%" src="peintures/'.$aPainting['filename'].'" class="img-fluid" alt="'.htmlspecialchars($aPainting['title']).'">';
		echo '			<div class="mask"></div>';
		echo '		</div>';
		echo '	</div>';
		echo '</div>';
	}

}
else
{
?>

            <!--Page heading-->
            <div class="row wow fadeIn" data-wow-delay="0.2s">
                <div class="col-md-12">
                    <h1 class="h1-responsive">Peintures de Marie-Elisabeth Gorge
                        <small class="text-muted"><?php echo $SecondaryText; ?></small>
                    </h1>
                </div>
            </div>
            <!--/.Page heading-->
            <hr>


<?php

	foreach ($paintings as $k => $aPainting)
	{
		if (!empty($aPainting['filename']))
		{
			echo '<div class="row mt-5">';
			echo '	<div class="col-lg-7">';
			echo '		<div class="view overlay hm-white-light z-depth-1-half">';

			if ($k < 15)
				echo '			<img style="width:100%" src="peintures/'.$aPainting['filename'].'" class="img-fluid" alt="'.htmlspecialchars($aPainting['title']).'">';
			else // Lazy loading
				echo '			<img style="width:100%" class="lazy" data-src="peintures/'.$aPainting['filename'].'" class="img-fluid" alt="'.htmlspecialchars($aPainting['title']).'">';

			echo '			<a href="?peinture='.$aPainting['number'].'"><div class="mask"></div></a>';
			echo '		</div>';
			echo '	</div>';
			echo '	<div class="col-lg-5">';

			echo '		<a href="?peinture='.$aPainting['number'].'"><h2 class="post-title font-bold">'.$aPainting['title'].'</h2></a>';
			echo '		<p class="my-4">';

			echoTags($aPainting);

			echo '		</p>';

			$encodedURL = urlencode('http://me-gorge.org/'.$GLOBALS['indexpage'].'?peinture='.$aPainting['number']);
			$encodedName = urlencode($aPainting['title']);
			$encodedMedia = urlencode('http://me-gorge.org/peintures/'.$aPainting['filename']);

echo <<<social
<p>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=$encodedURL" class="Share-icon"><img src="img/facebook.png" /></a>
	    <a target="_blank" href="https://twitter.com/home?status=$encodedName - $encodedURL" class="Share-icon"><img src="img/twitter.png" /></a>
	    <a target="_blank" href="https://pinterest.com/pin/create/button/?url=$encodedURL&amp;media=$encodedMedia&amp;description=$encodedName" class="Share-icon"><img src="img/pinterest.png" /></a>
	    <a target="_blank" href="https://plus.google.com/share?url=$encodedURL" class="Share-icon"><img src="img/googleplus.png" /></a>

</p>
social;

			echo '	</div>';
			echo '</div>';

			echo '<hr class="extra-margin my-5">';
		}
	}

}

// Now we can start playing with all the paintings


function echoTags($aPainting)
{
	echo '			<span class="number">N°'.$aPainting['number'].'</span>';

	$tags = array();
	if ($aPainting['lighthouse'] == 1)
		$tags[] = array('q' => 'q=Phares', 'caption' => 'Phare');

	if (!empty($aPainting['keyword']))
		$tags[] = array('q' => 'q=' . htmlspecialchars($aPainting['keyword']), 'caption' => $aPainting['keyword']);

	if (!empty($aPainting['location_fr']))
		$tags[] = array('q' => 'q=' . htmlspecialchars($aPainting['location_fr']), 'caption' => $aPainting['location_fr']);

	if (!empty($aPainting['painting_date']))
		$tags[] = array('q' => 'year=' . substr($aPainting['painting_date'], 0, 4), 'caption' => substr($aPainting['painting_date'], 0, 4));

	foreach ($tags as $aTag)
		echo '			<a href="?'.$aTag['q'].'" class="trigger teal lighten-4">'.$aTag['caption'].'</a>';

}