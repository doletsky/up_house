<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(count($arResult["PERSON_TYPE"]) > 1)
{
	?>
    <div class="col-xs-6">
        <h3 class="entry-title-3"><?=GetMessage("SOA_TEMPL_PERSON_TYPE")?></h3>

        <? foreach($arResult["PERSON_TYPE"] as $v):?>
            <div class="input-row">
                <input class="" type="radio" id="PERSON_TYPE_<?= $v["ID"] ?>" name="PERSON_TYPE" value="<?= $v["ID"] ?>"<? if ($v["CHECKED"]=="Y") echo " checked=\"checked\"";?> onClick="submitForm()">
                <label class="input-helper input-helper--radio" for="PERSON_TYPE_<?= $v["ID"] ?>"><?= $v["NAME"] ?></label>

            </div>
        <? endforeach;?>
        <input type="hidden" name="PERSON_TYPE_OLD" value="<?=$arResult["USER_VALS"]["PERSON_TYPE_ID"]?>">
    </div>
	<?
}
else
{
	if(IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"]) > 0)
	{
		?>
		<input type="hidden" name="PERSON_TYPE" value="<?=IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"])?>">
		<input type="hidden" name="PERSON_TYPE_OLD" value="<?=IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"])?>">
		<?
	}
	else
	{
		foreach($arResult["PERSON_TYPE"] as $v)
		{
			?>
			<input type="hidden" id="PERSON_TYPE" name="PERSON_TYPE" value="<?=$v["ID"]?>">
			<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$v["ID"]?>">
			<?
		}
	}
}
?>