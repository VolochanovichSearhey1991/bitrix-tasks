<?

$componentObject = $this->__component; 
if (is_object($componentObject))
{
    $componentObject->arResult['FIRST_NEWS_DATE'] = $arResult["ITEMS"]["0"]["ACTIVE_FROM"];
    $componentObject->SetResultCacheKeys(array("FIRST_NEWS_DATE"));
 
}

?>