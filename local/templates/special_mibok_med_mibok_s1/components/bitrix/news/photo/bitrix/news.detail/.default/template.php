<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="element-detail">    
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):
            $arr = ParseDateTime($arResult['ACTIVE_FROM'], FORMAT_DATETIME);
            $arResult["DISPLAY_ACTIVE_FROM"]=(int)$arr["DD"]." ".ToLower(GetMessage("MONTH_".intval($arr["MM"])."_S"))." ".$arr["YYYY"];?>
            <p class="element-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
    <?endif;?>
    <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
            <h3><?=$arResult["NAME"]?></h3>
    <?endif;?>
    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
            <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
    <?endif;?>
    <?if($arResult["NAV_RESULT"]):?>
        <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
        <?echo $arResult["NAV_TEXT"];?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
    <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
        <p><?echo $arResult["DETAIL_TEXT"];?></p>
    <?else:?>
        <p><?echo $arResult["PREVIEW_TEXT"];?></p>
    <?endif?>	
    <?//p($arResult["DISPLAY_PROPERTIES"]);?>
    <?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
        <p>
        <?=$arProperty["NAME"]?>:&nbsp;
        <?if(is_array($arProperty["DISPLAY_VALUE"]) && $pid != 'FILE'):?>
                <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
        <?elseif(is_array($arProperty["DISPLAY_VALUE"]) && $pid == 'FILE'):?>
            <ul>
                <?foreach($arProperty['DISPLAY_VALUE'] as $key => $arFile):?>
                    <li><img src="<?=$arResult["RESIZE"][$key]['src']?>" title="<?=$arProperty['DESCRIPTION'][$key]?>">&nbsp;&nbsp;&nbsp;<span><?=$arFile?></span><br><br></li>
                <?endforeach;?>
            </ul>
        <?else:?>
                <?=$arProperty["DISPLAY_VALUE"];?>
        <?endif?>
        </p>  
    <?endforeach;?>
</div> 