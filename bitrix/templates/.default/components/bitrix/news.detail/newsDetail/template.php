<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
		<div class="b_grid_unit-4-5">
			<h1 class="fs_30px color_black margin-top_15px"><?=$arResult['NAME']?></h1>
		</div>
		<div class="b_grid_unit-1-5">
			<h2 class="fs_24px ta_right margin-top_20px"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></h2>
		</div>
		<div style='clear:both'></div>
			<div class="margin-top_20px news_text fs_16px">
				<? echo $arResult["DETAIL_TEXT"];?>
			</div>
								
		