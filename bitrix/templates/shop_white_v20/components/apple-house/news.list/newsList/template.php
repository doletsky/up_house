<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="main-shadow">
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <a href="/" class="breadcrumbs-item">Главная</a>
        <div class="breadcrumbs-item">Новости</div>
    </div>

    <section class="cart-section section-container">
            <div class="row" style="border-bottom: 1px dotted #ccc;">
                <div class="col-xs-3"><h1 class="cart-title entry-title" style="margin-top: -20px">новости</h1></div>
                <div class="col-xs-9">
                    <div style="float: left">
                        <? foreach($arResult['YEARS'] as $year): ?>
                            <a class="underline_dotted" href="<?=$APPLICATION->GetCurPageParam('year=' . $year, array('year'))?>"><?=$year?></a>
                        <? endforeach ?>
                    </div>
                    <div style="float: right">
                        <?=$arResult["NAV_STRING"]?>
                    </div>

                </div>
            </div>
        <? if(count($arResult["ITEMS"])):$cnt=4; $f=0;?>
        <div class="row">
            <table><tr>
            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                    <?
                    $itemMonth = substr($arItem['ACTIVE_FROM'],3);
                    if((int)substr($currentMonth,0,2) != (int)substr($itemMonth,0,2)):

            ?>
                    <?if($f):

                        while($cnt>0){
                            $cnt--;
                            echo "<td></td>";
                        }
                        $cnt=4;
                    ?>
                        </tr>
                        </table>
                        </div>
                        <div class="row" style="border-bottom: 1px dotted #ccc;">
                        <table><tr>
                    <?endif;$f=1;?>

                        <? $currentMonth = $itemMonth ?>
                        <? $displayMonth = str_replace(" "," <strong>",FormatDate("f Y", MakeTimeStamp($arItem['ACTIVE_FROM'])))."</strong>" ?>
                        <div class="col-xs-12" style="margin-bottom: 20px;color:#000000"><h1><?=$displayMonth?></h1></div>
                    <?endif?>
                    <td style="width: 25%; padding: 0 5px">
                        <!--            <div class="col-xs-3">-->
                        <div class="b_news-item">
                                        <span class="b_news-item_date">
                                            <?=$arItem['ACTIVE_FROM']?>
                                        </span>
                            <div class="b_news-item_header">
                                <a class="link_007eb4" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                            </div>
                            <div class="b_news-item_news fs_14px margin-top_10px">
                                <?=$arItem['PREVIEW_TEXT']?>
                            </div>
                            <!--                </div>-->
                    </td>
                <?$cnt--;?>
                <?if($cnt==0):?>
                            </tr><tr>
                            <?$cnt=4;?>
                <?endif?>


            <?endforeach?>
            </tr></table>
                        </div>
        <?endif?>
        <div style="clear: both"></div>
	<div style="padding: 20px 0;" class="ft_n">
		<span>
			<a class="link_007eb4 scroll-top" href="#">Поднять наверх</a>
		</span>
			<div style="float: right">
				<?=$arResult["NAV_STRING"]?>
			</div>
	</div>

</section>
</div>