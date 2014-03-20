<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arResult["PROPERTIES"]["header_en"]["VALUE"]):?><h1><?=$arResult["PROPERTIES"]["header_pl"]["VALUE"]?></h1><?endif;?>
<?=htmlspecialcharsBack($arResult["PROPERTIES"]["desc_rutextelmt_pl"]["VALUE"]["TEXT"])?>