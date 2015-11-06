<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ROWS"][0] as $key => $arItem):?>
    <?if($key>3) break;?>
    <div class="product-item">
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-link">
            <figure class="product-content">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem['NAME']?>" class="product-img" />
                <figcaption class="product-desc"><?=$arItem['NAME']?></figcaption>
            </figure>
        </a>
            <?if($arItem["CAN_BUY"]):?>
                <div class="product-price"><?=number_format($arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"], 0, ',', ' ')?>, -</div>
                <div class="clearfix">
                    <input type="submit" class="button-buy" value="Купить" />
                    <a href="#" class="button-credit">В 1 клик</a>
                </div>
            <?endif;?>

    </div>

<?endforeach?>
