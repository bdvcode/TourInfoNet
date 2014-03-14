<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="guidedPane">
	<div id="guidedContent">


		<div class="guided_header afterclr">
			<div class="guided_header_cell col1"><span>Place</span></div>
			<div class="guided_header_cell col2"><span>Route</span></div>
			<div class="guided_header_cell col3"><span>Contacts</span></div>
		</div><!-- guided_header -->
		<?
		$paramNameM = 'PAGEN_'.$arResult['NAV_RESULT']->NavNum;
		$paramValueM = $arResult['NAV_RESULT']->NavPageNomer;
		$pageCountM = $arResult['NAV_RESULT']->NavPageCount;

if(($paramValueM - 1) > 0){
		$paramValueM = (int) $paramValueM - 1;
		$urlM = htmlspecialcharsbx(
			$APPLICATION->GetCurPageParam(
				sprintf('%s=%s', $paramNameM, $paramValueM),
				array($paramNameM, 'AJAX_PAGE',)
			)
		);
		echo sprintf('<a href="%s">Вперёд</a>',
			$urlM);
		}
		?>
		<?if(isset($_GET['AJAX_PAGE'])) { $APPLICATION->RestartBuffer(); };?>

		<?foreach($arResult["ITEMS"] as $arItem1):?>
			<?$count++?>

		<?endforeach;?>
		<?$count=0;?>
		<?$count1=0;?>
				<?foreach($arResult["ITEMS"] as $arItem):?>

						<?$count++?>

							<div class="guided_date afterclr">
								<div class="guided_date_inner"><?=$arItem1["DISPLAY_ACTIVE_FROM"]?> <?=$count?></div>
							</div>




					<div class="guided_item afterclr"><?=$counter?></br><?=$counter1?>
						<div class="guided_item_cell guided_item_place col1"><div><?$countrId =$arItem["PROPERTIES"]["country"]["VALUE"];$res = CIBlockSection::GetByID($countrId);if($ar_res = $res->GetNext())echo $ar_res['NAME'];?>,
								<?$cityId=$arItem["PROPERTIES"]["city"]["VALUE"];$res = CIBlockElement::GetByID($cityId);if($ar_res = $res->GetNext())echo $ar_res['NAME'];?>
							</div></div>
						<div class="guided_item_cell col2">
							<div>
								<div class="guided_item_title"><?=$arItem["NAME"]?> <?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
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



		<?if(isset($_GET['AJAX_PAGE'])) { die(); }?>

		<?
		$paramName = 'PAGEN_'.$arResult['NAV_RESULT']->NavNum;
		$paramValue = $arResult['NAV_RESULT']->NavPageNomer;
		$pageCount = $arResult['NAV_RESULT']->NavPageCount;

		if ($paramValue < $pageCount) {

			$paramValue = (int) $paramValue + 1;
			$url = htmlspecialcharsbx(
				$APPLICATION->GetCurPageParam(
					sprintf('%s=%s', $paramName, $paramValue),
					array($paramName, 'AJAX_PAGE',)
				)
			);
			echo sprintf('<a href="%s">Назад</a>',
				$url);


}




		?>
	</div><!-- guidedContent -->
</div>
