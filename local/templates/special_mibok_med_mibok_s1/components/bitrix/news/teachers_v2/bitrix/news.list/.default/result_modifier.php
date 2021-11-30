<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as $i => $arItem) {
  if (!empty($arItem["IBLOCK_SECTION_ID"])) {
    $arSection = GetIBlockSection($arItem["IBLOCK_SECTION_ID"]);
    $arResult["ITEMS"][$i]["SECTION_NAME"] = $arSection["NAME"];
  }
  else {
    $arResult["ITEMS"][$i]["SECTION_NAME"] = "";
  }
  unset($arPhoto);
  if(!empty($arItem["PREVIEW_PICTURE"])){
	  $arPhoto = $arItem["PREVIEW_PICTURE"];
  } elseif(!empty($arItem["DETAIL_PICTURE"])) {
	  $arPhoto = $arItem["DETAIL_PICTURE"];
}
  if(!empty($arPhoto)){
    $file = CFile::ResizeImageGet($arPhoto, array('width'=>250, 'height'=>400));
	$arResult["ITEMS"][$i]["RESIZE"]['SRC'] = $file['src'];
	$arResult["ITEMS"][$i]["RESIZE"]['WIDTH'] = $file['width'];
	$arResult["ITEMS"][$i]["RESIZE"]['HEIGHT'] = $file['height'];
  }
  
}
