<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

   if ($arParams["DISPLAY_SPECIALDATE_FIELD"] === "Y") {
		$iblock_id = $arResult["ELEMENTS"][0];
		$specialdate = getNewsDate($iblock_id);
		$APPLICATION->SetPageProperty("content", $specialdate);
	}
	
?>