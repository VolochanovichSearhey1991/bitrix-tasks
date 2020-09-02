<? 
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	
	$thisElemId = $arResult["ID"];
		
	$result = getCanonicalIblockProp($arParams["ID_FOR_REL_CANONICAL"]);
	
	if ($result) {

		while ($arElemFields = $result->Fetch()) {
			
			if ($arElemFields["PROPERTY_NEWS_PROP_VALUE"] === $thisElemId) {
				$canonicalLink = "<link rel='canonical' href=" . $arElemFields['NAME'] . ">";
				$APPLICATION->SetPageProperty("canonical", $canonicalLink);
				break;
			}
					
		}

	}
	
	
?>
