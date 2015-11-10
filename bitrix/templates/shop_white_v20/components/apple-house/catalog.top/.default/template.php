<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
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
                    <input type="submit" onclick="location.href='<?=$arItem['ADD_URL']?>'" class="button-buy" value="������" />
                    <a href="#" class="button-credit" data-buyid="<?=$arItem["ID"]?>">� 1 ����</a>
                </div>
            <?else:?>
                <div class="clearfix" style="margin-top: 59px;">
                    <input type="submit" class="button-buy addElementPreorderLink"  data-buyid="<?=$arItem["ID"]?>" value="�������� ���������" />
                    <!-- <?=$arItem["PRICE_MATRIX"]["MATRIX"][1][0]["DISCOUNT_PRICE"]?> -->
<!--                    <a href="#" class="button-buy" data-buyid="--><?//=$arItem["ID"]?><!--">�������� ���������</a>-->
                </div>
            <?endif;?>

    </div>

<?endforeach?>
