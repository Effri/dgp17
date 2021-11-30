<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult['LIST_PAGE_URL']=str_replace("#SITE_DIR#/",SITE_DIR,$arResult['LIST_PAGE_URL']);
$arResult['LIST_PAGE_URL']=str_replace("#SITE_DIR#",SITE_DIR,$arResult['LIST_PAGE_URL']);
?>
<div class="bs-docs-section">
    <h3 class="page-header" tabindex="0"><?=$arResult['NAME']?></h3>                                
    <div class="element-list">
        <?foreach($arResult["ITEMS"] as $arItem):
            $itemProp = '';
            if(!empty($arItem['PROPERTIES']['TYPE_MICRO']['VALUE_XML_ID']))
                $itemProp = 'itemprop="'.$arItem['PROPERTIES']['TYPE_MICRO']['VALUE_XML_ID'].'"';
            ?>
            <div class="element-item">
                <div class="element-content" tabindex="0">
                    <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <div class="element-date"><?echo ToLower($arItem["DISPLAY_ACTIVE_FROM"])?></div>
                    <?endif?>	
                    <h4 class="element-title"><?echo $arItem["NAME"]?></h4>     
                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <?=$arItem["PREVIEW_TEXT"];?>
                    <?elseif($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && !$arItem["PREVIEW_TEXT"] && $arItem["DETAIL_TEXT"]):?>
                        <?=TruncateText($arItem["DETAIL_TEXT"], $arParams['PREVIEW_TRUNCATE_LEN']);?>
                    <?endif;?>
                </div>    
                
                <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
                    if($pid != 'TYPE_SHOW'):?>
                        <br />
                            <?=$arProperty["NAME"]?>:&nbsp;
                            <?if($pid == 'FILE'):?>
                                <?if(isset($arProperty['FILE_VALUE'][0])):?>
                                <ul>
                                    <?foreach($arProperty['FILE_VALUE'] as $arFile):
                                        if(!empty($arFile['DESCRIPTION']))
                                            $file = $arFile['DESCRIPTION'];
                                        else
                                            $file = $arFile['ORIGINAL_NAME'];
                                        ?>
                                        <li <?=$itemProp?>>
                                            <a href="<?=$arFile['SRC']?>" target="_blank">
                                                <div class="l-document-name"><?=($arFile['DESCRIPTION'] ? $arFile['DESCRIPTION'] : GetMessage('FILE'))?> (<?=GetMessage('FORMAT')?> <?=MibokMed::GetExtens($arFile['ORIGINAL_NAME'])?>, <?=GetMessage('WEIGHT')?> <?=MibokMed::FBytes($arFile['FILE_SIZE'])?> <?=GetMessage('KB')?>)</div>

                                            </a>
                                        </li>
                                    <?endforeach;?>
                                </ul>
                                <?else:
                                    $arFile = $arProperty['FILE_VALUE'];
?>
                                    <span <?=$itemProp?>>
                                        <a href="<?=$arFile['SRC']?>" target="_blank">
                                            <div class="l-document-name"><?=($arFile['DESCRIPTION'] ? $arFile['DESCRIPTION'] : GetMessage('FILE'))?> (<?=GetMessage('FORMAT')?> <?=MibokMed::GetExtens($arFile['ORIGINAL_NAME'])?>, <?=GetMessage('WEIGHT')?> <?=MibokMed::FBytes($arFile['FILE_SIZE'])?> <?=GetMessage('KB')?>)</div>
                                            
                                        </a>
                                    </span>
                                <?endif;?>
                            <?else:?>
                                <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                                    <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                                <?else:?>
                                    <?=$arProperty["DISPLAY_VALUE"];?>
                                <?endif?>
                            <?endif?>
                    <?endif?>
				<?endforeach;?>
            </div>
        <?endforeach;?>											
    </div>	    
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>