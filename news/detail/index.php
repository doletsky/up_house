<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetAdditionalCSS("/news/style.css", true);
$APPLICATION->SetTitle("�������");
?><div class="b_grid">
	<div class="b_grid_level grid_level_30px">
<?$APPLICATION->IncludeComponent("bitrix:news.detail", "newsDetail", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => "",
	"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
	"ELEMENT_CODE" =>  $_REQUEST["ELEMENT_CODE"],
	"CHECK_DATES" => "Y",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"IBLOCK_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"ACTIVE_DATE_FORMAT" => "j F, Y",
	"USE_PERMISSIONS" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "��������",
	"PAGER_TEMPLATE" => "",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
	<?$APPLICATION->IncludeComponent("apple-house:news.additional", "newsAdditional", Array(
	"IBLOCK_TYPE" => "news",	// ��� ��������������� ����� (������������ ������ ��� ��������)
	"IBLOCK_ID" => "1",	// ��� ��������������� �����
	"NEWS_COUNT" => "20",	// ���������� �������� �� ��������
	"SORT_BY1" => "ACTIVE_FROM",	// ���� ��� ������ ���������� ��������
	"SORT_ORDER1" => "DESC",	// ����������� ��� ������ ���������� ��������
	"SORT_BY2" => "ACTIVE_FROM",	// ���� ��� ������ ���������� ��������
	"SORT_ORDER2" => "DESC",	// ����������� ��� ������ ���������� ��������
	"FILTER_NAME" => "",	// ������
	"FIELD_CODE" => array(	// ����
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(	// ��������
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
	"DETAIL_URL" => "/news/detail/?ELEMENT_ID=#ID#",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
	"AJAX_MODE" => "N",	// �������� ����� AJAX
	"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
	"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
	"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
	"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
	"CACHE_GROUPS" => "Y",	// ��������� ����� �������
	"PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
	"ACTIVE_DATE_FORMAT" => "j F",	// ������ ������ ����
	"SET_TITLE" => "N",	// ������������� ��������� ��������
	"SET_STATUS_404" => "N",	// ������������� ������ 404, ���� �� ������� ������� ��� ������
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// �������� �������� � ������� ���������
	"ADD_SECTIONS_CHAIN" => "N",	// �������� ������ � ������� ���������
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// �������� ������, ���� ��� ���������� ��������
	"PARENT_SECTION" => "",	// ID �������
	"PARENT_SECTION_CODE" => "",	// ��� �������
	"DISPLAY_TOP_PAGER" => "Y",	// �������� ��� �������
	"DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
	"PAGER_TITLE" => "�������",	// �������� ���������
	"PAGER_SHOW_ALWAYS" => "N",	// �������� ������
	"PAGER_TEMPLATE" => "appleHouse",	// �������� �������
	"PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
	"PAGER_SHOW_ALL" => "N",	// ���������� ������ "���"
	"DISPLAY_DATE" => "Y",	// �������� ���� ��������
	"DISPLAY_NAME" => "Y",	// �������� �������� ��������
	"DISPLAY_PICTURE" => "Y",	// �������� ����������� ��� ������
	"DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
	"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
	),
	false
);?>						
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>