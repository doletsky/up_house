<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("���������� � ��������");
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
		"PRICE_CODE" => array(0=>"�������",),
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
	"FORUM_ID" => "1",	// ID ������ ��� �������
	"IBLOCK_TYPE" => "1c_catalog",	// ��� ��������������� ����� (������������ ������ ��� ��������)
	"IBLOCK_ID" => "8",	// ��� ��������������� �����
	"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],	// ID ��������
	"POST_FIRST_MESSAGE" => "Y",	// �������� ���� ������� ��������
	"POST_FIRST_MESSAGE_TEMPLATE" => "#IMAGE#
[url=#LINK#]#TITLE#[/url]
#BODY#",	// ������ ������ ��� ������� ��������� ����
	"URL_TEMPLATES_READ" => "",	// �������� ������ ���� ������
	"URL_TEMPLATES_DETAIL" => "",	// �������� �������� ���������
	"URL_TEMPLATES_PROFILE_VIEW" => "",	// �������� ������������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "0",	// ����� ����������� (���.)
	"MESSAGES_PER_PAGE" => "10",	// ���������� ��������� �� ����� ��������
	"PAGE_NAVIGATION_TEMPLATE" => "",	// �������� ������� ��� ������ ������������ ���������
	"DATE_TIME_FORMAT" => "d.m.Y H:i:s",	// ������ ������ ���� � �������
	"NAME_TEMPLATE" => "",	// ������ �����
	"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",	// ���� ������������ ����� ����� � ����� �� ��������
	"EDITOR_CODE_DEFAULT" => "Y",	// �� ��������� ���������� ������������ ����� ���������
	"SHOW_AVATAR" => "N",	// ���������� ������� �������������
	"SHOW_RATING" => "Y",	// �������� �������
	"RATING_TYPE" => "like_graphic",	// ��� ������ ��������
	"SHOW_MINIMIZED" => "N",	// ����������� ����� ���������� ������
	"USE_CAPTCHA" => "N",	// ������������ CAPTCHA
	"PREORDER" => "Y",	// �������� ��������� � ������ �������
	"SHOW_LINK_TO_FORUM" => "N",	// �������� ������ �� �����
	"FILES_COUNT" => "0",	// ������������ ���������� ������, ������������� � ������ ���������
	"AJAX_POST" => "Y",	// ������������ AJAX � ��������
	),
	false
);?>
*/ ?>
		</div>
	</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>