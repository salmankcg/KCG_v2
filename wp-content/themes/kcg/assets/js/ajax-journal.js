(function ($) {
    "use strict";

    $(window).on("load", function () {
        kcg_journal.kcg_journal_filter();
        kcg_journal.kcg_journal_loading_post();
    });

    var kcg_journal = {
        kcg_journal_filter: function () {
            $(document).on("click", ".journal-filter", function (e) {
                e.preventDefault();
                $(".journal-filter").removeClass("loading");
                $(".journal-filter").removeClass("active");
                var _this = $(this),
                    _ajaxUrl = kcgJournal.ajax_url,
                    _a = "kcg_journal_filter",
                    _n = kcgJournal.kcg_nonce,
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
                            jQuery(".journal-list").fadeOut(100, function () {
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

        kcg_journal_loading_post: function () {
            $(document).on("click", ".loading-journal", function (e) {
                e.preventDefault();
                console.log('ok');
                $(".journal-filter").removeClass("active");
                $(".journal-filter:nth-child(1)").addClass("active");
                var _this = $(this),
                    _ajaxUrl = kcgJournal.ajax_url,
                    _a = "kcg_journal_loading_post",
                    _n = kcgJournal.kcg_nonce,
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
                        jQuery(".journal-list").fadeOut(100, function () {
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
