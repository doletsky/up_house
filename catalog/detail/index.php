<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация о продукте");
?>
	<div class="b_grid product-card">
		<div class="b_grid_level grid_level_15px ff_helvetica-neue-light"> 
<?$APPLICATION->IncludeComponent(
	"apple-house:catalog.element",
	"detailProduct",
	Array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "8",
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"ELEMENT_CODE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"PROPERTY_CODE" => array(0=>"CML2_CODE",1=>"",),
		"OFFERS_LIMIT" => "0",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
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
<? $APPLICATION->IncludeComponent("apple-house:catalog.reviews", "", array(

	),
	false
);?>
<? /*
<?$APPLICATION->IncludeComponent("bitrix:forum.topic.reviews", "reviews", Array(
	"FORUM_ID" => "1",	// ID форума для отзывов
	"IBLOCK_TYPE" => "1c_catalog",	// Тип информационного блока (используется только для проверки)
	"IBLOCK_ID" => "8",	// Код информационного блока
	"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],	// ID элемента
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
	</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>