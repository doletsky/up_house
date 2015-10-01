<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
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
			/*
			BX.submit(orderForm, 'save', 'Y', function() {
				var phone_input = $("#<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][3]["FIELD_NAME"]?>");
				phone_input.val('14');
			});
			*/
			BX.submit(orderForm);

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
			?><form action="<?=$APPLICATION->GetCurPage();?>" method="POST" name="ORDER_FORM" id="ORDER_FORM">
			<?=bitrix_sessid_post()?>			<div class="b_grid">
				<div class="b_grid_unit-1-2">
					<h1 class="fs_36px margin-top_20px">Оформление заказа</h1>
				</div>
				<div class="b_grid_unit-1-2 ta_right">
					<a class="link_007eb4 margin-top_35px float_right display_block" href="/personal/basket/">Назад в корзину</a>
				</div>
			</div>
			<div id="order_form_content">
			<?
		}
		else
		{
			$APPLICATION->RestartBuffer();
		}
		if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y")
		{
			foreach($arResult["ERROR"] as $v)
				echo ShowError($v);

			?>
			<script>
				top.BX.scrollToNode(top.BX('ORDER_FORM'));
			</script>
			<?
		}
		?>
		<? if($_POST["is_ajax_post"] == "Y"): ?>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jQuery/1.9.1/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/private/libs/jquery.inputmask.bundle.min.js"></script>
		<? endif ?>
					<div class="b_grid">
						<div class="b_grid_level grid_level_15px">
			<? $curUserType = $arResult['USER_VALS']['PERSON_TYPE_ID'] ?>
		<?
		include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/person_type.php");
		if($curUserType == 1)
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/userfizprops.php");
		elseif($curUserType == 2)
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/userjuzprops.php");
		?>
						</div>
						<div class="b_line"></div>
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
		?>		
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