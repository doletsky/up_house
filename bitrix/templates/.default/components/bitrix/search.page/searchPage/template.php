<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
					<h1 class="fs_36px margin-top_20px">Результаты поиска</h1>
	<form action="" method="get">
		<input type="hidden" name="tags" value="<?echo $arResult["REQUEST"]["TAGS"]?>" />
		<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
<div class="margin-top_30px">
	<a class="no-style-link" href="#"><i class="b_glyph glyph_search"></i></a>
					<?if($arParams["USE_SUGGEST"] === "Y"):
						if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
						{
							$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
							$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
							$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
						}
						?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:search.suggest.input",
							"",
							array(
								"NAME" => "q",
								"VALUE" => $arResult["REQUEST"]["~QUERY"],
								"INPUT_SIZE" => -1,
								"DROPDOWN_SIZE" => 10,
								"FILTER_MD5" => $arResult["FILTER_MD5"],
							),
							$component, array("HIDE_ICONS" => "Y")
						);?>
					<?else:?>
						<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" class="search-query b_input-text input-text_width_700px b_input-text_glyph" placeholder="Поиск товара">
					<?endif;?>
</div>
	</form>
<? if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):?>
<div class="margin-top_15px fs_18px color_253487">
	<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
</div>
<? endif ?>
<? if(count($arResult["SEARCH"])>0): ?>
<div class="margin-top_15px">
	Найдено <span class="ff_helvetica-neue-bold"><?echo $arResult["NAV_RESULT"]->SelectedRowsCount()?></span> совпадений по запросу <span class="ff_helvetica-neue-bold"><?=$arResult["REQUEST"]["QUERY"]?></span>
</div>
<? endif ?>
<div class="b_grid margin-bottom_10px margin-top_10px ff_helvetica-neue-light fs_14px ws_20px">
	<div class="b_grid margin-bottom_10px margin-top_10px ff_helvetica-neue-light fs_14px ws_20px">
		<div class="b_grid_unit-7-12">
			<div class="display_inline-block ws_10px">
				<span class="ws_normal">Сортировать по цене:</span>
				<a class="link_007eb4 underline_dotted ws_normal" href="#">Дорогие</a>
				<a class="link_007eb4 underline_dotted ws_normal" href="#">Дешевые</a>
			</div>
			<div class="display_inline-block ws_10px">
				<a class="link_007eb4 ws_normal" href="#">Показать все</a>
			</div>
		</div>
		<div class="b_grid_unit-5-12 ta_right">
			<div class="display_inline-block ws_10px">
				<?=$arResult["NAV_STRING"]?>
			</div>
		</div>
	</div>
</div>
<div class="b_line"></div>

<div class="b_grid">
	<? if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
	<? elseif($arResult["ERROR_CODE"]!=0):?>
		<p><?=GetMessage("CT_BSP_ERROR")?></p>
		<?ShowError($arResult["ERROR_TEXT"]);?>
		<p><?=GetMessage("CT_BSP_CORRECT_AND_CONTINUE")?></p>
		<br /><br />
		<p><?=GetMessage("CT_BSP_SINTAX")?><br /><b><?=GetMessage("CT_BSP_LOGIC")?></b></p>
		<table border="0" cellpadding="5">
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OPERATOR")?></td><td valign="top"><?=GetMessage("CT_BSP_SYNONIM")?></td>
				<td><?=GetMessage("CT_BSP_DESCRIPTION")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_AND")?></td><td valign="top">and, &amp;, +</td>
				<td><?=GetMessage("CT_BSP_AND_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OR")?></td><td valign="top">or, |</td>
				<td><?=GetMessage("CT_BSP_OR_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_NOT")?></td><td valign="top">not, ~</td>
				<td><?=GetMessage("CT_BSP_NOT_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top">( )</td>
				<td valign="top">&nbsp;</td>
				<td><?=GetMessage("CT_BSP_BRACKETS_ALT")?></td>
			</tr>
		</table>
	<? elseif(count($arResult["SEARCH"])>0):?>
		<div class="b_grid_level grid_level_50px b_catalog-items-container">
		<? foreach($arResult["SEARCH"] as $key => $arItem):?>
			<div class="b_grid_unit-1-4">
				<div class="b_catalog-item">
					<div class="b_catalog-item_image-container">
					<? if(is_array($arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PREVIEW_PICTURE'])): ?>
						<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img class="b_catalog-item_image" src="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['TITLE']?>"></a>
					<? endif ?>
					</div>
					<div class="b_catalog-item_text ff_helvetica-neue-light color_007eb4 fs_20px margin-top_10px"><a class="link_007eb4" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['TITLE']?></a></div>
					<div class="b_catalog-item_price ff_helvetica-neue-light color_79b70d fs_20px margin-top_30px"><?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE']?></div>
					<? if($arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['CAN_BUY']): ?>
					<div class="margin-top_10px ff_helvetica-neue-light fs_14px" style="height:30px;">
						<a class="b_button button_green" href="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['ADD_URL']?>"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
						<a class="b_button button_grey" href="#"><i class="b_glyph glyph_dollar"></i> В кредит</a>
					</div>
					<? else: ?>
					<div class="margin-top_10px ff_helvetica-neue-light fs_14px" style="height:30px;">
					( нет в наличии )
					</div>
					<? endif ?>
				</div>
			</div>
			<? if(($key+1)%4 == 0): ?>
		</div>
		<div class="b_grid_level grid_level_50px">
			<? endif ?>
		<? endforeach;?>
		</div>
	<? else:?>
		<?ShowNote(GetMessage("CT_BSP_NOTHING_TO_FOUND"));?>
	<? endif;?>
</div>