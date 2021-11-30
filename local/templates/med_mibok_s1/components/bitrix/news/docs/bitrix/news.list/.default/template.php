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
<?foreach($arResult["ITEMS"] as $arItem):
    $itemProp = '';
    if(!empty($arItem['PROPERTIES']['TYPE_MICRO']['VALUE_XML_ID']))
        $itemProp = 'itemprop="'.$arItem['PROPERTIES']['TYPE_MICRO']['VALUE_XML_ID'].'"';
    ?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="c-header lead"><?=$arItem["NAME"]?></div>

		<div class="l-document-text">
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<?=$arItem["PREVIEW_TEXT"];?>
			<?endif;?>
		</div>
		<?if($arItem['DISPLAY_PROPERTIES']['TYPE_SHOW']['VALUE_XML_ID'] == 'list' && !empty($arItem['DISPLAY_PROPERTIES']['FILE']['VALUE'])):?>
		<ul class="l-document-list">
            <?if(isset($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][0])):?>
			<?foreach($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'] as $arFile):?>
				<li <?=$itemProp?>>
					<a href="<?=$arFile['SRC']?>" target="_blank">
						<div class="l-document-name"><?=$arFile['DESCRIPTION']?></div>
						<div class="l-document-size"><?=GetMessage('FILE')?> <?=MibokMed::GetExtens($arFile['ORIGINAL_NAME'])?> (<?=MibokMed::FBytes($arFile['FILE_SIZE'])?> <?=GetMessage('KB')?>)</div>
					</a>
				</li>
			<?endforeach;?>
            <?else:
                $arFile = $arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];
?>
                <li <?=$itemProp?>>
					<a href="<?=$arFile['SRC']?>" target="_blank">
						<div class="l-document-name"><?=$arFile['DESCRIPTION']?></div>
						<div class="l-document-size"><?=GetMessage('FILE')?> <?=MibokMed::GetExtens($arFile['ORIGINAL_NAME'])?> (<?=MibokMed::FBytes($arFile['FILE_SIZE'])?> <?=GetMessage('KB')?>)</div>
					</a>
				</li>
            <?endif;?>
		</ul>
		<?elseif($arItem['DISPLAY_PROPERTIES']['TYPE_SHOW']['VALUE_XML_ID'] == 'slider' && !empty($arItem['DISPLAY_PROPERTIES']['FILE']['VALUE'])):?>
			<div class="l-document-slider">
				<div class="swiper-container" id="document-slider">
					<div class="swiper-wrapper">
						<?foreach($arItem['RESIZE'] as $arResize):?>
							<div class="swiper-slide" <?=$itemProp?>>
								<a class="fancybox" rel="group" href="<?=$arResize['BIG']['src']?>"><img src="<?=$arResize['SMALL']['src']?>" alt=""></a>
							</div>
						<?endforeach?>
					</div>
				</div>
				<div class="l-document-slider-btn l-document-slider-prev"></div>
				<div class="l-document-slider-btn l-document-slider-next"></div>
			</div>
		<?endif;?>
	</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>