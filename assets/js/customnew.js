$(() => {
    $('.nextstep').click(function (e) {
        $('#uls').show();
        e.preventDefault();
        var blah = $('.nextstep').attr('alt');
        if (blah == 'blah') {
            var upload_desc = $('#upload_desc').val();
            if (upload_desc.length < 2) {
                $.confirm({
                    title: 'Alert',
                    content: 'Description is Required',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    closeAnimation: 'scale',
                    opacity: 0.5,
                    buttons: {
                        'confirm': {
                            text: 'Ok',
                            btnClass: 'btn-info',
                            action: function () {
                                $('#input1').val('');
                            }
                        },

                    }

                });
                return false;
            } else {
                var upload_desc = $('#upload_desc').val();
                $('#upload_desc2').html(upload_desc);
            }
        }
        console.log('step' + parseInt($(this).attr('href')))
        var step = parseInt($(this).attr('href')) + 1;
        var final = $('#totattr').val();
        $('.nextstep').attr('disabled', 'disabled');

        if (step == 0) {
            $('.prevstep').css('display', 'none');
            var step = parseInt($(this).attr('href')) + 2;
        }
        if (step == 1) {
            $('.prevstep').attr('disabled', 'disabled');
        }


        if (step > 0 && step < 2) {
            $('#uls').show();
        }
        else {
            $('#uls').hide();
        }

        if (step > final) {
            $('#uls').hide();
            if ($('#blah').attr('src') != '#') {
                $('#dyna').hide();
                $('#thumb2').show();
                $('#Tab2').css('display', 'none');
            }

            else if ($('#thumb2').text().length > 50) {
                $('#dyna').hide();
                $('#thumb2').show();
            } else {
                $('#dyna').show();
                $('#thumb2').hide();
            }
            $('#finalprev').show();
            $('#dyna_heading').hide();
            $('#simple_text').hide();

            $('#uls').hide();
            $('#design').hide();
            $('.nextstep').hide();
            $('.prevstep').attr('href', step);
            $('.measur').css('display', 'block');
            $('#Tab1').addClass('active');
            $('#Tab3').removeClass('active');
            $('#Tab14').addClass('active');
            $('#Tab5').removeClass('active');
            $('#Tab6').removeClass('active');
            return false;
        } else {
            $('#finalprev').hide();
            $('#dyna_heading').show();
            $('#design').show();
            $('.prevstep').removeAttr('disabled');
            $('.prevstep').css('display', 'inline');
            //$('#uls').show();
        }
        $('#design').html('<img style="margin-top:100px;" src="' + baseUrl + 'assets/images/01-progress.gif">');
        $(this).attr('href', step);
        $('.prevstep').attr('href', step);

        var cid = $('#nid').val();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'index.php/Welcome/show_fabric',
            data: { cid: cid, step: step },
            success: function (response) {
                $('#design').html(response);
                //console.log(response);
                //$('#design').html(response);
            },
            error: function (response) {
                alert('fail');
                //console.log(response);
            }
        });
    });

    $('.upload-design .btn-success').on('click', (e) => {
        $(e.target).next().click();
    })
    $('.upload-design input').on('change', (e) => {
        if (e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = (evt) => {
                view = $(e.target).prev().attr('data-view');
                $(e.target).next().attr('src', evt.target.result).next().removeClass('d-none');
                $(e.target).prev().text(view + ' - ' + e.target.files[0].name);
            }
            reader.readAsDataURL(e.target.files[0]);
        } else {
            $.confirm({
                title: 'Alert',
                content: 'An error occured, try again',
                icon: 'fa fa-question-circle',
                animation: 'scale',
                closeAnimation: 'scale',
                opacity: 0.5,
                buttons: {
                    'confirm': {
                        text: 'Ok',
                        btnClass: 'btn-info',
                        action: () => { }
                    },
                }
            });
        }
    })
    $('.upload-design .btn-danger').on('click', (e) => {
        view = $(e.target).siblings('span').attr('data-view');
        $(e.target).prev().attr('src', '');
        $(e.target).siblings('span').text('Add ' + view.toLowerCase() + ' side view of your design');
        $(e.target).addClass('d-none');
    })
})