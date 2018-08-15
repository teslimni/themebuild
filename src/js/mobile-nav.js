// requires: jquery.waypoints.min.js jquery.min.js
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

  // Mobile Menu
  $(".menu-toggle").click(function() {
    var toggle = jQuery(".mobile__nav");
    toggle.slideToggle(200);
  });
});
