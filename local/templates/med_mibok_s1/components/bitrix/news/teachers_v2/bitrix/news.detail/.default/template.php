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

<?//p($arResult);?>
<div class="l-teacher">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xxs-12">
            <?if(!empty($arResult['RESIZE'])):?>
                <img src="<?=$arResult['RESIZE']['src']?>" alt="<?=$arResult['NAME']?>">
            <?endif;?>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-xxs-12">
            <div class="l-teacher-name-block">
                <div class="l-teacher-social">
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['FB']['VALUE'])):?>
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['FB']['VALUE']?>" target="_blank" title="Facebook"><img src="<?=SITE_TEMPLATE_PATH?>/img/fb_user.png" alt=""></a>
                    <?endif;?>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['VK']['VALUE'])):?>
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['VK']['VALUE']?>" target="_blank" title="VK"><img src="<?=SITE_TEMPLATE_PATH?>/img/vk_user.png" alt=""></a>
                    <?endif;?>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['OK']['VALUE'])):?>
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['OK']['VALUE']?>" target="_blank" title="OK"><img src="<?=SITE_TEMPLATE_PATH?>/img/ok_user.png" alt=""></a>
                    <?endif;?>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['TW']['VALUE'])):?>
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['TW']['VALUE']?>" target="_blank" title="Twitter"><img src="<?=SITE_TEMPLATE_PATH?>/img/twitter_user.png" alt=""></a>
                    <?endif;?>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['YT']['VALUE'])):?>
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['YT']['VALUE']?>" target="_blank" title="Youtube"><img src="<?=SITE_TEMPLATE_PATH?>/img/youtube_user.png" alt=""></a>
                    <?endif;?>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['IM']['VALUE'])):?>
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['IM']['VALUE']?>" target="_blank" title="Instagram"><img src="<?=SITE_TEMPLATE_PATH?>/img/insta_user.png" alt=""></a>
                    <?endif;?>
                </div>
                <div class="l-teacher-name"><?=$arResult['DISPLAY_PROPERTIES']['SURNAME']['VALUE']?> <?=$arResult['NAME']?> <?=$arResult['DISPLAY_PROPERTIES']['LASTNAME']['VALUE']?></div>
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['POSITION']['VALUE'])):?>
                    <div class="l-teacher-activity"><?=$arResult['DISPLAY_PROPERTIES']['POSITION']['VALUE']?></div>
                <?endif;?>
            </div>

            <?if(!empty($arResult['DISPLAY_PROPERTIES']['BIRTHDAY']['VALUE']) || !empty($arResult['DISPLAY_PROPERTIES']['CITY']['VALUE'])):?>
                <div class="l-teacher-personal">
                    <div class="l-teacher-header"><?=GetMessage("PERSONAL")?></div>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['BIRTHDAY']['VALUE'])):?>
                        <div class="l-teacher-row">
                            <div class="l-teacher-left"><?=GetMessage("BIRTH")?></div>
                            <div class="l-teacher-right"><?=$arResult['DISPLAY_PROPERTIES']['BIRTHDAY']['VALUE']?></div>
                        </div>
                    <?endif;?>
                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['CITY']['VALUE'])):?>
                        <div class="l-teacher-row">
                            <div class="l-teacher-left"><?=GetMessage("CITY")?></div>
                            <div class="l-teacher-right"><?=$arResult['DISPLAY_PROPERTIES']['CITY']['VALUE']?></div>
                        </div>
                    <?endif;?>
                </div>
            <?endif;?>
            
            
            <div class="l-teacher-contact">
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['PHONE']['VALUE']) || !empty($arResult['DISPLAY_PROPERTIES']['CITY']['VALUE'])):?>
                    <div class="l-teacher-header"><?=GetMessage("CONTACT")?></div>

                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['PHONE']['VALUE'])):?>
                        <div class="l-teacher-row">
                            <div class="l-teacher-left"><?=GetMessage("PHONE")?></div>
                            <div class="l-teacher-right"><?=$arResult['DISPLAY_PROPERTIES']['PHONE']['VALUE']?> </div>
                            <?if(!empty($arResult['DISPLAY_PROPERTIES']['PHONE_TIME']['VALUE'])):?>
                                <div class="l-teacher-note"><?=$arResult['DISPLAY_PROPERTIES']['PHONE_TIME']['VALUE']?></div>
                            <?endif;?>
                        </div>
                    <?endif;?>

                    <?if(!empty($arResult['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])):?>
                        <div class="l-teacher-row">
                            <div class="l-teacher-left"><?=GetMessage("EMAIL")?></div>
                            <div class="l-teacher-right"><a href="mailto:<?=$arResult['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?>"><?=$arResult['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?></a>
                            </div>
                        </div>
                    <?endif;?>
                <?endif;?>
                    
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['TYPE_SPORT']['VALUE'])):?>
                    <div class="l-teacher-header l-teacher-header-margin"><?=GetMessage("TYPE_SPORT")?></div>
                    <div class="l-teacher-tag">
                        <?foreach($arResult['DISPLAY_PROPERTIES']['TYPE_SPORT']['LINK_ELEMENT_VALUE'] as $arSport):?>
                            <a href="<?=$arSport['DETAIL_PAGE_URL']?>" class="tag"><?=$arSport['NAME']?></a>
                        <?endforeach;?>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
    
    <div class="l-teacher-header l-teacher-header-margin"><?=GetMessage("PUBLIC")?></div>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['DEGREE']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['DEGREE']['NAME']?></div>
            <div class="l-teacher-right" itemprop="degree"><?=$arResult['DISPLAY_PROPERTIES']['DEGREE']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['LEVEL']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['LEVEL']['NAME']?></div>
            <div class="l-teacher-right" itemprop="teachingLevel"><?=$arResult['DISPLAY_PROPERTIES']['LEVEL']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['QUAL']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['QUAL']['NAME']?></div>
            <div class="l-teacher-right" itemprop="teachingQual"><?=$arResult['DISPLAY_PROPERTIES']['QUAL']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['NAME']?></div>
            <div class="l-teacher-right" itemprop="academStat"><?=$arResult['DISPLAY_PROPERTIES']['ACADEMIC_RANK']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['NAME']?></div>
            <div class="l-teacher-right" itemprop="employeeQualification"><?=$arResult['DISPLAY_PROPERTIES']['EMPLOYE_QUALIFIC']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['NAME']?></div>
            <div class="l-teacher-right" itemprop="genExperience"><?=$arResult['DISPLAY_PROPERTIES']['GEN_EXPERIENCE']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['NAME']?></div>
            <div class="l-teacher-right" itemprop="specExperience"><?=$arResult['DISPLAY_PROPERTIES']['SPEC_EXPERIENCE']['VALUE']?> </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT'])):?>
        <div class="l-teacher-info">
           <?if(!empty($arResult['DETAIL_TEXT'])):?>
                <?=$arResult['DETAIL_TEXT']?>
           <?else:?>
                <?=$arResult['PREVIEW_TEXT']?>
           <?endif;?>
        </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['VALUE'])):?>
        <div class="l-teacher-row">
            <div class="l-teacher-left"><?=$arResult['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['NAME']?></div>
            <div class="l-teacher-right" itemprop="profDevelopment"><?=$arResult['DISPLAY_PROPERTIES']['PROF_DEVELOPMENT']['DISPLAY_VALUE']?> </div>
        </div>
    <?endif;?>
    
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['VALUE'])):?>
        <div class="l-teacher-header"><?=GetMessage("SERTIF")?></div>
        <div class="l-teacher-slider">
            <div class="swiper-container" id="teacher-slider">
                <div class="swiper-wrapper">
                    <?foreach($arResult["RESIZE_CERTIFICATIONS"] as $arCert):?>
                        <div class="swiper-slide">
                            <a class="fancybox" rel="group" href="<?=$arCert['BIG']['src']?>"><img src="<?=$arCert['SMALL']['src']?>" alt=""></a>
                        </div>
                   <?  endforeach;?>
                </div>
            </div>
            <div class="l-teacher-slider-btn l-teacher-slider-prev"></div>
            <div class="l-teacher-slider-btn l-teacher-slider-next"></div>
        </div>
    <?endif;?>
        
    







