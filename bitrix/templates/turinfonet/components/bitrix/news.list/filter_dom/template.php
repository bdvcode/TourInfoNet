<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$counter =0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$f_id=$arItem["PROPERTIES"]["type"]["VALUE"];?>

	<?
	$res = CIBlockElement::GetByID($f_id);
	if($ar_res = $res->GetNext())
		echo $ar_res['CODE'];
	?>

	</br><?=$f_id?>

<?endforeach;?>