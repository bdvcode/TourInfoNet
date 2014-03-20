<?
//Подключаем API битрикса
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//Отключаем статистику Bitrix
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);?>
<? $ee = CIBlockElement::GetProperty(15, 414, "sort", "asc", Array("CODE"=>"desc_en"));if($ee = $ee->Fetch()):echo htmlspecialcharsBack($ee["VALUE"]["TEXT"]); endif;?>