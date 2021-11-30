<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arProperty_LNSF = array(
	"NAME" => GetMessage("IBLOCK_ADD_NAME"),
	"TAGS" => GetMessage("IBLOCK_ADD_TAGS"),
	"DATE_ACTIVE_FROM" => GetMessage("IBLOCK_ADD_ACTIVE_FROM"),
	"DATE_ACTIVE_TO" => GetMessage("IBLOCK_ADD_ACTIVE_TO"),
	"IBLOCK_SECTION" => GetMessage("IBLOCK_ADD_IBLOCK_SECTION"),
	"PREVIEW_TEXT" => GetMessage("IBLOCK_ADD_PREVIEW_TEXT"),
	"PREVIEW_PICTURE" => GetMessage("IBLOCK_ADD_PREVIEW_PICTURE"),
	"DETAIL_TEXT" => GetMessage("IBLOCK_ADD_DETAIL_TEXT"),
	"DETAIL_PICTURE" => GetMessage("IBLOCK_ADD_DETAIL_PICTURE"),
);
$arVirtualProperties = $arProperty_LNSF;

$rsProp = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"]));
while ($arr=$rsProp->Fetch())
{
	$arProperty[$arr["ID"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
	if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S", "F", "E")))
	{
		$arProperty_LNSF[$arr["ID"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
	}
}

$arTemplateParameters = array(
	"PROPERTY_CODES" => array(
        "PARENT" => "FIELDS",
        "NAME" => GetMessage("IBLOCK_PROPERTY"),
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "VALUES" => $arProperty_LNSF,
    ),

    "PROPERTY_CODES_REQUIRED" => array(
        "PARENT" => "FIELDS",
        "NAME" => GetMessage("IBLOCK_PROPERTY_REQUIRED"),
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "ADDITIONAL_VALUES" => "N",
        "VALUES" => $arProperty_LNSF,
    ),
);

if (isset($arCurrentValues['VIEW_MODE']) && 'TILE' == $arCurrentValues['VIEW_MODE'])
{
	$arTemplateParameters['HIDE_SECTION_NAME'] = array(
		'PARENT' => 'VISUAL',
		'NAME' => GetMessage('CPT_BCSL_HIDE_SECTION_NAME'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'N'
	);
}
?>