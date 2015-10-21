<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--<pre>--><?//print_r($arResult['SUBSECTION'])?><!--</pre>-->

    <!-- каталог товаров -->
    <section class="catalog-section main-section">

    <div class="catalog-header clearfix">
        <div class="catalog-row pull-left">
            <div class="breadcrumbs">
                <?
                //оставить 2 последних пункта в хлебных крошках
                $countBreak=count($arResult["PATH"])-2;
                if(count($arResult["PATH"])==1):
                ?>
                <span class="breadcrumbs-item">Главная</span>
                <?endif?>
                <?foreach($arResult["PATH"] as $pathSect): if($countBreak>0) {$countBreak--; continue;}?>
                <span class="breadcrumbs-item"<?if(strlen($pathSect["NAME"])>15):?> style="margin-left: 0px;width: 206px;"<?endif?>><?=$pathSect["NAME"]?></span>
                <?endforeach?>
            </div>
            <h2 class="catalog-title entry-title"><?=$arResult['NAME']?></h2>
        </div>

        <div class="catalog-row-2 pull-left">
            <div class="catalog-desc"><?=htmlspecialchars_decode($arResult['DESCRIPTION_1'])?></div>
        </div>
    <?if(!empty($arResult['UF_BONUS'])): ?>
        <div class="catalog-row-3 pull-left">
            <div class="catalog-benefits">
                                            <span class="catalog-benefits-text">
                                                При покупке<?if(strlen($arResult['NAME'])>20) echo "<br>"; else echo " ";?>
                                                <?=$arResult['NAME']?><br>в магазине Up House Вы получаете:
                                            </span>
                <ul class="bonus-img" style="margin-left: <?=15.8*(6-count($arResult['UF_BONUS']))?>px">
                    <? foreach($arResult['UF_BONUS'] as $bonus): ?>
                        <li class="bonus-<?=$arResult['BONUS'][$bonus]['XML_ID']?>" onmouseover="showNote('<?=$arResult['BONUS'][$bonus]['XML_ID']?>');" onmouseout="hideNote();"></li>
                        <div class="bonus-note note-<?=$arResult['BONUS'][$bonus]['XML_ID']?>"><?=$arResult['BONUS'][$bonus]['VALUE']?></div>
                    <? endforeach ?>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    <?endif?>
    </div>
<?if(count($arResult["SUBSECTION"])>0):?>
    <nav class="catalog-menu-apps clearfix">
       <?$curPage=$APPLICATION->GetCurPage();?>
       <?foreach($arResult["SUBSECTION"] as $subSect):?>
           <a href="/<?=$subSect['CODE']?>" class="catalog-menu-apps-item<?if($curPage=="/".$subSect['CODE']):?> current<?endif?>"><?=$subSect['FILTER_NAME']?></a>
       <?endforeach?>
    </nav>
<?endif?>
    <div class="clearfix"<?if(count($arResult["SUBSECTION"])<=0):?> style="border-top: 1px dotted #ccc;"<?endif?>>
    <!-- каталог фильтр -->
<?if(strlen($arParams["SMART_FILTER_OUTPUT"])>0):?>
    <aside class="catalog-filter">

        <!-- фильтр цена -->
        <div class="catalog-filter-price mt-3">
            <div class="catalog-filter-title catalog-filter-price-title">Цена</div>
            <div class="catalog-filter-price-container">
                <div>
                    <label class="form-label catalog-filter-price-label">
                        От <input type="text" class="form-input catalog-filter-price-inp" />
                    </label>
                    <label class="form-label catalog-filter-price-label">
                        До <input type="text" class="form-input catalog-filter-price-inp" />
                    </label>
                </div>
                <div><img src="img/catalog-filter-price.png" alt="филтер цены" /></div>
            </div>
        </div>

        <!-- фильтр производитель -->
        <div class="catalog-filter-manufacturer mt-3">
            <div class="catalog-filter-title">Производитель</div>
            <div class="input-row">
                <input id="manufacturer-radio" type="radio" value="manufacturer" name="radio-manufacturer" checked>
                <label for="manufacturer-radio" class="input-helper input-helper--radio">Apple</label>
                <br />
                <input id="manufacturer-radio-2" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-2" class="input-helper input-helper--radio">Belkin</label>
                <br />
                <input id="manufacturer-radio-3" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-3" class="input-helper input-helper--radio">CG Mobile</label>
                <br />
                <input id="manufacturer-radio-4" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-4" class="input-helper input-helper--radio">Ferrari</label>
                <br />
                <input id="manufacturer-radio-5" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-5" class="input-helper input-helper--radio">GRIFFIN Tech.</label>
                <br />
                <input id="manufacturer-radio-6" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-6" class="input-helper input-helper--radio">iCarer</label>
                <br />
                <input id="manufacturer-radio-7" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-7" class="input-helper input-helper--radio">Lifeproof</label>
                <br />
                <input id="manufacturer-radio-8" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-8" class="input-helper input-helper--radio">Mini</label>
                <br />
                <input id="manufacturer-radio-9" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-9" class="input-helper input-helper--radio">Neri Karra</label>
                <br />
                <input id="manufacturer-radio-10" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-10" class="input-helper input-helper--radio">OZAKI</label>
                <br />
                <input id="manufacturer-radio-11" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-11" class="input-helper input-helper--radio">Spigen SGP</label>
                <br />
                <input id="manufacturer-radio-12" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-12" class="input-helper input-helper--radio">Twelvesouth</label>
                <br />
                <input id="manufacturer-radio-13" type="radio" value="manufacturer" name="radio-manufacturer">
                <label for="manufacturer-radio-13" class="input-helper input-helper--radio">X-1</label>
            </div>

            <div class="form-select-wrapper light">
                <select class="form-select">
                    <option class="form-option">выберите форм-фактор</option>
                    <option class="form-option">выберите форм-фактор</option>
                </select>
            </div>
        </div>

        <!-- основной цвет -->
        <div class="catalog-filter-main-color mt-3">
            <div class="catalog-filter-title">Основной цвет</div>
            <div class="input-row">
                <input id="main-color" type="radio" value="main-color" name="radio-main-color" checked>
                <label for="main-color" class="input-helper input-helper--radio">бежевый</label>
                <br />
                <input id="main-color-2" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-2" class="input-helper input-helper--radio">белый</label>
                <br />
                <input id="main-color-3" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-3" class="input-helper input-helper--radio">голубой</label>
                <br />
                <input id="main-color-4" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-4" class="input-helper input-helper--radio">желтый</label>
                <br />
                <input id="main-color-5" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-5" class="input-helper input-helper--radio">зеленый</label>
                <br />
                <input id="main-color-6" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-6" class="input-helper input-helper--radio">золотой</label>
                <br />
                <input id="main-color-7" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-7" class="input-helper input-helper--radio">коричневый</label>
                <br />
                <input id="main-color-8" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-8" class="input-helper input-helper--radio">красный</label>
                <br />
                <input id="main-color-9" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-9" class="input-helper input-helper--radio">оранжевый</label>
                <br />
                <input id="main-color-10" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-10" class="input-helper input-helper--radio">прозрачный</label>
                <br />
                <input id="main-color-11" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-11" class="input-helper input-helper--radio">розовый</label>
                <br />
                <input id="main-color-12" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-12" class="input-helper input-helper--radio">серебристый</label>
                <br />
                <input id="main-color-13" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-13" class="input-helper input-helper--radio">серый</label>
                <br />
                <input id="main-color-14" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-14" class="input-helper input-helper--radio">синий</label>
                <br />
                <input id="main-color-15" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-15" class="input-helper input-helper--radio">фиолетовый</label>
                <br />
                <input id="main-color-16" type="radio" value="main-color" name="radio-main-color">
                <label for="main-color-16" class="input-helper input-helper--radio">черный</label>
            </div>
        </div>

        <div class="filter-buttons-block clearfix">
            <a href="#" class="button-transparent filter-button pull-left">показать</a>
            <a href="#" class="filter-del pull-left">
                <span class="del-icon product-sprite"></span>
            </a>
        </div>

    </aside>
<?endif?>
    <!-- /каталог фильтр -->
    <!-- каталог контент -->
    <div class="catalog-pr-content"<?if(strlen($arParams["SMART_FILTER_OUTPUT"])<=0):?> style="border-left: 0px; width: 898px;"<?endif?>>
<? foreach($arResult['ITEMS'] as $arItem): ?>
    <div class="catalog-pr-item">
        <div class="catalog-pr-picture">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="catalog-pr-picture-img" alt="<?=$arItem['NAME']?>" />
            </a>
        </div>
        <div class="catalog-pr-title">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="catalog-pr-title-link">
                <?=$arItem['NAME']?>
            </a>
        </div>
    <? if($arItem['CAN_BUY']):?>
        <div class="catalog-pr-price">
            <span class="catalog-pr-price-text">цена</span>
            <span class="catalog-pr-price-text-2"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['Продажа']['VALUE'])?> <span class="cy">руб.</span></span>
        </div>
    <? endif ?>
        <ul class="catalog-pr-characteristics">
            <? if($arResult['HAS_MODEL']):?>
                <li>Модель: <?=$arResult['UF_MODEL']?></li>
            <? endif ?>
            <? foreach($arResult['UF_SECTION_CHARS'] as $sectionChar): ?>
                <? if($arItem['PROPERTIES'][$sectionChar]['VALUE']): ?>
            <li><?=$arItem['PROPERTIES'][$sectionChar]['NAME']?>: <?=$arItem['PROPERTIES'][$sectionChar]['VALUE']?></li>
                <? endif ?>
            <? endforeach ?>
            <? if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])):?>
                <li>Артикул: <span class="article"><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']?></span>, есть в наличии</li>
            <? endif ?>
        </ul>
        <? if($arItem['CAN_BUY']):?>
        <div class="catalog-pr-buy">
            <a href="<?=$arItem['ADD_URL']?>" class="button-buy button-bg ">купить</a>
            <a href="<?=$arItem['ADD_URL']?>" class="button-buy button-one-click button-credit" data-buyid="<?=$arItem['ID']?>">в 1 клик</a>
        </div>
        <? else: ?>
        <div class="catalog-pr-buy">
            <a href="#" class="button-buy button-order-no-price addElementPreorderLink" data-buyid="<?=$arItem['ID']?>">оформить предзаказ</a>
        </div>
        <? endif ?>
    </div>
<? endforeach ?>


    </div>
    <!-- /каталог контент -->
    </div>

    <div class="catalog-container mt-5 clearfix">

        <?=$arResult["NAV_STRING"]?>

<? if($arResult['RATING']):?>
        <div class="reviews-block pull-left" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
            <meta content="<?=$arResult['ITEMS'][0]['DETAIL_PICTURE']['SRC']?>" itemprop="photo">
            <span class="reviews-block-text" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">Оценка <?=$arResult['RATING_NAME']?></span>
            <div class="reviews-stars"><img src="/bitrix/templates/shop_white_v20/img/reviews-stars.png" alt="5 звёзд"></div><br />
            <span class="reviews-block-text" itemprop="average">Рейтинг <?=$arResult['RATING']?> на основе</span>
            <a href="<?=$arResult['RATING_LINK']?>" class="reviews-block-link"><?=$arResult['RATING_COUNT']?> отзывов</a>
        </div>
<? endif ?>
<? if(preg_match('/iphone 5S/is',$arResult['NAME'])): ?>
        <div class="product-review pull-left">
            <a href="/show_news_obzor_apple_iphone_5s.html" class="product-button" target="_blank">
                читать обзор<br />
                iPhone 5S<i class="text-icon product-sprite"></i>
            </a>
        </div>
<? endif ?>
<? if(preg_match('/iphone 5C/is',$arResult['NAME'])): ?>
    <div class="product-review pull-left">
        <a href="/show_news_obzor-iphone-5c.html" class="product-button" target="_blank">
            читать обзор<br />
            iPhone 5C<i class="text-icon product-sprite"></i>
        </a>
    </div>
<? endif ?>
    </div>

    </section>
    <!-- /каталог товаров -->

    <!-- каталог описание -->

<? if($arResult['DESCRIPTION_2']):?>
    <?if(empty($_REQUEST['PAGEN_1']) && empty($_REQUEST['SHOWALL_1'])):?>
        <section class="catalog-desc-section main-section">
        <?=htmlspecialchars_decode($arResult['DESCRIPTION_2'])?>
            <p style="clear: both"></p>
        </section>
    <?endif?>
<?elseif($arResult['SEO_TEXT'] && empty($arResult['DESCRIPTION_2'])):?>
    <section class="catalog-desc-section main-section">
    <?=$arResult['SEO_TEXT'];?>
        <p style="clear: both"></p>
    </section>
<?endif?>
    <!-- /каталог описание -->

    <script type="text/javascript">
        function showNote(cnm){
            var bcleft=$('.bonus-'+cnm).position().left-5;
            $('.note-'+cnm).css('left',bcleft);
            $('.note-'+cnm).css('display', 'block');
        }
        function hideNote(){
            $('.bonus-note').css('display', 'none');
        }
    </script>


<?if(0):?>
<div class="b_grey-box">
    <div class="b_grid">
        <div class="b_grid_level grid_level_5px">
            <div class="b_grid_unit-5-8">
                <div class="padding-right_10px">
                    <h1 class="ff_helvetica-neue-light color_black fs_24px"><?=$arResult['NAME']?></h1>
                </div>
                <div class="padding-right_10px margin-top_5px section_description section_description_top">
                    <span class="ff_helvetica-neue-light color_black fs_14px"><?=htmlspecialchars_decode($arResult['DESCRIPTION_1'])?></span>
                </div>
            </div>
            <div class="b_grid_unit-3-8">
                <div style="margin-top:-23px;">
                    <div class="padding-left_10px">
                    <? if(!empty($arResult['SECTION_LINKS'])) {?>
                    <div class="color_aaa text-align_justify margin-bottom_10px">
                    <?
                        //$totalLinks = count($arResult['SECTION_LINKS'])-1;
                        foreach($arResult['SECTION_LINKS'] as $key => $sectionLink) {
                            if($sectionLink['UF_ACTIVE']) {
                                echo '<a class="ff_helvetica-neue-light link_007eb4" href="/' . $sectionLink['CODE'] . '">' . $sectionLink['NAME'] . '</a>';
                                if($key < $arResult['SECTION_LINKS_COUNT'])
                                    echo ' • ';
                            }
                        }?>
                    </div>
                    <?
                    }
                    if(!empty($arResult['UF_BONUS'])): ?>
                    <div>
                        <span class="ff_helvetica-neue-light color_black fs_14px">При покупке <?=$arResult['NAME']?> в магазине Up-House Вы получаете:</span>
                        <div class="margin-top_15px fs_14px clearfix">
                            <? foreach($arResult['UF_BONUS'] as $bonus): ?>
                            <div class="b_tooltip-block">
                                <i class="b_glyph glyph-<?=$arResult['BONUS'][$bonus]['XML_ID']?>"></i>
                                <div class="b_tooltip-block_tooltip">
                                    <?=$arResult['BONUS'][$bonus]['VALUE']?>
                                </div>
                            </div>
                            <? endforeach ?>
                        </div>
                    </div>
                    <? endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
<?
/*
$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "smartFilter", array(
    "IBLOCK_TYPE" => "catalog",
    "IBLOCK_ID" => "5",
    "SECTION_ID" => $_REQUEST["SECTION_ID"],
    "FILTER_NAME" => "arrFilter",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000",
    "CACHE_GROUPS" => "Y",
    "SAVE_IN_SESSION" => "N",
    "INSTANT_RELOAD" => "N",
    "PRICE_CODE" => array(
    )
    ),
    false
);
*/
?>

<? if(in_array($arResult['NAME'],array('iPhone 6','iPhone 6 16gb','iPhone 6 64gb','iPhone 6 128gb'))){ ?>
<div class="filter_cont filter_cont_SIZE">
                <?
                    $doplinks=array(
                        array(
                            'NAME'=>'Все',
                            'URL'=>'iphone-6',
                            ),
                            array(
                            'NAME'=>'iPhone 6',
                            'URL'=>'iphone-6?arrFilter_229_3108886565=Y&set_filter=Y',
                            ),
                            array(
                            'NAME'=>'iPhone 6 Plus',
                            'URL'=>'iphone-6?arrFilter_229_2984473258=Y&set_filter=Y',
                            ),
                        );
                        //echo $_SERVER['REQUEST_URI'];
                        foreach($doplinks as $onelink){

                        ?>
                        <? if($_SERVER['REQUEST_URI']=='/'.$onelink['URL']): ?>
                                <span class="ff_helvetica-neue-light"><?=$onelink['NAME']?></span>
                            <? else: ?>
                                <a class="ff_helvetica-neue-light link_007eb4" href="/<?=$onelink['URL']?>"><?=$onelink['NAME']?></a>
                            <? endif ?>

                        <? } ?>
</div>
                <? } ?>




                <? if(in_array($arResult['NAME'],array('iPad Air 2'))){ ?>
<div class="filter_cont filter_cont_SIZE">
                <?
                    $doplinks=array(
                        array(
                            'NAME'=>'Все',
                            'URL'=>'ipad-5',
                            ),
                            array(
                            'NAME'=>'iPad Air',
                            'URL'=>'ipad-5?arrFilter_229_4246145035=Y&set_filter=Y',
                            ),
                            array(
                            'NAME'=>'iPad Air 2',
                            'URL'=>'ipad-5?arrFilter_229_4054174515=Y&set_filter=Y',
                            ),
                        );
                        //echo $_SERVER['REQUEST_URI'];
                        foreach($doplinks as $onelink){

                        ?>
                        <? if($_SERVER['REQUEST_URI']=='/'.$onelink['URL']): ?>
                                <span class="ff_helvetica-neue-light"><?=$onelink['NAME']?></span>
                            <? else: ?>
                                <a class="ff_helvetica-neue-light link_007eb4" href="/<?=$onelink['URL']?>"><?=$onelink['NAME']?></a>
                            <? endif ?>

                        <? } ?>
</div>
                <? } ?>


                                <? if(in_array($arResult['NAME'],array('iPad Mini 3'))){ ?>
<div class="filter_cont filter_cont_SIZE">
                <?
                    $doplinks=array(
                        array(
                            'NAME'=>'Все',
                            'URL'=>'ipad-mini',
                            ),
                            array(
                            'NAME'=>'iPad Mini 2',
                            'URL'=>'ipad-mini?arrFilter_229_3477509136=Y&set_filter=Y',
                            ),
                            array(
                            'NAME'=>'iPad Mini 3',
                            'URL'=>'ipad-mini?arrFilter_229_3091309702=Y&set_filter=Y',
                            ),
                        );
                        //echo $_SERVER['REQUEST_URI'];
                        foreach($doplinks as $onelink){

                        ?>
                        <? if($_SERVER['REQUEST_URI']=='/'.$onelink['URL']): ?>
                                <span class="ff_helvetica-neue-light"><?=$onelink['NAME']?></span>
                            <? else: ?>
                                <a class="ff_helvetica-neue-light link_007eb4" href="/<?=$onelink['URL']?>"><?=$onelink['NAME']?></a>
                            <? endif ?>

                        <? } ?>
</div>
                <? } ?>




        <? if(!empty($arResult['SECTION_FILTER'])): ?>
        <div class="b_grid margin-top_5px">
            <div class="b_grid_level margin-bottom_5px">

            <? //echo $arResult['NAME']; ?>
            <? foreach($arResult['SECTION_FILTER'] as $key => $filterGroup):?>
                <? //$groupLength = count($filterGroup)-1 ?>
                <div class="filter_cont filter_cont_<?=$key?>">



                <? foreach($filterGroup as $key => $filterElement): ?>
                    <? if($filterElement['SELECTED']): ?>
                        <span class="ff_helvetica-neue-light"><? if(is_array($filterElement['PREVIEW_PICTURE'])):?><img src="<?=$filterElement['PREVIEW_PICTURE']['SRC']?>"><? endif ?><?=$filterElement['NAME']?></span>
                    <? else: ?>
                        <? $filterSectionID = $filterElement['PROPERTIES']['SECTION']['VALUE']?>
                        <a class="ff_helvetica-neue-light link_007eb4" href="/<?=$filterElement['FILTER_CODE']?>"><? if(is_array($filterElement['PREVIEW_PICTURE'])):?><img src="<?=$filterElement['PREVIEW_PICTURE']['SRC']?>"><? endif ?><?=$filterElement['NAME']?></a>
                    <? endif ?>
                    <? /*
                        if($key < $groupLength)
                            echo ' • ';
                    */ ?>
                <? endforeach ?>
                </div>
            <? endforeach ?>
            </div>
        </div>
        <? endif ?>

<?
$iGridWidth = 4;

   // var_dump($arParams);

//var_dump($arResult['SHOW_SMART_FILTER']);


//if ($USER->IsAdmin()): ?>

    <? //echo $arResult['SHOW_SMART_FILTER'];
    if(($arResult['SHOW_SMART_FILTER'] == '14') || ($arResult['SHOW_SMART_FILTER'] == '15')){
            //if ($USER->IsAdmin()){
         // strlen('<div id="bx_incl_area_8_1_1">'), strlen($arParams['SMART_FILTER_OUTPUT']) - strlen('<div id="bx_incl_area_8_1_1">') - strlen('</div>')));
        // echo html_entity_decode(substr($arParams['SMART_FILTER_OUTPUT'], 38, strlen($arParams['SMART_FILTER_OUTPUT']) - 46));
      //   echo html_entity_decode(substr($arParams['SMART_FILTER_OUTPUT'], 45, mb_strlen($arParams['SMART_FILTER_OUTPUT']) - 57));
                $iGridWidth = 3;

                echo html_entity_decode($arParams['SMART_FILTER_OUTPUT']);
        //$APPLICATION->ShowViewContent("right_area");
    //}
    }?>
<? //endif;  ?>


    <div class="b_grid_container">
        <?
            $itemCounter=0;
            $arrayCount=count($arResult['ITEMS']);
        ?>
        <? $zindex = 1000; ?>
        <?='<div class="b_grid_level grid_level_0px b_catalog-items-container">'?>
        <? if(($arResult['SHOW_SMART_FILTER'] == '25')){

           if($iGridWidth == 3){ ?>
            <div class="b_grid_unit-1-3">
            <? }else{ ?>
            <div class="b_grid_unit-1-4">
            <? } ?>
            <?          echo html_entity_decode($arParams['SMART_FILTER_OUTPUT']);
                        $itemCounter++;
            ?>
            </div>
        <? } ?>
<?php
$lteCategories = [];
$lteRegexp = '/^\/(' .
             'ipad\-5\/[^\/]+\/wifi_4g' .
             '|' .
             'ipad\-pro\/[^\/]+\/cellular' .
             '|' .
             'ipad\-mini4\/[^\/]+\/wi\-fi\-4g' .
             '|' .
             'ipad\-mini\-2\-retina\/[^\/]+\/wi\-fi\-4g' .
             '|' .
             'iphone\-5c\/(8|16|32)gb\/\w+' .
             '|' .
             'iphone\-5s\/(vip\/(color\/)?)?(16|32|64)gb\/\w+' .
             ')/is';
?>
        <? foreach($arResult['ITEMS'] as $arItem): ?>
            <? if($iGridWidth == 3){ ?>
            <div class="b_grid_unit-1-3">
            <? }else{ ?>
            <div class="b_grid_unit-1-4">
            <? } ?>
                <? $zindex-- ?>

                <div class="b_catalog-item" style="z-index:<?=$zindex?>">
                    <div class="cat_item_border"></div>
                    <? // && !$arResult['UF_BUY_DISABLE']
                    if($arItem['CAN_BUY']):?>
                        <? if($arResult['UF_BUY_DISABLE'] || $arItem["PROPERTIES"]["ZAPRET_POKUPKI"]["VALUE"] == "Да"): ?>
                        <div class="cat_item_buy">
                            <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
<?php
$buttonMessage = preg_match('/^\/iphone\-6S/is', $arItem["DETAIL_PAGE_URL"]) ? "Купить" : "Предзаказ";
?>
                                <a class="b_button button_green" style='width:190px;' href="<?=$arItem['ADD_URL']?>&preorder=Y"><i class="b_glyph glyph_cart-mini"></i> <?=$buttonMessage?></a>
                                <? /*Товар ожидается */ ?>
                            </div>
                        </div>
                        <? else: ?>
                        <div class="cat_item_buy">
                            <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
                                <a class="b_button button_green" href="<?=$arItem['ADD_URL']?>" product_id="<?=$arItem['ID']?>"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
                                <? /* <a class="b_button button_grey" href="<?=$arItem['ADD_URL']?>&credit=Y"><i class="b_glyph glyph_dollar"></i> В кредит</a> */ ?>
                                <a class="b_button button_sea oneClickBuyLink" href="<?=$arItem['ADD_URL']?>" data-buyid="<?=$arItem['ID']?>"><i class="b_glyph glyph_on_click-mini"></i> В 1 клик</a>
                            </div>
                        </div>
                        <? endif ?>
                    <? else: ?>
                        <div class="cat_item_buy">
                        <? //if($USER->IsAdmin()): ?>
                            <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
                                <a class="b_button button_green addElementPreorderLink" data-buyid="<?=$arItem["ID"]?>" href="javascript:void(0)" style="width: 170px;"><i class="b_glyph glyph_cart-mini"></i> Оформить предзаказ</a>
                            </div>
                        <? //endif;?>
                        </div>
                    <? endif ?>
                    <div class="cat_item_cont">
                        <div class="b_catalog-item_image-container">
                            <?php if (in_array($arItem['IBLOCK_SECTION_ID'], $lteCategories) || preg_match($lteRegexp, $arItem["DETAIL_PAGE_URL"])): ?>
                            <div class='lte_on_img_small'><a href='/lte/'><img src='/images/lte_small.png'></a></div>
                            <?php endif; ?>
                            <? if(is_array($arItem['PREVIEW_PICTURE'])):?>
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="b_catalog-item_image" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['NAME']?>"></a>
                            <? endif ?>
                        </div>
                        <div class="b_catalog-item_text ff_helvetica-neue-light color_007eb4 fs_18px margin-top_10px"><a class="link_007eb4" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=str_replace(chr(160),chr(32),$arItem['NAME'])?></a></div>
                        <div class="b_catalog-item_price ff_helvetica-neue-light color_259ccf fs_23px margin-top_5px">
                            <? if(!$arItem['CAN_BUY']):?>
                                <img src="/bitrix/images/catalog/waiting.png">
                            <? else: ?>
                                <? if($arItem['PRICES']['Продажа']['VALUE'] > $arItem['PRICES']['Продажа']['DISCOUNT_VALUE']):?>
                                <span>Цена:</span> <strong class="fs_bold" style="color: Red;"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE'])?></strong><br />
                                <span>Цена:</span> <strong class="fs_bold" style="text-decoration:line-through;"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['Продажа']['PRINT_VALUE'])?></strong>
                                <? elseif($arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']>0): ?>
                                <span>Цена:</span> <strong class="fs_bold"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['Продажа']['PRINT_VALUE'])?></strong>
                                <? endif ?>
                            <? endif ?>
                        </div>
                        <? if(!empty($arResult['UF_SECTION_CHARS'])): ?>
                        <div class="b_catalog-item_chars ff_helvetica-neue-light fs_12px margin-top_5px">
                            <ul>
                                <? if($arResult['HAS_MODEL']):?>
                                    <li class="fs_12px"><span>Модель:</span> <?=$arResult['UF_MODEL']?></li>
                                <? endif ?>
                                <? $count = 0 ?>
                                <? //var_dump($arResult['UF_SECTION_CHARS']);
                                foreach($arResult['UF_SECTION_CHARS'] as $sectionChar): ?>
                                    <? if($arItem['PROPERTIES'][$sectionChar]['VALUE']): ?>
                                    <li class="fs_12px"><span><?=$arItem['PROPERTIES'][$sectionChar]['NAME']?>:</span> <?=$arItem['PROPERTIES'][$sectionChar]['VALUE']?></li>
                                    <?
                                    $count++;
                                    endif;
                                    if($count > 3)
                                        break;
                                    ?>
                                <? endforeach ?>
                                <li class="fs_12px">
                                <? //$arResult['UF_BUY_DISABLE']='Y';
                                if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])){ ?>Артикул: <strong><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></strong><? } ?><? if($arResult['UF_BUY_DISABLE']):/*?><li class="fs_12px">Товар ожидается</li><?*/ elseif($arItem['CAN_BUY']):?>, есть в наличии<? endif; ?>
                                </li>
                            </ul>
                        </div>
                        <? endif ?>
                    </div>
                </div>

            </div>
            <?
                $itemCounter++;
                if($itemCounter%$iGridWidth==0 and $itemCounter!=$arrayCount){
                    echo('</div><div class="b_grid_level grid_level_5px b_catalog-items-container">');
                }
            ?>
        <? endforeach ?>
        <?='</div>'?>
    </div>


                    <div class="b_grid">
                        <div class="b_grid_level grid_level_10px ff_helvetica-neue-light">
                            <div class="b_grid_unit-1-2">
                            <? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                                <div class="display_inline-block ws_10px">
                                    <?=$arResult["NAV_STRING"]?><br />
                                </div>
                            <? endif;?>
                            </div>
                            <div class="b_grid_unit-1-2">
                            <? if($arResult['RATING']):?>
                                <div class="section_review">
                                    <div itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
                                        <div class="product_review">
                                            <meta content="<?=$arResult['ITEMS'][0]['DETAIL_PICTURE']['SRC']?>" itemprop="photo">
                                            <div class="fs_bold product_review_name" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">Оценка <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span>: </div>
                                            <div class="product_review_rating"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $arResult['RATING_ROUND']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
                                        </div>
                                        Рейтинг <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> на основе <a class="link_007eb4 link_decoration" href="<?=$arResult['RATING_LINK']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> отзывов</a>
                                    </div>
                                </div>
                            <? endif ?>
            <? if(preg_match('/iphone 5S/is',$arResult['NAME'])): ?>
                <div class="section_review"><a href='/show_news_obzor_apple_iphone_5s.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор Apple iPhone 5s'></a></div>
            <? endif ?>

            <? if(preg_match('/iphone 5C/is',$arResult['NAME'])): ?>
                <div class="section_review"><a href='/show_news_obzor-iphone-5c.html' target="_blank"><img src='/images/read_review_button.png' alt='Обзор Apple iPhone 5C'></a></div>
            <? endif ?>
                            </div>
                        <? /*
                            <div class="b_grid_unit-2-5">
                            <? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                                <div class="display_inline-block ws_10px">
                                    <?=$arResult["NAV_STRING"]?><br />
                                </div>
                            <? endif;?>
                            </div>
                            <div class="b_grid_unit-3-5 ta_right">
                                <a class="link_007eb4 scroll-top" href="#">Поднять наверх</a>
                            </div>
                        </div>
                        */ ?>
                    </div>
                    <? if($arResult['DESCRIPTION_2']):?>
                    <div class="b_line"></div>
                    <div class="b_grid">
                        <div class="b_grid_level grid_level_15px ff_helvetica-neue-roman fs_12px">
                            <div class="b_grid_unit">
                                <div class="margin-left-right_5px section_description">
                                    <?=((empty($_REQUEST['PAGEN_1']) && empty($_REQUEST['SHOWALL_1']))?htmlspecialchars_decode($arResult['DESCRIPTION_2']):"")?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? endif ?>
                    <? if($arResult['SEO_TEXT'] && empty($arResult['DESCRIPTION_2'])):?>
                    <div class="b_line"></div>
                    <div class="b_grid">
                        <div class="b_grid_level grid_level_15px ff_helvetica-neue-roman fs_12px section_description">
                        <?=$arResult['SEO_TEXT']?>
                        </div>
                    </div>
                    <? endif ?>

</div>
<script type="text/javascript">
$(document).ready(function() {
    var description_top = $('.section_description_top');
    if(description_top.outerHeight() > 110) {
        description_top.height('110');
        description_top.append('<div class="sect_top_show"><a href="#"></a></div>');
        $('a', description_top).click(function(e) {
            e.preventDefault();
            $('.sect_top_show', description_top).remove();
            description_top.height('auto');
        });
    }
});
    function showNote(cnm){

    }
</script>
<?endif?>