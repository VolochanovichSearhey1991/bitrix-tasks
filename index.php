<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("type_of_page", "Самая главная");
$APPLICATION->SetTitle("Интернет-магазин \"Одежда\"");
?>

<?
$arrGoods = getArrAllGoods();



 function deleteBasket() {
	 
	 ini_set('max_execution_time', 1000000);
	CModule::IncludeModule("sale");
	CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
	 }
 
 function addAllToBasket($arrGoods) {
	$siteId = 's1';
	$basket = \Bitrix\Sale\Basket::create($siteId); 
	
	foreach ($arrGoods as $product)
    {
        $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
        unset($product["PRODUCT_ID"]);
        $item->setFields($product);
    }
	
	$basket->save();
	 
}
 
 function showArrAllGoods($arFinalRez) {
	 foreach ($arFinalRez as $subArr) {
	 foreach ($subArr as $key => $value) {
		 echo $key . " = " . $value . "</br>";
	 }
	 echo "</br> ++++++++++++++++++++++++++++++++++++++++++++++ </br>";
 }
 }
 
 
 function getArrAllGoods() {
	$arGoods = CCatalogProduct::GetList(Array("ID" => "ASC"), 
										Array("ELEMENT_IBLOCK_ID" => "2"),
											false,
												false
);
 while ($arRez = $arGoods->GetNext()) {
	 $arFinalRez[] = Array(
									"PRODUCT_ID" => $arRez["ID"], 
									"NAME" => $arRez["ELEMENT_NAME"], 
									"PRICE" => CPrice::GetBasePrice($arRez["ID"])["PRICE"], 
									"CURRENCY" => CPrice::GetBasePrice($arRez["ID"])["CURRENCY"], 
									"QUANTITY" => getQuantityOffersOf(getArrIdOffers($arRez["ID"])) );
 }
 
 return $arFinalRez;
}
 
 
 function getArrIdOffers($id) {
	 $res = CCatalogSKU::getOffersList(Array($id),2, array(),array(),array());
 
 foreach ($res as $value) {
	 foreach ($value as $key => $subValue) {
		 $arrIdOffers[] = $key;
	 }
	 
 }
 
 return $arrIdOffers;
 }
 
 function getQuantityOffersOf($arrIdOffers) {
	 $totalQuantity = 0;
	 foreach ($arrIdOffers as $value) {
		 $arrFields = CCatalogProduct::GetByID($value);
			$totalQuantity += $arrFields["QUANTITY"];
	 }
	 
	 return $totalQuantity;
 }

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>