$('#rightButton').click(function() {
   event.preventDefault();
   var wid = $(window).width();
   $('#content').animate({
     scrollLeft: "+=" + wid * 0.7
   }, "slow");
});

  $('#leftButton').click(function() {
    var wid = $(window).width();
   event.preventDefault();
   $('#content').animate({
     scrollLeft: "-=" + wid * 0.7
   }, "slow");
});

$(window).resize(function() {
  var wid = $(window).width();
  $(".internal").style.width(wid);

});
