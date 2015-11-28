<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if($arParams['DISPLAY_MODE'] == 'section'):?>
<div class="b_grid_level margin-top_20px">
	<div class="b_grid">
		<div class="b_grid_unit-1-2">
			<span class="fs_24px">Отзывы на <?=$arResult['SECTION']['PARENT']['NAME']?></span>
		</div>
		<div class="b_grid_unit-1-2">
			<? if($arResult['RATING']): ?>
				<div class="margin-bottom_10px product_review ov_rating_cont">
					<div class="b_grid">
						<div class="b_grid_unit-1-2"></div>
						<div class="b_grid_unit-1-2" itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
							<div class="product_review margin-top_10px fs_13px ta_left">
								<meta content="<?=$arResult['RATING_IMG']?>" itemprop="photo">
								<div class="fs_bold product_review_name" itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">Оценка <span itemprop="itemreviewed"><?=$arResult['SECTION']['PARENT']['NAME']?></span>: </div>
								<div class="product_review_rating ta_left"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $arResult['RATING_ROUND']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
							</div>
							<div class="fs_13px">Рейтинг <span class="fs_bold" itemprop="average"><?=$arResult['RATING']?></span> на основе <a class="link_007eb4" href="/reviews/<?=$arResult['SECTION']['PARENT']['CODE']?>"><span itemprop="count"><?=$arResult['RATING_COUNT']?></span> отзывов</a></div>
						</div>
					</div>
				</div>
			<? endif ?>
			<? if(!empty($arResult['SECTION_LINKS'])) { ?>
				<div class="color_aaa ta_right margin-bottom_10px">
				<?
					$totalLinks = count($arResult['SECTION_LINKS'])-1;
					foreach($arResult['SECTION_LINKS'] as $key => $section) {
						echo '<a class="ff_helvetica-neue-light link_007eb4" href="/reviews/' . $section['CODE'] . '">' . $section['NAME'] . '</a>';
						if($key < $totalLinks)
							echo ' | ';
					}?>
				</div>
			<? } ?>
		</div>
	</div>
	<div class="b_grid_unit-1 margin-top_10px">
		<div class="padding-right_20px">
			<div class="margin-bottom_20px">
			<? if(empty($arResult['ITEMS'])):?>
				В этой категории пока не оставлено отзывов.
			<? else: ?>
				<? foreach($arResult['ITEMS'] as $review): ?>
					<div class="margin-bottom_20px">
						<div class="product_review">
							<div class="fs_bold product_review_name">отзыв о <a class="link_007eb4" href="/<?=$arResult['PRODUCT'][$review['PROPERTY_PRODUCT_ID_VALUE']]['PROPERTY_CML2_CODE_VALUE']?>"><?=$arResult['PRODUCT'][$review['PROPERTY_PRODUCT_ID_VALUE']]['NAME']?></a>,</div>
							<div class="product_review_rating"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $review['PROPERTY_RATING_VALUE']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
							<div class="fs_bold product_review_name padding-left_10px"><?=$review['NAME']?></div>
						</div>
						<div class="b_line margin-top_3px margin-bottom_3px"></div>
						<div class="margin-bottom_10px"><?=$review['PREVIEW_TEXT']?></div>
					</div>
				<? endforeach ?>
			<? endif ?>
			</div>
		</div>
	</div>
</div>
<? else: ?>
<div class="b_grid_level margin-top_20px">
    <div class="b_grid">
		<div class="b_grid_unit-1 margin-top_10px">
			<span class="fs_24px">Отзывы на <?=$arResult['PRODUCT']['NAME']?></span>
		</div>
		<div class="b_grid_unit-1 margin-top_10px">
			<div class="padding-right_20px">
				<div class="margin-bottom_10px">
				<? if(empty($arResult['ITEMS'])):?>
					На данную модель пока не оставлено отзывов.
				<? else: ?>
					<? foreach($arResult['ITEMS'] as $review): ?>
						<div class="margin-bottom_20px">
							<div class="product_review">
								<div class="fs_bold product_review_name"><?=$review['NAME']?></div>
								<div class="product_review_rating"><? for($i=0; $i < 5; $i++): ?><img src="<?=SITE_TEMPLATE_PATH?>/private/images/star_<? if($i < $review['PROPERTY_RATING_VALUE']): ?>yes<? else: ?>no<? endif ?>.png"><? endfor?></div>
							</div>
							<div class="b_line margin-top_3px margin-bottom_3px"></div>
							<div class="margin-bottom_10px"><?=$review['PREVIEW_TEXT']?></div>
						</div>
					<? endforeach ?>
				<? endif ?>
				</div>
				<? if($arResult['SECTION_CODE']): ?>
					<div class="margin-bottom_20px">
					<a href="/reviews/<?=$arResult['SECTION_CODE']?>" class="ff_helvetica-neue-light link_007eb4">читать все отзывы о <?=$arResult['SECTION_NAME']?></a>
					</div>
				<? endif ?>
			</div>
		</div>
	</div>
	<? if($arResult['ALLOW_NEW']): ?>
	<div class="b_grid_level">
		<div class="b_grid_unit-1">
			<span class="fs_24px">Добавить новый отзыв</span>
		</div>
		<? if($arResult["ERRORS"]):?>
			<div class="margin-bottom_5px color_d20c1c">
			<? foreach($arResult["ERRORS"] as $error): ?>
				<div><?=$error?></div>
			<? endforeach ?>
			</div>
		<? endif ?>
		<div class="b_grid_unit-1">
			<form method="post" action="<?=$APPLICATION->GetCurPage?>">
			<div class="fs_16px padding-bottom-top_1px color_000">имя</div>
			<div class="margin-bottom_5px padding-bottom-top_1px"><input name="review_name" class="b_input-text input-text_width_400px" type="text"></div>
			<div class="fs_16px padding-bottom-top_1px color_000">оценка</div>
			<div class="margin-bottom_5px padding-bottom-top_1px">
				<select name="review_rating" class="input-text_width_400px">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div class="fs_16px padding-bottom-top_1px color_000">отзыв</div>
			<div class="margin-bottom_5px padding-bottom-top_1px"><textarea name="review_text" class="b_textarea input-text_width_400px"></textarea></div>
			<input type="hidden" name="review_add" value="Y">
			<input type="hidden" name="product_id" value="<?=$arResult['PRODUCT']['ID']?>">
			<div class="padding-bottom-top_1px"><input type="submit" value="" class="product_review_btn_add"></div>
			</form>
		</div>
	</div>
	<? endif ?>
</div>
<? endif ?>