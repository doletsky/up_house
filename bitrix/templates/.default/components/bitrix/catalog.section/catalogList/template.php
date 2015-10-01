<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b_grey-box">
	<div class="b_grid">
		<div class="b_grid_level grid_level_50px">
			<div class="b_grid_unit-1-6">
				<span class="ff_helvetica-neue-light color_black fs_36px"><?=$arResult['NAME']?></span>
			</div>
			<div class="b_grid_unit-7-12">
				<span class="ff_helvetica-neue-light color_black fs_14px"><?=strip_tags($arResult['DESCRIPTION'])?></span>
			</div>
			<? if(!empty($arResult['UF_BONUS'])): ?>
			<div class="b_grid_unit-1-4">
				<span class="ff_helvetica-neue-light color_black fs_14px">При покупке <?=$arResult['NAME']?> в магазине Up House Вы получаете:</span>
				<div class="margin-top_15px fs_14px clearfix">
					<? foreach($arResult['UF_BONUS'] as $bonus): ?>
					<div class="b_tooltip-block">
						<i class="b_glyph glyph-<?=$arResult['BONUS'][$bonus]['XML_ID']?>"></i>
						<div class="b_tooltip-block_tooltip">
							<?=$arResult['BONUS'][$bonus]['VALUE']?>
						</div>
					</div>
					<? endforeach ?>
				</div>
			</div>
			<? endif ?>
		</div>
	</div>
</div>
<div class="content">
	<div class="b_grid margin-bottom_20px margin-top_30px ff_helvetica-neue-light fs_14px ws_20px">
<?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "smartFilter", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "5",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"FILTER_NAME" => "arrFilter",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"SAVE_IN_SESSION" => "N",
	"INSTANT_RELOAD" => "N",
	"PRICE_CODE" => array(
	)
	),
	false
);?>
		<? if($arParams["DISPLAY_TOP_PAGER"]):?>
		<div class="b_grid_unit-5-12 ta_right">
			<div class="display_inline-block ws_10px">
				<?=$arResult["NAV_STRING"]?><br />
			</div>
		</div>
		<? endif;?>
	</div>
	<div class="b_line"></div>
	<div class="b_grid">
		<div class="b_grid_level grid_level_50px">
		<? foreach($arResult['ITEMS'] as $arItem): ?>
			<div class="b_grid_unit-1-4">
				<div class="b_catalog-item">
					<div class="b_catalog-item_image-container">
						<? if(is_array($arItem['PREVIEW_PICTURE'])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="b_catalog-item_image" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['NAME']?>"></a>
						<? endif ?>
					</div>
					<div class="b_catalog-item_text ff_helvetica-neue-light color_007eb4 fs_24px margin-top_10px"><a class="link_007eb4" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem['NAME']?></a></div>
					<div class="b_catalog-item_price ff_helvetica-neue-light color_79b70d fs_24px margin-top_30px"><?=$arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?>&nbsp;</div>
					<? if($arItem['CAN_BUY']):?>
					<div class="margin-top_10px ff_helvetica-neue-light fs_14px">
						<a class="b_button button_green" href="<?=$arItem['ADD_URL']?>"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
						<a class="b_button button_grey" href="#"><i class="b_glyph glyph_dollar"></i> В кредит</a>
					</div>
					<? else: ?>
					<div class="margin-top_10px ff_helvetica-neue-light fs_14px" style="height:30px">
						( Нет в наличии )
					</div>
					<? endif ?>
				</div>
			</div>
		<? endforeach ?>
		</div>
	</div>
	

					<div class="b_line"></div>
					<div class="b_grid">
						<div class="b_grid_level grid_level_30px ff_helvetica-neue-light">
							<div class="b_grid_unit-3-5">
								<a class="link_007eb4 scroll-top" href="#">Поднять наверх</a>
							</div>
							<? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
							<div class="b_grid_unit-2-5">
								<div class="display_inline-block ws_10px">
									<?=$arResult["NAV_STRING"]?><br />
								</div>
							</div>
							<? endif;?>					
						</div>
					</div>
					<div class="b_line line_thick"></div>
					<div class="b_grid">
						<div class="b_grid_level grid_level_50px ff_helvetica-neue-roman fs_12px">
							<div class="b_grid_unit-1-2">
								<div class="margin-left-right_5px">
									На официальном сайте компании так и значится - iPad with retina display, что отличает новый планшет от своих предшественников iPad Mini и iPad 2, которые не имеют такой уникальный дисплей. Недавно компания Apple презентовала iPad 4 и iPad Mini. Обновленный гаджет придется по душе всем ценителям качественной и стильной компьютерной техники, которые любят шагать в ногу со временем. Продажа iPad 4 начнется уже в ближайшее время, и каждый сможет воочию оценить все прелести новой модели. Выбрать планшетник уже можно сейчас, воспользовавшись различной информацией и обзорами, представленными в сети Интернет.
								</div>
							</div>
							<div class="b_grid_unit-1-4">
								<div class="margin-left-right_5px">
									Цены на Айпад 4 по прогнозам не будут существенно отличаться от предыдущих предшественников. Поэтому купить iPad 4 не составит огромных проблем, однако перед тем как заказать iPad retina display, специалисты рекомендуют прочесть отзывы, которые помогут сделать правильный выбор и получить хорошие эмоции от покупки.
								</div>							
							</div>
							<div class="b_grid_unit-1-8">
							</div>
							<div class="b_grid_unit-1-8">
								<div class="margin-left-right_5px">
									<h4 class="margin-bottom_20px fs_18px color_black">Обзоры</h4>
									<a class="link_007eb4 display_block" href="#">iPad 2</a>
									<a class="link_007eb4 display_block" href="#">iPad 3</a>
									<a class="link_007eb4 display_block" href="#">iPad 4</a>
									<a class="link_007eb4 display_block" href="#">iPad Mini</a>
								</div>
							</div>
						</div>
					</div>
	
</div>