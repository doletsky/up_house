<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b_grid_unit-1-2">
	<div class="b_grid_level grid_level_15px">
		<div class="b_grid_unit-1">
			<span class="fs_24px"><?=GetMessage("SOA_TEMPL_PAY_SYSTEM")?></span>
		</div>
	</div>
	<?
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
	foreach($arResult["PAY_SYSTEM"] as $arPaySystem)
	{
		if(count($arResult["PAY_SYSTEM"]) == 1)
		{
			?>
			<div class="b_grid_level grid_level_15px">
				<div class="b_grid_unit-1">
					<div class="b_styled-radio">
						<input class="b_styled-radio_radio" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"<?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?>>
						<label class="b_styled-radio_label" for="pay-type_beznalich">&nbsp;&nbsp;<i class="b_glyph glyph-cashbox va_bottom"></i>&nbsp;&nbsp;<?=$arPaySystem["NAME"];?><br>
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
		else
		{
		?>
			<div class="b_grid_level grid_level_15px">
				<div class="b_grid_unit-1">
					<div class="b_styled-radio">
						<input class="b_styled-radio_radio" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"<?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?> onclick="submitForm();">
						<label class="b_styled-radio_label" for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"><img class="va_bottom" src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>"><?=$arPaySystem["NAME"];?><br>
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
	}
	?>
</div>