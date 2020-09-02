<?

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
	
	function getCanonicalIblockProp($idForRelCanonical) {
		
		if (isset($idForRelCanonical) && !empty($idForRelCanonical)) {
			$canonicalIblockId = $idForRelCanonical;
			$arFilter = Array("IBLOCK_ID" => $canonicalIblockId);
			$arSelect = Array("IBLOCK_ID", "ID", "NAME", "PROPERTY_NEWS_PROP");
			$result = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			return $result;
		}
		
		return false;
	}

?>