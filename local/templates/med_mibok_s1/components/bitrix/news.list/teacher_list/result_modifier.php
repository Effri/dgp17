<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$i = 0;
foreach ($arResult["ITEMS"] as $key => $arItem)
{
    if($arItem["PREVIEW_PICTURE"])
        $arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>150, 'height'=>150));
    elseif($arItem["DETAIL_PICTURE"])
         $arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>150, 'height'=>150));
    else
    {
        $oldFile = $_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/image.jpg';
        $newFile = $_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/image_150.jpg';
    
        if(!file_exists($newFile) && file_exists($oldFile))
            CFile::ResizeImageFile($oldFile, $newFile,  array('width'=>150, 'height'=>150));
        if(file_exists($newFile))
            $arResult["ITEMS"][$key]["RESIZE"]['src'] = $this->GetFolder().'/image_150.jpg';
        }
    }
?>