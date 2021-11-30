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

<div class="c-header c-header-news"><?=GetMessage('TITLE_NEWS')?></div>
<aside class="s-news type2-news" id="news">
	<div class="clearfix s-news-block row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-4 s-news-cell s-news-wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<article class="s-news-article">
                    <header class="s-news-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=TruncateText($arItem["NAME"], $arParams['NAME_TRUNCATE_LEN']);?></a></header>
					<div class="s-news-text">
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
					<div class="clearfix s-news-info">
						<time class="s-news-date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></time>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="s-news-link"><?=GetMessage("DETAIL")?></a>
					</div>
				</article>
			</div>
		<?endforeach;?>
	</div>
</aside>




