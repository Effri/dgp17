<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(isset($arResult['DISPLAY_PROPERTIES']['TEACHER']))
{
    foreach($arResult['DISPLAY_PROPERTIES']['TEACHER']['LINK_ELEMENT_VALUE'] as $arLink)
    {
        $iblockId = $arLink['IBLOCK_ID'];
        $nameDisp = $arLink['NAME'];
        break;
    }
    $dbProp = CIBlockElement::GetProperty($iblockId, $arResult['DISPLAY_PROPERTIES']['TEACHER']['VALUE'], array("sort" => "asc"), array());
    while ($arProp = $dbProp->GetNext())
    {
        if($arProp['CODE'] == 'SURNAME')
            $arResult['DISPLAY_PROPERTIES']['TEACHER']['SURNAME'] = $arProp['VALUE'];
        elseif($arProp['CODE'] == 'LASTNAME')
            $arResult['DISPLAY_PROPERTIES']['TEACHER']['LASTNAME'] = $arProp['VALUE'];
    }
    $dbRes = CIBlockElement::GetList(Array(), array('IBLOCK_ID' => $iblockId, 'ID' => $arResult['DISPLAY_PROPERTIES']['TEACHER']['VALUE']), false, false, array('DETAIL_PICTURE'));
    while($arRes = $dbRes->Fetch())
    {
        if(!empty($arRes['DETAIL_PICTURE']))
            $arResult['DISPLAY_PROPERTIES']['TEACHER']['PHOTO'] = CFile::ResizeImageGet($arRes['DETAIL_PICTURE'], array('width'=>250, 'height'=>250));
    }
    //p($arResult['DISPLAY_PROPERTIES']['TEACHER']);
    $nameTeach = $arResult['DISPLAY_PROPERTIES']['TEACHER']['SURNAME'].' '.$nameDisp.' '.$arResult['DISPLAY_PROPERTIES']['TEACHER']['LASTNAME'];
    $arResult['DISPLAY_PROPERTIES']['TEACHER']['DISPLAY_VALUE'] = str_replace($nameDisp, $nameTeach, $arResult['DISPLAY_PROPERTIES']['TEACHER']['DISPLAY_VALUE']);
    $arResult['DISPLAY_PROPERTIES']['TEACHER']['FULL'] = $nameTeach;
}
?>