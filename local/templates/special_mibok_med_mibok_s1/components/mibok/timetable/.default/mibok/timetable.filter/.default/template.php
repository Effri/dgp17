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

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="post">
	<h2><?=($arParams['SIGN_HEAD'] ? $arParams['SIGN_HEAD'] : GetMessage('TIMETABLE_H1'))?> 
    <?/*=GetMessage('PERIOD')?><?=$arResult['PERIOD'][0]?> - <?=$arResult['PERIOD'][count($arResult['PERIOD'])-1]*/?>
        <?if(!isset($arParams['FILTER_DATE_RANGE']) || $arParams['FILTER_DATE_RANGE'] == 'Y'):
            $periodBegin = ($arResult['REQUEST']['period_begin'] ? $arResult['REQUEST']['period_begin'] : $arResult['PERIOD'][0]);
            $periodEnd = ($arResult['REQUEST']['period_end'] ? $arResult['REQUEST']['period_end'] : $arResult['PERIOD'][count($arResult['PERIOD'])-1]);
    ?>
            <?=GetMessage('PERIOD')?> 
            <div class="inline-block">
                <div class="input-daterange input-group mibok-daterange" id="datepicker">
                    <input type="hidden" class="hidden" name="daterange" value="<?=$periodBegin?>,<?=$periodEnd?>" />
                    <input type="hidden" class="hidden" name="minDate" value="<?=$arResult['DATEPICKER']['MIN_DATE']?>" />
                    <input type="hidden" class="hidden" name="dateLimit" value="<?=$arResult['DATEPICKER']['DATE_LIMIT']?>" />
                    <input type="hidden" class="hidden" name="dayList" value="<?=GetMessage('DAY_LIST')?>" />
                    <input type="hidden" class="hidden" name="monthList" value="<?=GetMessage('MONTH_LIST')?>" />
                     <input type="hidden" class="form-control" name="period_begin"  value="<?=$periodBegin?>" >
                    <input type="hidden" class="form-control" name="period_end" value="<?=$periodEnd?>" />
                    <div class="input-group date">
                        <input type="text" class="form-control" name="period_begin_end"  value="<?=$periodBegin?> - <?=$periodEnd?>" readonly>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
            </div>
        <?else:?>
        <?=GetMessage('PERIOD')?><span><?=$arResult['PERIOD'][0]?> - <?=$arResult['PERIOD'][count($arResult['PERIOD'])-1]?></span>
        <?endif;?>
    </h2>
	<table class="data-table" cellspacing="0" cellpadding="2">
        <tbody>
			<?if(!empty($arResult['FILTER_HEADER'])):?>
				<?foreach($arResult['FILTER_HEADER'] as $key => $arValue):?>
					<?if(!empty($arValue['VALUE_LIST'])):?>
						<tr>
							<td valign="top"><?=$arValue['NAME']?>:</td>
							<td valign="top">
								<select class="select" name="<?=$arValue['NAME_CHECK']?>" multiple="">
									<option value=""><?=GetMessage('DEFAULT_ALL')?></option>
									<?foreach($arValue['VALUE_LIST'] as $keyV => $value):?>
										<option value="<?=$arValue['VALUE_CHECK'][$keyV]?>" <?=str_replace('checked', 'selected',$arValue['CHECKED'][$keyV])?>><?=$value?></option>
									<?endforeach?>
								</select>
							</td>
						</tr>
					<?endif;?>
				<?endforeach;?>
			<?endif?>	
			<?if(!empty($arResult['FILTER_ALL'])):?>
				<?foreach($arResult['FILTER_ALL'] as $key => $arValue):?>
					<?if(!empty($arValue['VALUE_LIST'])):?>
						<tr>
							<td valign="top"><?=$arValue['NAME']?>:</td>
							<td valign="top">
								<select class="select" name="<?=$arValue['NAME_CHECK']?>" multiple="">
									<option value=""><?=GetMessage('DEFAULT_ALL')?></option>
									<?foreach($arValue['VALUE_LIST'] as $keyV => $value):?>
										<option value="<?=$arValue['VALUE_CHECK'][$keyV]?>" <?=str_replace('checked', 'selected',$arValue['CHECKED'][$keyV])?>><?=$value?></option>
									<?endforeach?>
								</select>
							</td>
						</tr>
					<?endif;?>
				<?endforeach;?>
			<?endif?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <input type="submit" class="btn btn-default" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
                    <input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
                    <input type="submit" class="btn btn-default" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" />
                </td>
            </tr>
        </tfoot>
	</table>
	
</form>


