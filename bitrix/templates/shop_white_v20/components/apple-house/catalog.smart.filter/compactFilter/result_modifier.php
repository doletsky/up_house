<?
$uri=$_SERVER['PHP_SELF'];
$arResult["DISPLAY_FILTER_ITEMS"]=array();
foreach($arResult["ITEMS"] as $item){
    if( in_array($item['NAME'], $arParams["FILTER_FIELDS"])) {

$tmpValues=array();
        if($item["PROPERTY_TYPE"] == "N" || isset($item["PRICE"])){
            $tmpValues=$item['VALUES'];
        }
        else{
            foreach($item['VALUES'] as $name=>$data){
                if (preg_match("/iphone-6|iphone-6-plus$/is",$uri) && $item["NAME"]=='�������� ����' && !in_array($data["VALUE"],array('�����','������','�������','�������')))continue;
                if (preg_match("/iphone-6|iphone-6-plus$/is",$uri) && $item["NAME"]=='����� ������' && !in_array($data["VALUE"],array('16 ��','64 ��','128 ��')))continue;
                if (preg_match("/iwatch$/is",$uri) && $item["NAME"]=='�������� ����' && !in_array($data["VALUE"],array('�����','������','�������','�������','�������','����������','�������','�����������','�����')))continue;

                foreach($arResult['COMBO'] as $combo){
                    if($combo[$item['ID']]==$name)$tmpValues[$name]=$item['VALUES'][$name];
                }
            }

            $item['VALUES']=$tmpValues;
        }

        $arResult["DISPLAY_FILTER_ITEMS"][$item['NAME']]=$item;
    }
}
?>
