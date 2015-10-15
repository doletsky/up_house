<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div class="b_grid product-card">
<? $APPLICATION->IncludeComponent(
	"apple-house:catalog.element",
	"detailProduct",
	Array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "8",
		"ELEMENT_ID" => $arParams['ELEMENT_ID'],
		"ELEMENT_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"PROPERTY_CODE_OVERALL" => array(
			'0' => 'PROIZVODITEL',
			'1' => 'SAYT_PROIZVODITELYA',
			'2' => 'STANDART',
			'3' => 'OPERATSIONNAYA_SISTEMA',
			'4' => 'TIP_KORPUSA',
			'5' => 'MATERIAL',
			'6' => 'MATERIAL_KORPUSA',
			'7' => 'TIP_SIM_KARTY',
			'8' => 'VES',
			'9' => 'RAZMERY_SHXVXT',
			'10' => 'OBEM_PAMYATI',
			'11' => 'TSVET',
			'12' => 'FORM_FAKTOR',
			'13' => 'KOMPLEKT_POSTAVKI',
			'14' => 'TIP_EKRANA',
			'15' => 'DIAGONAL',
			'16' => 'DISPLEY',
			'17' => 'RAZRESHENIE_EKRANA',
			'18' => 'CML2_BAR_CODE',
			'19' => 'CML2_ATTRIBUTES',
			'20' => 'CML2_ARTICLE',
			'21' => 'CML2_BAR_CODE',
			'22' => 'KOD_MODELI',
			'23' => 'SOVMESTIMOST',
			'24' => 'DATCHIKI',
			'25' => 'V_KOMPLEKTE',
			'26' => 'RAZMER',
			'27' => 'VLAGOZASHCHITA',
			'28' => 'DLINA',
			'29' => 'EMKOST_SSD',
            '30' => 'DLINA2',
		),
		"PROPERTY_CODE_MULTIMEDIA" => array(
			'0' => 'FOTOKAMERA',
			'1' => 'MAKS_RAZRESHENIE_VIDEO',
			'2' => 'FRONTALNAYA_KAMERA',
			'3' => 'RAZEM_DLYA_NAUSHNIKOV'
		),
		"PROPERTY_CODE_CONNECT" => array(
			'0' => 'BLUETOOTH',
			'1' => 'WIFI',
			'2' => 'INTERFEYSY',
			'3' => 'NAVIGATSIYA',
			'4' => 'SETEVAYA_KARTA',
			'5' => 'RAZYEMY',
		),
		"PROPERTY_CODE_PROC_RAM" => array(
			'0' => 'PROTSESSOR',
			'1' => 'CHASTOTA_PROTSESSORA',
            '2' => 'MAKSIMALNAYA_TAKTOVAYA_CHASTOTA',
			'3' => 'KOLICHESTVO_YADER',
			'4' => 'TIP_OPERATIVNOY_PAMYATI',
			'5' => 'OBEM_OPERATIVNOY_PAMYATI',
			'6' => 'OPERATIVNAYA_PAMYAT_RAM',
			'7' => 'CHASTOTA_OPERATIVNOY_PAMYATI'
		),
		"PROPERTY_CODE_STORAGE" => array(
			'0' => 'TIP_ZHESTKOGO_DISKA',
			'1' => 'ZHESTKIY_DISK',
			'2' => 'OPTICHESKIY_NAKOPITEL',
			'3' => 'USTROYSTVA_CHTENIYA_KART_PAMYATI'
		),
		"PROPERTY_CODE_AUDIO" => array(
			'0' => 'ZVUK'
		),
		"PROPERTY_CODE_POWER" => array(
			'0' => 'TIP_AKKUMULYATORA',
			'1' => 'EMKOST_AKKUMULYATORA',
			'2' => 'VREMYA_RAZGOVORA',
			'3' => 'VREMYA_OZHIDANIYA',
			'4' => 'VREMYA_RABOTY_V_REZHIME_PROSLUSHIVANIYA_MUZYKI',
			'5' => 'AKKUMULYATOR',
			'6' => 'VREMYA_POLNOY_ZARYADKI',
		),
		"OFFERS_LIMIT" => "0",
		"SECTION_URL" => "/#CODE#",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"PRICE_CODE" => array(0=>"Продажа",),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => "",
		"USE_PRODUCT_QUANTITY" => "N",
		"CONVERT_CURRENCY" => "N",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#"
	)
);?>
<?/* $APPLICATION->IncludeComponent(
	"apple-house:catalog.reviews",
	"",
	Array(
		"IBLOCK_CAT_TYPE" => "1c_catalog",
		"IBLOCK_CAT_ID" => "8",
		"IBLOCK_REVIEW_TYPE" => "services",
		"IBLOCK_REVIEW_ID" => "13",
		"ALLOW_ADD" => "N",
		"DISPLAY_MODE" => "element"
	),
false
);?>
<? /*
<?$APPLICATION->IncludeComponent("bitrix:forum.topic.reviews", "reviews", Array(
	"FORUM_ID" => "1",	// ID форума для отзывов
	"IBLOCK_TYPE" => "1c_catalog",	// Тип информационного блока (используется только для проверки)
	"IBLOCK_ID" => "8",	// Код информационного блока
	"ELEMENT_ID" => $arParams['ELEMENT_ID'],	// ID элемента
	"POST_FIRST_MESSAGE" => "Y",	// Начинать тему текстом элемента
	"POST_FIRST_MESSAGE_TEMPLATE" => "#IMAGE#
[url=#LINK#]#TITLE#[/url]
#BODY#",	// Шаблон текста для первого сообщения темы
	"URL_TEMPLATES_READ" => "",	// Страница чтения темы форума
	"URL_TEMPLATES_DETAIL" => "",	// Страница элемента инфоблока
	"URL_TEMPLATES_PROFILE_VIEW" => "",	// Страница пользователя
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "0",	// Время кеширования (сек.)
	"MESSAGES_PER_PAGE" => "10",	// Количество сообщений на одной странице
	"PAGE_NAVIGATION_TEMPLATE" => "",	// Название шаблона для вывода постраничной навигации
	"DATE_TIME_FORMAT" => "d.m.Y H:i:s",	// Формат показа даты и времени
	"NAME_TEMPLATE" => "",	// Формат имени
	"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",	// Путь относительно корня сайта к папке со смайлами
	"EDITOR_CODE_DEFAULT" => "Y",	// По умолчанию показывать невизуальный режим редактора
	"SHOW_AVATAR" => "N",	// Показывать аватары пользователей
	"SHOW_RATING" => "Y",	// Включить рейтинг
	"RATING_TYPE" => "like_graphic",	// Вид кнопок рейтинга
	"SHOW_MINIMIZED" => "N",	// Сворачивать форму добавления отзыва
	"USE_CAPTCHA" => "N",	// Использовать CAPTCHA
	"PREORDER" => "Y",	// Выводить сообщения в прямом порядке
	"SHOW_LINK_TO_FORUM" => "N",	// Показать ссылку на форум
	"FILES_COUNT" => "0",	// Максимальное количество файлов, прикрепленных к одному сообщению
	"AJAX_POST" => "Y",	// Использовать AJAX в диалогах
	),
	false
);?>
*/ ?>
		
	</div>
