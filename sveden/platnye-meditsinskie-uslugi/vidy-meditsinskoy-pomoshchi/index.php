<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Виды медицинской помощи");
?>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/platnye-meditsinskie-uslugi/vidy-meditsinskoy-pomoshchi/index.php"
            ),
            false
        );?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>