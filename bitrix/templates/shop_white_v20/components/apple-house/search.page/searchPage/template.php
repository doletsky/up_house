<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="mit-body">
    <div class="breadcrumbs">
        <a class="breadcrumbs-item" href="/">Главная</a>
        <div class="breadcrumbs-item">Поиск</div>
    </div>
    <div class="mit-content">
        <h1 class="mit-search_h1">Результаты поиска</h1>
        <form action="" method="get">
            <div class="mit-input">
                <a class="no-style-link" href="#"><i class="mit-glyph_search"></i></a>
                <input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" class="mit-b_input-text" placeholder="Поиск товара">
            </div>
        </form>
        <? if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):?>
        <div class="margin-top_15px fs_18px color_253487">
            <?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
        </div>
        <? endif ?>
        <? if(count($arResult["SEARCH"])>0): ?>
        <div class="mit-result">
            Найдено <b><?echo $arResult["NAV_RESULT"]->SelectedRowsCount()?></b> совпадений по запросу <b><?=$arResult["REQUEST"]["QUERY"]?></b>
        </div>
        <div class="b_grid margin-bottom_0px margin-top_10px ff_helvetica-neue-light fs_14px ws_20px">
            <div class="mit-result mit-ws_10px">
                <span class="mit-ws_normal">Сортировать по цене:</span>
                <a class="mit-underline_dotted mit-ws_normal" href="<?=$APPLICATION->GetCurPageParam("price=desc", array('price'))?>">Дорогие</a>
                <a class="mit-underline_dotted mit-ws_normal" href="<?=$APPLICATION->GetCurPageParam("price=asc", array('price'))?>">Дешевые</a>
            </div>
            <div class="mit-search-pagination">
                <div class="display_inline-block mit-ws_10px">
                    <?=$arResult["NAV_STRING"]?>
                </div>
            </div>
        </div>
        <div class="b_line"></div>
        <? endif ?>
        <div class="b_grid">
            <? if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
            <? elseif($arResult["ERROR_CODE"]!=0):?>
                <p><?=GetMessage("CT_BSP_ERROR")?></p>
                <?ShowError($arResult["ERROR_TEXT"]);?>
                <p><?=GetMessage("CT_BSP_CORRECT_AND_CONTINUE")?></p>
                <br /><br />
                <p><?=GetMessage("CT_BSP_SINTAX")?><br /><b><?=GetMessage("CT_BSP_LOGIC")?></b></p>
                <table border="0" cellpadding="5">
                    <tr>
                        <td align="center" valign="top"><?=GetMessage("CT_BSP_OPERATOR")?></td><td valign="top"><?=GetMessage("CT_BSP_SYNONIM")?></td>
                        <td><?=GetMessage("CT_BSP_DESCRIPTION")?></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top"><?=GetMessage("CT_BSP_AND")?></td><td valign="top">and, &amp;, +</td>
                        <td><?=GetMessage("CT_BSP_AND_ALT")?></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top"><?=GetMessage("CT_BSP_OR")?></td><td valign="top">or, |</td>
                        <td><?=GetMessage("CT_BSP_OR_ALT")?></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top"><?=GetMessage("CT_BSP_NOT")?></td><td valign="top">not, ~</td>
                        <td><?=GetMessage("CT_BSP_NOT_ALT")?></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">( )</td>
                        <td valign="top">&nbsp;</td>
                        <td><?=GetMessage("CT_BSP_BRACKETS_ALT")?></td>
                    </tr>
                </table>
            <? elseif(count($arResult["SEARCH"])>0):?>
                <div class="b_grid_level mit-grid_level_30px b_catalog-items-container">
                <? foreach($arResult["SEARCH"] as $key => $arItem):?>
                    <div class="mit-b_grid_unit-1-4">
                        <div class="mit-b_catalog-item">
                            <div class="b_catalog-item_image-container">
                            <?
                            $elSectionID = $arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['IBLOCK_SECTION_ID'];
                            //$disableBuy = $arResult["SEARCH_ITEMS_SECTIONS"][$elSectionID];
                            $disableBuy=false;
                            ?>
                            <? if(is_array($arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PREVIEW_PICTURE'])): ?>
                                <a href="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['DETAIL_PAGE_URL']?>"><img class="b_catalog-item_image" src="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PREVIEW_PICTURE']['SRC']?>" width="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PREVIEW_PICTURE']['WIDTH']?>" height="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PREVIEW_PICTURE']['HEIGHT']?>" alt="<?=$arItem['TITLE']?>"></a>
                            <? endif ?>
                            </div>
                            <div class="mit-b_catalog-item_title mit-margin-top_10px"><a class="link_007eb4" href="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['DETAIL_PAGE_URL']?>"><?=$arItem['TITLE']?></a></div>
                            <div class="mit-b_catalog-item_price">
                            <?
                            if($arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PRICES']['Продажа']['VALUE']):?>
                                <p class="mit-price1">цена &nbsp; </p><p class="mit-price2">
                                <?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['PRICES']['Продажа']['PRINT_DISCOUNT_VALUE']?>
                                </p>
                            <? endif ?>
                            </div>
                            
                            <ul class="catalog-pr-characteristics">
                                <? if($arItem['HAS_MODEL']):?>
                                    <li>Модель: <?=$arItem['UF_MODEL']?></li>
                                <? endif ?>
                                <? foreach($arItem['UF_SECTION_CHARS'] as $sectionChar): ?>
                                    <? if($arItem['PROPERTIES'][$sectionChar]['VALUE']): ?>
                                <li><?=$arItem['PROPERTIES'][$sectionChar]['NAME']?>: <?=$arItem['PROPERTIES'][$sectionChar]['VALUE']?></li>
                                    <? endif ?>
                                <? endforeach ?>
                                <? if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])):?>
                                    <li>Артикул: <span class="article"><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']?></span>, есть в наличии</li>
                                <? endif ?>
                            </ul>

                            <? if($arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['CAN_BUY'] && !$disableBuy): ?>
                            <div class="mit-margin-top_10px mit-item_buy">
                                <a class="mit-b_button mit-button_blue" href="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['ADD_URL']?>"><i class="b_glyph glyph_cart-mini"></i> купить</a>
                                <a class="mit-b_button mit-button_white" href="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['ADD_URL']?>&credit=Y"><i class="b_glyph glyph_dollar"></i> в 1 клик</a>
                            </div>
                            <? else: ?>
                            <div class="mit-margin-top_10px mit-item_buy">
                                <a class="mit-b_button_order mit-button_blue button-buy button-order-no-price addElementPreorderLink" data-purl="<?=$arResult["SEARCH_ITEMS"][$arItem['ITEM_ID']]['DETAIL_PAGE_URL']?>" data-buyid="7736" href="#">оформить предзаказ</a>
                            </div>
                            <? endif ?>
                        </div>
                    </div>
                    <? if(($key+1)%4 == 0): ?>
                </div>
                <div class="b_grid_level grid_level_30px b_catalog-items-container">
                    <? endif ?>
                <? endforeach;?>
                </div>
            <? else:?>
                            <div class="margin-bottom_40px margin-top_30px fs_18px color_253487">
                                По Вашему запросу ничего не найдено.<br>
                                Попробуйте его уточнить или проверьте правильность написания.
                            </div>
            <? endif;?>
        </div>
    </div>
</div>