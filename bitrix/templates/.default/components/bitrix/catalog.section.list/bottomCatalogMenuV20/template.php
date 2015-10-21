<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="row">
    <div class="col-xs-12">
        <div class="horizontal-line mt-4 mb-4"></div>

        <!-- меню футер -->
        <div class="footer-container">
            <? foreach($arResult["SECTIONS"]['TOP'] as $parentId => $topSection):?>
            <div class="footer-item">
                <nav class="footer-nav-list">
                    <a href="<?=$topSection["SECTION_PAGE_URL"]?>" class="footer-nav-list-item"><?=$topSection['NAME']?></a><br />
                    <? if (isset($arResult["SECTIONS"]['CHILD'][$parentId])) :?>
                        <? foreach($arResult["SECTIONS"]['CHILD'][$parentId] as $childSection):?>
                            <a href="<?=$childSection["SECTION_PAGE_URL"]?>" class="footer-nav-list-item"><?=strip_tags($childSection['NAME'])?></a><br />
                        <? endforeach ?>
                    <? endif ?>
                </nav>
            </div>
            <? endforeach ?>
        </div>
        <!-- /меню футер -->
    </div>
</div>

<?
if(0):
$blockCnt = 0;
?>
<? foreach($arResult["SECTIONS"]['TOP'] as $parentId => $topSection):?>
    <? if ($blockCnt == 0): ?>
<div class="b_grid_level ff_helvetica-neue-roman lh_1-7 color_596e80 fs_11px">
    <? endif ?>
    <div class="b_grid_unit-1-6">
        <h4 class="ff_helvetica-neue-bold">
            <a class="no-style-link" href="<?=$topSection["SECTION_PAGE_URL"]?>"><?=$topSection['NAME']?></a>
        </h4>
        <? if (isset($arResult["SECTIONS"]['CHILD'][$parentId])) :?>
            <? foreach($arResult["SECTIONS"]['CHILD'][$parentId] as $childSection):?>
            <a class="no-style-link display_block" href="<?=$childSection["SECTION_PAGE_URL"]?>"><?=$childSection['NAME']?></a>
            <? endforeach ?>
        <? endif ?>
    </div>
    <? $blockCnt += 1; ?>
    <? if($blockCnt%6 == 0): ?>
</div>
        <? $blockCnt = 0; ?>
    <? endif ?>
<? endforeach ?>
<? if($blockCnt%6 != 0): ?>
</div>
<? endif ?>
<? endif ?>
