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
<form name="iblock_add_contact" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" id="contact">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
    
    <?$i = 0;
    foreach ($arResult["PROPERTY_LIST"] as $propertyID):?>
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
        
        ?>

        <?if($propertyID == 'NAME'):?>
            <input type="hidden" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="25" value="<?=$placeholder?>" />
        <?else:?>
            <?if($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T" && !isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])):?>
                <label><?=$placeholder?></label>
               <textarea class ="form-control" placeholder="" name="PROPERTY[<?=$propertyID?>][<?=$i?>]"><?=$value?></textarea>
            <?elseif($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S" && !isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])):?>
                <label><?=$placeholder?></label>
                <input class ="form-control" type="<?=($placeholder == 'E-MAIL' ? 'email' : 'text')?>" placeholder="" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" value="<?=$value?>">
            <?endif?>
        <?endif;?>
    <?endforeach;?>
                 
    <?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
        <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
        <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br>
        <label><input type="text" class ="form-control" name="captcha_word" placeholder="<?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?>" ></label>
    <?endif?>
    <?if (!empty($arResult["ERRORS"])):?>
        <p class="bg-danger bg-label"><?=implode("<br />", $arResult["ERRORS"])?></p>
    <?endif;
    if (strlen($arResult["MESSAGE"]) > 0):?>
        <p class="bg-success bg-label"><?=$arResult["MESSAGE"]?></p>
    <?endif?>
    <input type="submit" name="iblock_submit" class="btn btn-default l-footer-submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
</form>