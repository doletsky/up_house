<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="col-xs-6">
    <div class="payment-system">
        <h3 class="entry-title-3"><?=GetMessage("SOA_TEMPL_PAY_SYSTEM")?></h3>
<? /*
        <div class="input-row">
            <input id="radio-input-8" type="radio" value="myValue 8" name="radio-payment-system" checked>
            <label for="radio-input-8" class="input-helper input-helper--radio">
                    <span class="product-delivery-img">
                        <i class="cash-icon product-sprite"></i>
                    </span>
                    <span class="product-delivery-content">
                        <span class="product-delivery-title">Наличные</span>
                        <span class="product-delivery-text">Оплата наличными курьеру при получении, после проверки оборудования</span>
                    </span>
            </label>
        </div>
*/?>

        <?// var_dump($arResult);
        if ($arResult["PAY_FROM_ACCOUNT"]=="Y")
        {
            ?>
            <div class="input-row">
                <input type="hidden" name="PAY_CURRENT_ACCOUNT" value="N">
                <label for="radio-input-8" class="input-helper input-helper--radio">
                    <span class="product-delivery-img">
                        <i class="cash-icon product-sprite"></i>
                    </span>
                    <? /*                <img src="/bitrix/components/bitrix/sale.order.ajax/templates/visual/images/logo-default-ps.gif" alt="" <?=($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")?"class=\"active\"":"";?> /> */ ?>
                    <span class="product-delivery-content">
                        <span class="product-delivery-title"><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT")?></span>
                        <span class="product-delivery-text">
                            <span><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT1")." <b>".$arResult["CURRENT_BUDGET_FORMATED"]?></b></span><br />
							<span><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT2")?></span>
                        </span>
                    </span>
                </label>
            </div>

        <?
        }

        //var_dump($arResult["PAY_SYSTEM"]);
        foreach($arResult["PAY_SYSTEM"] as $arPaySystem)
        {
            if(count($arResult["PAY_SYSTEM"]) == 1)
            {
                ?>
                <div class="input-row">
                    <input type="hidden" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"<?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?>>
                    <label for="radio-input-8" class="input-helper input-helper--radio">
                    <span class="product-delivery-img">
                        <i class="cash-icon product-sprite"></i>
                    </span>
                        <? /*                <img src="/bitrix/components/bitrix/sale.order.ajax/templates/visual/images/logo-default-ps.gif" alt="" <?=($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")?"class=\"active\"":"";?> /> */ ?>
                        <span class="product-delivery-content">
                        <span class="product-delivery-title"><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT")?></span>
                        <span class="product-delivery-text">
                            <?if (strlen($arPaySystem["DESCRIPTION"])>0){?>
                                <?=$arPaySystem["DESCRIPTION"]?></span>
                            <? } ?>
                        </span>
                    </span>
                    </label>
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
                <div class="input-row">
                    <input type="hidden"  name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" <?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?> onclick="submitForm();">
                    <label for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" class="input-helper input-helper--radio">
<? /* <img class="va_bottom" src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>">  */ ?>
                    <span class="product-delivery-img">
                        <i class="cash-icon product-sprite"></i>
                    </span>
                        <? /*                <img src="/bitrix/components/bitrix/sale.order.ajax/templates/visual/images/logo-default-ps.gif" alt="" <?=($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")?"class=\"active\"":"";?> /> */ ?>
                        <span class="product-delivery-content">
                        <span class="product-delivery-title"><?=$arPaySystem["NAME"];?></span>
                        <span class="product-delivery-text">
                            <?if (strlen($arPaySystem["DESCRIPTION"])>0){?>
                                <? if ($_REQUEST['DELIVERY_ID'] == '3' || $_REQUEST['DELIVERY_ID'] == '5'): ?>
                                <? if($arPaySystem["ID"] == '7'):?>
                                    <span >Банковской картой VISA/Mastercard или другим способом (через систему PayU).</span>
                                <? else: ?>
                                    <span >Оплата наличными на месте, после проверки оборудования</span>
                                <? endif;?>
                            <? else: ?>
                                <span ><?=$arPaySystem["DESCRIPTION"]?></span>
                            <? endif;?>
                            <?}?>
                        </span>
                        </span>
                    </label>
                </div>

            <?
            }
            elseif(
                ($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]] == '1317' && $arPaySystem["ID"] != '8')
                && ($_REQUEST[$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]] != '1317' && $arPaySystem["ID"] != '1')
                || ($arPaySystem["ID"] == '12')

            ){
                ?>
                <div class="input-row">
                    <input type="hidden"  name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" <?=$arPaySystem["CHECKED"] == "Y" ? " checked=\"checked\"" : "";?> onclick="submitForm();">
                    <label for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" class="input-helper input-helper--radio">
                        <? /* <img class="va_bottom" src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>">  */ ?>
                        <span class="product-delivery-img">
                        <i class="cash-icon product-sprite"></i>
                    </span>
                        <? /*               <img class="va_bottom" src="<?=$arPaySystem['PSA_LOGOTIP']['SRC']?>">> */ ?>
                        <span class="product-delivery-content">
                        <span class="product-delivery-title"><?=$arPaySystem["NAME"];?></span>
                        <span class="product-delivery-text">
                            <?=$arPaySystem["DESCRIPTION"]?>
                        </span>
                        </span>
                    </label>
                </div>

            <?}
        }
        ?>

        <a href="#" class="button-link-underline">подробнее об оплате</a>
    </div>
</div>
