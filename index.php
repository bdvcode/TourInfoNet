<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("show_timestamp_x", "N");
$APPLICATION->SetTitle("");
header( 'Location: http://tin.brandivision.ru/en/', true, 301 ); // сделать переадресацию с помощью 301 редиректа на поиск в яндексе слова redirect.
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/main.php",
		"EDIT_TEMPLATE" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>