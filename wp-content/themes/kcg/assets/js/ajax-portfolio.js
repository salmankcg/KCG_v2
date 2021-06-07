(function ($) {
    "use strict";

    $(window).on("load", function () {
        kcg_portfolio.kcg_portfolio_filter();
        kcg_portfolio.kcg_loading_post();
    });

    var kcg_portfolio = {
        kcg_portfolio_filter: function () {
            $(document).on("click", ".portfolio-filter", function (e) {
                e.preventDefault();
                $(".portfolio-filter").removeClass("loading");
                $(".portfolio-filter").removeClass("active");
                var _this = $(this),
                    _ajaxUrl = kcgPortfolio.ajax_url,
                    _a = "kcg_portfolio_filter",
                    _n = kcgPortfolio.kcg_nonce,
                    _id = _this.data("id"),
                    _order = _this.data("order"),
                    _orderby = _this.data("orderby"),
                    _perpage = _this.data("perpage"),
                    _type = _this.data("type"),
                    _class = _this.addClass("loading active"),
                    data = {
                        action: _a,
                        nonce: _n,
                        cat_id: _id,
                        order: _order,
                        orderby: _orderby,
                        perpage: _perpage,
                        type: _type,
                    };

                if ($(this).hasClass("loading")) {
                    $.ajax({
                        url: _ajaxUrl,
                        method: "post",
                        data: data,
                        beforeSend: function () {

                        },
                        success: function (response) {
                            jQuery(".works-list").fadeOut(100, function () {
                                jQuery(this).html(response);
                            }).fadeIn(1000);
                        },
                        error: function () {
                            console.log("Oops! Something wrong, try again!");
                        },
                    });
                }

                return false;
            });
        },

        kcg_loading_post: function () {
            $(document).on("click", ".loading-portfolio", function (e) {
                e.preventDefault();
                $(".portfolio-filter").removeClass("active");
                $(".portfolio-filter:nth-child(1)").addClass("active");
                var _this = $(this),
                    _ajaxUrl = kcgPortfolio.ajax_url,
                    _a = "kcg_loading_post",
                    _n = kcgPortfolio.kcg_nonce,
                    args = _this.data("args"),
                    page = _this.data("page"),
                    maxpage = _this.data("maxpage"),
                    data = {
                        action: _a,
                        nonce: _n,
                        args: args,
                        page: page
                    };

                $.ajax({
                    url: _ajaxUrl,
                    method: "post",
                    data: data,
                    beforeSend: function () {

                    },
                    success: function (response) {
                        //jQuery('.works-list').append(response);
                        jQuery(".works-list").fadeOut(100, function () {
                            jQuery(this).append(response);
                        }).fadeIn(1000);

                        _this.data('page', page + 1);
                        if (page >= maxpage) {
                            _this.hide();
                        } else {
                            _this.show();
                        }
                    },
                    error: function () {
                        console.log("Oops! Something wrong, try again!");
                    },
                });

                return false;
            });
        },
    };

})(jQuery);
