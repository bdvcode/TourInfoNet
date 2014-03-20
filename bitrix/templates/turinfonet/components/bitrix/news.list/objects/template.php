<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
{
<?
$arr = array();
foreach($arResult["ITEMS"] as $arItem):?>

	"id<?echo ($arItem["ID"]);?>": {
	"name": <?echo json_encode($arItem["NAME"]);?>,
	"LatLng": [<?echo ($arItem["PROPERTIES"]["cord"]["VALUE"]);?>],
	"contacts": "<b>Contacts:</b> <?echo ($arItem["PROPERTIES"]["contacts"]["VALUE"]);?>",
	"text": <?echo json_encode($arItem["DETAIL_TEXT"]);?>
	}
	<?if($arItem === end($arResult["ITEMS"])):?>
		<?else:?>
		,
	<?endif;?>
<?endforeach;?>
}

