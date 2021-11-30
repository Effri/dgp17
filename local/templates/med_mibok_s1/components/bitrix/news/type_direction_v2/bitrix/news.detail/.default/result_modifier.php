<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($arResult["DETAIL_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>725, 'height'=>250));
?>