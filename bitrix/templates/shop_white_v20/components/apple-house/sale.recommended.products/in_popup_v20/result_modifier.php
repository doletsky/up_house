<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?


//section recomended
$arUfRecom=array();

$resSec = CIBlockElement::GetByID($arParams["ID"]);
while($ar_res_sec = $resSec->GetNext()){
    $arSecTree['ID']=$ar_res_sec['IBLOCK_SECTION_ID'];
    $arSecFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'],'ID'=>$arSecTree['ID']);
    $arSecSelect = Array('UF_RECOMMEND');
    $rsSect = CIBlockSection::GetList(array('sort' => 'asc'),$arSecFilter, false, $arSecSelect);
    if($arSect = $rsSect->GetNext()){
        foreach($arSect['UF_RECOMMEND'] as $idRecom){
            $resRecom = CIBlockElement::GetByID($idRecom);
            if($ar_res_recom = $resRecom->GetNext()){
                $arSecTree['RECOM'][]=$ar_res_recom;
            }
        }
    }
}
//    $arResult["SECTION_TREE"][] = $arSecTree;
$arResult["ID"]=array_merge($arSect['UF_RECOMMEND'],$arResult["ID"]);
//$arResult["ROWS"]=$arSecTree['RECOM'];

?>