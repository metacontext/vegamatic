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
	
    $('#btnAdd').click(function() {
    	
        var num = $('.clone').length;
        var newNum = new Number(num + 1);
        var newElem = $('#newAmounts' + num).clone().attr('id', 'newAmounts' + newNum);
        
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

    });

    $('#btnDel').click(function() {
    	
        var num = $('.clone').length;

        $('#amount' + num).remove();

        if (num-1 == 1)
              $('#btnDel').attr('disabled', 'disabled');
    });
	
});