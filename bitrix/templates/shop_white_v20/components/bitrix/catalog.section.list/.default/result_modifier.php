<?
if(0){
    $curPage=$APPLICATION->GetCurPage();
    $arDirUrl=explode("/",$curPage);
    $sectCode=$arDirUrl[1];
    if(count($arDirUrl)>2)$sectCode=$arDirUrl[1]."/".$arDirUrl[2];
    $arResult["DEBUG"][]=$arResult["SECTION"]["CODE"];
    $arResult["DEBUG"][]=count($arDirUrl)-1;
    $arResult["DEBUG"][]=$arDirUrl;
    $arResult["DEBUG"][]=strcmp($arResult["SECTION"]["CODE"], $sectCode);
    if(strcmp($arResult["SECTION"]["CODE"], trim($curPage,"/"))==0){
        $arResult["DEBUG"][]="==0";
        $arResult["PARENT"]=$arResult["SECTION"]["ID"];
        if(count($arResult["SECTIONS"])<=0 && $arResult["SECTION"]["IBLOCK_SECTION_ID"]>0){
            $arResult["PARENT"]=$arResult["SECTION"]["IBLOCK_SECTION_ID"];
            $arFilter = Array('IBLOCK_ID'=>$arResult["SECTION"]["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$arResult["SECTION"]["IBLOCK_SECTION_ID"]);
            $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter);
            while($ar_result = $db_list->GetNext())
            {
                $arResult["SECTIONS"]["CHILD"][$arResult["SECTION"]["IBLOCK_SECTION_ID"]][$ar_result['ID']]= $ar_result;
            }
        }
    }
    else{
        $arResult["DEBUG"][]="!=0";
        $arFilter = Array('IBLOCK_ID'=>$arResult["SECTION"]["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', 'CODE'=>$sectCode);
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter);
        if($ar_result = $db_list->GetNext())
        {
            $arResult["SECTION"]= $ar_result;$arResult["DEBUG"][]="new sections";
        }
        $arResult["PARENT"]=$arResult["SECTION"]["ID"];
        $arResult["SECTIONS"]["CHILD"]=array();
        $arFilter = Array('IBLOCK_ID'=>$arResult["SECTION"]["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$arResult["SECTION"]["ID"]);
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter);
        while($ar_result = $db_list->GetNext())
        {
            $arResult["SECTIONS"]["CHILD"][$arResult["SECTION"]["ID"]][$ar_result['ID']]= $ar_result;
        }
    }
}


?>