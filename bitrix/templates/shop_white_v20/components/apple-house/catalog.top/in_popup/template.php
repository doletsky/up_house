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

<?if(0):?>


    <!-- 1 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 2 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-2.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">23 900 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 3 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-3.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">7 290 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 4 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-4.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">6 090 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 5 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-5.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 1 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 2 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-2.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">23 900 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 3 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-3.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">7 290 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 4 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-4.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">6 090 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>

    <!-- 5 slide -->
    <div class="product-item">
        <a href="#" class="product-link">
            <figure class="product-content">
                <img src="img/pop-up-iphone-5.jpg" alt="Lapka PEM" class="product-img">
                <figcaption class="product-desc">Чехол Thin Case для iPhone 5/5S Желтый</figcaption>
            </figure>
        </a>
        <div class="product-price">4 490 <span class="product-price-cy">руб.</span></div>
        <div class="clearfix">
            <input type="submit" class="button-buy" value="Купить">
        </div>
    </div>


<?$key=0;?>
<?foreach($arResult["ROWS"][0] as $arItem):?>
    <?if($key>3) break;?>
    <?if(count($arItem)<2 || $arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"]<1) continue;?>
    <?$key++;?>

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
                    <input type="submit" onclick="location.href='<?=$arItem['ADD_URL']?>'" class="button-buy" value="Купить" />
                    <a href="#" class="button-credit" data-buyid="<?=$arItem["ID"]?>">В 1 клик</a>
                </div>
            <?else:?>
                <div class="clearfix" style="margin-top: 59px;">
                    <input type="submit" class="button-buy addElementPreorderLink"  data-buyid="<?=$arItem["ID"]?>" value="Оформить предзаказ" />
                    <!-- <?=$arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"]?> -->
<!--                    <a href="#" class="button-buy" data-buyid="--><?//=$arItem["ID"]?><!--">Оформить предзаказ</a>-->
                </div>
            <?endif;?>

    </div>

<?endforeach?>
<?endif?>