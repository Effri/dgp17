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
    <div class="container1">
        <div class="row">
            <div class="col-lg-12">
                <div class="c-title-block c-title-block-margin">
                    <div class="c-title"><?=GetMessage("PHOTO")?></div>
                    <a href="<?=$arResult["ITEMS"][0]['DETAIL_PAGE_URL']?>" class="link-right"><?=GetMessage("DETAIL")?></a>
                </div>
            </div>


            <div class="col-lg-12">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                    <div class="clearfix photogallery" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <?if(!empty($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'])):?>
                            <?$count = 0;
                            foreach($arItem['RESIZE'] as $key => $arResize):
                                if($count > 7)
                                    break;
                                $count ++;
                                ?>
                                <div class="photogallery-image">
                                    <div class="photogallery-image-block" style="background-image: url('<?=$arResize['SMALL']['src']?>')"></div>
                                    <a rel="group1" href="<?=$arResize['BIG']['src']?>" class="fancybox photogallery-image-link">
                                        <div>
                                            <?/*<img src="<?=SITE_TEMPLATE_PATH?>/img/eye.png" alt="">*/?>
                                            <div class='visible-eye'></div>
                                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][$key]['DESCRIPTION'])):?>
                                                <span><?=$arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][$key]['DESCRIPTION']?></span>
                                            <?endif;?>
                                            <?if(!empty($arItem['DISPLAY_ACTIVE_FROM'])):?>
                                                <time><?=$arItem['DISPLAY_ACTIVE_FROM']?></time>
                                            <?endif;?>
                                        </div>
                                    </a>
                                </div>
                            <?endforeach;?>
                        <?endif;?>
                    </div>
                <?endforeach;?>
                <a href="<?=$arResult["ITEMS"][0]['DETAIL_PAGE_URL']?>" class="link-small"><?=GetMessage("DETAIL")?></a>
            </div>
                </div>
            </div>
<?endif;?>

