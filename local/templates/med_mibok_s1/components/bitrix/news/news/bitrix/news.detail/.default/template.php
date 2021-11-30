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
<section class="l-news">
    <article class="clearfix l-news-article">
            <img src="<?=$arResult["RESIZE"]["src"]?>" alt="<?=$arResult["NAME"]?>"> <br>
            <h2 class="l-news-article-title"><?=$arResult["NAME"]?></h2>
            <time class="l-news-article-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></time>
            <div class="l-news-article-text">
                <?if($arResult["DETAIL_TEXT"]):?>
                    <?=$arResult["DETAIL_TEXT"];?>
                <?elseif(!$arResult["DETAIL_TEXT"] && $arResult["PREVIEW_TEXT"]):?>
                    <?=$arResult["PREVIEW_TEXT"];?>
                <?endif;?>
            </div>
    </article>
</section>
