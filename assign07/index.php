<?php
include 'base.inc';									// We use this method to make the code more portable
$mobile_browser = 0;

if (isset($_GET['m'])) {							// We have a value directly from the user that we need to store
  setcookie('m', $_GET['m'], time()+60*60*24*30);	// Although we may already have a cookie, the value may
  $_COOKIE['m'] = $_GET['m'];						// have changed so we'll store it anyway. Also update $_COOKIE array.
}

if ($_COOKIE['m']  > 0 ) {							// If we have a cookie set to 1 or if we have
  $mobile_browser++;								// just set it to 1, we want the mobile view
}

header("Cache-Control: max-age=60");				// Set cache control before we go any further


if (!isset($_COOKIE['m'])) {						// No indication of user preference
  include("Mobile_Detect.php");						// include the detector script
  $detect = new Mobile_Detect();
  if ($detect->isMobile()) {						// Increment the mobile_browser variable if we're on mobile
      $mobile_browser++;
  }
}													//OK, we're done. We know which version we want so let's return it


if ($mobile_browser > 0 ) {							// We're on mobile so let's write our mobile page
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE HTML>
<html lang="en" manifest="manifest.php">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<link rel="canonical" href="<?php echo $base; ?>" />
    <link href="styles-mobile.css" type="text/css" rel="stylesheet">
    <title>Confirm your attendance at lectures below! | Assigment 7 - Vanessa</title>
</head>
<body onLoad="verificaPalestras()">
	<section class="talk">
    	<h1>Spiritist talks in November 2011</h1>
        <form >
        <article>
            <h2>Progress Law <span>by Nilsa Pereira</span></h2>
            <p>01/11 - Tuesday at 15:30</p>
            <fieldset>
            	<input type="checkbox" onClick="addPalestra(document.getElementById('palestra1').value)" name="palestra1" value="palestra1" id="palestra1">
				<label for="palestra1">I go!</label>
			</fieldset>                
        </article>
        <article>
            <h2>The harms of the omission <span>by Araripe Ribeiro Aguiar</span></h2>
            <p>03/11 - Thursday at 15:30</p>
            <fieldset>
                <input type="checkbox" onClick="addPalestra(document.getElementById('palestra2').value)" name="palestra2" value="palestra2" id="palestra2">
                <label for="palestra2">I go!</label>
			</fieldset>    
        </article>
        <article>
            <h2>Fear of the death <span>by Andre Graf de Almeida</span></h2>
            <p>05/11 - Saturday at 18:00</p>
            <fieldset>
                <input type="checkbox" onClick="addPalestra(document.getElementById('palestra3').value)" name="palestra3" value="palestra3" id="palestra3">
                <label for="palestra3">I go!</label>
			</fieldset>    
        </article>
        <article>
            <h2>Nadir Team <span>by Ana Luiza Rosa</span></h2>
            <p>06/11 - Sunday at 8:00</p>
            <fieldset>
                <input type="checkbox" onClick="addPalestra(document.getElementById('palestra4').value)" name="palestra4" value="palestra4" id="palestra4">
                <label for="palestra4">I go!</label>
			</fieldset>    
        </article>
        <article>
            <h2>The spirit at progress <span>by Ana Rita Quilante</span></h2>
            <p>07/11 - Monday at 20:00</p>
            <fieldset>
                <input type="checkbox" onClick="addPalestra(document.getElementById('palestra5').value)" name="palestra5" value="palestra5" id="palestra5">
                <label for="palestra5">I go!</label>
			</fieldset>    
        </article>
        <input type="reset" value="Clear My Selections" onClick="limpaLocalStorage()"/>
        </form>
	</section>
    <section>
    	<h1>About the Spiritist Doctrine, codified by Allan Kardec</h1>
        <article>
        	<h2>General</h2>
            <p>
                Spiritism is a loose corpus of religious faiths having in common the general belief in the 
                survival of a spirit after death. In a stricter sense, it is the religion, 
                beliefs and practices of the people affiliated to the International Spiritist Union, 
                based on the works of Allan Kardec and others. Formed in France in the 19th century, 
                it soon spread to other countries, but today the only country where it has a significant 
                number of adherents is Brazil.
            </p>
            <small>Font: <a href="http://en.wikipedia.org/wiki/Spiritism" title="Wiki: Spiritist Doctrine">Wikipedia</a></small>
        </article>
        <article>
        	<h2>Who was Allan Kardec?</h2>
            <p>
            	<img src="194px-Allan_Kardec_portrait001.jpg" alt="illustration of Allan Kardec Portrait" title="Allan Kardec" />
                Allan Kardec is the pen name of the French teacher and educator Hippolyte Léon Denizard Rivail 
                (Lyon, October 3, 1804 – Paris, March 31, 1869). He is known today as the systematizer of 
                Spiritism for which he laid the foundation with the five books of the Spiritist Codification.
            </p>
            <small>Font: <a href="http://en.wikipedia.org/wiki/Allan_Kardec" title="Wiki: Allan Kardec">Wikipedia</a></small>
        </article>
	</section>
	<section class="footer">
		<a href="<?php echo $base; ?>?m=0">Desktop View</a>
	</section>
 </body>
<script type="text/javascript" src="confirm.js"></script>
</html>
<?php

} else {
  $redirect = $base.'desktop.php';
  header("Location: $redirect");
}
?>