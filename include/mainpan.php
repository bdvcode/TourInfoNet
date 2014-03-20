<?
global  $urlLang;
$urli = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$text = explode("/", htmlspecialchars($urli));
$urlLang = next($text);
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
			<div class="header_lang_item <?=$urlLang?>">
				<span class="label"><?=$urlLang?></span><i></i>
			</div>
		</div>
		<div class="lang_controls_ico"></div>

		<div class="header_lang_options">

			<?
			$i = 1;
			$langarr = array("ru","en","lt","pl");
			?>
			<?foreach($langarr as $lan):?>
				<?if($lan==$urlLang):?>
				<?else:?>
					<a href="/<?=$lan?>/" class="header_lang_item <?=$lan?>">
						<i></i><span class="label"><?switch($lan)
		{
						case "ru":
							echo "Русский";
							break;
						case "en":
							echo "English";
							break;
						case "pl":
							echo "Polski";
							break;
			case "lt":
				echo "Lietùvių";
				break;
					}?></span>
					</a>
					<?endif;?>

			<?endforeach;?>




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