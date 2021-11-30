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

<?//p($arResult["ITEMS"]);?>
<div class="slider-direction-wrapper">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="slider-direction">
				<div class="swiper-container" id="slider-direction">
					<div class="swiper-wrapper">
						<?foreach($arResult["ITEMS"] as $arItem):
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
							<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"]) || !empty($arItem['DISPLAY_PROPERTIES']['ICON']['VALUE'])):?>
								<div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
									<a href="<?=$arItem["PROPERTIES"]['LINK']['VALUE'] ? $arItem["PROPERTIES"]['LINK']['VALUE'] : $arItem["DETAIL_PAGE_URL"]?>" class="slider-direction-img-wrapper" title="<?=$arItem["NAME"]?>">
                                        <?if(!empty($arItem['DISPLAY_PROPERTIES']['ICON']['VALUE'])):?>
                                            <div class="slider-direction-img slider-color-sport"><span class="svg-<?=$arItem['DISPLAY_PROPERTIES']['ICON']['VALUE_XML_ID']?>"></span></div>
                                        <?elseif(!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
                                            <div class="slider-direction-img slider-color-sport" style="background-image: url('<?=$arItem["RESIZE"]["src"]?>"></div>
                                        <?endif;?>
									</a>
									<div class="slider-direction-title"><?=$arItem["NAME"]?></div>
									<?if(!empty($arItem["PREVIEW_TEXT"])):?>
										<div class="slider-direction-text"><?=$arItem["PREVIEW_TEXT"]?></div>
									<?endif?>
									<a href="<?=$arItem["PROPERTIES"]['LINK']['VALUE'] ? $arItem["PROPERTIES"]['LINK']['VALUE'] : $arItem["DETAIL_PAGE_URL"]?>" class="btn btn-blue slider-direction-link"><?=GetMessage("DETAIL")?></a>
								</div>
							<?endif?>
						<?  endforeach;?>
					</div>
				</div>
				<div class="slider-direction-btn slider-direction-prev"></div>
				<div class="slider-direction-btn slider-direction-next"></div>
			</div>
		</div>
	</div>
</div>
</div>









