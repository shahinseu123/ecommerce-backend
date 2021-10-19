@extends('backend.layout.master')

@section('title')
    <title>Parallax</title>
@endsection

@section('content')
    <section>
        @include('backend.inc.media_modal')
        <h1 class="py-2 font-semibold text-3xl text-gray-600 uppercase">add parallax</h1>
        <form action="{{ route('backend.parallax.create') }}" method="post">
            @csrf
            <div class="lg:flex xl:flex gap-4 mt-3">
                <div class="lg:w-2/3 xl:w-2/3">
                    <div class="bg-white shadow-lg rounded p-4">
                        <div class="mb-4">
                            <label for="parallax_title" class="font-semibold">Title <span
                                    class="text-red-500">*</span></label>
                            <input class="input-border rounded px-2 py-2 w-full mt-2" type="text" name="parallax_title"
                                id="parallax_title" required value="{{ old('parallax_title') }}">
                            @error('parallax_title')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="font-semibold">Description<span
                                    class="text-red-500">*</span></label>
                            <textarea class="input-border rounded px-2 py-2 w-full" style="margin-top: 10px;z-index: -1"
                                name="description" id="editor" cols="30" rows="5"></textarea>
                            @error('description')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 xl:w-1/3">
                    <div class="bg-white shadow-lg rounded p-4 mb-4">
                        <div class="w-full sssss-nav pb-4 click_post_btn cursor-pointer">
                            <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Parallax Image</h1>
                            <div class="w-full sssss">
                                <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                                    src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                    alt="img">
                                <input type="hidden" value="" name="parallax_image" id="news_img" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded p-4">
                        <div class=" border-gray-300">
                            <div class="mb-4">
                                <label for="parallax_position" class="font-semibold">Position <span
                                        class="text-red-500">*</span></label>
                                <input class="input-border rounded px-2 py-2 w-full mt-2" type="number"
                                    name="parallax_position" id="parallax_position" required
                                    value="{{ old('parallax_position') }}">
                                @error('parallax_position')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="w-full py-2 text-white  btn_secondary rounded shadow-lg mt-3 m"
                                type="submit">CREATE</button>
                            <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                        </div>
                    </div>
                </div>
        </form>
    </section>
@endsection

@section('head')
    <style>
        .ck-blurred {
            min-height: 300px;
        }

    </style>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

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

        $(document).on('click', '.btn-select-image', function() {
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
