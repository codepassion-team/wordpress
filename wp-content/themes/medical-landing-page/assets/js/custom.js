jQuery(document).ready(function () {
      function medical_landing_page_search_loop_focus(element) {
      var medical_landing_page_focus = element.find('select, input, textarea, button, a[href]');
      var medical_landing_page_firstFocus = medical_landing_page_focus[0];  
      var medical_landing_page_lastFocus = medical_landing_page_focus[medical_landing_page_focus.length - 1];
      var KEYCODE_TAB = 9;

      element.on('keydown', function medical_landing_page_search_loop_focus(e) {
        var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

        if (!isTabPressed) { 
          return; 
        }

        if ( e.shiftKey ) /* shift + tab */ {
          if (document.activeElement === medical_landing_page_firstFocus) {
            medical_landing_page_lastFocus.focus();
              e.preventDefault();
            }
          } else /* tab */ {
          if (document.activeElement === medical_landing_page_lastFocus) {
            medical_landing_page_firstFocus.focus();
              e.preventDefault();
            }
          }
      });
    }
});

// Video Popup
(function( $ ) {
    $(document).ready(function(){
        $('#openBtn').on('click', function() {
          $('#videoOverlay').css('display', 'flex');
        });
        $('.close-btn').on('click', function() {
          $('#videoOverlay').hide();
        });
    });
})( jQuery );