@extends('backend.layout.master')

@section('title')

@endsection

@section('content')
    <section class="overflow-y-auto">
        @include('backend.inc.media_modal')
        <h1 class="py-2 font-semibold text-3xl text-gray-600 uppercase">add product</h1>
        <form action="{{ route('product.create') }}" method="post">
            @csrf
            <div class="lg:flex xl:flex gap-4 mt-3">
                <div class="lg:w-2/3 xl:w-2/3">
                    <div class="bg-white shadow-lg rounded p-4">
                        <div class="mb-4">
                            <label for="product_title" class="font-semibold">Product title <span
                                    class="text-red-500">*</span></label>
                            <input class="input-border rounded px-2 py-2 w-full mt-2" type="text" name="product_title"
                                id="product_title" required value="{{ old('product_title') }}">
                            @error('product_title')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="short_description" class="font-semibold">Short description</label>
                            <textarea class="input-border rounded px-2 py-2 w-full mt-2" name="short_description"
                                id="short_description" cols="30" rows="10"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="font-semibold">Description<span
                                    class="text-red-500">*</span></label>
                            <textarea class="input-border rounded px-2 py-2 w-full" style="margin-top: 10px;z-index: -1"
                                name="description" id="editor" cols="30" rows="5"></textarea>
                            @error('description')
                                <div class="text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-1/3">
                            <div class="shadow-lg p-4 bg-white mt-4">
                                <h2 class="font-semibold border-bottom py-2">Product type <span
                                        class="text-red-500">*</span></h2>
                                <div>
                                    <select name="product_type"
                                        class="input-border select_product_type px-2 py-2 rounded w-full mt-4"
                                        id="product_type" class="input-border">
                                        <option value="simple" selected>Simple</option>
                                        <option value="variable">Variable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 shadow-lg p-4 bg-white hidden select-attribute">
                                <label for="product_attribute">Product attributes</label>
                                <select class="mt-4 mb-4" name="product_attribute" id="ex-search-attr">
                                    <option selected value="">Select Attribute</option>
                                    @if ($attributes)
                                        @foreach ($attributes as $item)
                                            <option class="selected-option" value="{{ $item['attr_name'] }}">
                                                {{ $item['attr_name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span
                                    class="cursor-pointer btn-select-attr block text-center w-full py-2  text-white btn_secondary rounded shadow-lg mt-3 m">SELECT</span>
                            </div>
                            <div class="shadow-lg p-4 bg-white mt-4">
                                <h2 class="font-semibold border-bottom py-2">Stoct alert <span
                                        class="text-red-500">*</span>
                                </h2>
                                <div class="mt-2">
                                    <label for="stock_alert_qnty">Stock alert quantity</label>
                                    <input class="input-border rounded px-2 py-2 w-full mt-2" type="number"
                                        name="stock_alert_qnty" id="stock_alert_qnty" required
                                        value="{{ old('stock_alert_qnty') }}">
                                    @error('stock_alert_qnty')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label for="stock_pre_alert_qnty">Stock pre-alert quantity</label>
                                    <input class="input-border rounded px-2 py-2 w-full mt-2" type="number"
                                        name="stock_pre_alert_qnty" id="stock_pre_alert_qnty" required
                                        value="{{ old('stock_pre_alert_qnty') }}">
                                    @error('stock_pre_alert_qnty')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="w-2/3 ">
                            <div class="bg-white shadow-lg p-4 mt-4 add_variation_items hidden">
                                <h1 class="text-lg font-semibold mb-4 pb-3 border-bottom">Variation Items</h1>
                                <div class="add_variation">

                                </div>
                            </div>

                            <div class="shadow-lg p-4 bg-white mt-4">
                                <h1 class="py-2 font-semibold border-bottom">Product data</h1>
                                <div class="variable_product_data">

                                </div>
                                <div class="simple_product_data">
                                    <div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="mt-2">
                                                <label for="regular_price">Regular price</label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_regular_price') }}" name="_regular_price">
                                            </div>
                                            <div class="mt-2">
                                                <label for="sale_price">Sale price <span
                                                        class="text-red-500">*</span></label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_sale_price') }}" name="_sale_price">
                                                @error('_sale_price')
                                                    <div class="text-red-600">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-2">
                                                <label for="sku">SKU</label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_sku') }}" name="_sku">
                                                @error('_sku')
                                                    <div class="text-red-600">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="mt-2">
                                                <label for="shipping_weight">Shipping width(cm)</label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_shipping_weight') }}" name="_shipping_weight">
                                            </div>
                                            <div class="mt-2">
                                                <label for="shipping_height">Shipping height(cm) </label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_shipping_height') }}" name="_shipping_height">
                                            </div>
                                            <div class="mt-2">
                                                <label for="shipping_lenght">Shipping length(cm)</label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_shipping_lenght') }}" name="_shipping_lenght">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="mt-2">
                                                <label for="rack_number">Rack number</label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="{{ old('_rack_number') }}" name="_rack_number">
                                            </div>
                                            <div class="mt-2">
                                                <label for="unit">Unit <span class="text-red-500">*</span></label>
                                                <select name="_unit" class="mt-2 input-border w-full rounded px-2 py-2">
                                                    <option value="pcs" selected>PCS</option>
                                                    <option value="g">G</option>
                                                    <option value="ml">ML</option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <label for="unit_amount">Unit amount <span>*</span></label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="1" name="_unit_amount">
                                            </div>
                                            <div class="">
                                                <label for="
                                                _stock">Stock <span>*</span></label>
                                                <input type="number" class="mt-2 input-border w-full rounded px-2 py-2"
                                                    value="1" name="_stock">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 xl:w-1/3">
                    <div class="bg-white shadow-lg rounded p-4">
                        <h1 class="py-2 font-semibold border-bottom">Additional info</h1>
                        <div>
                            <div class="mt-2">
                                <label for="product_category">Product category <span
                                        class="text-red-500">*</span></label><br>
                                <select class="mt-4" name="product_category[]" id="ex-search" multiple>

                                    @if ($categories)
                                        @foreach ($categories as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['category_title'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('product_category')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label for="product_brand">Product brand</label>
                                <select class="mt-4" name="product_brand[]" id="ex-search-brand" multiple>
                                    {{-- <option value="">Select brand</option> --}}
                                    @if ($brands)
                                        @foreach ($brands as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['brand_title'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('product_brand')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="bg-white shadow-lg rounded p-4 mt-4">
                        <div class="w-full sssss-nav pb-4 click_post_btn cursor-pointer">
                            <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Featured image</h1>
                            <div class="w-full sssss">
                                <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                                    src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                    alt="img">
                                <input type="hidden" value="" name="product_image" id="news_img" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded p-4 mt-4">
                        <div class="w-full sssss-nav pb-4  cursor-pointer">
                            <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Product gallery</h1>
                            <div class="w-full border-2 border-blue-600  click_product_gallery_btn rounded p-2"
                                style="min-height: 200px;">
                                <div class="grid grid-cols-3 put-gallery gap-2 mb-2">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded p-4 mt-4">
                        <div class="w-ful cursor-pointer">
                            <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">SEO info</h1>
                            <div>
                                <div class="mt-2">
                                    <label for="meta_title">Meta title</label>
                                    <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"
                                        value="{{ old('meta_title') }}" name="meta_title" id="meta_title">
                                </div>
                                <div class="mt-2">
                                    <label for="meta_description">Meta description</label>
                                    <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"
                                        value="{{ old('meta_description') }}" name="meta_description"
                                        id="meta_description">
                                </div>
                                <div class="mt-2">
                                    <label for="meta_tags">Meta tags</label>
                                    <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"
                                        value="{{ old('meta_tags') }}" name="meta_tags" id="meta_tags">
                                </div>
                            </div>
                        </div>
                        <div class="border-t-2 border-gray-300">
                            <button class="w-full py-2 text-white btn_secondary rounded shadow-lg mt-3 m"
                                type="submit">CREATE</button>
                            <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('head')
    <style>
        .ck-rounded-corners {
            top: 10px;
        }

        .picker {
            margin-top: 8px;
            width: 100%
        }

        .picker .pc-select {
            position: relative;
            display: block;
            max-width: 100%;
        }

        .picker .pc-select .pc-trigger {
            margin-bottom: 5px;
            padding: 9px;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
        }

        .picker .pc-select .pc-list input[type=search] {
            padding: 10px;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
        }

        .picker .pc-select .pc-list {
            position: absolute;
            text-align: left;
            left: 0;
            top: calc(100% - 6px);
            width: 100%;
            border: 1px solid #D3D3D3;
            z-index: 11;
            background-color: #fff;
        }

        .picker .pc-select .pc-list li {
            display: block;
            list-style: none;
            /* padding: 0 0 0 8px; */
            cursor: pointer;
            color: #666;
            padding: 10px;
            word-wrap: break-word;
        }

        .ck-blurred {
            min-height: 300px;
        }

        .picker .pc-element,
        .picker .pc-trigger {
            display: inline-block;
            padding: 2px 10px;
            color: #666;
            position: relative;
            z-index: 3;
            border: 1px solid #D3D3D3;
            border-radius: 2px;
            word-wrap: break-word;
            cursor: default;
            background-color: #fff;
            margin-right: 7px;
            margin-bottom: 5px;
            padding: 0 24px 0 6px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .picker .pc-element {
            padding: 7px 22px;
            border-radius: 5px;
        }

        .picker .pc-element .pc-close {
            position: absolute;
            top: 57%;
            right: 4px;
            margin-top: -10px;
            font-size: 11px;
            cursor: pointer;
        }

        .image-holder-border {
            border: 4px dashed #6366F1;
            border-radius: 10px;
        }

        .dropzone .dz-preview .dz-image {
            z-index: 5;
        }

    </style>
@endsection

@section('script')

    <script>
        // close modal
        $(document).on('click', '.croxx_btn', () => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            $('html, body').css({
                overflow: '',
                height: '100%'
            })
        })
        $(document).on('click', '.click_post_btn', () => {
            $('.click_product_gallery_btn').removeClass('gallery')
            $('.btn-select-image').removeClass('select-variable-image set_product_gallery_btn').addClass(
                'set_featured_image_btn')
            $('.child_modal').removeClass('hidden')
            $('.overlay').removeClass('hidden')
            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            })
        })
        //product gallery btn click
        $(document).on('click', '.click_product_gallery_btn', function() {
            $('.click_product_gallery_btn').addClass('gallery')
            $('.btn-select-image').removeClass('select-variable-image set_featured_image_btn').addClass(
                'set_product_gallery_btn')
            $('.child_modal').removeClass('hidden')
            $('.overlay').removeClass('hidden')
            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            })
        })
        //variable image
        $(document).on('click', '.click_variable_btn', function() {
            $('.click_product_gallery_btn').removeClass('gallery')
            $(this).find('.variable_image_input').addClass('d_v_input')
            $(this).find('.variable_image_show').addClass('d_v_show')
            $('.btn-select-image').addClass('select-variable-image').removeClass(
                'set_featured_image_btn set_product_gallery_btn')
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
            if ($('.click_product_gallery_btn').hasClass('gallery')) {
                // $('.image_uploaded').removeClass('border-4 border-blue-400')
                $(this).closest('div').find('.image_uploaded').addClass('border-4 border-blue-400')
                $(this).closest('div').find('.media_image_box').prop('checked', true)
            } else {
                $('.media_image_box').prop('checked', false);
                $('.image_uploaded').removeClass('border-4 border-blue-400')
                $(this).closest('div').find('.image_uploaded').addClass('border-4 border-blue-400')
                $(this).closest('div').find('.media_image_box').prop('checked', true)
            }
        })
        //checkbox click
        $(document).on('change', '.media_image_box', function() {
            $('.media_image_box').not(this).prop('checked', false);
        });
        // end
        //set freture image
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
        //set variable image
        $(document).on('click', '.select-variable-image', (event) => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            var searchIDs = $('#media_image_box:checked').map(function() {
                return $(this).val();
            });
            var image_id = searchIDs.get().toString();
            $('.d_v_input').val(image_id)
            $('.d_v_show').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
            $('.d_v_input').removeClass('d_v_input')
            $('.d_v_show').removeClass('d_v_show');
        });
        //set product gallery btn click
        $(document).on('click', '.set_product_gallery_btn', (event) => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            var searchIDs = $('#media_image_box:checked').map(function() {
                return $(this).val();
            });
            var image_id = searchIDs.get().toString();
            for (let i = 0; i < searchIDs.length; i++) {
                let gall = '<div class="">'
                gall +=
                    `<img class="w-full object-cover h-20 cursor-pointer" src="http://127.0.0.1:8000/uploads/media/${searchIDs[i]}" alt="img">`
                gall += '<input type="hidden" value="' + searchIDs[i] + '" name="product_gallery_image[]" readonly>'
                gall += '</div>'
                // console.log(searchIDs[i]) 
                $('.put-gallery').append(gall)
            }
            // $('.d_v_input').val(image_id)
            // $('.d_v_show').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
            // $('.d_v_input').removeClass('d_v_input')
            // $('.d_v_show').removeClass('d_v_show');
        });
        //set product gallery 
        $(document).on('click', '.set_product_gallery_btn', (event) => {
            $('.child_modal').addClass('hidden')
            $('.overlay').addClass('hidden')
            var searchIDs = $('#media_image_box:checked').map(function() {
                return $(this).val();
            });
            var image_id = searchIDs.get().toString();
            $('.d_v_input').val(image_id)
            $('.d_v_show').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
            $('.d_v_input').removeClass('d_v_input')
            $('.d_v_show').removeClass('d_v_show');
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
        //modal end
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        // let data = JSON.parse(localStorage.getItem('first_attr')) 
        //select picker
        $('#ex-search').picker({
            search: true
        });
        $('#ex-search-attr').picker({
            search: true
        });
        $('#ex-search-attr-items').picker({
            search: true
        });
        $('#ex-search-brand').picker({
            search: true
        });
        //product type simple to variable
        $(document).on('change', '.select_product_type', () => {
            let product_type = $('.select_product_type').val();
            if (product_type === "variable") {
                $('.simple_product_data').addClass('hidden')
                $('.select-attribute').removeClass('hidden')
                $('.add_variation_items').removeClass('hidden');
                $('.variable_product_data').removeClass('hidden');
            } else {
                $('.simple_product_data').removeClass('hidden')
                $('.select-attribute').addClass('hidden')
                $('.add_variation_items').addClass('hidden');
                $('.variable_product_data').addClass('hidden');
            }
        })
        //select attr
        $(document).on('click', '.btn-select-attr', () => {
            let attr_value = $('#ex-search-attr').val()
            let selected_option = $('.selected-option').val()
            //    console.log(attr_value)
            //    console.log(selected_option)
            $(`#ex-search-attr option[value="${attr_value}"]`).attr('disabled', 'disabled')
            if (attr_value == null) {
                alert("No attribute selected")
            } else {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('get.single.attr') }}',
                    data: {
                        attr_value
                    },
                    success: (response) => {
                        // console.log(response)
                        let attr_elect_box = ''
                        attr_elect_box += '<h3 class="pb-2 border-bottom text-lg font-semibold">' +
                            response.attr_name + '</h3>'
                        attr_elect_box += '<input type="hidden" name="attr_name[]" value="' + response
                            .attr_name + '">'
                        attr_elect_box += '<div>'
                        attr_elect_box += '<div>'
                        response.attribute_item.forEach(d => {
                            attr_elect_box += '<label class="inline-flex items-center">'
                            attr_elect_box += '<input type="checkbox" value="' + d.id +
                                '" class="' + response.attr_name + ' form-checkbox" checked>'
                            attr_elect_box += '<span class="ml-2">' + d.item_name + '</span>'
                            attr_elect_box += '</label><br>'
                        });
                        attr_elect_box += '</div>'
                        attr_elect_box +=
                            `<button class=" mb-2 btn-add-to-variation${response.attr_name} py-1 px-2 rounded text-white btn_secondary  shadow-lg mt-3"><i class="fas fa-plus mr-2"></i>SELECT ITEM FOR VARIATION</button>`
                        attr_elect_box += '</div>'
                        $('.add_variation').removeClass('hidden')
                        $('.add_variation').append(attr_elect_box)
                        //get item arr
                        $(document).on('click', `.btn-add-to-variation${response.attr_name}`, () => {
                            var arr = $(`.${response.attr_name}:checkbox:checked`).map(
                                function() {
                                    return this.value;
                                }).get();
                            $(`.btn-add-to-variation${response.attr_name}`).removeClass(
                                    'btn_secondary').addClass('btn_info cursor-not-allowed')
                                .attr("disabled", "true ")
                            //get items again
                            $.ajax({
                                type: "GET",
                                url: "{{ route('attribute.get-attr-items') }}",
                                data: {
                                    arr
                                },
                                success: (response) => {
                                    //  console.log(response)
                                    let ul = '<ul id="count_attr_item">'
                                    if ($('#count_attr_item li').length == 0) {
                                        localStorage.setItem('first_attr', JSON
                                            .stringify(response))
                                        response.forEach(d => {
                                            ul += '<div class="p-div">'
                                            ul += '<li item-id="' + d.id +
                                                '" class="cursor-pointer click_to_expand_product_data py-2 px-2 border-bottom mt-4 bg-gray-200 font-semibold">' +
                                                d.item_name +
                                                '<span class="float-right"><i class="fas fa-plus"></i></span></li>'
                                            ul +=
                                                '<input type="hidden" name="attr_item_id[]" value="' +
                                                d.item_name + '"/>'
                                            ul +=
                                                '<div class="expand_div hidden">'
                                            ul +=
                                                '<div class="grid grid-cols-3 gap-4">'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="regular_price">Regular price</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="regular_price[]" >'
                                            ul += '</div>'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="sale_price">Sale price <span class="text-red-500">*</span></label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2"  value="" name="sale_price[]" >'
                                            ul += '</div>'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="sku">SKU</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="sku[]">'
                                            ul += '</div>'
                                            ul += '</div>'
                                            ul +=
                                                '<div class="grid grid-cols-3 gap-4">'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="shipping_weight">Shipping height(cm)</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="shipping_height[]" >'
                                            ul += '</div>'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="shipping_weight">Shipping width(cm)</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="shipping_weight[]" >'
                                            ul += '</div>'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="shipping_lenght">Shipping length(cm)</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="shipping_lenght[]" >'
                                            ul += '</div>'
                                            ul += '</div>'
                                            ul +=
                                                '<div class="grid grid-cols-3 gap-4">'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="rack_number">Rack number</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="rack_number[]" >'
                                            ul += '</div>'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="unit">Unit <span class="text-red-500">*</span></label>'
                                            ul +=
                                                '<select name="unit[]" class="mt-2 input-border w-full rounded px-2 py-2">'
                                            ul +=
                                                '<option value="pcs" selected>PCS</option>'
                                            ul +=
                                                '<option value="g">G</option>'
                                            ul +=
                                                '<option value="ml">ML</option>'
                                            ul += '</select>'
                                            ul += '</div>'
                                            ul += '<div class="mt-2">'
                                            ul +=
                                                '<label for="unit_amount">Unit amount*</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="1" name="unit_amount[]">'
                                            ul += '</div>'
                                            ul += '<div class="">'
                                            ul +=
                                                '<label for="stock">Stock *</label>'
                                            ul +=
                                                '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="1" name="stock[]">'
                                            ul += '</div>'
                                            ul +=
                                                '<div class="w-32 sssss-nav pb-4 click_variable_btn cursor-pointer">'
                                            ul +=
                                                '<h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Variation Image</h1>'
                                            ul +=
                                                '<div class="w-full sssss">'
                                            ul +=
                                                '<img class="w-full object-cover h-20 cursor-pointer variable_image_show"  src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png" alt="img">'
                                            ul +=
                                                '<input type="hidden" value="" name="variable_img[]" class="variable_image_input"  readonly>'
                                            ul += '</div>'
                                            ul += '</div>'
                                            ul += '</div>'
                                            ul += '</div>'
                                            ul += '</div>'
                                            ul += '</div>'
                                        })
                                    } else {
                                        let data = JSON.parse(localStorage.getItem(
                                            'first_attr'))
                                        let li_count = $('#count_attr_item li')
                                            .length;
                                        let res_count = response.length
                                        let total_li = +li_count * +res_count;
                                        for (let i = 0; i < li_count; i++) {
                                            for (let j = 0; j < res_count; j++) {
                                                ul += '<div class="p-div">'
                                                ul +=
                                                    '<li class="cursor-pointer click_to_expand_product_data py-2 px-2 border-bottom mt-4 font-semibold bg-gray-200"><span item-id="' +
                                                    data[i].id +
                                                    '" class="inline-block w-32">' +
                                                    data[i].item_name +
                                                    '</span><span item-id="' +
                                                    response[j].id +
                                                    '" class="ml-5">' + response[j]
                                                    .item_name +
                                                    '</span><span class="float-right"><i class=" fas fa-plus cursor-pointer"></i></span></li>'
                                                ul +=
                                                    '<input type="hidden" name="attr_item_id_one[]" value="' +
                                                    data[i].item_name + '"/>'
                                                ul +=
                                                    '<input type="hidden" name="attr_item_id_two[]" value="' +
                                                    response[j].item_name + '"/>'
                                                ul +=
                                                    '<div class="expand_div hidden">'
                                                ul +=
                                                    '<div class="grid grid-cols-3 gap-4">'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="regular_price">Regular price</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="regular_price[]" >'
                                                ul += '</div>'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="sale_price">Sale price <span class="text-red-500">*</span></label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2"  value="" name="sale_price[]" >'
                                                ul += '</div>'
                                                ul += '<div class="mt-2">'
                                                ul += '<label for="sku">SKU</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="sku[]">'
                                                ul += '</div>'
                                                ul += '</div>'
                                                ul +=
                                                    '<div class="grid grid-cols-3 gap-4">'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="shipping_weight">Shipping height(cm)</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="shipping_height[]" >'
                                                ul += '</div>'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="shipping_weight">Shipping width(cm)</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="shipping_weight[]" >'
                                                ul += '</div>'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="shipping_lenght">Shipping length(cm)</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="shipping_lenght[]" >'
                                                ul += '</div>'
                                                ul += '</div>'
                                                ul +=
                                                    '<div class="grid grid-cols-3 gap-4">'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="rack_number">Rack number</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="" name="rack_number[]" >'
                                                ul += '</div>'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="unit">Unit <span class="text-red-500">*</span></label>'
                                                ul +=
                                                    '<select name="unit[]" class="mt-2 input-border w-full rounded px-2 py-2">'
                                                ul +=
                                                    '<option value="pcs" selected>PCS</option>'
                                                ul += '<option value="g">G</option>'
                                                ul +=
                                                    '<option value="ml">ML</option>'
                                                ul += '</select>'
                                                ul += '</div>'
                                                ul += '<div class="mt-2">'
                                                ul +=
                                                    '<label for="unit_amount">Unit amount*</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="1" name="unit_amount[]">'
                                                ul += '</div>'
                                                ul += '<div class="">'
                                                ul +=
                                                    '<label for="stock">Stock *</label>'
                                                ul +=
                                                    '<input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="1" name="stock[]">'
                                                ul += '</div>'
                                                ul +=
                                                    '<div class="w-32 sssss-nav pb-4 click_variable_btn cursor-pointer">'
                                                ul +=
                                                    '<h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Variation Image</h1>'
                                                ul += '<div class="w-full sssss">'
                                                ul +=
                                                    '<img class="w-full object-cover h-20 cursor-pointer variable_image_show"  src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png" alt="img">'
                                                ul +=
                                                    '<input type="hidden" value="" name="variable_img[]" class="variable_image_input"  readonly>'
                                                ul += '</div>'
                                                ul += '</div>'
                                                ul += '</div>'
                                                ul += '</div>'
                                                ul += '</div>'
                                                ul += '</div>'
                                            }
                                        }
                                    }
                                    ul += '</ul>'
                                    $('.variable_product_data').html(ul)
                                }
                            })
                        })
                    }
                })
            }
        })
        // console.log(localStorage)
        localStorage.clear()
        $(document).on('click', '.click_to_expand_product_data', function() {
            $(this).closest('div').find('.expand_div').removeClass('hidden')
            $(this).removeClass('click_to_expand_product_data').addClass('click_to_collapse_product_data')
            $(this).find('.fa-plus').addClass('fa-minus').removeClass('fa-plus')
        })
        $(document).on('click', '.click_to_collapse_product_data', function() {
            $(this).closest('div').find('.expand_div').addClass('hidden')
            $(this).removeClass('click_to_collapse_product_data').addClass('click_to_expand_product_data')
            $(this).find('.fa-minus').addClass('fa-plus').removeClass('fa-minus')
        })
    </script>

@endsection
