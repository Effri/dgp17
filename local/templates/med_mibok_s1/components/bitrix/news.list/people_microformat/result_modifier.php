<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach ($arResult["ITEMS"] as $key => $arItem)
{
    if($arItem["PREVIEW_PICTURE"])
        $arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>170, 'height'=>200), BX_RESIZE_IMAGE_EXACT);
    elseif($arItem["DETAIL_PICTURE"])
        $arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>170, 'height'=>200),BX_RESIZE_IMAGE_EXACT);
}
?>