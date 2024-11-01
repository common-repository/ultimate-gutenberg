(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
})( jQuery );

//Code Demo
jQuery(function($){
  $(document).on('click','.toggle_bar', function() {
    $(this).siblings(".ug-codedemo-item").toggle();
    $(this).toggleClass('active');
  });
});
//Code Demo & Code
const ug_clipboard = new ClipboardJS('.ug-clipboard');
// Select all .ug-clipboard items
const ugCopyBtns = document.querySelectorAll('.ug-clipboard');
// Remove .tooptip class by mouseout
for( let i=0; i < ugCopyBtns.length; i++ ){
    ugCopyBtns[i].addEventListener('mouseleave',ug_clearTooltip);
}
function ug_clearTooltip(e){
    e.currentTarget.setAttribute('class','ug-clipboard');
}
// Add .tooltip class when it's clicked
function ug_showTooltip(elem){
    elem.setAttribute('class','ug-clipboard tooltip_copied');
}
ug_clipboard.on('success', function(e) {
    ug_showTooltip(e.trigger);
});
