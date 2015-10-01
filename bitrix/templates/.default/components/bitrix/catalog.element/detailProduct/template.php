<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript">
$(document).ready(function() {
	var addLink = '<?=str_replace('&amp;', '&', $arResult['ADD_URL'])?>';
	var elementPrice = <?=$arResult['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']?>;
	var services = [];
	<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
	services[<?=$serviceSection['ID']?>] = [];
	services[<?=$serviceSection['ID']?>]['id'] = 0;
	services[<?=$serviceSection['ID']?>]['price'] = 0;
	<? endforeach ?>
	var serviceList = [<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $key => $serviceSection): ?><?=$serviceSection['ID']?><? if(($key + 1) < count($arResult['SERVICE_LIST']['SECTIONS'])):?>,<? endif ?><? endforeach ?>];
	
	$('.additional_service').change(function(e) {
		var option = $('option:selected',$(this));
		var serviceID = option.val();
		var service = $(this).attr('data-service');
		var servicePrice = option.attr('data-price');
		services[service]['id'] = serviceID;
		services[service]['price'] = servicePrice;
		
		var add = addLink;
		var price = elementPrice;
		for(var i = 0; i < serviceList.length; i++) {
			if(services[serviceList[i]]['id'] > 0) {
				add += '&service[]=' + services[serviceList[i]]['id'];
				price += parseInt(services[serviceList[i]]['price']);
			}
		}
		price = price.toString();
		$('#addElementLink').attr('href', add);
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
			<div class="b_grid_unit-3-4">
				<span class="fs_36px"><?=$arResult['NAME']?></span>
			</div>
			<div class="b_grid_unit-1-4 ta_right fs_10px">
				<a class="b_social-button social-button_facebook" href="#">Facebook</a>
				<a class="b_social-button social-button_twitter" href="#">Twitter</a>
				<a class="b_social-button social-button_vkontakte" href="#">Vkontakte</a>
				<a class="b_social-button social-button_odnoklassniki" href="#">Odnoklassniki</a>
				<a class="b_social-button social-button_livejournal" href="#">Livejournal</a>

			</div>	
								
		</div>
		<div class="b_grid_level grid_level_15px ff_helvetica-neue-light">
			<div class="b_grid_unit-5-12 ta_center">
			<? if(is_array($arResult['DETAIL_PICTURE'])):?>
				<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" width="<?=$arResult['DETAIL_PICTURE']['WIDTH']?>" height="<?=$arResult['DETAIL_PICTURE']['HEIGHT']?>" alt="<?=$arResult['NAME']?>">
			<? endif ?>
			</div>
			<div class="b_grid_unit-7-12">
				<div class="b_grid_level">
					<div class="b_grid_unit-2-3">
						<? if($arResult['PRICES']['Продажа']['DISCOUNT_VALUE_VAT']):?>
						<span class="color_79b70d fs_36px" id="elementPrice"><?=$arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?></span>
						<? elseif($arResult['PRICES']['Продажа']['VALUE_VAT']):?>
						<span class="color_79b70d fs_36px" id="elementPrice"><?=$arResult['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']?></span>
						<? endif ?>
						<div class="margin-top_10px">
						<? if($USER->IsAdmin()):?>
							<script type="text/javascript">
							$(document).ready(function() {
								
							});
							</script>
							<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
								<div class="margin-top_5px">
									<span class="color_black fs_14px"><?=$serviceSection['NAME']?>:</span>
									<div class="b_select-styled">
									<? if(count($arResult['SERVICE_LIST']['SERVICES'][$serviceSection['ID']]) > 1): ?>
										<select data-service="<?=$serviceSection['ID']?>" class="b_select-styled_select additional_service">
											<option value="0" data-price="0" class="b_select-styled_option">Не требуется</option>
											<? foreach($arResult['SERVICE_LIST']['SERVICES'][$serviceSection['ID']] as $service): ?>
											<option value="<?=$service['ID']?>" data-price="<?=round($service['CATALOG_PRICE_1'])?>" class="b_select-styled_option"><?=$service['PROPERTY_LIST_NAME_VALUE']?></option>
											<? endforeach ?>
										</select>
									<? else: ?>
										<input type="checkbox">
									<? endif ?>
									</div>
								</div>
							<? endforeach ?>
						<? else: ?>
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
						<? endif ?>
						</div>
					</div>
					<div class="b_grid_unit-1-3 ta_right fs_10px">
						<? if($arResult['CAN_BUY']):?>
						<a class="b_button-buy button-buy_buy no-style-link" id="addElementLink" href="<?=$arResult['ADD_URL']?>"></a>
						<a class="b_button-buy button-buy_buy-credit no-style-link" href="<?=$arResult['ADD_URL']?>"></a>
						<a class="b_button-buy button-buy_buy-one-click no-style-link" id="oneClickBuyLink" data-buyid="<?=$arResult["ID"]?>" href="<?=$arResult['ADD_URL']?>"></a>
						<? endif ?>
						<div class="ff_helvetica-neue-bold ta_center margin-top_10px">
							<? if($arResult['CAN_BUY']):?>
							<span class="color_79b70d fs_14px">Есть в наличии</span>
							<? else: ?>
							<span class="color_79b70d fs_14px">Нет в наличии</span>
							<? endif ?>
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
<? /// Также покупают ?>
	<div class="b_tabs">
		<ul class="b_tabs_menu">
			<li class="b_tabs_menu-item">
				<a class="b_tabs_link" href="#model-description">
					Описание модели
				</a>
			</li>
			<li class="b_tabs_menu-item">
				<a class="b_tabs_link" href="#features">
					Характеристики
				</a>
			</li>
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
			<div class="b_tabs_content" id="model-description">
				<div class="b_grid">
				<?=$arResult['DETAIL_TEXT']?>						
				</div>
			</div>
			<div class="b_tabs_content" id="features">
				<div class="b_grid">
					<div class="b_grid_unit-1-2">
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col" colspan=2>Общие характеристики</td>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? if($arResult['PROPERTIES']['STANDART']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['STANDART']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['STANDART']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['OPERATSIONNAYA_SISTEMA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['OPERATSIONNAYA_SISTEMA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['OPERATSIONNAYA_SISTEMA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['TIP_KORPUSA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_KORPUSA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_KORPUSA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['MATERIAL_KORPUSA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['MATERIAL_KORPUSA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['MATERIAL_KORPUSA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['TIP_SIM_KARTY']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_SIM_KARTY']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_SIM_KARTY']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['VES']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VES']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VES']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['RAZMERY_SHXVXT']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['RAZMERY_SHXVXT']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['RAZMERY_SHXVXT']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['OBEM_PAMYATI']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['OBEM_PAMYATI']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['OBEM_PAMYATI']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['TSVET']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TSVET']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TSVET']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['TIP_EKRANA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_EKRANA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_EKRANA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['DIAGONAL']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['DIAGONAL']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['DIAGONAL']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['RAZRESHENIE_EKRANA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['RAZRESHENIE_EKRANA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['RAZRESHENIE_EKRANA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<tr class="b_goods-features-table_row">													
									<td class="b_goods-features-table_col"></td><td class="b_goods-features-table_col"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="b_grid_unit-1-2">
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col" colspan=2>Мультимедийные возможности</td>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? if($arResult['PROPERTIES']['FOTOKAMERA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['FOTOKAMERA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['FOTOKAMERA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['MAKS_RAZRESHENIE_VIDEO']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['MAKS_RAZRESHENIE_VIDEO']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['MAKS_RAZRESHENIE_VIDEO']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['FRONTALNAYA_KAMERA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['FRONTALNAYA_KAMERA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['FRONTALNAYA_KAMERA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['RAZEM_DLYA_NAUSHNIKOV']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['RAZEM_DLYA_NAUSHNIKOV']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['RAZEM_DLYA_NAUSHNIKOV']['VALUE']?></td>
								</tr>
								<? endif ?>
							</tbody>
						</table>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col" colspan=2>Связь</td>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? if($arResult['PROPERTIES']['INTERFEYSY']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['INTERFEYSY']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['INTERFEYSY']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['NAVIGATSIYA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['NAVIGATSIYA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['NAVIGATSIYA']['VALUE']?></td>
								</tr>
								<? endif ?>
							</tbody>
						</table>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col" colspan=2>Память и процессор</td>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? if($arResult['PROPERTIES']['PROTSESSOR']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['PROTSESSOR']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['PROTSESSOR']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['OBEM_OPERATIVNOY_PAMYATI']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['OBEM_OPERATIVNOY_PAMYATI']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['OBEM_OPERATIVNOY_PAMYATI']['VALUE']?></td>
								</tr>
								<? endif ?>
							</tbody>
						</table>
						<table class="b_goods-features-table">
							<thead class="b_goods-features-table_head">
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col" colspan=2>Питание</td>
								</tr>
							</thead>
							<tbody class="b_goods-features-table_body">
								<? if($arResult['PROPERTIES']['TIP_AKKUMULYATORA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_AKKUMULYATORA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['TIP_AKKUMULYATORA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['EMKOST_AKKUMULYATORA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['EMKOST_AKKUMULYATORA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['EMKOST_AKKUMULYATORA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['VREMYA_RAZGOVORA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VREMYA_RAZGOVORA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VREMYA_RAZGOVORA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['VREMYA_OZHIDANIYA']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VREMYA_OZHIDANIYA']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VREMYA_OZHIDANIYA']['VALUE']?></td>
								</tr>
								<? endif ?>
								<? if($arResult['PROPERTIES']['VREMYA_RABOTY_V_REZHIME_PROSLUSHIVANIYA_MUZYKI']['VALUE']):?>
								<tr class="b_goods-features-table_row">
									<td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VREMYA_RABOTY_V_REZHIME_PROSLUSHIVANIYA_MUZYKI']['NAME']?></td><td class="b_goods-features-table_col"><?=$arResult['PROPERTIES']['VREMYA_RABOTY_V_REZHIME_PROSLUSHIVANIYA_MUZYKIA']['VALUE']?></td>
								</tr>
								<? endif ?>
							</tbody>
						</table>										
					</div>									
				</div>
			</div>
			<div class="b_tabs_content" id="video-overview">
				<?=htmlspecialchars_decode($arResult['SECTION']['INFO']['UF_VIDEOOBZOR'])?>
			</div>
