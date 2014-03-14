<?
//Подключаем API битрикса
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//Отключаем статистику Bitrix
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);?>

<?
$from = date_create($_GET['date']);
if($from){
$fromStart = $from->getTimestamp();
$mathTo = $fromStart + 604800;

$fromArr = strftime("%d.%m.%Y",$fromStart);
$toArr =strftime("%d.%m.%Y",$mathTo);

$arrFilterDate = Array(
	">=DATE_ACTIVE_FROM" => $fromArr,
	"<=DATE_ACTIVE_FROM" => $toArr);
}
?>

<?=$fromArr;?>
</br>
<?=$toArr;?>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"guidedpane",
	Array(
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "text_pages",
		"IBLOCK_ID" => "13",
		"NEWS_COUNT" => "100",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilterDate",
		"FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT"),
		"PROPERTY_CODE" => array("email", "org", "tel"),
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
