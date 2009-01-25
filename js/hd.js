(function() {
	var hd;
	if (window.ActiveXObject) {
		hd = {
			enter: function(e) {
				var el = e.srcElement;
				if (!el.className.match(/hovered/)) { el.className = el.className + ' hovered'; }
			},
			leave: function(e) {
				var el = e.srcElement;
				if (el.className.match(/hovered/)) { el.className = el.className.replace(/ hovered/,''); }
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
					par.attachEvent('onmouseenter',hd.enter);
					par.attachEvent('onmouseleave',hd.leave);
				} while (i);
				navParents = null;
				par = null;
			},
			supportLastChild: function(el) {
				var nodes = el.childNodes;
				var i = nodes.length;
				if (!i) { return; }
				var lastFound = false;
				var node;
				do {
					i = i - 1;
					node = nodes[i];
					if (node.nodeType !== 1) { continue; }
					if (!lastFound) { node.className = node.className + ' last-child'; lastFound = true; }
					hd.supportLastChild(node);
				} while(i);
			}
		};
		if (!window.XMLHttpRequest) { hd.setupEvents(); }
		hd.supportLastChild(document.getElementById('nav'));
	}
})();

// sifr configuration
var myriadPro = { 'src': stylesheetDirectory + '/flash/myriad-pro.swf' };
if (typeof sIFR !== "undefined") {
	sIFR.useDomLoaded = false;
	sIFR.activate(myriadPro);
}
