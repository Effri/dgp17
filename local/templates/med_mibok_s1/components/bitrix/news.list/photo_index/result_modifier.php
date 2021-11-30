<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	foreach ($arResult["ITEMS"] as $key => $arItem)
	{
        $count = 0;
        
        if(isset($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][0]))
        {
        foreach ($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'] as $key2 => $arFile)
        {
            if($count > 7)
                break;
            $count ++;
            $arResult["ITEMS"][$key]["RESIZE"][$key2]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>300, 'height'=>300));
            $arResult["ITEMS"][$key]["RESIZE"][$key2]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>750));
        }
	}
        else
        {
            $arFile = $arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];
            $arResult["ITEMS"][$key]["RESIZE"][0]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>300, 'height'=>300));
            $arResult["ITEMS"][$key]["RESIZE"][0]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>750));
        }
	}
?>