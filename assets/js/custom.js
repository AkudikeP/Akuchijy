function setProductSize(a, b) {
    productW = b;
    var c = 0,
        d = 0;
    if (a.hasClass("row-view")) {
        var e = parseInt(a.width());
        productW = e, c = 1
    } else {
        for (var d = parseInt(a.find(".product-preview-wrapper:first-child").css("margin-right")), f = parseInt(a.width()); productW >= b;) c++, productW = f / c;
        c > 1 && (c -= 1)
    }
    count_visible_items = c, productW = parseInt(f / c), a.find(".product-preview-wrapper").css("width", productW - d), a.hasClass("row-view") ? a.find(".product-preview").each(function() {
        $j(this).find(".product-preview__image").css({
            "margin-bottom": ""
        })
    }) : a.find(".product-preview").each(function() {
        setProductHeight()
    })
}

function setProductHeight() {
    $j(".product-preview").each(function() {
        var a = $j(this).find(".product-preview__info").outerHeight();
        $j(this).find(".product-preview__image").css({
            "margin-bottom": a + "px"
        })
    })
}

function debouncer(a, b) {
    var c, b = b || 500;
    return function() {
        var d = this,
            e = arguments;
        clearTimeout(c), c = setTimeout(function() {
            a.apply(d, Array.prototype.slice.call(e))
        }, b)
    }
}
var $j = jQuery.noConflict();
jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || a(window).width();
        b > 767 && setProductHeight()
    }), jQuery(function(a) {
        "use strict";

        function c(b) {
            b > 768 ? (a("ul.navbar-nav > li").addClass("hovernav"), a("ul.navbar-nav > li.hovernav").hover(function() {
                a(this).addClass("open")
            }, function() {
                a(this).removeClass("open")
            }), a("ul.navbar-nav > li li").hover(function() {
                if (a(this).children("ul.level-menu__dropdown").length) {
                    a(this).addClass("active"), a(this).children("ul.level-menu__dropdown").show().css({
                        opacity: 0,
                        left: a(this).width()
                    });
                    var b = a(this).children("ul.level-menu__dropdown").offset(),
                        c = b.left,
                        d = a(this).children("ul.level-menu__dropdown").width(),
                        e = a(".container").width(),
                        f = c + d <= e;
                    f ? a(this).children("ul.level-menu__dropdown").show().css({
                        opacity: 1,
                        left: a(this).width()
                    }) : a(this).children("ul.level-menu__dropdown").show().css({
                        opacity: 1,
                        right: a(this).width(),
                        left: "auto"
                    })
                }
            }, function() {
                a(this).children("ul.level-menu__dropdown").length && (a(this).removeClass("active"), a(this).children("ul.level-menu__dropdown").hide().css({
                    left: "auto",
                    right: "auto"
                }))
            })) : (a("ul.navbar-nav > li").removeClass("hovernav"), a("ul.navbar-nav > li li").unbind("mouseenter mouseleave"), a(".touch ul.navbar-nav > li > a").click(function(a) {
                a.preventDefault()
            }), a(".touch ul.navbar-nav > li a span.caret").click(function() {
                a(this).parent().parent("li").toggleClass("open")
            }), a(".touch ul.navbar-nav > li a span.link-name").click(function() {
                var b = a(this).parent("a").attr("href");
                window.location = b
            }))
        }
        var b = window.innerWidth || a(window).width();
        c(b), a(".no-touch .hovernav a").click(function() {
            window.location = this.href
        });
        var d = b;
        a(window).resize(debouncer(function(b) {
            var e = window.innerWidth || a(window).width();
            e != d && c(e), d = window.innerWidth || a(window).width()
        }))
    }), jQuery(function(a) {
        "use strict";
        a("#openSlidemenu").click(function() {
            return a(".header--small #slidemenu").slideToggle(250, function() {
                a(".header--small #slidemenu").toggleClass("open")
            }), !1
        });
        var b = window.innerWidth || a(window).width();
        a(window).resize(debouncer(function(c) {
            var d = window.innerWidth || a(window).width();
            d != b && (d < 767 ? a(".header--small #slidemenu").show().removeClass("open") : a(".header--small #slidemenu").hide()), b = window.innerWidth || a(window).width()
        }))
    }), jQuery(function(a) {
        "use strict";
        var c, b = a(window).height();
        if (a("footer .back-to-top").length) {
            var c = a("footer .back-to-top").offset();
            c.top < b && a("footer .back-to-top").hide()
        }
        a("a[href='#top']").click(function() {
            return a("html, body").animate({
                scrollTop: 0
            }, "slow"), !1
        })
    }), jQuery(function(a) {
        "use strict";
        if (a("#newsletterModal").length) {
            var b = a("#newsletterModal").attr("data-pause");
            setTimeout(function() {
                a("#newsletterModal").modal("show")
            }, b)
        }
    }), jQuery(function(a) {
        "use strict";
        !a(".header-line").length
    }), jQuery(function(a) {
        "use strict";
        window.innerWidth || a(window).width();
        a("#categoriesMenu").click(function() {
            return a(".navbar-nav--vertical").slideToggle(250, function() {
                a("#categoriesMenu").toggleClass("open"), a(".navbar-nav--vertical").toggleClass("open")
            }), !1
        })
    }), jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || a(window).width();
        b < 768 && a("#slidemenu").css({
            height: a(window).height()
        });
        var c = ".navbar-toggle",
            i = "-100%";
        a("#slidemenu .slidemenu-close").on("click", function(b) {
            a("body").removeClass("modal-open"), "rtl" == a("html").css("direction").toLowerCase() ? a("#slidemenu").stop().animate({
                right: i
            }) : a("#slidemenu").stop().animate({
                left: i
            })
        }), a("#navbar").on("click", c, function(b) {
            a("body").addClass("modal-open");
            var c = a(this).hasClass("slide-active");
            "rtl" == a("html").css("direction").toLowerCase() ? a("#slidemenu").stop().show().animate({
                right: c ? i : "0px"
            }) : a("#slidemenu").stop().show().animate({
                left: c ? i : "0px"
            })
        });
        var b = window.innerWidth || a(window).width(),
            j = b;
        a(window).resize(function() {
            var b = window.innerWidth || a(window).width();
            b != j && (b > 767 ? (a("#slidemenu").css({
                height: ""
            }), a("body").removeClass("modal-open"), a("#slidemenu").stop().animate({
                left: i
            })) : a("#slidemenu").css({
                height: a(window).height()
            })), j = window.innerWidth || a(window).width()
        })
    }), jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || a(window).width();
        b < 768 && a("#filtersCol").css({
            height: a(window).height()
        });
        var c = "-100%";
        a("#showFilterMobile").click(function() {
            var b = a("#filtersCol").hasClass("filter-active");
            a("body").toggleClass("modal-open"), a("#filtersCol").stop().animate({
                right: b ? c : "0px"
            }), a("#filtersCol").toggleClass("filter-active")
        }), a("#filtersColClose").click(function() {
            a("#filtersCol").stop().animate({
                right: c
            }), a("body").removeClass("modal-open"), a("#filtersCol").toggleClass("filter-active")
        })
    }), jQuery(function(a) {
        "use strict";
        a(".selectpicker").length && a(".selectpicker").selectpicker({
            showSubtext: !0
        })
    }), jQuery(function(a) {
        a(".product-zoom").length || (a("#mainProductImg").css({
            "min-height": a("#mainProductImg img").height(),
            "min-width": a("#mainProductImg img").width()
        }), a("#smallGallery a").click(function(b) {
            b.preventDefault(), a("#smallGallery a").removeClass("active"), a(this).addClass("active");
            var c = a(this).parent("li").index(),
                d = a("#mainProductImg").find("div.product-main-image__item.active"),
                e = d.index();
            if (c == e) return !1;
            var f = a("#mainProductImg").find("div.product-main-image__item:nth-child(" + (c + 1) + ")");
            d.removeClass("active"), f.addClass("active")
        }));
        var b = window.innerWidth || a(window).width();
        a(window).resize(debouncer(function(c) {
            var d = window.innerWidth || a(window).width();
            d != b && (a(".product-zoom").length || (a("#mainProductImg").css({
                "min-height": "",
                "min-width": ""
            }), a("#mainProductImg").css({
                "min-height": a("#mainProductImg img").height(),
                "min-width": a("#mainProductImg img").width()
            }))), b = window.innerWidth || a(window).width()
        }))
    }), jQuery(function(a) {
        a("#mainProductImg .zoom-link").length && a("#mainProductImg").magnificPopup({
            disableOn: 767,
            delegate: ".zoom-link",
            type: "image",
            mainClass: "mfp-fade",
            preloader: !0,
            fixedContentPos: !1,
            gallery: {
                enabled: !0,
                navigateByImgClick: !0,
                preload: [0, 1]
            }
        })
    }), jQuery(function(a) {
        var b = window.innerWidth || document.documentElement.clientWidth;
        a(".product-zoom").imagesLoaded(function() {
            if (a(".product-zoom").length) {
                var c;
                c = "rtl" == a("html").css("direction").toLowerCase() ? 11 : 1, b > 767 ? a(".product-zoom").elevateZoom({
                    zoomWindowHeight: a(".product-zoom").height(),
                    gallery: "smallGallery",
                    galleryActiveClass: "active",
                    zoomWindowPosition: c
                }) : a(".product-zoom").elevateZoom({
                    gallery: "smallGallery",
                    zoomType: "inner",
                    galleryActiveClass: "active",
                    zoomWindowPosition: c
                })
            }
        }), a(".product-main-image > .product-main-image__zoom ").bind("click", function() {
            if (galleryObj = [], current = 0, itemN = 0, a("#smallGallery").length) a("#smallGallery li a").not(".video-link").each(function() {
                a(this).hasClass("active") && (current = itemN), itemN++;
                var b = a(this).data("zoom-image"),
                    c = "image";
                image = {}, image.src = b, image.type = c, galleryObj.push(image)
            });
            else {
                itemN++;
                var b = a(this).parent().find(".product-zoom").data("zoom-image"),
                    c = "image";
                image = {}, image.src = b, image.type = c, galleryObj.push(image)
            }
            a.magnificPopup.open({
                items: galleryObj,
                gallery: {
                    enabled: !0
                }
            }, current)
        });
        var c = b;
        a(window).resize(debouncer(function(b) {
            var d = window.innerWidth || a(window).width();
            d != c && (a(".zoomContainer").remove(), a(".elevatezoom").removeData("elevateZoom"), a(".product-zoom").length && (d > 767 ? a(".product-zoom").elevateZoom({
                zoomWindowHeight: a(".product-zoom").height(),
                gallery: "smallGallery"
            }) : a(".product-zoom").elevateZoom({
                gallery: "smallGallery",
                zoomType: "inner"
            }))), c = window.innerWidth || a(window).width()
        }))
    }), jQuery(function(a) {
        "use strict";
        a(".tp-banner-container").length && a(".tp-banner-container").css({}).animate({
            opacity: "1"
        }, 500)
    }), jQuery(function(a) {
        "use strict";
        a(".scroll-to-content").click(function() {
            a("html, body").animate({
                scrollTop: a(window).height() - a("header .navbar").height()
            }, 500), a(".scroll-to-content").hide(200)
        })
    }), jQuery(function(a) {
        "use strict";

        function c(c) {
            var d = c.closest(".product-preview").find(".product-preview__image img").attr("src"),
                e = c.closest(".product-preview").find(".product-preview__image a").attr("href"),
                f = a(".compare-box__items__list");
            b++;
            var g = '<div class="compare-box__items__list__item__delete"><a href="' + e + '" class="icon icon-clear"></a></div><a href="#"><img src="' + d + '" alt=""/></a>';
            f.find(".empty").length && f.find(".empty:first").html(g).removeClass("empty")
        }

        function d() {
            var b = a(".compare-box__items__list__item"),
                c = a(".compare-box__items__list"),
                d = '<li class="compare-box__items__list__item empty"><div class="compare-box__items__list__item__num"></div><img src="images/products/product-empty.png" alt=""/></li>';
            b.each(function() {
                a(this).hasClass("empty") || (a(this).remove(), c.append(d))
            })
        }

        function e(b) {
            var c = b.parent(".compare-box__items__list__item"),
                d = a(".compare-box__items__list");
            c.remove();
            var e = '<li class="compare-box__items__list__item empty"><div class="compare-box__items__list__item__num"></div><img src="images/products/product-empty.png" alt=""/></li>';
            d.append(e);
            var f = 0;
            d.find("li").each(function() {
                var b = a(this).index() + 1;
                a(this).find(".compare-box__items__list__item__num").text(b), a(this).hasClass("empty") || (f = 1)
            }), 0 == f && (a("#compareBox").stop(!0, !1).removeClass("minimize").removeClass("open"), a("body").removeClass("compare-minimize"))
        }
        var b = 0;
        a(document).on("click", ".compare-box__items__list__item__delete", function(b) {
            b.preventDefault(), e(a(this))
        }), a(document).on("click", "#removeAllCompare", function(b) {
            b.preventDefault(), d(a(this)), a("#compareBox").stop(!0, !1).removeClass("minimize").removeClass("open"), a("body").removeClass("compare-minimize")
        }), a(".compare-link").click(function(b) {
            b.preventDefault(), c(a(this)), a("#compareBox").stop(!0, !1).removeClass("minimize").addClass("open"), a("body").removeClass("compare-minimize")
        }), a(".hide-compare").click(function(b) {
            b.preventDefault(), a("#compareBox").stop(!0, !1).removeClass("open").addClass("minimize"), a("body").addClass("compare-minimize")
        }), a(".show-compare").click(function(b) {
            b.preventDefault(), a("#compareBox").stop(!0, !1).removeClass("minimize").addClass("open"), a("body").removeClass("compare-minimize")
        }), a(".close-compare").click(function(b) {
            b.preventDefault(), a("#compareBox").stop(!0, !1).removeClass("minimize").removeClass("open"), a("body").removeClass("compare-minimize")
        })
    }), jQuery(function(a) {
        "use strict";
        if (a("header").length)
            if (a(document).scrollTop() > 150 && a("header .navbar").addClass("stuck--smaller"), a("header.header--max.header--sticky").length) {
                new Waypoint.Sticky({
                    element: a("header #slidemenu")[0],
                    offset: -1
                })
            } else if (a("header.header--sticky .navbar").length) {
            new Waypoint.Sticky({
                element: a("header .navbar")[0],
                offset: -1
            })
        }
        a("body").on("touchend", function() {
            a(document).scrollTop() > 150 ? a("header .navbar").hasClass("stuck--smaller") || setTimeout(function() {
                a("header .navbar").addClass("stuck--smaller")
            }, 300) : a("header .navbar").removeClass("stuck--smaller")
        });
        var d = (a(".no-touch header .navbar").waypoint(function(b) {
            "down" === b && a(".no-touch header .navbar").addClass("stuck--smaller")
        }, {
            offset: -350
        }), a(".no-touch header .navbar").waypoint(function(b) {
            "up" === b && a(".no-touch header .navbar").removeClass("stuck--smaller")
        }, {
            offset: -350
        }), window.innerWidth || a(window).width());
        a(window).resize(function() {
            var b = window.innerWidth || a(window).width();
            b != d && a(document).scrollTop() > 50 && a("header .navbar").addClass("stuck--smaller"), d = window.innerWidth || a(window).width()
        })
    }), jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || a(window).width();
        if (b > 767 && a(".nav-product").length) {
            a(".nav-product ul li a").click(function(b) {
                b.preventDefault();
                var c = a(this).attr("href"),
                    d = a(c).offset().top - a(".nav-product ul").outerHeight();
                a("body,html").animate({
                    scrollTop: d
                })
            });
            a(".product-additional__box").waypoint(function(b) {
                if ("down" === b) {
                    var c;
                    c = this.element.id, a(".nav-product ul li.active").removeClass("active"), a(".nav-product ul li[data-target ='" + c + "']").addClass("active")
                }
            }, {
                offset: a(".nav-product").outerHeight() + 1
            }), a(".product-additional__box").waypoint(function(b) {
                if ("up" === b) {
                    var c;
                    c = this.element.id, a(".nav-product ul li.active").removeClass("active"), a('.nav-product ul li[data-target ="' + c + '"]').addClass("active")
                }
            }, {
                offset: -1
            }), new Waypoint.Sticky({
                element: a(".nav-product")[0]
            });
            if (a("header.header--sticky").length) {
                a("#navProduct").waypoint(function(b) {
                    "down" === b && a("header .navbar").css({
                        opacity: 0,
                        top: "-100%"
                    })
                }, {
                    offset: 50
                }), a("#navProduct").waypoint(function(b) {
                    "up" === b && a("header .navbar").css({
                        opacity: 1,
                        top: ""
                    })
                }, {
                    offset: 50
                })
            }
        }
    }), jQuery(function(a) {
        "use strict";
        Waves.attach("button.wave"), Waves.attach(".wave-block"), Waves.init()
    }), jQuery(function(a) {
        "use strict";
        a(".mobile-collapse__title").click(function(b) {
            b.preventDefault, a(this).parent(".mobile-collapse").toggleClass("open")
        })
    }), jQuery(function(a) {
        "use strict";
        a(".filters-col__collapse__title").click(function(b) {
            b.preventDefault, a(this).parent(".filters-col__collapse").toggleClass("open")
        })
    }), jQuery(function(a) {
        "use strict";
        a(".card--collapse .card-title").click(function(b) {
            b.preventDefault, a(this).parent(".card").toggleClass("open")
        })
    }), jQuery(function(a) {
        "use strict";
        a(".product-carousel.three-in-row").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 321,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "20px"
                }
            }]
        }), a(".product-carousel.four-in-row").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 321,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "20px"
                }
            }]
        }), a(".product-carousel.five-in-row").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 321,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "20px"
                }
            }]
        }), a(".product-category-carousel").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "40px"
                }
            }]
        }), a(".product-category-carousel-aside").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "40px"
                }
            }]
        }), a(".brands-carousel").closest(".aside-column").length ? a(".brands-carousel").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "50px"
                }
            }]
        }) : a(".brands-carousel").slick({
            infinite: !0,
            dots: !1,
            lazyLoad: "ondemand",
            slidesToShow: 7,
            slidesToScroll: 7,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: !0,
                    centerPadding: "50px"
                }
            }]
        });
        var b = a(".blog-carousel");
        if (b.hasClass("show-2") ? b.slick({
                infinite: !0,
                dots: !1,
                slidesToShow: 2,
                slidesToScroll: 2,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        dots: !0
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }) : b.hasClass("show-3") ? b.slick({
                infinite: !0,
                dots: !1,
                slidesToShow: 3,
                slidesToScroll: 2,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: !0
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }) : b.hasClass("show-4") ? b.slick({
                infinite: !0,
                dots: !1,
                slidesToShow: 4,
                slidesToScroll: 2,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        dots: !0
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: !0
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }) : b.slick({
                infinite: !0,
                dots: !1,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        dots: !0
                    }
                }]
            }), a(".testimonials-carousel").slick({
                infinite: !0,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: !1,
                dots: !0
            }), a(".products-widget-carousel").closest(".filters-col__collapse").length) {
            var c = 0;
            if (!a(".products-widget-carousel").closest(".filters-col__collapse").hasClass("open")) {
                var c = 1;
                a(".products-widget-carousel").closest(".filters-col__collapse").addClass("open")
            }
            a(".products-widget-carousel").on("init", function(b, d) {
                1 == c && setTimeout(function() {
                    a(".products-widget-carousel").closest(".filters-col__collapse").removeClass("open")
                }, 1e3)
            }), a(".products-widget-carousel").slick({
                vertical: !0,
                infinite: !0,
                slidesToShow: 2,
                slidesToScroll: 2,
                verticalSwiping: !0,
                arrows: !1,
                dots: !0
            })
        } else a(".products-widget-carousel").slick({
            vertical: !0,
            infinite: !0,
            slidesToShow: 3,
            slidesToScroll: 3,
            verticalSwiping: !0,
            arrows: !1,
            dots: !0,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }]
        });
        a(".product-images-carousel ul").slick({
            infinite: !1,
            dots: !1,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }]
        }), a("#singleGallery").slick({
            infinite: !1,
            dots: !1,
            arrows: !1,
            slidesToShow: 1,
            slidesToScroll: 1
        }), a("#singleGalleryVertical").length && (a("#singleGalleryVertical").on("init", function(b, c) {
            a("#singleGalleryVertical").css({
                opacity: 1
            })
        }), a("#singleGalleryVertical").css({
            opacity: 0
        }).slick({
            infinite: !1,
            vertical: !0,
            verticalScrolling: !0,
            dots: !0,
            arrows: !1,
            slidesToShow: 1,
            slidesToScroll: 1
        }).mousewheel(function(b) {
            b.preventDefault(), b.deltaY < 0 ? a(this).slick("slickNext") : a(this).slick("slickPrev")
        })), window.setTimeout(function() {
            a(".single-slider").css({
                opacity: "1"
            })
        }, 500), a(".single-slider > ul").slick({
            infinite: !1,
            dots: !1,
            arrows: !0,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: !1,
                    dots: !0
                }
            }]
        })
    }), jQuery(function(a) {
        "use strict";
        a("#quickView").on("hidden.bs.modal", function() {
            a(this).removeData("bs.modal").find(".modal-content").empty()
        }), a(".btn-quickview").click(function(b) {
            a("#modalLoader-wrapper").show(), b.preventDefault();
            var c = a(this),
                d = c.attr("href");
            a.ajax({
                url: d,
                cache: !1,
                success: function(b) {
                    var c = a(b);
                    a("#quickview .modal-content").empty().append(c)
                },
                complete: function() {
                    setTimeout(function() {
                        a("#modalLoader-wrapper").fadeOut(), a(".product-images-carousel ul").on("init", function(b) {
                            a(".product-images-carousel").addClass("loaded")
                        }).slick({
                            infinite: !1,
                            dots: !1,
                            slidesToShow: 5,
                            slidesToScroll: 1
                        })
                    }, 1e3)
                },
                error: function(a, b, c) {
                    return !1
                }
            })
        })
    }), jQuery(function(a) {
        "use strict";
        a(".content--parallax").length && a(".content--parallax").each(function() {
            var b = a(this).attr("data-image");
            a(this).css({
                "background-image": "url(" + b + ")"
            }).parallax("50%", .01)
        }), a(".parallax").length && a(".parallax").each(function() {
            var b = a(this).attr("data-image");
            a(this).css({
                "background-image": "url(" + b + ")"
            }).parallax("50%", 0)
        })
    }), jQuery(function(a) {
        "use strict";
        a(".image-bg").length && a(".image-bg").each(function() {
            var b = a(this).attr("data-image");
            a(this).css({
                "background-image": "url(" + b + ")"
            })
        })
    }), jQuery(function(a) {
        "use strict";
        a("#productOther > li").hover(function() {
            a(this).toggleClass("show-image")
        })
    }), jQuery(function(a) {
        "use strict";
        a(".header__search input").focus(function() {
            a(".search-focus-fade").stop().animate({
                opacity: "0"
            }, 200)
        }).blur(function() {
            a(".search-focus-fade").stop().animate({
                opacity: "1"
            }, 200)
        })
    }), jQuery(function(a) {
        "use strict";

        function b(b, c) {
            b.each(function() {
                var b = a(this),
                    d = b.attr("data-animation"),
                    e = b.attr("data-animation-delay");
                b.css({
                    "-webkit-animation-delay": e,
                    "-moz-animation-delay": e,
                    "animation-delay": e
                });
                var f = c ? c : b;
                f.waypoint(function() {
                    b.addClass("animated").addClass(d)
                }, {
                    triggerOnce: !0,
                    offset: "90%"
                })
            })
        }
        b(a(".animation")), b(a(".staggered-animation"), a(".staggered-animation-container"))
    }), jQuery(function(a) {
        $j("#countdown1").length > 0 && $j("#countdown1").countdown({
            until: new Date(2015, 10, 1)
        })
    }), jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || $(window).width();
        a(".products-isotope").length && a(".products-isotope").imagesLoaded(function() {
            a(".products-isotope").isotope({
                itemSelector: ".product-preview-wrapper",
                layoutMode: "fitRows"
            })
        });
        var c = parseInt(a(".products-col").find(".product-preview-wrapper:first-child").width());
        a(".products-isotope").hasClass("two-in-row") && (c -= 200), a(".products-col").parent().parent().hasClass("open") && ("rtl" == a("html").css("direction").toLowerCase() ? a(".products-col").stop(!0, !1).animate({
            marginRight: "280px"
        }, 200, function() {
            setProductSize(a(".products-col"), c), a(".products-isotope").isotope().isotope("layout")
        }) : a(".products-col").stop(!0, !1).animate({
            marginLeft: "280px"
        }, 200, function() {
            setProductSize(a(".products-col"), c), a(".products-isotope").isotope().isotope("layout")
        })), a("#showFilter").click(function(c) {
            c.preventDefault();
            var d = parseInt(a(".products-col").find(".product-preview-wrapper:first-child").width());
            a(".products-isotope").hasClass("two-in-row") && (d -= 200), a(".products-col").parent().parent().hasClass("open") ? (a(".products-col").parent().parent().removeClass("open"), a(".products-col").stop(!0, !1).animate({
                marginLeft: "0",
                marginRight: "0"
            }, 200, function() {
                a(".products-isotope").hasClass("two-in-row") ? d = b > 560 ? a(".products-isotope").width() / 2 : a(".products-isotope").width() / 1 : a(".products-isotope").hasClass("three-in-row") ? d = b > 560 ? a(".products-isotope").width() / 3 : a(".products-isotope").width() / 1 : a(".products-isotope").hasClass("four-in-row") ? d = b > 767 ? a(".products-isotope").width() / 4 : b > 560 ? a(".products-isotope").width() / 3 : a(".products-isotope").width() / 1 : a(".products-isotope").hasClass("five-in-row") ? d = b > 991 ? a(".products-isotope").width() / 5 : b > 767 ? a(".products-isotope").width() / 4 : b > 560 ? a(".products-isotope").width() / 3 : a(".products-isotope").width() / 1 : a(".products-isotope").hasClass("six-in-row") ? d = b > 1199 ? a(".products-isotope").width() / 6 : b > 991 ? a(".products-isotope").width() / 5 : b > 767 ? a(".products-isotope").width() / 4 : b > 560 ? a(".products-isotope").width() / 3 : a(".products-isotope").width() / 1 : a(".products-isotope").hasClass("seven-in-row") ? d = b > 1600 ? a(".products-isotope").width() / 7 : b > 1199 ? a(".products-isotope").width() / 6 : b > 991 ? a(".products-isotope").width() / 5 : b > 767 ? a(".products-isotope").width() / 4 : b > 560 ? a(".products-isotope").width() / 2 : a(".products-isotope").width() / 1 : a(".products-isotope").hasClass("eight-in-row") && (d = b > 1600 ? a(".products-isotope").width() / 8 : b > 1199 ? a(".products-isotope").width() / 6 : b > 991 ? a(".products-isotope").width() / 5 : b > 767 ? a(".products-isotope").width() / 4 : b > 560 ? a(".products-isotope").width() / 2 : a(".products-isotope").width() / 1), setProductSize(a(".products-col"), d), a(".products-isotope.products-col").isotope().isotope("layout")
            })) : (a(".products-col").parent().parent().addClass("open"), "rtl" == a("html").css("direction").toLowerCase() ? a(".products-col").stop(!0, !1).animate({
                marginRight: "280px"
            }, 200, function() {
                setProductSize(a(".products-col"), d), a(".products-isotope").isotope().isotope("layout")
            }) : a(".products-col").stop(!0, !1).animate({
                marginLeft: "280px"
            }, 200, function() {
                setProductSize(a(".products-col"), d), a(".products-isotope").isotope().isotope("layout")
            }))
        });
        var d = window.innerWidth || a(window).width();
        a(window).resize(function() {
            var b = window.innerWidth || a(window).width();
            if (b != d && a(".products-isotope").length)
                if (a(".products-col").parent().parent().hasClass("open")) {
                    a(".products-col").stop(!0, !1).animate({
                        marginLeft: "0"
                    }, 0), a(".products-col").find(".product-preview-wrapper").css("width", "");
                    var c = parseInt(a(".products-col").find(".product-preview-wrapper:first-child").width());
                    a(".products-isotope").hasClass("two-in-row") && (c -= 200), "rtl" == a("html").css("direction").toLowerCase() ? a(".products-col").stop(!0, !1).animate({
                        marginRight: "280px"
                    }, 200, function() {
                        setProductSize(a(".products-col"), c), a(".products-isotope").isotope().isotope("layout")
                    }) : a(".products-col").stop(!0, !1).animate({
                        marginLeft: "280px"
                    }, 200, function() {
                        setProductSize(a(".products-col"), c), a(".products-isotope").isotope().isotope("layout")
                    })
                } else a(".products-col").find(".product-preview-wrapper").css("width", ""), setProductSize(a(".products-col"), c), a(".products-isotope.products-col").isotope().isotope("layout");
            d = window.innerWidth || a(window).width()
        })
    }), jQuery(function(a) {
        "use strict";
        var b = $j(".products-isotope");
        if (0 != b.length) {
            var c = b,
                d = $j(".filters-by-category .option-set"),
                e = d.find("a");
            e.click(function() {
                var b = a(this);
                if (b.hasClass("selected")) return !1;
                var d = b.parents(".option-set");
                d.find(".selected").removeClass("selected"), b.addClass("selected");
                var e = {},
                    f = d.attr("data-option-key"),
                    g = b.attr("data-option-value");
                return g = "false" !== g && g, e[f] = g, "layoutMode" === f && "function" == typeof changeLayoutMode ? changeLayoutMode($this, e) : c.isotope(e), !1
            })
        }
    }), jQuery(function(a) {
        "use strict";
        a(".products-isotope.products-col").on("layoutComplete", function() {
            window.setTimeout(function() {
                a(".products-isotope.products-col").removeClass("no-transition")
            }, 1e3)
        }), a("a.link-row-view").click(function(b) {
            window.innerWidth || $(window).width();
            if (b.preventDefault(), a(this).addClass("active"), a("a.link-grid-view").removeClass("active"), a(".products-listing").addClass("row-view"), a(".products-col").find(".product-preview-wrapper").css("width", ""), a(".outer").hasClass("open")) {
                a(".products-isotope.products-col").addClass("no-transition"), a(".products-col").stop(!0, !1).animate({
                    marginLeft: "0"
                }, 0);
                var d = parseInt(a(".products-col").find(".product-preview-wrapper:first-child").width());
                a(".products-col").stop(!0, !1).animate({
                    marginLeft: "280px"
                }, 0, function() {
                    setProductSize(a(".products-col"), d), a(".products-isotope.products-col").isotope("layout")
                })
            } else a(".products-isotope.products-col").addClass("no-transition").isotope("layout")
        }), a("a.link-grid-view").click(function(b) {
            window.innerWidth || $(window).width();
            if (b.preventDefault(), a(this).addClass("active"), a("a.link-row-view").removeClass("active"), a(".products-listing").removeClass("row-view"), a(".products-col").find(".product-preview-wrapper").css("width", ""), a(".outer").hasClass("open")) {
                a(".products-isotope.products-col").addClass("no-transition"), a(".products-col").stop(!0, !1).animate({
                    marginLeft: "0"
                }, 0), a(".products-col").find(".product-preview-wrapper").css("width", "");
                var d = parseInt(a(".products-col").find(".product-preview-wrapper:first-child").width());
                a(".products-isotope").hasClass("two-in-row") && (d -= 200), a(".products-col").stop(!0, !1).animate({
                    marginLeft: "280px"
                }, 0, function() {
                    setProductSize(a(".products-col"), d), a(".products-isotope.products-col").isotope("layout")
                })
            } else a(".products-isotope.products-col").addClass("no-transition").isotope("layout")
        })
    }), jQuery(function(a) {
        "use strict";

        function c() {
            var c = window.innerWidth || $(window).width(),
                d = 1;
            c > 1199 ? d = 4 : c > 991 ? d = 4 : c > 767 ? d = 3 : c > 480 && (d = 2);
            var e = b.parent(".container").width(),
                f = Math.floor(e / d);
            b.find(".post").each(function() {
                a(this).css({
                    width: f + "px"
                })
            }), b.isotope("layout")
        }
        var b = a(".posts-isotope");
        b.length && (b.isotope({
            itemSelector: ".post",
            masonry: {
                isFitWidth: !0
            }
        }), b.imagesLoaded(function() {
            c()
        })), a(".view-more").on("click", function() {
            var d, e = a(this).attr("data-load");
            a(this).hide(), a.ajax({
                url: e,
                success: function(e) {
                    a("#postPreload").append(e), a("#postPreload > div").each(function() {
                        d = a(this), b.append(d).isotope("appended", d), c()
                    })
                }
            })
        });
        var d = window.innerWidth || a(window).width();
        a(window).resize(debouncer(function(e) {
            if (b.length) {
                var f = window.innerWidth || a(window).width();
                f != d && c(), d = window.innerWidth || a(window).width()
            }
        }))
    }), jQuery(function(a) {
        "use strict";

        function c() {
            var c = window.innerWidth || $(window).width(),
                d = 1;
            c > 1199 ? d = 5 : c > 991 ? d = 4 : c > 767 ? d = 3 : c > 480 && (d = 2);
            var e = b.parent(".container").width(),
                f = e / d;
            b.find(".gallery__item").each(function() {
                a(this).hasClass("gallery__item--double") && c > 767 ? a(this).css({
                    width: 2 * f + "px"
                }) : a(this).css({
                    width: f + "px"
                })
            });
            var g = b.find(".gallery__item:not(.gallery__item--double)").height();
            b.find(".gallery__item").each(function() {
                a(this).css({
                    height: ""
                }), a(this).hasClass("gallery__item--double") && c > 767 && a(this).css({
                    height: 2 * g + "px"
                })
            }), b.isotope("layout")
        }
        var b = a(".gallery");
        b.imagesLoaded(function() {
            b.length && (b.isotope({
                itemSelector: ".gallery__item",
                isResizeBound: !1,
                masonry: {
                    isFitWidth: !0
                }
            }), c())
        }), a(".view-more-gallery").on("click", function() {
            var d, e = a(this).attr("data-load");
            a(this).hide(), a.ajax({
                url: e,
                success: function(e) {
                    a("#galleryPreload").append(e), a("#galleryPreload > div").each(function() {
                        d = a(this), b.append(d).isotope("appended", d), c()
                    })
                }
            })
        });
        var d = window.innerWidth || a(window).width();
        a(window).resize(debouncer(function(e) {
            if (b.length) {
                var f = window.innerWidth || a(window).width();
                f != d && c(), d = window.innerWidth || a(window).width()
            }
        }))
    }), jQuery(function(a) {
        "use strict";

        function f() {
            var c = window.innerWidth || $(window).width(),
                d = 1;
            c > 1199 ? d = 4 : c > 991 ? d = 4 : c > 767 ? d = 2 : c > 480 && (d = 2);
            var e = b.parent(".container").width(),
                f = e / d;
            b.find(".art-catalogue__item").each(function() {
                a(this).hasClass("art-catalogue__item--double") && c > 767 ? a(this).css({
                    width: 2 * f + "px"
                }) : a(this).css({
                    width: f + "px"
                })
            }), b.isotope("layout")
        }
        var b = a(".art-catalogue");
        window.innerWidth || $(window).width(), b.width();
        b.length && (b.isotope({
            itemSelector: ".art-catalogue__item",
            isResizeBound: !1,
            percentPosition: !0,
            masonry: {
                columnWidth: ".art-catalogue__item:not(.art-catalogue__item--double)"
            }
        }), b.imagesLoaded(function() {
            f()
        }));
        var g = window.innerWidth || a(window).width();
        a(window).resize(debouncer(function(b) {
            var c = a(".art-catalogue");
            if (c.length) {
                var d = window.innerWidth || a(window).width();
                d != g && f(), g = window.innerWidth || a(window).width()
            }
        }))
    }), jQuery(function(a) {
        "use strict";

        function c(b) {
            var c = a(".navbar-nav--vertical"),
                d = c.innerWidth() - 2,
                e = c.innerHeight() + 2,
                f = c.closest('div[class^="container"]').width();
            c.length && (b > 991 ? (c.children("li").children(".dropdown-menu").css({
                "margin-left": d + "px"
            }), c.find(".dropdown-menu.megamenu").css({
                width: f - d + "px",
                "min-height": e + "px"
            })) : c.children("li").children(".dropdown-menu").css({
                "margin-left": "",
                width: ""
            }))
        }
        var b = window.innerWidth || a(window).width();
        c(b);
        var d = b;
        a(window).resize(debouncer(function(b) {
            var e = window.innerWidth || a(window).width();
            e != d && c(e), d = window.innerWidth || a(window).width()
        }))
    }), jQuery(function(a) {
        "use strict";
        a(".btn-plus > a").on("click", function(b) {
            b.preventDefault(), a(this).parent().find("div").toggleClass("btn-plus__links--active"), a(this).toggleClass("expanded")
        })
    }), jQuery(function(a) {
        "use strict";
        a(".tooltip-link").tooltip()
    }), jQuery(function(a) {
        "use strict";
        a("#openMenu").on("click", function(a) {})
    }), jQuery(function(a) {
        "use strict";
        a(".btn-number").click(function(b) {
            b.preventDefault();
            var c = a(this).attr("data-type"),
                d = a(this).closest(".input-group-qty").find("input.input-qty"),
                e = parseFloat(d.val());
            isNaN(e) ? d.val(0) : "minus" == c ? (e > d.attr("min") && d.val(e - 1).change(), parseFloat(d.val()) == d.attr("min") && a(this).attr("disabled", !0)) : "plus" == c && (e < d.attr("max") && d.val(e + 1).change(), parseFloat(d.val()) == d.attr("max") && a(this).attr("disabled", !0))
        }), a(".input-number").focusin(function() {
            a(this).data("oldValue", a(this).val())
        }), a(".input-number").change(function() {
            var b = parseFloat(a(this).attr("min")),
                c = parseFloat(a(this).attr("max")),
                d = parseFloat(a(this).val());
            a(this).attr("name");
            d >= b ? a(this).closest(".input-group-qty").find(".btn-number[data-type='minus']").removeAttr("disabled") : (alert("Sorry, the minimum value was reached"), a(this).val(a(this).data("oldValue"))), d <= c ? a(this).closest(".input-group-qty").find(".btn-number[data-type='plus']").removeAttr("disabled") : (alert("Sorry, the maximum value was reached"), a(this).val(a(this).data("oldValue")))
        })
    }), jQuery(function(a) {
        "use strict";
        var c = (a(".category-block__image"), a(".no-touch .category-block__list")),
            d = a(".touch .category-block__list");
        c.find("a").hover(function(b) {
            b.preventDefault(), a(this).closest(".category-block__list").find("a").removeClass("active"), a(this).addClass("active");
            var c = a(this).parent("li").index(),
                d = a(this).closest(".category-block").find(".category-block__image > img.active"),
                e = d.index();
            if (c == e) return !1;
            var f = a(this).closest(".category-block").find(".category-block__image > img:nth-child(" + (c + 1) + ")");
            d.removeClass("active"), f.addClass("active")
        }), d.find("a").click(function(b) {
            b.preventDefault(), a(this).closest(".category-block__list").find("a").removeClass("active"), a(this).addClass("active");
            var c = a(this).parent("li").index(),
                d = a(this).closest(".category-block").find(".category-block__image > img.active"),
                e = d.index();
            if (c == e) window.location = this.href;
            else {
                var f = a(this).closest(".category-block").find(".category-block__image > img:nth-child(" + (c + 1) + ")");
                d.removeClass("active"), f.addClass("active")
            }
        })
    }),
    function(a) {
        "use strict";

        function b(a) {
            return new RegExp("(^|\\s+)" + a + "(\\s+|$)")
        }

        function f(a, b) {
            var f = c(a, b) ? e : d;
            f(a, b)
        }
        var c, d, e;
        "classList" in document.documentElement ? (c = function(a, b) {
            return a.classList.contains(b)
        }, d = function(a, b) {
            a.classList.add(b)
        }, e = function(a, b) {
            a.classList.remove(b)
        }) : (c = function(a, c) {
            return b(c).test(a.className)
        }, d = function(a, b) {
            c(a, b) || (a.className = a.className + " " + b)
        }, e = function(a, c) {
            a.className = a.className.replace(b(c), " ")
        });
        var g = {
            hasClass: c,
            addClass: d,
            removeClass: e,
            toggleClass: f,
            has: c,
            add: d,
            remove: e,
            toggle: f
        };
        "function" == typeof define && define.amd ? define(g) : a.classie = g
    }(window), jQuery(function(a) {
        function e() {
            if (classie.has(c, "open")) {
                a("body").removeClass("modal-open"), classie.remove(c, "open"), classie.add(c, "close");
                var b = function(a) {
                    if (support.transitions) {
                        if ("visibility" !== a.propertyName) return;
                        this.removeEventListener(transEndEventName, b)
                    }
                    classie.remove(c, "close")
                };
                support.transitions ? c.addEventListener(transEndEventName, b) : b()
            } else classie.has(c, "close") || (classie.add(c, "open"), a("body").addClass("modal-open"));
            return !1
        }
        if (a(".overlay").length && a(".search-open").length) {
            var b = a(".search-open"),
                c = document.querySelector("div.overlay"),
                d = c.querySelector("button.overlay-close");
            transEndEventNames = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd",
                msTransition: "MSTransitionEnd",
                transition: "transitionend"
            }, transEndEventName = transEndEventNames[Modernizr.prefixed("transition")], support = {
                transitions: Modernizr.csstransitions
            }, b.on("click", e), d.addEventListener("click", e)
        }
    }), jQuery(function(a) {
        "use strict";

        function b() {
            return navigator.platform.indexOf("iPad") != -1
        }

        function c() {
            var c = a(window).height();
            b() && (c += 80), a(".chapter").each(function() {
                a(this).css({
                    "min-height": c + "px"
                })
            }), a(".chapter__title").each(function() {
                a(this).css({
                    "min-height": c + "px"
                })
            }), a(".chapter__content").each(function() {
                a(this).css({
                    "min-height": c + "px"
                })
            }), a(".chapter__content .category-big-banner, .chapter__content .category-big-banner__image").each(function() {
                a(this).css({
                    "min-height": c + "px"
                })
            })
        }

        function d() {
            a(".chapter").each(function() {
                var b = '<div class="chapter__end">chapter END</div>';
                a(this).append(b)
            })
        }

        function e() {
            a(".chapter").waypoint(function(b) {
                "down" === b && (a(".chapter__title").removeClass("title--fixed").removeClass("title--bottom"), a(".chapter__title").removeClass("title--fixed"), a(this.element).find(".chapter__title").addClass("title--fixed"))
            }, {
                offset: 0
            }), a(".chapter").waypoint(function(b) {
                "up" === b && a(".chapter__title").removeClass("title--fixed").removeClass("title--bottom")
            }, {
                offset: 0
            }), a(".chapter__end").waypoint(function(b) {
                if ("down" === b) {
                    a(".chapter__title").removeClass("title--fixed").removeClass("title--bottom"), a(this.element).parent().find(".chapter__title").addClass("title--bottom");
                    var c;
                    c = a(this.element).parent().attr("id")
                }
            }, {
                offset: a(window).height()
            }), a(".chapter__end").waypoint(function(b) {
                "up" === b && (a(".chapter__title").removeClass("title--fixed").removeClass("title--bottom"), a(this.element).parent().find(".chapter__title").addClass("title--bottom"))
            }, {
                offset: 0
            }), a(".chapter__end").waypoint(function(b) {
                "up" === b && (a(".chapter__title").removeClass("title--fixed").removeClass("title--bottom"), a(this.element).parent().find(".chapter__title").addClass("title--fixed"))
            }, {
                offset: a(window).height()
            })
        }
        var f = window.innerWidth || a(window).width();
        a("#landingContent").length && (f > 991 ? (c(), d(), e()) : c()), a(window).resize(debouncer(function(b) {
            var f = window.innerWidth || a(window).width();
            a("#landingContent").length && (f > 991 ? (c(), d(), e()) : (c(), Waypoint.disableAll()))
        }))
    }), jQuery(function(a) {
        "use strict";
        a(".ajax-to-cart").click(function(b) {
            b.preventDefault(), a(this).addClass("btn--wait"), a.ajax({
                url: "ajax.php",
                success: function(b) {
                    a(".ajax-to-cart").removeClass("btn--wait"), a("#modalAddToCart").modal("toggle")
                }
            })
        }), a(".ajax-to-wishlist").click(function(b) {
            b.preventDefault(), a("#modalAddToWishlist").modal("toggle"), a("#modalAddToWishlist .loading").show(), a("#modalAddToWishlist .success").hide(), a.ajax({
                url: "ajax.php",
                success: function(b) {
                    a("#modalAddToWishlist .loading").hide(), a("#modalAddToWishlist .success").show()
                }
            })
        })
    }), jQuery(function(a) {
        "use strict";
        a(".input-group--wd > input, .input-group--wd > textarea ").blur(function() {
            var b = a(this);
            b.val() ? b.addClass("used") : b.removeClass("used")
        })
    }), jQuery(function(a) {
        "use strict";
        a("body").addClass("loaded")
    }), jQuery(function(a) {
        "use strict";
        a("#gallery").length && a("#gallery a.btn").magnificPopup({
            type: "image",
            gallery: {
                enabled: !0
            }
        })
    }), jQuery(function(a) {
        "use strict";
        a(".video-link").length && a(".video-link").magnificPopup({
            disableOn: 767,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !0,
            fixedContentPos: !1
        })
    }), jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || a(window).width();
        a("body").hasClass("boxed") && a(".aside-column .slick-slider.slick-initialized").each(function() {
            a(this).hasClass("nav-top") || a(this).hasClass("nav-dot") || a(this).addClass("nav-inside")
        }), a("body").hasClass("fullwidth") ? a(".slick-slider.slick-initialized").each(function() {
            a(this).hasClass("nav-top") || a(this).hasClass("nav-dot") || a(this).addClass("nav-inside")
        }) : a(".slick-slider.slick-initialized").each(function() {
            if (!a(this).closest(".single-slider").length) {
                if (a("body").hasClass("boxed") && !a(this).hasClass("blog-carousel")) var c = b;
                else var c = a(this).closest("section").width();.5 * (c - a(this).width()) < 45 && (a(this).addClass("nav-inside"), a(".slick-initialized").slick("setPosition"))
            }
        }), a(window).resize(debouncer(function(c) {
            var d = window.innerWidth || a(window).width();
            d != b && a(".slick-slider.slick-initialized").each(function() {
                if (!a(this).closest(".single-slider").length) {
                    if (a("body").hasClass("boxed") && !a(this).hasClass("blog-carousel")) var b = d;
                    else var b = a(this).closest("section").width();.5 * (b - a(this).width()) < 45 ? (a(this).addClass("nav-inside"), a(".slick-initialized").slick("setPosition")) : a(this).removeClass("nav-inside")
                }
            }), b = window.innerWidth || a(window).width()
        }))
    }), jQuery(function(a) {
        "use strict";
        var b = window.innerWidth || a(window).width();
        a(".touch category-block__list a").doubleTapToGo(), b > 767 && a(".touch ul.navbar-nav > li").each(function() {
            a(this).find("a").hasClass("dropdown-toggle") && a(this).doubleTapToGo()
        })
    }), jQuery(function(a) {
        "use strict";
        a(".panel-group").on("show.bs.collapse", function(b) {
            a(b.target).prev(".panel-heading").addClass("active")
        }).on("hide.bs.collapse", function(b) {
            a(b.target).prev(".panel-heading").removeClass("active")
        })
    });