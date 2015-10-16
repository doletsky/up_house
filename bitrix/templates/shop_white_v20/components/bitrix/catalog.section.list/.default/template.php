<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$sec=$arResult["SECTIONS"]["CHILD"][$arResult["SECTION"]["ID"]];?>

<!--<pre>--><?//print_r($sec)?><!--</pre>-->

<div class="menu-model clearfix">
    <div id="slide-submenu">
<?foreach($arResult["SECTIONS"]["CHILD"][$arResult["SECTION"]["ID"]] as $subSect):?>
    <a class="menu-model-item" href="/<?=$subSect["CODE"]?>">
        <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-menu-model.png" alt="<?=$subSect["NAME"]?>" class="menu-model-img" />
        <span class="menu-model-title"><?=$subSect["NAME"]?></span>
    </a>
<?endforeach;?>
    </div>
</div>
