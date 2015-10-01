<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h2 class="fs_30px color_black margin-top_100px">Дополнят тему</h2>
<div class="margin-top_35px">
	<!-- css master 80lvl -->
</div>
<? foreach($arResult["ITEMS"] as $arItem):?>
<div class="b_news-item width_auto no-margin">
	<div class="b_news-item_date fs_10px color_7a7d80">
		<?=$arItem['DISPLAY_ACTIVE_FROM']?>
	</div>
	<div class="b_news-item_header fs_14px margin-top_5px">
		<a class="link_007eb4" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem['NAME']?></a>
	</div>										
	<div class="b_news-item_news fs_14px margin-top_10px">
		<?=$arItem['PREVIEW_TEXT']?>
	</div>
</div>
<? endforeach ?>