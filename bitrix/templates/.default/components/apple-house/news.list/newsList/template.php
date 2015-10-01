<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1 class="fs_36px margin-top_20px">Новости</h1>
<div class="b_grid margin-bottom_20px margin-top_30px ff_helvetica-neue-light fs_14px ws_20px">
	<div class="b_grid_unit-1-3">
		<div class="display_inline-block ws_10px">
		<? foreach($arResult['YEARS'] as $year): ?>
			<a class="link_007eb4 underline_dotted ws_normal" href="<?=$APPLICATION->GetCurPageParam('year=' . $year, array('year'))?>"><?=$year?></a>
		<? endforeach ?>
		</div>
	</div>
	<div class="b_grid_unit-1-3 ta_center">
	</div>
	<div class="b_grid_unit-1-3 ta_right">
		<div class="display_inline-block ws_10px">
			<?=$arResult["NAV_STRING"]?>
		</div>
	</div>
</div>
<? if(count($arResult["ITEMS"])): ?>
	<? $counter = 1 ?>
	<? foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$itemMonth = substr($arItem['ACTIVE_FROM'],3);
	if($currentMonth != $itemMonth):
	?>
	<? if($key > 0): ?>	
			</div>		
		</div>
	</div>
	<? endif ?>
	<? $currentMonth = $itemMonth ?>
	<? $displayMonth = FormatDate("f Y", MakeTimeStamp($arItem['ACTIVE_FROM'])) ?>
	<div class="b_line"></div>
	<div class="b_news-month margin-top_30px">
		<div class="b_news-month_month color_7a7d80 fs14px">
			<span class="b_news-month_month-span"><?=$displayMonth?></span>
		</div>
		<div class="b_grid">
			<div class="b_grid_level grid_level_40px">
	<? $counter = 1 ?>
	<? elseif($counter%4 == 0):?>
			</div>
			<div class="b_grid_level grid_level_40px">
	<? endif ?>
				<div class="b_grid_unit-1-4">
					<div class="b_news-item">
						<div class="b_news-item_date fs_12px color_7a7d80">
							<?=$arItem['DISPLAY_ACTIVE_FROM']?>
						</div>
						<div class="b_news-item_header fs_14px margin-top_5px">
							<a class="link_007eb4" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
						</div>										
						<div class="b_news-item_news fs_14px margin-top_10px">
							<?=$arItem['PREVIEW_TEXT']?>
						</div>
					</div>
				</div>
	<? $counter++ ?>
	<? endforeach ?>
			</div>			
		</div>
	</div>
<? endif ?>						
<div class="b_line"></div>
<div class="b_grid">
	<div class="b_grid_level grid_level_30px ff_helvetica-neue-light">
		<div class="b_grid_unit-3-5">
			<a class="link_007eb4 scroll-top" href="#">Поднять наверх</a>
		</div>
		<div class="b_grid_unit-2-5 ta_right">
			<div class="display_inline-block ws_10px">
				<?=$arResult["NAV_STRING"]?>
			</div>
		</div>							
	</div>
</div>