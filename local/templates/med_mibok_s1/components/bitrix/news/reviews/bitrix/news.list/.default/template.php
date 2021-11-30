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

<?if(!empty($arResult['ITEMS'])):?>
    <div class="review-list">
        <?foreach($arResult["ITEMS"] as $arItem): //p($arItem);
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
            <div class="review-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="media">
                    <div class="media-left" >
                        <span class="icon-user1"></span>
                    </div>
                    <div class="media-body">
                        <div class="media-heading"><?=$arItem['NAME']?></div>
                        <div class="media-rating">
                        <?for($i = 1; $i <= 5; $i++):?>
                            <span class="icon-star <?if($i <= $arItem['PROPERTIES']['RATING']['VALUE']):?> active <?endif;?>"></span>
                        <?endfor;?>
                        </div>
                        <div class="media-descr"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
                        <?if(isset($arItem['PEOPLE'])):?>
                            <div><?=Loc::getMessage('ABOUT_REVIEW')?> <a href="<?=$arItem['PEOPLE']['DETAIL_PAGE_URL']?>" target="_blank"><?=$arItem['PEOPLE']['NAME']?></a></div>
                        <?endif;?>
                    </div>
                </div>
                <?if(!empty($arItem['PROPERTIES']['HEAD']['VALUE'])):?>
                    <b><?=$arItem['PROPERTIES']['HEAD']['VALUE']?></b><br>
                <?endif;?>
                <p><?=$arItem['PREVIEW_TEXT']?></p>
            </div>
        <?endforeach;?>
    </div>
<?endif;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>