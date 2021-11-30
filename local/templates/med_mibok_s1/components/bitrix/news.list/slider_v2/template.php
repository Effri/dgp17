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

<?//p($arResult['ITEMS']);?>
<div class="wrapper-slider slider-full style-slider-22">
    <div class="slider-main">
        <div class="swiper-container" id="slider-main">
            <div class="swiper-wrapper">
                <?foreach($arResult['ITEMS'] as $arItem):?>
                <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    if(!empty($arItem['RESIZE'])):?>
                        <div class="swiper-slide" style="background-image: url('<?=$arItem['RESIZE']['src']?>')" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <?/*if(!empty($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'])):?>
                                <a href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" target="_blank">
                            <?endif*/?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 slider-new">
                                        <?if(!empty($arItem['NAME']) || !empty($arItem['PREVIEW_TEXT'])):?>
                                            <div class="main-wrapper">
                                                <div class="slider-wrapper-text">
                                                    <div class="wrapper-child-text">
                                                        <?if(!empty($arItem['NAME'])):?>
                                                            <div class="slider-main-title-min"><?=$arItem['NAME']?></div>
                                                        <?endif;?>
                                                        <?if(!empty($arItem['DISPLAY_PROPERTIES']['BIG_NAME']['VALUE'])):?>
                                                            <div class="slider-main-title"><?=$arItem['DISPLAY_PROPERTIES']['BIG_NAME']['VALUE']?></div>
                                                        <?endif;?>
                                                        <?if(!empty($arItem['PREVIEW_TEXT'])):?>  
                                                            <div class="slider-main-text"><?=$arItem['PREVIEW_TEXT']?></div>
                                                        <?endif;?>
                                                    </div>
                                                     <div class="wrapper-slider-btn">
                                                        <?if(!empty($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE'])):?>
                                                            <a class="btn btn-blue" href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" target="_blank"><?=GetMessage("DETAIL")?></a>
                                                        <?endif?>

                                                </div>
                                                    </div>

                                            </div>
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?endif;?>
                <?endforeach;?>
            </div>

            <div class="wrapper-btn-prev-next-mobile container">
                <div class="slider-main-btn slider-main-prev"></div>
                <div class="slider-main-btn slider-main-next"></div>
            </div>
            <div class="slider-main-pagination"></div>
   
        </div>
    </div>
</div>
