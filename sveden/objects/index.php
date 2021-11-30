<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Показатели доступности и качества медицинской помощи");
?>
 <img width="481" alt="N-5caQuOv_E.jpg" src="<?=SITE_DIR?>include/img_content/a5f/a5f04c618c2286c955e95153fbbf5812.jpg" height="321" title="N-5caQuOv_E.jpg">
 
<div itemprop="PurposeKab">
    <ul>
        <li>Мощность поликлиники: 350 посещений в смену.</li>
        <li>Количество прикрепленного населения – 44018 человек.</li>
        <li>Время ожидания очереди на прием к врачу — не более 45 минут.</li>
        <li>Время ожидания очереди на плановую госпитализацию — не более 1 месяца.</li>
    </ul>
</div> 

<ul class="l-document-list">
    <li>
        <a href="/upload/iblock/ebf/ebf2a7081b50658bf85aefc719b1001c.doc" target="_blank">
            <div class="l-document-name">Критерии доступности и качества медицинской помощи, оказываемой в ГБУЗ «КРЕПКОЕ ЗДОРОВЬЕ»</div>
            <div class="l-document-size"></div>
        </a>
    </li>
    <li>
        <a href="/upload/iblock/987/987566ec0622527d6ebadc0a8f45b128.pdf" target="_blank">
            <div class="l-document-name">О территориальной программе государственных гарантий бесплатного оказания гражданам медицинской помощи на 2016 год (скачать)</div>
            <div class="l-document-size"></div>
        </a>
    </li>
</ul>

    <div class="scroll-table">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "/include/sveden/objects/index.php"
            ),
            false
        );?>
    </div>
 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>