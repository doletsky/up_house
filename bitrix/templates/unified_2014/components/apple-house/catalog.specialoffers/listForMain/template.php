<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="carousel">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="slide">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-link">
                        <figure class="product-content">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" class="product-img" />
                            <figcaption class="product-desc"><?=str_replace(chr(160),chr(32),$arItem['NAME'])?></figcaption>
                        </figure>
                    </a>
                    <div class="product-price"><?=$arItem['PRICES']['�������']['PRINT_DISCOUNT_VALUE_VAT']?></div>
                    <div class="clearfix">
                        <? /* <a href="<?=$arItem['ADD_URL']?>" class="button-buy"> ������</a> */ ?>
                        <input type="submit" class="button-buy" value="������" />
                        <a href="<?=$arItem['ADD_URL']?>&credit=Y" class="button-credit"> � ������</a>

                    </div>
                </div>
            <? endforeach ?>
</div>