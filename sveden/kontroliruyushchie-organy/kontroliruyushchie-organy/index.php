<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контролирующие органы");
?><div>
	<table>
	</table>
</div>
    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/kontroliruyushchie-organy/kontroliruyushchie-organy/index.php"
            ),
            false
        );?>
    </div>
<p>
</p>
<h3>Телефоны и адреса районных органов внутренних дел и прокуратуры:</h3>
<table>
</table>
<p>
</p>
<table>
</table>
 Отдел внутренних дел (полиции) (ОВД) №57 Выборгского РУВД г. Санкт-Петербурга<br>
 Адрес: 194291, г. Санкт-Петербург, пр. Культуры, 12, корп. 3&nbsp;Телефон:&nbsp;<b><b>+7</b>(812) 559-57-02</b>
<p>
</p>
<p>
	 Отдел внутренних дел (полиции) (ОВД) №59 Выборгского РУВД г. Санкт-Петербурга<br>
	 Адрес: 194356, г. Санкт-Петербург, ул. Есенина, 27&nbsp;Телефон:&nbsp;<b>+7</b><b>(812) 597-59-02</b>
</p>
<p>
	 Прокуратура Выборгского района<br>
	 Адрес: 194044, г. Санкт-Петербург, ул. Смолячкова, 14/3&nbsp;Телефон/факс: <b>+7(812)542-51-42</b>
</p>
 <br>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>