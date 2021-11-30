<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
?>


<?asort($arResult["PROPERTY_LIST"])?>
<?//p($arResult);?>
<div class="mibok-wrapper-form" <?if(!empty($arResult['ERRORS'])):?>style="display:block;"<?endif;?>>
    <form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" >
        <div class='mibok-form-name'><?=GetMessage('TIMETABLE_FAST_RECORD')?></div>
        <?=bitrix_sessid_post()?>
        <?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>

        <?$i = 0;
        foreach ($arResult["PROPERTY_LIST"] as $propertyID):
            ?>
            <?if (intval($propertyID) > 0)
            {
                $placeholder = $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"];
            }
            else
            {
                $placeholder =  !empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID);
            }
            if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
            {
                $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
            }
            /*elseif ($i == 0)
            {
                $value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
            }*/
            else
            {
                $value = "";
            }
            if($placeholder == 'E-MAIL')
                $placeholder = GetMessage('TIMETABLE_PHONE_EMAIL');
            if($propertyID == 'PREVIEW_TEXT' && empty($value) && !empty($arParams['TEXT_INFO']))
                $value = $arParams['TEXT_INFO'];
            ?>
            <?if($propertyID == 'NAME'):?>
                <input type="hidden" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="25" value="<?=GetMessage('TIMETABLE_NAME_RECORD')?>" />
            <?else:?>
                <div class="form-group" <?if($propertyID == 'PREVIEW_TEXT'):?>style="display:none;"<?endif;?>>
                    <?if($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T" && !isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])):?>
                        <textarea class="form-control" placeholder="<?=$placeholder?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]"><?=$value?></textarea>
                    <?elseif($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S" && !isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])):?>
                        <input class="form-control" type="text" placeholder="<?=$placeholder?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" value="<?=$value?>">
                    <?endif?>
                </div>
            <?endif;?>
        <?endforeach;?>

        <?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br>
            <label><input type="text" name="captcha_word" placeholder="<?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?>" ></label>
        <?endif?>

        <?if (!empty($arResult["ERRORS"])):?>
            <p class="bg-danger bg-label"><?=implode("<br />", $arResult["ERRORS"])?></p>
        <?
        elseif (strlen($arResult["MESSAGE"]) > 0):?>
            <p class="bg-success bg-label"><?=$arResult["MESSAGE"]?></p>
        <?endif?>
        <div class="form-group">
            <input type="submit" name="iblock_submit" class="form-control btn btn-mibok mibok-form-submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" disabled>
        </div>
            <input type="hidden" name="IBLOCK_ID" value="<?=$arParams['IBLOCK_ID']?>" />
            <input type="hidden" name="IBLOCK_TYPE" value="<?=$arParams['IBLOCK_TYPE']?>" />
            <input type="hidden" name="PROPERTY_CODES" value='<?=json_encode($arParams['PROPERTY_CODES'])?>' />
            <input type="hidden" name="PROPERTY_CODES_REQUIRED" value='<?=json_encode($arParams['PROPERTY_CODES_REQUIRED'])?>' />
            <input type="hidden" name="EVENT_MESSAGE_ID" value='<?=json_encode($arParams['EVENT_MESSAGE_ID'])?>' />
    </form>
</div>

<div class="mibok-wrapper-success">
    <div class="mibok-success"><?=GetMessage('TIMETABLE_SUCCESS')?></div>
    <div class="form-group">
        <button type="button" class="btn btn-mibok" data-dismiss="modal"><?=GetMessage('TIMETABLE_BACK')?></button>
    </div>
</div>