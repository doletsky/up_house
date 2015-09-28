<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div class="b_grid">
		<div class="b_grid_unit-1-2">
            <div class="g-font size_2 g-ui margin_025">В вашей корзине остались товары</div>
		</div>
	</div>

    <div class="_b-cart-head">
        <p class="g-font size_7">Товары в <a class="js-popup-oncart" href="/personal/basket/">вашей корзине</a></p>
    </div>

	<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form_popup"> 
	<div class="b_cart fs_18px">
		<div class="b_grid">
<?
if (StrLen($arResult["ERROR_MESSAGE"])<=0)
{
	$arUrlTempl = Array(
		"delete" => $APPLICATION->GetCurPage()."?action=delete&id=#ID#",
		"shelve" => $APPLICATION->GetCurPage()."?action=shelve&id=#ID#",
		"add" => $APPLICATION->GetCurPage()."?action=add&id=#ID#",
	);
	?>
		<?
		//if ($arResult["ShowReady"]=="Y")
		include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
		?>

	<?

}
else
{
	include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
	//ShowNote($arResult["ERROR_MESSAGE"]);
}
?>
		</div>
	</div>
	</form>