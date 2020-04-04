jQuery(document).ready(function($) {

  $(".hide-exposed-widget").click(function() {
    $(this).parent().siblings(".views-widget").toggleClass("tw-hidden");
    $(this).toggleClass("tw-text-gray-500");
  });

});
