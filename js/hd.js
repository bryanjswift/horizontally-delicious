var jq = jQuery.noConflict();
jq.browser.ver = parseInt(jq.browser.version.split('.')[0]);
if (jq.browser.msie && jq.browser.ver === 6) {
	jq('#nav li.parent').bind('mouseenter',function(e) {
		jq('ul.child',e.target).css('display','block');
	});
	jq('#nav li.parent').bind('mouseleave',function(e) {
		jq('ul.child',e.target).css('display','none');
	});
}