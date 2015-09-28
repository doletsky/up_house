<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript">
$(document).ready(function() {
	var addLink = '<?=str_replace('&amp;', '&', $arResult['ADD_URL'])?>';
	var elementPrice = <?=$arResult['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']?>;
	/*
	var services = [];
	<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
	services[<?=$serviceSection['ID']?>] = [];
	services[<?=$serviceSection['ID']?>]['id'] = 0;
	services[<?=$serviceSection['ID']?>]['price'] = 0;
	<? endforeach ?>
	var serviceList = [<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $key => $serviceSection): ?><?=$serviceSection['ID']?><? if(($key + 1) < count($arResult['SERVICE_LIST']['SECTIONS'])):?>,<? endif ?><? endforeach ?>];
	*/
	
	$('.product_options').change(function(e) {
		var add = addLink;
		var price = elementPrice;
		$('.product_options').each(function() {
			var option = $('option:selected',$(this));
			var optionID = option.val();
			
			if(optionID > 0) {
				var optionPrice = option.attr('data-price');
				add += '&option[]=' + optionID;
				price += parseInt(optionPrice);
			}
		});
		price = price.toString();
		$('#addElementLink').attr('href', add);
		$('#addElementCreditLink').attr('href', add + '&Credit=Y');
		$('#elementPrice').text(formatPrice(price) + ' руб.');
	});
	
	function formatPrice(price) {
		var newPrice = '';
		var y = 0;
		for(var i = price.length-1; i >= 0; i--) {
			if(y%3 == 0)
				newPrice = ' ' + newPrice;
			newPrice = price[i] + newPrice;
			y++;
		}
		return newPrice;
	}
});
</script>
<style>
.b_goods-features-table { border-collapse:collapse; width:100%; }
.b_goods-features-table td, .b_goods-features-table th { padding:3px 0; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa }
	.b_goods-features-table th { background:#efefef; text-align:left; padding-left:8px; }
</style>
			<div class="b_grid_unit-3-4">
				<span class="fs_36px"><?=$arResult['NAME']?></span>
			</div>
			<div class="b_grid_unit-1-4 ta_right fs_10px">
<? $APPLICATION->IncludeComponent(
	"bitrix:asd.share.buttons",
	"shareProduct",
	Array(
		"ASD_ID" => $arResult['ID'],
		"ASD_TITLE" => $arResult['NAME'],
		"ASD_URL" => '/detail/?ELEMENT_ID=' . $arResult['ID'],
		"ASD_PICTURE" => $arResult['DETAIL_PICTURE']['SRC'],
		"ASD_TEXT" => $arResult['PREVIEW_TEXT'],
		"ASD_LINK_TITLE" => "Расшарить в #SERVICE#",
		"ASD_SITE_NAME" => "",
		"ASD_INCLUDE_SCRIPTS" => ""
	),
false
);?>
			</div>							
		</div>
		<div class="b_grid_level grid_level_15px ff_helvetica-neue-light">
			<div class="b_grid_unit-1-2 ta_center">
			<? if(is_array($arResult['DETAIL_PICTURE'])):?>
				<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" width="<?=$arResult['DETAIL_PICTURE']['WIDTH']?>" height="<?=$arResult['DETAIL_PICTURE']['HEIGHT']?>" alt="<?=$arResult['NAME']?>">
			<? endif ?>
			</div>
			<div class="b_grid_unit-1-2">
				<div class="b_grid_level">
					<div class="b_grid_unit-1">
						<? if($arResult['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']):?>
						<span class="color_79b70d fs_36px" id="elementPrice"><?=$arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?></span>
						<? elseif($arResult['PRICES']['Продажа']['VALUE_VAT']):?>
						<span class="color_79b70d fs_36px" id="elementPrice"><?=$arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?></span>
						<? endif ?>
						<div class="margin-top_10px">
						<? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
							<? if(!empty($optionGroup["ITEMS"])): ?>
							<div class="margin-bottom_5px">
								<span class="color_black fs_14px"><?=$optionGroup['NAME']?>:</span>
								<div class="b_select-styled">
									<select data-group="<?=$optionGroup['ID']?>" class="b_select-styled_select product_options">
										<option value="0" data-price="0" class="b_select-styled_option">Не требуется</option>
										<? foreach($optionGroup["ITEMS"] as $option): ?>
										<option value="<?=$option['ID']?>" data-price="<?=round($option['CATALOG_PRICE_1'])?>" class="b_select-styled_option"><?=$option['NAME']?></option>
										<? endforeach ?>
									</select>
								</div>
							</div>
							<? endif ?>
						<? endforeach ?>
						<? /*
						<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
							<div class="margin-top_5px">
								<span class="color_black fs_14px"><?=$serviceSection['NAME']?>:</span>
								<div class="b_select-styled">
									<select data-service="<?=$serviceSection['ID']?>" class="b_select-styled_select additional_service">
										<option value="0" data-price="0" class="b_select-styled_option">Не требуется</option>
										<? foreach($arResult['SERVICE_LIST']['SERVICES'][$serviceSection['ID']] as $service): ?>
										<option value="<?=$service['ID']?>" data-price="<?=round($service['CATALOG_PRICE_1'])?>" class="b_select-styled_option"><?=$service['PROPERTY_LIST_NAME_VALUE']?></option>
										<? endforeach ?>
									</select>
								</div>
							</div>
						<? endforeach ?>
						*/ ?>
						</div>
					<!--</div>
					<div class="b_grid_unit-1-3 ta_right fs_10px">-->
						<? if($arResult['CAN_BUY']):?>
						<a class="b_button-buy button-buy_buy no-style-link" id="addElementLink" href="<?=$arResult['ADD_URL']?>"></a>
						<a class="b_button-buy button-buy_buy-credit no-style-link" id="addElementCreditLink" href="<?=$arResult['ADD_URL']?>&credit=Y"></a>
						<a class="b_button-buy button-buy_buy-one-click no-style-link" id="oneClickBuyLink" data-buyid="<?=$arResult["ID"]?>" href="<?=$arResult['ADD_URL']?>"></a>
						<? endif ?>
						<div class="ff_helvetica-neue-bold ta_center margin-top_10px">
							<? /*if($arResult['CAN_BUY']):?>
							<span class="color_79b70d fs_14px">Есть в наличии</span>
							<? else: ?>
							<span class="color_79b70d fs_14px">Нет в наличии</span>
							<? endif */?>
						</div>
					</div>
				</div>
				<? if(!empty($arResult['SECTION']['INFO']['UF_BONUS'])): ?>
				<div class="b_grid_level">
					<span class="color_black fs_14px">При покупке <?=$arResult['SECTION']['NAME']?> в магазине<br> Up-House Вы получаете:</span>
				</div>
				<div class="b_grid_level grid_level_10px fs_14px">
					<div class="b_grid_unit-11-24">
					<? foreach($arResult['SECTION']['INFO']['UF_BONUS'] as $key => $bonus): ?>
						<div class="b_glyphed-block glyphed-block_<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?>"><?=$arResult['SECTION']['BONUS'][$bonus]['VALUE']?></div>
						<? if($key == 2): ?>
					</div>
					<div class="b_grid_unit-1-12">
					</div>
					<div class="b_grid_unit-11-24">
						<? endif ?>
					<? endforeach ?>
					</div>									
				</div>
				<? endif ?>
				<div class="b_grid_level lh_1-7"><?=$arResult['PREVIEW_TEXT']?></div>
            </div>
		</div>
	</div>
<div class="b_grid">
	<div class="b_grid_unit-7-24 b_grid_unit-right">
		<? if(!empty($arResult['COLOR_ADDITIONAL'])): ?>
		<div class="b_tabs_header">В другом цвете</div>
		<div class="background_f3 padding_10px margin-bottom_10px">
			<div class="b_grid_level lh_1-7">
				<div class="overflow_hidden padding-top_10px">
					<div class="b_grid_level">
						<div class="padding-left_10px">
							<a href="/<?=$arResult['COLOR_ADDITIONAL']['PROPERTY_CML2_CODE_VALUE']?>"><img src="<?=$arResult['COLOR_ADDITIONAL']['PREVIEW_PICTURE']['SRC']?>" width="<?=$arResult['COLOR_ADDITIONAL']['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arResult['COLOR_ADDITIONAL']['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arResult['COLOR_ADDITIONAL']['NAME']?>"></a></div>
						</div>
					<div class="b_grid_level">
						<div class="margin-top_10px padding-left-right_10px">
							<div class="fs_16px lh_1-4"><a class="link_007eb4" href="/<?=$arResult['COLOR_ADDITIONAL']['PROPERTY_CML2_CODE_VALUE']?>"><?=$arResult['COLOR_ADDITIONAL']['NAME']?></a></div>
							<div class="margin-top_20px color_79b70d fs_16px"><?=$arResult['COLOR_ADDITIONAL']['PRICE']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<? endif ?>
		<? if(!empty($arResult['SIMILAR'])): ?>
		<div class="b_tabs_header">Похожие товары</div>
		<div class="background_f3 padding_10px">
			<div class="b_grid_level lh_1-7">
				<div class="padding-bottom-top_5px">
					<ul class="padding-left_15px">
					<? foreach($arResult['SIMILAR'] as $similar): ?>
						<li class="similar_links"><a class="link_007eb4" href="<?=$similar['PROPERTY_CML2_CODE_VALUE']?>"><?=$similar['NAME']?></a></li>
					<? endforeach ?>
					</ul>
				</div>
			</div>
		</div>
		<? endif ?>
	</div>
	<div class="b_grid_unit-17-24 b_grid_unit-right">
	<div class="b_tabs">
		<ul class="b_tabs_menu">
			<li class="b_tabs_menu-item">
				<a class="b_tabs_link" href="#features">
					Характеристики
				</a>
			</li>
			<? if($arResult['DETAIL_TEXT']): ?>
			<li class="b_tabs_menu-item">
				<a class="b_tabs_link" href="#model-description">
					Описание модели
				</a>
			</li>
			<? endif ?>
			<li class="b_tabs_menu-item">
				<a class="b_tabs_link" href="#video-overview">
					Видео обзор
				</a>
			</li>
			<li class="b_tabs_menu-item">
				<a class="b_tabs_link" href="#reviews">
					Отзывы
				</a>
			</li>							
		</ul>
		<div class="b_tabs_contents-container">
			<div class="b_tabs_content" id="features">
				<div class="b_grid">
					<div class="b_grid_unit-11-24">
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['OVERALL'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Общие характеристики</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['OVERALL'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>
						<? endif ?>
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Мультимедийные возможности</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>
						<? endif ?>
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['CONNECT'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Связь</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['CONNECT'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>
						<? endif ?>
					</div>
					<div class="b_grid_unit-1-24"></div>
					<div class="b_grid_unit-11-24">
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Память и процессор</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>
						<? endif ?>
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['STORAGE'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Накопители</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['STORAGE'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>
						<? endif ?>
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['AUDIO'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Аудио</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['AUDIO'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>
						<? endif ?>
						<? if(!empty($arResult["PROP_GROUP_DISPLAY"]['POWER'])): ?>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<th class="b_goods-features-table_col" colspan=2>Питание</th>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? foreach($arResult["PROP_GROUP_DISPLAY"]['POWER'] as $prop): ?>
									<tr class="b_goods-features-table_row">
										<td class="b_goods-features-table_col"><?=$prop['NAME']?></td><td class="b_goods-features-table_col"><?=$prop['VALUE']?></td>
									</tr>
								<? endforeach ?>
							</tbody>
						</table>	
						<? endif ?>									
					</div>	
					<div class="b_grid_unit-1-24"></div>							
				</div>
			</div>
			<? if($arResult['DETAIL_TEXT']): ?>
			<div class="b_tabs_content" id="model-description">
				<div class="b_grid margin-top_20px">
				<?=$arResult['DETAIL_TEXT']?>						
				</div>
			</div>
			<? endif ?>
			<div class="b_tabs_content" id="video-overview">
				<div class="margin-top_20px">
				<?=htmlspecialchars_decode($arResult['SECTION']['INFO']['UF_VIDEOOBZOR'])?>
				</div>
			</div>
