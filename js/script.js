var onResize = function() {
  $("body").css("padding-top", $(".fixed-top").height());
  console.log($(".fixed-top").height());
};

$(window).resize(onResize);

$(function() {
  onResize();
});
