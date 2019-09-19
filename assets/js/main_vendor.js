var winWidth = $(window).width();
var isMobile = false;

$(document).ready(function() {
    
    modifyHeaderWithIrctc();

    var user_agent_header = navigator.userAgent;

    if (user_agent_header.indexOf('iPhone') != -1 || user_agent_header.indexOf('iPod') != -1 || user_agent_header.indexOf('iPad') != -1) {

        $('.launchHere').attr("href", "sellers.snapdeal.com://");
    }

    /* $(".threeLine").click(function(e) {
         $(this).toggleClass("active");
         $(".absoluteNav").slideToggle("slow");
     });*/

    $(document).bind('click', function(e) {
        if ($('.threeLine').is(':visible')) {
            var $clicked = $(e.target);
            if ($clicked.closest('div').hasClass("threeLine")) {
                $('.threeLine').toggleClass("active");
                $(".absoluteNav").slideToggle("slow");
            } else {

                if (!$clicked.parents().hasClass("absoluteNav")) {
                    $('.threeLine').removeClass("active");
                    $(".absoluteNav").hide();
                }
            }
        }
    });

    if (winWidth < 1000) {
        $(".upperDiv").insertBefore(".bottomDiv");
        $(".upperDiv2").insertBefore(".bottomDiv2");
        var param1var = getQueryVariable("msg");
        isMobile = true;
        if (param1var == "1")
            $('#loginModalDiv').modal();

    }

    var sliders = new Array();
    if (winWidth < 959) {
        $('.bxslider2').each(function(i, slider) {
            sliders[i] = $(slider).bxSlider();
        });

    }
    if (winWidth > 960) {
        $('.bxslider2').each(function(i, slider) {
            sliders[i] = $(slider).bxSlider({
                slideWidth: 570,
                minSlides: 2,
                maxSlides: 3,
                slideMargin: 20
            });
        });
    }

    $(".tabWrapper li a").click(function(e) {
        $(".tabWrapper li a").removeClass("active");
        $(this).addClass("active");
        var parentIndex = $(this).parent().index();
        $(".bxSliderWrapper").hide();
        $(".bxSliderWrapper:eq(" + parentIndex + ")").show();
        sliders[parentIndex].reloadSlider();
    });

    setTimeout(function() {
        $(".bxSliderWrapper:eq(1)").hide();
        $(".bxSliderWrapper:eq(2)").hide();
    }, 1000)
    $('ul.selectBoxInMob').each(function() {
        var select = $(document.createElement('select')).insertBefore($(this));
        var form = $(document.createElement('form')).insertBefore(select);
        form.attr("role", "form");
        var div = $(document.createElement('div')).insertBefore(select);
        div.addClass("form-group");
        select.addClass('select_video');
        $('>li a', this).each(function() {
            var a = $(this).click(function() {
                    if ($(this).attr('target') === '_blank') {
                        window.open(this.href);
                    } else {
                        window.location.href = this.href;
                    }
                }),
                option = $(document.createElement('option')).appendTo(select).val(this.href).html($(this).html()).click(function() {
                    a.click();
                });
        });

    });

    $(".select_video").on('change', function(e) {
        //$(".tabWrapper li a").removeClass("active");
        //$(this).addClass("active");
        var parentIndex = $(this).prop("selectedIndex");
        $(".bxSliderWrapper").hide();
        $(".bxSliderWrapper:eq(" + parentIndex + ")").show();
        sliders[parentIndex].reloadSlider();
    });



    $('.sb-nav ul li').click(function() {
        var gt_id = $(this).data('id');
        $('.sb-nav ul li').removeClass("active-article")
        $(this).addClass("active-article");
        $(".res-art").removeClass('artact');
        $(gt_id).addClass('artact')
    })
    $('.head').click(function() {
        $(this).next(".content").slideToggle()
            .siblings(".content:visible").slideUp();
        $(this).toggleClass("active");
        $(this).siblings(".head").removeClass("active");
    })
    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    function reposition() {
        var modal = $(this),
            dialog = modal.find('.modal-dialog');
        modal.css('display', 'block');

        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
    }
    // Reposition when a modal is shown
    $('.modal').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
    });

    $("a[href='#myModal']").click(function() {
        $("#myModal").modal('show');

    });
    $('.NewRadio label input').click(function() {
        $('.show-hd').removeClass('actv')
        var fnd_id = $(this).data('id');
        $(fnd_id).addClass('actv');

    })
    $(".closebtn").click(function() {
        $(".lightbx").hide();
        $('.pl-video').empty()
    })
    $(".fr-vdo li a").click(function() {
        var vid_play = $(this).data("path");

        $(".lightbx").show();
        $('.pl-video').append('<iframe src="' + vid_play + '" ></iframe>')

    })

    //loadDropdown();

    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
    }




}); // JavaScript Document


function modifyHeaderWithIrctc(){
    var isIrctc=getQueryVariable('utm_source')==='irctc';
    if(!isIrctc){
        $('.header .logo-irctc').addClass('hidden');
        $('.container_header').addClass('normal-header');
    }else{
        $('.header .logo-irctc').removeClass('hidden');
        $('.header .logo-normal').addClass('hidden');
        $('.container_header').addClass('irctc-header');
    }
}

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
}

function loadDropdown() {

    $(".dropdown span.hida,.multiSel").on('click', function() {
        $(".dropdown dd ul").slideToggle({
            direction: "up"
        }, 300);
    });

    $(".dropdown dd ul li a").on('click', function() {
        $(".dropdown dd ul").hide();
    });
    $('.mutliSelect input[type="checkbox"]').on('click', function() {

        var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
            title = $(this).val() + ",";

        if ($(this).is(':checked')) {
            var html = '<span title="' + title + '">' + title + '</span>';
            $('.multiSel').show();
            $('.multiSel').append(html);
            $(".hida").hide();
        } else {
            $('span[title="' + title + '"]').remove();
            var ret = $(".hida");
            $('.dropdown dt a').append(ret);

        }
    });

}
