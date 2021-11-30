<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Первое педиатрическое отделение (дипломы, сертификаты)");
?><h2></h2>
<h2 style="text-align: center;">Список врачей-педиатров отделения оказания медицинской помощи несовершеннолетним в образовательных организациях</h2>
<p style="text-align: center;">
</p>
<h2 style="text-align: center;">1 отделение</h2>
<h2></h2>
    <div class="scroll-table">
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => "/include/sveden/diplomy-i-sertifikaty-otdelenie-oompio-/pervoe-pediatricheskoe-otdelenie-diplomy-sertifikaty/index.php"
    ),
    false
);?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>