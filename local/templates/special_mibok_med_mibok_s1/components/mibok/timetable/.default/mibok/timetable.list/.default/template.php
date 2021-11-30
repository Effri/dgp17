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

<?//$this->addExternalCSS("/bitrix/modules/mibok.med/lib/css/owl.carousel.min.css");?>
<?//$this->addExternalJS("/bitrix/modules/mibok.med/lib/js/owl.carousel.min.js");?>

<?if(count($arResult['ITEMS']) > 0):?>
<div class="bs-docs-section">
	<?$keyNext = -1;
    foreach($arResult['PERIOD_DAY_NO'] as $key => $item):
        
        $nextDay = next($arResult['PERIOD_DAY_NO']);
        if($keyNext == $key)
            continue;
        ?>
		<?if($item['class'] != 'day-no'):?>
			<?if(isset($arResult['TABLE'][date('n',$item['tmp'])][date('j',$item['tmp'])])):?>
				<h3 tabindex="0"><?=MibokMed::ruDateFull("j F Y (l)", $item['tmp']);?></h3>
				<div class="element-list">
                        <?foreach($arResult['TABLE'][date('n',$item['tmp'])][date('j',$item['tmp'])] as $arHour):?>
                            <?foreach($arHour as $arLesson):?>
                                <div class="element-item" data-id="<?=$arLesson['ID']?>">
                                    <div class="element-content" tabindex="0" >
                                        <table class="table">
											<?if($arLesson['BEGIN'] != '00.00' && $arLesson['END']  != '00.00'):?>
												<tr><td colspan="2"><b><?=$arLesson['BEGIN']?> - <?=$arLesson['END']?></b></td></tr>
											<?endif;?>
                                            <?if($arLesson['IBLOCK_LIMIT'] > 0 && $item['class'] != 'day-past'):?>
                                            <tr>
                                                <td width="50%"><?=GetMessage('RECORD_AVAIL')?></td>
                                                <td>
                                                    <span data-rasp-id="<?=$arLesson['ID']?>_<?=$item['tmp']?>" class='count-rasp <?if($arLesson['IBLOCK_LIMIT'] == $arLesson['TABLE_LIMIT']):?>no-item-record glyphicon glyphicon-ban-circle<?endif;?>'>
                                                        <?=$arLesson['TABLE_LIMIT']?>/<?=$arLesson['IBLOCK_LIMIT']?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?elseif($arLesson['IBLOCK_LIMIT'] == '-1' && $item['class'] != 'day-past'):?>
                                                <tr>
                                                    <td width="50%"><?=GetMessage('RECORD_AVAIL')?></td>
                                                    <td>
                                                        <span class='stop-record no-item-record glyphicon glyphicon-ban-circle'></span>
                                                    </td>
                                                </tr>
                                            <?endif;?>   
                                            <?if(!empty($arLesson[$arParams['LIST_SETTINGS_NAME']])):?>
                                                <tr><td width="50%"><?=($arLesson[$arParams['LIST_SETTINGS_NAME'].'_NAME'] ? $arLesson[$arParams['LIST_SETTINGS_NAME'].'_NAME'] : '')?></td><td><?=$arLesson[$arParams['LIST_SETTINGS_NAME']]?></td></tr>
                                            <?endif;?>
                                            <?if(!empty($arLesson[$arParams['LIST_SETTINGS_PROP1']])):?>
                                                <tr><td width="50%"><?=($arLesson[$arParams['LIST_SETTINGS_PROP1'].'_NAME'] ? $arLesson[$arParams['LIST_SETTINGS_PROP1'].'_NAME'] : '')?></td><td> <?=$arLesson[$arParams['LIST_SETTINGS_PROP1']]?></td></tr>
                                            <?endif;?>
                                            <?if(!empty($arLesson[$arParams['LIST_SETTINGS_PROP1']])):?>
                                                <tr><td width="50%"><?=($arLesson[$arParams['LIST_SETTINGS_PROP2'].'_NAME'] ? $arLesson[$arParams['LIST_SETTINGS_PROP2'].'_NAME'] : '')?></td><td> <?=$arLesson[$arParams['LIST_SETTINGS_PROP2']]?></td></tr>
                                            <?endif;?>
                                        </table>
                                        <input type="hidden" name="TIME_INFO" value='<?=json_encode([$arLesson['BEGIN'], $arLesson['END'],$item['tmp']])?>'> 
                                        <div class="button-mibok-timetable"><a href="#" class='btn btn-default mibok-modal-timetable'><?=GetMessage('MODAL_SHOW')?></a></div>
                                    </div>
                                </div>
                            <?endforeach?>
                        <?endforeach;?>
				</div>				
			<?endif;?>
		<?else:?>
			<?if(isset($arResult['INFO_DAY'][$key-1]) && $arResult['INFO_DAY'][$key-1]['class'] == 'day-no'):
				continue;
//			elseif(isset($arResult['INFO_DAY'][$key+1]) && $arResult['INFO_DAY'][$key+1]['class'] == 'day-no'):
//				$date1 = MibokMed::ruDateFull("j F Y (l)", $arResult['INFO_DAY'][$key]['tmp']);
//				$date2 = MibokMed::ruDateFull("j F Y (l)", $arResult['INFO_DAY'][$key+1]['tmp']);
            elseif(isset($nextDay) && $nextDay['class'] == 'day-no'):
                $date1 = MibokMed::ruDateFull("j F Y (l)",$arResult['INFO_DAY'][$key]['tmp']);
                $date2 = MibokMed::ruDateFull("j F Y (l)",$nextDay['tmp']);
                $keyNext = key($arResult['PERIOD_DAY_NO']);
                ?>
				<h3 class="page-header" tabindex="0"><?=($arParams['SIGN_NO_DAY'] ? $arParams['SIGN_NO_DAY']  : GetMessage('LESSONS_NO'))?> <?=(GetMessage('LESSONS_NO_FROM').' '.$date1.' '.GetMessage('LESSONS_NO_TO').' '.$date2)?></h3>
			<?else/*if(!isset($arResult['INFO_DAY'][$key+1]) && !isset($arResult['INFO_DAY'][$key-1]))*/:
				$date1 = MibokMed::ruDateFull("j F Y (l)", $arResult['INFO_DAY'][$key]['tmp']);
				?>
				<h3 class="page-header" tabindex="0"><?=($arParams['SIGN_NO_DAY'] ? $arParams['SIGN_NO_DAY']  : GetMessage('LESSONS_NO'))?> <?=$date1?></h3>
				
			<?endif;?>	
		<?endif;?>
	<?endforeach?>
    <?
        if(LANG_CHARSET == 'windows-1251')
        {
            $arParams['SIGN_RECORD'] = mb_convert_encoding($arParams['SIGN_RECORD'], "UTF-8", "Windows-1251");
//            $arParams['SIGN_RECORD_OK'] = mb_convert_encoding($arParams['SIGN_RECORD_OK'], "UTF-8", "Windows-1251");
//            $arParams['SIGN_RECORD_BACK'] = mb_convert_encoding($arParams['SIGN_RECORD_BACK'], "UTF-8", "Windows-1251");
        }
       ?>
	<input type="hidden" name="FIELD_CODE_MODAL" value='<?= json_encode($arParams['FIELD_CODE_MODAL'])?>'>
	<input type="hidden" name="PROPERTY_CODE_MODAL" value='<?=json_encode($arParams['PROPERTY_CODE_MODAL'])?>'>
	<input type="hidden" name="IBLOCK_TYPE_TIMETABLE" value='<?=$arParams['IBLOCK_TYPE']?>'>
	<input type="hidden" name="IBLOCK_ID_TIMETABLE" value='<?=$arParams['IBLOCK_ID']?>'>
	<input type="hidden" name="LIST_SETTINGS_MODAL_NAME" value='<?=$arParams['LIST_SETTINGS_MODAL_NAME']?>'>
	<input type="hidden" name="MODAL_DATA" value='<?=json_encode($arParams['MODAL_DATA'])?>'>
	<input type="hidden" name="PROPERTY_CODES_RECORD" value='<?=json_encode($arParams['PROPERTY_CODES_RECORD'])?>'>
	<input type="hidden" name="PROPERTY_CODES_RECORD_REQUIRED" value='<?=json_encode($arParams['PROPERTY_CODES_RECORD_REQUIRED'])?>'>
	<input type="hidden" name="RECORD_PARAM" value='<?=json_encode(array($arParams['IBLOCK_TYPE_RECORD'], $arParams['IBLOCK_ID_RECORD'], $arParams['EVENT_MESSAGE_ID']))?>'> 
	<input type="hidden" name="TIMETABLE_AJAX" value='/bitrix/components/mibok/timetable.list/ajax.php'>
    <input type="hidden" name="IS_RECORD" value='<?=$arResult['OPTIONS']['rec_timetable']?>'>
    <input type="hidden" name="SIGN" value='<?=json_encode(array('SIGN_RECORD' => $arParams['SIGN_RECORD']/*, 'SIGN_RECORD_OK' => $arParams['SIGN_RECORD_OK'], 'SIGN_RECORD_BACK' => $arParams['SIGN_RECORD_BACK']*/))?>'>
    <input type="hidden" name="CONSENT" value='<?=json_encode(array('USER_CONSENT' => $arParams['USER_CONSENT'], 'USER_CONSENT_ID' => $arParams['USER_CONSENT_ID'],'USER_CONSENT_IS_CHECKED' => $arParams['USER_CONSENT_IS_CHECKED'], 'USER_CONSENT_IS_LOADED' => $arParams['USER_CONSENT_IS_LOADED']))?>'>
</div>


<?endif;?>

