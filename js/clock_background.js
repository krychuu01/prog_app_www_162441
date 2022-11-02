
$('#clock').on({
  "click" : function() {
    if ($(this).css("background-color")=="rgba(26, 26, 26, 0.863)"){
      $(this).css({ 
        "background-color": "gold",
        "color":"black"
      })
      }
    else{
      $(this).css(
        {
          "background-color":"rgba(26, 26, 26, 0.863)",
          "color":"rgba(240, 240, 240, 0.95)"
        }
      )
    }
  }
});