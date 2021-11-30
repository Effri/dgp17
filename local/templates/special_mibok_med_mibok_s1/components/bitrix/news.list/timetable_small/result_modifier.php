<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach ($arResult["ITEMS"] as $key => $arItem)
{
    $iblockId = 0;
    foreach($arItem['DISPLAY_PROPERTIES']['TEACHER']['LINK_ELEMENT_VALUE'] as $arLink)
    {
        $iblockId = $arLink['IBLOCK_ID'];
        break;
    }
    $dbProp = CIBlockElement::GetProperty($iblockId, $arItem['DISPLAY_PROPERTIES']['TEACHER']['VALUE'], array("sort" => "asc"), Array());
    while ($arProp = $dbProp->GetNext())
    {
        if($arProp['CODE'] == 'SURNAME')
            $arResult["ITEMS"][$key]['DISPLAY_PROPERTIES']['TEACHER']['SURNAME'] = $arProp['VALUE'];
        elseif($arProp['CODE'] == 'LASTNAME')
            $arResult["ITEMS"][$key]['DISPLAY_PROPERTIES']['TEACHER']['LASTNAME'] = $arProp['VALUE'];

    }
}


//получаем значения из настроек модуля для вывода расписания
$arOption = array("period_begin", "period_end", "hour_begin", "hour_end");
$module_id = "mibok.med";
foreach($arOption as $option)
    $arResult['OPTIONS'][$option] =  COption::GetOptionString($module_id, $option);

//формируем для вывода массивы
if(/*!empty($arResult['OPTIONS']['period_begin']) &&*/ !empty($arResult['OPTIONS']['period_end']))
{
    //$periodSTMP = strtotime($arResult['OPTIONS']['period_begin']);
    $periodSTMP = time();
    $periodSec = 86400;
    for($i = $arResult['OPTIONS']['period_begin']; $i <= (intval($arResult['OPTIONS']['period_end'])); $i++)
    {
        $val = $periodSTMP + ($i * $periodSec);
        $arDay[] = $val;
        $arDayName[$val] = date('D', $val);
        $arDayWeek[$val] = date('W', $val);
    }
}
if(!empty($arResult['ITEMS']))
{
    if(!empty($arResult['OPTIONS']['hour_begin']) && !empty($arResult['OPTIONS']['hour_end']))
    {
        for($i = $arResult['OPTIONS']['hour_begin']; $i <= $arResult['OPTIONS']['hour_end']; $i++)
            $arHour[] = $i;
    }
       
    $arTable = array();
    $i = 0;
    foreach($arResult['ITEMS'] as $arItem)
    {
        //формируем массив занятий по месяцам, дням и часам
        $tmp_b = MakeTimeStamp($arItem['DATE_ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS");
        $tmp_e = MakeTimeStamp($arItem['DATE_ACTIVE_TO'], "DD.MM.YYYY HH:MI:SS");
        $tmp_diff = $tmp_e - $tmp_b;
       
        //для периодических занятий
        if(isset($arItem['DISPLAY_PROPERTIES']['PERIOD'])) 
        {
            $itemWeek = date('D', $tmp_b);
            foreach($arDayName as $tmstp => $val)
            {
                $numWeek = abs($arDayWeek[$tmstp] - date('W', $tmp_b));
                $week = 10;
                switch ($arItem['DISPLAY_PROPERTIES']['PERIOD']['VALUE_XML_ID'])
                {
                    case 'week-1': $week = 1; break;
                    case 'week-2': $week = 2; break;
                    case 'week-4': $week = 4; break;
                    default:       $week = 1; break;
                }
                if($itemWeek == $val && MibokMed::isCellTimetable($numWeek, $week))
                {
                    $tmp_act_b = $tmstp;
                    $tmp_act_e = $tmstp + $tmp_diff;
                    MibokMed::GetTable($i, $arItem, $arTable, $tmp_act_b, $tmp_act_e, $tmp_diff, $tmp_b, $tmp_e);
                }                
            }
        }
        else
        {
            $tmp_act_b = $tmp_b;
            $tmp_act_e = $tmp_e;
            MibokMed::GetTable($i, $arItem, $arTable, $tmp_act_b, $tmp_act_e, $tmp_diff, $tmp_b, $tmp_e);
        }  
    }
    $arResult['DAY'] = $arDay;
    $arResult['HOUR'] = $arHour;
    $arResult['TABLE'] = $arTable;
    $arResult['CURRENT'] = date('j.n');
}
?>