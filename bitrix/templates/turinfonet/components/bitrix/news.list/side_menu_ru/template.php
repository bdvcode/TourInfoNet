<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ip_ff_subcat_wrap">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<a href="/ru/<?=$arItem["DETAIL_PAGE_URL"]?>" class="ip_ff_subcat btn tp_ajax"><?=$arItem["PROPERTIES"]["name_ru"]["VALUE"]?></a>
	<?endforeach;?>
</div>