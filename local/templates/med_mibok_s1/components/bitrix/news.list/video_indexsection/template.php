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

<?if(!empty($arResult["ITEMS"])):?>

    <div class="l-photogalery">
        <div class="c-title-block c-title-block-margin">
            <div class="c-title"><?=$arResult['NAME']?></div>
        </div>
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-lg-6 col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="video-responsive">
                <?=$arItem['PROPERTIES']['YOUTUBE']['~VALUE']?>
            </div>
            <div class="wrapper-info-video">
                <?if(!empty($arItem['DISPLAY_ACTIVE_FROM'])):?>
                    <div class="search-input resize-text">
                        <div class=""><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
                    </div>
                    <div class="search-submit">
                        <time class="l-news-article-time"><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
                    </div>
                <?else:?>
                    <div class="">
                        <div class="c-title"><?=$arItem['NAME']?></div>
                    </div>
                <?endif;?>
            </div>
        </div>
 
        <?endforeach;?>
        <div class="photogallery-btn-block">
                <a href="<?=$arResult["ITEMS"][0]['LIST_PAGE_URL']?>" class="btn btn-blue"><?=GetMessage("DETAIL")?></a>
            </div>
    </div>
       
<?endif;?>

