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


<div class="l-instructor-header-block">
    <h2 class="l-instructor-header"><?=$arResult['SECTION']['PATH'][0]['NAME']?></h2>
</div>

<div class="row">
    <?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="l-instructor-img" style="background-image: url('<?=$arItem['RESIZE']['src']?>')">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="l-instructor-img-link">
                     <?/*<img src="<?=SITE_TEMPLATE_PATH?>/img/eye.png" alt="">*/?>
                    <div class='visible-eye'></div>
                </a>
            </div>
            <div class="l-instructor-name"><?=$arItem['DISPLAY_PROPERTIES']['SURNAME']['VALUE']?> <?=mb_substr($arItem['NAME'],0,1, SITE_CHARSET)?>. <?if(!empty($arItem['DISPLAY_PROPERTIES']['LASTNAME']['VALUE'])):?><?=mb_substr($arItem['DISPLAY_PROPERTIES']['LASTNAME']['VALUE'],0,1, SITE_CHARSET)?>.<?endif;?></div>
            <div class="l-instructor-activity"><?=$arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE']?></div>
            <div class="l-instructor-about"><?=$arItem['PREVIEW_TEXT']?></div>
            <div class="l-instructor-btn">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-blue"><?=GetMessage("DETAIL")?></a>
            </div>
        </div>
    <?endforeach;?>
</div>

<div class="l-instructor-text">
    <?=$arResult['SECTION']['PATH'][0]['DESCRIPTION']?>
</div>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>