<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Второе педиатрическое отделение (дипломы, сертификаты)");
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
                "PATH" => "/include/sveden/diplomy-i-sertifikaty-vrachebnogo-personala-polikliniki/vtoroe-pediatricheskoe-otdelenie-diplomy-sertifikaty/index.php"
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
    text-align: left;
}
.c-article tr td:first-child {
    text-align: left;
}
</style><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>