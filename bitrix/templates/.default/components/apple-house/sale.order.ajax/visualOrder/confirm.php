<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b_grid_level grid_level_15px">
<?
if (!empty($arResult["ORDER"]))
{
//var_dump($arResult);
	?>
	<b>Поздравляем. <?=GetMessage("SOA_TEMPL_ORDER_COMPLETE")?></b><br /><br />
	<table class="sale_order_full_table">
		<tr>
			<td>
				<?= GetMessage("SOA_TEMPL_ORDER_SUC", Array("#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"], "#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]))?>
			</td>
		</tr>
	</table>
	<script><?=$arResult['ECOMMERSE'];?></script>
	<?
	if (!empty($arResult["PAY_SYSTEM"]))
	{
		?>
		<br /><br />

		<table class="sale_order_full_table">
			<tr>
				<td>
					<?=GetMessage("SOA_TEMPL_PAY")?>: <?= $arResult["PAY_SYSTEM"]["NAME"] ?>
				</td>
			</tr>
			<?
			if (strlen($arResult["PAY_SYSTEM"]["ACTION_FILE"]) > 0)
			{
				?>
				<tr>
					<td>
						<?
						if ($arResult["PAY_SYSTEM"]["NEW_WINDOW"] == "Y")
						{
							?>
							<script language="JavaScript">
								window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$arResult["ORDER"]["ACCOUNT_NUMBER"] ?>');
							</script>
							<?= GetMessage("SOA_TEMPL_PAY_LINK", Array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$arResult["ORDER"]["ACCOUNT_NUMBER"])) ?>
							<?
						}
						else
						{
							if (strlen($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"])>0)
							{
								include($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]);
							}
						}
						?>
					</td>
				</tr>
				<?
			}
			?>
		</table>
		<?
	}
}
else
{
	?>
	<b><?=GetMessage("SOA_TEMPL_ERROR_ORDER")?></b><br /><br />

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=GetMessage("SOA_TEMPL_ERROR_ORDER_LOST", Array("#ORDER_ID#" => $arResult["ORDER_ID"]))?>
				<?=GetMessage("SOA_TEMPL_ERROR_ORDER_LOST1")?>
			</td>
		</tr>
	</table>
	<?
}
?>						
</div>
<? if(!empty($arResult["ORDER"]) && isset($arResult["ORDER"]['ID'])): ?>
<?
$oderProps = array();
$db_props = CSaleOrderPropsValue::GetList(
	array(),
	array(
		"ORDER_ID" => $arResult["ORDER"]['ID'],
		"CODE" => array('FIO', 'EMAIL')
	),
	false,
	false,
	array()
);
while($arProps = $db_props->Fetch()) {
	$oderProps[$arProps['CODE']] = $arProps;
}

$res = CSaleBasket::GetList(array(), array("ORDER_ID" => $arResult["ORDER"]['ID']));
$items = array();
$comissionPrice = 0;
while ($arItem = $res->Fetch()){
	if($arItem['PRODUCT_ID'] == 3986) // товар "комиссия"
		$comissionPrice = $arItem['PRICE'];
	else
		array_push($items, $arItem);
}
$final_items=array_reverse($items)
?>
  <script type="text/javascript">
	//<![CDATA[
	  var _flocktory = window._flocktory = _flocktory || [];
	  _flocktory.push({
		"items": [
		<? foreach($final_items as $item){?>
		  {"id": "<?= $item['PRODUCT_ID']?>",
		  "title": "<?= $item['NAME']?>",
		  "price": <?= $item['PRICE']?>,
		  "count": <?= $item['QUANTITY']?>}
		<?if (next($items)){?>,<?}?>
	  <?}?>],
		"order_id": "<?= $arResult["ORDER"]['ID']?>",
		"email":    "<?= $oderProps['EMAIL']['VALUE']?>",
		"name":     "<?= $oderProps['FIO']['VALUE']?>",

		"price":     <?= $arResult["ORDER"]['PRICE'] - $arResult["ORDER"]['PRICE_DELIVERY']?>	  
	  });
	  
	  (function() {
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
		s.src = "//api.flocktory.com/1/hello.js";
		var l = document.getElementsByTagName('script')[0]; l.parentNode.insertBefore(s, l);
	  })();
	//]]>
  </script>
<? endif; ?>