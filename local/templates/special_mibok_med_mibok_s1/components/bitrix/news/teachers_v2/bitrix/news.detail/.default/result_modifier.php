<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSectionsNames = array();
if (!empty($arResult["IBLOCK_SECTION_ID"])) {
  $arSection = GetIBlockSection($arResult["IBLOCK_SECTION_ID"]);
  $arResult["SECTION_NAME"] = $arSection["NAME"];
}
else {
  $arResult["SECTION_NAME"] = "";
}

if($arResult["DETAIL_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>250, 'height'=>400));
if(!empty($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['VALUE']))
{
    foreach ($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['FILE_VALUE'] as $key => $arFile)
	{
        $arResult["RESIZE_CERTIFICATIONS"][$key] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>200, 'height'=>130));
        //$arResult["RESIZE_CERTIFICATIONS"][$key]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>820));
	}
}
?>
