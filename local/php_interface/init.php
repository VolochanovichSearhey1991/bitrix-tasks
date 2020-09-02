<?
	AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "OnBeforeIBlockElementUpdateHandler");

	function OnBeforeIBlockElementUpdateHandler(&$arFields) {
		global $APPLICATION;
		echo "<script>alert('TEST');</script>";

		if ($arFields["ACTIVE"] === "N") {
			//echo "<pre>"; print_r($arFields); echo "</pre>";





			CIBlockElement::CounterInc("413");
			$res = CIBlockElement::GetByID("413");
			echo "<pre>"; print_r($res->GetNext()); echo "</pre>";




			$APPLICATION->throwException("Товар невозможно деактивировать, у него [count] просмотров");
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