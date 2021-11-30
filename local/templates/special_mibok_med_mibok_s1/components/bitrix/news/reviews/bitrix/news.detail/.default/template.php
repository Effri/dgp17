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
use Bitrix\Main\Localization\Loc;
?>


<?if(!empty($arResult)):?>
    <div class="review-list">
		<div class="review-item">
            <div class="media">
                <div class="media-left" >
                    <span class="icon-user1"></span>
                </div>
                <div class="media-body">
                    <div class="media-heading"><?=$arResult['NAME']?></div>
                    <div class="media-rating">
                    <?for($i = 1; $i <= 5; $i++):?>
                        <span class="icon-star <?if($i <= $arResult['PROPERTIES']['RATING']['VALUE']):?> active <?endif;?>"></span>
                    <?endfor;?>
                    </div>
                    <div class="media-descr"><?=$arResult['DISPLAY_ACTIVE_FROM']?></div>
                    <?if(isset($arResult['PEOPLE'])):?>
                        <div><?=Loc::getMessage('ABOUT_REVIEW')?> <a href="<?=$arResult['PEOPLE']['DETAIL_PAGE_URL']?>" target="_blank"><?=$arResult['PEOPLE']['NAME']?></a></div>
                    <?endif;?>
                </div>
            </div>
            <?if(!empty($arResult['PROPERTIES']['HEAD']['VALUE'])):?>
                <b><?=$arResult['PROPERTIES']['HEAD']['VALUE']?></b><br>
            <?endif;?>
            <p><?=$arResult['PREVIEW_TEXT']?></p>
        </div>
    </div>
<?endif;?>
