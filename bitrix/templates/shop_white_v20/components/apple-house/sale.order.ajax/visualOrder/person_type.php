<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(count($arResult["PERSON_TYPE"]) > 1)
{
	?>
    <h3 class="entry-title-3"><?=GetMessage("SOA_TEMPL_PERSON_TYPE")?></h3>

    <div class="input-row">
    <? foreach($arResult["PERSON_TYPE"] as $v):?>
        <input id="PERSON_TYPE_<?= $v["ID"] ?>" type="radio" value="<?= $v["ID"] ?>" name="PERSON_TYPE" <? if ($v["CHECKED"]=="Y") echo " checked=\"checked\"";?> onClick="submitForm()">
        <label for="PERSON_TYPE_<?= $v["ID"] ?>" class="input-helper input-helper--radio"><?= $v["NAME"] ?></label>
        <br />
    <?endforeach?>
    </div>
    <input type="hidden" name="PERSON_TYPE_OLD" value="<?=$arResult["USER_VALS"]["PERSON_TYPE_ID"]?>">
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