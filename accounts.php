<?php


$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');


use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

$handler = new Handler();
$handler->getJavascriptAntiBot();


?>

<?PHP
if(isset($_GET['compte']))
{
	if($_GET['compte'] == "client")
	{
        include_once "config.php";
		include "core/AbonneC.php";
		$abonne1C=new AbonneC();
		$listeAbonnes=$abonne1C->afficheAbpp();
	}
	else 
	{
		include "core/AdministrateurC.php";
		$admministrateur1C=new AdministrateurC();
		$listeAdmins=$admministrateur1C->afficheAdpp();
        
	}
}
?>

<?php
if(isset($_GET['compte']))
{
	if($_GET['compte'] == "client")
	{
if(isset($_GET['nom']) and isset($_GET['prenom']) and isset($_GET['datenaiss']) and isset($_GET['email']) and isset($_GET['adresse']) and isset($_GET['pass']) and isset($_GET['tel']))
{
	setcookie('nom', $_GET['nom'], time() + 365*24*3600, null, null, false, true);
	setcookie('prenom', $_GET['prenom'], time() + 365*24*3600, null, null, false, true);
	setcookie('datenaiss', $_GET['datenaiss'], time() + 365*24*3600, null, null, false, true);
	setcookie('email1', $_GET['email'], time() + 365*24*3600, null, null, false, true);
	setcookie('adresse', $_GET['adresse'], time() + 365*24*3600, null, null, false, true);
	setcookie('pass', $_GET['pass'], time() + 365*24*3600, null, null, false, true);
	setcookie('tel', $_GET['tel'], time() + 365*24*3600, null, null, false, true);
	setcookie('fid', $_GET['fid'], time() + 365*24*3600, null, null, false, true);
	
	header("location: accounts.php?compte=client");
}
	}
	else
	{
if(isset($_GET['nom']) and isset($_GET['email']) and isset($_GET['pass']) and isset($_GET['tel']) and isset($_GET['img']))
{
	setcookie('nom1', $_GET['nom'], time() + 365*24*3600, null, null, false, true);
	setcookie('email2', $_GET['email'], time() + 365*24*3600, null, null, false, true);
	setcookie('pass1', $_GET['pass'], time() + 365*24*3600, null, null, false, true);
	setcookie('tel1', $_GET['tel'], time() + 365*24*3600, null, null, false, true);
	setcookie('img', $_GET['img'], time() + 365*24*3600, null, null, false, true);
	
	header("location: accounts.php?compte=admin");
}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="description"
        content="AJAX Live Search is a PHP search form that similar to Google Autocomplete feature displays the result as you type" />
    <meta name="keywords"
        content="Ajax Live Search, Autocomplete, Auto Suggest, PHP, HTML, CSS, jQuery, JavaScript, search form, MySQL, web component, responsive" />
    <meta name="author" content="Ehsan Abbasi" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <!-- Live Search Styles -->
    <link rel="stylesheet" href="css/fontello.css" />
    <link rel="stylesheet" href="css/animation.css" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/fontello-ie7.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/ajaxlivesearch1.css" />
</head>

<body class="bg03">
    <div class="container">
	<?php include("codex/header.php"); ?>
        <!-- row -->
    <?php
	if(isset($_GET['compte']))
	{
		if($_GET['compte'] == "client")
		{
			include("codex/client.php");
		}
		else
		{
		include("codex/administrateur.php");
		}
        
	}
	else
	{
		include("codex/administrateur.php");
	}
    ?>
        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018. Created by
                    <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->

    <script src="js/jquery-1.11.1.min.js"></script>

    <!-- Live Search Script -->
    <script type="text/javascript" src="js/ajaxlivesearch.min.js"></script>

    <script>
jQuery(document).ready(function(){
    jQuery(".mySearch").ajaxlivesearch({
        loaded_at: <?php echo time(); ?>,
        token: <?php echo "'" . $handler->getToken() . "'"; ?>,
        max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
        onResultClick: function(e, data) {
            // get the index 0 (first column) value
            var selectedOne = jQuery(data.selected).find('td').eq('0').text();

            // set the input value
            jQuery('#ls_query').val(selectedOne);

            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
        },
        onResultEnter: function(e, data) {
            // do whatever you want
            // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
        },
        onAjaxComplete: function(e, data) {

        }
    });
})
    </script>
</body>

</html>