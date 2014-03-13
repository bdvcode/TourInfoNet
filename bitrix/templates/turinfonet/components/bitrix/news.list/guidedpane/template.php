<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="guidedPane">
	<div id="guidedContent">


		<div class="guided_header afterclr">
			<div class="guided_header_cell col1"><span>Place</span></div>
			<div class="guided_header_cell col2"><span>Route</span></div>
			<div class="guided_header_cell col3"><span>Contacts</span></div>
		</div><!-- guided_header -->
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<div class="guided_item afterclr">
			<div class="guided_item_cell guided_item_place col1"><div><?$countrId =$arItem["PROPERTIES"]["country"]["VALUE"];$res = CIBlockSection::GetByID($countrId);if($ar_res = $res->GetNext())echo $ar_res['NAME'];?>
				, <?$cityId=$arItem["PROPERTIES"]["city"]["VALUE"];$res = CIBlockElement::GetByID($cityId);if($ar_res = $res->GetNext())echo $ar_res['NAME'];?>
				</div></div>
			<div class="guided_item_cell col2">
				<div>
					<div class="guided_item_title"><?=$arItem["NAME"]?></div>
					<div class="guided_item_preview"><?=$arItem["PREVIEW_TEXT"]?></div>
				</div>
			</div>
			<div class="guided_item_cell col3">
				<div>
					<div class="guided_item_cont_title"><?=$arItem["PROPERTIES"]["org"]["VALUE"]?></div>
					<div class="guided_item_contacts">
						T: <?=$arItem["PROPERTIES"]["tel"]["VALUE"]?> <br/>
						<a href="mailto:<?=$arItem["PROPERTIES"]["email"]["VALUE"]?>"><?=$arItem["PROPERTIES"]["email"]["VALUE"]?></a>
					</div>
				</div>
			</div>
		</div><!-- guided_item -->
		<?endforeach;?>
	</div><!-- guidedContent -->
</div>