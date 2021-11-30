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
<div class="bs-docs-section">
    <h3 class="page-header" tabindex="0"><?=$arResult['SECTION']['PATH'][0]['NAME']?></h3>                                
    <div class="element-list">
		<?foreach($arResult["ITEMS"] as $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
			<div class="element-content" tabindex="0">
				<h4 class="element-title">
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>" itemprop="fio">
                        <?=$arItem['DISPLAY_PROPERTIES']['SURNAME']['VALUE']?> <?=$arItem['NAME']?> <?=$arItem['DISPLAY_PROPERTIES']['LASTNAME']['VALUE']?>
                    </a>
				</h4>        
				<?if(!empty($arItem['RESIZE'])):?>
					<img src="<?=$arItem['RESIZE']['src']?>" alt="<?=$arItem['NAME']?>" class="img-responsive">
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['POSITION']['NAME']?>: <span itemprop="Post"><?=$arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['NAME']?>: <span itemprop="Telephone"><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['NAME']?>: <span itemprop="e-mail"><?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['DEGREE']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['DEGREE']['NAME']?>: <span itemprop="Degree"><?=$arItem['DISPLAY_PROPERTIES']['DEGREE']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['NAME']?>: <span itemprop="AcademStat"><?=$arItem['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['NAME']?>: <span itemprop="EmployeeQualification"><?=$arItem['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['NAME']?>: <span itemprop="GenExperience"><?=$arItem['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['NAME']?>: <span itemprop="SpecExperience"><?=$arItem['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['VALUE']?></span></div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['NAME']?>: 
						<span itemprop="TeachingDiscipline">
							<?if(is_array($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE'])):?>
								<?foreach($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE'] as $keySp => $arSport):?>
									<?=$arSport?><?if(isset($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE'][$keySp + 1])){echo ", ";}?>
								<?endforeach;?>
							<?else:?>
								<?=$arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE']?>
							<?endif;?>
						</span>
					</div>
				<?endif;?>
				<?if(!empty($arItem['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['VALUE'])):?>
					<div><?=$arItem['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['NAME']?>: <span itemprop="ProfDevelopment"><?=$arItem['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['VALUE']?></span></div>
				<?endif;?>	
			</div>
		<?endforeach?>
	</div>
</div>


