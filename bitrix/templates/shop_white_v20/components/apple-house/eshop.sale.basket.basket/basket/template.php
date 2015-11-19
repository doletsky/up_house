<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <!-- страница корзина -->
    <div id="page-cart" style="margin-top: 25px;">

    <!-- блок корзины -->
    <?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");?>
    <!-- /блок корзины -->
<!--        <pre>--><?//print_r($arResult['RECCOMEND'])?><!--</pre>-->
    <!-- рекомендуем добавить к Вашему заказу -->
    <section class="novelty main-section">
        <h2 class="novelty-title entry-title-2">рекомендуем добавить к Вашему заказу</h2>

        <div class="carousel" style="z-index: 9999;">

<?foreach($arResult['RECCOMEND'] as $recom):?>
            <!-- 1 slide -->
            <div class="slide">
                <a href="#" class="product-link">
                    <figure class="product-content">
                        <?if(strlen($recom['PREVIEW_PICTURE']['SRC'])):?>
                            <img src="<?=$recom['PREVIEW_PICTURE']['SRC']?>" alt="<?=$recom['NAME']?>" class="product-img" />
                            <figcaption class="product-desc"><?=$recom['NAME']?></figcaption>
                        <?else:?>
                            <figcaption class="product-desc" style="margin-top: 195px"><?=$recom['NAME']?></figcaption>
                        <?endif?>

                    </figure>
                </a>
                <div class="product-price"><?=number_format($recom['PRICES']['Продажа']['VALUE'], 0, ',', ' ')?>, -</div>
                <div class="clearfix">
                    <input type="submit" class="button-buy" value="Купить" onclick="location.href='<?=$recom['ADD_URL']?>'"/>
                    <a href="#" class="button-credit" data-buyid="<?=$recom['ID']?>">В 1 клик</a>
                </div>
            </div>
<?endforeach?>

        </div>

    </section>
    <!-- /рекомендуем добавить к Вашему заказу -->


    </div>
    <!-- /страница корзина -->



<?if(0):?>

	<div class="b_grid">
		<div class="b_grid_unit-1-2">
			<h1 class="fs_36px margin-top_20px">Корзина</h1>
			
		</div>
		
		<div class="b_grid_unit-1-2 ta_right">
			<a class="link_007eb4 margin-top_35px float_right display_block" href="/">Продолжить покупки</a>
		</div>
	</div>
	

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

<?endif?>