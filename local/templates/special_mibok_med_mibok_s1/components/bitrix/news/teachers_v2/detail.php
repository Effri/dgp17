<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],

		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
	),
	$component
);?>
<?CJSCore::Init(['ajax']);?>
<?
    global $arrFilter, $arrFilterReview;
    $arrFilter = array('PROPERTY_TEACHER' => $ElementID);
    $arrFilterReview = array('PROPERTY_PEOPLE' => $ElementID);
	/*$arrFilter['>=DATE_ACTIVE_FROM'] = date("d.m.Y", strtotime("-3 day")) . ' 00:00:00';
	$arrFilter['<=DATE_ACTIVE_FROM'] = date("d.m.Y", strtotime("+6 day")) . ' 23:59:59';*/
    ?>


    <?
        $arOption = array("period_begin", "period_end");
        $module_id = "mibok.med";
        foreach($arOption as $option)
        {
           $arResultOpt['OPTIONS'][$option] =  COption::GetOptionString($module_id, $option);
           $arResultOpt['DATE_FILTER'][$option] = ConvertTimeStamp(time() + (86400 * $arResultOpt['OPTIONS'][$option]));
        }


        $arrFilter[] = array(
               "LOGIC" => "OR",
               array(">=DATE_ACTIVE_FROM" => $arResultOpt['DATE_FILTER']['period_begin'] . ' 00:00:00', "<=DATE_ACTIVE_FROM" => $arResultOpt['DATE_FILTER']['period_end'] . ' 23:59:59'),
               array( "!PROPERTY_PERIOD" => false),
           );
    ?>
   

<?$APPLICATION->IncludeComponent(
	"mibok:timetable.list", 
	"small", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"EVENT_MESSAGE_ID" => "10",
		"FILTER_NAME" => "arrFilter",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "s1_med",
		"IBLOCK_ID_RECORD" => "5",
		"IBLOCK_TYPE_RECORD" => "s1_med",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_SETTINGS_MODAL_FIELD_CODE" => array(
			0 => "",
		),
		"LIST_SETTINGS_MODAL_NAME" => "PROPERTY_TYPE_SPORT",
		"LIST_SETTINGS_MODAL_PROPERTY_CODE" => array(
			0 => "PROPERTY_HALL",
			1 => "PROPERTY_CLASS",
			2 => "PROPERTY_TEACHER",
			3 => "",
		),
		"LIST_SETTINGS_NAME" => "PROPERTY_TYPE_SPORT",
		"LIST_SETTINGS_PROP1" => "PROPERTY_HALL",
		"LIST_SETTINGS_PROP2" => "PROPERTY_TEACHER",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"SET_TITLE" => "N",
		"COMPONENT_TEMPLATE" => "small",
		"PROPERTY_CODES_RECORD" => array(
			0 => "9",
            1 => "10",
            2 => "NAME",
            3 => "PREVIEW_TEXT",
            4 => "DETAIL_TEXT",
		),
		"PROPERTY_CODES_RECORD_REQUIRED" => array(
			0 => "9",
            1 => "10",
        ),
        "USER_CONSENT" => $arParams["USER_CONSENT"],
        "USER_CONSENT_ID" => $arParams["USER_CONSENT_ID"],
        "USER_CONSENT_IS_CHECKED" => $arParams["USER_CONSENT_IS_CHECKED"],
        "USER_CONSENT_IS_LOADED" => $arParams["USER_CONSENT_IS_LOADED"],
	),
	false
);?>

<div class="review-about-people">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DATE_ACTIVE_FROM",
			3 => "",
		),
		"FILTER_NAME" => "arrFilterReview",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "s1_med",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "RATING",
			1 => "HEAD",
			2 => "PEOPLE",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "reviews"
	),
	false
);?>
</div>

<div class="panel-group"><a class="btn btn-default" href="<?=$arResult["FOLDER"].$arResult['VARIABLES']['SECTION_CODE'].'/'?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<?=GetMessage("T_NEWS_DETAIL_BACK")?></a></div>
