! function(e) {
    "use strict";
    e(".media,.lazy").length > 0 && e(".media,.lazy").lazy(), e("body").on("click", ".dropdown-active", (function(e) {
        e.stopPropagation()
    })), e(".filter-item .dropdown-menu li").on("click", (function() {
        var t = e(this).attr("value"),
            a = e(this).text(),
            i = e(this);
        i.closest(".filter-item").find("li.selected").removeClass("selected"), e(this).addClass("selected");
        var s = i.closest(".filter-item").attr("id");
        e("#" + s).find("input").val(t), e("#" + s).find(".filter-value").html(a)
    })), e(".filter-item .dropdown-menu li.selected").trigger("click"), e("[data-more]").each((function() {
        var t = e(this).data("element"),
            a = e(this).data("limit");
        e(this).find(t).length > a && (e(window).width() > 1e3 || !e(this).hasClass("mobile-disable")) && (e(t, this).eq(a - 1).nextAll().hide().addClass("toggle"), e(this).append('<div class="more">' + __("Show more") + "</div>"))
    })), e("[data-more]").on("click", ".more", (function() {
        e(this).hasClass("less") ? e(this).text("Show more").removeClass("less") : e(this).text("Show less").addClass("less"), e(this).siblings(".toggle").toggle()
    })), e("[data-textmore]").each((function() {
        e(this).data("element");
        var t = e(this).data("limit");
        e(this).find(".text-content").text().length > t && (e(window).width() > 1e3 || !e(this).hasClass("mobile-disable")) && (e(this).find(".text-content").addClass("toggle"), e(this).append('<div class="more">' + __("Show more") + "</div>"))
    })), e("[data-textmore]").on("click", ".more", (function() {
        e(this).hasClass("less") ? e(this).text("Show more").removeClass("less") : e(this).text("Show less").addClass("less"), e(this).find(".text-content").siblings(".toggle").toggle()
    })), _Auth && e.ajax({
        url: _URL + "/ajax/notifications",
        type: "GET",
        dataType: "json",
        success: function(t) {
            t.total > 0 && e(".notification-btn").append('<div class="on"></div>'), null != t.data && (e(".notifications").empty(), e("#card-notification").tmpl(t.data).appendTo(".notifications"))
        }
    });
    var t = e(".modal-cookie");
    localStorage.getItem("modal_cookies") ? t.removeClass("show") : t.addClass("show"), e("body").on("click", ".modal-cookie .btn", (function(e) {
        localStorage.setItem("modal_cookies", 1), t.removeClass("show")
    }));
    var a = e(".ads-sticky");
    a.addClass("show"), e("body").on("click", ".ads-close", (function(e) {
        a.removeClass("show")
    })), e("body").on("click", ".scroll-up", (function(t) {
        e("html, body").animate({
            scrollTop: 0
        }, 600)
    })), e(window).width() > 200 && e(document).scroll((function() {
        e(this).scrollTop() > 150 ? e(".scroll-up").addClass("show") : e(".scroll-up").removeClass("show")
    })), e(".search-btn").on("click", (function(t) {
        e(this).attr("id");
        e(".header-search").removeClass("d-none"), e(".video-search").focus()
    })), e(".close-btn").on("click", (function(t) {
        e(this).attr("id");
        e(".header-search").addClass("d-none")
    })), e(".media-select .media-btn").on("click", (function(t) {
        var a = e(this).attr("id");
        e("#file-" + a).click()
    })), e(".media-input").on("change", (function(t) {
        var a = e(this).attr("data-preview");
        if (e("." + a).addClass("media-selected"), this.files && this.files[0]) {
            var i = new FileReader;
            i.onload = function(t) {
                e("." + a).css("background-image", "url(" + t.target.result + ")"), e('[name="image-url"]').val("")
            }, i.readAsDataURL(this.files[0])
        }
    })), e("body").on("click", ".media-remove", (function() {
        var t = e(this).attr("data-id");
        t && e.ajax({
            type: "POST",
            url: _URL + "/ajax/delete/avatar",
            data: "id=" + t,
            success: function(t) {
                e(".media-select").css("background-image", ""), Snackbar.show({
                    text: __("Deletion is successful"),
                    customClass: "bg-success"
                })
            }
        })
    })), e("body").on("click", '[data-toggle="modal"]', (function() {
        e(".modal").modal("hide"), e(".aside").modal("hide"), e(e(this).data("target") + " .modal-dialog").load(e(this).data("remote"), (function() {
            e(".media,.lazy").length > 0 && e(".media,.lazy").lazy()
        }))
    })), e(".modal").on("hide.bs.modal", (function(t) {
        e(".modal-dialog").html("")
    })), e.typeahead({
        input: ".video-search",
        minLength: 1,
        debug: !1,
        order: "asc",
        dynamic: !0,
        delay: 20,
        template: function(e, t) {
            return '<div class="d-flex align-items-center" data-id="{{url}}"><div class="media mr-2" style="background-image:url({{image}})"></div><div class="ml-2 caption"><div class="name">{{name}}</div><div class="text-muted text-12">{{second_name}}</div><div class="text-muted text-12">{{type}}</div></div></div>'
        },
        group: {
            template: "{{group}}"
        },
        emptyTemplate: '"{{query}}" ' + __("no results"),
        source: {
            Results: {
                display: "name",
                ajax: function(e) {
                    return {
                        type: "GET",
                        url: _URL + "/ajax/posts",
                        path: "data",
                        data: {
                            q: "{{query}}"
                        },
                        callback: {
                            done: function(e) {
                                return e
                            }
                        }
                    }
                }
            }
        },
        backdrop: {
            opacity: .7,
            filter: "alpha(opacity=7)",
            "background-color": "#000"
        },
        callback: {
            onClick: function(e, t, a, i) {
                window.location.href = a.url
            }
        }
    }), e("body").on({
        click: function() {
            var t = e(this),
                a = t.attr("data-title"),
                i = t.attr("data-sef");
            switch (dataType) {
                case "facebook":
                    s("https://www.facebook.com/sharer/sharer.php?u=" + i);
                    break;
                case "twitter":
                    s("https://twitter.com/intent/tweet?text=" + encodeURIComponent(a) + " ð??¬ " + encodeURIComponent(i))
            }

            function s(e) {
                window.open(e, "_blank")
            }
        }
    }, ".share-link")
}(jQuery), "serviceWorker" in navigator && window.addEventListener("load", (function() {
    navigator.serviceWorker.register("/serviceWorker.js").then(e => console.log("service worker registered")).catch(e => console.log("service worker not registered", e))
}));