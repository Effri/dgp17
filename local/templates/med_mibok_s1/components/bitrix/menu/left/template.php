<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <div class="c-header c-header-margin c-header-mobile-hidden"><?=GetMessage('SECTION')?></div>
    <div>
        <div class="tab tab-margin tab-xl-hidden"><?=GetMessage('SECTION')?></div>
        <ul class="tab-section">
            <?foreach($arResult as $arItem):?>
            <li <?if($arItem["SELECTED"]):?> class="active"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
            <?endforeach?>
        </ul>
    </div>
<?endif?>