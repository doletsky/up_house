<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ta_right b_grid_level">
<form action="<?=$arResult["FORM_ACTION"]?>" id="header_search_form">
	<a class="no-style-link" id="header_search_form_submit" href="/search/"><i class="b_glyph glyph_search"></i></a><input name="q" class="b_input-text b_input-text_glyph" placeholder="Поиск">
	<input type="hidden" name="s" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>">
</form>
</div>