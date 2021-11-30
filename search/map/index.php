<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.map", 
	".default", 
	array(
		"LEVEL" => "3",
		"COL_NUM" => "1",
		"SHOW_DESCRIPTION" => "N",
		"SET_TITLE" => "Y",
		"CACHE_TIME" => "36000000",
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>