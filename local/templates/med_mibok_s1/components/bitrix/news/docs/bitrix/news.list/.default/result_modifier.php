<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	foreach ($arResult["ITEMS"] as $key => $arItem)
	{
		if($arItem['DISPLAY_PROPERTIES']['TYPE_SHOW']['VALUE_XML_ID'] == 'slider' && !empty($arItem['DISPLAY_PROPERTIES']['FILE']['VALUE']))
		{
            if(isset($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][0]))
            {
			foreach ($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'] as $key2 => $arFile)
			{
				$arResult["ITEMS"][$key]["RESIZE"][$key2]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>130, 'height'=>100));
				$arResult["ITEMS"][$key]["RESIZE"][$key2]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>820));
			}
		}
            else
            {
                $arFile = $arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];
                $arResult["ITEMS"][$key]["RESIZE"][0]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>130, 'height'=>100));
                $arResult["ITEMS"][$key]["RESIZE"][0]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>820));
            }
		}
	}
?>