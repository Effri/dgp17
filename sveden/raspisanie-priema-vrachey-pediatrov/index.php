<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание приема врачей-педиатров");
?><p class="table-responsive" style="text-align: left;">
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
                "PATH" => "/include/sveden/raspisanie-priema-vrachey-pediatrov/index.php"
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
    text-align: center;
}
.c-article tr td:first-child {
    text-align: left;
}
</style><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>