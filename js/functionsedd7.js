// Generate navigation sub-categories dropdowns

jQuery(function($j) {

    "use strict";

    //var windowsize = $j(window).width();
    //if (windowsize < 767) {
    //    $j('select').removeClass('selectpicker');
    //}

    // move html code to show sub-categories popup on main Navigation
    $j(".3d-sub").each(
        function() {
            var elem = $j(this);
            if (elem.children().length == 0) {
                elem.parent().remove();
            } else {
                var elemo = elem;
                var alli = elem.parent();
                var prevelement = elem.parent().prev();
                //console.log(prevelement);
                elemo.detach().appendTo(prevelement);
                prevelement.find('a.wave').append('<span class="caret caret--dots"></span>');
                prevelement.find('a.wave').addClass('dropdown-toggle');
                alli.remove();
            }
        }
    );

    // Add html code for SALE label
    $j(".price-box__old").each(
        function() {
            var salePrice = $j(this);
            salePrice.parent().parent().before('<div class="product-preview__label product-preview__label&#45;&#45;right product-preview__label&#45;&#45;sale"><span>Sale</span></div>');
        }
    );




    // make main slider full width on home page
    var slider = $j('#slider');
    if( slider.length > 0 ) {

    } else {

        if ($j( window ).width() > 1024 ){
            $j('#mainContent').css({
                'width': '860px',
                'clear': 'none',
                'float': 'left'
            });
            $j('.d3cart-container').css({
                'width': '1170px',
                'padding': '0'
                //'clear' : 'both'
            });
            $j('.d3cart-content').css({
                'padding-bottom': '0'
            });
        } else {
            $j('#mainContent').css({
                'width': '100%',
                'clear': 'none',
                'float': 'left'
            });
            $j('.d3cart-container').css({
                'width': '100%',
                'padding': '0'
                //'clear' : 'both'
            });
            $j('.d3cart-content').css({
                'padding-bottom': '0'
            });
        }
    }


    // set css for product listing
    var listing = $j('#listing0');
    if( listing.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
        //$j('#slider').css('padding-top', '25px');
    }
    // add css styles for Category page
    var category = $j('#category');
    if( category.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }
    // add css styles for Search page
    var search = $j('#search');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }
    // add css styles for Extrapage page
    var search = $j('#extrapage');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //giftregistryHome
    var search = $j('#giftregistryHome');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //loginAccount
    var search = $j('#loginAccount');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //registration0
    var search = $j('#registration0');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //message
    var search = $j('#message');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //error
    var search = $j('#error');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //searchGroup
    var search = $j('#searchGroup');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    ////checkoutSinglePage
    var search = $j('#checkoutSinglePage');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }
    var element = $j('#checkoutSinglePage');
    if( element.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%'
            //'clear' : 'both'
        });
    }

    //contactUs
    var element = $j('#contactUs');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }
    var element = $j('#contactUs');
    if( element.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
    }

    //giftregistryPrelogin
    var search = $j('#giftregistryPrelogin');
    if( search.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }



    //blog
    var element = $j('#blog');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#ffffff',
            'padding-top' : '25px'
        });
    }
    var element = $j('#blog');
    if( element.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
    }



    // set css for product listing
    var listing = $j('#viewCart');
    if( listing.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
        //$j('#slider').css('padding-top', '25px');
    }

    //myaccount
    // set css for product listing
    var listing = $j('#myaccount');
    if( listing.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
        //$j('#slider').css('padding-top', '25px');
    }

    //About us
    //about-us-d3
    var element = $j('.about-us-d3');
    if( element.length > 0 ) {
        $j('#leftBar').css({
            'display' : 'none'
        });
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
        $j('.d3cart-content').css({
            'background-color': '#ffffff',
        });
        $j('.breadcrumbs').css({
            'background-color': '#ffffff',
        });

        $j(".content--fill")[0].style.setProperty( 'background-color', '#ffffff', 'important' );

        $j('.content--fill').css({
            'margin-top' : '75px'
        });

        $j('.about-us-d3>.container').css({
            'padding': '0',
        });

        $j('#extrapage').css({
            'padding': '0',
        });

        //$j('.d3cart-container').css({
        //    'width' : '100%',
        //    'padding': '0'
        //    //'clear' : 'both'
        //});
    }

    //TERMS AND CONDITIONS
    var element = $j('#feedPage0');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //feedDetail
    var element = $j('#feedDetail');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //affiliateInfo
    var element = $j('#affiliateInfo');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }


    //gcView
    var element = $j('#gcView');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //orderHistory
    var element = $j('#orderHistory');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //giftregistryEdit
    var element = $j('#giftregistryEdit');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //viewGiftregistryList
    var element = $j('#viewGiftregistryList');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }


    //giftregistryView
    var element = $j('#giftregistryView');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }

    //viewGiftregistryList
    var element = $j('#viewGiftregistryList');
    if( element.length > 0 ) {
        $j('.d3cart-content').css({
            'background-color' : '#f4f4f4',
            'padding-top' : '25px'
        });
    }


    //checkoutThankYou
    // set css for
    var listing = $j('#checkoutThankYou');
    if( listing.length > 0 ) {
        $j('#mainContent').css({
            'width' : '100%',
            'clear' : 'both'
        });
        //$j('#slider').css('padding-top', '25px');
    }


    // Video Popup
    if ($j('.video-link').length) {
        $j('.video-link').magnificPopup({
            disableOn: 767,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false,
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                        id: 'embed/', // String that splits URL in a two parts, second part should be %id%
                        // Or null - full URL will be returned
                        // Or a function that should return %id%, for example:
                        // id: function(url) { return 'parsed id'; }

                        src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                    },
                }
            }
        });
    }

});