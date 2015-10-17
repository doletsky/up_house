<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?  $sec=$arResult["SECTIONS"]["CHILD"][$arResult["SECTION"]["ID"]];
    $curPage=$APPLICATION->GetCurPage();
    $count=-1;?>

<!--<pre>--><?//print_r($sec)?><!--</pre>-->

<div class="menu-model clearfix">
    <div id="slide-submenu">
<?foreach($arResult["SECTIONS"]["CHILD"][$arResult["SECTION"]["ID"]] as $subSect): $count++;?>
    <a class="menu-model-item<?if("/".$subSect["CODE"]==$curPage):$slideNum=$count;?> current<?endif?>" href="/<?=$subSect["CODE"]?>">
        <?if(is_array($subSect["PICTURE"])):?>
            <img src="<?=$subSect["PICTURE"]["SRC"]?>" alt="<?=$subSect["NAME"]?>" class="menu-model-img" />
        <?else:?>
            <div class="menu-model-img" style="width: 85px;height: 85px; background-color: #fff;"></div>
        <?endif?>
        <span class="menu-model-title"><?=$subSect["NAME"]?></span>
    </a>
<?endforeach;?>
    </div>
</div>
<script>var slideNum=<?=$slideNum?>;</script>
