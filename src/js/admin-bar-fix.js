// I am not sure this is working.

jQuery(document).ready(function($) {
  //fix for admin bar
  if ($("#wpadminbar")[0])
    $(windows).scroll(function() {
      if ($(this).scrollTop() > 100) $(".brand-strip").css("top", "0");
    });
});
