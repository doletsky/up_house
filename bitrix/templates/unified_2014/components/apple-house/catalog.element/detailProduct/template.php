<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript">
$(document).ready(function() {
	var addLink = '<?=str_replace('&amp;', '&', $arResult['ADD_URL'])?>';
	<? if($arResult['PRICES']['�������']['DISCOUNT_VALUE_VAT']):?>
	var elementPrice = <?=$arResult['PRICES']['�������']['DISCOUNT_VALUE_VAT']?>;
	<? elseif($arResult['PRICES']['�������']['VALUE_VAT']):?>
	var elementPrice = <?=$arResult['PRICES']['�������']['VALUE_VAT']?>;
	<? endif ?>
	/*
	var services = [];
	<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $serviceSection): ?>
	services[<?=$serviceSection['ID']?>] = [];
	services[<?=$serviceSection['ID']?>]['id'] = 0;
	services[<?=$serviceSection['ID']?>]['price'] = 0;
	<? endforeach ?>
	var serviceList = [<? foreach($arResult['SERVICE_LIST']['SECTIONS'] as $key => $serviceSection): ?><?=$serviceSection['ID']?><? if(($key + 1) < count($arResult['SERVICE_LIST']['SECTIONS'])):?>,<? endif ?><? endforeach ?>];
	*/
	/*
	$('.product_options').change(function(e) {
		var add = addLink;
		var price = elementPrice;
		$('.product_options').each(function() {
			var option = $('option:selected',$(this));
			var optionID = option.val();
			
			if(optionID > 0) {
				var optionPrice = option.attr('data-price');
				add += '&option[]=' + optionID;
				price += parseInt(optionPrice);
			}
		});
		price = price.toString();
		$('#addElementLink').attr('href', add);
		$('#addElementCreditLink').attr('href', add + '&Credit=Y');
		$('#elementPrice').text(formatPrice(price) + ' ���.');
	});
	*/
	function optionChange() {
		var add = addLink;
		var price = elementPrice;
		$('.option_group input').each(function() {
			var optionID = $(this).val();			
			if(optionID > 0 && $(this).prop('checked')) {
				var optionPrice = $(this).attr('data-price');
				add += '&option[]=' + optionID;
				price += parseInt(optionPrice);
			}
		});
		price = price.toString();
		$('#addElementLink').attr('href', add);
		$('#addElementCreditLink').attr('href', add + '&credit=Y');
		$('#elementPrice').text(formatPrice(price) + ' ���.');	
	}
	
	function formatPrice(price) {
		var newPrice = '';
		var y = 0;
		for(var i = price.length-1; i >= 0; i--) {
			if(y%3 == 0)
				newPrice = ' ' + newPrice;
			newPrice = price[i] + newPrice;
			y++;
		}
		return newPrice;
	}
	$('.option_group').each(function() {
		var group_blc = $(this);
		var input_blc = $('.option_input', group_blc);
		input_blc.each(function() {
			var input = $('input', $(this));
			input.hide();
			var input_id = input.attr('id');
			var input_type = input.attr('type');
			var input_checked = input.prop('checked');
			$(this).append('<div style="float:left; width:15px; height:15px; margin:1px 0 0 0;" class="' + input_id + '"></div>');
			var gr_input = $('.' + input_id, $(this));
			
			var input_label = $('.option_label', group_blc);
			if(input_type == 'checkbox') {
				if(input_checked)
					gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/checkbox.png) left -15px no-repeat');
				else
					gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/checkbox.png) left top no-repeat');
				input_label.click(function(e) {
                    e.preventDefault();
					var for_id = $(this).attr('for');
					if($('#' + for_id).prop('checked')){
						$('.' + for_id).css('background-position', 'left top');
                        $('#' + for_id).prop('checked', false);
                    }
					else{
						$('.' + for_id).css('background-position', 'left -15px');
                        $('#' + for_id).prop('checked', true);
                    }
					optionChange();
				});
				gr_input.click(function(e) {
					var for_id = $(this).attr('class');
					if($('#' + for_id).prop('checked')) {
						$(this).css('background-position', 'left top');
						$('#' + for_id).prop('checked', false);
					}
					else {
						$(this).css('background-position', 'left -15px');
						$('#' + for_id).prop('checked', true);
					}
					optionChange();
				});
			}
			else if(input_type == 'radio') {
				if(input_checked)
					gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/radio_btn.png) left -15px no-repeat');
				else
					gr_input.css('background', 'url(/bitrix/templates/shop_white/private/images/radio_btn.png) left top no-repeat');
				input_label.click(function(e) {
					var for_id = $(this).attr('for');
					var option_group = $('#' + for_id).attr('name');
					$('input[name=' + option_group + ']').each(function() {
						var radio_id = $(this).attr('id');
						$('.' + radio_id).css('background-position', 'left top');
						$(this).prop('checked', false);
					});
					$('.' + for_id).css('background-position', 'left -15px');
					$('#' + for_id).prop('checked', true);
					optionChange();
				});
				gr_input.click(function(e) {
					var for_id = $(this).attr('class');
					var option_group = $('#' + for_id).attr('name');
					$('input[name=' + option_group + ']').each(function() {
						var radio_id = $(this).attr('id');
						$('.' + radio_id).css('background-position', 'left top');
						$(this).prop('checked', false);
					});
					$('.' + for_id).css('background-position', 'left -15px');
					$('#' + for_id).prop('checked', true);
					optionChange();
				});
			}
		});
	});
});
</script>

<div class="row">
<div class="col-xs-12">

<!-- �������� �������� ������ -->
<div id="page-product-info">

<!-- ������� ���� �������� ������ -->
<div class="main-shadow">
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <a href="#" class="breadcrumbs-item">�������</a>
        <a href="#" class="breadcrumbs-item">�������</a>
        <a href="#" class="breadcrumbs-item">����� ���</a>
        <div class="breadcrumbs-item">Lapka PEM - �������� ����������� ��������� ���������� �����</div>
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
                    <a href="#" class="social-icon facebook" title="facebook"></a>
                    <a href="#" class="social-icon vk" title="vk"></a>
                    <a href="#" class="social-icon twitter" title="twitter"></a>
                </div>
                <!-- /���������� ������ -->
                <div class="product-article">������� ������: <span class="article-pr">2042</span></div>
            </div>
        </div>

        <div class="row">
            <!-- ����� ������� -->
            <div class="col-xs-6">
                <? if(is_array($arResult['DETAIL_PICTURE'])):?>
                    <div id="main-img-container">
                        <? if(preg_match('/^apple iphone 5S|^apple iphone 5C|^apple ipad air(.*)Cellular|^apple ipad mini 2 retina(.*) 4G/is',$arResult['NAME'])){ ?><div class='lte_on_img'><a href='/lte/'><img src='/images/lte.png'></a></div> <? } ?>
                        <a id="fancy-box-phantom" rel="" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" data-id="0">
                            <img id="main-img" itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" style="max-width: 400px; max-height: 400px;" alt="<?=$arResult['NAME']?>">
                        </a>
                        <img id="loading-process" src="/bitrix/templates/shop_white/private/images/loading-process.gif" />
                        <? //if ($USER->IsAdmin()) ?>
                    </div>
                    <? /* <img itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" width="<?=$arResult['DETAIL_PICTURE']['WIDTH']?>" height="<?=$arResult['DETAIL_PICTURE']['HEIGHT']?>" alt="<?=$arResult['NAME']?>"> */ ?>
                <? endif ?>

                <?  if ($arResult["ARR_IMAGES"]["VALUE"]): ?>
                    <div id="img-preview-selector">
                        <a class="grouped_elements" rel="group1" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
                            <img itemprop="image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" style="max-width:70px; max-height: 100px" alt="<?=$arResult['NAME']?>">
                        </a>
                        <?  $iCounter = 0;
                        foreach($arResult["ARR_IMAGES"]["VALUE"] as $imgCode):
                            if(4 < ++$iCounter)
                                break;
                            ?>
                            <?$renderImage = CFile::ResizeImageGet($imgCode, array("width" => 70, "height" => 100));?>
                            <? /* <a class="grouped_elements" rel="group1" href="<?=$renderImage['src']?>"> */ ?>
                            <?=CFile::ShowImage($renderImage['src'], 70, 100, "imgcode='". $imgCode . "' class='img_showed'", "", false);?>
                            <? /* </a> */ ?>
                        <? endforeach; ?>
                    </div>
                    <div id="img-preview-selector-hidden"></div>
                    <div id="img-preview-selector-border"></div>
                <?   endif;   ?>

<? /*
                <div class="product-info-img">
                    <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="iphone" title="iphone" />
                </div>


                <?  if ($arResult["ARR_IMAGES"]["VALUE"]): ?>
                        <?  $iCounter = 0;
                        foreach($arResult["ARR_IMAGES"]["VALUE"] as $imgCode):
                            if(4 < ++$iCounter)
                                break;
                            ?>
                            <div class="product-thumbnail">
                            <?$renderImage = CFile::ResizeImageGet($imgCode, array("width" => 70, "height" => 100));?>
                            <?=CFile::ShowImage($renderImage['src'], 70, 100, "imgcode='". $imgCode . "' class='img_showed'", "", false);?>
                            </div>
                        <? endforeach; ?>
                <?   endif;   ?>
*/?>
<? /*
                <div class="product-thumbnail current">
                    <img src="img/product-thumbnail.jpg" alt="iphone" title="iphone" />
                </div>
                <div class="product-thumbnail">
                    <img src="img/product-thumbnail-2.jpg" alt="iphone" title="iphone" />
                </div>
                <div class="product-thumbnail">
                    <img src="img/product-thumbnail-3.jpg" alt="iphone" title="iphone" />
                </div>
                <div class="product-thumbnail">
                    <img src="img/product-thumbnail-4.jpg" alt="iphone" title="iphone" />
                </div>
                <div class="product-thumbnail">
                    <img src="img/product-thumbnail-5.jpg" alt="iphone" title="iphone" />
                </div>
*/ ?>

                <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
                    <div id='video-btn-container'>
                        <a href='#' onclick='$.fancybox("<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>\" frameborder=\"0\" allowfullscreen></iframe>"); return false;'>
                            <img src='/images/video_btn.png'>
                        </a>
                    </div>
                    <?/*        <iframe width="560" height="315" src="//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>" frameborder="0" allowfullscreen></iframe> */?>

                <? endif ?>

                <div class="product-review mt-4">
                    <a href="#" class="product-button">����� �����<br /> iPhone 5S<i class="play-icon product-sprite"></i></a>
                    <a href="#" class="product-button">������ �����<br /> iPhone 5S<i class="text-icon product-sprite"></i></a>
                    <a href="#" class="product-button">����������<br /> iPhone 5S<i class="text-icon product-sprite"></i></a>
                </div>

                <div class="accept mt-2">
                    ��������� � ������:
                    <i class="visa-icon product-sprite"></i>
                    <i class="master-card-icon product-sprite"></i>
                </div>
            </div>

            <!-- ������ ������� -->
            <div class="col-xs-6">

                <!-- ���� -->
                <div class="price">
                    <div class="price-text">����:</div>
                    <div class="price-num"><?=PriceDigitExtractor($arResult['PRICES']['�������']['PRINT_DISCOUNT_VALUE_VAT'])?> <span class="rub">���.</span></div>
                </div>

                <?if($arResult['CAN_BUY']):?>
                    <!-- �������������� ������ -->
                    <div class="additional-services">
                        <h3 class="additional-services-title">�������������� ������:</h3>

                        <? foreach($arResult["SECTION"]["OPTIONS"] as $optionGroup): ?>
                            <? if(!empty($optionGroup["ITEMS"])): ?>

                                        <? foreach($optionGroup["ITEMS"] as $option): ?>
                                    <div class="additional-services-item clearfix">
                                        <div class="input-checkbox">
                                            <input type="checkbox" value="None" id="input-checkbox" name="opiton_<?=$optionGroup['ID']?>" />
                                            <label for="opiton_<?=$optionGroup['ID']?>"></label>
                                        </div>
                                        <div class="additional-services-text"><?=$option['NAME']?> <? if($option['CATALOG_PRICE_1'] > 0):?>(<span class="color_79b70d"><?=$option['PRICES']['�������']['PRINT_VALUE_VAT']?></span>)<? else: ?>(<span class="color_79b70d">���������</span>)<? endif ?></div>
                                    </div>

                                        <? endforeach ?>
                            <? endif ?>
                        <? endforeach ?>



                    </div>

                    <!-- ������ ������ -->
                    <div class="product-buy">

                    <? if($arResult['SECTION']['UF_BUY_DISABLE']): ?>
                        <a class="button-buy" id="addElementLink" href="<?=$arResult['ADD_URL']?>&preorder=Y">���������</a>
                        <a class="button-one-click" id="oneClickBuyLink" data-buyid="<?=$arResult["ID"]?>" href="<?=$arResult['ADD_URL']?>">������ � ���� ����<</a>
                    <? else: ?>
                        <a class="button-buy" id="addElementLink" href="<?=$arResult['ADD_URL']?>" onclick="ga('send', 'event', 'Acc window', 'Open', '');">������</a>
                        <a class="button-credit" id="addElementCreditLink" href="<?=$arResult['ADD_URL']?>&credit=Y">� ������</a>
                        <a class="button-one-click" id="oneClickBuyLink" data-buyid="<?=$arResult["ID"]?>" href="<?=$arResult['ADD_URL']?>">������ � ���� ����</a>
                    <? endif ?>

                    </div>
                <? else: ?>
                    <? /* <span itemprop="availability" content="out_of_stock"></span> */ ?>
                    <a class="button-buy" id="addElementPreorderLink" data-buyid="<?=$arResult["ID"]?>" href="#">���������</a>
				<? endif ?>



                <!-- �������� �������� -->
                <article class="product-desc">
                    <?=$arResult['PREVIEW_TEXT']?>
                </article>

                <div id="delivery_block_place"></div>


                <? /*
                <div class="product-select-wrapper">
                    <select class="product-select">
                        <option class="product-item">�������� ��� �����</option>
                        <option class="product-item">������</option>
                        <option class="product-item">���������� �������</option>
                    </select>
                </div>

                <!-- �������� -->
                <div class="product-delivery">
                    <div class="product-delivery-item clearfix">
                        <div class="product-delivery-img">
                            <i class="car-icon product-sprite"></i>
                        </div>
                        <div class="product-delivery-content">
                            <h4 class="product-delivery-title">�������� �� ������ � �������� ���� - 300 ���.</h4>
                            <div class="product-delivery-text">
                                ��������� ��������: <strong>�������</strong>, �� 24:00<br />
                                ��� ���������� ������ �� 19:00
                            </div>
                        </div>
                    </div>

                    <div class="product-delivery-item clearfix">
                        <div class="product-delivery-img">
                            <i class="car-icon product-sprite"></i>
                        </div>
                        <div class="product-delivery-content">
                            <h4 class="product-delivery-title">�������� �� ������ � �������� ���� - 400 ���.</h4>
                            <div class="product-delivery-text">
                                ��������� ��������: <strong>�������</strong>, �� 24:00<br />
                                ��� ���������� ������ �� 19:00
                            </div>
                        </div>
                    </div>

                    <div class="product-delivery-item clearfix">
                        <div class="product-delivery-img">
                            <i class="metro-icon product-sprite"></i>
                        </div>
                        <div class="product-delivery-content">
                            <h4 class="product-delivery-title">��������� - ���������, <a href="#">�. ���������������</a></h4>
                            <div class="product-delivery-text">
                                ��������� ���������: ������, 06.07.2014
                            </div>
                        </div>
                    </div>
                </div>
*/?>
            </div>
        </div>

    </section>
</div>
<!-- /������� ���� �������� ������ -->

<!-- ������������ -->
<section class="advantage main-shadow">
    <h2 class="advantage-title">��� ������� iPhone 5S 16gb � �������� UP-House �� ���������:</h2>

    <div class="advantage-container clearfix">

        <? foreach($arResult['SECTION']['INFO']['UF_BONUS'] as $key => $bonus): ?>
            <?if ($arResult['SECTION']['BONUS'][$bonus]['XML_ID'] != 'counsult'):?>
                <div class="advantage-item">
                    <div class="advantage-img">
                        <i class="<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?>-icon product-sprite"></i>
                    </div>

                    <div class="advantage-text"><?=$arResult['SECTION']['BONUS'][$bonus]['VALUE']?></div>
                </div>
            <? else: ?>
                <div class="advantage-item">
                    <div class="advantage-img">
                        <i class="<?=$arResult['SECTION']['BONUS'][$bonus]['XML_ID']?>-icon product-sprite"></i>
                    </div>

                    <div class="advantage-text"><?=htmlspecialchars_decode($arResult['SECTION']['BONUS'][$bonus]['VALUE'])?></div>
                </div>
            <? endif;?>
        <? endforeach ?>
    </div>
</section>
<!-- /������������ -->

<!-- �������� -->
<section class="description main-shadow">

<!-- ����-���� �������� -->
<ul class="nav nav-tabs" role="tablist" id="myTab">
    <? if(empty($arResult['DETAIL_TEXT'])): ?>
        <li class="nav-tab-item"><a href="#tab-characteristics" role="tab" data-toggle="tab" class="nav-tab-link">��������������</a></li>
    <? endif; ?>

    <? if($arResult['DETAIL_TEXT'] || $arResult['SEO_TEXT']): ?>
        <li class="nav-tab-item active ">
            <a href="#tab-description-model" role="tab" data-toggle="tab" class="nav-tab-link">�������� ������</a>
        </li>
    <? endif ?>
    <? if(!empty($arResult['DETAIL_TEXT'])): ?>
        <li class="nav-tab-item"><a href="#tab-characteristics" role="tab" data-toggle="tab" class="nav-tab-link">��������������</a></li>
    <? endif; ?>

    <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
        <li class="nav-tab-item"><a href="#tab-video-review" role="tab" data-toggle="tab" class="nav-tab-link">����� �����</a></li>
    <? endif ?>

    <li class="nav-tab-item"><a href="#tab-reviews" role="tab" data-toggle="tab" class="nav-tab-link">������</a></li>

    <li class="nav-tab-item"><a href="#tab-accessories" role="tab" data-toggle="tab" class="nav-tab-link">����������</a></li>

</ul>

<!-- ������� �������� -->
<div class="tab-content">
    <!-- �������� ������ -->
    <article class="tab-pane active" id="tab-description-model">
        <? if($arResult['DETAIL_TEXT']): ?>

                <?=$arResult['DETAIL_TEXT']?>

        <? endif ?>
        <? if($arResult['SEO_TEXT']): ?>

                <?=$arResult['SEO_TEXT']?>

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
                    <td class="table-title table-characteristics-title" colspan=2>�������������� �����������</td>
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
                    <td class="table-title table-characteristics-title" colspan=2>�����</td>
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
                    <td class="table-title table-characteristics-title" colspan=2>������ � ���������</td>
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
                    <td class="table-title table-characteristics-title" colspan=2>����������</td>
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
                    <td class="table-title table-characteristics-title" colspan=2>�����</td>
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
                    <td class="table-title table-characteristics-title" colspan=2>�������</td>
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
    <? if($arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']): ?>
        <div class="tab-pane" id="tab-video-review">
            <iframe width="853" height="480" src="//www.youtube.com/embed/<?=$arResult['PROPERTIES']['VIDEOOBZOR']['VALUE']?>" frameborder="0" allowfullscreen></iframe>
        </div>
    <? endif ?>

    <!--  /����� ����� -->

    <!-- ������ -->
    <? if($arResult['SECTION']['UF_SHOW_REVIEWS'] && $arResult['RATING']): ?>
    <div class="tab-pane" id="tab-reviews">
        <div class="reviews">
            <div class="clearfix reviews-section">
                <div class="pull-left">
                    <div class="fs_bold product_review_name" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">������� ������ <span itemprop="itemreviewed"><?=$arResult['RATING_NAME']?></span>: </div>
                    <div class="reviews-img">
                        <img src="img/reviews-stars.png" alt="5 ����" />
                    </div>
                </div>

                <div class="pull-right"><span class="reviews-text">������� <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> �� ������ <a class="link_007eb4" href="<?=$arResult['RATING_LINK']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> �������</a></div>
            </div>

            <?  $APPLICATION->IncludeComponent(
                "apple-house:catalog.reviews",
                "",
                Array(
                    "IBLOCK_CAT_TYPE" => "1c_catalog",
                    "IBLOCK_CAT_ID" => "8",
                    "IBLOCK_REVIEW_TYPE" => "services",
                    "IBLOCK_REVIEW_ID" => "13",
                    "ALLOW_ADD" => "N",
                    "DISPLAY_MODE" => "element"
                ),
                false
            ); ?>
        </div>
    <? endif ?>



<? /*
            <div class="reviews-item">
                <div class="reviews-header clearfix">
                    <span class="reviews-user">����</span>
                    <time class="reviews-time">07.07.2014</time>
                    <div class="reviews-img">
                        <img src="img/reviews-stars.png" alt="5 ����" />
                    </div>
                </div>

                <div class="reviews-desc">��������� � ��� �� ������ �������� ��� �����. � ���������� � �������� ����� ������ �� ��� ������. ����������� ��������, ������������ �������, ������ ���������� �������, ����������� �������. �� � ��� ��� �� ��. ����, ��������, ���������� ��� ��������� ��������, ��������� � ���� �������� � ��������� �������. ���������� ������ � ��������� � Lapka. ������� �������, ��� ��� ������� � ��� ��������.</div>
            </div>

            <div class="reviews-more"><a href="#" >������ ��� ������ � Lapka PEM (10)</a></div>
 */?>

    </div>
    <!-- /������ -->

    <!-- ���������� -->
    <div class="tab-pane" id="tab-accessories">
        <div class="product-container clearfix">

            <?  $APPLICATION->IncludeComponent("apple-house:sale.recommended.products", ".default", Array(
                    "IBLOCK_TYPE" => '1c_catalog',
                    "IBLOCK_ID" => 8,
                    "ID" => $arResult["ID"],	// ������������� ������
                    "MIN_BUYES" => "1",	// ����������� ���������� ������� ������
                    "DETAIL_URL" => $arResult["DETAIL_PICTURE"],	// URL, ������� �� �������� � ���������� ��������
                    "BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
                    "ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
                    "PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
                    "ELEMENT_COUNT" => "10",	// ���������� ��������� ��� �����������
                    "LINE_ELEMENT_COUNT" => "10",	// ���������� ��������� ��������� � ����� ������ �������
                    "LINE_VISIBLE_ELEMENT_COUNT" => "5",	// ���������� ������� ��������� ��������� -1
                    "PRICE_CODE" => array(),	// ��� ����
                    "USE_PRICE_COUNT" => "Y",	// ������������ ����� ��� � �����������
                    "SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
                    "PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
                    "CACHE_TYPE" => "A",	// ��� �����������
                    "CACHE_TIME" => "3600",	// ����� ����������� (���.)
                    "CONVERT_CURRENCY" => "Y",	// ���������� ���� � ����� ������
                    "CURRENCY_ID" => "RUB",	// ������, � ������� ����� ��������������� ����
                ),
                false
            );  ?>

            <!-- 1 slide -->

<?/*
            <div class="product-item">
                <a href="#" class="product-link">
                    <figure class="product-content">
                        <img src="img/carousel-5.jpg" alt="Lapka PEM" class="product-img" />
                        <figcaption class="product-desc">������� Jawbone Up24 Persimmon (���������) M</figcaption>
                    </figure>
                </a>
                <div class="product-price">4 490, -</div>
                <div class="clearfix">
                    <input type="submit" class="button-buy" value="������" />
                    <a href="#" class="button-credit">� ������</a>
                </div>
            </div>
*/?>
        </div>
    </div>
    <!-- /���������� -->
</div>

</section>
<!-- /�������� -->

<!-- ������� ������ -->
<section class="similar-products main-section">
    <h2 class="similar-products-title entry-title">������� ������</h2>

    <div class="product-container clearfix">


        <? $iCounter = 0;
        foreach($arResult['SIMILAR'] as $similar): ?>
            <?$arrPrice = CPrice::GetBasePrice($similar["ID"]);
            if($arrPrice['PRICE'] == 0)
                continue;

            if(4 < ++$iCounter)
                break;
            ?>
            <div class="product-item">
                <a href="/<?=$similar['PROPERTY_CML2_CODE_VALUE']?>" class="product-link">
                    <figure class="product-content">
                        <img src="<?=CFile::GetPath($similar["PREVIEW_PICTURE"])?>" title="<?=$similar['NAME']?>" alt="<?=$similar['NAME']?>" class="product-img" />
                        <figcaption class="product-desc"><?=$similar['NAME']?></figcaption>
                    </figure>
                </a>
                <div class="product-price"><?=number_format($arrPrice['PRICE'], 0, '', ' ')?>, -</div>
                <div class="clearfix">
                    <input type="submit" class="button-buy" value="������" />
                    <a href="#" class="button-credit">� ������</a>
                </div>
            </div>

        <? endforeach ?>



    </div>
</section>
<!-- /������� ������ -->

</div>
<!-- /�������� �������� ������ -->
</div>
</div>