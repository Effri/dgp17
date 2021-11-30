<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <h2><?=GetMessage('MENU_LIST_SECTION')?></h2>
    <ul class="bx-components-menu"  role="menubar" aria-label="<?=GetMessage('MENU_LEFT_TITLE')?>">
        <?foreach($arResult as $arItem):?>
            <li aria-label="<?=GetMessage("MENU_ITEM_LABEL")?> <?=$arItem["TEXT"]?>">
                <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
            </li>
        <?endforeach?>
    </ul>		

<?endif?>