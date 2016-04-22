<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if(count($arResult['ITEMS'])): ?>
<div id="slider">

		<ul class="bxslider">
		<? foreach($arResult['ITEMS'] as $key=>$item): ?>
			<li style="background-image:url('<?=$item['PREVIEW_PICTURE']['SRC']?>');">
<!--                <img src="--><?//=$item['PREVIEW_PICTURE']['SRC']?><!--">-->
                    <div class="bx-caption-wrap">
                        <div class="bx-caption">
                            <h2 class="slider-title"><?=$item['NAME']?></h2>
                            <div class="slider-content">
                                <?=$item['PREVIEW_TEXT']?>
                            </div>
                            <a href="<?=$item['PROPERTY_178']?>" class="slider-button">Заказать</a>

                        </div>
                    </div>
			</li>
		<? endforeach ?>
		</ul>
</div>
<? endif ?>
