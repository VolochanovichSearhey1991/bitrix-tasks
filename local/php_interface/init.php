<?
	AddEventHandler("main", "OnBeforeEventAdd","modifyLetterData");

		function modifyLetterData(&$event, &$lid, &$arFields, &$message_id)	{
			global $USER;

			if ($message_id === 7) {

			 if ($USER->IsAuthorized()) {
				 $userId = $USER->GetId();
				 $userLogin = $USER->GetLogin();
				 $userName = $USER->GetFirstName();

				 $arFields["AUTHOR"] = "Пользователь авторизован: " .
					$userId . " (" . $userLogin .") " . $userName . " данныеиз формы: " .
						$arFields["AUTHOR"];

				 $authorString = $arFields["AUTHOR"];
				 addEventLogEntry($authorString);
			 } else {
				 $arFields["AUTHOR"] = "Пользователь не авторизован, данные изформы: " . $arFields["AUTHOR"];
				 $authorString = $arFields["AUTHOR"];
				 addEventLogEntry($authorString);
			 }
				 
			}
				
		 }
			 
		 function addEventLogEntry($authorString) {
			 CEventLog::Add(array(
				 "SEVERITY" => "INFO",
				 "AUDIT_TYPE_ID" => "REPLACEMENT_LETTER_DATA",
				 "MODULE_ID" => "main",
				 "ITEM_ID" => 123,
				 "DESCRIPTION" => "Замена данных в отсылаемом письме – [ " . $authorString . " ]"
			));
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