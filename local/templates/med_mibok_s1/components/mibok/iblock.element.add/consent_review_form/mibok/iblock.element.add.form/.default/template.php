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
<br>
<h3><?=GetMessage('TITLE_REVIEW')?></h3>
<br>
<form name="iblock_add_contact" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" id="contact">
	<?=bitrix_sessid_post()?>
    <input type="hidden" value="<?=$arParams['AJAX_OPTION_ADDITIONAL'];?>" name="ajax_opt_add">
    <input type="hidden" name="form-review" value="Y">
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
    
    <?$i = 0;
    foreach ($arResult["PROPERTY_LIST"] as $key => $propertyID)
        if($propertyID == 'PREVIEW_TEXT')
        {
            $arResult["PROPERTY_LIST"][1000] = $propertyID;
            unset($arResult["PROPERTY_LIST"][$key]);
        }
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
            <label><input type="text" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="25" placeholder="<?=$placeholder?>" value="<?=$value?>" /></label>
        <?else:?>
            <?//p($arResult["PROPERTY_LIST_FULL"][$propertyID]);?>
            <?if($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T" && !isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])):?>
                <label><textarea placeholder="<?=$placeholder?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]"><?=$value?></textarea></label>
            <?elseif($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S" && !isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])):?>
                <label><input type="<?=($placeholder == 'E-MAIL' ? 'email' : 'text')?>" placeholder="<?=$placeholder?>" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" value="<?=$value?>"></label>
            <?elseif($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "L" && $arResult["PROPERTY_LIST_FULL"][$propertyID]["CODE"] == 'RATING'):
                $arRating = end($arResult["PROPERTY_LIST_FULL"][$propertyID]['ENUM']);
                ?>
                <label>
                <?foreach($arResult["PROPERTY_LIST_FULL"][$propertyID]['ENUM'] as $enum):?>
                    <a class="add-rating icon-star active" href="#" data-star="<?=$enum['ID']?>"></a>
                <?endforeach;?>
                    <input type="hidden" class='add-rating-value' name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="25" placeholder="<?=$placeholder?>" value="<?=$arRating['ID']?>" />
                </label>
            <?elseif($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "E" && $arResult["PROPERTY_LIST_FULL"][$propertyID]["CODE"] == 'PEOPLE'):
                ?>
                <label>
                    <span class="label-select"><?=GetMessage('TYPE_REVIEW')?></span>
                    <select name="PROPERTY[<?=$propertyID?>][<?=$i?>]" class='select-style'>
                        <?foreach($arResult["PROPERTY_LIST_FULL"][$propertyID]['ENUM'] as $key => $enum):?>
                            <option value="<?=$key?>"><?=$enum?></option>
                        <?endforeach;?>
                    </select>
                </label>
            <?endif?>
        <?endif;?>
    <?endforeach;?>
                 
    <?//if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):
    if (isset($arParams['TYPE_CAPTCHA']) && $arParams['TYPE_CAPTCHA'] == 'BITRIX'):?>        
        <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
        <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br>
        <label><input type="text" name="captcha_word" placeholder="<?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?>" ></label>
    <?elseif(isset($arParams['TYPE_CAPTCHA']) && $arParams['TYPE_CAPTCHA'] == 'RECAPTCHA'):?>
        <?if($arResult['RECAPTCHA']['recaptcha_version'] == 2):?>
            <div class="g-recaptcha" id="recaptcha-contact" data-sitekey="<?=$arResult['RECAPTCHA']['recaptcha_key']?>"></div>
        <?endif;?>
        <?if($arResult['RECAPTCHA']['recaptcha_version'] == 3):?>
           <?//p($componentPath);?>
            <script>
                 grecaptcha.ready(function() {
                    grecaptcha.ready(function() {
                        grecaptcha.execute('<?php echo $arResult['RECAPTCHA']['recaptcha_key']; ?>', {action: ''}).then(function(token) {
                            $('[name=iblock_add_contact]').append('<textarea class="hidden" name="recaptcha_token">' + token + '</textarea>')
                        });
                    });
                });
                </script>
        <?endif;?>
    <?endif?>
        
    
		<?if ($arParams['USER_CONSENT'] == 'Y' && file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/lib/userconsent/consent.php') && isset($arResult['MIBOK_CONSENT'])):?>
		<div class="form-group form-consent">
			<?$consentCheck = '';
			if( (isset($arResult["CONSENT_RESULT"]) && $arResult["CONSENT_RESULT"]) || (!isset($arResult["CONSENT_RESULT"]) && $arParams['USER_CONSENT_IS_CHECKED'] == 'Y') )
				$consentCheck = 'checked';
			?>
			<input type="checkbox" class="checkbox consent-review" name="iblock_consent" id="iblock_consent" value="Y" <?=$consentCheck?>><label for="iblock_consent" data-toggle="modal" data-target="#myModalConsentRew"><?=$arResult['MIBOK_CONSENT_LABEL']?></label>
		</div>
    <?endif;?>
                
    <?if (!empty($arResult["ERRORS"])):?>
        <p class="bg-danger bg-label"><?=implode("<br />", $arResult["ERRORS"])?></p>
    <?endif;
    if (strlen($arResult["MESSAGE"]) > 0):?>
        <p class="bg-success bg-label"><?=$arResult["MESSAGE"]?></p>
    <?endif?>        
    <input type="submit" name="iblock_submit" class="btn btn-blue " value="<?=GetMessage("IBLOCK_FORM_REVIEW")?>" />
</form>

<?if ($arParams['USER_CONSENT'] == 'Y' && file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/lib/userconsent/consent.php') && isset($arResult['MIBOK_CONSENT'])):?>
	<div class="modal fade modalConsent" id="myModalConsentRew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			
			<h4 class="modal-title" id="myModalLabel"><?=GetMessage('READ_CONSENT')?></h4>
		  </div>
		  <div class="modal-body mibok-consent-text">
			  <?=$arResult['MIBOK_CONSENT']?>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-blue mibok-consent-yes" data-dismiss="modal"><?=GetMessage('READ_CONSENT_YES')?></button>
			<button type="button" class="btn btn-default mibok-consent-no"  data-dismiss="modal"><?=GetMessage('READ_CONSENT_NO')?></button>
		  </div>
		</div>
	  </div>
	</div>
<?endif;?>