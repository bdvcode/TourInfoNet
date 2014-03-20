<?
global  $urlLang;
$urli = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$text = explode("/", htmlspecialchars($urli));
$urlLang = next($text);
if($urlLang=="ru"){
	echo("Yarr!");
}
?>

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

			<div class="header_lang_item en">
                <i></i><span class="label">English</span>
			</div>
			<div class="header_lang_item lt">
                <i></i><span class="label">Lietùvių</span>
			</div>
			<div class="header_lang_item pl">
                <i></i><span class="label">Polski</span>
			</div>
		</div><!-- header_lang_options -->

	</div><!-- header_lang_wrap -->

</div><!-- header -->
<?switch($urlLang){
case "en":
       $APPLICATION->IncludeComponent(
		   "bitrix:main.include",
		   "",
		   Array(
			   "AREA_FILE_SHOW" => "file",
			   "PATH" => SITE_DIR."include/maininner_en.php",
			   "EDIT_TEMPLATE" => ""
		   )
	   );
        break;
	case "ru":
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/maininner_ru.php",
				"EDIT_TEMPLATE" => ""
			)
		);
		break;
		case "pl":
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/maininner_pl.php",
				"EDIT_TEMPLATE" => ""
			)
		);
		break;
	case "lt":
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/maininner_lt.php",
				"EDIT_TEMPLATE" => ""
			)
		);
		break;
}
;?>