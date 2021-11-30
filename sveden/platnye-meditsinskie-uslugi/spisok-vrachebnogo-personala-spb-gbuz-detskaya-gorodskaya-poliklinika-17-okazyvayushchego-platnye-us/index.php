<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Список врачебного персонала СПб ГБУЗ “Детская Городская поликлиника №17” оказывающего платные услуги");
?><p style="text-align: left;">
</p>
<div class="scroll-table">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "COMPONENT_TEMPLATE" => ".default",
            "PATH" => "/include/sveden/platnye-meditsinskie-uslugi\spisok-vrachebnogo-personala-spb-gbuz-detskaya-gorodskaya-poliklinika-17-okazyvayushchego-platnye-us/index.php"
        ),
        false
    );?>
</div>
<span style="font-family: Verdana;"> <b>
<h3 align="center" style="text-align: center;">
Список среднего медицинского персонала СПБ ГБУЗ «Детская городская поликлиника № 17»<br>
 имеющих сертификаты и принимающие участие в оказании платных услуг </h3>
 </b>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/platnye-meditsinskie-uslugi\spisok-vrachebnogo-personala-spb-gbuz-detskaya-gorodskaya-poliklinika-17-okazyvayushchego-platnye-us/index_2.php"
            ),
            false
        );?>
    </div>
 </span>
<p>
</p>
<span style="font-family: Verdana;"> </span> <br>
<style>
    .c-article td {
        padding-right: 15px;
        padding-bottom: 15px;
        padding: 0 10px;
        vertical-align: middle;
        text-align: center;
    }
    .c-article tr td:first-child {
        text-align: left;
    }
</style><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
