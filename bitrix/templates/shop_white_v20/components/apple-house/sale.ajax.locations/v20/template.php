<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<!--location-->
<?
$disabled = false;
if ($arParams["AJAX_CALL"] != "Y" 
	&& count($arParams["LOC_DEFAULT"]) > 0 
	&& $arParams["PUBLIC"] != "N"
	&& $arParams["SHOW_QUICK_CHOOSE"] == "Y"):
	$isChecked = "";
	foreach ($arParams["LOC_DEFAULT"] as $val):
		$checked = "";

		if ((($val["ID"] == IntVal($_REQUEST["NEW_LOCATION_".$arParams["ORDER_PROPS_ID"]])) || ($val["ID"] == $arParams["CITY"])) && (!isset($_REQUEST["CHANGE_ZIP"]) || $_REQUEST["CHANGE_ZIP"] != "Y"))
		{
			$checked = "checked";
			$isChecked = "Y";
			$disabled = true;
		}?>

		<div><input onChange="<?=$arParams["ONCITYCHANGE"]?>;" <?=$checked?> type="radio" name="NEW_LOCATION_<?=$arParams["ORDER_PROPS_ID"]?>" value="<?=$val["ID"]?>" id="loc_<?=$val["ID"]?>" /><label for="loc_<?=$val["ID"]?>"><?=$val["LOC_DEFAULT_NAME"]?></label></div>
	<?endforeach;?>

	<input <? if($isChecked!="Y") echo 'checked';?> type="radio" onclick="newlocation(<?=$arParams["ORDER_PROPS_ID"]?>);" name="NEW_LOCATION_<?=$arParams["ORDER_PROPS_ID"]?>" value="0" id="loc_0" /><label for="loc_0"><?=GetMessage("LOC_DEFAULT_NAME_NULL")?></label>
<?endif;?>

<?
if (isset($_REQUEST["NEW_LOCATION_".$arParams["ORDER_PROPS_ID"]]) && IntVal($_REQUEST["NEW_LOCATION_".$arParams["ORDER_PROPS_ID"]]) > 0)
	$disabled = true;
?>

<?if ($arParams["AJAX_CALL"] != "Y"):?><div id="LOCATION_<?=$arParams["CITY_INPUT_NAME"];?>"><?endif?>

<input type="hidden" name="<?=$arParams["COUNTRY_INPUT_NAME"]?>" value="4" />

<?if (count($arResult["REGION_LIST"]) > 0):?>
	<?
	$id = "";
	if (count($arResult["COUNTRY_LIST"]) <= 0):
		$id = "id=\"".$arParams["COUNTRY_INPUT_NAME"].$arParams["CITY_INPUT_NAME"]."\"";
	endif;?>

	<?
	if ($arResult["EMPTY_CITY"] == "Y")
		$change = $arParams["ONCITYCHANGE"];
	else
		$change = "getLocation(".$arParams["COUNTRY"].", this.value, '', ".$arResult["JS_PARAMS"].", '".CUtil::JSEscape($arParams["SITE_ID"])."')";
	?>

	<select class="form-select product-select" <?=$id?> <?if($disabled) echo "disabled";?> name="<?=$arParams["REGION_INPUT_NAME"].$arParams["CITY_INPUT_NAME"]?>" onChange="<?=$change?>" type="location">
		<option class="form-option product-item"><?echo GetMessage('SAL_CHOOSE_REGION')?></option>
		<?foreach ($arResult["REGION_LIST"] as $arRegion):?>
			<option class="form-option product-item" value="<?=$arRegion["ID"]?>"<?if ($arRegion["ID"] == $arParams["REGION"]):?> selected="selected"<?endif;?>><?=$arRegion["NAME_LANG"]?></option>
		<?endforeach;?>
	</select>
<?endif;?>

<?if (count($arResult["CITY_LIST"]) > 0):?>
	<?
    $arResult["CITY_LIST"] = array_reverse($arResult["CITY_LIST"]);
	$id = "";
	if (count($arResult["COUNTRY_LIST"]) <= 0 && count($arResult["REGION_LIST"]) <= 0):
		$id = "id=\"".$arParams["COUNTRY_INPUT_NAME"]."\"";
	else:
		$id = "id=\"".$arParams["CITY_INPUT_NAME"]."\"";
	endif;?>
    <div class="form-select-wrapper dark product-select-wrapper">
	<select class="form-select product-select" <?=$id?> <?if($disabled) echo "disabled";?> name="<?=$arParams["CITY_INPUT_NAME"]?>"<?if (strlen($arParams["ONCITYCHANGE"]) > 0):?> onchange="$('input[name=DELIVERY_ID]').eq(0).attr('checked', 'checked'); <?=$arParams["ONCITYCHANGE"]?>"<?endif;?> type="location">
		<option class="form-option product-item" disabled="disabled"><?echo GetMessage('SAL_CHOOSE_CITY')?></option>
		<?foreach ($arResult["CITY_LIST"] as $arCity):?>
			<option class="form-option product-item" value="<?=$arCity["ID"]?>"<?if ($arCity["ID"] == $arParams["CITY"]):?> selected="selected"<?endif;?>><?=($arCity['CITY_ID'] > 0 ? $arCity["CITY_NAME"] : GetMessage('SAL_CHOOSE_CITY_OTHER'))?></option>
		<?endforeach;?>
	</select>
    </div>
<?endif;?>

<?if ($arParams["AJAX_CALL"] != "Y"):?></div><div id="wait_container_<?=$arParams["CITY_INPUT_NAME"]?>" style="display: none;"></div><?endif;?>

<?if ($arParams["AJAX_CALL"] != "Y" && $arParams["PUBLIC"] != "N"):?>
<script>
	function newlocation(orderPropId)
	{
		var select = document.getElementById("LOCATION_ORDER_PROP_" + orderPropId);

		arSelect = select.getElementsByTagName("select");
		if (arSelect.length > 0)
		{
			for (var i in arSelect)
			{
				var elem = arSelect[i];
				elem.disabled = false;
			}
		}
	}
</script>
<?endif;?>
<!--/location-->