<?
//Подключаем API битрикса
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//Отключаем статистику Bitrix
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);?>
<?
$url_country = $_GET['country'];
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

	$arFilter, false, false, $arSelect); // Вызов
while($ob = $res->GetNextElement()):?>
	<?$arFields = $ob->GetFields();
	$cityCode = $arFields['CODE'];
	$cityId = $arFields['ID'];
	$url_city_get = $_GET['city'];
	if($url_city_get == $cityCode){
		$url_city=	$cityId;
	}



	$res_sect = CIBlockSection::GetByID( $arFields["IBLOCK_SECTION_ID"]);
	if($ar_res_sect = $res_sect->GetNext()){
		$countryCode = $ar_res_sect['CODE'];
		$countryId = $ar_res_sect['ID'];
		$url_country_get = $_GET['country'];
		if($url_country_get==$countryCode ){
			$url_country = $countryId;
		}
	}
	?>
<?endwhile;?>
<?

$from = date_create($_GET['date']);
if($from){
$fromStart = $from->getTimestamp();
$mathTo = $fromStart + 31556926;

$fromArr = strftime("%d.%m.%Y",$fromStart);
$toArr =strftime("%d.%m.%Y",$mathTo);

	$GLOBALS['arrFilterDate'] = array(
		">=DATE_ACTIVE_FROM" => $fromArr,
		"<=DATE_ACTIVE_FROM" => $toArr,
		"PROPERTY" => array(

			"country"=>$url_country
		));
}
?>

<!--
<?=$url_country?></br>
<?=$fromArr;?>
</br>
<?=$toArr;?>
-->

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"guidedpane",
	Array(
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "text_pages",
		"IBLOCK_ID" => "13",
		"NEWS_COUNT" => "100",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilterDate",
		"FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT"),
		"PROPERTY_CODE" => array("email", "org", "tel","country"),
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	)
);?>
