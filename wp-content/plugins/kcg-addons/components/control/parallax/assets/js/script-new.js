!(function (e, t) {
    "use strict";
    var a = {
        init: function () {
            t.hooks.addAction("frontend/element_ready/section", a.elementorSection);
        },
        elementorSection: function (e) {
            var a = e,
                n = null;
            Boolean(t.isEditMode());
            (n = new i(a)).init(n);
        },
    };
    e(window).on("elementor/frontend/init", a.init);
    var i = function (a) {
        var i = this,
            n = a.data("id"),
            r = Boolean(t.isEditMode()),
            l = e(window);
        e("body"), l.scrollTop(), l.height(), navigator.userAgent.match(/Version\/[\d\.]+.*Safari/), navigator.platform;
        (i.init = function () {
            return !(e(window).width() <= 1024) && (i.setParallaxMulti(n), i.moveBg(n), !1);
        }),
            (i.setParallaxMulti = function (t) {
                var n,
                    l = {},
                    o = [];
                if (((l = i.getOptions(t, "kcg_parallax_multi_items")), "multi" == (n = i.getOptions(t, "kcg_section_parallax_multi")))) {
                    if (r) {
                        if (!l.hasOwnProperty("models") || 0 === Object.keys(l.models).length || "multi" != n) return;
                        l = l.models;
                    }
                    if (
                        (a.addClass("parallax-multi-section"),
                            e.each(l, function (e, t) {
                                t.hasOwnProperty("attributes") && (t = t.attributes), o.push(t), i.pushElement(t), i.getWOW(t), i.mousemoveScroll(t);
                            }),
                            o.length < 0)
                    )
                        return o;
                    a.on("mousemove", function (t) {
                        e.each(o, function (e, a) {
                            "mousemove" == a.parallax_style && i.moveItem(a, t);
                        });
                    }),
                        e.each(o, function (e, t) {
                            "tilt" == t.parallax_style && i.tiltItem(t), "onscroll" == t.parallax_style && i.walkItem(t);
                        });
                }
            }),
            (i.moveBg = function (e) {
                var t, n;
                t = i.getOptions(e, "kcg_background_parallax"), n = i.getOptions(e, "kcg_background_parallax_speed"), a.addClass("parallax-multi-section"), "yes" != t || r || a.jarallax({
                    speed: n
                })
            }),
            (i.walkItem = function (e) {
                AOS.init();
            }),
            (i.moveItem = function (e, t) {
                var j = a.find(".elementor-repeater-item-" + e._id);
                TweenMax.to(j, 0.3, {
                    x: t.pageX / window.innerWidth * e.parallax_speed,
                    y: t.pageY / window.innerHeight * e.parallax_speed,
                    ease: Power0.easeNone
                });
            }),
            (i.tiltItem = function (e) {
                var t = a.find(".elementor-repeater-item-" + e._id);
                t.find("img");
                t.tilt({ disableAxis: e.disableaxis, scale: e.scale, speed: e.parallax_speed, maxTilt: e.maxtilt, glare: !0, maxGlare: 0.5 });
            }),
            (i.getOptions = function (t, a) {
                var i = null,
                    n = {};
                if (r) {
                    if (!window.elementor.hasOwnProperty("elements")) return !1;
                    if (!(i = window.elementor.elements).models) return !1;
                    if (
                        (e.each(i.models, function (e, a) {
                            t == a.id && (n = a.attributes.settings.attributes);
                        }),
                            !n.hasOwnProperty(a))
                    )
                        return !1;
                } else {
                    if (void 0 === (n = e((t = ".elementor-element-" + t)).data("settings"))) return;
                    if (!n.hasOwnProperty(a)) return !1;
                }
                return n[a];
            }),
            (i.pushElement = function (e) {
                var i = "",
                    wow_class = "",
                    wowAnim = "",
                    wowDelay = "";
                if ('enable' === e.wow_enable) {
                    wow_class = " wow ";
                    wowAnim = " " + e.wow_animation + " ";
                    wowDelay = e.wow_delay;
                }
                var cl = wow_class + wowAnim + "kcg-section-parallax-mousemove kcg-section-parallax-layer elementor-repeater-item-" + e._id;
                0 === a.find(".elementor-repeater-item-" + e._id).length &&
                    "" != e.image.url &&
                    a.prepend(
                        `\n <div data-aos="rotate" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" data-aos-anchor-placement="top-center" data-wow-delay="${wowDelay}ms" class="${cl} kcg-section-parallax-type-${e.parallax_style}" >\n <img  class="kcg-parallax-graphic ${i}" src="${e.image.url}"/>\n </div>\n                    `
                    );
            }, i.getWOW = function (e) {
                void 0 !== e._wow_animation && a.find(".elementor-repeater-item-" + e._id).each(function () {
                    var wow_mobile = 'yes' === e.wow_mobile ? true : false;
                    var wow = new WOW({
                        offset: 100,
                        mobile: wow_mobile,
                        animateClass: 'animated',
                        live: true
                    });
                    wow.init();
                });
            }, i.mousemoveScroll = function (e) {
                'yes' == e._mousemove_scroll_enable && void 0 !== e._mousemove_parallax_transform && void 0 !== e._mousemove_parallax_transform_value && a.find(".elementor-repeater-item-" + e._id + ' .kcg-parallax-graphic').magician({
                    type: "scroll",
                    offsetTop: parseInt(e._mousemove_offsettop),
                    offsetBottom: parseInt(e._mousemove_offsetbottom),
                    duration: parseInt(e._mousemove_smoothness),
                    animation: {
                        [e._mousemove_parallax_transform]: e._mousemove_parallax_transform_value
                    }
                });

            });
    };
})(jQuery, window.elementorFrontend);
