
			</div>
			<div class="footer">
				<div class="b_grid">
					<div class="b_grid_level grid_level_40px">
						<div class="b_grid_unit-1-4">
							<div class="b_logo-little va_middle display_inline-block"></div>
							<span class="ff_helvetica-neue-roman color_black fs_12px">&copy;&nbsp;UP-House, <?=date('Y'); ?>

						</div>
						<div class="b_grid_unit-1-4">
							<div class="b_yandex-market"><a class="image-link" href="http://market.yandex.ru/shop/47403/reviews?&from=47403&grade_value=2">Яндекс Маркет</a></div>
						</div>
						<div class="b_grid_unit-1-2">
						<div class="b_grid_unit-1-2 ff_helvetica-neue-roman color_black fs_12px">
							Продвижение сайта -
							<a class='link_007eb4 ws_normal link_decoration seorazum_link'>СЕО Разум</a>
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
						<span class="ff_helvetica-neue-roman color_black fs_10px">Данная информация не является офертой, определяемой положениями статей 435, 437 Гражданского Кодекса РФ</span>
						</div>
					</div>
					</div>
<?/*$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "bottomCatalogMenu", Array(
	"IBLOCK_TYPE" => "catalog",	// Тип инфоблока
	"IBLOCK_ID" => "5",	// Инфоблок
	"SECTION_ID" => "",	// ID раздела
	"SECTION_CODE" => "",	// Код раздела
	"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
	"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
	"SECTION_FIELDS" => array(	// Поля разделов
		0 => "",
		1 => "",
	),
	"SECTION_USER_FIELDS" => array(	// Свойства разделов
		0 => "",
		1 => "",
	),
	"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
	),
	false
);*/?>
				</div>
			</div>
		</div>
 <?/*$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/promosides.php",
		"EDIT_TEMPLATE" => ""
	)
);*/?>

	</div>
<div class="modal_overlay" id="modal_overlay">
	<div class="modal_overlay_wrap">
		<div class="modal_overlay_cont" id="modal_overlay_cont">
		</div>
		<a class="modal_oneClickBuy_close link_007eb4 modal_overlay_close_btn" id="modal_oneClickBuy_close" href="#">закрыть</a>
	</div>
</div>
	</div>

	<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '129325';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

	<!-- Initialization -->
	<!-- <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/js/initialization.js"></script> -->
	<!-- Yandex.Metrika counter -->
<script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter10932967 = new Ya.Metrika({id:10932967, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/10932967" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
        <script type="text/javascript" src="/bitrix/templates/.default/components/apple-house/catalog.section/catalogList/script.js"></script>
</body>
</html>
