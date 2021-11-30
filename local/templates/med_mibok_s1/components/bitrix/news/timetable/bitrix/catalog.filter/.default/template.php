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

<div class="clearfix l-timetable-tabs">

    <form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
        <?foreach($arResult["ITEMS"] as $arItem):
            if(array_key_exists("HIDDEN", $arItem)):
                echo $arItem["INPUT"];
            endif;
        endforeach;?>

        <?$countSelect = 0;
        foreach($arResult["ITEMS"] as $keyItem => $arItem):?>
            <?if(!array_key_exists("HIDDEN", $arItem)):
                $valSel = false;
                $keyTemp= false;
?>
                <?if($arItem['TYPE'] == 'SELECT'):
                    $countSelect++;
?>
                    <?foreach($arItem['LIST'] as $key => $li):?>
                        <?//выбран пункт селекта или нет?
                        if($key == $arItem['INPUT_VALUE'])
                            $valSel = $key;
                        if(!empty($key) && !$keyTemp)
                            $keyTemp = $key;
                        ?>
                    <?endforeach?>
                    <?//если в фильтре еще ничего не выбрано и это вид спорта, то тогда ставим 1е значение по умолчанию
//                    if(!$valSel && $arItem['DEFAULT'])
//                        $valSel = $keyTemp;
                        ?>
                    <div class="tab tab-select <?if($countSelect % 2 == 0):?> tab-even <?endif;?>">
                        <span>
                            <?if($valSel):?>
                                <?=$arItem['LIST'][$valSel]?>
                            <?else:?>
                                <?=$arItem['NAME']?>
                            <?endif;?>
                        </span>
                        <div class="tab-option">
                            <ul>
                                <?foreach($arItem['LIST'] as $key => $li):?>
                                    <?//if(!empty($key)):?>
                                        <li data-val="<?=$key?>"><?=$li?></li>
                                    <?//endif;?>
                                <?endforeach?>
                                
                            </ul>
                        </div>
                    </div>
                    <select class="select" name="<?=$arItem['INPUT_NAME']?>">
                        <option value="<?=$valSel?>" selected></option>
                    </select>
                <?/*elseif($arItem['TYPE'] == 'DATE_RANGE'):?>
                    <input type="hidden" name="<?=$arItem['INPUT_NAMES'][0]?>" value="<?=$arResult['DATE_FILTER']['period_begin'] . ' 00:00:00'?>" />
                    <input type="hidden" name="<?=$arItem['INPUT_NAMES'][1]?>" value="<?=$arResult['DATE_FILTER']['period_end'] . ' 23:59:59'?>" />
                <?*/endif?>
            <?endif?>
        <?endforeach;?>
		
        <div class="hidden">
            <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" />
            <input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
            <input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" />
        </div>

    </form>
</div>