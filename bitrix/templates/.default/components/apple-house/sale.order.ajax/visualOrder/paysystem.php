<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div class="b_grid_level grid_level_15px">
		<div class="b_grid_unit-1">
			<span class="fs_24px"><?=GetMessage("SOA_TEMPL_PAY_SYSTEM")?></span>
		</div>
	</div>
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
						<label class="b_styled-radio_label" for="pay-type_beznalich">&nbsp;&nbsp;<i class="b_glyph glyph-cashbox va_bottom"></i>&nbsp;&nbsp;<span style="color: #222222;"><?=$arPaySystem["NAME"];?></span><br>
					<?
					if (strlen($arPaySystem["DESCRIPTION"])>0)
					{
						?>
							<span class="fs_12px color_7e7e7e"><?=$arPaySystem["DESCRIPTION"]?></span>
						<?
					}
					?>
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
						<label class="b_styled-radio_label" for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"><img class="va_bottom" src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>">&nbsp;&nbsp;<span style="color: #222222;"><?=$arPaySystem["NAME"];?></span><br>
					<?
					if (strlen($arPaySystem["DESCRIPTION"])>0)
					{
						?>
                            <? if ($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5'): ?>
                                <? if($arPaySystem["ID"] == '7'):?>
                                    <span class="fs_12px color_7e7e7e">Банковской картой VISA/Mastercard или другим способом (через систему PayU).</span>
                                <? else: ?>
                                    <span class="fs_12px color_7e7e7e">Оплата наличными на месте, после проверки оборудования</span>
                                <? endif;?>
                            <? else: ?>
							    <span class="fs_12px color_7e7e7e"><?=$arPaySystem["DESCRIPTION"]?></span>
                            <? endif;?>
						<?
					}
					?>
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
                        <label class="b_styled-radio_label" for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"><img class="va_bottom" src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>">&nbsp;&nbsp;<span style="color: #222222;"><?=$arPaySystem["NAME"];?></span><br>
                                <span class="fs_12px color_7e7e7e"><?=$arPaySystem["DESCRIPTION"]?></span>
                        </label>
                    </div>
                </div>
            </div>
        <?}
	}
	?>