<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?><?$APPLICATION->IncludeComponent("bitrix:search.page", "search", Array(
	"AJAX_MODE" => "N",	// Включить режим AJAX
		"RESTART" => "Y",	// Искать без учета морфологии (при отсутствии результата поиска)
		"CHECK_DATES" => "Y",	// Искать только в активных по дате документах
		"USE_TITLE_RANK" => "Y",	// При ранжировании результата учитывать заголовки
		"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
		"arrWHERE" => "",
		"arrFILTER" => "",	// Ограничение области поиска
		"SHOW_WHERE" => "N",	// Показывать выпадающий список "Где искать"
		"PAGE_RESULT_COUNT" => "10",	// Количество результатов на странице
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Название шаблона
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"COMPONENT_TEMPLATE" => "clear",
		"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
		"FILTER_NAME" => "",	// Дополнительный фильтр
		"SHOW_WHEN" => "N",	// Показывать фильтр по датам
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
		"SHOW_RATING" => "",	// Включить рейтинг
		"RATING_TYPE" => "",	// Вид кнопок рейтинга
		"PATH_TO_USER_PROFILE" => "",	// Шаблон пути к профилю пользователя
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над результатами
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
		"STRUCTURE_FILTER" => "structure",
		"NAME_TEMPLATE" => "",
		"SHOW_LOGIN" => "Y",
		"SHOW_ITEM_TAGS" => "Y",	// Показывать теги документа
		"TAGS_INHERIT" => "Y",	// Сужать область поиска
		"SHOW_ITEM_DATE_CHANGE" => "Y",	// Показывать дату изменения документа
		"SHOW_ORDER_BY" => "Y",	// Показывать сортировку
		"SHOW_TAGS_CLOUD" => "N",	// Показывать облако тегов
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "150",
		"TAGS_PERIOD" => "",
		"TAGS_URL_SEARCH" => "",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>