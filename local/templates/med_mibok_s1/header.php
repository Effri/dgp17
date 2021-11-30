<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
use Bitrix\Main\Page\Asset; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?$APPLICATION->ShowTitle()?></title>
	
	<?$APPLICATION->ShowHead();?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='icon' type='image/png' href='<?=SITE_DIR?>favicon.ico'>


    <?Asset::getInstance()->addString("<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>");
    Asset::getInstance()->addString("<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>");?>
    
    <!--[if lt IE 9]>
        <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/html5shiv.min.js"); ?>
    <![endif]-->
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/styles.min.css"); ?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fonts.css"); ?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/svg.css"); ?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/tooltip/tooltipster.bundle.min.css"); ?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/tooltip/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css"); ?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/add.css"); ?>
    <?if(MibokPanelSettings::IsShowCustom(SITE_TEMPLATE_PATH))
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
    global $USER;
    if($USER->IsAdmin())
    {
        echo "<style data-mode='action_style'>";
        echo "</style>";
    }
    ?>
    <?=MibokMed::getContentCounter(SITE_TEMPLATE_ID, 'meta')?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<?if(MibokMed::isCookiePrivacy()):?>
	<div class="footer-cookie">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 header-cookie">
					<div class="footer-cookie-text">
						<?$APPLICATION->IncludeFile(SITE_DIR."include/cookie.php",Array(),Array("MODE"=>"html"));?>
					</div>
					<div class="footer-cookie-btn">
						<a href="#" class="btn btn-blue slider-direction-link"><?=GetMessage('COOKIE_OK')?></a>
					</div>
				</div>

			</div>

		</div>
	</div>
<?endif;?>

<div id="wrapper">
<? global $type_line;
$type_line = COption::GetOptionString("mibok.med", 'type_line');
if($type_line == "1")
    $type_line = 'type_line_v1';
elseif($type_line == "2")
    $type_line = 'type_line_v2';?>
    <header class="l-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="l-header-wrapper clearfix">
                        <div class="l-header-info">
                            <div class="l-header-info-time">
                                    <?$APPLICATION->IncludeFile(SITE_DIR."include/time.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="l-header-info-tel l-header-info-email">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/email.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="l-header-info-tel l-header-info-phone">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/phone.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="l-header-button">
                                <button><?$APPLICATION->IncludeFile(SITE_DIR."include/button.php",Array(),Array("MODE"=>"html"));?></button>
                            </div>
                        </div>
                        <div class="l-header-version">
                            <button class="">Aa</button>
                            <span itemprop="copy"><?$APPLICATION->IncludeFile(SITE_DIR."include/special.php",Array(),Array("MODE"=>"html"));?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="l-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="clearfix l-menu-wrapper">
                        <a href="<?=SITE_DIR?>" class="l-menu-logo">
                            <div class="logo-img">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/logo.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="logo-text">
                            <div class="l-menu-logo-text"><?$APPLICATION->IncludeFile(SITE_DIR."include/name.php",Array(),Array("MODE"=>"html"));?></div><br>
                            <div class="l-menu-logo-text-min"><?$APPLICATION->IncludeFile(SITE_DIR."include/name_desc.php",Array(),Array("MODE"=>"html"));?></div>
                            </div>
                        </a>
                        <div class="pull-right search-phone">
                            <div class="header-search-block">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:search.form",
                                    "header",
                                    Array(
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "PAGE" => "#SITE_DIR#search/index.php",
                                        "USE_SUGGEST" => "N"
                                    )
                                );?>
                            </div>
                            <div class="header-phone-block hidden-xs hiddem-sm">
                                <div class="l-menu-phone-big">
                                    <?$APPLICATION->IncludeFile(SITE_DIR."include/phone.php",Array(),Array("MODE"=>"html"));?>
                                </div>
                                <div class="l-menu-phone-min">
                                     <?$APPLICATION->IncludeFile(SITE_DIR."include/phone_name.php",Array(),Array("MODE"=>"html"));?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
                            "ROOT_MENU_TYPE" => "top",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_TIME" => "36000000",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "2",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <?if($APPLICATION->GetCurPage(false) == SITE_DIR):?>
        <?
        $slider = COption::GetOptionString("mibok.med", 'slider');
        if($slider == "1")
            $slider = 'slider_v1';
        elseif($slider == "2")
            $slider = 'slider_v2';
        $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider_v1", 
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
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "s1_med",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
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
			0 => "BIG_NAME",
			1 => "LINK",
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
		"MIBOK_SPECIAL_COMPARE" => "N",
		"MIBOK_SPECIAL_INC" => "N",
		"COMPONENT_TEMPLATE" => "slider_v1",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
    <?if($type_line == 'type_line_v1' && MibokMed::GetTopElement($APPLICATION, "mibok_type_sport")):?>
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
    $type_line."_index", 
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
		"PREVIEW_TRUNCATE_LEN" => "100",
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
		"COMPONENT_TEMPLATE" => $type_line."_index",
        "MIBOK_SPECIAL_COMPARE" => "N",
		"MIBOK_SPECIAL_INC" => "N"
	),
	false
);?>
    <?endif;?>
    <?endif;?>
    
    <?if(MibokMed::GetTopElement($APPLICATION, "mibok_type_sport") && $type_line == 'type_line_v1' && $APPLICATION->GetCurPage(false) != SITE_DIR):?>
        <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	$type_line,
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
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
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
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "ICON",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => $type_line,
		"MIBOK_SPECIAL_COMPARE" => "N",
		"MIBOK_SPECIAL_INC" => "N"
	),
	false
);?>
    <?endif;?>
    
    <div class="container">
        <div class="row">
            <?if($APPLICATION->GetCurPage(false) != SITE_DIR):?>
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0",
                    ),
                    false
                );?>
            <?endif?>
            
            <?if(MibokMed::GetTopElement($APPLICATION, "mibok_left_column") && $APPLICATION->GetCurPage(false) != SITE_DIR):?>
                <div class="col-lg-3 col-md-3 col-big-3 col-mob-order">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "left"
	),
	false
);?>
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-big-4 col-med-4">-->
                    <div class="">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "link",
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
                                "CHECK_DATES" => "N",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "N",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => "6",
                                "IBLOCK_TYPE" => "s1_med",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "15",
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
                                    0 => "LINK",
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
                                "COMPONENT_TEMPLATE" => "link",
                                "STRICT_SECTION_CHECK" => "N"
                            ),
                            false
                        );?>
                    </div>

        <?if(MibokMed::GetTopElement($APPLICATION, "mibok_type_sport") && $type_line == 'type_line_v2'):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list", 
                $type_line,
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
                    "CHECK_DATES" => "N",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "10",
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
                    "PAGER_TITLE" => "",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "ICON",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "NAME",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "COMPONENT_TEMPLATE" => "type_sport",
                    "MIBOK_SPECIAL_COMPARE" => "N",
                    "MIBOK_SPECIAL_INC" => "N"
                ),
                false
            );?>
                <?endif;?>
                </div>
                <div class="col-lg-9 col-md-9 col-wrapper">
                    <div class="row">
                        <?if(MibokMed::GetTopElement($APPLICATION, "mibok_right_column") != "/index.php"):?>
<!--                            <div class="col-lg-8 col-md-8 col-sm-8 col-big-8">-->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <?else:?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
<!--                        <div class="col-big-4 col-lg-4 col-md-4 col-sm-12">-->

                        <?endif;?>
            <?else:?>
                <?if($APPLICATION->GetCurPage(false) != SITE_DIR):?>
                    <?if(MibokMed::GetTopElement($APPLICATION, "mibok_right_column")):?>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-big-9">
                    <?else:?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                    <?endif;?>
                <?else:?>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                <?endif;?>
            <?endif;?>
                    <h1 class="c-header c-header-margin <?if($APPLICATION->GetCurDir() == SITE_DIR):?>hidden<?endif?>"><?$APPLICATION->ShowTitle(false);?></h1>
                    <main class="c-article" id="main-article">