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

<?
    global $arrFilter;
    $arrFilter = array('PROPERTY_TEACHER' => $ElementID);
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
	"bitrix:news.list", 
	"timetable_small", 
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
		"CACHE_TIME" => "43200",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "DATE_ACTIVE_FROM",
			2 => "ACTIVE_FROM",
			3 => "DATE_ACTIVE_TO",
			4 => "ACTIVE_TO",
			5 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "s1_med",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1000",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "43200",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "TYPE_SPORT",
			1 => "HALL",
			2 => "CLASS",
			3 => "TEACHER",
			4 => "PERIOD",
			5 => "COLOR",
			6 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "",
		"COMPONENT_TEMPLATE" => "timetable_small"
	),
	false
);?>

<div class="panel-group"><a class="btn btn-default" href="<?=$arResult["FOLDER"].$arResult['VARIABLES']['SECTION_CODE'].'/'?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;<?=GetMessage("T_NEWS_DETAIL_BACK")?></a></div>
