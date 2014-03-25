<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arResult["PROPERTIES"]["header_lt"]["VALUE"]):?><h1><?=$arResult["PROPERTIES"]["header_lt"]["VALUE"]?></h1><?endif;?>
<?=htmlspecialcharsBack($arResult["PROPERTIES"]["desc_lt"]["VALUE"]["TEXT"])?>