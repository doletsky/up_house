<?// if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
class printer
{
    private $_realParent;

    public function __construct($parent)
    {
        $this->_realParent = $parent;
    }

    public function printChilds($childsResult, $parentId, $parentDepth, $printCount)
    {
        $ret = "";
        if (isset($childsResult[$parentId]))
        {
            $ret = "<div class=\"b_main-submenu\"><ul class=\"b_main-submenu_list\">";
            if($parentDepth > 1)
            {
                $ret = "<div class='submenu_marker'></div>" . $ret;
            }

            foreach($childsResult[$parentId] as $id => $child)
            {
                $countInfo = "";
                if ($printCount)
                {
                    $countInfo = '&nbsp;(' . $child['ELEMENT_CNT'] . ')';
                }
                $ret .= '<li class="b_main-submenu_list-item" id="'
                        . $this->_realParent->GetEditAreaId($id)
                        . '">'
                        . '<a class="b_main-submenu_link" href="'
                        . $child["SECTION_PAGE_URL"]
                        . '">'
                        . $child["NAME"]
                        . $countInfo
                        . '</a>'
                        . $this->printChilds($childsResult, $id, (int)$child["DEPTH_LEVEL"], $printCount)
                        . '</li>';
            }
            $ret .= "</ul></div>";
        }
        return $ret;
    }
}

//var_dump($arResult);die;
if($arParams["COUNT_ELEMENTS"]) {$printCount = true;}
   else {$printCount = false;}

foreach($arResult['SECTIONS']['TOP'] as $id => $topSection)
{
    $this->AddEditAction($id, $topSection['EDIT_LINK'], CIBlock::GetArrayByID($topSection["IBLOCK_ID"], "SECTION_EDIT"));
    $this->AddDeleteAction($id, $topSection['DELETE_LINK'], CIBlock::GetArrayByID($topSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
    if($printCount) {$countInfo = '&nbsp;(' . $child['ELEMENT_CNT'] . ')';}
    else {$countInfo = '';}
    $childPrinter = new printer($this);
    echo   '<li class="b_main-menu_list-item" id="' . $this->GetEditAreaId($id) . '">'
         . '<a class="b_main-menu_link" href="' . $topSection["SECTION_PAGE_URL"] . '">' . $topSection["NAME"]
         . $countInfo
         . '</a>'
         . $childPrinter->printChilds($arResult['SECTIONS']['CHILD'], $id, (int)$topSection["DEPTH_LEVEL"], $printCount)
         . '</li>';

}
?>
