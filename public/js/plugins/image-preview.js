$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.input-preview').addClass('hidden');
    $('.img-preview').css('cursor', 'pointer');
    $('.img-preview').css('height', '80px');
    $('.img-preview').attr('src', '/images/upload.png');

    $('.img-preview').click(function(){
        let index = $(this).data('index') ? $(this).data('index') : '';
        $(`#input-preview${index}`).trigger('click');
    });
    
    $(".input-preview").change(function() {
        let index = $(this).data('index') ? $(this).data('index') : '';
        readURL(this, index);
    });
    
    function readURL(input, index) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $(`#img-preview${index}`).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
});