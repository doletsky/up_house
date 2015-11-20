<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script type="text/javascript">
function fShowStore(id)
{
	var strUrl = '/bitrix/components/bitrix/sale.order.ajax/templates/visual/map.php';
	var strUrlPost = 'delivery=' + id;

	var storeForm = new BX.CDialog({
				'title': '<?=GetMessage('SOA_ORDER_GIVE')?>',
				head: '',
				'content_url': strUrl,
				'content_post': strUrlPost,
				'width':700,
				'height':450,
				'resizable':false,
				'draggable':false
			});

	var button = [
			{
				title: '<?=GetMessage('SOA_POPUP_SAVE')?>',
				id: 'crmOk',
				'action': function ()
				{
					GetBuyerStore();
					BX.WindowManager.Get().Close();
				}
			},
			BX.CDialog.btnCancel
		];
	storeForm.ClearButtons();
	storeForm.SetButtons(button);
	storeForm.Show();
}

function GetBuyerStore()
{
	BX('BUYER_STORE').value = BX('POPUP_STORE_ID').value;
	//BX('ORDER_DESCRIPTION').value = '<?=GetMessage("SOA_ORDER_GIVE_TITLE")?>: '+BX('POPUP_STORE_NAME').value;
	BX('store_desc').innerHTML = BX('POPUP_STORE_NAME').value;
	BX.show(BX('select_store'));
}
</script>


<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult["BUYER_STORE"]?>" />
<?


$cityFieldId = ($curUserType == 1 ? 6 : 25);
if(!empty($arResult["DELIVERY"]))
{
	?>
	<div class="b_grid_level grid_level_15px">
		<div class="b_grid_unit-1">
			<span class="fs_24px" style="font-weight: bold; font-family: Helvetica Neue Cyr Bold;"><?=GetMessage("SOA_TEMPL_DELIVERY")?></span>
            <? //if($USER->IsAdmin()):?>

                <div style="display:inline-block; margin-left: 10px;">
                    <?
                    $APPLICATION->IncludeComponent(
                        "apple-house:sale.ajax.locations",
                        "",
                        array(
                            "AJAX_CALL" => "N",
                            "COUNTRY" => '4',
                            "CITY" => (isset($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][$cityFieldId]["FIELD_NAME"]]) ? $_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][$cityFieldId]["FIELD_NAME"]] : '670'),
                            "COUNTRY_INPUT_NAME" => "COUNTRY_tmp",
                            "REGION_INPUT_NAME" => "REGION_tmp",
                            "CITY_INPUT_NAME" => $arResult["ORDER_PROP"]["USER_PROPS_Y"][$cityFieldId]["FIELD_NAME"], //"CITY_ID",
                            "CITY_OUT_LOCATION" => "Y",
                            "LOCATION_VALUE" => "",
                            "ONCITYCHANGE" => "submitForm()",
                        ),
                        null,
                        array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                </div>
            <? // endif; ?>
		</div>
	</div>
		<?
		foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery)
		{
            if($arDelivery["ID"] == '12' && $curUserType == 2)
                continue;
			if ($delivery_id !== 0 && intval($delivery_id) <= 0)
			{
				foreach ($arDelivery["PROFILES"] as $profile_id => $arProfile)
				{
					?>
								<div class="b_grid_level grid_level_15px">
									<div class="b_grid_unit-1">
										<div class="b_styled-radio">
							<input class="b_styled-radio_radio" type="radio" id="ID_DELIVERY_<?=$delivery_id?>_<?=$profile_id?>" name="<?=$arProfile["FIELD_NAME"]?>" value="<?=$delivery_id.":".$profile_id;?>" <?=$arProfile["CHECKED"] == "Y" ? "checked=\"checked\"" : "";?> onclick="submitForm();" />
							<label class="b_styled-radio_label" style="margin: 0 5px;" for="ID_DELIVERY_<?=$delivery_id?>_<?=$profile_id?>"><img class="va_bottom" src="<?=$arDelivery['LOGOTIP']['SRC']?>">&nbsp;&nbsp;<span style="color: #222222;"><?=$arDelivery["TITLE"]." (".$arProfile["TITLE"].")";?></span><br>
												<span class="fs_12px color_7e7e7e">
										<?if (strlen($arProfile["DESCRIPTION"]) > 0):?>
											<?=nl2br($arProfile["DESCRIPTION"])?>
										<?else:?>
											<?=nl2br($arDelivery["DESCRIPTION"])?>
										<?endif;?>
												</span>
											</label>
										</div>
									</div>
								</div>
						<?
							$APPLICATION->IncludeComponent('bitrix:sale.ajax.delivery.calculator', '', array(
								"NO_AJAX" => $arParams["DELIVERY_NO_AJAX"],
								"DELIVERY" => $delivery_id,
								"PROFILE" => $profile_id,
								"ORDER_WEIGHT" => $arResult["ORDER_WEIGHT"],
								"ORDER_PRICE" => $arResult["ORDER_PRICE"],
								"LOCATION_TO" => $arResult["USER_VALS"]["DELIVERY_LOCATION"],
								"LOCATION_ZIP" => $arResult["USER_VALS"]["DELIVERY_LOCATION_ZIP"],
								"CURRENCY" => $arResult["BASE_LANG_CURRENCY"],
							), null, array('HIDE_ICONS' => 'Y'));
						?>
					<?
				} // endforeach
			}
			else
			{
				?>
								<div class="b_grid_level grid_level_15px">
									<div class="b_grid_unit-1">
										<div class="b_styled-radio">
							<input class="b_styled-radio_radio" type="radio" id="ID_DELIVERY_ID_<?= $arDelivery["ID"] ?>" name="<?=$arDelivery["FIELD_NAME"]?>" value="<?= $arDelivery["ID"] ?>"<? if ($arDelivery["CHECKED"]=="Y") echo " checked";?> onclick="submitForm();">
							<? /* <label class="b_styled-radio_label" for="ID_DELIVERY_ID_<?= $arDelivery["ID"] ?>" <?=(count($arDelivery["STORE"]) > 0)? 'onClick="fShowStore(\''.$arDelivery["ID"].'\');"':"";?>>&nbsp;&nbsp;<img class="va_bottom" src="<?=$arDelivery['LOGOTIP']['SRC']?>">&nbsp;&nbsp;<?= $arDelivery["NAME"] ?><br> */ ?>
							<label class="b_styled-radio_label" style="margin: 0 5px;" for="ID_DELIVERY_ID_<?= $arDelivery["ID"] ?>" >&nbsp;&nbsp;<img class="va_bottom" src="<?=$arDelivery['LOGOTIP']['SRC']?>">&nbsp;&nbsp;<span style="color: #222222;"><?= $arDelivery["NAME"] ?></span><br>
												<span class="fs_12px color_7e7e7e"><?
								if (strlen($arDelivery["DESCRIPTION"])>0)
								{
									echo $arDelivery["DESCRIPTION"]."<br />";
								}
								?>
												</span>
											</label>
										</div>
									</div>
								</div>

				<?
			}
		}
}
?>

<? if($_REQUEST['DELIVERY_ID'] == '12' && $curUserType == 1) :?>
    <div>
        <a href="#" onclick="PickPoint.open(PickPointResult);return false">Выбрать постамат</a>
        <input type="hidden" name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][41]["FIELD_NAME"]?>"  id="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][41]["FIELD_NAME"]?>" value="" />
    </div>
<? endif;?>

<? if($curUserType == 1): ?>
	<div class="b_grid_level grid_level_15px" <?=(($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5') ? 'style="display: none;"' : '')?>>
		<div class="b_grid_unit-1-3 lh_30px">
			<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][7]["NAME"] ?>:<span class="sof-req">*</span>
		</div>
		<div class="b_grid_unit-2-3">
			<textarea class="b_textarea textarea_width_300px" name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][7]["FIELD_NAME"]?>" id="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][7]["FIELD_NAME"]?>" ><?=(($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5') ? 'Самовывоз' : (($arResult["ORDER_PROP"]["USER_PROPS_Y"][7]["VALUE"] == 'Самовывоз') ? '' : $arResult["ORDER_PROP"]["USER_PROPS_Y"][7]["VALUE"]) )?></textarea>
		</div>
	</div>
<? elseif($curUserType == 2): ?>
	<div class="b_grid_level grid_level_15px" <?=(($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5') ? 'style="display: none;"' : '')?>>
		<div class="b_grid_unit-1-3 lh_30px">
			<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][26]["NAME"] ?>:<span class="sof-req">*</span>
		</div>
		<div class="b_grid_unit-2-3">
			<textarea class="b_textarea textarea_width_300px" name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][26]["FIELD_NAME"]?>" id="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][26]["FIELD_NAME"]?>"><?=(($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5') ? 'Самовывоз' : (($arResult["ORDER_PROP"]["USER_PROPS_Y"][26]["VALUE"] == 'Самовывоз') ? '' : $arResult["ORDER_PROP"]["USER_PROPS_Y"][26]["VALUE"]) )?></textarea>
		</div>
	</div>
<? endif ?>
