<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="news-reviews main-section">
    <div class="row">
        <div class="col-xs-9">
            <div>
                <h2 class="news-reviews-title entry-title">������� � ������</h2>
                <div class="news-reviews-content">

<? foreach($arResult["ITEMS"] as $arItem):?>
                    <article class="news-reviews-item">
                        <time class="news-reviews-date" datetime="<?=$arItem["DISPLAY_ACTIVE_FROM"]?>"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></time>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-reviews-text"><?=$arItem["NAME"]?></a>
                    </article>
<? endforeach;?>

                </div>
            </div>
        </div>

        <div class="col-xs-3">

            <!-- ����������� -->
            <aside class="subscribe">
                <div class="subscribe-content">
                    <div class="subscribe-title">��������� ������<br /> � ����� ������</div>
                    <form method="post" action="http://cp.unisender.com/ru/subscribe?hash=5yfi4ypr9t5hgzfa45ps5xezgxwpeqzsgfrt91jy" onsubmit="return us_.onSubmit(this);" us_mode="embed">
                        <input type="text" class="subscribe-input" placeholder="���" name="f_3048194" value="" _required="0" _validator="" _label="���" />
                        <input type="text" class="subscribe-input" placeholder="email" name="email" value="" _required="0" _validator="email" _label="E-mail" />
                        <input type="submit" class="subscribe-button" value="�����������" />
                        <input type="hidden" name="charset" value=""/>
                        <input type="hidden" name="default_list_id" value="2642529"/>
                        <input type="hidden" name="overwrite" value="2" />
                    </form>
                </div>
            </aside>
        </div>
    </div>
</section>
    <script type="text/javascript">
        // <![CDATA[
        var us_msg = {missing: "�� ������ ������������ ����: \"%s\"", invalid: "������������ �������� ����: \"%s\"", email_or_phone: "�� ����� �� email, �� �������", no_list_ids: "�� ������� �� ������ ������ ��������"};
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
