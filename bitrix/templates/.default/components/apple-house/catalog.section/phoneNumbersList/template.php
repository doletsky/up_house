<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    //var_dump($arResult['ITEMS'][0]['DETAIL_PAGE_URL']);
//echo $arItem['DETAIL_PAGE_URL'];
//var_dump($arResult['SHOW_SMART_FILTER']);

?>

<div class="numbers_table">
<div class="number_table_raw">

   <?//var_dump($arResult['ITEMS']);?>
    <? $allCount = count($arResult['ITEMS']); ?>
    <div class="number_table_column">
        <? for ($i = 0; $i < $allCount; $i++):?>
            <div class="nt_cell<?=($i%2 == 0) ? ' gray_cell' : ''?><?=($arResult['ITEMS'][$i]['ACTIVE'] == 'Y') ? '' : ' inactive_cell'?>"><?=$arResult['ITEMS'][$i]['NAME']?></div>
        <? endfor; ?>
    </div>

    <?
/*
 *
 *
 */
/*
   // var_dump($arResult['ITEMS']);
    ?>
    <? $allCount = count($arResult['ITEMS']);
    $linesCount = ceil($allCount / 4);
    $columnsCountWithMin = $linesCount * 4 - $allCount;
    ?>

    <? for ($j = 0; $j < 4; $j++):?>
        <div class="number_table_column">
        <? for ($i = $j * $linesCount - ((4 - $j)) * (($j < $columnsCountWithMin) && ($j != 0)); $i < ($j + 1) * $linesCount - ((4 - $j)) * (($j + 1) < $columnsCountWithMin); $i++):?>
                <div class="nt_cell"><?=$arResult['ITEMS'][$i]['NAME']?></div>
        <? endfor; ?>
        </div>
    <? endfor; ?>
<? /*
    <? for ($i = 0; $i < $allCount; $i += 4):?>
            <div class="nt_cell"><?=$arResult['ITEMS'][$i]['NAME']?></div>
    <? endfor; ?>
    </div><div class="number_table_column">
    <? for ($i = 1; $i < $allCount; $i += 4):?>
            <div class="nt_cell"><?=$arResult['ITEMS'][$i]['NAME']?></div>
    <? endfor; ?>
    </div><div class="number_table_column">
    <? for ($i = 2; $i < $allCount; $i += 4):?>
            <div class="nt_cell"><?=$arResult['ITEMS'][$i]['NAME']?></div>
    <? endfor; ?>
    </div><div class="number_table_column">
    <? for ($i = 3; $i < $allCount; $i += 4):?>
            <div class="nt_cell"><?=$arResult['ITEMS'][$i]['NAME']?></div>
    <? endfor; ?>
*/ ?>



    <?
/*        $allCount = count($arResult['ITEMS']);
        $linesCount = ceil($allCount / 4);
        $counter = 1;
    ?>
    <? foreach ($arResult['ITEMS'] as $item):?>
        <? if($counter > $linesCount):?>
            </div>
            <div class="number_table_column">
            <? $counter = 1;?>
        <? endif;?>
        <div class="nt_cell"><?=$item['NAME']?></div>

        <?$counter++; ?>
    <? endforeach; ?>
<? /*
    <div class="nt_cell">903 2466633</div><div class="nt_cell">903 2536644</div><div class="nt_cell">903 2567722</div><div class="nt_cell">903 2197700</div>
    <div class="nt_cell">903 2466633</div><div class="nt_cell">903 2536644</div><div class="nt_cell">903 2567722</div><div class="nt_cell">903 2197700</div>
    <div class="nt_cell">903 2466633</div><div class="nt_cell">903 2536644</div><div class="nt_cell">903 2567722</div><div class="nt_cell">903 2197700</div>
    <div class="nt_cell">903 2466633</div><div class="nt_cell">903 2536644</div><div class="nt_cell">903 2567722</div><div class="nt_cell">903 2197700</div>
    <div class="nt_cell">903 2466633</div><div class="nt_cell">903 2536644</div><div class="nt_cell">903 2567722</div><div class="nt_cell">903 2197700</div>
 */ ?>

</div>
</div>


<? /*

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
						<span class="ff_helvetica-neue-light color_black fs_14px">При покупке <?=$arResult['NAME']?> в магазине Up House Вы получаете:</span>
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



		<? if(!empty($arResult['SECTION_FILTER'])): ?>
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
		<? endif ?>

<?
$iGridWidth = 4;



//if ($USER->IsAdmin()): ?>

    <? if($arResult['SHOW_SMART_FILTER'] == '15' || $arResult['SHOW_SMART_FILTER'] == '14'){
        $iGridWidth = 3;
    //if ($USER->IsAdmin()){
         // strlen('<div id="bx_incl_area_8_1_1">'), strlen($arParams['SMART_FILTER_OUTPUT']) - strlen('<div id="bx_incl_area_8_1_1">') - strlen('</div>')));
        // echo html_entity_decode(substr($arParams['SMART_FILTER_OUTPUT'], 38, strlen($arParams['SMART_FILTER_OUTPUT']) - 46));
      //   echo html_entity_decode(substr($arParams['SMART_FILTER_OUTPUT'], 45, mb_strlen($arParams['SMART_FILTER_OUTPUT']) - 57));
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
								<? /*Товар ожидается */ ?>
<? /*
							</div>
						</div>
						<? else: ?>
						<div class="cat_item_buy">
							<div class="margin-top_3px ff_helvetica-neue-light fs_14px ta_center">
								<a class="b_button button_green" href="<?=$arItem['ADD_URL']?>" product_id="<?=$arItem['ID']?>"><i class="b_glyph glyph_cart-mini"></i> Купить</a>
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
									if($count > 2)
										break;
									?>
								<? endforeach ?>
								<li class="fs_12px">
								<? //$arResult['UF_BUY_DISABLE']='Y';
								if(!empty($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'])){ ?>Артикул: <strong><?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></strong><? } ?><? if($arResult['UF_BUY_DISABLE']): elseif($arItem['CAN_BUY']):?>, есть в наличии<? endif; ?>
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
				<div class="section_review"><a href='/show_news_obzor_apple_iphone_5s.html'><img src='/images/read_review_button.png' alt='Обзор Apple iPhone 5s'></a></div>
			<? endif ?>

			<? if(preg_match('/iphone 5C/is',$arResult['NAME'])): ?>
				<div class="section_review"><a href='/show_news_obzor-iphone-5c.html'><img src='/images/review_button_5c.png' alt='Обзор Apple iPhone 5C'></a></div>
			<? endif ?>
							</div>

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

 */ ?>
