

$(() => {
    setInterval(() => {
        count_cart();
    }, 5000);
    $('#loading').delay(1000).hide(20);
    $('.emptycart').click((e) => {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Welcome/emptycart',
            success: () => {
                $('#mycart').html('<span class=crxxshopping-cart__total"> <i class="fa fa-shopping-bag fa-2x"></i>Empty Cart</span>');
            }
        });
    });
    $('.shopping-cart__item__info__delete').click((e) => {
        e.preventDefault();
        $('.sc').addClass('open');
        var rid = $(e.target).attr('id');
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Welcome/removecart',
            data: {'rid': rid},
            success: (response) => {
                if (response.length < 2900) {
                    $('#mycart').html('<span class="shopping-cart__total"> <i class="fa fa-shopping-bag fa-2x"></i>Empty Cart</span>');
                    $('#mycart2').html('<span class="shopping-cart__total"> <i class="fa fa-shopping-bag fa-2x"></i>Empty Cart</span>');
                }
                $('.sc').addClass('open');
                $('#mycart').html(response);
                $('#mycart2').html(response);
            }
        });
    });
    $('li').click(() => {
        $('li').removeClass('open');
        $(e.target).toggleClass('open');
    });
    $('.search_id').keyup((e) => {
        var fid = $(e.target).val();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Welcome/search',
            data: { 'val': fid },
            success: (response) => {
                if (response.length == '2' || response.length == '52' || response.length == '44') {
                    $('#data').css('display', 'none');
                    $('#data2').css('display', 'none');
                } else {
                    $('#data').html(response);
                    $('#data2').html(response);
                }
            },
            error: () => {
            }
        });
    });
    $('.search_id').blur(() => {
        $('#data').css('display', 'none');
        $('#data2').css('display', 'none');
    });
    $('.search_id').click(() => {
        $('#data').css('display', 'none');
        $('#data2').css('display', 'none');
    });
    $(window).scroll(() => {
        $('#data').fadeOut('medium');
        $('#data2').fadeOut('medium');
    });
    $('.hovernav').hover((e) => {
        $('.hovernav').find('i').not('.fa-home').removeClass('fa-angle-up').addClass('fa-angle-down');
        $(e.target).find('i').not('.fa-home').removeClass('fa-angle-down').addClass('fa-angle-up');
    });

    function count_cart() {
        var url = baseUrl + 'welcome/count_cart';
        $.ajax({
            url: url,
            success: (result) => {
                if (result == '') {
                    $('#citems').html('0');
                    $('#count_cart').html('0');
                } else {
                    $('#citems').html(result);
                    $('#count_cart').html(result);
                }
            }
        })
    };
});

