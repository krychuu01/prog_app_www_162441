
$('#golden-oscar-statue').on({
  "mouseover" : function() {
      $(this).css({ 
        "transform": "rotate(360deg)",
        "transition-duration": "1s"
        }
      )
  },
  "mouseout" : function() {
    $(this).css({ 
      "transform": "rotate(0deg)",
      "transition-duration": "1s"
      }
    );
  }
});