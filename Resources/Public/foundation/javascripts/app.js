/*
 * 	easyListSplitter 1.0.2 - jQuery Plugin
 *	written by Andrea Cima Serniotti	
 *	http://www.madeincima.eu
 *
 *	Copyright (c) 2010 Andrea Cima Serniotti (http://www.madeincima.eu)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 
 /*
	To activate the plugin add the following code to your own js file:
	
	$('.your-list-class-name').easyListSplitter({ 
			colNumber: 3,
			direction: 'horizontal'
	});
	
 */

var j = 1;
 
(function(jQuery) {
	jQuery.fn.easyListSplitter = function(options) {
	
	var defaults = {			
		colNumber: 2, // Insert here the number of columns you want. Consider that the plugin will create the number of cols requested only if there are enough items in the list.
		direction: 'vertical'
	};
			
	this.each(function() {
		
		var obj = jQuery(this);
		var settings = jQuery.extend(defaults, options);
		var totalListElements = jQuery(this).children('li').size();
		var baseColItems = Math.ceil(totalListElements / settings.colNumber);
		var listClass = jQuery(this).attr('class');
		
		// -------- Create List Elements given colNumber ------------------------------------------------------------------------------
		
		for (i=1;i<=settings.colNumber;i++)
		{	
			if(i==1){
				jQuery(this).addClass('listCol1').wrap('<div class="listContainer'+j+'"></div>');
			} else if(jQuery(this).is('ul')){ // Check whether the list is ordered or unordered
				jQuery(this).parents('.listContainer'+j).append('<ul class="listCol'+i+'"></ul>');
			} else{
				jQuery(this).parents('.listContainer'+j).append('<ol class="listCol'+i+'"></ol>');
			}
				jQuery('.listContainer'+j+' > ul,.listContainer'+j+' > ol').addClass(listClass);
		}
		
		var listItem = 0;
		var k = 1;
		var l = 0;	
		
		if(settings.direction == 'vertical'){ // -------- Append List Elements to the respective listCol  - Vertical -------------------------------
			
			jQuery(this).children('li').each(function(){
				listItem = listItem+1;
				if (listItem > baseColItems*(settings.colNumber-1) ){
					jQuery(this).parents('.listContainer'+j).find('.listCol'+settings.colNumber).append(this);
				} 
				else {
					if(listItem<=(baseColItems*k)){
						jQuery(this).parents('.listContainer'+j).find('.listCol'+k).append(this);
					} 
					else{
						jQuery(this).parents('.listContainer'+j).find('.listCol'+(k+1)).append(this);
						k = k+1;
					}
				}
			});
			
			jQuery('.listContainer'+j).find('ol,ul').each(function(){
				if(jQuery(this).children().size() == 0) {
				jQuery(this).remove();
				}
			});	
			
		} else{  // -------- Append List Elements to the respective listCol  - Horizontal ----------------------------------------------------------
			
			jQuery(this).children('li').each(function(){
				l = l+1;

				if(l <= settings.colNumber){
					jQuery(this).parents('.listContainer'+j).find('.listCol'+l).append(this);
					
				} else {
					l = 1;
					jQuery(this).parents('.listContainer'+j).find('.listCol'+l).append(this);
				}				
			});
		}
		
		jQuery('.listContainer'+j).find('ol:last,ul:last').addClass('last'); // Set class last on the last UL or OL	
		j = j+1;
		
	});
	};
})(jQuery);

$(document).ready(function() {

	/* Use this js doc for all application specific JS */
  $(window).resize(function() {
    console.log($(window).width());
  });

	/* TABS --------------------------------- */
	/* Remove if you don't need :) */
	
	var tabs = $('dl.tabs');
		tabsContent = $('ul.tabs-content')
	
	tabs.each(function(i) {
		//Get all tabs
		var tab = $(this).children('dd').children('a');
		tab.click(function(e) {
			
			//Get Location of tab's content
			var contentLocation = $(this).attr("href")
			contentLocation = contentLocation + "Tab";
			
			//Let go if not a hashed one
			if(contentLocation.charAt(0)=="#") {
			
				e.preventDefault();
			
				//Make Tab Active
				tab.removeClass('active');
				$(this).addClass('active');
				
				//Show Tab Content
				$(contentLocation).parent('.tabs-content').children('li').css({"display":"none"});
				$(contentLocation).css({"display":"block"});
				
			} 
		});
	});
	
	
	/* PLACEHOLDER FOR FORMS ------------- */
	/* Remove this and jquery.placeholder.min.js if you don't need :) */
	
	$('input, textarea').placeholder();
	
	/* ADD & REMOVE FORM ELEMENTS */
	/* charlie.griefer.com/blog/2009/09/17/jquery-dynamically-adding-form-elements/ - with some modifications */
	
	$('#updateDish > #newAmounts1').hide();
	$('#createDish > #newAmounts1').hide();
	
    $('#btnAdd').click(function() {
    	
        var num = $('.clone').length;
        var newNum = new Number(num + 1);
        var newElem = $('#newAmounts' + num).clone().attr('id', 'newAmounts' + newNum).hide().fadeIn(1500);
        
        if (newNum > 1) {
        
	        newElem.find('#quantity' + num)
	        	.attr('id', 'quantity' + newNum)
	        	.attr('name', 'tx_vegamatic_weeks[newAmounts][' + newNum + '][setQuantity]')
	        	.attr('value', '');
	        newElem.find('#unit' + num).attr('id', 'unit' + newNum).attr('name', 'tx_vegamatic_weeks[newAmounts][' + newNum + '][setUnit]');
	        newElem.find('#setGoods' + num).attr('id', 'setGoods' + newNum).attr('name', 'tx_vegamatic_weeks[newAmounts][' + newNum + '][setGoods]');
	        newElem.find('#newGoods' + num)
	        	.attr('id', 'newGoods' + newNum)
	        	.attr('name', 'tx_vegamatic_weeks[newAmounts][' + newNum + '][newGoods]')
	        	.attr('value', '');        
	        newElem.find('#setShop' + num).attr('id', 'setShop' + newNum).attr('name', 'tx_vegamatic_weeks[newAmounts][' + newNum + '][setShop]');
	        newElem.find('#newShop' + num)
	        	.attr('id', 'newShop' + newNum)
	        	.attr('name', 'tx_vegamatic_weeks[newAmounts][' + newNum + '][newShop]')
	        	.attr('value', '');
	      
	        $('#newAmounts' + num).after(newElem);
	        
	        $('#btnDel').removeAttr('disabled');
        
        } else {
        	$('#newAmounts1').fadeIn(1500);
        }

    });

    $('#btnDel').click(function() {
    	
        var num = $('.clone').length;

        $('#newAmounts' + num).fadeOut(700, function() { $(this).remove() });

        if (num-1 == 1)
              $('#btnDel').attr('disabled', 'disabled');
    });
    
    $('.deleteMe').each(function(index) { 
    	$(this).click(function() { 
    		$('#updateAmounts' + index).fadeOut(700);
    		$('#deleteAmounts' + index).attr('value', '');
    	}) 
    });
    
	$('#threecols').easyListSplitter({ 
		colNumber: 3,
		direction: 'vertical'
	}); 
	
});