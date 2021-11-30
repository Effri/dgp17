<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Page\Asset;

if(isset($arParams['TYPE_CAPTCHA']) && $arParams['TYPE_CAPTCHA'] == 'RECAPTCHA')
{
    if($arResult['RECAPTCHA']['recaptcha_version'] == 2)
        Asset::getInstance()->addString('<script src="https://www.google.com/recaptcha/api.js" async defer></script>');
    elseif($arResult['RECAPTCHA']['recaptcha_version'] == 3)
    {
        Asset::getInstance()->addString("<script src='https://www.google.com/recaptcha/api.js?render=".$arResult['RECAPTCHA']['recaptcha_key']."'></script>");
    }
}
?>