<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	foreach ($arResult["ITEMS"] as $key => $arItem)
	{
		//$arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>978, 'height'=>432));
		$arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>1920, 'height'=>505));
  }
?>