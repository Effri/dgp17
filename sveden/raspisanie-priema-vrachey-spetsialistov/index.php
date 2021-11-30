<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание приема врачей-специалистов");
?><p class="table-responsive" style="text-align: left;">
</p>
 <b>
<h3>Площадка № 1 Есенина 38 к.2</h3>
 <br>
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
		"PATH" => "/include/sveden/raspisanie-priema-vrachey-spetsialistov/raspisanie-priema-vrachey-spetsialistov.php"
	),
	false
);?>
</div>
<p class="table-responsive" style="text-align: left;">
</p>
 <b>
<h3>Подразделения поликлиники</h3>
 </b><br>
    <div class="scroll-table">
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => "/include/sveden/raspisanie-priema-vrachey-spetsialistov/raspisanie-priema-vrachey-spetsialistov_2.php"
    ),
    false
);?>
    </div>
<p class="table-responsive" style="text-align: left;">
</p>
<h3><span style="font-weight: 400;"><b>Площадка № 2 Энгельса 147 к.1</b></span><br>
 <b> </b></h3>
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
        "PATH" => "/include/sveden/raspisanie-priema-vrachey-spetsialistov/raspisanie-priema-vrachey-spetsialistov_3.php"
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