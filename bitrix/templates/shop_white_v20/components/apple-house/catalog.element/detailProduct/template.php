<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <!-- bufferig out in header -->
<?$this->SetViewTarget("submenu_catalog");?>
    <div class="row">
        <div class="col-xs-12">
            <?//$firstSectionCode=explode("/",$APPLICATION->GetCurPage());?>

            <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","",
                Array(
                    "VIEW_MODE" => "TEXT",
                    "SHOW_PARENT_NAME" => "Y",
                    "IBLOCK_TYPE" => "1c_catalog",
                    "IBLOCK_ID" => "8",
                    "SECTION_ID" => "",
                    "SECTION_CODE" => "",//$firstSectionCode[1],
                    "SECTION_URL" => "",
                    "COUNT_ELEMENTS" => "Y",
                    "TOP_DEPTH" => "3",
                    "SECTION_FIELDS" => "",
                    "SECTION_USER_FIELDS" => "",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "Y",
                    "CARUSEL_CODE" => $arResult['SECTION']['PATH'][0]["CODE"],
                    "CUR_CODE" => $arResult['SECTION']['PATH'][1]["CODE"],
                    "DETAIL_PAGE" => "Y"
                )
            );?>
        </div>
    </div>
<?$this->EndViewTarget();?>


    <!-- �������� �������� ������ -->
    <div id="page-product-info">

    <!-- ������� ���� �������� ������ -->
    <div class="main-shadow">
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs-item">�������</a>
            <?foreach($arResult['SECTION']['PATH'] as $path):?>
            <a href="/<?=$path["CODE"]?>" class="breadcrumbs-item"><?=$path["NAME"]?></a>
            <?endforeach;?>
            <div class="breadcrumbs-item"><?=$arResult['NAME']?></div>
        </div>
        <!-- /breadcrumbs -->

        <section class="product-info">
            <div class="clearfix mb-3">
                <div class="pull-left">
                    <h1 class="product-title entry-title"><?=$arResult['NAME']?></h1>
                </div>

                <div class="pull-right">
                    <!-- ���������� ������ -->
                    <div class="social-button">
                        <a href="#" class="social-icon facebook" title="facebook" onclick="window.open('http://www.facebook.com/sharer.php?u=<?=$_SERVER['HTTP_ORIGIN'].$APPLICATION->GetCurPage()?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
                        <a href="#" class="social-icon vk" title="vk" onclick="window.open('http://vkontakte.ru/share.php?url=<?=$_SERVER['HTTP_ORIGIN'].$APPLICATION->GetCurPage()?>&title=<?=$arResult['NAME']?>&image=<?=$arResult["DETAIL_PICTURE"]['SRC']?>&description=', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
                        <a href="#" class="social-icon twitter" title="twitter" onclick="window.open('http://twitter.com/share?text=<?=mb_convert_encoding($arResult['NAME'], "utf-8", "windows-1251")?>&url=<?=$_SERVER['HTTP_ORIGIN'].$APPLICATION->GetCurPage()?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
                    </div>
                    <!-- /���������� ������ -->
                    <? if(!empty($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'])):?>
                    <div class="product-article">������� ������: <span class="article-pr"><?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></span></div>
                    <?endif?>
                </div>
            </div>

            <div class="row">
                <!-- ����� ������� -->
                <div class="col-xs-6">


                    <div class="product-info-img" data-id="0" id="fancy-box-phantom">
                        <img id="main-img" itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" title="<?=$arResult['NAME']?>" />
                    </div>

                    <?  if ($arResult["ARR_IMAGES"]["VALUE"]): ?>
                        <div class="product-thumbnail" rel="group1" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
                            <?=CFile::ShowImage($arResult['DETAIL_PICTURE']['SRC'], 70, 70)?>
                        </div>
                        <?  $iCounter = 0; $current=" current";
                        foreach($arResult["ARR_IMAGES"]["VALUE"] as $imgCode):
                            if(4 < ++$iCounter)
                                break;
                            ?>
                            <?$renderImage = CFile::ResizeImageGet($imgCode, array("width" => 70, "height" => 100));?>
                            <?$renderImageFull = CFile::ResizeImageGet($imgCode, array("width" => 400, "height" => 400));?>
                            <div class="product-thumbnail" rel="group1" href="<?=$renderImageFull['src']?>">
                                <img itemprop="image" src="<?=$renderImage['src']?>" alt="<?=$arResult['NAME']?>" title="<?=$arResult['NAME']?>" imgcode="<?=$imgCode?>" />
                            </div>
                            <?//$current="";?>
                        <? endforeach; ?>
                        <div class="product-thumbnail current"></div>
                    <? endif ?>


                    <div class="product-review mt-4">
                        <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                                <a class="product-button" href='#' onclick='$.fancybox("<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>\" frameborder=\"0\" allowfullscreen></iframe>"); return false;'>
                                    ����� �����<i class="play-icon product-sprite"></i></a>
                        <? endif ?>
                        <? if(preg_match('/apple iphone 5S/is',$arResult['NAME'])): ?>
                            <a href='/show_news_obzor_apple_iphone_5s.html' target="_blank" class="product-button">������ �����<i class="text-icon product-sprite"></i></a>
                        <? elseif(preg_match('/apple iphone 5C/is',$arResult['NAME'])): ?>
                            <a href='/show_news_obzor-iphone-5c.html' target="_blank" class="product-button">������ �����<i class="text-icon product-sprite"></i></a>
                        <? elseif(preg_match('/apple iphone 6 plus/is',$arResult['NAME'])): ?>
                            <a href='/show_news_iphone6_plus.html' target="_blank" class="product-button">������ �����<i class="text-icon product-sprite"></i></a>
                        <? elseif(preg_match('/apple iphone 6/is',$arResult['NAME'])): ?>
                            <a href='/show_news_iphone6.html' target="_blank" class="product-button">������ �����<i class="text-icon product-sprite"></i></a>
                        <? elseif('gadgets/sport/action_camera/GoPro' == $arResult['SECTION']['CODE']): ?>
                            <a href='/show_news_gopro.html' target="_blank" class="product-button">������ �����<i class="text-icon product-sprite"></i></a>
                        <? endif ?>
                        <a href="http://www.up-house.ru/faq/" class="product-button">����������<i class="text-icon product-sprite"></i></a>
                    </div>

                    <div class="accept mt-2">
                        <? if($arResult['OTHER_COLORS']){ ?>

                            <div class="element_other_colors">
                                � ������ ������:<br>
                                <? foreach($arResult['OTHER_COLORS'] as $other_color){
                                    $color='';
                                    $secondcolor='';
                                    $color_name=$other_color['NAME'];

                                    foreach($arResult['colors_hex'] as $cname=>$hex){

                                        if(preg_match('/'.mb_strtolower($cname).'/is', mb_strtolower($other_color['NAME']))){
                                            if(empty($color)){
                                                $color=$hex;
                                            }else{
                                                $secondcolor=$hex;
                                            }
                                        }
                                    }
                                    ?>
                                    <div title='<?=$color_name;?>' class="element_other_color_one" style='background:<?=$color;?>' onclick="location.href='/<?=$other_color['PROPERTY_CML2_CODE_VALUE'];?>'" ><div style='background:<?=$secondcolor;?>' class='element_other_color_one_two'></div></div>
                                <? } ?>
                            </div>
                        <? } ?>
                    </div>
                </div>

                <!-- ������ ������� -->
                <div class="col-xs-6">
<?if($arResult['CAN_BUY'] && $arResult["PROPERTIES"]["ZAPRET_POKUPKI"]["VALUE"] != "��"):?>
                    <!-- ���� -->
                    <div class="price">
                        <div class="price-text">����:</div>
                        <? if($arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE']):?>
                        <div class="price-num" data-price="<?=$arResult['PRICES']['�������']['DISCOUNT_VALUE']?>"><?=str_replace('���.', '<span class="rub">���.</span>', $arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE'])?></div>
                        <? elseif($arResult['PRICES']['�������']['PRINT_VALUE']):?>
                            <div class="price-num" data-price="<?=$arResult['PRICES']['�������']['VALUE']?>"><?=str_replace('���.', '<span class="rub">���.</span>',$arResult['PRICES']['�������']['PRINT_VALUE'])?></div>
                        <? endif ?>
                    </div>


    <? if(count($arResult["SECTION"]["OPTIONS"])):?>
                    <!-- �������������� ������ -->
                    <div class="additional-services">
                        <h3 class="additional-services-title">�������������� ������:</h3>
                        <div class="option_group">
        <? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
<!--                        <pre>--><?//print_r($optionGroup)?><!--</pre>-->
            <? if(!empty($optionGroup["ITEMS"])): ?>
                <? if($optionGroup['ID'] == '228' || $optionGroup['ID'] == '304'):?>
                    <a href="/inet" target="_blank" class="option_additional_link">��������� � �������</a>
                <? endif;?>
                <?
                $someComment = false;

                if($optionGroup['NAME'] == '���-����� � �������')
                    $someComment = '<a href="/tariff" target="_blank" class="option_additional_comment">������� �������� �����</a>';
                if($optionGroup['NAME'] == '���������')
                    $someComment = '<a href="/brands/sony/headset" target="_blank" class="option_additional_comment">������� ���� ���������</a>';

                ?>
                <? if(count($optionGroup["ITEMS"]) > 1): ?>
                    <?
                    $someComment = false;
                    if($optionGroup['NAME'] == '���-����� � �������')
                        $someComment = '<a href="/tariff" target="_blank" class="option_additional_comment">������� �������� �����</a>';
                    if($optionGroup['NAME'] == '���������')
                        $someComment = '<a href="/brands/sony/headset" target="_blank" class="option_additional_comment">������� ���� ���������</a>';

                    ?>
                    <div class="additional-services-item clearfix">
                        <div class="input-checkbox">
                            <input type="checkbox" value="None" id="input-checkbox-<?=$optionGroup["ID"]?>" name="PROP_<?=$optionGroup["ID"]?>" checked="checked" disabled/>
                            <label for="input-checkbox-<?=$optionGroup["ID"]?>"></label>
                        </div>
                        <div class="additional-services-text">
                            <?=$optionGroup["NAME"]?>
                            <? if($optionGroup['NAME'] == '��������� �� �������'):?>
                                <? if(  $arResult['SECTION']['ID'] == 261
                                    || $arResult['SECTION']['ID'] == 263
                                    || $arResult['SECTION']['ID'] == 377
                                ):?>
                                    (<a href="/iphone-6/accessories/set" target="_blank" class="option_additional_comment">���������</a>)
                                <? endif ?>
                                <? if(  $arResult['SECTION']['ID'] == 385
                                    || $arResult['SECTION']['ID'] == 386
                                    || $arResult['SECTION']['ID'] == 387
                                    || $arResult['SECTION']['ID'] == 384
                                ):?>
                                    (<a href="/iphone-6-plus/accessories/set" target="_blank" class="option_additional_comment">���������</a>)
                                <? endif ?>
                            <? endif ?>
                        </div>
                    </div>
                    <div style="padding-left: 23px" class="group-radio">
                        <div class="additional-services-item clearfix">
                            <div class="input-checkbox">
                                <input type="checkbox" value="None" id="input-checkbox-no-<?=$optionGroup["ID"]?>" name="NO_PROP_<?=$optionGroup["ID"]?>" checked="checked"/>
                                <label for="input-checkbox-no-<?=$optionGroup["ID"]?>"></label>
                            </div>
                            <div class="additional-services-text">�� ���������</div>
                        </div>
                        <?foreach($optionGroup["ITEMS"] as $item):?>
                            <div class="additional-services-item clearfix">
                                <div class="input-checkbox">
                                    <input type="checkbox" value="<?=$item["ID"]?>" id="input-checkbox-<?=$item["ID"]?>" name="PROP_<?=$item["ID"]?>"<? if($item['CATALOG_PRICE_1'] > 0):?> data-price="<?=$item['PRICES']['�������']['VALUE_VAT']?>"<?else:?> data-price="0"<? endif; ?> />
                                    <label for="input-checkbox-<?=$item["ID"]?>"></label>
                                </div>
                                <div class="additional-services-text">
                                    <?=$item["NAME"]?> <? if($item['CATALOG_PRICE_1'] > 0):?>(<?=$item['PRICES']['�������']['PRINT_VALUE_VAT']?>)&nbsp;<? endif; ?><? if ($someComment): ?>(<?=$someComment?>)<? endif ?>
                                </div>
                            </div>
                        <?endforeach?>
                    </div>

                <? else: ?>
                    <? $option = $optionGroup["ITEMS"][0];
                    if($option['CATALOG_PRICE_1'] == 0 && $someComment == false) $someComment = '���������';
                    ?>
                    <div class="additional-services-item clearfix">
                        <div class="input-checkbox">
                            <input type="checkbox" value="<?=$optionGroup["ITEMS"][0]["ID"]?>" id="input-checkbox-<?=$optionGroup["ITEMS"][0]["ID"]?>" name="PROP_<?=$optionGroup["ITEMS"][0]["ID"]?>"<? if($option['CATALOG_PRICE_1'] > 0):?> data-price="<?=$option['PRICES']['�������']['VALUE_VAT']?>"<?else:?> data-price="0"<? endif; ?> />
                            <label for="input-checkbox-<?=$optionGroup["ITEMS"][0]["ID"]?>"></label>
                        </div>
                        <div class="additional-services-text" style="width: 340px;">
                            <?=$optionGroup["ITEMS"][0]["NAME"]?> <? if($option['CATALOG_PRICE_1'] > 0):?>(<?=$option['PRICES']['�������']['PRINT_VALUE_VAT']?>)&nbsp;<? endif; ?><? if ($someComment): ?>(<?=$someComment?>)<? endif ?>
                            <? if(  $arResult['SECTION']['ID'] == 502 // Apple Watch
                                || $arResult['SECTION']['ID'] == 503 // Apple Watch Edition
                                || $arResult['SECTION']['ID'] == 504 // Apple Watch Sport
                            ):
                                ?>
                                <? if ($optionGroup['ID'] == 889 // ����� ��
                            ):
                                ?>
                                (<a href="/gadgets/watch/iwatch/accessories/cases" target="_blank" class="option_additional_comment">���������</a>)
                            <? endif ?>
                                <? if ($optionGroup['ID'] == 888 // ������� ������� ��
                            ):
                                ?>
                                (<a href="/gadgets/watch/iwatch/accessories/bands" target="_blank" class="option_additional_comment">���������</a>)
                            <? endif ?>
                            <? endif ?>
                            <?// if(  $arResult['SECTION']['IBLOCK_SECTION_ID'] == 182 // MacBook Air
                            //   || $arResult['SECTION']['IBLOCK_SECTION_ID'] == 181 // MacBook Pro Retina
                            //   ):
                            ?>
                            <? if ($optionGroup['ID'] == 923 // ����� �� MacBook Air
                            ):
                                ?>
                                (<a href="/macbook/cases/air" target="_blank" class="option_additional_comment">���������</a>)
                            <? endif ?>
                            <? if ($optionGroup['ID'] == 927 // ����� �� MacBook Pro Retina
                            ):
                                ?>
                                (<a href="/macbook/cases/pro_retina" target="_blank" class="option_additional_comment">���������</a>)
                            <? endif ?>
                            <? if ($optionGroup['ID'] == 891 // ����� �� MacBook 12
                            ):
                                ?>
                                (<a href="/macbook/12/macbook/cases" target="_blank" class="option_additional_comment">���������</a>)
                            <? endif ?>
                        </div>
                    </div>
                <?endif?>

            <?endif?>
        <?endforeach?>
                    </div>
                    </div>
    <?endif?>

                    <!-- ������ ������ -->
                    <div class="product-buy">
                        <a href="<?=$arResult['ADD_URL']?>" class="button-buy" onclick="var h=$(this).attr('href');$.get(h);RefreshBasketAmount();addCartPopup();return false;">������</a>
                        <a href="#" class="button-one-click button-credit" data-buyid="<?=$arResult['ID']?>" style="float: none">������ � ���� ����</a>
                    </div>
<?else:?>
    <div class="price">
        <div class="price-text">����:</div>
        <? if($arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE']):?>
            <div class="price-num" data-price="<?=$arResult['PRICES']['�������']['DISCOUNT_VALUE']?>"><?=str_replace('���.', '<span class="rub">���.</span>', $arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE'])?></div>
        <? elseif($arResult['PRICES']['�������']['PRINT_VALUE']):?>
            <div class="price-num" data-price="<?=$arResult['PRICES']['�������']['VALUE']?>"><?=str_replace('���.', '<span class="rub">���.</span>',$arResult['PRICES']['�������']['PRINT_VALUE'])?></div>
        <? endif ?>
    </div>
    <div class="product-buy" style="margin-bottom: 60px">
        <a style="margin-right: 220px;" href="#" class="button-buy b_button-buy no-style-link addElementPreorderLink" data-buyid="<?=$arResult['ID']?>">�������� ���������</a>
    </div>
<?endif?>


                    <!-- �������� �������� -->
                    <?if(strlen($arResult["PREVIEW_TEXT"])>0):?>
                    <article class="product-desc">
                        <?=$arResult["PREVIEW_TEXT"]?>
                    </article>
                    <?endif?>

                    <?
                    $isAcceptedOwnGet = (  !isset($arResult['PROPERTIES']['SAMOYVYVOZ']['VALUE'])
                    || trim($arResult['PROPERTIES']['SAMOYVYVOZ']['VALUE']) != "��"
                    ) ? true : false;

                    $APPLICATION->IncludeComponent("altasib:altasib.geoip",
                    "deliveryInfo_v20",
                    array(
                    'CACHE_TIME' => 0,
                    'CACHE_TYPE' => 'N',
                    'DELIVERY' => $arResult["DELIVERY"],
                    'CAN_BUY' => $arResult['CAN_BUY'],
                    'GET_BY_OWN_ACCEPT' => $isAcceptedOwnGet,
                    ),
                    false);
                    ?>

                </div>
            </div>

        </section>
    </div>
    <!-- /������� ���� �������� ������ -->

    <!-- ������������ -->
<? if(!empty($arResult['SECTION']['INFO']['UF_BONUS'])): ?>
    <section class="advantage main-shadow">
        <h2 class="advantage-title">��� ������� <?=$arResult['SECTION']['NAME']?> � �������� UP-House �� ���������:</h2>
    <div class="advantage-container clearfix">
    <? foreach($arResult['SECTION']['INFO']['UF_BONUS'] as $key => $bonus):
        if(!in_array($arResult['SECTION']['BONUS'][$bonus]['XML_ID'], array("check", "round-arrow", "car", "masonry", "ru", "sim"))) continue;?>
        <div class="advantage-item">
            <div class="advantage-img">
                <i class="<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?> product-sprite"></i>
            </div>

            <div class="advantage-text"><?=$arResult['SECTION']['BONUS'][$bonus]['VALUE']?></div>
        </div>
    <? endforeach ?>
        </div>
    </section>
<? endif ?>
    <!-- /������������ -->

    <!-- �������� -->
    <section class="description main-shadow">

    <!-- ����-���� �������� -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-tab-item active ">
            <a href="#tab-description-model" role="tab" data-toggle="tab" class="nav-tab-link">�������� ������</a>
        </li>
        <li class="nav-tab-item"><a href="#tab-characteristics" role="tab" data-toggle="tab" class="nav-tab-link">��������������</a></li>
        <li class="nav-tab-item"><a href="#tab-video-review" role="tab" data-toggle="tab" class="nav-tab-link">����� �����</a></li>
        <li class="nav-tab-item"><a href="#tab-reviews" role="tab" data-toggle="tab" class="nav-tab-link">������</a></li>
        <li class="nav-tab-item"><a href="#tab-accessories" role="tab" data-toggle="tab" class="nav-tab-link">����������</a></li>
    </ul>

    <!-- ������� �������� -->
    <div class="tab-content">
        <!-- �������� ������ -->
        <article class="tab-pane active" id="tab-description-model">
            <? if($arResult['DETAIL_TEXT']): ?>
                <div class="b_grid margin-top_20px">
                    <?=$arResult['DETAIL_TEXT']?>
                </div>
            <? endif ?>
            <? if($arResult['SEO_TEXT']): ?>

                <div class="tab-footer">
                    <div class="horizontal-line"> </div>
                    <?=$arResult['SEO_TEXT']?>
                </div>
            <? endif ?>
            <? if(preg_match('/apple iphone 5S/is',$arResult['NAME'])): ?>
                <br><a href='/show_news_obzor_apple_iphone_5s.html'><img src='/images/read_review_button.png'></a>
            <? endif ?>
        </article>
        <!-- /�������� ������ -->
        <!-- �������������� -->
        <div class="tab-pane" id="tab-characteristics">
            <table class="table-container">
                <tbody>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['OVERALL'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">����� ��������������</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['OVERALL'] as $prop): ?>
                    <tr>
                        <td class="table-cell"><?=$prop['NAME']?></td>
                        <td class="table-cell"><?=$prop['VALUE']?></td>
                    </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">�������������� �����������</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['MULTIMEDIA'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['CONNECT'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">�����</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['CONNECT'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">������ � ���������</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['PROC_RAM'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['STORAGE'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">����������</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['STORAGE'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['AUDIO'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">�����</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['AUDIO'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                <? if(!empty($arResult["PROP_GROUP_DISPLAY"]['POWER'])): ?>
                    <tr>
                        <th class="table-title table-characteristics-title" colspan="2">�������</th>
                    </tr>
                    <? foreach($arResult["PROP_GROUP_DISPLAY"]['POWER'] as $prop): ?>
                        <tr>
                            <td class="table-cell"><?=$prop['NAME']?></td>
                            <td class="table-cell"><?=$prop['VALUE']?></td>
                        </tr>
                    <? endforeach ?>
                <? endif ?>
                </tbody>
            </table>
        </div>
        <!-- /�������������� -->

        <!--  ����� ����� -->
        <div class="tab-pane" id="tab-video-review">
            <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                <iframe width="853" height="480" src="//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>" frameborder="0" allowfullscreen></iframe>
            <? endif ?>
        </div>
        <!--  /����� ����� -->

        <!-- ������ -->
        <div class="tab-pane" id="tab-reviews">
            <div class="reviews">
                <?if(count($arResult['REVIEW'][$arResult["ID"]])>0):?>
                <div class="clearfix reviews-section">
                    <div class="pull-left">
                        <div class="reviews-title"><?=$arResult["NAME"]?></div>
                        <div class="reviews-img" style="overflow: hidden; width: <?=20*$arResult["REVIEW"]["RATE_ID"]?>px">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/reviews-stars.png" alt="<?=$arResult["REVIEW"]["RATE_NAME"]?>" />
                        </div>
                    </div>

                    <div class="pull-right"><span class="reviews-text">������� <?=$arResult["REVIEW"]["RATE_ID"]?> �� ������ <?=$arResult['REVIEW']["COUNT"]?> �������</span></div>
                </div>
                <?foreach($arResult["REVIEW"][$arResult["ID"]] as $review):?>
                <div class="reviews-item">
                    <div class="reviews-header clearfix">
                        <span class="reviews-user"><?=$review["NAME"]?></span>
                        <time class="reviews-time"><?=substr($review["DATE"], 0, 10)?></time>
                        <div class="reviews-img" style="overflow: hidden; width: <?=20*$review["RATE_ID"]?>px">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/reviews-stars.png" alt="<?=$review["RATE_NAME"]?>" />
                        </div>
                    </div>

                    <div class="reviews-desc"><?=$review["TEXT"]?></div>
                </div>
                <?endforeach;?>
<!--                <div class="reviews-more"><a href="#" >������ ��� ������ � Lapka PEM (10)</a></div>-->
                <?else:?>
                ���� �� ��������� �������
                <?endif?>
            </div>
        </div>
        <!-- /������ -->

        <!-- ���������� -->
        <? // var_dump($arResult["DETAIL_PICTURE"]);//if ($USER->IsAdmin()): ?>
        <div class="tab-pane" id="tab-accessories">
            <div class="product-container clearfix">
                <?  $APPLICATION->IncludeComponent("apple-house:sale.recommended.products", ".default", Array(
                        "IBLOCK_TYPE" => '1c_catalog',
                        "IBLOCK_ID" => 8,
                        "ID" => $arResult["ID"],    // ������������� ������
                        "MIN_BUYES" => "1",    // ����������� ���������� ������� ������
                        "DETAIL_URL" => $arResult["DETAIL_PICTURE"],    // URL, ������� �� �������� � ���������� ��������
                        "BASKET_URL" => "/personal/basket.php",    // URL, ������� �� �������� � �������� ����������
                        "ACTION_VARIABLE" => "action",    // �������� ����������, � ������� ���������� ��������
                        "PRODUCT_ID_VARIABLE" => "id",    // �������� ����������, � ������� ���������� ��� ������ ��� �������
                        "ELEMENT_COUNT" => "10",    // ���������� ��������� ��� �����������
                        "LINE_ELEMENT_COUNT" => "10",    // ���������� ��������� ��������� � ����� ������ �������
                        "LINE_VISIBLE_ELEMENT_COUNT" => "5",    // ���������� ������� ��������� ��������� -1
                        "PRICE_CODE" => array(),    // ��� ����
                        "USE_PRICE_COUNT" => "Y",    // ������������ ����� ��� � �����������
                        "SHOW_PRICE_COUNT" => "1",    // �������� ���� ��� ����������
                        "PRICE_VAT_INCLUDE" => "Y",    // �������� ��� � ����
                        "CACHE_TYPE" => "A",    // ��� �����������
                        "CACHE_TIME" => "3600",    // ����� ����������� (���.)
                        "CONVERT_CURRENCY" => "Y",    // ���������� ���� � ����� ������
                        "CURRENCY_ID" => "RUB",    // ������, � ������� ����� ��������������� ����
                    ),
                    false
                );  ?>
            </div>
        </div>
        <? //endif; ?>
<!--        <div class="tab-pane" id="tab-accessories">-->
<!--            <div class="product-container clearfix">-->
<!---->
<!--                -->
<!---->
<!--            </div>-->
<!--        </div>-->
        <!-- /���������� -->
    </div>

    </section>
    <!-- /�������� -->

    <!-- ������� ������ -->
<? if(count($arResult['SIMILAR'])>0): ?>
    <section class="similar-products main-section">
        <h2 class="similar-products-title entry-title">������� ������</h2>

        <div class="product-container clearfix">

        <?
        $iCounter = 0;
        foreach($arResult['SIMILAR'] as $similar):
            if($similar['PRICE']['PRICE'] <= 0){  continue; }

            if(4 < ++$iCounter)
                break;
            ?>
            <!-- 1 slide -->
            <div class="product-item">
                <a href="/<?=$similar['PROPERTY_CML2_CODE_VALUE']?>" class="product-link">
                    <figure class="product-content">
                        <img src="<?=CFile::GetPath($similar["PREVIEW_PICTURE"])?>" alt="<?=$similar['NAME']?>" class="product-img" />
                        <figcaption class="product-desc"><?=$similar['NAME']?></figcaption>
                    </figure>
                </a>
                <?if($similar['PRICE']['PRICE']>1):?>
                <div class="product-price"><?=number_format($similar['PRICE']['PRICE'], 0, '', ' ')?>, -</div>
                <div class="clearfix">
                    <input type="submit" onclick="location.href='<?=$similar['ADD_URL']?>'" class="button-buy" value="������" />
                    <a href="#" class="button-credit" data-buyid="<?=$similar['ID']?>">� 1 ����</a>
                </div>
                <?else:?>
                    <div class="clearfix" style="margin-top: 59px;">
                        <input type="submit" class="button-buy addElementPreorderLink"  data-buyid="<?=$similar["ID"]?>" value="�������� ���������" />
                    </div>
                <?endif?>
            </div>
        <?endforeach?>

        </div>
    </section>
<?endif?>
    <!-- /������� ������ -->

    </div>
    <!-- /�������� �������� ������ -->

<?$this->SetViewTarget("add_cart_popup");?>
<!-- �� �������� � ������� pop-up 123-->
<div class="pop-up-bg" id="add_cart_popup"></div>
<div class="pop-up-section" id="add_cart_popup_content">
    <div class="pop-up-container">
        <div class="pop-up" style="height: auto;">
            <div class="clearfix pop-up-header">
                <h1 class="pull-left pop-up-title">�� �������� � <a href="#">�������</a></h1>
                <div class="pull-right pop-up-close">
                    <a href="#"><i class="pop-up-close-icon"></i></a>
                </div>
            </div>

            <div class="horizontal-line horizontal-line-main"></div>

            <div class="pop-up-product-item clearfix">
                <div class="pop-up-product-img">
                    <a href="#" onclick="return false;">
                        <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>" width="80" />
                    </a>
                </div>
                <div class="pop-up-product-title">
                    <a href="#" class="pop-up-product-title-link"><?=$arResult['NAME']?></a>
                </div>
                <div class="pop-up-product-price">
                    <? if($arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE']):?>
                        <?=str_replace('���.', '', $arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE'])?>
                    <? elseif($arResult['PRICES']['�������']['PRINT_VALUE']):?>
                        <?=str_replace('���.', '',$arResult['PRICES']['�������']['PRINT_VALUE'])?>
                    <? endif ?>
                    <span class="pop-up-product-price-cy">���.</span>
                </div>

            </div>
            <? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
                <? if(!empty($optionGroup["ITEMS"])): ?>
                    <? if(count($optionGroup["ITEMS"]) > 1): ?>
                        <?foreach($optionGroup["ITEMS"] as $item):?>
                            <div class="pop-up-product-item clearfix" id="pop-up-product-item-<?=$item["ID"]?>" style="display: none;margin-top: 0;">
                                <div class="pop-up-product-title">
                                    <a href="#" class="pop-up-product-title-link"><?=$item["NAME"]?></a>
                                </div>
                                <div class="pop-up-product-price">
                                    <? if($item['CATALOG_PRICE_1'] > 0):?>
                                        <?=str_replace('���.', '',$item['PRICES']['�������']['PRINT_VALUE_VAT'])?>
                                        <span class="pop-up-product-price-cy">���.</span>
                                    <? endif; ?>

                                </div>

                            </div>
                        <?endforeach?>
                    <? else: $option = $optionGroup["ITEMS"][0]; ?>
                        <div class="pop-up-product-item clearfix" id="pop-up-product-item-<?=$option["ID"]?>" style="display: none;margin-top: 0;">
                            <div class="pop-up-product-title">
                                <a href="#" class="pop-up-product-title-link"><?=$optionGroup["ITEMS"][0]["NAME"]?></a>
                            </div>
                            <div class="pop-up-product-price">
                                <? if($option['CATALOG_PRICE_1'] > 0):?>
                                    <?=str_replace('���.', '',$option['PRICES']['�������']['PRINT_VALUE_VAT'])?>
                                    <span class="pop-up-product-price-cy">���.</span>
                                <? endif; ?>

                            </div>

                        </div>
                    <?endif?>

                <?endif?>
            <?endforeach?>

            <div class="horizontal-line horizontal-line-main"></div>

            <div class="pop-up-content">
                <h2 class="pop-up-content-title">� ���� ������� ��������</h2>
                <div class="also-bought">

                    <div class="product-container clearfix">
                        <?  $APPLICATION->IncludeComponent("apple-house:sale.recommended.products", "in_popup_v20", Array(
                                "IBLOCK_TYPE" => '1c_catalog',
                                "IBLOCK_ID" => 8,
                                "ID" => $arResult["ID"],    // ������������� ������
                                "MIN_BUYES" => "1",    // ����������� ���������� ������� ������
                                "DETAIL_URL" => $arResult["DETAIL_PICTURE"],    // URL, ������� �� �������� � ���������� ��������
                                "BASKET_URL" => "/personal/basket.php",    // URL, ������� �� �������� � �������� ����������
                                "ACTION_VARIABLE" => "action",    // �������� ����������, � ������� ���������� ��������
                                "PRODUCT_ID_VARIABLE" => "id",    // �������� ����������, � ������� ���������� ��� ������ ��� �������
                                "ELEMENT_COUNT" => "10",    // ���������� ��������� ��� �����������
                                "LINE_ELEMENT_COUNT" => "10",    // ���������� ��������� ��������� � ����� ������ �������
                                "LINE_VISIBLE_ELEMENT_COUNT" => "5",    // ���������� ������� ��������� ��������� -1
                                "PRICE_CODE" => array(),    // ��� ����
                                "USE_PRICE_COUNT" => "Y",    // ������������ ����� ��� � �����������
                                "SHOW_PRICE_COUNT" => "1",    // �������� ���� ��� ����������
                                "PRICE_VAT_INCLUDE" => "Y",    // �������� ��� � ����
                                "CACHE_TYPE" => "A",    // ��� �����������
                                "CACHE_TIME" => "3600",    // ����� ����������� (���.)
                                "CONVERT_CURRENCY" => "Y",    // ���������� ���� � ����� ������
                                "CURRENCY_ID" => "RUB",    // ������, � ������� ����� ��������������� ����
                            ),
                            false
                        );  ?>


                    </div>

                </div>
            </div>
            <div class="pop-up-footer">
                <div class="pull-right">
                    <a href="javascript:$('#add_cart_popup_content').find('.pop-up-close-icon').click();" class="button-link-underline">������� � ���������� �������</a>
                    <a href="/personal/basket/" class="button-bg">�������� �����</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /�� �������� � ������� pop-up -->
<?$this->EndViewTarget();?>
