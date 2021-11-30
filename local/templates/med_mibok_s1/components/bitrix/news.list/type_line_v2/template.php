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
<div class="c-header c-header-news"><?=GetMessage('TITLE')?></div>
<div class="slider-direction-wrapper wrapper-vertical">
    <aside class="s-news" id="type_line_inner">	
        <div class="s-links-wrapper s-line-wrapper s-line-inner-wrapper">
            <?foreach($arResult["ITEMS"] as $arItem):
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
                <?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"]) || !empty($arItem['DISPLAY_PROPERTIES']['ICON']['VALUE'])):?>
                    <div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="slider-direction-img-wrapper" title="<?=$arItem["NAME"]?>">
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['ICON']['VALUE'])):?>
                                <div class="slider-direction-img slider-color-sport"><span class="svg-<?=$arItem['DISPLAY_PROPERTIES']['ICON']['VALUE_XML_ID']?>"></span></div>
                            <?elseif(!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
                                <div class="slider-direction-img slider-color-sport" style="background-image: url('<?=$arItem["RESIZE"]["src"]?>"></div>
                            <?endif;?>
                        </a>
                        <div class="slider-direction-title"><?=$arItem["NAME"]?></div>
                    </div>
                <?endif?>
            <?endforeach;?>	
        </div>
    </aside>
</div>






