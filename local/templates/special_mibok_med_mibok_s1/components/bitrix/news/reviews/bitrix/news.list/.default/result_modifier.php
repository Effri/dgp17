<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if(!empty($arResult['ITEMS']))
{
    foreach($arResult["ITEMS"] as &$arItem)
    {
        if(!empty($arItem['PROPERTIES']['PEOPLE']['VALUE']))
        {
            $iblockId = $arItem['PROPERTIES']['PEOPLE']['LINK_IBLOCK_ID'];
            $elemId = $arItem['PROPERTIES']['PEOPLE']['VALUE'];
            $dbRes = CIBlockElement::GetList(Array(), array('IBLOCK_ID' => $iblockId,'ID' => $elemId), false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_SURNAME', 'PROPERTY_LASTNAME', 'DETAIL_PAGE_URL'));
            if($arRes = $dbRes->GetNext())
            {
                $arItem['PEOPLE']['DETAIL_PAGE_URL'] = $arRes['DETAIL_PAGE_URL'];
                $arItem['PEOPLE']['NAME'] = ($arRes['PROPERTY_SURNAME_VALUE'] ? $arRes['PROPERTY_SURNAME_VALUE'].' ' : '').$arRes['NAME'].($arRes['PROPERTY_LASTNAME_VALUE'] ? ' '.$arRes['PROPERTY_LASTNAME_VALUE'] : '');
            }
        }
    }
}
?>