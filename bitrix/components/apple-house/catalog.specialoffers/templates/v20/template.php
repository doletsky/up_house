<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="carousel">

<? foreach($arResult["ITEMS"] as $key => $arItem): ?>
    <div class="slide">
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-link">
            <figure class="product-content">
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" class="product-img" />
                <figcaption class="product-desc"><?=$arItem['NAME']?></figcaption>
            </figure>
        </a>
        <?if($arItem['PRICES']['�������']['VALUE_VAT'] > 0): ?>
            <div class="product-price"><?=str_replace(' ���.', '', $arItem['PRICES']['�������']['PRINT_DISCOUNT_VALUE_VAT'])?>, -</div>
        <? endif ?>

        <div class="clearfix">
            <input type="submit" class="button-buy" value="������" onclick="location.href='<?=$arItem['BUY_URL']?>'"/>
            <a href="<?=$arItem['ADD_URL']?>" class="button-credit" data-buyid="<?=$arItem['ID']?>">� 1 ����</a>
        </div>
    </div>
<?endforeach;?>

</div>
