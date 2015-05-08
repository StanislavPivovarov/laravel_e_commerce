$(document).ready(function(){
    var $_token = $('#token').val();

    $('#change').on('click',function(){
        $('#errormessage').empty().hide(1000);
        $('#change_form').toggle(2000,function(){
            if ($('#change_form').is(':visible')) {
                $('#change').text('Hide Form!!');
            } else {
                $('#change').text('Update Product!');
            }
        });
    });
    $('.make_general_photo').on('click',function(){
       var photoId = ($(this).next().children().data('photo_id'));
       var productId = ($(this).data('product_id'));
       var button = $(this);

        var request = $.ajax({
            url: "./../make-general-photo",
            method: "POST",
            headers: { 'X-XSRF-TOKEN' : $_token },
            data: { photoId : photoId, productId : productId }
        });
        request.done(function(data) {

            $('.general_photo').parent().prev().removeClass('first');
            $('.general_photo').addClass('secondary_photos').removeClass('general_photo');
            button.addClass('first').next('a').children().addClass('general_photo');
        });
        request.fail(function() {
           alert("Не получается изменить фото, попробуйте сделать это позже");
        });
    });

            //Send Form Update product
    var options = {
        success: function (data) {
            window.location.replace(data.redirect);
        },
        error: function (data) {
            $('#errormessage').fadeIn("slow").empty();

            var responseText = data.responseText;
            var feedback = JSON.parse(responseText);

            for(var property in feedback){
                $('#errormessage').append('<p>' + feedback[property] + '</p>').addClass('alert alert-danger');
            }
        }
    };

        $('#products_update').ajaxForm(options);
});