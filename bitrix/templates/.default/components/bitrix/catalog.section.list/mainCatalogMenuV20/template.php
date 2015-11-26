<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult['SECTIONS'])>0):?>
<?
foreach($arResult['SECTIONS']['TOP'] as $id=>$sectData):
?>
    <li class="menu-catalog-list-item">
        <a href="/<?=$sectData['CODE']?>" class="menu-catalog-item"><?=$sectData['NAME']?></a>

        <?if(count($arResult['SECTIONS']['CHILD'][$id])>0):?>
        <ul class="submenu-catalog js-submenu-catalog" style="display: none">
            <?foreach($arResult['SECTIONS']['CHILD'][$id] as $idSub=>$sectSubData):?>
                <li class="submenu-catalog-item">
                    <a href="/<?=$sectSubData['CODE']?>" class="submenu-catalog-link"<?if(count($arResult['SECTIONS']['CHILD'][$idSub])>0):?> style="width: 182px;"<?endif?>><?=$sectSubData['NAME']?></a>

                    <?if(count($arResult['SECTIONS']['CHILD'][$idSub])>0):?>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <ul class="submenu-three-catalog js-submenu-three-catalog">
                            <?foreach($arResult['SECTIONS']['CHILD'][$idSub] as $idSubT=>$sectSubTData):?>
                                <li class="submenu-three-catalog-item">
                                    <a href="/<?=$sectSubTData['CODE']?>" class="submenu-three-catalog-link"><?=$sectSubTData['NAME']?></a>

                                </li>
                            <?endforeach?>
                        </ul>
                    <?endif?>

                </li>
            <?endforeach?>
        </ul>
        <?endif?>

    </li>
<?
endforeach;
?>
<?endif;?>