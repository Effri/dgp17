<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(isset($arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'][0]))
{
    foreach ($arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'] as $key2 => $arFile)
    {
        $arResult["RESIZE"][$key2]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>300, 'height'=>300));
    $arResult["RESIZE"][$key2]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>750));
}
}
else
{
    $arFile = $arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE'];
    $arResult["RESIZE"][0]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>300, 'height'=>300));
    $arResult["RESIZE"][0]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>750));
}
        ?>