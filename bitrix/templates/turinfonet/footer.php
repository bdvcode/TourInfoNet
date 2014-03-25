<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<?
$urli = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$text = explode("/", htmlspecialchars($urli));
$urlLang = next($text);
?>
</div><!-- mainInner -->

<div class="update"></div>


</div><!-- mainwrapper -->

<div id="mpContent">
	<div class="mp_selCat">

		<div class="close_btn js-mpSelCatClose"></div>


	<?if($urlLang == "en"):?>
		<h2>Please, choose your category</h2>
		<div class="mp_selCat_in">
			<div class="mp_selCat_item"><div class="table"><i><b class="sprite-info_g"></b></i></div><h3>Useful<br/>info</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/useful-info/"></div></div>
			<div class="mp_selCat_item"><div class="table"><i><b class="sprite-hotel_g"></b></i></div><h3>Where to stay</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-stay/"></div></div>
			<div class="mp_selCat_item"><div class="table"><i><b class="sprite-attractions_g"></b></i></div><h3>Attractions</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/what-to-see/"></div></div>
			<div class="mp_selCat_item"><div class="table"><i><b class="sprite-auto_g"></b></i></div><h3>Transport</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/transport/"></div></div>
			<div class="mp_selCat_item"><div class="table"><i><b class="sprite-food_g"></b></i></div><h3>Food and drink</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-eat/"></div></div>
			<div class="mp_selCat_item"><div class="table"><i><b class="sprite-excours_g"></b></i></div><h3>Guided tours</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/guided-tours/"></div></div>
			<div class="clr"></div>
		</div><!-- mp_selCat_in -->
		<div class="bluebtn mp_big_close js-mpSelCatClose"><span>Close</span></div>
		<?endif;?>
		<?if($urlLang == "ru"):?>
			<h2>Выберите категорию</h2>
			<div class="mp_selCat_in">
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-info_g"></b></i></div><h3>Важная<br/>информация</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/useful-info/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-hotel_g"></b></i></div><h3>Где остановиться</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-stay/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-attractions_g"></b></i></div><h3>Что посмотреть</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/what-to-see/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-auto_g"></b></i></div><h3>Как добраться</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/transport/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-food_g"></b></i></div><h3>Где поесть</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-eat/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-excours_g"></b></i></div><h3>Экскурсии</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/guided-tours/"></div></div>
				<div class="clr"></div>
			</div>
			<div class="bluebtn mp_big_close js-mpSelCatClose"><span>Закрыть</span></div>
		<?endif;?>

		<?if($urlLang == "pl"):?>
			<h2>Please, choose your category</h2>
			<div class="mp_selCat_in">
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-info_g"></b></i></div><h3>Useful<br/>info</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/useful-info/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-hotel_g"></b></i></div><h3>Where to stay</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-stay/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-attractions_g"></b></i></div><h3>Attractions</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/what-to-see/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-auto_g"></b></i></div><h3>Transport</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/transport/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-food_g"></b></i></div><h3>Food and drink</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-eat/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-excours_g"></b></i></div><h3>Guided tours</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/guided-tours/"></div></div>
				<div class="clr"></div>
			</div><!-- mp_selCat_in -->
			<div class="bluebtn mp_big_close js-mpSelCatClose"><span>Close</span></div>
		<?endif;?>

		<?if($urlLang == "lt"):?>
			<h2>Please, choose your category</h2>
			<div class="mp_selCat_in">
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-info_g"></b></i></div><h3>Useful<br/>info</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/useful-info/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-hotel_g"></b></i></div><h3>Where to stay</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-stay/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-attractions_g"></b></i></div><h3>Attractions</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/what-to-see/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-auto_g"></b></i></div><h3>Transport</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/transport/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-food_g"></b></i></div><h3>Food and drink</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/where-to-eat/"></div></div>
				<div class="mp_selCat_item"><div class="table"><i><b class="sprite-excours_g"></b></i></div><h3>Guided tours</h3><div class="mp_selCat_item_lnk" data-link="/<?=$urlLang?>/guided-tours/"></div></div>
				<div class="clr"></div>
			</div><!-- mp_selCat_in -->
			<div class="bluebtn mp_big_close js-mpSelCatClose"><span>Close</span></div>
		<?endif;?>

	</div><!-- mp_selCat -->
</div>

<div id="no_found_popup_wrap">
	<div id="no_found_popup" class="b_popup">
		Объектов не найдено. Попробуйте изменить параметры фильтрации.
	</div>
</div>
</body>
</html>