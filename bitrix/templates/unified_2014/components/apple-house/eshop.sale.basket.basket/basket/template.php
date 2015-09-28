<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <!-- страница корзина -->
            <div id="page-cart">

                <!-- блок корзины -->
                <div class="main-shadow">
                    <!-- breadcrumbs -->
                    <div class="breadcrumbs">
                        <a class="breadcrumbs-item" href="#">Главная</a>
                        <div class="breadcrumbs-item">Корзина</div>
                    </div>
                    <!-- /breadcrumbs -->

                    <section class="cart-section section-container">
                        <div class="row">
                            <div class="col-xs-6"><h1 class="cart-title entry-title">корзина</h1></div>
                            <div class="col-xs-6"><a class="cart-continue-shop button-link-underline" href="/catalog/">Продолжить покупки</a></div>
                        </div>

                        <div class="cart-container">
                                <?
                                if (StrLen($arResult["ERROR_MESSAGE"])<=0)
                                {
                                    $arUrlTempl = Array(
                                        "delete" => $APPLICATION->GetCurPage()."?action=delete&id=#ID#",
                                        "shelve" => $APPLICATION->GetCurPage()."?action=shelve&id=#ID#",
                                        "add" => $APPLICATION->GetCurPage()."?action=add&id=#ID#",
                                    );
                                }
                                include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
                                ?>


                        </div>


                    </section>
                </div>
                <!-- /блок корзины -->

            <!-- рекомендуем добавить к Вашему заказу -->
            <? if(!empty($arResult['RECCOMEND'])): ?>

                <section class="novelty main-section">
                <h2 class="novelty-title entry-title-2">рекомендуем добавить к Вашему заказу</h2>

                    <div class="bx-wrapper" style="max-width: 870px;">
                        <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 362px;">
                            <div class="carousel" style="width: 1415%; position: relative; transition-duration: 0s; transform: translate3d(-900px, 0px, 0px);">
                                <? foreach($arResult['RECCOMEND'] as $arReccomend): ?>
                                    <div class="slide bx-clone" style="float: left; list-style: none outside none; position: relative; width: 195px; margin-right: 30px;">
                                        <a class="product-link" href="<?=$arReccomend['DETAIL_PAGE_URL']?>">
                                            <figure class="product-content">
                                                <img class="product-img" alt="" src="<?=$arReccomend['PREVIEW_PICTURE']['SRC']?>">
                                                <figcaption class="product-desc"><?=$arReccomend['NAME']?></figcaption>
                                            </figure>
                                        </a>
                                        <div class="product-price"><?=PriceDigitExtractor($arReccomend['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE'])?>, -</div>
                                        <? if($arReccomend['CAN_BUY']): ?>
                                            <div class="clearfix">
                                                <a class="b_button-buy button-buy_add" href="<?=$arReccomend['ADD_URL']?>"></a>
    <? /*
                                                <input type="submit" value="Купить" class="button-buy">
                                                <a class="button-credit" href="#">В кредит</a>
    */ ?>
                                            </div>
                                        <? endif ?>

                                    </div>
                                <? endforeach ?>
                            </div>
                        </div>
                        <div class="bx-controls bx-has-pager bx-has-controls-direction">
                            <div class="bx-pager bx-default-pager">
                                <div class="bx-pager-item">
                                    <a class="bx-pager-link active" data-slide-index="0" href="">1</a>
                                </div>
                                <div class="bx-pager-item">
                                    <a class="bx-pager-link" data-slide-index="1" href="">2</a>
                                </div>
                                <div class="bx-pager-item">
                                    <a class="bx-pager-link" data-slide-index="2" href="">3</a>
                                </div>
                            </div>
                            <div class="bx-controls-direction">
                                <a href="" class="bx-prev">Prev</a>
                                <a href="" class="bx-next">Next</a>
                            </div>
                        </div>
                    </div>

                </section>
            <!-- /рекомендуем добавить к Вашему заказу -->
            <? endif ?>

            </div>
        <!-- /страница корзина -->
        </div>
    </div>
</div>