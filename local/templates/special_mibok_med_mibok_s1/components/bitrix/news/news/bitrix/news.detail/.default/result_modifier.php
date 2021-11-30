<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSectionsNames = array();
if (!empty($arResult["IBLOCK_SECTION_ID"])) {
  $arSection = GetIBlockSection($arResult["IBLOCK_SECTION_ID"]);
  $arResult["SECTION_NAME"] = $arSection["NAME"];
}
else {
  $arResult["SECTION_NAME"] = "";
}

unset($arPhoto);
  if(!empty($arResult["DETAIL_PICTURE"])){
	  $arPhoto = $arResult["DETAIL_PICTURE"];
  } elseif(!empty($arResult["PREVIEW_PICTURE"])) {
	  $arPhoto = $arResult["PREVIEW_PICTURE"];
  }
  if(!empty($arPhoto)){
    $file = CFile::ResizeImageGet($arPhoto, array('width'=>250, 'height'=>400));
	$arResult["RESIZE"]['SRC'] = $file['src'];
	$arResult["RESIZE"]['WIDTH'] = $file['width'];
	$arResult["RESIZE"]['HEIGHT'] = $file['height'];
  }
