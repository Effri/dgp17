<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();IncludeTemplateLangFile(__FILE__);
IncludeTemplateLangFile(__FILE__);
use Bitrix\Main\Page\Asset; 
$module_id = 'mibok.med';
?>

                </main>
        <?if(MibokMed::GetTopElement($APPLICATION, "mibok_left_column")):?>
                    </div>

                </div>
            </div>
        <?else:?>
            </div>
            <?if(MibokMed::GetTopElement($APPLICATION, "mibok_right_column")):?>
                <div class="col-lg-3 col-md-3 col-sm-4 col-big-3">
                    <?$APPLICATION->IncludeComponent("bitrix:news.list", "link", Array(
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
"MIBOK_SPECIAL_COMPARE" => "N", 
"MIBOK_SPECIAL_INC" => "N"  
),
false
);?> 
                </div>
            <?endif;?>
        <?endif;?>
        </div>

    <div class="col-lg-3 col-md-3 col-big-3 col-mob-display">
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
</div>
    <footer class="l-footer">
        <div class="container">
            <div class="row">
    
                <div class="col-lg-offset-1 col-md-offset-0 col-sm-offset-0 col-lg-5 col-md-6 col-sm-5 l-footer-float">
                    <?if(strpos($APPLICATION->GetCurPage(false), '/contacts/') === false):?>
                        <div class="l-footer-title">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/footer_name3.php",Array(),Array("MODE"=>"html"));?>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "mibok:iblock.element.add", 
                            "consent_footer_form", 
                            array(
                                "AJAX_MODE" => "Y",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "footer_form",
                                "ALLOW_DELETE" => "N",
                                "ALLOW_EDIT" => "N",
                                "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                                "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                                "CUSTOM_TITLE_DETAIL_PICTURE" => "",
                                "CUSTOM_TITLE_DETAIL_TEXT" => "",
                                "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                                "CUSTOM_TITLE_NAME" => GetMessage('FORM_NAME'),
                                "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                                "CUSTOM_TITLE_PREVIEW_TEXT" => GetMessage('FORM_TEXT'),
                                "CUSTOM_TITLE_TAGS" => "",
                                "DEFAULT_INPUT_SIZE" => "30",
                                "DETAIL_TEXT_USE_HTML_EDITOR" => "N",
                                "ELEMENT_ASSOC" => "CREATED_BY",
                                "GROUPS" => array(
                                    0 => "2",
                                ),
                                "IBLOCK_ID" => "5",
                                "IBLOCK_TYPE" => "s1_med",
                                "LEVEL_LAST" => "N",
                                "MAX_FILE_SIZE" => "0",
                                "MAX_LEVELS" => "100000",
                                "MAX_USER_ENTRIES" => "100000",
                                "NAV_ON_PAGE" => "0",
                                "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                                "PROPERTY_CODES" => array(
                                    0 => "9",
                                    1 => "10",
                                    2 => "NAME",
                                    3 => "PREVIEW_TEXT",
                                ),
                                "PROPERTY_CODES_REQUIRED" => array(
                                    0 => "9",
                                    1 => "10",
                                    2 => "PREVIEW_TEXT",
                                ),
                                "RESIZE_IMAGES" => "N",
                                "SEF_MODE" => "N",
                                "STATUS" => "INACTIVE",
                                "STATUS_NEW" => "N",
                                "USER_MESSAGE_ADD" => GetMessage('FORM_OK'),
                                "USER_MESSAGE_EDIT" => "",
                                "USE_CAPTCHA" => "N",
                                "COMPONENT_TEMPLATE" => "consent_footer_form",
                                "EVENT_MESSAGE_ID" => array(
                                    0 => "9",
                                ),
                                "USER_CONSENT" => "Y",
                                "USER_CONSENT_ID" => "1",
                                "USER_CONSENT_IS_CHECKED" => "N",
                                "USER_CONSENT_IS_LOADED" => "N"
                            ),
                            false
                        );?>
                    <?endif;?>
                </div>
    
                <div class="col-lg-6 col-md-6 col-sm-7 l-footer-float">
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-8">
    
                            <div class="l-footer-title">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/footer_name2.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="l-footer-block">
                                <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
                                    "ROOT_MENU_TYPE" => "bottom",
                                    "MENU_CACHE_TYPE" => "Y",
                                    "MENU_CACHE_TIME" => "36000000",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MAX_LEVEL" => "1",
                                    "CHILD_MENU_TYPE" => "left",
                                    "USE_EXT" => "N",
                                    "ALLOW_MULTI_SELECT" => "N"
                                    ),
                                    false
                                );?>
                            </div>
    
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-4 col-contacts">
    
                            <div class="l-footer-title"><?$APPLICATION->IncludeFile(SITE_DIR."include/footer_name1.php",Array(),Array("MODE"=>"html"));?></div>
                            <div class="f-footer-block-sml">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/address.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="f-footer-block-sml footer-copyright">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/copyright.php",Array(),Array("MODE"=>"html"));?>
                            </div>
                            <div class="wrapper-social">
                                <?$APPLICATION->IncludeFile(SITE_DIR."include/social.php",Array(),Array("MODE"=>"html"));?>
                            </div>
    
                        </div>
    
                        
                        
                        <div class='mibok-informer-counter col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right'>
                            <?=MibokMed::getContentCounter(SITE_TEMPLATE_ID, 'informer')?>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </footer>
    
    <?if(MibokMed::isFooterCreater()):?>
    <div class="footer-create-info">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                         <?$APPLICATION->IncludeFile(SITE_DIR."include/creater.php",Array(),Array("MODE"=>"html"));?>
                </div>
            </div>
        </div>
    </div>
    <?endif;?>

    <?if(MibokMed::isAdvFZ()):?>
        <div class="footer-cookie footer-fz">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-38-fz">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/adv_fz.php",Array(),Array("MODE"=>"html"));?>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    <?endif;?>
</div>
	
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/modernizr.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.min.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/flexibility.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/swiper.jquery.min.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/perfect-scrollbar.jquery.min.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/tooltip/tooltipster.bundle.min.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap.min.js"); ?>
<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/app.min.js"); ?>

<?$APPLICATION->IncludeComponent(
    "mibok:panel.settings", 
    ".default", 
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "MODE" => "ADMIN"
    ),
    $component, 
    array('HIDE_ICONS' => 'Y')
);?>
<?=MibokMed::getContentCounter(SITE_TEMPLATE_ID, 'source')?>
</body>
</html>