<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<nav class="menu-page-block" role="navigation">
<a href="#" class="menu-page-item call_back">Обратный звонок</a>
<? /*
    <div id="call_back_form">
        <span>Ваш телефон</span> <input id="cb_phone" class="input_phone" />
        <br>
        <div class="call_back_button">Перезвоните мне</div>
    </div>
*/?>
<?if (!empty($arResult)):?>
    <a href="/news/" class="link_007eb4 link_decoration menu-page-item">Новости</a>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<a href="<?=$arItem["LINK"]?>" class="link_007eb4 link_decoration menu-page-item"><?=$arItem["TEXT"]?></a>
<?endforeach?>
<?endif?>

</nav>
