/*Information*/
jQuery('.theme-tab-nav a').on('click',function (e) {
  e.preventDefault();
  jQuery(this).addClass('active').siblings().removeClass('active');
});

jQuery('.theme-tab-nav .begin').on('click',function (e) {
  jQuery('.theme-tab-wrapper .begin').addClass('show').siblings().removeClass('show');
});
jQuery('.theme-tab-nav .actions, .theme-tab .actions').on('click',function (e) {
  e.preventDefault();
  jQuery('.theme-tab-wrapper .actions').addClass('show').siblings().removeClass('show');

  jQuery('.theme-tab-nav a.actions').addClass('active').siblings().removeClass('active');

});
jQuery('.theme-tab-nav .support').on('click',function (e) {
  jQuery('.theme-tab-wrapper .support').addClass('show').siblings().removeClass('show');
});
jQuery('.theme-tab-nav .table').on('click',function (e) {
  jQuery('.theme-tab-wrapper .table').addClass('show').siblings().removeClass('show');
});

jQuery(function($){
  $(document).on('click','.toggle_bar', function() {
    $(this).siblings(".ug-codedemo-item").toggle();
    $(this).toggleClass('active');
  });
});
//codeblock_custom_tab_input
/*var textareas = document.querySelectorAll('.wp-block-ug-code-common textarea, .wp-block-ug-codedemo-common textarea');
//var textareas = document.querySelectorAll('textarea');
var count = textareas.length;
for( var i = 0; i < count; i++ ) {
  textareas[i].onkeydown = function(e){
    if( e.keyCode === 9 || e.which === 9 ) {
      e.preventDefault();
      var s = this.selectionStart;
      this.value = this.value.substring( 0, this.selectionStart ) + "\t" + this.value.substring( this.selectionEnd );
      this.selectionEnd = s + 1;
    }
    if( e.shiftKey ) {
      if( e.keyCode === 9 || e.which === 9 ) {
        e.preventDefault();
        var s = this.selectionStart;
        this.value = this.value.substring( 0, this.selectionStart ) + "\t" + this.value.substring( this.selectionEnd );
        this.selectionEnd = s - 2;
      }
    }
  }
}*/
