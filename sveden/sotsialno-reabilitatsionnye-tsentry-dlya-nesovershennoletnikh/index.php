<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Социально реабилитационные центры для несовершеннолетних");
?><h3 align="center">Социально реабилитационные центры для несовершеннолетних</h3>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/sotsialno-reabilitatsionnye-tsentry-dlya-nesovershennoletnikh/index.php"
            ),
            false
        );?>
    </div>
 <br>
<h3 align="center">Межрайонные наркологические диспансеры</h3>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/sotsialno-reabilitatsionnye-tsentry-dlya-nesovershennoletnikh/index_2.php"
            ),
            false
        );?>
    </div>
 <br>
<h3 align="center">Городской центр по работе с детьми,подростками и молодежью</h3>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/sotsialno-reabilitatsionnye-tsentry-dlya-nesovershennoletnikh/index_3.php"
            ),
            false
        );?>
    </div>
 <br>
<h3 align="center">Негосударственные и общественные организации</h3>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/sotsialno-reabilitatsionnye-tsentry-dlya-nesovershennoletnikh/index_4.php"
            ),
            false
        );?>
    </div> <br>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>