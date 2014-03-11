<?
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("MyClass40", "OnBeforeIBlockElementAddHandler"));
class MyClass40
{
	function OnBeforeIBlockElementAddHandler(&$arFields)
	{
		$name = $arFields["NAME"];
		$arParams = array("replace_space"=>"-","replace_other"=>"-");
		$trans = Cutil::translit($name,"ru",$arParams);
		$arFields["CODE"] = $trans;
	}
}
// при создании элемента ИБ


AddEventHandler("iblock", "OnBeforeIBlockSectionAdd", Array("MyClass50", "OnBeforeIBlockSectionAddHandler"));
class MyClass50
{
	function OnBeforeIBlockSectionAddHandler(&$arFields)
	{
		$name = $arFields["NAME"];
		$arParams = array("replace_space"=>"-","replace_other"=>"-");
		$trans = Cutil::translit($name,"ru",$arParams);
		$arFields["CODE"] = $trans;
	}
}
// при создании раздела ИБ
?>