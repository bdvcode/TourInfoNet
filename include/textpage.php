<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/mainpan.php",
		"EDIT_TEMPLATE" => ""
	)
);?>
<div class="mainInnerMap" id="mainMapContainer">
	<div id="tpContentPane">
		<div class="tpContent_inner_topbrdr"></div>
		<div class="tpContent_inner_botbrdr"></div>
		<div id="tpContent">
			<div class="tpContent_inner">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.detail",
					"textpage",
					Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"USE_SHARE" => "N",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "text_pages",
						"IBLOCK_ID" => "14",
						"ELEMENT_ID" => $_REQUEST["ID"],
						"ELEMENT_CODE" => "",
						"CHECK_DATES" => "Y",
						"FIELD_CODE" => array(),
						"PROPERTY_CODE" => array("name_pl","name_lt","text_pl","text_lt","desc_lt","name_en","text_en","name_ru","text_ru"),
						"IBLOCK_URL" => "",
						"META_KEYWORDS" => "-",
						"META_DESCRIPTION" => "-",
						"BROWSER_TITLE" => "-",
						"SET_TITLE" => "Y",
						"SET_STATUS_404" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
						"ADD_SECTIONS_CHAIN" => "Y",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"USE_PERMISSIONS" => "N",
						"CACHE_TYPE" => "N",
						"CACHE_TIME" => "36000000",
						"CACHE_NOTES" => "",
						"CACHE_GROUPS" => "Y",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "Страница",
						"PAGER_SHOW_ALL" => "Y",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N"
					),
					false
				);?>
			</div>
		</div><!-- tpContent -->

	</div><!-- tpContentPane -->

</div><!-- mainInnerMap -->

