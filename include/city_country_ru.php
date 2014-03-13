<h3>Country</h3>
<div class="niceselect_wrap">
	<select name="countrySelect" class="niceselect countrySelect">
		<option value="">Chose country</option>
		<?if(CModule::IncludeModule("iblock")):
			// выборка только активных разделов из инфоблока $IBLOCK_ID, $ID - раздел-родителя
			$arFilter = Array('IBLOCK_ID'=>9, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$ID);
			$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
			while($ar_result = $db_list->GetNext()):?>
				<option value="<?=$ar_result['CODE']?>"><?=$ar_result['NAME']?></option>
			<?endwhile;?>
		<?endif;?>
	</select>
</div>

<h3>City</h3>
<div class="niceselect_wrap citySelectWrap" >
	<select name="choseCitySelect" class="niceselect active" disabled>
		<option value="">Chose city</option>
	</select>
	<select name="choseCityLithuania" class="niceselect citySelect">
		<option value="">Chose city</option>
		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>9,"SECTION_ID"=>34, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Lt
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<option value="<?echo($arFields['CODE']);?>"><?echo($arFields['NAME']);?></option>
		<?endwhile;?>
	</select>
	<select name="choseCityPoland" class="niceselect citySelect">
		<option value="">Chose city</option>
		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>9,"SECTION_ID"=>33, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Pl
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<option value="<?echo($arFields['CODE']);?>"><?echo($arFields['NAME']);?></option>
		<?endwhile;?>
	</select>
	<select name="choseCityRussia" class="niceselect citySelect">
		<option value="">Chose city</option>
		<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "CODE");
		$arFilter = Array("IBLOCK_ID"=>9,"SECTION_ID"=>32, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"),

			$arFilter, false, false, $arSelect); // Ru
		while($ob = $res->GetNextElement()):?>
			<?$arFields = $ob->GetFields();?>
			<option value="<?echo($arFields['CODE']);?>"><?echo($arFields['NAME']);?></option>
		<?endwhile;?>
	</select>
</div>