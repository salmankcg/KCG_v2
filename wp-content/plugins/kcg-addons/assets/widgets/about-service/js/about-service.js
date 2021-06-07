/*About Services*/( function( $ ) {
    "use strict";
    var WidgetAServiceHandler = function($scope) {

     var $kcg_hilight_cont       = $scope.find('.highlights'),
        $kcg_hilight_image    = $kcg_hilight_cont.find('img');

        $kcg_hilight_image.mouseover(function() {

        $kcg_hilight_image.mousemove(function(e) {
          var x = e.pageX - $(this).offset().left,
            y = e.pageY - $(this).offset().top;
      
          var px = x/$(this).width(),
            py = y/$(this).height();
          
          var xx = -20 + (30*px),
            yy = 20 - (30*py);
        
          TweenMax.killTweensOf($(this));
          TweenMax.to($(this), 1, {rotationY: xx, rotationX: yy, rotationZ: 0, transformPerspective: 1000, ease: Quad.easeOut});
        });
      
      }).mouseout(function() {
      
        $(this).unbind('mousemove');
      
        TweenMax.to($(this), 1, {rotationY: 0, rotationX: 0, rotationZ: 0, transformPerspective: 1000, ease: Quad.easeOut});
      });
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/kcg-about-service.default', WidgetAServiceHandler);
    });

})(jQuery);
