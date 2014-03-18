<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ip_ff_subcat_wrap">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="ip_ff_subcat btn tp_ajax"><?=$arItem["NAME"]?></a>
	<?endforeach;?>
</div>