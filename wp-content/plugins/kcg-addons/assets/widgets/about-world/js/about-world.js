/*About World*/( function( $ ) {
    "use strict";
    var WidgetAWorldHandler = function($scope) {

      var $kcg_aw_cont       = $scope.find('.about-world'),
          $kcg_aw_item       = $kcg_aw_cont.find('.item'),

        _inneHeight = $kcg_aw_cont.find('.aw-people').height(),
        _inneWidth  = $kcg_aw_cont.find('.aw-people').width();

      function about_init(){

        $kcg_aw_item.each(function(e,i){
            
            var _this = this;

            setTimeout(function(){
                scramblePos(_this);
            }, e*300);
            
        });
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function scramblePos(_this){
        var _posY = getRandomInt(1, _inneHeight);
        var _posX = getRandomInt(1, _inneWidth);

        $(_this).css('transform','translate('+_posX+'px,'+_posY+'px)');

        motionIn(_this);
    }

    function motionIn(_this){

        var $kcg_aw_item   = $(_this);
        var $figure = $(_this).find('figure');

      gsap.timeline({onComplete: function(){
            gsap.killTweensOf($figure);

            setTimeout(function(){
                scramblePos($kcg_aw_item);
            }, 2000);
            
        }})
        .to($figure, 5, {
            ease: 'Elastic.easeOut',
            scale: 1,
        })
        .to($figure, 1, {
            ease: 'Power3.easeOut',
            scale: 0,
        },20); 
    }
    about_init();
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/kcg-about-world.default', WidgetAWorldHandler);
    });

})(jQuery);
