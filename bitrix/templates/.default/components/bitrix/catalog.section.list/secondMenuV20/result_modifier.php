<?

foreach($arResult["SECTIONS"] as $key => $arSectionList)
{
    foreach($arSectionList as $skey => $arSections)
    {
    if(!empty($arSections["SECTION_PAGE_URL"]))$arResult["SECTIONS"][$key][$skey]["SECTION_PAGE_URL"] = str_replace('%2F', '/', $arSections["SECTION_PAGE_URL"]);
        foreach($arSections as $sskey => $arSection)
        {
            $arResult["SECTIONS"][$key][$skey][$sskey]["SECTION_PAGE_URL"] = str_replace('%2F', '/', $arSection["SECTION_PAGE_URL"]);
            if ($arSection["NAME"] == 'iPad Mini 2 Retina')
                $arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]='iPad Mini 2';
            if (preg_match('/Скидки|Подарки/is',$arSection["NAME"]))
                $arResult["SECTIONS"][$key][$skey][$sskey]["NAME"]='<span style="color:#fb1919">'.$arSection["NAME"].'</span>';
        }
    }
}

?>
