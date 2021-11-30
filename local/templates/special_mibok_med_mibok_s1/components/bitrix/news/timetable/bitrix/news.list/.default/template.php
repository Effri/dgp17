<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult['LIST_PAGE_URL']=str_replace("#SITE_DIR#/",SITE_DIR,$arResult['LIST_PAGE_URL']);
$arResult['LIST_PAGE_URL']=str_replace("#SITE_DIR#",SITE_DIR,$arResult['LIST_PAGE_URL']);
?>
<?//MibokMed::p($arResult);?>

<?if(!empty($arResult['TABLE'])):?>
<?
if(!empty($arResult['TABLE']))
    $arTable = $arResult['TABLE'];
if(!empty($arResult['DAY']))
    $arDay = $arResult['DAY'];
if(!empty($arResult['HOUR']))
    $arHour = $arResult['HOUR'];
?>
<div class="bs-docs-section">
    <h2><?=GetMessage('PERIOD')?> <?=date('d.m.Y', $arDay[0])?> - <?=date('d.m.Y', $arDay[count($arDay)-1])?>:</h2>
    <?foreach($arDay as $day):
        $timestmp = $day; 
        $tblMonth = date('n', $timestmp);
        $tblDay = date('j', $timestmp);
        ?>
        <?if(!empty($arTable[$tblMonth][$tblDay])):?>
            <h3 class="page-header" tabindex="0"><?=MibokMed::ruDateFull("l, j F Y", $timestmp);?></h3>
            <div class="element-list">
                <?for($i=0; $i < count($arHour); $i++):?>
                    <?if(isset($arTable[$tblMonth][$tblDay]) && !empty($arTable[$tblMonth][$tblDay]) && array_key_exists($arHour[$i],$arTable[$tblMonth][$tblDay])):?>
                        <?foreach($arTable[$tblMonth][$tblDay][$arHour[$i]] as $arItemTable):?>
                            <div class="element-item">
                                <div class="element-content" tabindex="0">
                                    <div><b><?=$arItemTable['BEGIN']?> - <?=$arItemTable['END']?></b></div>
                                    <div><?=$arItemTable['PROP']['TYPE_SPORT']['NAME']?>: <?=$arItemTable['PROP']['TYPE_SPORT']['DISPLAY_VALUE']?></div>
                                    <div><?=$arItemTable['PROP']['HALL']['NAME']?>: <?=$arItemTable['PROP']['HALL']['VALUE']?></div>
                                    <div><?=$arItemTable['PROP']['CLASS']['NAME']?>: <?=$arItemTable['PROP']['CLASS']['VALUE']?></div>
                                    <div><?=$arItemTable['PROP']['TEACHER']['NAME']?>: <a href="<?=$arItemTable['LINK']?>"><?=$arItemTable['SURNAME']?> <?=$arItemTable['NAME_TEACHER']?> <?=$arItemTable['LASTNAME']?></a></div>
                                </div>
                               </div>
                        <?endforeach?>
                    <?endif;?>
                <?endfor?>
            </div>
        <?endif;?>
    <?endforeach?>
    
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
<?endif;?>