<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
{
<?
$arr = array();
foreach($arResult["ITEMS"] as $arItem):?>

	"id<?echo ($arItem["ID"]);?>": {
	"name": <?echo json_encode($arItem["NAME"]);?>,
	"LatLng": [<?echo ($arItem["PROPERTIES"]["cord"]["VALUE"]);?>],
	"contacts": "<b>Контакты:</b> <?echo ($arItem["PROPERTIES"]["contacts"]["VALUE"]);?><br/><b>Адресс</b> <?echo ($arItem["PROPERTIES"]["adrr"]["VALUE"]);?><br/><b>Телефон</b>:</b> <?echo ($arItem["PROPERTIES"]["tel"]["VALUE"]);?><br/> <b>E-mail:</b><?echo ($arItem["PROPERTIES"]["email"]["VALUE"]);?><br/> <b>Web:</b> <?echo ($arItem["PROPERTIES"]["Web"]["VALUE"]);?>",
	"text": <?echo json_encode($arItem["DETAIL_TEXT"]);?>
	}
	<?if($arItem === end($arResult["ITEMS"])):?>
		<?else:?>
		,
	<?endif;?>
<?endforeach;?>
}

