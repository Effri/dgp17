<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>

<?
global $APPLICATION;

$aMenuLinksExt =$APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "1",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "s1_med",
		"ID" => $_REQUEST["ID"],
		"IS_SEF" => "N",
		"SECTION_URL" => ""
	)
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>