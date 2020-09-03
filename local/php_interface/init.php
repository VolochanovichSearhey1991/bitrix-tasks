<?
	AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "brakeDeactivateElem");

	function brakeDeactivateElem(&$arFields) {
		global $APPLICATION;
		$res = CIBlockElement::GetByID($arFields["ID"]);
		$thisElementShowCount = $res->Fetch()["SHOW_COUNTER"];
		
		if ( ($arFields["ACTIVE"] === "N") && ($thisElementShowCount > 2) ) {
			$APPLICATION->throwException("Товар невозможно деактивировать, у него " .  $thisElementShowCount . " просмотров");
    	return false;
		}
    
	}

	function getNewsDate($newsId) {
	$arFilter = Array("ID" => $newsId);
	$arSelect = Array("ID", "IBLOCK_ID", "ACTIVE_FROM");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	$arFields = $res->GetNext();
	$activeFrom = $arFields["ACTIVE_FROM"];
	$date = new DateTime($activeFrom);
	$activeFromFormatted = $date->format("d.m.Y");
	return $activeFromFormatted;
	}
	
?>