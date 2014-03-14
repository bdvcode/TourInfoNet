<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="ip_ff_subcat_wrap">

		<?
		foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;
			?>
			<?if($arItem["SELECTED"]):?>

			<a href="<?=$arItem["LINK"]?>" class="ip_ff_subcat btn tp_ajax active"><?=$arItem["TEXT"]?></a>
		<?else:?>
			<a href="<?=$arItem["LINK"]?>" class="ip_ff_subcat btn tp_ajax"><?=$arItem["TEXT"]?></a>
		<?endif?>

		<?endforeach?>

</div>
<?endif?>