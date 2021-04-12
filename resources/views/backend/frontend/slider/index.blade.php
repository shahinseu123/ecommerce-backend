@extends('backend.layout.master')

@section('title')
    <title>Slider</title>
@endsection

@section('content')
    <section>
        <div class="">
            @include('backend.inc.media_modal')
        </div>
        <h1 class="text-4xl font-semibold text-gray-600 mb-5">Slider</h1>
        <form action="{{route("slider.create")}}" method="post">
            @csrf
            <div class="shadow-lg p-4 rounded bg-white">
               <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                    <div>
                        <label for="slider_text_1">Text 1 <span class="text-red-500">*</span></label>
                        <div>
                            <input type="text" required name="slider_text_1" value="{{old("slider_text_1")}}" id="slider-text-1" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                        @error('slider_text_1')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="slider_text_2">Text 2</label>
                        <div>
                            <input type="text" name="slider_text_2" value="{{old("slider_text_2")}}" id="slider-text-2" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
                    <div>
                        <label for="slider_text_3">Text 3</label>
                        <div>
                            <input type="text" name="slider_text_3" value="{{old("slider_text_3")}}" id="slider-text-1" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
               </div>
               <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="btn_text_1">Button 1 text</label>
                    <div>
                        <input type="text" name="btn_text_1" value="{{old("btn_text_1")}}" id="btn_text_1" class="mt-2 input-border w-full rounded px-2 py-2">
                    </div>
                </div>
                <div>
                    <label for="btn_url_1">Button 1 url</label>
                    <div>
                        <input type="text" name="btn_url_1" value="{{old("btn_url_1")}}" id="btn_url_1" class="mt-2 input-border w-full rounded px-2 py-2">
                    </div>
                </div>
               </div>    
               <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="btn_text_2">Button 2 text</label>
                        <div>
                            <input type="text" name="btn_text_2" value="{{old("btn_text_2")}}" id="btn_text_2" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
                    <div>
                        <label for="btn_url_2">Button 2 url</label>
                        <div>
                            <input type="text" name="btn_url_2" value="{{old("btn_url_2")}}" id="btn_url_2" class="mt-2 input-border w-full rounded px-2 py-2">
                        </div>
                    </div>
               </div> 
               <div class="mt-4">
                   <label for="slider_description">Slider description</label>
                   <textarea name="slider_description" class="mt-2 input-border w-full rounded px-2 py-2" id="editor" cols="30" rows="10"></textarea>   
               </div>
               <div class=" sssss-nav pb-4 click_post_btn cursor-pointer w-60 mt-4">
                <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Slider image <span class="text-red-500">*</span></h1>
                <div class="w-full sssss">
                    <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                        src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                        alt="img">
                    <input type="hidden" value="" name="slider_image" id="news_img" readonly>
                    @error('slider_image')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
               </div>
               <div class="border-t-2 border-gray-300">
                <button class="w-32 py-2 text-white  btn_secondary rounded shadow-lg mt-3 m"
                    type="submit">CREATE</button>
                <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
            </div>
        </form>
        </div>
        <div class="lg:flex xl:flex mt-5 gap-4">
            <div class="w-full lg:w-2/3 xl:w-2/3">
                <div class="shadow-lg p-4 rounded bg-white">
                    
                    <div class="carousel relative shadow-2xl bg-white">
                        <div class="carousel-inner relative overflow-hidden w-full">
                                        @if ($slider)
                                           @foreach($slider as $item)
                                    <!--Slide 1-->
                                        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                                            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                                                <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">
                                                    <img src="{{$item->img_path}}" alt="Image">
                                                </div>
                                            </div>
                                            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                                            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                                        <!-- Add additional indicators for each slide-->
                                        @endforeach
                                        @endif 
                                        <ol class="carousel-indicators">
                                            @if ($slider)
                                                @foreach($slider as $item)
                                                    <li class="inline-block mr-3">
                                                        <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                                                    </li>
                                                @endforeach
                                           @endif 
                                        </ol>
                                        
                                    </div>
                                </div>
                        
                        
                    </div>
                </div>
            <div class="w-full lg:w-1/3 xl:w-1/3">
                <div class="shadow-lg p-4 rounded bg-white">
                   <ul class="p-2">
                       @if ($slider)
                           @foreach($slider as $item)
                                <li class="bg-gray-200 mb-2">
                                    <div class="flex justify-between">
                                        <div>
                                            <img class="w-32 h-24 object-cover" src="{{$item->img_path}}" alt="">
                                        </div>
                                        <div class="m-2">
                                           <a href="{{route("slider.edit", $item->id)}}"><i data-id={{$item->id}} class="fas edit-slider-item fa-edit text-lg cursor-pointer"></i></a> 
                                            <i data-id={{$item->id}} class="fas delete-slider-item fa-trash text-red-500 ml-2 text-lg cursor-pointer"></i>
                                        </div>
                                    </div>
                                </li>
                           @endforeach
                       @endif
                   </ul>
                </div>
            </div>  
        </div>
    </section>
@endsection

@section('head')
    <style>
			.carousel-open:checked + .carousel-item {
				position: static;
				opacity: 100;
			}
			.carousel-item {
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}
			#carousel-1:checked ~ .control-1,
			#carousel-2:checked ~ .control-2,
			#carousel-3:checked ~ .control-3 {
				display: block;
			}
			.carousel-indicators {
				list-style: none;
				margin: 0;
				padding: 0;
				position: absolute;
				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}
			#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
			#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
			#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
				color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
			}
		
    </style>
@endsection

@section('script')
   <script src="{{asset("js/slider/slider.js")}}"></script>
   <script>
       //delete slider
       $(document).on('click', '.delete-slider-item', function(){
         let item_id = $(this).attr('data-id')
         $.ajax({
             url: "{{route('slider.delete')}}",
             method: 'GET',
             data: {item_id},
             success: (response) => {
                location.reload();
             }
         })
       })
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