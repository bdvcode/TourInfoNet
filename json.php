<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$res = CIBlockElement::GetByID(321);
if($ar_res = $res->GetNext())
	echo $ar_res['PREVIEW_TEXT'];
?> cxv