var jq = jQuery.noConflict();
jq.browser.ver = parseInt(jq.browser.version.split('.')[0]);
if (jq.browser.msie && jq.browser.ver === 6) {
	jq('#nav li.parent').bind('mouseenter',function(e) {
		jq(e.target).addClass('hovered');
	});
	jq('#nav li.parent').bind('mouseleave',function(e) {
		jq(e.target).removeClass('hovered');
	});
}