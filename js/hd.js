if (Browser.Engine.trident4) {
	$$('.hoverable').addEvents({
		'mouseenter': function(e) {
			this.addClass('hovered');
		},
		'mouseleave': function(e) {
			this.removeClass('hovered');
		}
	});
}

// sifr configuration
var myriadPro = { 'src': stylesheetDirectory + '/flash/myriad-pro.swf' };
if (typeof sIFR !== "undefined") {
	sIFR.useDomLoaded = false;
	sIFR.activate(myriadPro);
}