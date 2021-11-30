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
<?if(!empty($arResult["ITEMS"])):?>
<div class="people-micro">
    <div class="c-title-block c-title-block-margin">
		<div class="c-title"><?=$arResult['SECTION']['PATH'][0]['NAME']?></div>
	</div>
    <?foreach($arResult["ITEMS"] as $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="row" id="<?=$this->GetEditAreaId($arItem['ID']);?>" <?=($arItem['PROPERTIES']['TYPE_MICROFORMAT']['VALUE_XML_ID'] ? 'itemprop="'.$arItem['PROPERTIES']['TYPE_MICROFORMAT']['VALUE_XML_ID'].'"' : '')?>>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xxs-12">
                <?if(!empty($arItem['RESIZE'])):?>
                    <img src="<?=$arItem['RESIZE']['src']?>" alt="<?=$arItem['NAME']?>" class="img-responsive">
                <?endif;?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 col-xxs-12">
                <div class="">
                    <div class="l-teacher-name">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" itemprop="fio">
                            <?=$arItem['DISPLAY_PROPERTIES']['SURNAME']['VALUE']?> <?=$arItem['NAME']?> <?=$arItem['DISPLAY_PROPERTIES']['LASTNAME']['VALUE']?>
                        </a>
                    </div>
                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE'])):?>
                        <div class="l-teacher-activity" itemprop="post"><?=$arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE']?></div>
                    <?endif;?>
                    
                </div><br>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="telephone"><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['VALUE']?> </div>
                        <?if(!empty($arItem['DISPLAY_PROPERTIES']['PHONE_TIME']['VALUE'])):?>
                            <div class="l-teacher-note"><?=$arItem['DISPLAY_PROPERTIES']['PHONE_TIME']['VALUE']?></div>
                        <?endif;?>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="email"><?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['DEGREE']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['DEGREE']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="degree"><?=$arItem['DISPLAY_PROPERTIES']['DEGREE']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['LEVEL']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['LEVEL']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="teachingLevel"><?=$arItem['DISPLAY_PROPERTIES']['LEVEL']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['QUAL']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['QUAL']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="teachingQual"><?=$arItem['DISPLAY_PROPERTIES']['QUAL']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="academStat"><?=$arItem['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="employeeQualification"><?=$arItem['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="genExperience"><?=$arItem['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="specExperience"><?=$arItem['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['VALUE']?> </div>
                    </div>
                <?endif;?>
                <?if(!empty($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['VALUE'])):?>
                    <div class="l-teacher-row">
                        <div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['NAME']?></div>
                        <div class="l-teacher-right" itemprop="teachingDiscipline">
							<?if(is_array($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE'])):?>
								<?foreach($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE'] as $keySp => $arSport):?>
									<?=$arSport?><?if(isset($arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE'][$keySp + 1])){echo ", ";}?>
								<?endforeach;?>
							<?else:?>
								<?=$arItem['DISPLAY_PROPERTIES']['TYPE_SPORT']['DISPLAY_VALUE']?>
							<?endif;?>
                        </div>
                    </div>
                <?endif;?>
            </div>
            <div class="clearfix"></div>
            <?if(!empty($arItem['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['VALUE'])):?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxs-12">
					<div class="l-teacher-row">
						<div class="l-teacher-left"><?=$arItem['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['NAME']?></div>
						<div class="l-teacher-right" itemprop="profDevelopment"><?=$arItem['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['DISPLAY_VALUE']?> </div>
					</div>
				</div>
            <?endif;?>
        </div>
	<br>
    <?endforeach;?>
</div>
<?endif;?>

