<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
    <!-- страница отзывов -->
<div id="page-cart" style="margin-top: 25px;">
<? $APPLICATION->IncludeComponent(
	"apple-house:catalog.reviews",
	"",
	array(
		"IBLOCK_CAT_TYPE" => "1c_catalog",
		"IBLOCK_CAT_ID" => "8",
		"IBLOCK_REVIEW_TYPE" => "services",
		"IBLOCK_REVIEW_ID" => "13",
		"ALLOW_ADD" => "N",
		"DISPLAY_MODE" => "section"
	),
false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>