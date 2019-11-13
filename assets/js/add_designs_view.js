$(() => {
    $('#category').on('change', (e) => {
        mid = $(e.target).val();
        $.ajax({
            url: baseUrl + 'vendor/fetch_type',
            dataType: 'json',
            type: 'POST',
            data: {mid: mid},
            success: (data) => {
                $('#type').empty();
                $('#type').append('<option value="">Select</option>');
                for (i = 0; i < data.length; i++) {
                    $('#type').append('<option value="' + data[i].mtitle + '">' + data[i].mtitle + '</option>');
                }
            },
            error: () => {
                alert('An error occured. Please reload the page and try again.');
            }
        });
    });
    $('.numbers-only').on('keypress', (evt) => {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    });

    $(".fileupload").on('change', (evt) => {
        if (typeof (FileReader) != "undefined") {
            var image_holder = $(evt.target).prev();
            image_holder.empty();
            var reader = new FileReader();
            reader.onload = (e) => {
                $("<img/>", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL(evt.target.files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
    $('.remove-btn').on('click', (e) => {
        $(e.target).parent().find('.image-holder').hide();
    });
    
	//CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
	$( '[data-rel^="ckeditor"]' ).ckeditor();
	$( '#imageTable tbody' ).sortable({
		placeholder: "warning",
		helper: function(e, ui) {
			ui.children().each(function() {
				$(this).width($(this).width());
				$(this).css('background','rgba(255,255,255,.6)');
			});
			return ui;
		},
		stop: function(e, ui) {
			$( '#imageTable tbody' ).children().each(function() {
				var object=$(this);
				object.children('.pointer').html(object.index()+1);
			});

		}
    }).disableSelection();
})