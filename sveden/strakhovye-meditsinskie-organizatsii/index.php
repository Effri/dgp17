<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страховые медицинские организации");
?><br>
 <br>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/strakhovye-meditsinskie-organizatsii/index.php"
            ),
            false
        );?>
    </div>
    <h3 align="center">Выдача полисов</h3>
 195&nbsp;пунктов выдачи полисов ОМС страховых компаний из них 38 мобильных<br>
 59&nbsp;МФЦ оказывают услугу по выдаче полисов ОМС
<h3 align="center">Специалисты СМО</h3>
 143&nbsp;обеспечивают защиту прав застрахованных<br>
 150&nbsp;осуществляют контроль качества медицинской помощи<br>
 <br>
 <a href="/bucklet.pdf" target="_blank">Информационные буклеты</a><br>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>