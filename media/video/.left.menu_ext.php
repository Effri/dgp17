<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>

<?
global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections", 
	"", 
	array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "1",
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "s1_med",
		"ID" => $_REQUEST["ID"],
		"IS_SEF" => "N",
		"SECTION_URL" => ""
	),
	false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>