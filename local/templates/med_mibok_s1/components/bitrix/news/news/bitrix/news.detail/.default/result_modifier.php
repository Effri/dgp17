<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($arResult["PREVIEW_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>500, 'height'=>250));
elseif($arResult["DETAIL_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>500, 'height'=>250));
?>