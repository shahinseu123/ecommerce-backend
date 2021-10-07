@extends('backend.layout.master')

@section('title')
    <title>Coupon</title>
@endsection
@section('content')
    <section>
        <form action="{{ route('backend.cupon.create') }}" method="POST">
            @csrf
            <div class="bg-white shadow-md rounded p-5">
                <h2 class="text-2xl uppercase text-gray-600 font-semibold pb-3 border-b-2 border-gray-200">add coupon</h2>
                <div class="mt-2">
                    <label for="cupon_name">Coupon <span class="text-red-500">*</span></label>
                    <div class="my-2">
                        <input type="text" name="cupon_name" id="cupon_name"
                            class="w-full px-2 py-1 border-2 border-gray-300 rounded " placeholder="Cupon">

                    </div>
                </div>
                <div class="mt-2">
                    <label for="cupon_des">Description </label>
                    <div class="my-2">
                        <textarea name="cupon_des" id="cupon_des" class="w-full px-2 py-1 border-2 border-gray-300 rounded "
                            cols="30" rows="4"></textarea>

                    </div>
                </div>
            </div>
            <div class="mt-2 shadow-md bg-white rounded ">
                <h2 class="text-2xl uppercase text-gray-600 font-semibold px-5 py-3 border-b-2 border-gray-200">coupon data
                </h2>
                <div class="md:flex lg:flex xl:flex">
                    <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3">
                        <ul class="border-r-2 border-gray-300">
                            <li class="cursor-pointer ac_active cu_link link_one py-3 pl-5 border-b-2  border-gray-300"><i
                                    class="fas fa-arrows-alt  mr-2"></i>General
                            </li>
                            <li class="cursor-pointer cu_link link_two py-3 pl-5 border-b-2  border-gray-300"><i
                                    class="fas fa-exclamation-circle mr-2"></i>Usage
                                restriction
                            </li>
                            <li class="cursor-pointer cu_link link_three py-3 pl-5 border-b-2  border-gray-300"><i
                                    class="fas fa-exclamation-triangle mr-2"></i>Usage
                                limits</li>
                        </ul>
                    </div>
                    <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/3">
                        <div class="div_one p-5">
                            <div class="mb-2">
                                <label for="discount_type">Discount Type <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <select name="discount_type" id="discount_type"
                                        class="w-full px-2 py-1 rounded border-2 border-gray-300 w__max">
                                        <option value="persentage_discount" selected>Persentage discount</option>
                                        <option value="fixed_cart_discount">Fixed cart discount</option>
                                        <option value="fixed_product_discount">Fixed product discount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="discount_amount">Discount amount <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input required type="number" name="discount_amount" id="discount_amount"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                            <div class="mb-2 mt-3">
                                <input type="checkbox" name="free_shiping" id="free_shiping"> <span>Check if the coupon
                                    allow
                                    free shipping</span>
                            </div>
                            <div class="mb-2">
                                <label for="expiry_date">Coupon expiry date <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input type="date" name="expiry_date" id="expiry_date"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                        </div>
                        <div class="div_two hidden p-5">
                            <div class="mb-2">
                                <label for="min_amount">Minimum amount </label>
                                <div class="mt-1">
                                    <input type="number" name="min_amount" id="min_amount"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="min_amount">Maximum amount </label>
                                <div class="mt-1">
                                    <input type="number" name="max_amount" id="max_amount"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                            <div class="mb-2 mt-3">
                                <input type="checkbox" name="individual_use_only" id="individual_use_only"> <span>Check the
                                    box if the coupon can not be used in conjunction with other coupon.</span>
                            </div>
                            <div class="mb-2 mt-3">
                                <input type="checkbox" name="exclude_sale_item" id="exclude_sale_item"> <span>Check the box
                                    if the coupon should not apply product on sell.Per items coupon will work if the product
                                    not on sale</span>
                            </div>
                            <div class="mt-2">
                                <label for="include_product">Select Product </label><br>
                                <select class="mt-4" name="include_product[]" id="ex-search" multiple>

                                    @if ($products)
                                        @foreach ($products as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                            <div class="mt-2">
                                <label for="product_exclude">Product exclude </label><br>
                                <select class="mt-4" name="product_exclude[]" id="ex-search-2" multiple>

                                    @if ($products)
                                        @foreach ($products as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                            <div class="mt-2">
                                <label for="select_category">Select Category </label><br>
                                <select class="mt-4" name="select_category[]" id="ex-search-3" multiple>

                                    @if ($categories)
                                        @foreach ($categories as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['category_title'] }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                        <div class="div_three hidden p-5">
                            <div class="mb-2">
                                <label for="cupon_usage_limit">Usage limits per coupon</label>
                                <div class="mt-1">
                                    <input type="number" name="cupon_usage_limit" id="cupon_usage_limit"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="cupon_usage_item_limit">Limit usage to X items</label>
                                <div class="mt-1">
                                    <input type="number" name="cupon_usage_item_limit" id="cupon_usage_item_limit"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="usage_limit_per_user">Usage limit per user</label>
                                <div class="mt-1">
                                    <input type="number" name="usage_limit_per_user" id="usage_limit_per_user"
                                        class="px-2 py-1 border-2 border-gray-300 rounded w-full w__max">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto p-5 border-t-2 border-gray-300">
                    <button type="submit"
                        class="uppercase text-gray-200 px-2 font-semibold py-1 rounded shadow-md bg-green-400">create
                        coupon</button>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('head')
    <style>
        .ac_active {
            color: #6366F1
        }

        .w__max {
            max-width: 500px;
        }

        .ck-rounded-corners {
            top: 10px;
        }

        .picker {
            margin-top: 8px;
            width: 100%;
            max-width: 500px
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

    </style>
@endsection
@section('script')
    <script>
        $('#ex-search').picker({
            search: true
        });
        $('#ex-search-2').picker({
            search: true
        });
        $('#ex-search-3').picker({
            search: true
        });
        $(document).on('click', '.cu_link', function() {
            $(this).addClass('ac_active')
            $('.cu_link').not(this).removeClass('ac_active')
        })
        $(document).on('click', '.link_one', function() {
            $('.div_one').removeClass('hidden')
            $('.div_two').addClass('hidden')
            $('.div_three').addClass('hidden')
        })
        $(document).on('click', '.link_two', function() {
            $('.div_one').addClass('hidden')
            $('.div_two').removeClass('hidden')
            $('.div_three').addClass('hidden')
        })
        $(document).on('click', '.link_three', function() {
            $('.div_one').addClass('hidden')
            $('.div_two').addClass('hidden')
            $('.div_three').removeClass('hidden')
        })
    </script>
@endsection
