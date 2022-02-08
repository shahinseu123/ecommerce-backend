@extends('backend.layout.master')

@section('title')
    <title>General Settings</title>
@endsection

@section('content')
    <section>
        @include('backend.inc.media_modal')
        <div class="lg:flex xl:flex gap-5">
            <div class="w-full lg:w-1/4">
                <div class=" border-2 border-gray-300 shadow-lg">
                    <ul class="bg-white">
                        <li class="btn-webinfo bg-gray-200 cursor-pointer py-2 border-b-2 border-gray-300"><span
                                class="ml-4">Web info</span> </li>
                        <li class="btn-logo cursor-pointer py-2 border-b-2 border-gray-300"><span class="ml-4">Logo
                                & favicons</span>
                        </li>
                        <li class="btn-currency cursor-pointer py-2 border-b-2 border-gray-300"><span
                                class="ml-4">Shop</span> </li>
                        <li class="btn-seo cursor-pointer py-2 "><span class="ml-4">SEO</span></li>
                    </ul>
                </div>
            </div>
            <div class="w-full lg:w-3/4" style="max-width: 600px">
                <form action="{{ route('general-settings.update') }}" method="post">
                    @csrf
                    <div class="web-info-div p-4 bg-white shadow-lg">

                        <div class="">
                            <label for="website_title">Website Title <span class="text-red-500">*</span></label>
                            <div>
                                <input type="text" name="website_title" required id="website_title" value=""
                                    class=" input-border rounded px-2 py-2 w-full mt-2">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="website_slogan">Slogan*: <span class="text-red-500">*</span></label>
                            <div>
                                <input type="text" name="website_slogan" required value="White North Inc"
                                    id="website_slogan" class=" input-border rounded px-2 py-2 w-full mt-2">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="website_email">Email Address* <span class="text-red-500">*</span></label>
                            <div>
                                <input type="email" name="website_email" required value="admin@me.com" id="website_email"
                                    class=" input-border rounded px-2 py-2 w-full mt-2">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="website_tel">Tel* <span class="text-red-500">*</span></label>
                            <div>
                                <input type="number" name="website_tel" required value="012000000000" id="website_tel"
                                    class=" input-border rounded px-2 py-2 w-full mt-2">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="website_copyright">Email Address* <span class="text-red-500">*</span></label>
                            <div>
                                <input type="text" name="website_copyright" required value="Copyright 2021"
                                    id="website_copyright" class=" input-border rounded px-2 py-2 w-full mt-2">
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-3 gap-3">
                                <div>
                                    <label for="city">City* <span class="text-red-500">*</span></label>
                                    <div>
                                        <input type="text" name="city" required value="{{ old('city') }}" id="city"
                                            class=" input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                                <div>
                                    <label for="state">State* <span class="text-red-500">*</span></label>
                                    <div>
                                        <input type="text" name="state" required value="" id="state"
                                            class=" input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                                <div>
                                    <label for="country">Country* <span class="text-red-500">*</span></label>
                                    <div>
                                        <input type="text" name="country" required value="" id="country"
                                            class=" input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-3">
                                <div class="w-1/3">
                                    <label for="zip">Zip* <span class="text-red-500">*</span></label>
                                    <div>
                                        <input type="text" name="zip" required value="" id="zip"
                                            class=" input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                                <div class="w-2/3">
                                    <label for="street">Street* <span class="text-red-500">*</span></label>
                                    <div>
                                        <input type="text" name="street" required value="" id="street"
                                            class=" input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- logo --}}
                    <div class="div-logo hidden">
                        <div class="bg-white shadow-lg rounded p-4 ">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="mb-2">
                                    <div class="w-full sssss-nav pb-4 click_post_btn btnn-logo cursor-pointer">
                                        <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Logo
                                        </h1>
                                        <div class="w-full sssss-1">
                                            <img class="w-full object-cover h-32 cursor-pointer" id="logo-img-tag"
                                                src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                                alt="img">
                                            <input type="hidden" value="" name="logo_image" id="logo-img" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="w-full sssss-nav pb-4 click_post_btn btnn-fav cursor-pointer">
                                        <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Favicon
                                        </h1>
                                        <div class="w-full sssss-2">
                                            <label for="fav-img">
                                                <img class="w-full object-cover h-32 cursor-pointer" id="fav-img-tag"
                                                    src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                                    alt="img">
                                            </label>
                                            <input type="hidden" value="" name="favicon" id="fav-img">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="w-full sssss-nav pb-4 click_post_btn btnn-og cursor-pointer">
                                        <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">OG image
                                        </h1>
                                        <div class="w-full sssss">
                                            <label for="og-img">
                                                <img class="w-full object-cover h-32 cursor-pointer" id="og-img-tag"
                                                    src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                                    alt="img">
                                            </label>
                                            <input type="hidden" value="" name="og_image" id="og-img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- tax --}}
                    <div class="div-currency hidden">
                        <div class="bg-white shadow-lg rounded p-4 ">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="tax">Tax </label>
                                    <div>
                                        <input type="text" name="tax" value="" id="tax"
                                            class="input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                                <div>
                                    <label for="tax_type">Currency ></label>
                                    <div>
                                        <select name="tax_type" id="tax_type"
                                            class="input-border rounded px-2 py-2 w-full mt-2">
                                            <option value="fixed">Fixed</option>
                                            <option value="percend">Percend</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label for="currency">Currency name</label>
                                    <div>
                                        <input type="text" name="currency" value="" id="currency"
                                            class="input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                                <div>
                                    <label for="currency_symbol">Currency symbol</label>
                                    <div>
                                        <input type="text" name="currency_symbol" value="" id="currency_symbol"
                                            class="input-border rounded px-2 py-2 w-full mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="div-seo hidden">
                        <div class="bg-white shadow-lg rounded p-4 ">
                            <div>
                                <label for="meta_description">Meta Description</label>
                                <div>
                                    <input type="text" name="meta_description" value="" id="meta_description"
                                        class="input-border rounded px-2 py-2 w-full mt-2">
                                </div>
                                <label for="keyword">Keywords</label>
                                <div>
                                    <input type="text" name="keyword" value="" id="keyword"
                                        class="input-border rounded px-2 py-2 w-full mt-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t-2 border-gray-300 bg-white shadow-lg py-3 px-3">
                        <button class="px-10 py-2 text-white  btn_secondary rounded shadow-lg mt-3 m"
                            type="submit">UPDATE</button>
                        <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('head')
    <style>
        input[type="file"] {
            display: none;
        }

    </style>
@endsection

@section('script')
    <script>
        $(document).on('click', '.btn-webinfo', function() {
            $('.web-info-div').removeClass("hidden")
            $(this).addClass("bg-gray-200")
            $(".btn-logo").removeClass("bg-gray-200")
            $('.div-logo').addClass('hidden')
            $(".div-seo").addClass("hidden")
            $(".div-currency").addClass("hidden")
        })
        //logo
        $(document).on('click', '.btn-logo', function() {
            $('.div-logo').removeClass('hidden')
            $('.web-info-div').addClass("hidden")
            $(".div-seo").addClass("hidden")
            $('.btn-webinfo').removeClass("bg-gray-200")
            $('.btn-currency').removeClass("bg-gray-200")
            $('.btn-seo').removeClass("bg-gray-200")
            $(this).addClass("bg-gray-200")
            $(".div-currency").addClass("hidden")
        })
        $(document).on('click', '.btn-currency', function() {
            $(".div-currency").removeClass("hidden")
            $('.div-logo').addClass('hidden')
            $('.web-info-div').addClass("hidden")
            $(".div-seo").addClass("hidden")
            $(this).addClass("bg-gray-200")
            $(".btn-logo").removeClass("bg-gray-200")
            $(".btn-webinfo").removeClass("bg-gray-200")
            $(".btn-seo").removeClass("bg-gray-200")
        })
        $(document).on('click', '.btn-seo', function() {
            $(".div-seo").removeClass("hidden")
            $('.div-logo').addClass('hidden')
            $('.web-info-div').addClass("hidden")
            $(".div-currency").addClass("hidden")
            $(this).addClass("bg-gray-200")
            $(".btn-logo").removeClass("bg-gray-200")
            $(".btn-webinfo").removeClass("bg-gray-200")
            $(".btn-currency").removeClass("bg-gray-200")
        })
        //image
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#logo-img-tag').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        // $("#logo-img").change(function() {
        //     readURL(this);
        // });
        // //fav
        // function readURL_2(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#fav-img-tag').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        // $("#fav-img").change(function() {
        //     readURL_2(this);
        // });
        // // og
        // function readURL_3(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#og-img-tag').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        // $("#og-img").change(function() {
        //     readURL_3(this);
        // });
        $(document).on('click', '.croxx_btn', () => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            $('html, body').css({
                overflow: '',
                height: '100%'
            })
        })
        $(document).on('click', '.btnn-logo', () => {
            $('.btn-select-image').removeClass('set-fav set-og').addClass('set-logo')
            $('.child_modal').removeClass('hidden')
            $('.overlay').removeClass('hidden')
            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            })
        })
        $(document).on('click', '.btnn-fav', () => {
            $('.btn-select-image').removeClass('set-logo set-og').addClass('set-fav')
            $('.child_modal').removeClass('hidden')
            $('.overlay').removeClass('hidden')
            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            })
        })
        $(document).on('click', '.btnn-og', () => {
            $('.btn-select-image').removeClass('set-logo set-fav').addClass('set-og')
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
        $(document).on('click', '.set-logo', (event) => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            var searchIDs = $('#media_image_box:checked').map(function() {
                return $(this).val();
            });
            var image_id = searchIDs.get().toString();
            $('#logo-img').val(image_id)
            $('#logo-img-tag').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
        });
        $(document).on('click', '.set-fav', (event) => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            var searchIDs = $('#media_image_box:checked').map(function() {
                return $(this).val();
            });
            var image_id = searchIDs.get().toString();
            $('#fav-img').val(image_id)
            $('#fav-img-tag').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
        });
        $(document).on('click', '.set-og', (event) => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            var searchIDs = $('#media_image_box:checked').map(function() {
                return $(this).val();
            });
            var image_id = searchIDs.get().toString();
            $('#og-img').val(image_id)
            $('#og-img-tag').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
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
