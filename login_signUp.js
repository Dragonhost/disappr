$(document).ready(function() {
  $(".f_signUp").click(function() {
    var value = 0;
    value + 1;
    if (value / 2 == 0) {
      $(".box").removeClass("rotate_back");
      $(".box").addClass("rotate");
    } else {
      $(".box").addClass("rotate");
    }
  });

  $(".b_login").click(function() {
    $(".box").removeClass("rotate");
    $(".box").addClass("rotate_back");
  });

  var url = window.location.href;
  var arr = url.split("?");
  var arr2 = arr[1].split("=");

  var loginerror = "loginerror";
  var signUperror = "signUperror";
  var signUp = "signUp";

  if (arr2[0] == loginerror) {
    $(".f_right").addClass("f_right_increase");
  } else if (arr2[0] == signUperror) {
    $(".b_left").addClass("b_left_increase");
  } else if (arr2[0] == signUp) {
    $(".b_left").addClass("b_left_increase");
  }
});
