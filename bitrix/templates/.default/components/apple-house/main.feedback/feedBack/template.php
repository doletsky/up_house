<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="grey-block padding-bottom-top_1px padding-left-right_10px">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form action="<?=$APPLICATION->GetCurPage()?>" method="POST" id="feedbackForm" name="feedbackForm">
<?=bitrix_sessid_post()?>
	<h4 class="fs_18px margin-top_15px">Обратная связь</h4>
	<div class="margin-top_15px">
		<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" class="b_input-text ff_helvetica-neue-light input-text_width_267px" placeholder="<?=GetMessage("MFT_NAME")?>">
	</div>
	<div class="margin-top_15px">
		<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" class="b_input-text ff_helvetica-neue-light input-text_width_267px" placeholder="<?=GetMessage("MFT_EMAIL")?>">
	</div>
	<div class="margin-bottom_20px margin-top_15px">
		<textarea name="MESSAGE" style="height:150px;padding-bottom:40px;" class="b_textarea ff_helvetica-neue-light textarea_width_267px" placeholder="<?=GetMessage("MFT_MESSAGE")?>"></textarea>
		<div class="ta_right">
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="hidden" name="submitForm" value="Y">
		<a style="position:relative;left:-8px;top:-25px;" id="feedbackFormSubmit" class="no-style-link" href="#"><i class="b_glyph glyph-arrow-blue-right"></i></a>
		</div>
	</div>
</form>
</div>