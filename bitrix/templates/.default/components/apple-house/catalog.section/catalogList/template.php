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
                        "PRICE_CODE" => array('�������'), //array("BASE"),
                    ),
                    false
                );//

                $iGridWidth = 3;
            }


    }
?>
<? endif; */ ?>
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
                                    echo ' � ';
                            }
                        }?>
                    </div>
                    <?
                    }
                    if(!empty($arResult['UF_BONUS'])): ?>
                    <div>
                        <span class="ff_helvetica-neue-light color_black fs_14px">��� ������� <?=$arResult['NAME']?> � �������� Up-House �� ���������:</span>
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
                            'NAME'=>'���',
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
                            'NAME'=>'���',
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
                            'NAME'=>'���',
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
                            echo ' � ';
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
                        <? if($arResult['UF_BUY_DISABLE'] || $arItem["PROPERTIES"]["ZAPRET_POKUPKI"]["VALUE"] == "��"): ?>
                        <div class="cat_item_buy">
                            <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
<?php
$buttonMessage = preg_match('/^\/iphone\-6S/is', $arItem["DETAIL_PAGE_URL"]) ? "������" : "���������";
?>
                                <a class="b_button button_green" style='width:190px;' href="<?=$arItem['ADD_URL']?>&preorder=Y"><i class="b_glyph glyph_cart-mini"></i> <?=$buttonMessage?></a>
                                <? /*����� ��������� */ ?>
                            </div>
                        </div>
                        <? else: ?>
                        <div class="cat_item_buy">
                            <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
                                <a class="b_button button_green" href="<?=$arItem['ADD_URL']?>" product_id="<?=$arItem['ID']?>"><i class="b_glyph glyph_cart-mini"></i> ������</a>
                                <? /* <a class="b_button button_grey" href="<?=$arItem['ADD_URL']?>&credit=Y"><i class="b_glyph glyph_dollar"></i> � ������</a> */ ?>
                                <a class="b_button button_sea oneClickBuyLink" href="<?=$arItem['ADD_URL']?>" data-buyid="<?=$arItem['ID']?>"><i class="b_glyph glyph_on_click-mini"></i> � 1 ����</a>
                            </div>
                        </div>
                        <? endif ?>
                    <? else: ?>
                        <div class="cat_item_buy">
                        <? //if($USER->IsAdmin()): ?>
                            <div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
                                <a class="b_button button_green addElementPreorderLink" data-buyid="<?=$arItem["ID"]?>" href="javascript:void(0)" style="width: 170px;"><i class="b_glyph glyph_cart-mini"></i> �������� ���������</a>
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
                                <? if($arItem['PRICES']['�������']['VALUE'] > $arItem['PRICES']['�������']['DISCOUNT_VALUE']):?>
                                <span>����:</span> <strong class="fs_bold" style="color: Red;"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['�������']['PRINT_DISCOUNT_VALUE'])?></strong><br />
                                <span>����:</span> <strong class="fs_bold" style="text-decoration:line-through;"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['�������']['PRINT_VALUE'])?></strong>
                                <? elseif($arItem['PRICES']['�������']['PRINT_DISCOUNT_VALUE_VAT']>0): ?>
                                <span>����:</span> <strong class="fs_bold"><?=str_replace(' ', "&nbsp;", $arItem['PRICES']['�������']['PRINT_VALUE'])?></strong>
                                <? endif ?>
                            <? endif ?>
                        </div>
                        <? if(!empty($arResult['UF_SECTION_CHARS'])): ?>
                        <div class="b_catalog-item_chars ff_helvetica-neue-light fs_12px margin-top_5px">
                            <ul>
                                <? if($arResult['HAS_MODEL']):?>
                                    <li class="fs_12px"><span>������:</span> <?=$arResult['UF_MODEL']?></li>
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
                                if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])){ ?>�������: <strong><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></strong><? } ?><? if($arResult['UF_BUY_DISABLE']):/*?><li class="fs_12px">����� ���������</li><?*/ elseif($arItem['CAN_BUY']):?>, ���� � �������<? endif; ?>
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
                                            <div class="fs_bold product_review_name" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">������ <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span>: </div>
                                            <div class="product_review_rating"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $arResult['RATING_ROUND']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
                                        </div>
                                        ������� <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> �� ������ <a class="link_007eb4 link_decoration" href="<?=$arResult['RATING_LINK']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> �������</a>
                                    </div>
                                </div>
                            <? endif ?>
            <? if(preg_match('/iphone 5S/is',$arResult['NAME'])): ?>
                <div class="section_review"><a href='/show_news_obzor_apple_iphone_5s.html' target="_blank"><img src='/images/read_review_button.png' alt='����� Apple iPhone 5s'></a></div>
            <? endif ?>

            <? if(preg_match('/iphone 5C/is',$arResult['NAME'])): ?>
                <div class="section_review"><a href='/show_news_obzor-iphone-5c.html' target="_blank"><img src='/images/read_review_button.png' alt='����� Apple iPhone 5C'></a></div>
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
                                <a class="link_007eb4 scroll-top" href="#">������� ������</a>
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
</script>