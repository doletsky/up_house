<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="footer-container">
    <div class="footer-item">
        <nav class="footer-nav-list">

<?
$prevSectionLevel = 1;
foreach($arResult["SECTIONS"] as $arSection):
?>
	<? /* if($arSection["DEPTH_LEVEL"] == 1): ?>
    <div class="footer-item">
        <nav class="footer-nav-list">
	<? endif */ ?>
    <? if($arSection["DEPTH_LEVEL"] == 1 && $prevSectionLevel != 1): ?>
        </nav>
    </div>
    <div class="footer-item">
        <nav class="footer-nav-list">
    <? endif ?>
    <? $prevSectionLevel = $arSection["DEPTH_LEVEL"];?>
            <a class="footer-nav-list-item" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection['NAME']?></a><br>

<? endforeach ?>
        </nav>

    </div>
</div>
