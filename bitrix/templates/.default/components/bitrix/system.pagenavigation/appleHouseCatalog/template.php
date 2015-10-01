<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//$arResult["sUrlPath"] = str_replace('catalog/','',$arResult["sUrlPath"]);
$arResult["sUrlPath"] = '/' . $_REQUEST['CODE'];

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<div style="float:left; padding:10px 0 0 0; height:28;">
<?
if ($arResult["bShowAll"]):
	if ($arResult["NavShowAll"]):
?>
		<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>"><?=GetMessage("nav_paged")?></a>
<?
	else:
?>
		<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>/page-all"><?=GetMessage("nav_all")?></a>
<?
	endif;
endif;
if($arResult["bDescPageNumbering"] === true):
	$bFirst = true;
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		
		if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
			<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>/page-<?=$arResult["NavPageCount"]?>">1</a>
<?
			else:
?>
			<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>">1</a>
<?
			endif;
			if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
			<span class="modern-page-dots">...</span>
<?*/
?>	
			<a class="link_007eb4 ws_normal" href="<?=$arResult["sUrlPath"]?>/page-<?=intVal($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">...</a>
<?
			endif;
		endif;
	endif;
	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
		
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
		<span class="color_black ws_normal"><?=$NavRecordGroupPrint?></span>
<?
		elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
?>
		<a href="<?=$arResult["sUrlPath"]?>" class="link_007eb4 link_decoration ws_normal"><?=$NavRecordGroupPrint?></a>
<?
		else:
?>
		<a href="<?=$arResult["sUrlPath"]?>/page-<?=$arResult["nStartPage"]?>"<?
			?> class="link_007eb4 link_decoration ws_normal"><?=$NavRecordGroupPrint?></a>
<?
		endif;
		
		$arResult["nStartPage"]--;
		$bFirst = false;
	} while($arResult["nStartPage"] >= $arResult["nEndPage"]);
	
	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nEndPage"] > 1):
			if ($arResult["nEndPage"] > 2):
/*?>
		<span class="modern-page-dots">...</span>
<?*/
?>
		<a class="link_007eb4 ws_normal" href="<?=$arResult["sUrlPath"]?>/page-<?=round($arResult["nEndPage"] / 2)?>">...</a>
<?
			endif;
?>
		<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>/page-1"><?=$arResult["NavPageCount"]?></a>
<?
		endif;
	
	endif; 

else:
	$bFirst = true;

	if ($arResult["NavPageNomer"] > 1):
		
		if ($arResult["nStartPage"] > 1):
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
			<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>/page-1">1</a>
<?
			else:
?>
			<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>">1</a>
<?
			endif;
			if ($arResult["nStartPage"] > 2):
/*?>
			<span class="modern-page-dots">...</span>
<?*/
?>
			<a class="link_007eb4 ws_normal" href="<?=$arResult["sUrlPath"]?>/page-<?=round($arResult["nStartPage"] / 2)?>">...</a>
<?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
		<span class="color_black ws_normal"><?=$arResult["nStartPage"]?></span>
<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
		<a href="<?=$arResult["sUrlPath"]?>" class="link_007eb4 link_decoration ws_normal"><?=$arResult["nStartPage"]?></a>
<?
		else:
?>
		<a href="<?=$arResult["sUrlPath"]?>/page-<?=$arResult["nStartPage"]?>"<?
			?> class="link_007eb4 link_decoration ws_normal"><?=$arResult["nStartPage"]?></a>
<?
		endif;
		$arResult["nStartPage"]++;
		$bFirst = false;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
	
	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
		<span class="modern-page-dots">...</span>
<?*/
?>
		<a class="link_007eb4 ws_normal" href="<?=$arResult["sUrlPath"]?>/page-<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a>
<?
			endif;
?>
		<a class="link_007eb4 link_decoration ws_normal" href="<?=$arResult["sUrlPath"]?>/page-<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
<?
		endif;
	endif;
endif;
?>
</div>

<div style="height:38px; float:left;">
<?
if($arResult["bDescPageNumbering"] === true):
	$bFirst = true;
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if($arResult["bSavePage"]):
		?>
			<a class="b_prev-next-button prev-next-button_prev" href="<?=$arResult["sUrlPath"]?>/page-<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_prev")?></a>
		<?
		else:
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
?>
			<a class="b_prev-next-button prev-next-button_prev" href="<?=$arResult["sUrlPath"]?>"><?=GetMessage("nav_prev")?></a>
<?
			else:
?>
			<a class="b_prev-next-button prev-next-button_prev" href="<?=$arResult["sUrlPath"]?>/page-<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_prev")?></a>
<?
			endif;
		endif;

	endif;
	
	if ($arResult["NavPageNomer"] > 1):
?>
		<a class="b_prev-next-button prev-next-button_next" href="<?=$arResult["sUrlPath"]?>/page-<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_next")?></a>
<?
	endif; 

else:
	$bFirst = true;

	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
?>
			<a class="b_prev-next-button prev-next-button_prev" href="<?=$arResult["sUrlPath"]?>/page-<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
<?
		else:
			if ($arResult["NavPageNomer"] > 2):
?>
			<a class="b_prev-next-button prev-next-button_prev" href="<?=$arResult["sUrlPath"]?>/page-<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
<?
			else:
?>
			<a class="b_prev-next-button prev-next-button_prev" href="<?=$arResult["sUrlPath"]?>"><?=GetMessage("nav_prev")?></a>
<?
			endif;
		
		endif;
		

	endif;
	
	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
?>
		<a class="b_prev-next-button prev-next-button_next" href="<?=$arResult["sUrlPath"]?>/page-<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_next")?></a>
<?
	endif;
endif;
?>
</div>