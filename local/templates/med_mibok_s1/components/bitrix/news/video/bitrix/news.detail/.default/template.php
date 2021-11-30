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

<div class="l-news-articley">
    <div class="clearfix photogallery" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <time class="l-news-article-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></time>
        <div class="video-responsive">
            <?=$arResult['PROPERTIES']['YOUTUBE']['~VALUE']?>
        </div>
        
        <div class="l-news-article-text">
            <?if($arResult["DETAIL_TEXT"]):?>
                <?=$arResult["DETAIL_TEXT"];?>
            <?elseif(!$arResult["DETAIL_TEXT"] && $arResult["PREVIEW_TEXT"]):?>
                <?=$arResult["PREVIEW_TEXT"];?>
            <?endif;?>
        </div>

    </div>
</div>
