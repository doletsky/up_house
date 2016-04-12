<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ROWS"][0] as $arItem):?>
    <?if(count($arItem)<2 || $arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"]<1) continue;?>
    <div class="product-item">
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-link">
            <figure class="product-content">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem['NAME']?>" class="product-img" />
                <figcaption class="product-desc"><?=$arItem['NAME']?></figcaption>
            </figure>
        </a>
        <?if($arItem["CAN_BUY"] && $arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"]>1):?>
            <div class="product-price"><?=number_format($arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"], 0, ',', ' ')?>, -</div>
            <div class="clearfix">
                <input type="submit" data-product-id="<?=$arItem['ID']?>" onclick="AddToBasketAjax(<?=$arItem['ID']?>);RefreshBasketAmount();return false;" class="button-buy" value="Купить" />
            </div>
        <?else:?>
            <div class="clearfix" style="margin-top: 59px;">
                <input type="submit" class="button-buy addElementPreorderLink"  data-buyid="<?=$arItem["ID"]?>" value="Оформить предзаказ" />
            </div>
        <?endif;?>

    </div>
<?endforeach?>

