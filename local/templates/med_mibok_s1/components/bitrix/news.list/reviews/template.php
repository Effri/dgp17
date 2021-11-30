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
    <div class="l-teacher-header"><?=Loc::getMessage('ABOUT_REVIEW')?></div>
    <div class="review-list">
        <?foreach($arResult["ITEMS"] as $arItem): //p($arItem);
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
            <div class="review-item about-people" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
                    </div>
                </div>
                <?if(!empty($arItem['PROPERTIES']['HEAD']['VALUE'])):?>
                    <span class='head-review'><?=$arItem['PROPERTIES']['HEAD']['VALUE']?></span><br>
                <?endif;?>
                <p><?=$arItem['PREVIEW_TEXT']?></p>
            </div>
        <?endforeach;?>
    </div>

    <?
    $link = str_replace('#SITE_DIR#', SITE_DIR, $arResult['LIST_PAGE_URL']);
    ?>
    <div class="timing-link">
        <a href="<?=$link?>" class="btn btn-blue"><?=GetMessage("ALL_REVIEWS")?></a>
    </div>
<?endif;?>