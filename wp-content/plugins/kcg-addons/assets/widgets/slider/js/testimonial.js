/*slider*/( function( $ ) {
    "use strict";
    var WidgetSliderHandler = function($scope) {

     var $testimonial_cont       = $scope.find('.testimonial:not(.no-slick)');
        $testimonial_cont.find('.slides').slick({
        infinite        : true,
        lazyLoad        : 'ondemand',
        slidesToShow    : 3,
        slidesToScroll  : 1,
        arrows          : false,
        dots            : true,
        centerMode      : true,
        variableWidth: true,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1
              }
            }
          ]
    });

    $testimonial_cont.find('.t-prev').on('click',function(){
        $testimonial_cont.find('.slides').slick('slickPrev');
    });

    $testimonial_cont.find('.t-next').on('click',function(){
        $testimonial_cont.find('.slides').slick('slickNext');
    });
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/kcg-about-slider.default', WidgetSliderHandler);
    });

})(jQuery);
