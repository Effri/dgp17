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

<section class="l-news">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <article class="clearfix l-news-article" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="l-news-article-img">
                <?if($arItem["RESIZE"]):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["RESIZE"]["src"]?>" alt=""></a>
                <?endif;?>
            </div>
            <div class="l-news-article-block">
                <h3 class="l-news-article-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
                <time class="l-news-article-time"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></time>
                <div class="l-news-article-text">
                    <?if($arItem["PREVIEW_TEXT"])
                    {
                        $text = trim(strip_tags($arItem["~PREVIEW_TEXT"]));
                    }
                    elseif(!$arItem["PREVIEW_TEXT"] && $arItem["DETAIL_TEXT"])
                    {
                        $text = trim(strip_tags($arItem["DETAIL_TEXT"]));
                    }
                    if(isset($arParams['PREVIEW_TRUNCATE_LEN']) && !empty($arParams['PREVIEW_TRUNCATE_LEN']))
                        $text = TruncateText($text, $arParams['PREVIEW_TRUNCATE_LEN']);
?>
                    <?=$text?>
                </div>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-blue"><?=GetMessage("DETAIL")?></a>
            </div>
        </article>
    <?endforeach;?>
</section>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>