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

<div class="l-photogalery">
    <?if($arParams['DISPLAY_NAME'] == 'Y'):?>
        <div class="c-title-block c-title-block-margin">
            <div class="c-title"><?=$arResult['NAME']?></div>
        </div>
    <?endif;?>
    <div class="clearfix photogallery" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?if(!empty($arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'])):?>
            <?foreach($arResult['RESIZE'] as $key => $arResize):?>
                <div class="photogallery-image">
                    <div class="photogallery-image-block" style="background-image: url('<?=$arResize['SMALL']['src']?>')"></div>
                    <a rel="group1" href="<?=$arResize['BIG']['src']?>" class="fancybox photogallery-image-link">
                        <div>
                            <?/*<img src="<?=SITE_TEMPLATE_PATH?>/img/eye.png" alt="">*/?>
                            <div class='visible-eye'></div>
                            <?if(!empty($arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][$key]['DESCRIPTION'])):?>
                                <span><?=$arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][$key]['DESCRIPTION']?></span>
                            <?endif;?>
                            <?if(!empty($arResult['DISPLAY_ACTIVE_FROM'])):?>
                                <time><?=$arResult['DISPLAY_ACTIVE_FROM']?></time>
                            <?endif;?>
                        </div>
                    </a>
                </div>
            <?endforeach;?>
        <?endif;?>
    </div>
</div>
