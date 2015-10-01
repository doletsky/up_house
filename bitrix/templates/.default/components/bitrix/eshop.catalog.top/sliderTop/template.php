<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="slider-container">
	<h2 class="color_black fs_30px ff_helvetica-neue-light"><?=GetMessage("CATALOG_NEW_TITLE")?></h2>
	<h3 class="color_7e7e7e fs_14px ff_helvetica-neue-light"><?=GetMessage("CATALOG_NEW_TITLE_INFO")?></h3>
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
							<a class="image-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"><? if(is_array($arItem['PREVIEW_PICTURE'])):?><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['NAME']?>"><? endif ?></a>
						</div>
						<h4 class="ff_helvetica-neue-light color_253487 fs_24px margin-top_15px">
							<a class="no-style-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
						</h4>
						<div class="margin-top_15px ff_helvetica-neue-light">
							<span class="color_79b70d fs_24px"><?=$arItem['PRINT_DISCOUNT_VALUE_NOVAT]']?></span>
						</div>
					</div>
				</li>
				<? endforeach ?>					
			</ul>
		</div>
	</div>
</div>