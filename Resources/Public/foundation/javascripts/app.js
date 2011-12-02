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
	/* charlie.griefer.com/blog/2009/09/17/jquery-dynamically-adding-form-elements/ with some modifications */
	
    $('#btnAdd').click(function() {
    	
        var num = $('.clone').length;
        var newNum = new Number(num + 1);
        var newElem = $('#amount' + num).clone().attr('id', 'amount' + newNum);
        
        newElem.children('#quantity' + num).attr('id', 'quantity' + newNum).attr('name', 'tx_vegamatic_weeks[amounts][' + newNum + '][quantity]');
        newElem.children('#unit' + num).attr('id', 'unit' + newNum).attr('name', 'tx_vegamatic_weeks[amounts][' + newNum + '][unit]');
        newElem.children('#setGoods' + num).attr('id', 'setGoods' + newNum).attr('name', 'tx_vegamatic_weeks[amounts][' + newNum + '][setGoods]');
        newElem.children('#newGoods' + num).attr('id', 'newGoods' + newNum).attr('name', 'tx_vegamatic_weeks[amounts][' + newNum + '][newGoods]');        
        newElem.children('#setShop' + num).attr('id', 'setShop' + newNum).attr('name', 'tx_vegamatic_weeks[amounts][' + newNum + '][setShop]');
        newElem.children('#newShop' + num).attr('id', 'newShop' + newNum).attr('name', 'tx_vegamatic_weeks[amounts][' + newNum + '][newShop]');
      
        $('#amount' + num).after(newElem);
        
        $('#btnDel').removeAttr('disabled');

    });

    $('#btnDel').click(function() {
    	
        var num = $('.clone').length;

        $('#amount' + num).remove();

        if (num-1 == 1)
              $('#btnDel').attr('disabled', 'disabled');
    });
	
});