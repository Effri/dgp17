<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if($arResult["DETAIL_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>230, 'height'=>350));
elseif($arResult["PREVIEW_PICTURE"])
    $arResult["RESIZE"] =  CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>230, 'height'=>350));
else 
{
    $oldFile = $_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/image.jpg';
    $newFile = $_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/image_350.jpg';

    if(!file_exists($newFile) && file_exists($oldFile))
        CFile::ResizeImageFile($oldFile, $newFile,  array('width'=>230, 'height'=>350));
    if(file_exists($newFile))
        $arResult["RESIZE"]['src'] = $this->GetFolder().'/image_350.jpg';
}

if(!empty($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['VALUE']))
{
    if(isset($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['FILE_VALUE'][0]))
    {
    foreach ($arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['FILE_VALUE'] as $key => $arFile)
	{
        $arResult["RESIZE_CERTIFICATIONS"][$key]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>200, 'height'=>130));
        $arResult["RESIZE_CERTIFICATIONS"][$key]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>820));
	}
}
    else
    {
        $arFile = $arResult['DISPLAY_PROPERTIES']['CERTIFICATIONS']['FILE_VALUE'];
        $arResult["RESIZE_CERTIFICATIONS"][0]['SMALL'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>200, 'height'=>130));
        $arResult["RESIZE_CERTIFICATIONS"][0]['BIG'] =  CFile::ResizeImageGet($arFile['ID'], array('width'=>750, 'height'=>820));
    }
}
?>