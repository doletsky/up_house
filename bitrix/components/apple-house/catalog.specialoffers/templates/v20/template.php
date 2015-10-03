<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <section class="novelty main-section">
    <h2 class="novelty-title entry-title">Новинки уже в продаже</h2>

    <div class="carousel">

<? foreach($arResult["ITEMS"] as $key => $arItem): ?>
    <div class="slide">
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-link">
            <figure class="product-content">
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" class="product-img" />
                <figcaption class="product-desc"><?=$arItem['NAME']?></figcaption>
            </figure>
        </a>
        <?if($arItem['PRICES']['Продажа']['VALUE_VAT'] > 0): ?>
            <div class="product-price"><?=str_replace(' руб.', '', $arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT'])?>, -</div>
        <? endif ?>

        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить" onclick="location.href='<?=$arItem['BUY_URL']?>'"/>
            <a href="#" class="button-credit">В 1 клик</a>
        </div>
    </div>
<?endforeach;?>

    </div>

    </section>


<?if(0):?>
<div class="b_tiny-carousel tiny-carousel_goods-slider margin-top_15px">
	<a class="b_tiny-carousel_control tiny-carousel_control_next" href="#">Next</a>
	<a class="b_tiny-carousel_control tiny-carousel_control_prev" href="#">Prev</a>
	<div class="b_tiny-carousel_pager">
		<? for($i = 0; $i < $arResult['PAGES_COUNT']; $i++): ?>
		<a href='#' class="b_tiny-carousel_pager-item" rel="<?=$i?>">menu-item <?=($i+1)?></a>
		<? endfor ?>
	</div>
	<div class="b_tiny-carousel_viewport">
		<ul class="b_tiny-carousel_overview">
			<? foreach($arResult["ITEMS"] as $key => $arItem): ?>
			<li class="b_tiny-carousel_item">
				<div class="b_goods-slider-item">
					<div class="b_goods-slider-item_image-container">
                                                <a class="image-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                <? if(is_array($arItem['PREVIEW_PICTURE'])):?>
                                                   <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['NAME']?>" class="b_goods-slider-item_image"><? endif ?></a>
					</div>
					<h4 class="b_goods-slider-item_text ff_helvetica-neue-light color_253487 fs_18px margin-top_15px">
						<a class="no-style-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=str_replace(chr(160),chr(32),$arItem['NAME'])?></a>
					</h4>
					<div class="b_goods-slider-item_price margin-top_15px ff_helvetica-neue-light">
					<? //$arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']='Товар ожидается';
					if($arItem['PRICES']['Продажа']['VALUE_VAT'] > 0): ?>
						<? if($arItem['PRICES']['Продажа']['VALUE_VAT'] > $arItem['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']):?>
						<span class="color_259ccf td_line-through fs_18px"><?=$arItem['PRICES']['Продажа']['PRINT_VALUE_VAT']?></span><br>
						<? endif ?>
						<span class="color_259ccf fs_24px"><?=$arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?></span>
					<? endif ?>
					</div>
				   <div class="margin-top_10px ff_helvetica-neue-light fs_14px">
						<a href="<?=$arItem['ADD_URL']?>" class="b_button button_green"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
						<!--<a href="<?=$arItem['ADD_URL']?>&credit=Y" class="b_button button_grey"><i class="b_glyph glyph_dollar"></i> В кредит</a>-->
                        <a href="<?=$arItem['ADD_URL']?>" class="b_button button_sea oneClickBuyLink" data-buyid="<?=$arItem['ID']?>"><i class="b_glyph glyph_on_click-mini"></i> В 1 клик</a>
					</div>						
				</div>
			</li>
			<? endforeach ?>					
		</ul>
	</div>
</div>
<?endif?>