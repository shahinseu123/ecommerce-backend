 // editor end 
 $(document).on('click', '.croxx_btn', () => {
    $('.child_modal').addClass('hidden')
    $('.overlay').addClass('hidden')
    $('html, body').css({
        overflow: '',
        height: '100%'
    })
})
$(document).on('click', '.click_post_btn', () => {
    $('.child_modal').removeClass('hidden')
    $('.overlay').removeClass('hidden')
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    })
})

$(document).on('click', '.btn-select-image', function(){
    $('html, body').css({
        overflow: '',
        height: '100%'
    })
})

$(document).on('click', '.click_recent_page', function() {
    $('.show_all_page').addClass('hidden')
    $('.show_recent_page').removeClass('hidden')
    $('.click_recent_page').addClass('border-blue-500 text-blue-500')
    $('.click_all_page').removeClass('border-blue-500 text-blue-500')
})
$(document).on('click', '.click_all_page', function() {
    $('.show_all_page').removeClass('hidden')
    $('.show_recent_page').addClass('hidden')
    $('.click_all_page').addClass('border-blue-500 text-blue-500')
    $('.click_recent_page').removeClass('border-blue-500 text-blue-500')
})
//end model
function getDataByAjwx() {
    $.ajax({
        url: "{{ route('backend.media.ajex') }}",
        success: (response) => {
            let html = ''
            response.forEach(element => {
                html += '<div class="check_and_img  relative">'
                html += '<input type="checkbox" id="media_image_box" data-id="' + element.id +
                    '" value="' + element.media_image +
                    '" class="subject-list absolute inset-0.5 form-checkbox h-5 w-5 text-yellow-600 media_image_box">'
                html +=
                    '<span class=" media_image_all"><img class=" image_uploaded w-full h-28 object-cover" src="/uploads/media/' +
                    element.media_image + '" alt="Media iamge"><span>'
                html += '</div>'
            });
            $('.image_main_div').html(html)
        }
    })
}
getDataByAjwx()
// end
//click image
$(document).on('click', '.media_image_all', function() {
    $('.media_image_box').prop('checked', false);
    $('.image_uploaded').removeClass('border-4 border-blue-400')
    $(this).closest('div').find('.image_uploaded').addClass('border-4 border-blue-400')
    $(this).closest('div').find('.media_image_box').prop('checked', true)
})
//checkbox click
$(document).on('change', '.media_image_box', function() {
    $('.media_image_box').not(this).prop('checked', false);
});
// end
$(document).on('click', '.set_featured_image_btn', (event) => {
    $('.child_modal').addClass('hidden')
    $('.overlay').addClass('hidden')
    var searchIDs = $('#media_image_box:checked').map(function() {
        return $(this).val();
    });
    var image_id = searchIDs.get().toString();
    $('#news_img').val(image_id)
    $('#category-img-tag').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
});

Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 5, // MB
    init: function() {
        this.on("success", function(file) {
            $('.show_all_page').removeClass('hidden')
            $('.show_recent_page').addClass('hidden')
            $('.click_all_page').addClass('border-blue-500 text-blue-500')
            $('.click_recent_page').removeClass('border-blue-500 text-blue-500')
            getDataByAjwx()
            setTimeout(() => {
                $('#media_image_box').prop("checked", true)
            }, 500)
        });
    }
};