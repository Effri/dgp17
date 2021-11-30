<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	foreach ($arResult["ITEMS"] as $key => $arItem)
	{
		$arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>217, 'height'=>250));
  }
?>