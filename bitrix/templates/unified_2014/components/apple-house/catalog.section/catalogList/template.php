<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    //var_dump($arResult['ITEMS'][0]['DETAIL_PAGE_URL']);
//echo $arItem['DETAIL_PAGE_URL'];
//var_dump($arResult['SHOW_SMART_FILTER']);

?>
<?
//$iGridWidth = 4;

/*
if ($USER->IsAdmin()): ?>
    <?
    if (CModule::IncludeModule("iblock"))
    {
        $arFilter = array(
            "ACTIVE" => "Y",
            "GLOBAL_ACTIVE" => "Y",
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        );
        if(strlen($arResult["VARIABLES"]["SECTION_CODE"])>0)
        {
            $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
        }
        elseif($arResult["VARIABLES"]["SECTION_ID"]>0)
        {
            $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
        }

        $obCache = new CPHPCache;
        if($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
        {
            $arCurSection = $obCache->GetVars();
        }
        else
        {
            $arCurSection = array();
            $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));
            $dbRes = new CIBlockResult($dbRes);

            if(defined("BX_COMP_MANAGED_CACHE"))
            {
                global $CACHE_MANAGER;
                $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                if ($arCurSection = $dbRes->GetNext())
                {
                    $CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
                }
                $CACHE_MANAGER->EndTagCache();
            }
            else
            {
                if(!$arCurSection = $dbRes->GetNext())
                    $arCurSection = array();
            }

            $obCache->EndDataCache($arCurSection);
        }



            if($arResult['SHOW_SMART_FILTER'] == '15' || $arResult['SHOW_SMART_FILTER'] == '14'){
                $APPLICATION->IncludeComponent("apple-house:catalog.smart.filter", ".default", array(
                        "IBLOCK_TYPE" => "1c_catalog",
                        "IBLOCK_ID" => "8",
                        "SECTION_ID" => $arParams["SECTION_ID"],
                        "FILTER_NAME" => "arrFilter",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_GROUPS" => "Y",
                        "SAVE_IN_SESSION" => "N",
                        "INSTANT_RELOAD" => "N",
                        "PRICE_CODE" => array('Продажа'), //array("BASE"),
                    ),
                    false
                );//

                $iGridWidth = 3;
            }


    }
?>
<? endif; */ ?>

<section class="catalog-section main-section">
    <div class="catalog-header clearfix">
        <div class="catalog-row pull-left">
            <div class="breadcrumbs">
                <? /* $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadCrumbs_", Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => "-",
                    ),
                    false
                ); */ ?>
            </div>
            <h2 class="catalog-title entry-title"><?=$arResult['NAME']?></h2>
        </div>

        <div class="catalog-row-2 pull-left">
            <div class="catalog-desc">
                <?=htmlspecialchars_decode($arResult['DESCRIPTION_1'])?>
            </div>
        </div>

        <div class="catalog-row-3 pull-left">
            <div class="catalog-benefits">
<? /*                <img class="catalog-benefits-img" alt="При покупке iPhone 5S в магазине Up House Вы получаете" src="/bitrix/templates/unified_2014/private/images/theme_imgs/catalog-benefits.png"> */ ?>
                <?if(!empty($arResult['UF_BONUS'])): ?>
                <div>
                    <span class="ff_helvetica-neue-light color_black fs_14px">При покупке <?=$arResult['NAME']?> в магазине Up House Вы получаете:</span>
                    <div class="margin-top_15px fs_14px clearfix">
                        <? foreach($arResult['UF_BONUS'] as $bonus): ?>
                            <div class="b_tooltip-block">
                                <i class="b_glyph glyph-<?=$arResult['BONUS'][$bonus]['XML_ID']?>" title="<?=$arResult['BONUS'][$bonus]['VALUE']?>"></i>
<? /*                                <div class="b_tooltip-block_tooltip">
                                    <?=$arResult['BONUS'][$bonus]['VALUE']?>
                                </div> */ ?>
                            </div>
                        <? endforeach ?>
                    </div>
                </div>
                <?endif;?>

            </div>
        </div>
    </div>



    <nav class="catalog-menu-apps clearfix">
        <? if(!empty($arResult['SECTION_FILTER'])): ?>
            <? foreach($arResult['SECTION_FILTER'] as $key => $filterGroup):?>
                <? foreach($filterGroup as $key => $filterElement): ?>
                    <? $filterSectionID = $filterElement['PROPERTIES']['SECTION']['VALUE']?>
                    <a class="catalog-menu-apps-item<?($filterElement['SELECTED'] ? ' current' : '')?>" href="/<?=$arResult['SECTIONS'][$filterSectionID]['CODE']?>"><?=$filterElement['NAME']?></a>
                <? endforeach ?>
            <? endforeach ?>
        <? endif ?>

        <? if(!empty($arResult['SECTION_LINKS'])) :?>
            <?
            //$totalLinks = count($arResult['SECTION_LINKS'])-1;
            foreach($arResult['SECTION_LINKS'] as $key => $sectionLink) {
                if($sectionLink['UF_ACTIVE']) {
                    echo '<a class="catalog-menu-apps-item" href="/' . $sectionLink['CODE'] . '">' . $sectionLink['NAME'] . '</a>';
                }
            }?>
        <? endif;?>

    </nav>


    <div class="clearfix">


    <? echo html_entity_decode($arParams['SMART_FILTER_OUTPUT']); ?>

    <!-- каталог контент -->
    <div class="catalog-pr-content">
        <? foreach($arResult['ITEMS'] as $arItem): ?>

            <div class="catalog-pr-item">
                <div class="catalog-pr-picture<?=(preg_match('/^apple iphone 5S|^apple iphone 5C|^apple ipad air(.*)Cellular|^apple ipad mini 2 retina(.*)4G/is', $arItem['NAME']) ? " lte_icon" : "");?>">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <img alt="<?=$arItem['NAME']?>" class="catalog-pr-picture-img" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
                    </a>
                </div>
                <div class="catalog-pr-title">
                    <a class="catalog-pr-title-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <?=str_replace(chr(160),chr(32),$arItem['NAME'])?>
                    </a>
                </div>
                <div class="catalog-pr-price">
                    <span class="catalog-pr-price-text">цена</span>
                    <span class="catalog-pr-price-text-2"><?=str_replace(' ', "&nbsp;", PriceDigitExtractor($arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']))?> <span class="cy">руб.</span></span>
                </div>

                <? if(!empty($arResult['UF_SECTION_CHARS'])): ?>
                    <ul class="catalog-pr-characteristics">

                            <? if($arResult['HAS_MODEL']):?>
                                <li class="fs_12px"><span>Модель:</span> <?=$arResult['UF_MODEL']?></li>
                            <? endif ?>
                            <? $count = 0 ?>
                            <? foreach($arResult['UF_SECTION_CHARS'] as $sectionChar): ?>
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
                                if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])){ ?>Артикул: <span class="article"><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></span><? } ?><? if($arResult['UF_BUY_DISABLE']):/*?><li class="fs_12px">Товар ожидается</li><?*/ elseif($arItem['CAN_BUY']):?>, есть в наличии<? endif; ?>
                            </li>
                        </ul>
                <? endif ?>
<? /*
                    <li>Модель: <?=$arResult['UF_MODEL']?></li>
                    <li>Процессор: Apple A7, Apple M7 (coprocessor)</li>
                    <li>Объем памяти: 16 Гб</li>
                    <li>Цвет: белый/серебристый</li>
                    <li>Артикул: <span class="article">1493</span>, есть в наличии</li>
*/?>

                <div class="catalog-pr-buy">
                    <a class="button-buy button-bg b_button button_green oneClickBuyLink" href="#">купить</a>
                    <a id="" class="button-buy button-one-click" href="#">в 1 клик</a>
                </div>
            </div>
        <? endforeach ?>
    </div>
<? /*
    <div class="b_grid_container">
        <?
        $itemCounter=0;
        $arrayCount=count($arResult['ITEMS']);
        ?>
        <? $zindex = 1000; ?>
        <?='<div class="b_grid_level grid_level_0px b_catalog-items-container">'?>
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
                        <? if($arResult['UF_BUY_DISABLE']): ?>
                            <div class="cat_item_buy">
                                <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
                                    <a class="b_button button_green" style='width:190px;' href="<?=$arItem['ADD_URL']?>&preorder=Y"><i class="b_glyph glyph_cart-mini"></i> Предзаказ</a>
                                    <? /*Товар ожидается */
/*?>
                                </div>
                            </div>
                        <? else: ?>
                            <div class="cat_item_buy">
                                <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
                                    <a class="b_button button_green" href="<?=$arItem['ADD_URL']?>" product_id="<?=$arItem['ID']?>"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
                                    <? /* <a class="b_button button_grey" href="<?=$arItem['ADD_URL']?>&credit=Y"><i class="b_glyph glyph_dollar"></i> В кредит</a> */
/*?>
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
                            <? if(preg_match('/^apple iphone 5S|^apple iphone 5C|^apple ipad air(.*)Cellular|^apple ipad mini 2 retina(.*)4G/is',$arItem['NAME'])){ ?><div class='lte_on_img_small'><a href='/lte/'><img src='/images/lte_small.png'></a></div> <? } ?>
                            <? if(is_array($arItem['PREVIEW_PICTURE'])):?>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="b_catalog-item_image" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['NAME']?>"></a>
                            <? endif ?>
                        </div>
                        <div class="b_catalog-item_text ff_helvetica-neue-light color_007eb4 fs_18px margin-top_10px"><a class="link_007eb4" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=str_replace(chr(160),chr(32),$arItem['NAME'])?></a></div>
                        <div class="b_catalog-item_price ff_helvetica-neue-light color_79b70d fs_23px margin-top_5px">
                            <? if(!$arItem['CAN_BUY']):?>
                                <img src="/bitrix/images/catalog/waiting.png">
                            <? else: ?>
                                <? if($arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT']>0): ?>
                                    <span>Цена:</span> <strong class="fs_bold"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE_VAT'])?></strong>
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
                                    <? foreach($arResult['UF_SECTION_CHARS'] as $sectionChar): ?>
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
                                        if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])){ ?>Артикул: <strong><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></strong><? } ?><? if($arResult['UF_BUY_DISABLE']):/*?><li class="fs_12px">Товар ожидается</li><?*/
/*elseif($arItem['CAN_BUY']):?>, есть в наличии<? endif; ?>
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


*/?>
        <!-- /каталог контент -->
    </div>





        <div class="catalog-container mt-5 clearfix">
            <div class="catalog-pagination pull-left">
                <? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                    <?=$arResult["NAV_STRING"]?><br />
                <? endif;?>
<? /*
                <a href="#" class="catalog-pagination-item">Все</a>
                <a href="#" class="catalog-pagination-item">1</a>
 */ ?>
            </div>

            <div class="reviews-block pull-left">
                <span class="reviews-block-text">Оценка <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span></span>
                <div class="reviews-stars"><img src="/bitrix/templates/unified_2014/private/images/theme_imgs/reviews-stars.png" alt="5 звёзд"></div><br />
                <span class="reviews-block-text">Рейтинг 5 на основе</span>
                <a href="<?=$arResult['RATING_LINK']?>" class="reviews-block-link">10 отзывов</a>
            </div>

            <? if(preg_match('/iphone 5S/is',$arResult['NAME'])): ?>
                <div class="product-review pull-left">
                    <a href="/show_news_obzor_apple_iphone_5s.html" class="product-button">
                        читать обзор<br />
                        iPhone 5S<i class="text-icon product-sprite"></i>
                    </a>
                </div>
            <? endif ?>

            <? if(preg_match('/iphone 5C/is',$arResult['NAME'])): ?>
                <div class="product-review pull-left">
                    <a href="/show_news_obzor-iphone-5c.html" class="product-button">
                        читать обзор<br />
                        iPhone 5C<i class="text-icon product-sprite"></i>
                    </a>
                </div>
            <? endif ?>

        </div>
</section>

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


		<? /* if(!empty($arResult['SECTION_FILTER'])): ?>
		<div class="b_grid margin-top_5px">
			<div class="b_grid_level margin-bottom_5px">
			<? foreach($arResult['SECTION_FILTER'] as $key => $filterGroup):?>
				<? //$groupLength = count($filterGroup)-1 ?>
				<div class="filter_cont filter_cont_<?=$key?>">
				<? foreach($filterGroup as $key => $filterElement): ?>
					<? if($filterElement['SELECTED']): ?>
						<span class="ff_helvetica-neue-light"><? if(is_array($filterElement['PREVIEW_PICTURE'])):?><img src="<?=$filterElement['PREVIEW_PICTURE']['SRC']?>"><? endif ?><?=$filterElement['NAME']?></span>
					<? else: ?>
						<? $filterSectionID = $filterElement['PROPERTIES']['SECTION']['VALUE']?>
						<a class="ff_helvetica-neue-light link_007eb4" href="/<?=$arResult['SECTIONS'][$filterSectionID]['CODE']?>"><? if(is_array($filterElement['PREVIEW_PICTURE'])):?><img src="<?=$filterElement['PREVIEW_PICTURE']['SRC']?>"><? endif ?><?=$filterElement['NAME']?></a>
					<? endif ?>
				<? endforeach ?>
				</div>
			<? endforeach ?>
			</div>
		</div>
		<? endif */ ?>

<?
$iGridWidth = 4;

   // var_dump($arParams);

//var_dump($arResult['SHOW_SMART_FILTER']);


//if ($USER->IsAdmin()): ?>

    <?/* // if($arResult['SHOW_SMART_FILTER'] == '15' || $arResult['SHOW_SMART_FILTER'] == '14'){
        $iGridWidth = 3;
    //if ($USER->IsAdmin()){
         // strlen('<div id="bx_incl_area_8_1_1">'), strlen($arParams['SMART_FILTER_OUTPUT']) - strlen('<div id="bx_incl_area_8_1_1">') - strlen('</div>')));
        // echo html_entity_decode(substr($arParams['SMART_FILTER_OUTPUT'], 38, strlen($arParams['SMART_FILTER_OUTPUT']) - 46));
      //   echo html_entity_decode(substr($arParams['SMART_FILTER_OUTPUT'], 45, mb_strlen($arParams['SMART_FILTER_OUTPUT']) - 57));
         echo html_entity_decode($arParams['SMART_FILTER_OUTPUT']);

        //$APPLICATION->ShowViewContent("right_area");
    //}
    //} */ ?>
<? //endif;  ?>



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
</script>