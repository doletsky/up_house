<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if(count($arResult['ITEMS'])): ?>
<div id="slider">
	<!--
	<a class="b_tiny-carousel_control tiny-carousel_control_next" href="#">Next</a>
	<a class="b_tiny-carousel_control tiny-carousel_control_prev" href="#">Prev</a>
	-->
	<? /* //var_dump($arResult['ITEMS']); ?>
	<div class="b_tiny-carousel_pager">
	<? foreach($arResult['ITEMS'] as $key=>$item): ?>
		<a href='#' class="b_tiny-carousel_pager-item" rel="<?=$key?>">menu-item <?=($key+1)?></a>
	<? endforeach ?>
	</div>
    <? /* */?>
		<ul class="bxslider">
		<? foreach($arResult['ITEMS'] as $key=>$item): ?>
			<li>
                <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>">


				<div class="bx-caption">
                    <h2 class="slider-title">Jawbone UP24</h2>
                    <div class="slider-content">
                        следить за здоровьем<br />стало еще проще
                    </div>
                    <a href="<?=$item['PROPERTY_178']?>" class="slider-button">Заказать</a>


                    <? /*
					<div class="b_promo-slider-item_text">
						<a class="no-style-link full-size-link" href="<?=$item['PROPERTY_178']?>"><span class="ff_helvetica-neue-thin fs_36px">
							<span class="color_007eb4">
								<?=$item['PREVIEW_TEXT']?>
							</span><br>
							<span class="color_79b70d lh_2">
								<?=$item['PROPERTY_179']?>
							</span>
						</span></a>
					</div>
					<div class="b_promo-slider-item_order ff_helvetica-neue-light color_white fs_24px">
						<a class="no-style-link full-size-link" href="<?=$item['PROPERTY_178']?>">Заказать</a>
					</div>
					<a class="no-style-link full-size-link" href="<?=$item['PROPERTY_178']?>"><img class="b_promo-slider-item_image" src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></a>

                    */ ?>
				</div>
			</li>
		<? endforeach ?>
		</ul>
</div>
<? endif ?>