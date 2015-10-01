<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--noindex-->
<?if (!$arParams['ASD_ID'] && $arParams['SCRIPT_IN_HEAD']!='Y' && strlen($arResult['ASD_PICTURE_NOT_ENCODE'])){?><div style="display: none;"><img src="<?= $arResult['ASD_PICTURE_NOT_ENCODE']?>" alt="" /></div><?}?>
<div id="asd_share_buttons<?= $arParams['ASD_ID']>0 ? $arParams['ASD_ID'] : ''?>">
	<a class="asd_fb_share b_social-button social-button_facebook" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_FB"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_FB_TITLE")?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?=$arResult["ASD_URL"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;">Facebook</a>
	
	<a class="asd_tw_share b_social-button social-button_twitter" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_TW"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_TW_TITLE")?>" onclick="window.open('http://twitter.com/share?text=<?= $arResult["ASD_TITLE"]?>&amp;url=<?= $arResult["ASD_URL"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;">Twitter</a>
	
	<a class="asd_vk_share b_social-button social-button_vkontakte" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_VK"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_VK_TITLE")?>" onclick="window.open('http://vkontakte.ru/share.php?url=<?=$arResult["ASD_URL"]?>&amp;title=<?= $arResult["ASD_TITLE"]?>&amp;image=<?= $arResult["ASD_PICTURE"]?>&amp;description=<?= $arResult["ASD_TEXT"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;">Vkontakte</a>
	
	<a class="asd_od_share b_social-button social-button_odnoklassniki" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_OD"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_OD_TITLE")?>" onclick="window.open('http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st._surl=<?=$arResult["ASD_URL"]?><?= substr($arResult["ASD_URL"], -3)=="%2F" ? "%3F" : ""?>', '', 'scrollbars=yes,resizable=no,width=620,height=450,top='+Math.floor((screen.height - 450)/2-14)+',left='+Math.floor((screen.width - 620)/2-5)); return false;">Odnoklassniki</a>
	
	<a class="asd_lj_share b_social-button social-button_livejournal" rel="nofollow" href="http://www.livejournal.com/update.bml?subject=<?= $arResult["ASD_TITLE"]?>&amp;event=<?= $arResult["ASD_HTML"]?>" target="_blank" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_LJ"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_LJ_TITLE")?>">Livejournal</a>
</div>


<!--/noindex-->