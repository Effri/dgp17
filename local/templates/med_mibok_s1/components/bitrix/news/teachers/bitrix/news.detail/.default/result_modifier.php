<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($arResult["DETAIL_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>230, 'height'=>350));
elseif($arResult["PREVIEW_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>230, 'height'=>350));
if(!empty($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['VALUE']))
{
    foreach ($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['FILE_VALUE'] as $key => $arFile)
	{
        $arResult["RESIZE_CERTIFICATIONS"][$key]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>200, 'height'=>130));
        $arResult["RESIZE_CERTIFICATIONS"][$key]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>820));
	}
}
?>