<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b_grid margin-bottom_10px margin-top_10px" style='clear:both;'>
<? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="b_grid_unit-1-5">
		<div class="margin-left-right_10px">
			
				<h4 class="ff_helvetica-neue-roman color_7e7e7e fs_10px"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></h4>
				<a class="display_block link_decoration color_7e7e7e" href="<?=$arItem["DETAIL_PAGE_URL"]?>"  style="text-decoration: none;"><span class="ff_helvetica-neue-light color_005197 fs_18px"><?=$arItem["NAME"]?></span></a>
				<? /* <span class="ff_helvetica-neue-light  fs_12px"><br><?=substr(strip_tags($arItem["DETAIL_TEXT"]),0,100);?>...</span> */ ?>
				

		</div>
	</div>
<? endforeach ?>
	<div class="b_grid_unit-1-5 subscribe_last_news_block">
		<div class="margin-left-right_10px">
				<script type="text/javascript">
// <![CDATA[
var us_msg = {missing: "Не задано обязательное поле: \"%s\"", invalid: "Недопустимое значение поля: \"%s\"", email_or_phone: "Не задан ни email, ни телефон", no_list_ids: "Не выбрано ни одного списка рассылки"};
var us_emailRegexp = /^[a-zA-Z0-9_+=-]+[a-zA-Z0-9\._+=-]*@[a-zA-Z0-9][a-zA-Z0-9-]*(\.[a-zA-Z0-9]([a-zA-Z0-9-]*))*\.([a-zA-Z]{2,6})$/;
var us_phoneRegexp = /^\s*[\d +()-.]{7,32}\s*$/;
if (typeof us_ == 'undefined') {
 var us_ = new function() {
 
 var onLoadCalled = false;
 var onLoadOld = window.onload;
 window.onload = function() { us_.onLoad(); };
 var onResizeOld = null;
 var popups = [];
 
 function autodetectCharset(form) {
 var ee = form.getElementsByTagName('input');
 for (var i = 0;  i < ee.length;  i++) {
 var e = ee[i];
 if (e.getAttribute('name') == 'charset') {
 if (e.value == '') {
 // http://stackoverflow.com/questions/318831
 e.value = document.characterSet ? document.characterSet : document.charset;
 }
 return;
 }
 }
 }
 
 function createAndShowPopup(form) {
 var d = document;
 // outerHTML(): http://stackoverflow.com/questions/1700870
 var e = d.createElement('div');
 e.style.position = 'absolute';
 e.style.width = 'auto';
 e = d.body.appendChild(e);
 e.appendChild(form);
 form.style.display = '';
 popups.push(e);
 }
 
 function centerAllPopups() {
 // Multiple popups will overlap, but nobody cares until somebody cares.
 var w = window;
 var d = document;
 var ww = w.innerWidth ? w.innerWidth : d.body.clientWidth;
 var wh = w.innerHeight ? w.innerHeight : d.body.clientHeight;
 for (var i = 0;  i < popups.length;  i++) {
 var e = popups[i];
 var ew = parseInt(e.offsetWidth + '');
 var eh = parseInt(e.offsetHeight + '');
 e.style.left = (ww - ew) / 2 + d.body.scrollLeft + (i * 10);
 e.style.top = (wh - eh) / 2 + d.body.scrollTop + (i * 10);
 }
 }
 
 this.onLoad = function() {
 var i;
 var ffl = document.getElementsByTagName('form');
 var ff = [];
 // NodeList changes while we move form to different parent; preload into array.
 for (i = 0;  i < ffl.length;  i++) {
 ff.push(ffl[i]);
 }
 
 for (i = 0;  i < ff.length;  i++) {
 var f = ff[i];
 var a = f.getAttribute('us_mode');
 if (!a) {
 continue;
 }
 if (a == 'popup') {
 createAndShowPopup(f);
 }
 autodetectCharset(f);
 }
// console.log(popups);
 centerAllPopups();
 onResizeOld = window.onresize;
 window.onresize = function() { us_.onResize(); };
 onLoadCalled = true;
 if (onLoadOld) {
 onLoadOld();
 }
 };
 
 this.onResize = function() {
 centerAllPopups();
 if (onResizeOld) {
 onResizeOld();
 }
 };
 
 this.onSubmit = function(form) {
 if (!onLoadCalled) {
 alert('us_.onLoad() has not been called');
 return false;
 }
 
 function trim(s) {
 return s == null ? '' : s.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
 }
 
 var d = document;
 
 var ee, i, e, n, v, r, k, b1, b2;
 var hasEmail = false;
 var hasPhone = false;
 
 ee = form.getElementsByTagName('input');
 for (i = 0;  i < ee.length;  i++) {
 e = ee[i];
 n = e.getAttribute('name');
 if (!n || e.getAttribute('type') != 'text') {
 continue;
 }
 
 v = trim(e.value);
 if (v == '') {
 k = e.getAttribute('_required');
 if (k == '1') {
 alert(us_msg['missing'].replace('%s', e.getAttribute('_label')));
 e.focus();
 return false;
 }
 continue;
 }
 
 if (n == 'email') {
 hasEmail = true;
 } else if (n == 'phone') {
 hasPhone = true;
 }
 
 k = e.getAttribute('_validator');
 r = null;
 switch (k) {
 case null:
 case '':
 case 'date':
 break;
 case 'email':
 r = us_emailRegexp;
 break;
 case 'phone':
 r = us_phoneRegexp;
 break;
 case 'float':
 r = /^[+\-]?\d+(\.\d+)?$/;
 break;
 default:
 alert('Internal error: unknown validator "' + k + '"');
 e.focus();
 return false;
 }
 if (r && !r.test(v)) {
 alert(us_msg['invalid'].replace('%s', e.getAttribute('_label')));
 e.focus();
 return false;
 }
 }
 
 if (!hasEmail && !hasPhone) {
 alert(us_msg['email_or_phone']);
 return false;
 }
 
 ee = form.getElementsByTagName('input');
 b1 = false;
 b2 = false;
 for (i = 0;  i < ee.length;  i++) {
 e = ee[i];
 if (e.getAttribute('name') != 'list_ids[]') {
 continue;
 }
 b1 = true;
 if (e.checked) {
 b2 = true;
 break;
 }
 }
 if (b1 && !b2) {
 alert(us_msg['no_list_ids']);
 return false;
 }
 
 return true;
 };
 };
}
// ]]>
</script>
 
<style type="text/css">
/* <![CDATA[ */
#us_form {
 margin: 0;

 font-size: 13px;
 font-style: normal;
 font-weight: normal;
 text-decoration: none;
 color: black;
 background-color: white;
 overflow: visible;
}
 
#us_form table {
 margin: 0;
}
#us_form th, #us_form td {
 vertical-align: top;
 text-align: left;
 border: 0;
 padding: 0;
 
}
 
/* http://stackoverflow.com/questions/1100409 */
.us_input, .us_select {
    border-top: 1px #acaeb4 solid;
    border-left: 1px #dde1e7 solid;
    border-right: 1px #dde1e7 solid;
    border-bottom: 1px #e3e9ef solid;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    padding: 2px;
}
.us_input:hover, .us_select:hover, .us_input:focus, .us_select:focus {
    border-top: 1px #5794bf solid;
    border-left: 1px #c5daed solid;
    border-right: 1px #b7d5ea solid;
    border-bottom: 1px #c7e2f1 solid;
}
 
label input.us_checkbox {
 margin-right: 4px;
}

.subscribe_last_news_block{
    padding: 5px 0px;
    border-radius: 3px;
    background: #f0f6fa;
}

.subscribe_last_news_text {
    display: block;
    text-align: right;
}

.subscribe_last_news_row{
     margin: 5px 0;
}

.subscribe_last_news_input_text{
    width: 120px;
    background-color:#FFFFFF;
    border-color: #259CCF;
}


.subscribe_last_news_input_submit {
    background: none repeat scroll 0 0 #259CCF;
    border: medium none;
    color: #FFFFFF;
    cursor: pointer;
    height: 24px;
    width: 110px;
}
/* ]]> */
</style>
<span class='ff_helvetica-neue-light fs_12px subscribe_last_news_text'>Подписаться на акции и спецпредложения UP-House</span>
<form class='ff_helvetica-neue-light fs_12px' method="post" action="http://cp.unisender.com/ru/subscribe?hash=5yfi4ypr9t5hgzfa45ps5xezgxwpeqzsgfrt91jy" onsubmit="return us_.onSubmit(this);" us_mode="embed"><table style="display:inline-table;*display:inline"><tr><td>
<table class="subscribe_last_news_row"><tr><th style="border:0; padding:3px; width:50px">Имя:</th><td><input type="text" name="f_3048194" value="" _required="0" _validator="" _label="Имя" class="us_input subscribe_last_news_input_text"/></td></tr></table>
<table class="subscribe_last_news_row"><tr><th style="border:0; padding:3px; width:50px">E-mail:</th><td ><input type="text" name="email" value="" _required="0" _validator="email" _label="E-mail" class="us_input subscribe_last_news_input_text"/></td></tr></table>
<table><tr><th style="border:0; padding:3px; width:100px">&nbsp;&nbsp;</th><td ><input type="submit" value="Подписаться" class="us_submit subscribe_last_news_input_submit" /></td></tr></table>
<input type="hidden" name="charset" value=""/>
<input type="hidden" name="default_list_id" value="2642529"/>
</td></tr></table><input type="hidden" name="overwrite" value="2" />
</form>
</div>
</div>
</div>
