<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b_grey-box">
	<div class="b_grid">
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-5-8">
				<div class="padding-right_10px">
					<span class="ff_helvetica-neue-light color_black fs_24px"><?=$arResult['NAME']?></span>
				</div>
				<div class="padding-right_10px margin-top_5px">
					<span class="ff_helvetica-neue-light color_black fs_14px"><?=htmlspecialchars_decode($arResult['DESCRIPTION_1'])?></span>
				</div>
			</div>
			<div class="b_grid_unit-3-8">
				<div style="margin-top:-30px;">
					<div class="padding-left_10px">
					<? if(!empty($arResult['SECTION_LINKS'])) {?>
					<div class="color_aaa text-align_justify margin-bottom_10px">
					<?
						//$totalLinks = count($arResult['SECTION_LINKS'])-1;
						foreach($arResult['SECTION_LINKS'] as $key => $sectionLink) {
							if($sectionLink['UF_ACTIVE']) {
								echo '<a class="ff_helvetica-neue-light link_007eb4" href="/' . $sectionLink['CODE'] . '">' . $sectionLink['NAME'] . '</a>';
								if($key < $arResult['SECTION_LINKS_COUNT'])
									echo ' • ';
							}
						}?>
					</div>
					<?
					}
					if(!empty($arResult['UF_BONUS'])): ?>
					<div>
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
		</div>
	</div>
	<? if(!empty($arResult['SECTION_FILTER']) && $USER->IsAdmin()):?>
	<div class="b_grid">
		<div class="b_grid_level margin-bottom_10px">
		<? foreach($arResult['SECTION_FILTER'] as $filterGroup):?>
			<? foreach($filterGroup as $filterElement): ?>
				<a class="ff_helvetica-neue-light link_007eb4" href="/">22</a> 
			<? endforeach ?>
		<? endforeach ?>
		</div>
	</div>
	<? endif ?>
</div>
<div class="content">
<?
/*
$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "smartFilter", array(
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
);
*/
?>
	<div class="b_grid margin-bottom_10px margin-top_20px">
	<? // if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
		<div class="b_grid_unit-1-2">
		<? if($arResult['RATING']):?>
			<div class="product_review" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
				<div class="fs_bold product_review_name" itemscope itemtype="http://data-vocabulary.org/Rating">Оценка <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span>: </div>
				<div class="product_review_rating"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $arResult['RATING_ROUND']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
			</div>
			Рейтинг <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> на основе <a class="link_007eb4" href="<?=$arResult['RATING_LINK']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> отзывов</a>
		<? endif ?>
		</div>
		<div class="b_grid_unit-1-2">
		<? if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
			<div class="ff_helvetica-neue-light fs_14px ws_20px ta_right">
					<div class="display_inline-block ws_10px">
						<?=$arResult["NAV_STRING"]?><br />
					</div>
			</div>
		<? endif ?>
		</div>
	<? // endif;?>
	</div>
		<div class="b_line"></div>

	<div class="b_grid margin-top_10px">
		<? 
			$itemCounter=0; 
			$arrayCount=count($arResult['ITEMS']);
		?>
		<?='<div class="b_grid_level grid_level_0px b_catalog-items-container">'?>
		<? foreach($arResult['ITEMS'] as $arItem): ?>
			<div class="b_grid_unit-1-4">
				<div class="b_catalog-item">
					<div class="b_catalog-item_image-container">
						<? if(is_array($arItem['PREVIEW_PICTURE'])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="b_catalog-item_image" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['NAME']?>"></a>
						<? endif ?>
					</div>
					<div class="b_catalog-item_text ff_helvetica-neue-light color_007eb4 fs_20px margin-top_10px"><a class="link_007eb4" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=str_replace(chr(160),chr(32),$arItem['NAME'])?></a></div>
					<? if(!empty($arResult['UF_SECTION_CHARS'])): ?>
					<div class="b_catalog-item_chars ff_helvetica-neue-light fs_14px margin-top_10px">
						<ul>
							<? if($arResult['HAS_MODEL']):?>
								<li class="fs_13px padding-bottom-top_1px"><span>Модель:</span> <?=$arResult['UF_MODEL']?></li>
							<? endif ?>
							<? $count = 0 ?>
							<? foreach($arResult['UF_SECTION_CHARS'] as $sectionChar): ?>
								<? if($arItem['PROPERTIES'][$sectionChar]['VALUE']): ?>
								<li class="fs_13px padding-bottom-top_1px"><span><?=$arItem['PROPERTIES'][$sectionChar]['NAME']?>:</span> <?=$arItem['PROPERTIES'][$sectionChar]['VALUE']?></li>
								<?
								$count++;
								endif;
								if($count > 2)
									break;
								?>
							<? endforeach ?>
							<? if($arItem['CAN_BUY']):?><li class="fs_13px padding-bottom-top_1px">Есть в наличии</li><? endif; ?>
						</ul>
					</div>
					<? endif ?>
					<div class="b_catalog-item_price ff_helvetica-neue-light color_79b70d fs_20px margin-top_10px"><?
					if($arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']>0): ?>
					<span>Цена:</span> <?=$arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?>
					<? else: ?>
					&nbsp;
					<? endif ?>
					</div>
					<? if($arItem['CAN_BUY']):?>
					<div class="margin-top_10px ff_helvetica-neue-light fs_14px">
						<a class="b_button button_green" href="<?=$arItem['ADD_URL']?>"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
						<a class="b_button button_grey" href="<?=$arItem['ADD_URL']?>&Credit=Y"><i class="b_glyph glyph_dollar"></i> В кредит</a>
					</div>
					<? else: ?>
					<div class="margin-top_10px ff_helvetica-neue-light fs_14px" style="height:30px">
						<img src='/bitrix/images/catalog/waiting.png'>
					</div>
					<? endif ?>
				</div>
			</div>
			<? 
				$itemCounter++;
				if($itemCounter%4==0 and $itemCounter!=$arrayCount){
					echo('</div><div class="b_grid_level grid_level_10px b_catalog-items-container">');
				}
			?>			
		<? endforeach ?>
		<?='</div>'?>
	</div>
	

					<div class="b_grid">
						<div class="b_grid_level grid_level_10px ff_helvetica-neue-light">
							<div class="b_grid_unit-3-5">
								<a class="link_007eb4 scroll-top" href="#">Поднять наверх</a>
							</div>
							<? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
							<div class="b_grid_unit-2-5 ta_right">
								<div class="display_inline-block ws_10px">
									<?=$arResult["NAV_STRING"]?><br />
								</div>
							</div>
							<? endif;?>					
						</div>
					</div>
					<? if($arResult['DESCRIPTION_2']):?>
					<div class="b_line"></div>
					<div class="b_grid">
						<div class="b_grid_level grid_level_15px ff_helvetica-neue-roman fs_12px">
							<div class="b_grid_unit">
								<div class="margin-left-right_5px">
									<?=$arResult['DESCRIPTION_2']?>
								</div>							
							</div>
						</div>
					</div>
					<? endif ?> 
					<? if($arResult['SEO_TEXT'] && empty($arResult['DESCRIPTION_2'])):?>
					<div class="b_line"></div>
					<div class="b_grid">
						<div class="b_grid_level grid_level_15px ff_helvetica-neue-roman fs_12px">
						<?=$arResult['SEO_TEXT']?>
						</div>
					</div>
					<? endif ?>
	
</div>