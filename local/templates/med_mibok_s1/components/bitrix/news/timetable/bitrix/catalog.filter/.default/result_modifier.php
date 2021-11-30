<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    //получаем значени€ д€л свойст, которые имеют тип прив€зка к элементу. «начен€и собираем путем группировки
	foreach ($arResult["arrProp"] as $key => $arItem)
	{
        //p($arItem);
        if($arItem['PROPERTY_TYPE'] == 'E')
        {
            /*$res = CIBlockProperty::GetByID($key);
            if($ar_res = $res->GetNext())
              p($ar_res);*/
            
            $arFilter = Array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y');
            $arSelect = array();
            if($arItem['CODE'] != 'TEACHER')
                $arGroup = array('PROPERTY_'.$arItem['CODE'], 'PROPERTY_'.$arItem['CODE'].'.NAME');
            else
                $arGroup = array('PROPERTY_'.$arItem['CODE'], 'PROPERTY_'.$arItem['CODE'].'.NAME', 'PROPERTY_'.$arItem['CODE'].'.PROPERTY_LASTNAME', 'PROPERTY_'.$arItem['CODE'].'.PROPERTY_SURNAME');
            $res = CIBlockElement::GetList(Array('PROPERTY_'.$arItem['CODE'] => 'asc'), $arFilter, $arGroup, false, $arSelect);
            while($arElement = $res->Fetch())
            {
                if($arItem['CODE'] != 'TEACHER')
                    $arResult["arrProp"][$key]['VALUE_LIST'][$arElement['PROPERTY_'.$arItem['CODE'].'_VALUE']] = $arElement['PROPERTY_'.$arItem['CODE'].'_NAME'];
                else
                {
                    $arResult["arrProp"][$key]['VALUE_LIST'][$arElement['PROPERTY_'.$arItem['CODE'].'_VALUE']] = 
                        $arElement['PROPERTY_'.$arItem['CODE'].'_PROPERTY_SURNAME_VALUE'] .' '
                        . mb_substr($arElement['PROPERTY_'.$arItem['CODE'].'_NAME'],0,1) . '.';
                    if(!empty($arElement['PROPERTY_'.$arItem['CODE'].'_PROPERTY_LASTNAME_VALUE']))
                        $arResult["arrProp"][$key]['VALUE_LIST'][$arElement['PROPERTY_'.$arItem['CODE'].'_VALUE']] .= ' ' . mb_substr($arElement['PROPERTY_'.$arItem['CODE'].'_PROPERTY_LASTNAME_VALUE'],0,1) . '.';
                }   

            }
        }
	}
    
    //модифицируем результирующий массив, с учетом данных полученных выше
    global $DEFAULT_TYPE_SPORT;
    foreach ($arResult["ITEMS"] as $key => $arItem)
    {
        $i = 0;
        if($arItem['TYPE'] == 'INPUT')
        {
            $arResult["ITEMS"][$key]['TYPE'] = 'SELECT';
            $arResult["ITEMS"][$key]['LIST'] = $arResult["arrProp"][str_replace('PROPERTY_', '', $key)]['VALUE_LIST'];
            if($arResult["arrProp"][str_replace('PROPERTY_', '', $key)]['CODE'] == 'TYPE_SPORT')
            {
                if($i == 0)
                    $DEFAULT_TYPE_SPORT = key($arResult["ITEMS"][$key]['LIST']);
                $arResult["ITEMS"][$key]['DEFAULT'] = true;
            }
            else
                $arResult["ITEMS"][$key]['DEFAULT'] = false;
        }
        $i++;
    }
    
   
?>