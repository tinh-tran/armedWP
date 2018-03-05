
jQuery('.popupCitySelection__city-city').click(function () {
  	
	value = jQuery(this).text();
	
	var date = new Date(new Date().getTime() + 60 * 1000);
	
	document.cookie =  "city=" + value + "; path=/; expires=" + date.toUTCString();
	
	jQuery('#menu-item-1394 > a > span').text(value);
	
	
	console.log("set city " + value);
	
});





