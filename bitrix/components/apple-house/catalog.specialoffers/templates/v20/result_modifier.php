<?php
foreach($arResult["ITEMS"] as $id=>$item){
    $arResult["ITEMS"][$id]['BUY_URL']=str_replace('ADD2BASKET', 'BUY', $item['ADD_URL']);
}