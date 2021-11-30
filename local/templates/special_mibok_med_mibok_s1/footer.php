<?IncludeTemplateLangFile(__FILE__);?>	
</div>
                    </div>
                </div>
            </div>      
            <?if($APPLICATION->GetCurDir() == '/'){?>
                <div class="container bs-docs-container wcag" role="complementary" id="complementary_content"><div class="row"><div class="col-md-12"><div class="bs-docs-section"></div><div class="bs-docs-section"><?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"type_sport_index", 
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
		"COMPONENT_TEMPLATE" => "type_sport_index",
		"MIBOK_SPECIAL_KEY" => "0633a2dcc1fa3215370fd885ef3d515d"
	),
	false
);?></div><div class="bs-docs-section"></div><div class="bs-docs-section"></div></div></div></div>            
            <?}?>
            <footer class="bs-docs-footer" role="contentinfo">
                <div class="container wcag">
                    <div class="panel-group">
                        <button type="button" class="btn btn-default go-top" tabindex="0" aria-label="<?=GetMessage('GO_TOP_BUTTON_TITLE')?>"><span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;<?=GetMessage('GO_TOP_BUTTON_TITLE')?><span class="hover"></span></button>
                    </div>    
                    <?$APPLICATION->IncludeComponent("bitrix:menu", ".default", Array("ROOT_MENU_TYPE" => "bottom",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => "",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MIBOK_SPECIAL_KEY" => "f366fc3fa0306f016766df4d1f8d4e11"));?>
					<?if(CModule::IncludeModule('advertising')):?>
                                   
					<?endif;?>					
                    <div class="row">
                        <div class="col-md-12" tabindex="0">
                            <div class="address"><strong><?=GetMessage('SITE_ADDRESS')?>:</strong> <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."med_mibok_include/site_address.php", "MIBOK_SPECIAL_COMPARE" => "N"));?></div>
                            <div class="address"><strong><?=GetMessage('SITE_EMAIL')?>:</strong> <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."med_mibok_include/site_email.php", "MIBOK_SPECIAL_COMPARE" => "N"));?></div>
                            <div class="address"><strong><?=GetMessage('SITE_PHONE')?>:</strong> <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."med_mibok_include/site_phone.php", "MIBOK_SPECIAL_COMPARE" => "N"));?></div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-md-12">
                            <div class="copy"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."med_mibok_include/site_copy.php", "MIBOK_SPECIAL_COMPARE" => "N"));?></div>
                        </div>
                    </div>
                    <div class='mibok-informer-counter'>
                        <?=MibokMed::getContentCounter(SITE_TEMPLATE_ID, 'informer')?>
                    </div>
                </div>                 
            </footer>
			
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
		
		
		
		
        <script src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.scrollTo-min.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/js/libs/jquery.form.min.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/js/toolbar.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/js/menu.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/js/app.js"></script>
        <?$APPLICATION->IncludeComponent("mibok:special_check_auth", "", array("MIBOK_SPECIAL_COMPARE" => "N"))?>
        <?=MibokMed::getContentCounter(SITE_TEMPLATE_ID, 'source')?>
    </body>
</html>
