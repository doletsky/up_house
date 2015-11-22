<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript" src="http://pickpoint.ru/select/postamat.js" charset="UTF-8"></script>
<script type="text/javascript">
    function PickPointResult(result){
        document.getElementById('ORDER_PROP_41').value=result['id'];
        document.getElementById('ORDER_PROP_7').innerHTML=result['name']+'\n'+result['address'];
    }
</script>


<?CUtil::InitJSCore(array('fx', 'popup', 'window', 'ajax'));?>
<?
	$curUserType = 0;
?>
<a name="order_form"></a>

<NOSCRIPT>
	<div class="errortext"><?=GetMessage("SOA_NO_JS")?></div>
</NOSCRIPT>

<?
if(!$USER->IsAuthorized() && $arParams["ALLOW_AUTO_REGISTER"] == "N")
{
	if(!empty($arResult["ERROR"]))
	{
		foreach($arResult["ERROR"] as $v)
			echo ShowError($v);
	}
	elseif(!empty($arResult["OK_MESSAGE"]))
	{
		foreach($arResult["OK_MESSAGE"] as $v)
			echo ShowNote($v);
	}

	include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/auth.php");
}
else
{
	if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
	{
		if(strlen($arResult["REDIRECT_URL"]) > 0)
		{
			?>
			<script>
			<!--
			window.top.location.href='<?=CUtil::JSEscape($arResult["REDIRECT_URL"])?>';
			//-->
			</script>
			<?
			die();
		}
		else
		{
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/confirm.php");
		}
	}
	else
	{
		?>
		<script>
		<!--
		function submitForm(val)
		{
			if(val != 'Y')
				BX('confirmorder').value = 'N';
			
			var orderForm = BX('ORDER_FORM');
			
			BX.ajax.submitComponentForm(orderForm, 'order_form_content', true);
			<? if($USER->IsAdmin()): ?>
			
			<? endif ?>
			BX.submit(orderForm, 'save', 'Y', function() {
				$('#order_form_content').append('<div id="order_wait_blc"></div>');
				$('#order_wait_blc').fadeTo(0, 0.5);
				var wait_left = $(window).width()/2 - 32;
				var wait_top = $(window).scrollTop() + 350;
				$('#wait_order_form_content').css('left', wait_left);
				$('#wait_order_form_content').css('top', wait_top);
			});

			return true;
		}

		function SetContact(profileId)
		{
			BX("profile_change").value = "Y";
			submitForm();
		}
		//-->
		</script>
		<?if($_POST["is_ajax_post"] != "Y")
		{
			?>
			
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jquery.inputmask.bundle.min.js"></script>
			<form action="<?=$APPLICATION->GetCurPage();?>" method="POST" name="ORDER_FORM" id="ORDER_FORM">
			<?=bitrix_sessid_post()?>
<?if(0):?>
            <!-- �������� ������� ���������� ������ -->
            <div id="page-cart" style="margin-top: 25px">

            <!-- ���� ���������� ������ -->
            <div class="main-shadow">
            <!-- breadcrumbs -->
            <div class="breadcrumbs">
                <a href="#" class="breadcrumbs-item">�������</a>
                <div class="breadcrumbs-item">�������</div>
            </div>
            <!-- /breadcrumbs -->

            <section class="cart-section section-container">
            <div class="row">
                <div class="col-xs-9"><h1 class="cart-title entry-title">���������� ������</h1></div>
                <div class="col-xs-3"><a href="/personal/basket/" class="pull-right button-link-underline">����� � �������</a></div>
            </div>

            <div class="row">
                <!-- ��� ����������� -->
                <div class="col-xs-6">
                    <h3 class="entry-title-3">��� �����������</h3>

                    <div class="input-row">
                        <input id="radio-input-1" type="radio" value="myValue 1" name="radio-payer-type" checked>
                        <label for="radio-input-1" class="input-helper input-helper--radio">���������� ����</label>
                        <br />
                        <input id="radio-input-2" type="radio" value="myValue 2" name="radio-payer-type">
                        <label for="radio-input-2" class="input-helper input-helper--radio">����������� ����</label>
                    </div>
                </div>
                <!-- /��� ����������� -->
                <!-- ���������� ������ -->
                <div class="col-xs-6">
                    <div class="contact-details">
                        <h3 class="entry-title-3">���������� ������</h3>
                        <input type="text" placeholder="�.�.�.*" required class="form-input form-input-name"><br />
                        <input type="email" placeholder="e-mail*" required class="form-input form-input-name"><br />
                        <input type="tel" placeholder="���������� �������*" required class="form-input form-input-name"><br />
                    </div>
                </div>
                <!-- /���������� ������ -->
            </div>

            <div class="horizontal-line horizontal-line-main"></div>

            <div class="cart-container-2">
            <div class="row">
                <!-- ��� ������ -->
                <div class="col-xs-6">
                    <div class="your-region">
                        <div class="clearfix">
                            <h3 class="entry-title-3 pull-left">��� ������</h3>
                            <div class="form-select-wrapper dark">
                                <select class="form-select">
                                    <option class="form-option">������ � ��</option>
                                    <option class="form-option">�����-���������</option>
                                </select>
                            </div>
                        </div>


                        <div class="input-row">
                            <input id="radio-input-3" type="radio" value="myValue 3" name="radio-delivery" checked>
                            <label for="radio-input-3" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="car-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">�������� �� ������ � �������� ����</span>
                                                                    <span class="product-delivery-text">���������� �������� �� ������ � �������� ���� 300 ���</span>
                                                                </span>
                            </label>
                            <br />

                            <input id="radio-input-4" type="radio" value="myValue 4" name="radio-delivery">
                            <label for="radio-input-4" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="car-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">�������� �� ��������� ����</span>
                                                                    <span class="product-delivery-text">���������� �������� �� ������ �� ��������� ���� � ���������� ������� - �� 400 ���</span>
                                                                </span>
                            </label>
                            <br />

                            <input id="radio-input-5" type="radio" value="myValue 4" name="radio-delivery">
                            <label for="radio-input-5" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="metro-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">���������</span>
                                                                    <span class="product-delivery-text">�. ������, ��������������� ������, �. 7, �. 20, �������-���������������� ����� ��������-����, ������� +7 (495) 966-1234</span>
                                                                </span>
                            </label>
                            <br />

                            <input id="radio-input-6" type="radio" value="myValue 4" name="radio-delivery">
                            <label for="radio-input-6" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="pick-point-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">�������� ����� ���� ���������� PickPoint</span>
                                                                    <span class="product-delivery-text">�������� ����� ���� ���������� PickPoint - 590 ��� <a href="#">��� ����� �������� pickpoint?</a></span>
                                                                </span>
                            </label>
                            <a href="#" class="button-link-underline">��������� � ��������</a>

                        </div>
                    </div>
                </div>
                <!-- /��� ������ -->
                <!-- ��������� ������� -->
                <div class="col-xs-6">
                    <div class="payment-system">
                        <h3 class="entry-title-3">��������� �������</h3>
                        <div class="input-row">
                            <input id="radio-input-8" type="radio" value="myValue 8" name="radio-payment-system" checked>
                            <label for="radio-input-8" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="cash-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">��������</span>
                                                                    <span class="product-delivery-text">������ ��������� ������� ��� ���������, ����� �������� ������������</span>
                                                                </span>
                            </label>
                            <br />

                            <input id="radio-input-9" type="radio" value="myValue 9" name="radio-payment-system">
                            <label for="radio-input-9" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="credit-card-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">���������� ������ ������</span>
                                                                    <span class="product-delivery-text">���������� ������ VISA/Mastercard ��� ������ �������� (����� ������� PayU).</span>
                                                                </span>
                            </label>
                            <br />

                            <input id="radio-input-10" type="radio" value="myValue 10" name="radio-payment-system">
                            <label for="radio-input-10" class="input-helper input-helper--radio">
                                                                <span class="product-delivery-img">
                                                                    <i class="credit-icon product-sprite"></i>
                                                                </span>
                                                                <span class="product-delivery-content">
                                                                    <span class="product-delivery-title">� ������ (�������� 5%)</span>
                                                                    <span class="product-delivery-text">
                                                                        ������ � ������ "�������� ��������� �������"
                                                                        ������ �� ��������� ����������� ����� �� �����, ����� � ������� 2 �����
                                                                        * ��������� ���������� � ������� <a href="#">������</a>
                                                                    </span>
                                                                </span>
                            </label>

                        </div>
                        <a href="#" class="button-link-underline">��������� �� ������</a>
                    </div>
                </div>
                <!-- /��������� ������� -->
            </div>

            <div class="row">

                <!-- ����� �������� -->
                <div class="col-xs-6">
                    <div class="delivery-address">
                        <h3 class="entry-title-3">����� ��������*</h3>
                        <textarea class="form-textarea" placeholder="������� ����� ��������*"></textarea>
                    </div>
                </div>
                <!-- /����� �������� -->

                <!-- ����� �� ������ -->
                <div class="col-xs-6">
                    <div class="discount-coupon">
                        <h3 class="entry-title-3">����� �� ������</h3>
                        <div class="coupon-code-block mb-4 clearfix">
                            <input type="text" class="coupon-code-input" placeholder="������� ��� ������">
                            <a href="#" class="button-transparent coupon-code-button">���������</a>
                        </div>
                    </div>
                </div>
                <!-- /����� �� ������ -->

            </div>

            <div class="horizontal-line horizontal-line-main"></div>

            <div class="cart-container-2">
                <div class="row">
                    <!-- ������ ������ -->
                    <div class="col-xs-6">
                        <div class="composition-order">
                            <h3 class="entry-title-3">������ ������</h3>
                            <table class="table-cart">
                                <tr class="table-row-product">
                                    <td class="table-cart-chill table-cart-product-title">
                                        <div class="cart-product-title">
                                            <a href="#" class="cart-product-title-link">
                                                Apple iPhone 5S 16GB White&amp;Silver (�����) �1530/1457
                                            </a>
                                        </div>
                                    </td>
                                    <td class="table-cart-chill table-cart-product-select">
                                        <div class="cart-product-select-num">1 </div>
                                    </td>
                                    <td class="table-cart-chill table-cart-product-price">
                                        <div class="cart-product-price-num">
                                            26 700 <span class="cart-product-price-cy">���.</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-row-addition">
                                    <td colspan="2" class="table-cart-chill table-cart-product-title">
                                        <div class="cart-product-title">
                                            <div class="tick-icon-dark product-sprite"></div>
                                            <a href="#" class="cart-additiont-title-link">
                                                ������ Apple USB to Lightning
                                            </a>
                                        </div>
                                    </td>
                                    <td class="table-cart-chill table-cart-product-price">
                                        <div class="cart-addition-price-num">
                                            890 <span class="cart-product-price-cy">���.</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-row-addition table-row-last">
                                    <td colspan="2" class="table-cart-chill table-cart-product-title">
                                        <div class="cart-product-title">
                                            <div class="tick-icon-dark product-sprite"></div>
                                            <a href="#" class="cart-additiont-title-link">
                                                ������������� �������� ����������
                                            </a>
                                        </div>
                                    </td>

                                    <td class="table-cart-chill table-cart-product-price">
                                        <div class="cart-addition-price-num">
                                            990 <span class="cart-product-price-cy">���.</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-row-product">
                                    <td class="table-cart-chill table-cart-product-title">
                                        <div class="cart-product-title">
                                            <a href="#" class="cart-product-title-link">
                                                ������� Jawbone Up24 Lemon Lime (��������) M
                                            </a>
                                        </div>
                                    </td>

                                    <td class="table-cart-chill table-cart-product-select">
                                        <div class="cart-product-select">
                                            <div class="cart-product-select-num">1</div>
                                        </div>
                                    </td>

                                    <td class="table-cart-chill table-cart-product-price">
                                        <div class="cart-product-price-num">
                                            5 990 <span class="cart-product-price-cy">���.</span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-row-addition">
                                    <td colspan="2" class="table-cart-chill table-cart-product-title">
                                        <div class="cart-product-title">
                                            <div class="tick-icon-dark product-sprite"></div>
                                            <a href="#" class="cart-additiont-title-link">
                                                ������� ��������
                                            </a>
                                        </div>
                                    </td>
                                    <td class="table-cart-chill table-cart-product-price">
                                        <div class="cart-addition-price-num">
                                            620 <span class="cart-product-price-cy">���.</span>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- /������ ������ -->
                    <!-- ����������� � ������ -->
                    <div class="col-xs-6">
                        <div class="comments-order">
                            <h3 class="entry-title-3">����������� � ������</h3>
                            <textarea class="form-textarea" placeholder="�������� ��� ����������� � ���� ����"></textarea>
                        </div>
                    </div>
                    <!-- /����������� � ������ -->
                </div>

                <!-- ����� -->
                <div class="cart-total ordering mt-5 clearfix">
                    <div class="cart-total-section">
                        <a href="#" class="button-bg cart-total-button">��������</a>
                    </div>

                    <div class="cart-total-section-1">
                        <div class="cart-total-content-2">
                            <span class="cart-total-text-2">������� ��:</span> <span class="cart-total-num-2">35 190 ���.</span><br />
                            <span class="cart-total-text-2">��������:</span> <span class="cart-total-num-2">300 ���.</span>
                        </div>
                    </div>

                    <div class="cart-total-section-2">
                        <div class="cart-total-content">
                            <span class="cart-total-text">�����:</span>
                            <span class="cart-total-num">35 190</span>
                            <span class="cart-total-cy">���.</span>
                        </div>
                    </div>
                </div>
                <!-- /����� -->
            </div>
            </div>

            </section>
            </div>
            <!-- /���������� ������ -->

            </div>
            <!-- /�������� ������� ���������� ������ -->
<?endif?>
<!--            <div class="b_grid">-->
<!--				<div class="b_grid_unit-1-2">-->
<!--					<h1 class="fs_36px margin-top_20px">���������� ������</h1>-->
<!--				</div>-->
<!--				<div class="b_grid_unit-1-2 ta_right">-->
<!--					<a class="link_007eb4 margin-top_35px float_right display_block" href="/personal/basket/">����� � �������</a>-->
<!--				</div>-->
<!--			</div>-->
<!---->
<!--			<div id="order_form_content">-->

            <!-- �������� ������� ���������� ������ -->
            <div id="page-cart" style="margin-top: 25px">

                <!-- ���� ���������� ������ -->
                <div class="main-shadow">
                    <!-- breadcrumbs -->
                    <div class="breadcrumbs">
                        <a href="#" class="breadcrumbs-item">�������</a>
                        <div class="breadcrumbs-item">�������</div>
                    </div>
                    <!-- /breadcrumbs -->

                    <section class="cart-section section-container">
                        <div class="row">
                            <div class="col-xs-9"><h1 class="cart-title entry-title">���������� ������</h1></div>
                            <div class="col-xs-3"><a href="/personal/basket/" class="pull-right button-link-underline">����� � �������</a></div>
                        </div>

			<?
		}
		else
		{
			$APPLICATION->RestartBuffer();
		}
		if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y")
		{ ?>
			<div class="order_error_cont">
				<div class="order_error_blc">
				<?
				foreach($arResult["ERROR"] as $v) {
					echo $v;
					echo '<br>';
				}
	
				?>
				</div>
			</div>
			<script>
				top.BX.scrollToNode(top.BX('ORDER_FORM'));
			</script>
		<?
		}
		?>
		<? if($_POST["is_ajax_post"] == "Y"): ?>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jquery.inputmask.bundle.min.js"></script>
		<? endif ?>
                        <div class="row">
                            <!-- ��� ����������� -->
                            <div class="col-xs-6">
                                <? $curUserType = $arResult['USER_VALS']['PERSON_TYPE_ID'] ?>
                                <?
                                include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/person_type.php");
                                ?>
                            </div>
                            <!-- /��� ����������� -->
                            <!-- ���������� ������ -->
                            <div class="col-xs-6" id="load-person">

                                <?
                                if($curUserType == 1)
                                    include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/userfizprops.php");
                                elseif($curUserType == 2)
                                    include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/userjuzprops.php");
                                ?>

                            </div>
                            <!-- /���������� ������ -->
                        </div>




		<? if($curUserType == 2): ?>
		<div class="b_grid">
		<div class="b_grid_level grid_level_30px">
			<? include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/companyprops.php"); ?>
		</div>
						<div class="b_line"></div>
					</div>
		<? endif ?>
						<div class="b_grid_level grid_level_30px">
		<?
		/*
		if ($arParams["DELIVERY_TO_PAYSYSTEM"] == "p2d")
		{
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php");
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/delivery.php");
		}
		else
		{
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/delivery.php");
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php");
		}
		*/
		?>
            <div class="b_grid_unit-11-24 bottom_part">
            <?
            include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/delivery.php");
            ?>
            <?
            //if($USER->IsAdmin())
            include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/coupon.php");
            ?>
            </div>
            <div class="b_grid_unit-11-24 bottom_part">
		<?
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php");
		?>
			</div>
			<div class="b_grid_unit-1-24"></div>

        </div>
        <div class="b_line"></div>
		<?

		include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/summary.php");
		if(strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
			echo $arResult["PREPAY_ADIT_FIELDS"];
		?>
		<?if($_POST["is_ajax_post"] != "Y")
		{
			?>
				</div>
				<input type="hidden" name="confirmorder" id="confirmorder" value="Y">
				<input type="hidden" name="profile_change" id="profile_change" value="N">
				<input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
			</form>
			<?if($arParams["DELIVERY_NO_AJAX"] == "N"):?>
				<script language="JavaScript" src="/bitrix/js/main/cphttprequest.js"></script>
				<script language="JavaScript" src="/bitrix/components/bitrix/sale.ajax.delivery.calculator/templates/.default/proceed.js"></script>
			<?endif;?>
			<?
		}
		else
		{
			?>
			<script>
				top.BX('confirmorder').value = 'Y';
				top.BX('profile_change').value = 'N';
			</script>
			<?
			die();
		}
	}
}
?>
</section>
</div>
<!-- /���������� ������ -->

</div>
<!-- /�������� ������� ���������� ������-->
<script>
        $('input[name="PERSON_TYPE"]').click(function(){
            if($(this).val()==1){
                $('#load-person').load('<?=$templateFolder?>/userfizprops.php');
            }
            if($(this).val()==2){
                $('#load-person').load('<?=$templateFolder?>/userjuzprops.php');
            }
        });

</script>