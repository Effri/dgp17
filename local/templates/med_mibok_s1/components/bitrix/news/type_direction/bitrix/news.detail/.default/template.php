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

<?if(!empty($arResult['RESIZE'])):?>
	<img src="<?=$arResult['RESIZE']['src']?>" alt="<?=$arResult['NAME']?>"><br>
<?endif;?>
<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
	<?=$arResult["DETAIL_TEXT"];?>
<?else:?>
	<?=$arResult["PREVIEW_TEXT"];?>
<?endif?>

