<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$i = 0;
foreach ($arResult["ITEMS"] as $key => $arItem)
{
    if($arItem["PREVIEW_PICTURE"])
        $arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>150, 'height'=>150));
    elseif($arItem["DETAIL_PICTURE"])
         $arResult["ITEMS"][$key]["RESIZE"] =  CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>150, 'height'=>150));
    
    /*if ($i == 0)
    {
        $dbSec = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'ID' => $arItem['IBLOCK_SECTION_ID']), false, array('ID', 'NAME'));
        if($arSec = $dbSec->Fetch())
        {
            $arResult['SECTION_NAME_RES'] = $arSec['NAME'];
        }
    }
        $i++;*/
}
?>