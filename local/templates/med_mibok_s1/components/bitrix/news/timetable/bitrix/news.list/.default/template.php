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

<?if(!empty($arResult['TABLE'])):?>
<?
if(!empty($arResult['TABLE']))
    $arTable = $arResult['TABLE'];
if(!empty($arResult['DAY']))
    $arDay = $arResult['DAY'];
if(!empty($arResult['HOUR']))
    $arHour = $arResult['HOUR'];

$height = 132;
?>
<p class="timing-name-description"><?=GetMessage('PERIOD')?> <?=date('d.m.Y', $arDay[0])?> - <?=date('d.m.Y', $arDay[count($arDay)-1])?></p>
<div class="clearfix timing">
    <div class="timing-month">
        <div><?/*=MibokMed::ruMonth(date('n'))*/?></div>
    </div>

    <div class="timing-header">
        <div class="swiper-container" id="timing-header">
            <div class="swiper-wrapper">
                <?foreach($arDay as $day):
                    $timestmp = $day; 
                ?>
                    <div class="swiper-slide <?if($arResult['CURRENT'] == date('j.n',$timestmp)):?>timing-active<?endif?>">
                        <span class="timing-header-week"><?=MibokMed::ruDateFull("D", $timestmp);?></span>
                        <span class="timing-header-num"><?=date('j', $timestmp);?></span>
                        <span class="timing-header-month"><?=MibokMed::ruDateFull("F", $timestmp);?></span>
                        <span class="timing-full-time">
                            <?=MibokMed::ruDateFull("l, j F Y", $timestmp);?>
                        </span>
                    </div>
                <?endforeach;?>
            </div>
        </div>
        <div class="timing-arrow-btn timing-arrow-prev"></div>
        <div class="timing-arrow-btn timing-arrow-next"></div>
    </div>

    <div class="timing-table" id="timing-table">

        <div class="timing-date">
            <?foreach ($arHour as $hour):?>
                <div><span><?=$hour?>.00</span></div>
            <?endforeach;?>
        </div>

        <div class="timing-table-wrapper">
            <div class="swiper-container" id="timing-body">
                <div class="swiper-wrapper">
                    <?foreach($arDay as $day):
                        $timestmp = $day; 
                        $tblMonth = date('n', $timestmp);
                        $tblDay = date('j', $timestmp);
                        ?>
                        <div class="swiper-slide">
                            <?//foreach ($arHour as $hour):?>
                            <?for($i=0; $i < count($arHour); $i++):?>
                                <div class="timing-wrapper-cell">
                                   <?if(isset($arTable[$tblMonth][$tblDay]) && !empty($arTable[$tblMonth][$tblDay]) && array_key_exists($arHour[$i],$arTable[$tblMonth][$tblDay])):?>
                                        <?foreach($arTable[$tblMonth][$tblDay][$arHour[$i]] as $arItemTable):?>
                                            <?
                                            //ведем рассчет сколько €чеек займет расписание
                                            $padTop = $arItemTable['PADDING_TOP'] * $height;
                                            $heightTop = (1 - $arItemTable['PADDING_TOP']) * $height;
                                            $heightBot = $arItemTable['PADDING_END'] * $height;
                                            $heightCell = $heightTop + $heightBot + $height * $arItemTable['COUNT_FULL_CELL'];
                                            $colorCell = 'timing-table-one';
                                            if(isset($arItemTable['PROP']['COLOR']['VALUE_XML_ID']) && !empty($arItemTable['PROP']['COLOR']['VALUE_XML_ID']))
                                                $colorCell = $arItemTable['PROP']['COLOR']['VALUE_XML_ID'];
                                            ?>
                                            <div class="timing-cell tooltip-block <?=$colorCell?>" style="height:<?=$heightCell?>px; top:<?=$padTop?>px"  data-color="<?=$colorCell?>" data-height="<?=$heightCell?>" data-top="<?=$padTop?>">
                                                <span class="timing-table-time"><?=$arItemTable['BEGIN']?> - <?=$arItemTable['END']?></span>
                                                <p class="timing-table-bottom">
                                                    <span class="timing-table-direct"><?=$arItemTable['PROP']['TYPE_SPORT']['DISPLAY_VALUE']?></span>
                                                    <span class="icon-down-chevron"></span>
                                                </p> 
                                                <div class="tooltip_content <?=$colorCell?>" data-color="<?=$colorCell?>">
                                                    <div class="tooltip-header tooltip-item timing-table-direct"><?=$arItemTable['PROP']['TYPE_SPORT']['DISPLAY_VALUE']?></div>
                                                    <div class="tooltip-item"><span class="icon-clock"><?=$arItemTable['BEGIN']?> - <?=$arItemTable['END']?></span></div>
                                                    <div class="tooltip-item"><span class="icon-map-placeholder"><?=$arItemTable['PROP']['HALL']['VALUE']?></span></div>
                                                    <div class="tooltip-item"><span class="icon-group"><?=$arItemTable['PROP']['CLASS']['VALUE']?></span></div>
   
                                                    <div class="tooltip-item timing-table-direct"><span class="icon-user"><a href="<?=$arItemTable['LINK']?>"><?=$arItemTable['SURNAME']?> <?=mb_substr($arItemTable['NAME_TEACHER'],0,1)?>. <?if(!empty($arItemTable['LASTNAME'])):?><?=mb_substr($arItemTable['LASTNAME'],0,1)?>.<?endif;?></a></span></div>
                                                 </div>
                                            </div>
                                        <?endforeach?>
                                    <?endif;?>
                                </div>
                            <?endfor?>
                        </div>
                    <?endforeach?>
                </div>
            </div>
        </div>

    </div>

</div>
<?else:?>
    <div class="clearfix timing">
        <div class="timing-table" id="timing-table">
        <?if(!empty($arResult['DAY'])):
            $arDay = $arResult['DAY'];?>
            <p class="bg-warning bg-label"><?=GetMessage('WARNING_1')?> <?=date('d.m.Y', $arDay[0])?> - <?=date('d.m.Y', $arDay[count($arDay)-1])?> <?=GetMessage('WARNING_2')?></p>
        <?else:?>
            <p class="bg-warning bg-label"><?=GetMessage('WARNING')?></p>
        <?endif;?>
        </div>
    </div>
<?endif;?>

