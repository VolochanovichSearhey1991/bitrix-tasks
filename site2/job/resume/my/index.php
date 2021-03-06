<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Резюме");
?><?$APPLICATION->IncludeComponent("bitrix:iblock.element.add", ".default", array(
	"NAV_ON_PAGE" => "10",
	"USE_CAPTCHA" => "Y",
	"USER_MESSAGE_ADD" => "Ваше резюме добавлено",
	"USER_MESSAGE_EDIT" => "Ваше резюме сохранено",
	"DEFAULT_INPUT_SIZE" => "30",
	"RESIZE_IMAGES" => "N",
	"IBLOCK_TYPE" => "job",
	"IBLOCK_ID" => "10",
	"PROPERTY_CODES" => array(
		0 => "NAME",
		1 => "DATE_ACTIVE_TO",
		2 => "IBLOCK_SECTION",
		3 => "DETAIL_TEXT",
		4 => "52",5 => "53",6 => "54",7 => "55",8 => "56",9 => "57",10 => "58",11 => "59",12 => "60",13 => "61",14 => "62",15 => "63",16 => "64",
	),
	"PROPERTY_CODES_REQUIRED" => array(
		0 => "NAME",
		1 => "DATE_ACTIVE_TO",
		2 => "IBLOCK_SECTION",
		3 => "52", 4 => "53",  5 => "54",  6 => "64", 
	),
	"GROUPS" => array(
		0 => "1",
		1 => "6",
	),
	"STATUS" => "ANY",	"STATUS_NEW" => "N",
	"ALLOW_EDIT" => "Y",
	"ALLOW_DELETE" => "Y",
	"ELEMENT_ASSOC" => "CREATED_BY",
	"MAX_USER_ENTRIES" => "5",
	"MAX_LEVELS" => "1",
	"LEVEL_LAST" => "Y",
	"MAX_FILE_SIZE" => "0",
	"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
	"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
	"SEF_MODE" => "N",
	"SEF_FOLDER" => "/site2job/vacancy/my/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_SHADOW" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CUSTOM_TITLE_NAME" => "Требуемая работа",
	"CUSTOM_TITLE_TAGS" => "",
	"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
	"CUSTOM_TITLE_DATE_ACTIVE_TO" => "Срок публикации до",
	"CUSTOM_TITLE_IBLOCK_SECTION" => "Категория",
	"CUSTOM_TITLE_PREVIEW_TEXT" => "",
	"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
	"CUSTOM_TITLE_DETAIL_TEXT" => "Дополнительно",
	"CUSTOM_TITLE_DETAIL_PICTURE" => "",
	"SEND_EMAIL" => "Y",
	"EMAIL_TO" => "sale@980trainee.dev-bitrix.by",
	"SUBJECT" => "Добавлено новое резюме",
	"EVENT_MESSAGE_ID" => array(),
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
