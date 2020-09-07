<?
  $eventManager = \Bitrix\Main\EventManager::getInstance();
  $eventManager->addEventHandler("main", "onProlog",array ("PageMetaHandler","setMetaDataFromElem"));

  class PageMetaHandler {

    

    function setMetaDataFromElem() {

      if(CModule::IncludeModule("iblock")) {

        global $APPLICATION;
        $curPage = $APPLICATION->GetCurPage(false);
        $arFilter = array("IBLOCK_ID" => "14", "NAME" => $curPage);
        $arSelect = array("IBLOCK_ID", "ID", "PROPERTY_TITLE", "PROPERTY_DESCRIPTION");
        $result = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        $elemData = $result->Fetch();

        if (count($elemData) > 0) {
          $APPLICATION->SetPageProperty("title",$elemData["PROPERTY_TITLE_VALUE"]);
          $APPLICATION->SetPageProperty("description",$elemData["PROPERTY_DESCRIPTION_VALUE"]);
        }

        return false;
      }

    }

  }
?>