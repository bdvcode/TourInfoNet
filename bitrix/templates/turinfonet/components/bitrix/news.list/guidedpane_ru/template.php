<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="guidedPane">
	<div id="guidedContent">
        <div class="guidedContent_inner">

		<div class="guided_header afterclr">
			<div class="guided_header_cell col1"><span>Место</span></div>
			<div class="guided_header_cell col2"><span>Маршрут</span></div>
			<div class="guided_header_cell col3"><span>Контакты</span></div>
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
		<?if(isset($_GET['AJAX_PAGE'])) { $APPLICATION->RestartBuffer(); };
		$LastCreateDate = '';
		?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
					<?$date1 = ConvertDateTime($arItem["DISPLAY_ACTIVE_FROM"],"DD.MM.YYY", "ru");?>
	<? if($LastCreateDate != $date1):?>
				<?$LastCreateDate=$date1;?>
						<div class="guided_date afterclr">
						<div class="guided_date_inner"><?=$LastCreateDate?> </div>
					</div>
				<?endif;?>
					<div class="guided_item afterclr">
						<div class="guided_item_cell guided_item_place col1"><div>
								<?$countrId =$arItem["PROPERTIES"]["country"]["VALUE"];?>
								<?if(CModule::IncludeModule("iblock")):
									// выборка только активных разделов из инфоблока $IBLOCK_ID, $ID - раздел-родителя
									$ufName = Array("UF_RU_NAME");
									$arFilter = Array('IBLOCK_ID'=>9, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$ID);
									$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true,$ufName );
									while($ar_result = $db_list->GetNext()):?>
										<?if(($ar_result["ID"])==$countrId):?>
										<?echo($ar_result["UF_RU_NAME"]);?>,
										<?endif;?>
									<?endwhile;?>
								<?endif;?>
								<?$cityId=$arItem["PROPERTIES"]["city"]["VALUE"];?>
								<?$db_props = CIBlockElement::GetProperty(9, $cityId, "sort", "asc", Array("CODE"=>"NAME_RU"));if($ar_props = $db_props->Fetch()):echo ($ar_props["VALUE"]); endif;?>
							</div></div>
						<div class="guided_item_cell col2">
							<div>
								<div class="guided_item_title"><?=$arItem["PROPERTIES"]["name_ru"]["VALUE"]?></div>
								<div class="guided_item_preview"><?=$arItem["PREVIEW_TEXT"]?></div>
							</div>
						</div>
						<div class="guided_item_cell col3">
							<div>
								<div class="guided_item_cont_title"><?=$arItem["PROPERTIES"]["org_ru"]["VALUE"]?></div>
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
        </div>
	</div><!-- guidedContent -->
</div>
