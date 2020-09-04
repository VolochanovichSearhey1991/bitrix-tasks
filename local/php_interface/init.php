<?

	AddEventHandler("main", "OnBuildGlobalMenu", "makeForContentManager");

	function makeForContentManager(&$aGlobalMenu, &$aModuleMenu) {
		global $USER;

		$arUserGroups = $USER->GetUserGroupArray();

		foreach ($arUserGroups as $group) {
			
			if ($group === "8") {

				foreach ($aGlobalMenu as $key=>$value) {

					if ($key !== "global_menu_content" && $key !== "global_menu_store" && $key !== "global_menu_settings") {
						unset($aGlobalMenu[$key]);
					}
		
				}
		
				foreach ($aModuleMenu as $key=>$value) {
		
					if ($aModuleMenu[$key]["items_id"] !== "menu_iblock_/news") {
						unset($aModuleMenu[$key]);
					}
		
				}
				
			}

		}
		
	

	/*	echo "<pre>";
		print_r($aGlobalMenu);
		echo "</pre>";
		echo "</br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
		echo "</br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
		echo "</br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
		echo "</br>+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
		echo "<pre>";
		print_r($aModuleMenu);
		echo "</pre>";*/
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