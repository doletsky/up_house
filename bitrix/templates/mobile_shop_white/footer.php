<? if($catTemplate != 'section'): ?>
                </div>
            </div>
            <div class="b_line line_thick margin-top_35px"></div>
<? else: ?>
            </div>
<? endif ?>
            <div class="footer">
                <div class="b_grid">
                    <div class="b_grid_level grid_level_40px">
                        <div class="b_grid_unit-1-4">
                            <div class="b_logo-little va_middle display_inline-block"></div>
                            <span class="ff_helvetica-neue-roman color_black fs_12px">&copy;&nbsp;UP-House, <?=date('Y'); ?></span>
                        </div>

                        <div class="b_grid_unit-1-4">

                            <div class="b_yandex-market"><a class="image-link" href="http://market.yandex.ru/shop/47403/reviews?&from=47403&grade_value=2">������ ������</a></div>
                        </div>
                        <div class="b_grid_unit-1-2">
                        <div class="b_grid_unit-1-2 ff_helvetica-neue-roman color_black fs_12px">
                            ����������� ����� -
                            <a class='link_007eb4 ws_normal link_decoration' href='http://www.seorazum.ru'>��� �����</a>
                        </div>
                        <div class="b_grid_unit-1-2">
<?$APPLICATION->IncludeComponent("bitrix:menu", "bottomMenu", array(
    "ROOT_MENU_TYPE" => "bottom",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "MENU_CACHE_GET_VARS" => array(
    ),
    "MAX_LEVEL" => "1",
    "CHILD_MENU_TYPE" => "left",
    "USE_EXT" => "N",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "N"
    ),
    false
);?>
                    </div>
                    <div>
                    <span class="ff_helvetica-neue-roman color_black fs_10px">������ ���������� �� �������� �������, ������������ ����������� ������ 435, 437 ������������ ������� ��</span>
                    </div>

                        </div>
                    </div>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "bottomCatalogMenu", array(
    "IBLOCK_TYPE" => "1c_catalog",
    "IBLOCK_ID" => "8",
    "SECTION_ID" => "",
    "SECTION_CODE" => "",
    "COUNT_ELEMENTS" => "N",
    "TOP_DEPTH" => "2",
    "SECTION_FIELDS" => array(
        0 => "",
        1 => "",
    ),
    "SECTION_USER_FIELDS" => array(
        "UF_ACTIVE",
    ),
    "SECTION_URL" => "/#CODE#",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000",
    "CACHE_GROUPS" => "Y",
    "ADD_SECTIONS_CHAIN" => "N"
    ),
    false
);?>
                </div>
            </div>
        </div>
    </div>
<div class="modal_overlay" id="modal_overlay">
    <div class="modal_overlay_wrap">
        <div class="modal_overlay_cont" id="modal_overlay_cont">
        </div>
        <a class="modal_oneClickBuy_close link_007eb4 modal_overlay_close_btn" id="modal_oneClickBuy_close" href="#">�������</a>
    </div>
</div>
</div>
    <!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter10932967 = new Ya.Metrika({id:10932967, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/10932967" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>
