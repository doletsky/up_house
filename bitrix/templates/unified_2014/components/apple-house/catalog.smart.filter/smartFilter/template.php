<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script type="text/javascript">
$(document).ready(function(e) {
	$('.smart_filter_link').click(function(e) {
		e.preventDefault();
		var sfl_value = $(this).attr('data-value');
		var sfl_name = $(this).attr('data-control-name');
		$('#smart_filter_cont').append('<input type="hidden" value="' + sfl_value + '" name="' + sfl_name + '">');
		$('#smart_filter').submit();
	});
});
</script>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" id="smart_filter" class="smartfilter">
	<? foreach($arResult["HIDDEN"] as $arItem):?>
		<input
			type="hidden"
			name="<?echo $arItem["CONTROL_NAME"]?>"
			id="<?echo $arItem["CONTROL_ID"]?>"
			value="<?echo $arItem["HTML_VALUE"]?>"
		/>
	<?endforeach;?>
<div class="b_grid_unit-7-12" id="smart_filter_cont">
	<? foreach($arResult["ITEMS"] as $arItem):?>
	<div class="display_inline-block ws_10px">
		<? foreach($arItem['VALUES'] as $value): ?>
			<? if($value['CHECKED']): ?>
			<span class="color_black ws_normal"><?=$value['VALUE']?></span>
			<? else: ?>
			<a class="link_007eb4 underline_dotted ws_normal smart_filter_link" data-value="<?echo $value["HTML_VALUE"]?>" data-control-name="<?echo $value["CONTROL_NAME"]?>" href="#"><?=$value['VALUE']?></a>
			<? endif ?>			
			<? // $value['CHECKED'] ?>
		<? endforeach ?>
	</div>
	<? endforeach ?>
<input type="hidden" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />
</div>
</form>