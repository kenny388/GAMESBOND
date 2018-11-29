$('#rightButton').click(function() {
   event.preventDefault();
   var wid = $(window).width();
   $('#content').animate({
     scrollLeft: "+=" + wid * 0.703
   }, "slow");
});

  $('#leftButton').click(function() {
    var wid = $(window).width();
   event.preventDefault();
   $('#content').animate({
     scrollLeft: "-=" + wid * 0.703
   }, "slow");
});

$(window).resize(function() {
  var wid = $(window).width();
  $(".internal").style.width(wid);

});
