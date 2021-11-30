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
<?$i = 1;
foreach ($arResult['SECTIONS'] as &$arSection):?>
	<?$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>

	<div id="<?=$this->GetEditAreaId($arSection['ID']);?>">
		<div class="l-document-header" itemprom="dopSsylka<?=$i?>"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></div>
	</div>
<? $i++;
endforeach; ?>

