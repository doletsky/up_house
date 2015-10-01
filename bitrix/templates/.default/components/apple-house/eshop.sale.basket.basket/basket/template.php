<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div class="b_grid">
		<div class="b_grid_unit-1-2">
			<h1 class="fs_36px margin-top_20px">Корзина</h1>
			
		</div>
		
		<div class="b_grid_unit-1-2 ta_right">
			<a class="link_007eb4 margin-top_35px float_right display_block" href="/">Продолжить покупки</a>
		</div>
	</div>
	
	<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form">
	<div class="b_cart fs_18px">
		<div class="b_grid">
<?
if (StrLen($arResult["ERROR_MESSAGE"])<=0)
{
	$arUrlTempl = Array(
		"delete" => $APPLICATION->GetCurPage()."?action=delete&id=#ID#",
		"shelve" => $APPLICATION->GetCurPage()."?action=shelve&id=#ID#",
		"add" => $APPLICATION->GetCurPage()."?action=add&id=#ID#",
	);
	?>
		<?
		//if ($arResult["ShowReady"]=="Y")
		include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
		?>

	<?

}
else
{
	include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
	//ShowNote($arResult["ERROR_MESSAGE"]);
}
?>
		</div>
	</div>
	</form>
<? if(!empty($arResult['RECCOMEND'])): ?>
<div class="slider-container">
	<h2 class="color_black fs_30px ff_helvetica-neue-light">Рекомендуем добавить к Вашему заказу</h2>
	<div class="b_tiny-carousel tiny-carousel_goods-slider margin-top_15px">
		<a class="b_tiny-carousel_control tiny-carousel_control_next" href="#">Next</a>
		<a class="b_tiny-carousel_control tiny-carousel_control_prev" href="#">Prev</a>
		<div class="b_tiny-carousel_pager">
		<? for($i = 1; $i <= $arResult['RECCOMEND_PAGES']; $i++): ?>
			<a href='#' class="b_tiny-carousel_pager-item" rel="0">menu-item <?=$i?></a>
		<? endfor ?>
		</div>
		<div class="b_tiny-carousel_viewport">
			<ul class="b_tiny-carousel_overview">
			<? foreach($arResult['RECCOMEND'] as $arReccomend): ?>
				<li class="b_tiny-carousel_item">
					<div class="b_goods-slider-item float_left">
						<div class="b_goods-slider-item_image-container">
						<? if(is_array($arReccomend['PREVIEW_PICTURE'])):?>
							<a class="image-link" href="<?=$arReccomend['DETAIL_PAGE_URL']?>"><img class="b_goods-slider-item_image" src="<?=$arReccomend['PREVIEW_PICTURE']['SRC']?>"></a>
						<? endif ?>
						</div>
						<h4 class="b_goods-slider-item_text ff_helvetica-neue-light color_253487 fs_24px margin-top_5px">
							<a class="no-style-link" href="<?=$arReccomend['DETAIL_PAGE_URL']?>"><?=$arReccomend['NAME']?></a>
						</h4>
						<div class="b_goods-slider-item_price margin-top_5px ff_helvetica-neue-light">
							<span class="color_79b70d fs_18px"><?=$arReccomend['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE']?></span>
						</div>
						<? if($arReccomend['CAN_BUY']): ?>
						<div class="margin-top_5px">
							<a class="b_button-buy button-buy_add" href="<?=$arReccomend['ADD_URL']?>"></a>
						</div>
						<? endif ?>
					</div>
				</li>
			<? endforeach ?>
			</ul>
		</div>
	</div>
</div>
<? endif ?>