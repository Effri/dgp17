<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<?
CJSCore::Init(['ajax']);
?>
<?
$date = date('j',$arParams['TIME_INFO'][2]);
$month = MibokMed::ruDateFull("F", $arParams['TIME_INFO'][2]);
$text = $date.' '.$month.' '.$arParams['TIME_INFO'][0].' - '.$arParams['TIME_INFO'][1]."\n";
//$text .= $arParams['LESSON_INFO'][0]."\n";
//$text .= $arParams['LESSON_INFO'][1]."\n";
//$text .= $arParams['LESSON_INFO'][2]."\n";
foreach($arParams['MODAL_DATA'] as $item)
{
    if(strpos($item, 'PROPERTY_') === false)
    {
        if(isset($arResult[$item]) && !empty($arResult[$item]))
        {
            $text .= GetMessage("IBLOCK_FIELD_".$item).': '.$arResult[$item];
        }
    }
    else
    {
        $item = str_replace('PROPERTY_', '', $item);
        if(isset($arResult["DISPLAY_PROPERTIES"][$item]) && !empty($arResult["DISPLAY_PROPERTIES"][$item]["DISPLAY_VALUE"]))
        {
            $text .= $arResult["DISPLAY_PROPERTIES"][$item]["NAME"].': ';
            if($item == 'TEACHER')
                $text .= $arResult['DISPLAY_PROPERTIES']['TEACHER']['FULL'];
            else
            {
                if(is_array($arResult["DISPLAY_PROPERTIES"][$item]["DISPLAY_VALUE"]))
                    $text .= implode("&nbsp;/&nbsp;", $arResult["DISPLAY_PROPERTIES"][$item]["DISPLAY_VALUE"]);
                else
                    $text .= $arResult["DISPLAY_PROPERTIES"][$item]["DISPLAY_VALUE"];
            }
        }
        elseif(isset($arResult["PROPERTIES"][$item]) && !empty($arResult["PROPERTIES"][$item]["VALUE"]))
        {
            $text .= $arResult["PROPERTIES"][$item]["NAME"].': ';
            if(is_array($arResult["PROPERTIES"][$item]["VALUE"]))
                $text .= implode("&nbsp;/&nbsp;", $arResult["PROPERTIES"][$item]["VALUE"]);
            else
                $text .= $arResult["PROPERTIES"][$item]["VALUE"];
        }
    }
    $text .= "\n";
}
?>

<div class="modal-body mibok-dropdown">
    <div class="modal-wrapper-info">
        <table class="table">
            <?foreach($arResult["FIELDS"] as $code=>$value):
                if($code != $arParams['MODAL_NAME'] && !empty($value) && $code != 'ACTIVE_FROM' && $code != 'ACTIVE_TO'):
                ?>
                <tr>
                    <?if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
                    {
                        ?>
                        <td width="50%"><span class='modal-name-category'><?=GetMessage("IBLOCK_FIELD_".$code)?></span></td>
                            <?
                        if (!empty($value) && is_array($value))
                        {
                            ?><td><img border="0" src="<?=$value["SRC"]?>"></td><?
                        }
                    }
                    else
                    {?>
                        <td width="50%"><span class='modal-name-category'><?=GetMessage("IBLOCK_FIELD_".$code)?></span></td>
                        <td><span class='modal-value-category'><?=$value;?></span></td>
                    <?
                    }
                    ?>
                </tr>
                <?endif;?>
            <?endforeach;?>
            <?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
                if($pid != str_replace('PROPERTY_','',$arParams['MODAL_NAME']) && !empty($arProperty["DISPLAY_VALUE"])):
                ?>
                <tr>
                    <?if($pid == 'TEACHER' && !empty($arProperty['PHOTO']['src'])):?>
						<td width="50%"><span class='modal-name-category'><?=$arProperty["NAME"]?></span></td>
						<td>
                            <div class="modal-teacher-info modal-teacher-img"><img class='img-responsive' src='<?=$arProperty['PHOTO']['src']?>'></div>
                            <div class="modal-teacher-info modal-teacher-text">
                                <span class='modal-value-category'><?=$arProperty['DISPLAY_VALUE']?></span>
                            </div>
                        </td>
                    <?elseif($pid == 'COLOR'):
                        continue;?>
                    <?else:?>
                        <td width="50%"><span class='modal-name-category'><?=$arProperty["NAME"]?></span></td>
                        <td><span class='modal-value-category'>
                            <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                                <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                            <?else:?>
                                <?=$arProperty["DISPLAY_VALUE"];?>
                            <?endif?>
                        </span></td>
                    <?endif;?>
                </tr>
                <?endif?>
            <?endforeach;?>
        </table>
    </div>
</div>

<?if(isset($arParams['IS_RECORD']) && $arParams['IS_RECORD'] =='Y'):?>

<div class="modal-footer">
    <?$APPLICATION->IncludeComponent(
                       "mibok:iblock.element.add", 
                       "timetable_form", 
                       array(
                           "AJAX_MODE" => "Y",
                           "AJAX_OPTION_ADDITIONAL" => time(),
                           "AJAX_OPTION_HISTORY" => "N",
                           "AJAX_OPTION_JUMP" => "N",
                           "AJAX_OPTION_STYLE" => "Y",
                           "ALLOW_DELETE" => "N",
                           "ALLOW_EDIT" => "N",
                           "AJAX_OPTION_SHADOW" => "Y",
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
                           "IBLOCK_ID" => $arParams['RECORD_PARAM'][1],
                           "IBLOCK_TYPE" => $arParams['RECORD_PARAM'][0],
                           "LEVEL_LAST" => "N",
                           "MAX_FILE_SIZE" => "0",
                           "MAX_LEVELS" => "100000",
                           "MAX_USER_ENTRIES" => "100000",
                           "NAV_ON_PAGE" => "0",
                           "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                           "PROPERTY_CODES" => $arParams['PROP_RECORD'],
                           "PROPERTY_CODES_REQUIRED" => $arParams['PROP_RECORD_REQ'],
                           "RESIZE_IMAGES" => "N",
                           "SEF_MODE" => "N",
                           "STATUS" => "INACTIVE",
                           "STATUS_NEW" => "N",
                           "USER_MESSAGE_ADD" => GetMessage('FORM_OK'),
                           "USER_MESSAGE_EDIT" => "",
                           "USE_CAPTCHA" => "N",
                           "COMPONENT_TEMPLATE" => "timetable_form",
                           "EVENT_MESSAGE_ID" => array(
                               0 => $arParams['RECORD_PARAM'][2],
                           ),
                           'TEXT_INFO' => $text,
                       ),
                       false
                   );?>
</div>
<?endif;?>