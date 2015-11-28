<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();
$arIBlock = array();
$rsCatIBlock = CIBlock::GetList(array("sort" => "asc"), array("TYPE" => $arCurrentValues["IBLOCK_CAT_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsCatIBlock->Fetch())
	$arCatIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
$rsReviewIBlock = CIBlock::GetList(array("sort" => "asc"), array("TYPE" => $arCurrentValues["IBLOCK_REVIEW_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsReviewIBlock->Fetch())
	$arReviewIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
	
$arDisplayMode=array("element" => GetMessage("DISPLAY_MODE_ELEMENT"), "section" => GetMessage("DISPLAY_MODE_SECTION"));
	
$arComponentParameters = array(
	"GROUPS" => array(
		"PRICES" => array(
			"NAME" => GetMessage("IBLOCK_PRICES"),
		),
	),
	"PARAMETERS" => array(
		"IBLOCK_CAT_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_CAT_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_CAT_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_CAT_IBLOCK"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arCatIBlock,
			"REFRESH" => "Y",
		),
		"IBLOCK_REVIEW_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_REVIEW_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_REVIEW_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_REVIEW_IBLOCK"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arReviewIBlock,
			"REFRESH" => "Y",
		),
		"ALLOW_ADD" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("ALLOW_NEW_REVIEW"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
		"DISPLAY_MODE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("DISPLAY_MODE"),
			"TYPE" => "LIST",
			"VALUES" => $arDisplayMode,
			'DEFAULT' => "element",
		),
	)
);

?>
