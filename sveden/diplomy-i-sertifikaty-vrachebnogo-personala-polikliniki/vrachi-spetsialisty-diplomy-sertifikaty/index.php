<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Врачи-специалисты (дипломы, сертификаты)");
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
                "PATH" => "/include/sveden/diplomy-i-sertifikaty-vrachebnogo-personala-polikliniki/vrachi-spetsialisty-diplomy-sertifikaty/index.php"
            ),
            false
        );?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

