<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//p($arResult);?>
<?if (!empty($arResult)):?>
    <menu class="clearfix l-menu-block" id="menu">
        <li class="li-search">
            <div class="header-search-block">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:search.form",
                    "header",
                    Array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "PAGE" => "#SITE_DIR#search/index.php",
                        "USE_SUGGEST" => "N"
                    )
                );?>
                <div class="clearfix"></div>
            </div>
        </li>
        <?foreach($arResult as $arItem):?>
            <?if($arItem['DEPTH_LEVEL'] == 1):?>
                <li <?if($arItem["SELECTED"]):?> class="active" <?endif;?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
            <?endif;?>
        <?endforeach?>
    </menu>
    <button class="l-menu-btn navbar-toggle toogle-menu collapsed" id="menu-btn">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
<? endif; ?>
