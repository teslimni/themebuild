// requires: jquery.waypoints.min.js
jQuery(document).ready(function($) {
  $(".js-section-hook").waypoint(
    function(direction) {
      if (direction == "down") {
        $("nav.main-navigation").addClass("sticky");
        $("section.brand-strip.main").hide();
      } else {
        $("nav.main-navigation").removeClass("sticky");
        $("section.brand-strip.main").show();
      }
    },
    {
      offset: "60px;"
    }
  );

  //   if ($("nav").hasClass(".sticky")) {
  //     $(".site-branding")
  //       .clone()
  //       .prependTo(".sticky");
  //   }

  // Mobile Menu
  $(".menu-toggle").click(function() {
    var toggle = jQuery(".mobile__nav");
    toggle.slideToggle(200);
  });

  $(window).resize(function() {
    alert("You resized window");
  });
});
