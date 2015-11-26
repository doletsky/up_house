<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div class="payment-system">
        <h3 class="entry-title-3">платежная система</h3>
        <div class="input-row">

	<?// var_dump($arResult);
	if ($arResult["PAY_FROM_ACCOUNT"]=="Y")
	{
		?>
				<input type="hidden" name="PAY_CURRENT_ACCOUNT" value="N">

				<label for="PAY_CURRENT_ACCOUNT">
					<input type="checkbox" name="PAY_CURRENT_ACCOUNT" id="PAY_CURRENT_ACCOUNT" value="Y"<?if($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y") echo " checked=\"checked\"";?> onChange="submitForm()">

					<img src="/bitrix/components/bitrix/sale.order.ajax/templates/visual/images/logo-default-ps.gif" alt="" <?=($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")?"class=\"active\"":"";?> />
					<div class="desc">
						<div class="name"><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT")?></div>
						<div class="desc">
							<div><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT1")." <b>".$arResult["CURRENT_BUDGET_FORMATED"]?></b></div>
							<div><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT2")?></div>
						</div>
					</div>
				</label>

		<?
	}

//var_dump($arResult["PAY_SYSTEM"]);
	foreach($arResult["PAY_SYSTEM"] as $arPaySystem)
	{
		if(count($arResult["PAY_SYSTEM"]) == 1)
		{
			?>
			<div class="b_grid_level grid_level_15px">
				<div class="b_grid_unit-1">
					<div class="b_styled-radio">
						<input class="b_styled-radio_radio" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"<?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?>>
						<label class="input-helper input-helper--radio b_styled-radio_label" for="pay-type_beznalich">
                            <span class="product-delivery-img">
                                <i class="cash-icon product-sprite"></i>
                            </span>
                            <span class="product-delivery-content">
                                <span class="product-delivery-title"><?=$arPaySystem["NAME"];?></span>
                                <?
                                if (strlen($arPaySystem["DESCRIPTION"])>0)
                                {
                                    ?>
                                    <span class="product-delivery-text"><?=$arPaySystem["DESCRIPTION"]?></span>
                                <?
                                }
                                ?>
                            </span>

						</label>
					</div>
				</div>
			</div>
			<?	
		}
		elseif(
                ($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]] == '1317' && $arPaySystem["ID"] != '1')
             || ($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]] != '1317' && $arResult["USER_VALS"]["DELIVERY_LOCATION"] != '1317' && $arPaySystem["ID"] == '1'
                    && (($arResult["USER_VALS"]["DELIVERY_LOCATION"] == '1316' || $arResult["USER_VALS"]["DELIVERY_LOCATION"] == '670') && $_REQUEST['DELIVERY_ID'] != '12'))
             || ($arPaySystem["ID"] == '7')
             || ($arPaySystem["ID"] == '9')
            )
		{ //var_dump($arResult["USER_VALS"]["DELIVERY_LOCATION"]);
		?>
			<div class="b_grid_level grid_level_15px">
				<div class="b_grid_unit-1">
					<div class="b_styled-radio">
						<input class="b_styled-radio_radio" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" <?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?> onclick="submitForm();">
						<label class="input-helper input-helper--radio b_styled-radio_label" for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>">
                            <span class="product-delivery-img">
                                <i class="cash-icon product-sprite"></i>
                            </span>
                            <span class="product-delivery-content">
                                <span class="product-delivery-title"><?=$arPaySystem["NAME"];?></span>
					<?
					if (strlen($arPaySystem["DESCRIPTION"])>0)
					{
						?>
                            <? if ($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5'): ?>
                                <? if($arPaySystem["ID"] == '7'):?>
                                    <span class="product-delivery-text">Банковской картой VISA/Mastercard или другим способом (через систему PayU).</span>
                                <? else: ?>
                                    <span class="product-delivery-text">Оплата наличными на месте, после проверки оборудования</span>
                                <? endif;?>
                            <? else: ?>
							    <span class="product-delivery-text"><?=$arPaySystem["DESCRIPTION"]?></span>
                            <? endif;?>
						<?
					}
					?>
                            </span>
						</label>
					</div>
				</div>
			</div>
		<?
        }
        else
             if(
             ($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]] == '1317' && $arPaySystem["ID"] != '8')
          && ($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]] != '1317' && $arPaySystem["ID"] != '1')
          || ($arPaySystem["ID"] == '12')

        )
        {
            ?>
            <div class="b_grid_level grid_level_15px">
                <div class="b_grid_unit-1">
                    <div class="b_styled-radio">
                        <input class="b_styled-radio_radio" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" <?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?> onclick="submitForm();">
                        <label class="input-helper input-helper--radio b_styled-radio_label" for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>">
                            <span class="product-delivery-img">
                                <i class="cash-icon product-sprite"></i>
                            </span>
                            <span class="product-delivery-content">
                                <span class="product-delivery-title"><?=$arPaySystem["NAME"];?></span>
                                    <div class="product-delivery-text" style="width: 322px;"><?=$arPaySystem["DESCRIPTION"]?></div>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        <?}
	}
	?>
            <a href="/payment/" class="button-link-underline">подробнее об оплате</a>

        </div>
</div>