<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
global  $urlLang;
$urli = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$text = explode("/", htmlspecialchars($urli));
$urlLang = next($text);
?>
<?switch($urlLang){
	case "en":
		echo '<h3>'.$arResult["PROPERTIES"]["name_en"]["VALUE"].'</h3>';
		echo (htmlspecialcharsBack($arResult["PROPERTIES"]["text_en"]["VALUE"]["TEXT"]));
	break;
	case "ru":
		echo '<h3>'.$arResult["PROPERTIES"]["name_ru"]["VALUE"].'</h3>';
		echo (htmlspecialcharsBack($arResult["PROPERTIES"]["text_ru"]["VALUE"]["TEXT"]));
		break;
	case "pl":
		echo '<h3>'.$arResult["PROPERTIES"]["name_pl"]["VALUE"].'</h3>';
		echo (htmlspecialcharsBack($arResult["PROPERTIES"]["text_pl"]["VALUE"]["TEXT"]));
		break;
	case "lt":
		echo '<h3>'.$arResult["PROPERTIES"]["name_lt"]["VALUE"].'</h3>';
		echo (htmlspecialcharsBack($arResult["PROPERTIES"]["text_lt"]["VALUE"]["TEXT"]));
		break;
};?>
