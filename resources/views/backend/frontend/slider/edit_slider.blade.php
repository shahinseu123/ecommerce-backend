@extends('backend.layout.master')

@section('title')
    <title>Slider</title>
@endsection

@section('content')
    <section>

        <div class="">
            @include('backend.inc.media_modal')
        </div>
        <h1 class="text-4xl font-semibold text-gray-600 mb-5">Edit Slider</h1>
        @if ($slider)
        <form action="{{route("slider.update")}}" method="post">
            @csrf
            <div class="shadow-lg p-4 rounded bg-white">
               <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                    <div>
                        <input type="hidden" name="id" id="id" value="{{$slider->id}}"> 
                        <label for="slider_text_1">Text 1 <span class="text-red-500">*</span></label>
                        <div>
                            <input type="text" required name="slider_text_1" value="{{$slider->slider_text_1}}" id="slider-text-1" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                        @error('slider_text_1')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="slider_text_2">Text 2</label>
                        <div>
                            <input type="text" name="slider_text_2" value="{{$slider->slider_text_2}}" id="slider-text-2" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
                    <div>
                        <label for="slider_text_3">Text 3</label>
                        <div>
                            <input type="text" name="slider_text_3" value="{{$slider->slider_text_3}}" id="slider-text-1" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
               </div>
               <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="btn_text_1">Button 1 text</label>
                    <div>
                        <input type="text" name="btn_text_1" value="{{$slider->btn_text_1}}" id="btn_text_1" class="mt-2 input-border w-full rounded px-2 py-2">
                    </div>
                </div>
                <div>
                    <label for="btn_url_1">Button 1 url</label>
                    <div>
                        <input type="text" name="btn_url_1" value="{{$slider->btn_url_1}}" id="btn_url_1" class="mt-2 input-border w-full rounded px-2 py-2">
                    </div>
                </div>
               </div>    
               <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="btn_text_2">Button 2 text</label>
                        <div>
                            <input type="text" name="btn_text_2" value="{{$slider->btn_text_2}}" id="btn_text_2" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
                    <div>
                        <label for="btn_url_2">Button 2 url</label>
                        <div>
                            <input type="text" name="btn_url_2" value="{{$slider->btn_url_2}}" id="btn_url_2" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
               </div> 
               <div class="mt-4">
                   <label for="slider_description">Slider description</label>
                   <textarea name="slider_description" class="mt-2 input-border w-full rounded px-2 py-2" id="editor" cols="30" rows="10">{{$slider->slider_description}}</textarea>   
               </div>
               <div class=" sssss-nav pb-4 click_post_btn cursor-pointer w-60 mt-4">
                <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Slider image <span class="text-red-500">*</span></h1>
                <div class="w-full sssss">
                    <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                        src="{{$slider->img_path}}"
                        alt="img">
                    <input type="hidden" value="" name="slider_image" id="news_img" readonly>
                    @error('slider_image')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
               </div>
               <div class="border-t-2 border-gray-300">
                <button class="w-32 py-2 text-white  btn_secondary rounded shadow-lg mt-3 m"
                    type="submit">UPDATE</button>
                <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
            </div>
        </form>
        @endif
        </div>
        
    </section>
@endsection

@section('head')
    
@endsection

@section('script')
   <script src="{{asset("js/slider/slider.js")}}"></script>
   <script>
      
      
       //end delete slider
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
        });
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

  
   </script> 
@endsection