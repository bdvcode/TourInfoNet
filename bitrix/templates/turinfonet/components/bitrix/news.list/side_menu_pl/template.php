<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ip_ff_subcat_wrap">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<a href="/pl/<?=$arItem["DETAIL_PAGE_URL"]?>" class="ip_ff_subcat btn tp_ajax"><?=$arItem["PROPERTIES"]["name_pl"]["VALUE"]?></a>
	<?endforeach;?>
</div>