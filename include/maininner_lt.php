<div id="mainInner">


<div class="mainnav">

	<div class="mainnav_border"></div>

	<ul class="mainnav_ul" id="mainnavUl">
		<li class="mainnav_map_li mainnav_main_li" data-link="/" data-index="0"><div><i><b class="sprite-home_w"></b></i></div></li>
		<li class="mainnav_text_li" data-link="/useful-info/" data-index="1"><div><i><b class="sprite-info_w"></b></i></div></li>
		<li class="mainnav_map_li" data-link="/where-to-stay/" data-index="2"><div><i><b class="sprite-hotel_w"></b></i></div></li>
		<li class="mainnav_map_li" data-link="/what-to-see/" data-index="3"><div><i><b class="sprite-attractions_w"></b></i></div></li>
		<li class="mainnav_text_li" data-link="/transport/" data-index="4"><div><i><b class="sprite-auto_w"></b></i></div></li>
		<li class="mainnav_map_li" data-link="/where-to-eat/" data-index="5"><div><i><b class="sprite-food_w"></b></i></div></li>
		<li class="mainnav_guided_li" data-link="/guided-tours/" data-index="6"><div><i><b class="sprite-excours_w"></b></i></div></li>
	</ul>

	<a href="" class="bdv">Website by<br/>Brandivision</a>

</div><!-- mainnav -->


<div class="first_fltr_pane_wrap">
<div class="first_fltr_pane_shadow"></div>

<div class="first_fltr_pane_cont">

<div data-index="0" class="first_fltr_pane map_pane">

	<div class="mp_hello">

		<div class="mp_hello_logo sprite-mp_hello_logo"></div>

		<h1>Welcome on<br/>TourInfoNet!</h1>

		<p>Set up an online directory portal of any type – companies, shops, restaurants, real estate, websites and so on in no time with
			TourInfoNet.</p>
	</div>
</div><!-- first_fltr_pane -->

<div data-index="1" class="first_fltr_pane">

	<div class="ip_ff_header">
		<div class="ip_ff_header_ico sprite-info_b"></div>
		<h1>Important Info</h1>
		<p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>

	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"side_menu",
		Array(
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"AJAX_MODE" => "N",
			"IBLOCK_TYPE" => "text_pages",
			"IBLOCK_ID" => "14",
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_ORDER1" => "DESC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(),
			"PROPERTY_CODE" => array(),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
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
		),
		false
	);?>

</div><!-- first_fltr_pane -->

<div data-index="2" class="first_fltr_pane map_pane">

	<div class="ip_ff_header">
		<div class="ip_ff_header_ico sprite-hotel_b"></div>
		<h1>Where to stay</h1>
		<p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>

	<div class="ip_ff_subcat_wrap">

		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/city_country_ru.php",
				"EDIT_TEMPLATE" => ""
			)
		);?>

		<h3>Price</h3>
		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Ru
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<div class="ip_ff_subcat checkbox map_f1" data-price="<?echo($arFields['ID']);?>"><?echo($arFields['NAME']);?></div>
		<?endwhile;?>


		<h3>Category</h3>
		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>10,"SECTION_ID"=>31, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Ru
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<div class="ip_ff_subcat checkbox map_f1" data-type="<?echo($arFields['ID']);?>"><?echo($arFields['NAME']);?></div>
		<?endwhile;?>

	</div><!-- ip_ff_subcat_wrap -->

</div><!-- first_fltr_pane -->

<div data-index="3" class="first_fltr_pane map_pane"> <!-- what-to-see -->

	<div class="ip_ff_header">
		<div class="ip_ff_header_ico sprite-attractions_b"></div>
		<h1>Attractions</h1>
		<p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>

	<div class="ip_ff_subcat_wrap">

		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/city_country_ru.php",
				"EDIT_TEMPLATE" => ""
			)
		);?>


		<h3>Category</h3>
		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>10,"SECTION_ID"=>30, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Ru
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<div class="ip_ff_subcat checkbox map_f1" data-type="<?echo($arFields['ID']);?>"><?echo($arFields['NAME']);?></div>
		<?endwhile;?>


		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>10,"SECTION_ID"=>32, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Ru
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<?$typeID = $arFields['ID'];?>
			</br>
			<?$db_props = CIBlockElement::GetProperty(7, $typeID, "sort", "asc", Array("CODE"=>"type"));
			if($ar_props = $db_props->Fetch()):
				$ar1[] = $ar_props["VALUE"];
			endif;?>
		<?endwhile;?>
		<?
		$arr_fl = (array_count_values ($ar1));
		while(current($arr_fl)):?>
			<?$value = key($arr_fl);
			next($arr_fl);
			$typeID_fl = $value;
			?>
			<?
			$res = CIBlockElement::GetByID($typeID_fl);
			if($ar_res = $res->GetNext()):?>


				<div class="ip_ff_subcat checkbox map_f1" data-type="<?echo($ar_res['ID']);?>"><?echo($ar_res['NAME']);?></div>
			<?endif;?>
		<?endwhile;?>



	</div><!-- ip_ff_subcat_wrap -->

</div><!-- first_fltr_pane -->

<div data-index="4" class="first_fltr_pane">

	<div class="ip_ff_header">
		<div class="ip_ff_header_ico sprite-auto_b"></div>
		<h1>Transport</h1>
		<p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>

	/
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"side_menu",
		Array(
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"AJAX_MODE" => "N",
			"IBLOCK_TYPE" => "text_pages",
			"IBLOCK_ID" => "12",
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_ORDER1" => "DESC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(),
			"PROPERTY_CODE" => array(),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
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
		),
		false
	);?>
</div><!-- first_fltr_pane -->

<div data-index="5" class="first_fltr_pane map_pane">

	<div class="ip_ff_header">
		<div class="ip_ff_header_ico sprite-food_b"></div>
		<h1>Food and drink</h1>
		<p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>

	<div class="ip_ff_subcat_wrap">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/city_country_ru.php",
				"EDIT_TEMPLATE" => ""
			)
		);?>


		<h3>Category</h3>

		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>10,"SECTION_ID"=>29, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Ru
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<div class="ip_ff_subcat checkbox map_f1" data-type="<?echo($arFields['ID']);?>"><?echo($arFields['NAME']);?></div>
		<?endwhile;?>





	</div><!-- ip_ff_subcat_wrap -->

</div><!-- first_fltr_pane -->

<div data-index="6" class="first_fltr_pane guided_pane">

	<div class="ip_ff_header">
		<div class="ip_ff_header_ico sprite-excours_b"></div>
		<h1>Guided tours</h1>
		<p>This is our list of premier destinations, lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>

	<div class="ip_ff_subcat_wrap">
		<h3>Country</h3>
		<div class="niceselect_wrap">
			<select name="countrySelect" class="niceselect countrySelect">
				<option value="">Chose country</option>
				<?if(CModule::IncludeModule("iblock")):
					// выборка только активных разделов из инфоблока $IBLOCK_ID, $ID - раздел-родителя
					$arFilter = Array('IBLOCK_ID'=>9, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$ID);
					$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
					while($ar_result = $db_list->GetNext()):?>
						<option value="<?=$ar_result['CODE']?>"><?=$ar_result['NAME']?></option>
					<?endwhile;?>
				<?endif;?>
			</select>
		</div>

		<!-- date filter-->
		<div id="js-guid_tours_datepicker" class="datepicker"></div>
		<input id="js-guid_tours_datepicker_input" type="text"/>

	</div><!-- ip_ff_subcat_wrap -->






</div><!-- first_fltr_pane -->

</div><!-- first_fltr_pane_cont-->

</div><!-- first_fltr_pane_wrap -->



<div class="second_fltr_pane">
	<div class="first_fltr_pane_shadow"></div>
	<!--<h2 id="secondFltrPaneHeader"></h2>
	<div id="secondFltrPaneDescr"></div>-->
	<div class="second_fltr_pane_cont">
		<div id="secondFltrPaneCont"></div>
	</div>

</div><!-- second_fltr_pane -->


