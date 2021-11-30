<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание приёма врачебного персонала, оказывающего платные услуги");
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
                "PATH" => "/include/sveden/platnye-meditsinskie-uslugi/raspisanie-priyema-vrachebnogo-personala-okazyvayushchego-platnye-uslugi/index.php"
            ),
            false
        );?>
    </div>
<style>
.c-article td {
    padding-right: 15px;
    padding-bottom: 15px;
    padding: 0 10px;
    vertical-align: middle;
    text-align: center !important;
}
.c-article tr td:first-child {
    text-align: left;
}
</style><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>