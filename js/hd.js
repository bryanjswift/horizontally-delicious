(function() {
	var events;
	if (window.ActiveXObject && !window.XMLHttpRequest) {
		events = {
			enter: function(e) {
				var el = e.srcElement;
				if (!el.className.match(/hovered/)) { el.className = el.className + ' hovered'; }
			},
			leave: function(e) {
				var el = e.srcElement;
				if (el.className.match(/hovered/)) { el.className = el.className.replace(/hovered/,''); }
			},
			setupEvents: function() {
				var navParents = document.getElementById('nav').childNodes;
				var i = navParents.length;
				if (!i) { return; }
				var par;
				do {
					i = i - 1;
					par = navParents[i];
					if (!par.attachEvent) { continue; }
					par.attachEvent('onmouseenter',events.enter);
					par.attachEvent('onmouseleave',events.leave);
				} while (i);
				navParents = null;
				par = null;
			}
		};
		events.setupEvents();
	}
})();

// sifr configuration
var myriadPro = { 'src': stylesheetDirectory + '/flash/myriad-pro.swf' };
if (typeof sIFR !== "undefined") {
	sIFR.useDomLoaded = false;
	sIFR.activate(myriadPro);
}
