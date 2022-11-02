$('#animacjaTestowa1').on("click", function(){
  $(this).animate({
      width:"500px",
      opacity: 0.4,
      fontSize: "3em",
      borderWidth: "10px"
  }, 1500)
});

$('#animacjaTestowa2').on({
  "mouseover" : function() {
      $(this).animate({
          width: "400px"
      }, 800)
  },
  "mouseout" : function() {
    $(this).animate({
      width: "200px"
    }, 800);
  }
});