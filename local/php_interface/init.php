<?
	AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "brakeDeactivateElem");

	function brakeDeactivateElem(&$arFields) {
		global $APPLICATION;
		$thisElementShowCount = getShowCounOfElem($arFields["ID"]);

		if ( ($arFields["ACTIVE"] === "N") && 	($thisElementShowCount > 2) ) {
			$APPLICATION->throwException("Товар невозможно деактивировать, у него " .  $thisElementShowCount . " просмотров");
    	return false;
		}
    
	}

	function getShowCounOfElem($elemId) {
		global $APPLICATION;
		$res = CIBlockElement::GetByID($elemId);
		$thisElementShowCount = $res->Fetch()["SHOW_COUNTER"];
		return $thisElementShowCount;
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