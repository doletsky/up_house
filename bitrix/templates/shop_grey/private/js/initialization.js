$(function(){
	$('html').removeClass('no-js');
	$('.tablebodytext').hide();
	/* Перемещение картинки в поле input-text */
	$('.b_input-text_glyph').each(function(){
		var $this=$(this),
			glyph=$this.prev(),
			glyphWidth=glyph.outerWidth(),
			glyphHeight=glyph.outerHeight(),
			glyphMargin=Math.round(glyph.outerWidth() / 4),
			glyphNewOffset={},
			inputWidth=$this.outerWidth(),
			inputHeight=$this.outerHeight(),
			inputWidthDelta=glyphWidth + 2 * glyphMargin,
			inputOffset=$this.offset(),
			inputNewOffset={};
			
		$this.css({
			'width':'-=' + inputWidthDelta,
			'padding-right':'+=' + inputWidthDelta
		});
		glyph.css({
			'display':'inline-block',
			'height':'18px'
		});
		
		glyphNewOffset.left=inputOffset.left + inputWidth - glyphWidth - glyphMargin;
		glyphNewOffset.top=inputOffset.top + Math.round((inputHeight - glyphHeight) / 2);
		glyph.offset(glyphNewOffset);
	});

	/* Главное меню */
	$('.b_main-menu_list').each(function(){
		var $this=$(this),
			menuWidth=$this.width(),
			menuItems=$this.children('.b_main-menu_list-item'),
			menuItemsCount=menuItems.size(),
			menuItemsSumWidth=0;
		
		
		/* Корректировка ширины пунктов главного меню */
		menuItems.each(function(){
			menuItemsSumWidth+=$(this).outerWidth();
		});
		if(menuItemsSumWidth < menuWidth){
			var menuDeltaWidth=menuWidth - menuItemsSumWidth,
				menuItemDeltaWidth=Math.round(menuDeltaWidth / menuItemsCount);
				
			menuItemsSumWidth=0;
			menuItems.each(function(){
				$(this).css('width','+='+menuItemDeltaWidth);
				menuItemsSumWidth+=$(this).outerWidth();
			});
			
			/* Добавление класса модификатора последнему пункту и корректировка ширины последнего пункта */
			menuItems.filter(':last-child').addClass('main-menu_list-item_last').css('width','+=' + (menuWidth - menuItemsSumWidth));
		}
	});
	
	/* Tabs */
	$('.b_tabs_menu').each(function(){
		var $this=$(this),
			menuWidth=$this.width(),
			menuItems=$this.children('.b_tabs_menu-item'),
			menuItemsCount=menuItems.size(),
			menuItemsSumWidth=0;
		
		
		/* Корректировка ширины пунктов главного меню */
		menuItems.each(function(){
			menuItemsSumWidth+=$(this).outerWidth();
		});
		if(menuItemsSumWidth < menuWidth){
			var menuDeltaWidth=menuWidth - menuItemsSumWidth,
				menuItemDeltaWidth=Math.round(menuDeltaWidth / menuItemsCount);
				
			menuItemsSumWidth=0;
			menuItems.each(function(){
				$(this).css('width','+='+menuItemDeltaWidth);
				menuItemsSumWidth+=$(this).outerWidth();
			});
			
			/* Добавление класса модификатора последнему пункту и корректировка ширины последнего пункта */
			menuItems.filter(':last-child').addClass('tabs_menu-item_last').css('width','+=' + (menuWidth - menuItemsSumWidth));
		}
	});
	
	$('.b_tabs').each(function(){
		var $this=$(this),
			items=$('.b_tabs_content',$this),
			links=$('.b_tabs_link',$this);
			
			items.hide();
			links.each(function(){
				$(this).bind('click.b_tabs',function(){
					items.hide();
					links.each(function(){
						$(this).parent().removeClass('tabs_menu-item_active');
					});
					$($(this).attr('href'),$this).show();
					$(this).parent().addClass('tabs_menu-item_active');
					return false;
				});
			});
			links.first().trigger('click');
	});

	
	/* Tiny Carousel */
	$('#promo-slider').tinycarousel({
		controls:false,
		pager:true,
		interval:true,
		intervaltime:3000
	});
	$('.tiny-carousel_goods-slider').tinycarousel({
		pager:true,
		display:4
	});
	$('.tiny-carousel_goods-slider-mini').tinycarousel({
		pager:true,
		display:4
	});	
	
	$('.b_catalog-items-container').each(function(){
		var $this=$(this),
			items=$('.b_catalog-item',$this),
			maxImageHeight=0,
			maxTextHeight=0,
			maxPriceHeight=0;
			items.each(function(){
				var image=$('.b_catalog-item_image',$(this)),
					imageHeight=image.height(),
					text=$('.b_catalog-item_text',$(this)),
					textHeight=text.height(),
					price=$('.b_catalog-item_price',$(this)),
					priceHeight=price.height();
				
				if(imageHeight>maxImageHeight) maxImageHeight=imageHeight;
				if(textHeight>maxTextHeight) maxTextHeight=textHeight;
				if(priceHeight>maxPriceHeight) maxPriceHeight=priceHeight;
				
			});
			
			$('.b_catalog-item_image-container',$this).css('height',maxImageHeight + 'px');
			$('.b_catalog-item_text',$this).css('height',maxTextHeight + 'px');
			$('.b_catalog-item_price',$this).css('height',maxPriceHeight + 'px');
			
	});	
	
	$('.tiny-carousel_goods-slider').each(function(){
		var $this=$(this),
			items=$('.b_goods-slider-item',$this),
			maxImageHeight=0,
			maxTextHeight=0,
			maxPriceHeight=0;
			items.each(function(){
				var image=$('.b_goods-slider-item_image',$(this)),
					imageHeight=image.height(),
					text=$('.b_goods-slider-item_text',$(this)),
					textHeight=text.height(),
					price=$('.b_goods-slider-item_price',$(this)),
					priceHeight=price.height();
					
				if(imageHeight>maxImageHeight) maxImageHeight=imageHeight;
				if(textHeight>maxTextHeight) maxTextHeight=textHeight;
				if(priceHeight>maxPriceHeight) maxPriceHeight=priceHeight;
				
			});
			$('.b_goods-slider-item_image-container',$this).css('height',maxImageHeight + 'px');
			$('.b_goods-slider-item_text',$this).css('height',maxTextHeight + 'px');
			$('.b_goods-slider-item_price',$this).css('height',maxPriceHeight + 'px');
			
	});
	
	$('.b_tiny-carousel').each(function(){
		var $this=$(this),
			viewport=$('.b_tiny-carousel_viewport',$this),
			overview=$('.b_tiny-carousel_overview',$this);
			viewport.css('height',overview.outerHeight() + 'px');
	});	
	
	/* Cart */
	$('.b_spin-edit').each(function(){
		var $this=$(this),
			oPlus=$('.spin-edit_button_plus',$this),
			oMinus=$('.spin-edit_button_minus',$this),
			oInput=$('.b_spin-edit_input',$this),
			oValue=$('.b_spin-edit_value',$this),
			iValue=parseInt(oInput.attr('value'));
			if(!iValue) iValue=0;
			
			oInput.attr('value',iValue);
			oValue.html(iValue);
			
			oPlus.bind('click.b_spin-edit',function(){
				iValue++;
				oInput.attr('value',iValue);
				oValue.html(iValue);
				$('#basket_submit_links').append('<input type="hidden" value="Y" name="BasketRefresh">');
				$('#basket_form').submit();
				return false;
			});
			oMinus.bind('click.b_spin-edit',function(){
				if(iValue>0)
				{
					iValue--;
					oInput.attr('value',iValue);
					oValue.html(iValue);
				}
				$('#basket_submit_links').append('<input type="hidden" value="Y" name="BasketRefresh">');
				$('#basket_form').submit();
				return false;
			});			
	});
	
	/* Scroll Top */
	$('.scroll-top').each(function(){
		$(this).bind('click.scroll-top',function(){
			$("html,body").animate({"scrollTop":0},"1000");
		});
	});
	
	/* news month */
	$('.b_news-month_month').not('.lt-ie9 .b_news-month_month,.ie9 .b_news-month_month').each(function(){
		var width=$('.b_news-month_month-span',$(this)).width();
		$(this).css('top',width+37+'px');
	});
	
	/* Left Right Col */
	$('.right-col').css('right',parseInt(($('.wrapper-outer').width()-$('.wrapper').width())/2)-$('.right-col').width()+'px');
	$('.left-col').css('left',parseInt(($('.wrapper-outer').width()-$('.wrapper').width())/2)-$('.left-col').width()+'px');
	
});