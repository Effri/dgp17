<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Универсальный сайт медицинских услуг");

$colParent = 'col-lg-9 col-md-9';
if(!MibokMed::GetTopElement($APPLICATION, "mibok_left_column"))
    $colParent = 'col-lg-12 col-md-12';


$colContent = 'col-lg-12 col-md-12 col-sm-12';
//$colContent = 'col-lg-8 col-md-8 col-sm-8 col-big-8';
//$colContent = 'col-big-4 col-lg-4 col-md-4 col-sm-12';
if(!MibokMed::GetTopElement($APPLICATION, "mibok_right_column"))
   $colContent = 'col-lg-12 col-md-12 col-sm-12 col-big-12';
?>

<div class="container1">
    <div class="row">
        <div class="col-lg-12 c-margin"></div>

        <div class="<?=$colParent?> c-float-right col-wrapper">
            <div class="row">
                <div class="<?=$colContent?>">
                    <div class="c-header"><?$APPLICATION->IncludeFile(SITE_DIR."include/content/index_title.php",Array(),Array("MODE"=>"html"));?></div>

                    <main class="c-article" id="main-article">
                        <?$APPLICATION->IncludeFile(SITE_DIR."include/content/index.php",Array(),Array("MODE"=>"html"));?>
                    </main>
                </div>

                <?if(!isset($GLOBALS['type_line'])):?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <?$APPLICATION->IncludeComponent(
                            "bitrix:news.list", 
                            "news_index", 
                            array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "N",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "N",
                                "DISPLAY_PICTURE" => "N",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array(
                                    0 => "NAME",
                                    1 => "PREVIEW_TEXT",
                                    2 => "DETAIL_TEXT",
                                    3 => "ACTIVE_FROM",
                                ),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => "7",
                                "IBLOCK_TYPE" => "s1_med",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "N",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "4",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "Новости",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "100",
                                "PROPERTY_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER1" => "DESC",
                                "SORT_ORDER2" => "ASC",
                                "COMPONENT_TEMPLATE" => "news_index"
                            ),
                            false
                        );?>
                    </div>
                <?endif?>
                <?if(MibokMed::GetTopElement($APPLICATION, "mibok_right_column")):?>

                <?endif;?>
            </div>
        </div>

        <?if(MibokMed::GetTopElement($APPLICATION, "mibok_left_column")):?>
            <div class="col-lg-3 col-md-3 col-sm-12 c-float-right col-big-3">
                <?if($GLOBALS['type_line'] == 'type_line_v1'):?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                         "news_v1_index", 
                        array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "NAME",
                                1 => "PREVIEW_TEXT",
                                2 => "DETAIL_TEXT",
                                3 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "7",
                            "IBLOCK_TYPE" => "s1_med",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "4",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "100",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "news_index"
                        ),
                        false
                    );?>
                <?elseif($GLOBALS['type_line'] == 'type_line_v2'):?>
                    <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list", 
                    $GLOBALS['type_line']."_index", 
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
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "10",
                        "IBLOCK_TYPE" => "s1_med",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "54",
                        "PROPERTY_CODE" => array(
                            0 => "ICON",
                            1 => "SVG",
                            2 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" =>  $GLOBALS['type_line']."_index",
                    ),
                    false
                );?>
                <?endif;?>
<!--                <div class="col-lg-4 col-md-4 col-sm-4 col-big-4 col-med-4">-->
<!--                    --><?//$APPLICATION->IncludeComponent(
//                        "bitrix:news.list",
//                        "link",
//                        array(
//                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
//                            "ADD_SECTIONS_CHAIN" => "N",
//                            "AJAX_MODE" => "N",
//                            "AJAX_OPTION_ADDITIONAL" => "",
//                            "AJAX_OPTION_HISTORY" => "N",
//                            "AJAX_OPTION_JUMP" => "N",
//                            "AJAX_OPTION_STYLE" => "Y",
//                            "CACHE_FILTER" => "N",
//                            "CACHE_GROUPS" => "Y",
//                            "CACHE_TIME" => "36000000",
//                            "CACHE_TYPE" => "A",
//                            "CHECK_DATES" => "N",
//                            "DETAIL_URL" => "",
//                            "DISPLAY_BOTTOM_PAGER" => "N",
//                            "DISPLAY_DATE" => "N",
//                            "DISPLAY_NAME" => "Y",
//                            "DISPLAY_PICTURE" => "Y",
//                            "DISPLAY_PREVIEW_TEXT" => "N",
//                            "DISPLAY_TOP_PAGER" => "N",
//                            "FIELD_CODE" => array(
//                                0 => "",
//                                1 => "",
//                            ),
//                            "FILTER_NAME" => "",
//                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
//                            "IBLOCK_ID" => "6",
//                            "IBLOCK_TYPE" => "s1_med",
//                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
//                            "INCLUDE_SUBSECTIONS" => "Y",
//                            "MESSAGE_404" => "",
//                            "NEWS_COUNT" => "15",
//                            "PAGER_BASE_LINK_ENABLE" => "N",
//                            "PAGER_DESC_NUMBERING" => "N",
//                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
//                            "PAGER_SHOW_ALL" => "N",
//                            "PAGER_SHOW_ALWAYS" => "N",
//                            "PAGER_TEMPLATE" => ".default",
//                            "PAGER_TITLE" => "Новости",
//                            "PARENT_SECTION" => "",
//                            "PARENT_SECTION_CODE" => "",
//                            "PREVIEW_TRUNCATE_LEN" => "",
//                            "PROPERTY_CODE" => array(
//                                0 => "LINK",
//                                1 => "",
//                            ),
//                            "SET_BROWSER_TITLE" => "N",
//                            "SET_LAST_MODIFIED" => "N",
//                            "SET_META_DESCRIPTION" => "N",
//                            "SET_META_KEYWORDS" => "N",
//                            "SET_STATUS_404" => "N",
//                            "SET_TITLE" => "N",
//                            "SHOW_404" => "N",
//                            "SORT_BY1" => "ACTIVE_FROM",
//                            "SORT_BY2" => "SORT",
//                            "SORT_ORDER1" => "DESC",
//                            "SORT_ORDER2" => "ASC",
//                            "COMPONENT_TEMPLATE" => "link",
//                            "STRICT_SECTION_CHECK" => "N"
//                        ),
//                        false
//                    );?>
<!--                </div>-->
            </div>
        <?endif;?>
    </div>
</div>

<?global $arrFilterPhoto;
$arrFilterPhoto = array('!PROPERTY_IS_INDEX' => false);
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"photo_index", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
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
			2 => "",
		),
		"FILTER_NAME" => "arrFilterPhoto",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "s1_med",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "IS_INDEX",
			1 => "FILE",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "photo_index",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>

<?if($GLOBALS['type_line'] == 'type_line_v2'):?>
    <div class="container1">
        <?$APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "news_v2_index", 
        array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "N",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "NAME",
                1 => "PREVIEW_TEXT",
                2 => "DETAIL_TEXT",
                3 => "",
            ),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "7",
            "IBLOCK_TYPE" => "s1_med",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "4",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "80",
            "PROPERTY_CODE" => array(
                0 => "",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "COMPONENT_TEMPLATE" => "news_v2_index",
            "NAME_TRUNCATE_LEN" => "50"
        ),
        false
    );?>
    </div>
<?endif;?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>