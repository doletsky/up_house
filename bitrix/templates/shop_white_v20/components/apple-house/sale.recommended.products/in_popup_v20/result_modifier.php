
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?


//section recomended
$arUfRecom=array();
$stop=5;
$resSec = CIBlockElement::GetByID($arParams["ID"]);
if($ar_res_sec = $resSec->GetNext()){

    $arSecTree['ID']=$ar_res_sec['IBLOCK_SECTION_ID'];
    while($arSecTree['ID']){
        if($stop==0) break;
        else $stop--;
        $arSecFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'],'ID'=>$arSecTree['ID']);
        $arSecSelect = Array('UF_RECOMMEND');
        $rsSect = CIBlockSection::GetList(array('sort' => 'asc'),$arSecFilter, false, $arSecSelect);
        $arSecTree['ID']=false;
        if($arSect = $rsSect->GetNext()){
            $arUfRecom=array_merge($arUfRecom, $arSect['UF_RECOMMEND']);
            $arSecTree['ID']=$arSect['IBLOCK_SECTION_ID'];
        }

    }

}
$arResult["ID"]=array_merge($arUfRecom,$arResult["ID"]);
//$arResult["ID"]= $arUfRecom;
$arResult["PRIOR"]= $arUfRecom;
?>