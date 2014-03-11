<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");

$infob_id = 7;
CModule::IncludeModule("iblock");
$arSelect = Array("ID","NAME","price","category", "city", "country", "type", "category");
$arFilter = Array("IBLOCK_ID"=> $infob_id, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),
$arFilter, false, false, $arSelect);
$counter = 0;
while($ob = $res->GetNextElement()):?>

<?$arFields = $ob->GetFields()?>
		<?$f_id = $arFields["ID"]?>
	<?$cat_id = CIBlockElement::GetProperty($infob_id, $f_id, "sort", "asc", Array("CODE"=>"category"));
	if($var_cat_id_value = $cat_id->Fetch()):
		$var_cat_id = ($var_cat_id_value["VALUE"]);
	endif;?>

	1 Category:
	<?$cat_id = CIBlockElement::GetProperty($infob_id, $f_id, "sort", "asc", Array("CODE"=>"category"));
	if($var_cat_id_value = $cat_id->Fetch()):
		$var_cat_id = ($var_cat_id_value["VALUE"]);
	endif;
	$res_section_name = CIBlockSection::GetByID($var_cat_id);
	if($section_name = $res_section_name->GetNext())
		echo $section_name['CODE'];
	?>

	2 Type:
	<?$type_id = CIBlockElement::GetProperty($infob_id, $f_id, "sort", "asc", Array("CODE"=>"category"));
	if($var_type_id_value = $type_id->Fetch()):
		$var_type_vl = ($var_type_id_value["VALUE"]);
	endif;
	$type_res = CIBlockElement::GetByID($var_type_vl);

	if($var_type_code = $type_res->GetNext())
		echo $var_type_code['CODE'];
	?>
	3 City:
	<?$city_id = CIBlockElement::GetProperty($infob_id, $f_id, "sort", "asc", Array("CODE"=>"city"));
	if($var_city_id_value = $city_id->Fetch()):
		$var_city_vl = ($var_city_id_value["VALUE"]);
	endif;
	$city_res = CIBlockElement::GetByID($var_city_vl);
	if($var_city_code = $city_res->GetNext())
		echo $var_city_code['CODE'];
	?>
	4 Country:
	<?$country_id = CIBlockElement::GetProperty($infob_id, $f_id, "sort", "asc", Array("CODE"=>"country"));
	if($var_country_id_value = $country_id->Fetch()):
		$var_country_id = ($var_country_id_value["VALUE"]);
	endif;
	$res_country_name = CIBlockSection::GetByID($var_country_id);
	if($country_name = $res_country_name->GetNext())
		echo $country_name['CODE'];
	?>
	5 Price:
	<?$price_id = CIBlockElement::GetProperty($infob_id, $f_id, "sort", "asc", Array("CODE"=>"price"));
	if($var_price_id_value = $price_id->Fetch()):
		$var_price_vl = ($var_price_id_value["VALUE"]);
	endif;
	$price_res = CIBlockElement::GetByID($var_price_vl);
	if($var_price_code = $price_res->GetNext())
		echo $var_price_code['CODE'];
	?>

</br>
<?endwhile;?>
</br>
</br>
</br>
</br>
<?
$url_price = $_GET['price'];
$url_type = $_GET['type'];
?>
<?print_r ($url_price);?></br>
<?print_r ($url_type);?>
</br>
</br>
</br>dsf
</br><?$db_props = CIBlockElement::GetProperty(346, 7, "sort", "asc", Array("CODE"=>"price"));if($ar_props = $db_props->Fetch()):echo $ar_props["VALUE"]; endif;?>
</br>
</br>
</br>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"filter_dom",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "objects_map",
		"IBLOCK_ID" => "7",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("category","type","country","city","price",),
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
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"objects",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "objects_map",
		"IBLOCK_ID" => "7",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("category","type","country","city","price",""),
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




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>