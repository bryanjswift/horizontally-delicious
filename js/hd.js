if (Browser.Engine.trident4) {
	$$('#nav li.parent').addEvents({
		'mouseenter': function(e) {
			this.addClass('hovered');
		},
		'mouseleave': function(e) {
			this.removeClass('hovered');
		}
	});
}

// sifr configuration
var fertigo = { 'src': stylesheetDirectory + '/flash/fertigo.swf' };
var fontinBold = { 'src': stylesheetDirectory + '/flash/fontin-bold.swf' };
if (typeof sIFR !== "undefined") {
	sIFR.useDomLoaded = false;
	sIFR.activate(fertigo, fontinBold);
}