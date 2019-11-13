function showToastInfo(header, header_class, body) {
    $('.toast-p').append('<div class="toast" role="status" aria-live="polite" aria-atomic="true" data-delay="5000" data-autohide="false" style="min-width: 120px;"><div class="toast-header text-white bg-'+header_class+'"><strong class="mr-auto">'+header+'</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="toast-body bg-white text-'+header_class+'">'+body+'</div></div>');
    const toast = $('.toast').last();
    toast.toast('show').slideUp(1);
    toast.slideDown('slow');
    setTimeout(() => {
        toast.slideUp('slow', () => {
            toast.remove();
        });
    }, 5000);
}


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
    $('.search_id').keyup((e) => {
        $('#data').css('display', 'block');
        $('#data2').css('display', 'block');
        var code = (e.keyCode || e.which);

        if (code == 37 || code == 38 || code == 39 || code == 40) {
            return;
        }
        if (code == 13) {
            $('#data').css('display', 'none');
            $('#data2').css('display', 'none');
        }
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

