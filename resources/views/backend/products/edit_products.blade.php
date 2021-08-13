@extends('backend.layout.master')

@section('title')

@endsection

@section('content')
    <section class="overflow-y-auto">
        @include('backend.inc.media_modal')
        <h1 class="py-2 font-semibold text-3xl text-gray-600 uppercase">edit product</h1>
        @if ($product)
            {{-- {{ $product->Attribute }} --}}
            <form action="{{ route('product.update') }}" method="post">
                @csrf
                <div class="lg:flex xl:flex gap-4 mt-3">
                    <div class="lg:w-2/3 xl:w-2/3">
                        <div class="bg-white shadow-lg rounded p-4">
                            <div class="mb-4">
                                <input type="hidden" value="{{ $product->id }}" name="id" id="product_id">
                                <label for="product_title" class="font-semibold">Product title <span
                                        class="text-red-500">*</span></label>
                                <input class="input-border rounded px-2 py-2 w-full mt-2" type="text"
                                    value="{{ $product->title }}" name="product_title" id="product_title" required>
                                @error('product_title')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="short_description" class="font-semibold">Short description</label>
                                <textarea class="input-border rounded px-2 py-2 w-full mt-2" name="short_description"
                                    id="short_description" cols="30"
                                    rows="10">{{ $product->short_description }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="font-semibold">Description<span
                                        class="text-red-500">*</span></label>
                                <textarea class="input-border rounded px-2 py-2 w-full" style="margin-top: 10px;z-index: -1"
                                    name="description" id="editor" cols="30"
                                    rows="5">{{ $product->description }}</textarea>
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
                                            <option {{ $product->type === 'simple' ? 'selected' : '' }} value="simple">
                                                Simple</option>
                                            <option {{ $product->type === 'variable' ? 'selected' : '' }}
                                                value="variable">Variable</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($product->type !== 'simple')
                                    <div class="mt-4 shadow-lg p-4 bg-white select-attribute">
                                        <label for="attr_name">Product attributes</label>
                                        <select class="mt-4 mb-4" name="attr_name[]" id="ex-search-attr" multiple>
                                            @if ($attributes)
                                                @foreach ($attributes as $item)
                                                    <option
                                                        {{ in_array($item['attr_name'], $product->Attribute->pluck('attr_name')->toArray()) ? 'selected' : '' }}
                                                        value="{{ $item['attr_name'] }}">{{ $item['attr_name'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                @endif
                                <div class="shadow-lg p-4 bg-white mt-4">
                                    <h2 class="font-semibold border-bottom py-2">Stoct alert <span
                                            class="text-red-500">*</span></h2>
                                    <div class="mt-2">
                                        <label for="stock_alert_qnty">Stock alert quantity</label>
                                        <input class="input-border rounded px-2 py-2 w-full mt-2" type="number"
                                            name="stock_alert_qnty" id="stock_alert_qnty" required
                                            value="{{ $product->stock_alert_quantity }}">
                                        @error('stock_alert_qnty')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label for="stock_pre_alert_qnty">Stock pre-alert quantity</label>
                                        <input class="input-border rounded px-2 py-2 w-full mt-2" type="number"
                                            name="stock_pre_alert_qnty" id="stock_pre_alert_qnty" required
                                            value="{{ $product->stock_pre_alert_quantity }}">
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
                                {{-- {{ dd($product->Productdata) }} --}}
                                <div class="shadow-lg p-4 bg-white mt-4">
                                    <h1 class="py-2 font-semibold border-bottom">Product data</h1>

                                    @if ($product->type === 'variable')
                                        <div class="variable_product_data">
                                            @if (count($product->Productdata) > 0)
                                                <div class="">
                                                    @foreach ($product->Productdata as $item)
                                                        <div class="bg-gray-200 py-2 px-2 mt-3">
                                                            {{ $item->product_excerpt }}
                                                        </div>
                                                        <div class="grid grid-cols-3 gap-4 ">
                                                            <div class="mt-2">
                                                                <label for="regular_price">Regular price</label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->regular_price }}"
                                                                    name="regular_price[]">
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="sale_price">Sale price <span
                                                                        class="text-red-500">*</span></label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->sale_price }}" name="sale_price[]">
                                                                @error('sale_price')
                                                                    <div class="text-red-600">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="sku">SKU</label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->sku }}" name="sku[]">
                                                                @error('sku')
                                                                    <div class="text-red-600">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-3 gap-4">
                                                            <div class="mt-2">
                                                                <label for="shipping_weight">Shipping width(cm)</label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->shipping_weight }}"
                                                                    name="shipping_weight[]">
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="shipping_height">Shipping height(cm) </label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->shipping_height }}"
                                                                    name="shipping_height[]">
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="shipping_lenght">Shipping length(cm)</label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->shipping_lenght }}"
                                                                    name="shipping_lenght[]">
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-3 gap-4">
                                                            <div class="mt-2">
                                                                <label for="rack_number">Rack number</label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->rack_number }}"
                                                                    name="rack_number[]">
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="unit">Unit <span
                                                                        class="text-red-500">*</span></label>
                                                                <select name="unit[]"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2">
                                                                    <option {{ $item->unit === 'pcs' ? 'selected' : '' }}
                                                                        value="pcs">PCS</option>
                                                                    <option {{ $item->unit === 'g' ? 'selected' : '' }}
                                                                        value="g">G</option>
                                                                    <option {{ $item->unit === 'ml' ? 'selected' : '' }}
                                                                        value="ml">ML</option>
                                                                </select>
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="unit_amount">Unit amount <span>*</span></label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->unit_amount }}"
                                                                    name="unit_amount[]">
                                                            </div>
                                                            <div class="">
                                                                <label for="_stock">Stock <span>*</span></label>
                                                                <input type="number"
                                                                    class="mt-2 input-border w-full rounded px-2 py-2"
                                                                    value="{{ $item->stock }}" name="stock[]">
                                                            </div>
                                                            <div
                                                                class="w-full sssss-nav pb-4 click_variable_btn cursor-pointer">
                                                                <h1
                                                                    class="text-center pb-2 border-b-2 border-gray-300 font-semibold mb-1">
                                                                    Variation Image</h1>
                                                                <div class="w-full sssss">

                                                                </div>
                                                                @if ($item->variation_img !== null)
                                                                    <img class="w-full object-cover h-20 cursor-pointer variable_image_show"
                                                                        src="{{ asset('uploads/media/' . $item->variation_img) }}"
                                                                        alt="img">
                                                                @else
                                                                    <img class="w-full object-cover h-20 cursor-pointer variable_image_show"
                                                                        src=" https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                                                        alt="img">
                                                                @endif
                                                                <input type="hidden" value="" name="variable_img[]"
                                                                    class="variable_image_input" readonly>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @else

                                        <div class="simple_product_data">
                                            <div>
                                                <div class="grid grid-cols-3 gap-4">
                                                    <div class="mt-2">
                                                        <label for="regular_price">Regular price</label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->regular_price }}"
                                                            name="_regular_price">
                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="sale_price">Sale price <span
                                                                class="text-red-500">*</span></label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->sale_price }}"
                                                            name="_sale_price">

                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="sku">SKU</label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->sku }}" name="_sku">

                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-3 gap-4">
                                                    <div class="mt-2">
                                                        <label for="shipping_weight">Shipping width(cm)</label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->shipping_weight }}"
                                                            name="_shipping_weight">
                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="shipping_height">Shipping height(cm) </label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->shipping_height }}"
                                                            name="_shipping_height">
                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="shipping_lenght">Shipping length(cm)</label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->shipping_lenght }}"
                                                            name="_shipping_lenght">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-3 gap-4">
                                                    <div class="mt-2">
                                                        <label for="rack_number">Rack number</label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->rack_number }}"
                                                            name="_rack_number">
                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="unit">Unit <span class="text-red-500">*</span></label>
                                                        <select name="_unit"
                                                            class="mt-2 input-border w-full rounded px-2 py-2">
                                                            <option
                                                                {{ $product->Productdata[0]->unit === 'pcs' ? 'selected' : '' }}
                                                                value="pcs">PCS</option>
                                                            <option
                                                                {{ $product->Productdata[0]->unit === 'g' ? 'selected' : '' }}
                                                                value="g">G</option>
                                                            <option
                                                                {{ $product->Productdata[0]->unit === 'ml' ? 'selected' : '' }}
                                                                value="ml">ML</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="unit_amount">Unit amount <span>*</span></label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->unit_amount }}"
                                                            name="_unit_amount">
                                                    </div>
                                                    <div class="">
                                                        <label for="_stock">Stock <span>*</span></label>
                                                        <input type="number"
                                                            class="mt-2 input-border w-full rounded px-2 py-2"
                                                            value="{{ $product->Productdata[0]->stock }}" name="_stock">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    @endif
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
                                                <option
                                                    {{ in_array($item['id'], $product->Category->pluck('id')->toArray()) ? 'selected' : '' }}
                                                    value="{{ $item['id'] }}">{{ $item['category_title'] }}
                                                </option>
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
                                        @if ($brands)
                                            @foreach ($brands as $item)
                                                <option
                                                    {{ in_array($item['id'], $product->Brand->pluck('id')->toArray()) ? 'selected' : '' }}
                                                    value="{{ $item['id'] }}">{{ $item['brand_title'] }}</option>
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
                                <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Featured image
                                </h1>
                                <div class="w-full sssss">
                                    <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                                        src="{{ asset('uploads/media/' . $product->product_image) }}" alt="img">
                                    <input type="hidden" value="{{ $product->product_image }}" name="product_image"
                                        id="news_img" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow-lg rounded p-4 mt-4">
                            <div class="w-full sssss-nav pb-4  cursor-pointer">
                                <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Product gallery
                                </h1>
                                <div class="w-full border-2 border-blue-600 gallery-rel  rounded p-2"
                                    style="min-height: 200px;">
                                    <div class="grid grid-cols-3 put-gallery gap-2 mb-2">
                                        @if ($product->Productgallery)
                                            @foreach ($product->Productgallery as $item)
                                                <div class="gallery_img_rel">
                                                    <img class="w-full object-cover h-20 cursor-pointer"
                                                        src="{{ asset('uploads/media/' . $item->product_g_img) }}"
                                                        alt="img">
                                                    <input class="gallery_img_id_btn" data-id="{{ $item->id }}"
                                                        name="product_gallery_image[]" type="hidden"
                                                        value="{{ $item->product_g_img }}" readonly>
                                                    <span class="remove_btn_abs"><i
                                                            class="gallery_img_remove fas fa-times"></i></span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="grid grid-cols-3  put-gallery_ajex hidden gap-2 mb-2">

                                    </div>
                                    <span
                                        class="click_product_gallery_btn_2 click_product_gallery_btn uppercase bg-green-500 text-white font-semibold rounded shadow-md px-2 py-1">add
                                        image to gallery</span>
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
                                            value="{{ $product->meta_title }}" name="meta_title" id="meta_title">
                                    </div>
                                    <div class="mt-2">
                                        <label for="meta_description">Meta description</label>
                                        <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"
                                            value="{{ $product->meta_description }}" name="meta_description"
                                            id="meta_description">
                                    </div>
                                    <div class="mt-2">
                                        <label for="meta_tags">Meta tags</label>
                                        <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"
                                            value="{{ $product->meta_tags }}" name="meta_tags" id="meta_tags">
                                    </div>
                                </div>
                            </div>
                            <div class="border-t-2 border-gray-300">
                                <button class="w-full py-2 text-white btn_secondary rounded shadow-lg mt-3 m"
                                    type="submit">UPDATE</button>
                                <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        @endif
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
        $(document).on('click', '.gallery_img_remove', function() {
            let id = $(this).closest('.gallery_img_rel').find('.gallery_img_id_btn').attr('data-id')
            let product_id = $('#product_id').val()
            $('.put-gallery').addClass('hidden')
            $('.put-gallery_ajex').removeClass('hidden')
            $.ajax({
                type: "GET",
                url: "{{ route('gallery.delete_gallery_item') }}",
                data: {
                    id: id,
                    product_id: product_id
                },
                success: function(response) {
                    let html = ''
                    response.forEach(item => {
                        html += '<div class="gallery_img_rel">'
                        html +=
                            '<img class="w-full object-cover h-20 cursor-pointer" src="http://localhost:8000/uploads/media/' +
                            item.product_g_img + '" alt="img">'
                        html +=
                            '<input class="gallery_img_id_btn" data-id="' + item.id +
                            '" name="product_gallery_image[]" type="hidden" value="' + item
                            .product_g_img + '" readonly >'
                        html +=
                            '<span class="remove_btn_abs"><i class="gallery_img_remove fas fa-times"></i></span>'
                        html += '</div>'
                    })
                    $('.put-gallery_ajex').empty('.gallery_img_rel')
                    $('.put-gallery_ajex').append(html)
                }
            })


        })
    </script>

@endsection
