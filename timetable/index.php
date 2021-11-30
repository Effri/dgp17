<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание приема врачей-специалистов");
?>   
<?$APPLICATION->IncludeComponent(
	"mibok:timetable", 
	".default", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_ALL_VALUE" => array(
			0 => "NAME",
			1 => "PROPERTY_CLASS",
			2 => "PROPERTY_HALL",
			3 => "PROPERTY_TEACHER",
		),
		"FILTER_MAIN_HEADER" => "PROPERTY_TYPE_SPORT",
        "EVENT_MESSAGE_ID" => "10",
		"FILTER_NAME" => "arrMibokTt",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "s1_med",
		"IBLOCK_ID_RECORD" => "5",
		"IBLOCK_TYPE_RECORD" => "s1_med",
		"LIST_SETTINGS_MODAL_FIELD_CODE" => array(
			0 => "",
		),
		"LIST_SETTINGS_MODAL_NAME" => "NAME",
		"LIST_SETTINGS_MODAL_PROPERTY_CODE" => array(
			0 => "PROPERTY_CLASS",
			1 => "PROPERTY_TYPE_SPORT",
			2 => "PROPERTY_HALL",
			3 => "PROPERTY_TEACHER",
			4 => "PROPERTY_PRICE",
		),
		"LIST_SETTINGS_NAME" => "NAME",
		"LIST_SETTINGS_PROP1" => "PROPERTY_HALL",
		"LIST_SETTINGS_PROP2" => "PROPERTY_TEACHER",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"SET_TITLE" => "Y",
		"USE_FILTER" => "Y",
		"USE_PERMISSIONS" => "N",
		"PROPERTY_CODES_RECORD" => array(
			0 => "9",
            1 => "10",
            2 => "NAME",
            3 => "PREVIEW_TEXT",
		),
		"PROPERTY_CODES_RECORD_REQUIRED" => array(
			0 => "9",
            1 => "10",
		),
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/timetable/",
        "USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_IS_CHECKED" => "N",
		"USER_CONSENT_IS_LOADED" => "N"
	),
	false
);?>
    
    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>