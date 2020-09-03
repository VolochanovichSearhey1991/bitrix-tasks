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
	
?>