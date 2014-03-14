<div id="preloadPage">
    <div class="logo_transparent"><img src="/html/images/logo_transparent.png" alt="Loading..."/><div class="pulse"></div></div>
</div>

<div id="preloadImages"></div>



<div id="mainWrapper">

<div class="header">

    <a href="http://tin.brandivision.ru/" class="header_logo"><img src="/html/images/logo.png" alt="TourInfoNet.eu"/></a>

    <div class="header_search_wrap">
        <div class="header_search">
            <input type="submit" class="header_search_submit sprite-search_ico" />
            <input type="text" placeholder="Search hotels, restaurants and destinations" class="header_search_input" id="headerSearchInput" />
        </div><!-- header_search -->
    </div><!-- header_search_wrap -->

    <div class="header_lang_wrap">
        <div class="header_lang">
            <div class="header_lang_item ru">
                <span class="label">RU</span><i></i>
            </div>
        </div>
        <div class="lang_controls_ico"></div>

        <div class="header_lang_options">
            <div class="header_lang_options_arrow"></div>

            <div class="header_lang_item en">
                <span class="label">EN</span><i></i>
            </div>
            <div class="header_lang_item lt">
                <span class="label">LT</span><i></i>
            </div>
            <div class="header_lang_item pl">
                <span class="label">PL</span><i></i>
            </div>
        </div><!-- header_lang_options -->

    </div><!-- header_lang_wrap -->

</div><!-- header -->

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

<div data-index="0" class="first_fltr_pane">

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

    <div class="ip_ff_subcat_wrap">
        <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Visas</a>
        <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Entry regulations</a>
        <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Need to know</a>
    </div>

</div><!-- first_fltr_pane -->

<div data-index="2" class="first_fltr_pane">

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

<div data-index="3" class="first_fltr_pane"> <!-- what-to-see -->

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

    <div class="ip_ff_subcat_wrap">
        <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Train</a>
        <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Car</a>
        <a href="/html/textpage.html" class="ip_ff_subcat btn tp_ajax">Airplane</a>
    </div>

</div><!-- first_fltr_pane -->

<div data-index="5" class="first_fltr_pane">

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

<div data-index="6" class="first_fltr_pane">

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



<div class="mainInnerMap" id="mainMapContainer">


</div><!-- mainInnerMap -->


</div><!-- mainInner -->

<div class="update"></div>


</div><!-- mainwrapper -->

<div id="mpContent">
    <div class="mp_selCat">

        <div class="close_btn js-mpSelCatClose"></div>

        <h2>Please, choose your category</h2>

        <div class="mp_selCat_in">

            <div class="mp_selCat_item"><div class="table"><i><b class="sprite-info_g"></b></i></div><h3>Useful<br/>info</h3><div class="mp_selCat_item_lnk" data-link="/useful-info/"></div></div>
            <div class="mp_selCat_item"><div class="table"><i><b class="sprite-hotel_g"></b></i></div><h3>Where to stay</h3><div class="mp_selCat_item_lnk" data-link="/where-to-stay/"></div></div>
            <div class="mp_selCat_item"><div class="table"><i><b class="sprite-attractions_g"></b></i></div><h3>Attractions</h3><div class="mp_selCat_item_lnk" data-link="/what-to-see/"></div></div>
            <div class="mp_selCat_item"><div class="table"><i><b class="sprite-auto_g"></b></i></div><h3>Transport</h3><div class="mp_selCat_item_lnk" data-link="/transport/"></div></div>
            <div class="mp_selCat_item"><div class="table"><i><b class="sprite-food_g"></b></i></div><h3>Food and drink</h3><div class="mp_selCat_item_lnk" data-link="/where-to-eat/"></div></div>
            <div class="mp_selCat_item"><div class="table"><i><b class="sprite-excours_g"></b></i></div><h3>Guided tours</h3><div class="mp_selCat_item_lnk" data-link="/guided-tours/"></div></div>

            <div class="clr"></div>
        </div><!-- mp_selCat_in -->

        <div class="bluebtn mp_big_close js-mpSelCatClose"><span>Close</span></div>


    </div><!-- mp_selCat -->
</div>
