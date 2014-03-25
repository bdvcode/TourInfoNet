<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$urli = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$text = explode("/", htmlspecialchars($urli));
$urlLang = next($text);
?>
	<!DOCTYPE HTML>
<html lang="<?=$urlLang?>">
<head>
<?$APPLICATION->ShowHead();?>
<?$APPLICATION->ShowHead();?>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>TourInfoNet.net</title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/css/normalize.css"/>
	<link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/css/main.css"/>
	<link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH ?>/css/scroll.css"/>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?switch($urlLang):
case "ru":?>
	<script type="text/javascript">
		var trnsl = {
			langCode : 'ru',
			readmore : 'Подробнее',
			hide : 'Скрыть'
		};
	</script>
<?break;?>
<?case "en":?>
	<script type="text/javascript">
		var trnsl = {
			langCode : 'en',
			readmore : 'Read more',
			hide : 'Hide'
		};
	</script>
<?break;?>
<?case "lt":?>
	<script type="text/javascript">
		var trnsl = {
			langCode : 'lt',
			readmore : 'Read more',
			hide : 'Hide'
		};
	</script>
<?break;?>
<?case "pl":?>
	<script type="text/javascript">
		var trnsl = {
			langCode : 'pl',
			readmore : 'Read more',
			hide : 'Hide'
		};
	</script>
	<?break;?>
<?endswitch;?>


	<!-- JQuery -->
	<script src="<?php echo SITE_TEMPLATE_PATH ?>/js/jquery.min.js"></script>
	<script src="<?php echo SITE_TEMPLATE_PATH ?>/js/gmaps.js"></script>
	<script src="<?php echo SITE_TEMPLATE_PATH ?>/js/lib.jquery.js"></script>

	<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/js/selectivizr-min.js"></script><![endif]-->

	<!-- JS -->
	<script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo SITE_TEMPLATE_PATH ?>/js/functions.js"></script>
	<!--	<script type="text/javascript" src="--><?php //echo SITE_TEMPLATE_PATH ?><!--/js/map.js"></script>-->

</head><?$APPLICATION->ShowPanel();?>
	<body><? // $APPLICATION->ShowPanel();?>