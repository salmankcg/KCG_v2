;(function ($, window) { 
    "use strict";
    var $window = $(window);
    var kcg_section_scrolling = function(){
        var $onpage = document.querySelector("[data-onpage-scroll]");
        console.log($onpage);
        if($onpage){
            var $settings = $onpage.getAttribute("data-onpage-scroll");
            var $parentEle = $onpage.parentElement;
            if($parentEle){
                $parentEle.setAttribute('id', 'kcg-onpage-section');
            }

            let $menuAppend = $parentEle.parentElement;
            
            // pre button for control
            let $previewButton = $onpage.getAttribute("data-onpage-preview");
            if( $previewButton != ''){
                let $pre = document.createElement("span");
                $pre.setAttribute('class', 'kcgone-scroll-control kcg-prev');
                $pre.setAttribute('id', 'kcgone-moveUp');
                $pre.innerHTML = $previewButton;
                $menuAppend.appendChild($pre);
            }
            let $nextButton = $onpage.getAttribute("data-onpage-next");
            if( $nextButton != ''){
                let $next = document.createElement("span");
                $next.setAttribute('class', 'kcgone-scroll-control kcg-next');
                $next.setAttribute('id', 'kcgone-moveDown');
                $next.innerHTML = $nextButton;
                $menuAppend.appendChild($next);
            }
          
            if( $onpage.getAttribute("data-kcgmenus") ){

                let $menus = $onpage.getAttribute("data-kcgmenus");
                $menus = JSON.parse($menus);

                var $meniParent = document.createElement('div');
                $meniParent.setAttribute('class', 'kcgonpage-scroll-menu');

                var $ul = document.createElement('ul');
                $ul.setAttribute('id', 'kcgonpage-menu');

                var $listanchors = [];
                $menus.forEach(function($v, $k){
                    let $li = document.createElement('li');
                    $li.setAttribute('data-menuanchor', $v.kcgmenu_id);

                    let $a = document.createElement('a');
                    $a.setAttribute('href', '#'+$v.kcgmenu_id);
                    if($v.kcgmenu_icon.value && $v.kcgmenu_icon.value.length > 0){
                        $a.innerHTML = '<i class="'+$v.kcgmenu_icon.value+'"></i>';
                    }
                    $a.innerHTML += $v.kcgmenu_title;
                    
                    $li.appendChild($a);

                    $ul.appendChild($li);
                    $listanchors.push($v.kcgmenu_id);
                });
                $meniParent.appendChild($ul);
                $menuAppend.appendChild($meniParent);
            }

            if ($('#kcg-onpage-section').length > 0) {

                // setup fullpage settings
                $('#kcg-onpage-section').fullpage(JSON.parse($settings));

                $.fn.fullpage.setAllowScrolling(true);

                if ($('#kcgone-moveDown').length > 0) {
                    $('#kcgone-moveDown').click(function () {
                        $.fn.fullpage.moveSectionDown();
                    });
                }
                if ($('#kcgone-moveUp').length > 0) {
                    $('#kcgone-moveUp').click(function () {
                        $.fn.fullpage.moveSectionUp();
                    });
                }
                
            }
        }
      
    }
    // load elementor
    $window.on("elementor/frontend/init", kcg_section_scrolling);

})(jQuery, window);


jQuery( function( $ ) {
    "use strict";
    if ( typeof elementor != "undefined" && typeof elementor.settings.page != "undefined") {
        var kcg_onepage_enable_function = function ( newValue ) {
            elementor.reloadPreview();
        }
        elementor.settings.page.addChangeCallback( 'kcg_onepage_enable', kcg_onepage_enable_function);
    }

});