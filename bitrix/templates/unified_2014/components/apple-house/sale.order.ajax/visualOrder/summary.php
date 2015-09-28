<? /*
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// result modifier
$arBasketKeys = array(); // массив в котором id товара вязывается с ключом
foreach($arResult["BASKET_ITEMS"] as $key => $arBasketItems) {
	$arBasketKeys[$arBasketItems['ID']] = $key;
}
?>
<div class="b_grid_level grid_level_15px">
	<div class="b_grid_unit-3-5">
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-1">
				<span class="fs_24px"><?=GetMessage("SOA_TEMPL_SUM_TITLE")?></span>										
			</div>
		</div>
		<div class="b_line"></div>
	<?
	foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
	{
		?>
		<?
		$credit = false;
		foreach($arBasketItems['PROPS'] as $prop) {
			if($prop['CODE'] == 'OPTION_GROUP')
				continue 2;
			if($prop['CODE'] == 'Credit')
				if($prop['VALUE'] == 'Да')
					$credit = true;
		}
		?>
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-3-5"><?=$arBasketItems["NAME"]?><? if($credit):?> <span class="fs_12px">(в кредит)</span><? endif?></div>
			<div class="b_grid_unit-1-5 ta_right"><?=$arBasketItems["QUANTITY"]?></div>
			<div class="b_grid_unit-1-5 ta_right"><span class="color_79b70d"><?=$arBasketItems["PRICE_FORMATED"]?></span></div>
			<? foreach($arBasketItems['PROPS'] as $prop): ?>
				<? if($prop['CODE'] == 'OPTIONS'): ?>
					<? $itemKey = $arBasketKeys[$prop['VALUE']] ?>
					<? if(!empty($arResult["BASKET_ITEMS"][$itemKey])): ?>
					<div style="clear:left;"></div>
					<div class="b_grid">
						<div class="b_grid_unit-3-5">
							<div class="fs_13px order_summary_option">&mdash;&nbsp;&nbsp;<?=$arResult["BASKET_ITEMS"][$itemKey]['NAME']?></div>
						</div>
						<div class="b_grid_unit-1-5 ta_right"></div>
						<div class="b_grid_unit-1-5 ta_right">
							<span class="fs_13px color_79b70d"><? if($arResult["BASKET_ITEMS"][$itemKey]['PRICE'] > 0) echo $arResult["BASKET_ITEMS"][$itemKey]["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
						</div>
					</div>
					<? endif ?>
				<? endif ?>
			<? endforeach ?>
		</div>
		<div class="b_line"></div>
		<?
	}
	?>							
	</div>
	<div class="b_grid_unit-2-5">
		<div class="b_grid_level grid_level_15px">
			<div class="b_grid_unit-1-12">
			</div>
			<div class="b_grid_unit-11-12">
				<span class="fs_24px"><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></span>
				<div class="margin-top_15px">
					<textarea class="b_textarea textarea_height_150px textarea_width_300px"name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
				</div>
			</div>
		</div>							
	</div>							
</div>
<div class="b_grid_level grid_level_15px">
	<div class="b_grid_unit-1-5">
		<a class="b_button-buy button-buy_order-2" onClick="submitForm('Y'); return false;" href="#"></a>
	</div>
	<div class="b_grid_unit-1-5">
	</div>
	<div class="b_grid_unit-3-5">
			<div class="b_order-total order-total_width_300px">
				<div class="b_grid">
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">
							<?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?>
						</div>
						<div class="b_grid_unit-1-2">
							<span class="color_79b70d"><?=$arResult["ORDER_PRICE_FORMATED"]?></span>
						</div>												
					</div>
					<?
					if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
					{
						?>
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">
							<?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?>
						</div>
						<div class="b_grid_unit-1-2">
							<span class="color_79b70d"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></span>
						</div>												
					</div>
						<?
					}
					?>
					<?
					if (doubleval($arResult["PAYMENT_PRICE"]) > 0)
					{
						?>
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">Комиссия платежной системы</div>
						<div class="b_grid_unit-1-2">
							<span class="color_79b70d"><?=$arResult["PAYMENT_PRICE_FORMATED"]?></span>
						</div>												
					</div>
						<?
					}
					?>
					<div class="b_grid_level b_grid_level_15px">
						<div class="b_grid_unit-1-2">
							<span class="color_black fs_18px"><?=GetMessage("SOA_TEMPL_SUM_IT")?></span>
						</div>
						<div class="b_grid_unit-1-2">
							<span class="color_black fs_24px"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></span>
						</div>												
					</div>
				</div>
			</div>
	</div>							
</div>
*/ ?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// result modifier
$arBasketKeys = array(); // массив в котором id товара вязывается с ключом
foreach($arResult["BASKET_ITEMS"] as $key => $arBasketItems) {
    $arBasketKeys[$arBasketItems['ID']] = $key;
}
?>

<div class="row">
    <div class="col-xs-6">
        <div class="composition-order">
            <h3 class="entry-title-3"><?=GetMessage("SOA_TEMPL_SUM_TITLE")?></h3>
            <table class="table-cart">
                <?
                foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
                {
                    ?>
                    <?
                    $credit = false;
                    foreach($arBasketItems['PROPS'] as $prop) {
                        if($prop['CODE'] == 'OPTION_GROUP')
                            continue 2;
                        if($prop['CODE'] == 'Credit')
                            if($prop['VALUE'] == 'Да')
                                $credit = true;
                    }
                    ?>
                    <tr class="table-row-product">
                        <td class="table-cart-chill table-cart-product-title">
                            <div class="cart-product-title">
                                <a href="#" class="cart-product-title-link">
                                    <?=$arBasketItems["NAME"]?><? if($credit):?> <span class="fs_12px">(в кредит)</span><? endif?>
                                </a>
                            </div>
                        </td>
                        <td class="table-cart-chill table-cart-product-select">
                            <div class="cart-product-select-num"><?=$arBasketItems["QUANTITY"]?> </div>
                        </td>
                        <td class="table-cart-chill table-cart-product-price">
                            <div class="cart-product-price-num">
                                <?=PriceDigitExtractor($arBasketItems["PRICE_FORMATED"])?> <span class="cart-product-price-cy">руб.</span>
                            </div>
                        </td>
                        <? foreach($arBasketItems['PROPS'] as $prop): ?>
                            <? if($prop['CODE'] == 'OPTIONS'): ?>
                                <? $itemKey = $arBasketKeys[$prop['VALUE']] ?>
                                <? if(!empty($arResult["BASKET_ITEMS"][$itemKey])): ?>
                                    <td>
                                        <div style="clear:left;"></div>
                                        <div class="b_grid">
                                            <div class="b_grid_unit-3-5">
                                                <div class="fs_13px order_summary_option">&mdash;&nbsp;&nbsp;<?=$arResult["BASKET_ITEMS"][$itemKey]['NAME']?></div>
                                            </div>
                                            <div class="b_grid_unit-1-5 ta_right"></div>
                                            <div class="b_grid_unit-1-5 ta_right">
                                                <span class="fs_13px color_79b70d"><? if($arResult["BASKET_ITEMS"][$itemKey]['PRICE'] > 0) echo $arResult["BASKET_ITEMS"][$itemKey]["PRICE_FORMATED"]; else echo 'Бесплатно';?></span>
                                            </div>
                                        </div>
                                    </td>
                                <? endif ?>
                            <? endif ?>
                        <? endforeach ?>
                    </tr>
                <?
                }
                ?>
            </table>
        </div>
    </div>


    <!-- комментарии к заказу -->
    <div class="col-xs-6">
        <div class="comments-order">
            <h3 class="entry-title-3"><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></h3>
            <textarea class="form-textarea b_textarea textarea_height_150px textarea_width_300px" name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION" placeholder="оставьте Ваш комментарий в этом окне"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
        </div>
    </div>
    <!-- /комментарии к заказу -->

</div>
<div class="row">

    <!-- итого -->
    <div class="cart-total ordering mt-5 clearfix">
        <div class="cart-total-section">
            <a href="#" class="button-bg cart-total-button b_button-buy button-buy_order-2" onClick="submitForm('Y'); return false;" >Заказать</a>
        </div>

        <div class="cart-total-section-1">
            <div class="cart-total-content-2">
                <span class="cart-total-text-2"><?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?></span> <span class="cart-total-num-2"><?=$arResult["ORDER_PRICE_FORMATED"]?></span><br />
                <? if (doubleval($arResult["DELIVERY_PRICE"]) > 0) {  ?>
                    <span class="cart-total-text-2"><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></span> <span class="cart-total-num-2"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></span>
                <? } ?>
                <? if (doubleval($arResult["PAYMENT_PRICE"]) > 0) {  ?>
                    <span class="cart-total-text-2">Комиссия платежной системы</span> <span class="cart-total-num-2"><?=$arResult["PAYMENT_PRICE_FORMATED"]?></span>
                <? } ?>
            </div>
        </div>

        <div class="cart-total-section-2">
            <div class="cart-total-content">
                <span class="cart-total-text"><?=GetMessage("SOA_TEMPL_SUM_IT")?></span>
                <span class="cart-total-num"><?=PriceDigitExtractor($arResult["ORDER_TOTAL_PRICE_FORMATED"])?></span>
                <span class="cart-total-cy">руб.</span>
            </div>
        </div>
    </div>
    <!-- /итого -->
</div>
