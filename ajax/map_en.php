<?
//Подключаем API битрикса
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
//Отключаем статистику Bitrix
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);?>
<?
$url_category = $_GET['category'];
$url_type_get = $_GET['type'];
$url_country = $_GET['country'];
$url_city = $_GET['city'];
$url_price = $_GET['price'];
?>
<?
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
CModule::IncludeModule("iblock");
$arSelect1 = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
$arFilter1 = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res1 = CIBlockElement::GetList(Array("SORT"=>"ASC"),

	$arFilter1, false, false, $arSelect1); // Вызов
while($ob1 = $res1->GetNextElement()):?>
	<?$arFields1 = $ob1->GetFields();?>
	<?
	$typeCode = $arFields1['CODE'];
	$typeIdC = $arFields1['ID'];
	$url_type_get_url = $_GET['type'];
	$res_sect = CIBlockSection::GetByID( $arFields1["IBLOCK_SECTION_ID"]);
	if($ar_res_sect = $res_sect->GetNext()){
		$catCode = $ar_res_sect['CODE'];
		$catId = $ar_res_sect['ID'];
		$url_category_get = $_GET['category'];
		if($catCode == $url_category_get){
			$url_category = $catId;
		}
	}
	?>
<?endwhile;?>
<?
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

	$arFilter, false, false, $arSelect); // Вызов
while($ob = $res->GetNextElement()):?>
	<?$arFields = $ob->GetFields();
	$priceCode = $arFields['CODE'];
	$priceId =  $arFields['ID'];
	$url_price_get = $_GET['type'];
	if($url_price_get==$priceCode){
		$url_price = $priceId;
	}
	?>
<?endwhile;?>
<?$GLOBALS['runningFilter'] = array("PROPERTY" => array(
	"category"=>$url_category,
	"type"=>$url_type_get,
	"country"=>$url_country,
	"city"=>$url_city,
	"price"=>$url_price
));?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"objects_en",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "objects_map",
		"IBLOCK_ID" => "7",
		"NEWS_COUNT" => "9999",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "runningFilter",
		"FIELD_CODE" => array("DETAIL_TEXT","DETAIL_PICTURE"),
		"PROPERTY_CODE" => array("category","type","country","city","price","detail_text_lt","detail_text_pl","detail_text_en","contacts_lt","contacts_pl","contacts_en","adrr_en","Web","tel","email","contacts"),
		"CHECK_DATES" => "Y",
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
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
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
	),
	false
);?>