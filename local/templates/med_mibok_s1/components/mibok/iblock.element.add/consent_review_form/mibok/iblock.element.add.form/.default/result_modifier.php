<?
foreach($arResult['PROPERTY_LIST_FULL'] as &$arItem)
{
    if($arItem['PROPERTY_TYPE'] == 'E')
    {
        $dbRes = CIBlockElement::GetList(Array(), array('IBLOCK_ID' => $arItem['LINK_IBLOCK_ID'], 'ACTIVE' => 'Y'), false, false, array('ID','NAME', 'PROPERTY_SURNAME', 'PROPERTY_LASTNAME'));
        if($dbRes->SelectedRowsCount() > 0)
            $arItem['ENUM'][0] = GetMessage('NO_PEOPLE');
        while($arRes = $dbRes->GetNext())
        {
            $arItem['ENUM'][$arRes['ID']] = ($arRes['PROPERTY_SURNAME_VALUE'] ? $arRes['PROPERTY_SURNAME_VALUE'].' ' : '').$arRes['NAME'].($arRes['PROPERTY_LASTNAME_VALUE'] ? ' '.$arRes['PROPERTY_LASTNAME_VALUE'] : '');
        }
    }
}
?>