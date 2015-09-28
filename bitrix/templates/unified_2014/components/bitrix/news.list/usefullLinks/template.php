<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h2 class="fs_20px">Полезные ссылки</h2>

<div class="color_007db3 fs_14px">
<? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
		switch($arItem['PROPERTIES']['LINK_TYPE']['VALUE']) {
			case 'PDF':
			$linkClass = ' glyphed-block_pdf';
			break;
			case 'XLS':
			$linkClass = ' glyphed-block_stk';
			break;
			case 'DOC':
			$linkClass = '  glyphed-block_doc';
			break;
			default:
			$linkClass = '';
		}
	?>
	<div class="b_glyphed-block<?=$linkClass?>">
		<a class="no-style-link" target="_blank" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
			<?=$arItem['NAME']?>
			<span class="color_7a7d80">(<?=$arItem['PROPERTIES']['FILE_SIZE']['VALUE']?> Mb)</span>
		</a>
	</div>
<? endforeach ?>		
	<div class="b_glyphed-block glyphed-block_itunes margin-top_30px">
		<a class="no-style-link" href="http://www.apple.com/ru/itunes/download/">
			Скачать iTunes — необходимо для работы с iPhone и iPad
		</a>
	</div>						
</div>