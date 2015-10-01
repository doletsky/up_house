<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<? if($USER->IsAdmin()):?>
    <div class="color_007db3 fs_16px" style="line-height: 22px;">
        Если Вы внимательно изучите текст, приведенный ниже, то узнаете ответы на 95% самых популярных вопросов от наших клиентов! Если Вы не нашли ответа на свой вопрос - свяжитесь с нами, и мы Вас проконсультируем.
        <?//=$arResult['DESCRIPTION']?>
    </div>
<? endif?>
<? foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="margin-top_10px faq_block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="color_253487 fs_18px faq_question">
            Q:&nbsp;&nbsp;&nbsp;<?=$arItem['NAME']?>
        </div>
        <div class="color_black margin-top_15px fs_14px faq_answer"><?=$arItem["DETAIL_TEXT"]?></div>
    </div>
<? endforeach ?>



<? /* foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="margin-top_10px faq_block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="color_253487 fs_18px faq_question">
            Q:&nbsp;&nbsp;&nbsp;<?=$arItem['NAME']?>
        </div>
        <div class="color_black margin-top_15px fs_14px faq_answer"><?=$arItem["DETAIL_TEXT"]?></div>
    </div>
<? endforeach */?>