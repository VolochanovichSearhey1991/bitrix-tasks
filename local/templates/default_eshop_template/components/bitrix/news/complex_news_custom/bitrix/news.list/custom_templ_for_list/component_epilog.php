<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

   if ($arParams["DISPLAY_SPECIALDATE_FIELD"] === "Y") {
		$specialdate = $arResult['FIRST_NEWS_DATE'];
		$APPLICATION->SetPageProperty("content", $specialdate);

	}
	
?>
