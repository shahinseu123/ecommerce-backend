@extends('backend.layout.master')

@section('title')
    
@endsection

@section('content')
    <section class="overflow-y-auto">
        <h1 class="py-2 font-semibold text-3xl text-gray-600 uppercase">add product</h1>
        <div class="lg:flex xl:flex gap-4 mt-3">
            <div class="lg:w-2/3 xl:w-2/3">
               <div class="bg-white shadow-lg rounded p-4">
                   <div class="mb-4">
                       <label for="product_title" class="font-semibold">Product title <span class="text-red-500">*</span></label>
                       <input class="input-border rounded px-2 py-2 w-full mt-2" type="text" name="product_title" id="product_title" required value="{{old('product_title')}}">
                   </div>

                   <div class="mb-4">
                        <label for="short_description" class="font-semibold">Product title <span class="text-red-500">*</span></label>
                        <textarea class="input-border rounded px-2 py-2 w-full mt-2" name="short_description" id="short_description" cols="30" rows="3"></textarea>
                   </div>

                   <div class="mb-4">
                        <label for="description" class="font-semibold">Description<span class="text-red-500">*</span></label>
                        <textarea class="input-border rounded px-2 py-2 w-full" style="margin-top: 10px;z-index: -1" name="description" id="editor" cols="30" rows="5"></textarea>
                   </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/3">
                        <div class="shadow-lg p-4 bg-white mt-4">
                            <h2 class="font-semibold border-bottom py-2">Product type <span class="text-red-500">*</span></h2>
                            <div>
                                <select name="product_type" class="input-border px-2 py-2 rounded w-full mt-4" id="product_type" class="input-border">
                                    <option value="simple" selected>Simple</option>
                                    <option value="variable">Variable</option>
                                </select>
                            </div>
                        </div>
                        <div class="shadow-lg p-4 bg-white mt-4">
                            <h2 class="font-semibold border-bottom py-2">Stoct alert <span class="text-red-500">*</span></h2>
                            <div class="mt-2">
                                <label for="stock_alert_qnty">Stock alert quantity</label>
                                <input class="input-border rounded px-2 py-2 w-full mt-2" type="number" name="stock_alert_qnty" id="stock_alert_qnty" required value="{{old('stock_alert_qnty')}}">
                            </div>
                            <div class="mt-2">
                                <label for="stock_pre_alert_qnty">Stock pre-alert quantity</label>
                                <input class="input-border rounded px-2 py-2 w-full mt-2" type="number" name="stock_pre_alert_qnty" id="stock_pre_alert_qnty" required value="{{old('stock_pre_alert_qnty')}}">
                            </div>
                        </div>
                    </div>
                    <div class="w-2/3 ">
                         <div class="shadow-lg p-4 bg-white mt-4">
                             <h1 class="py-2 font-semibold border-bottom">Product data</h1>
                            
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-2">
                                        <label for="regular_price">Regular price</label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('regular_price')}}" name="regular_price" id="regular_price">
                                    </div>
                                    <div class="mt-2">
                                        <label for="sale_price">Regular price <span class="text-red-500">*</span></label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" required value="{{old('sale_price')}}" name="sale_price" id="sale_price">
                                    </div>
                                    <div class="mt-2">
                                        <label for="sku">SKU</label>
                                        <input type="text" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('sku')}}" name="sku" id="sku">
                                    </div>
                               </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-2">
                                        <label for="shipping_weight">Shipping width(cm)</label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('shipping_weight')}}" name="shipping_weight" id="shipping_weight">
                                    </div>
                                    <div class="mt-2">
                                        <label for="shipping_height">Shipping height(cm) </label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('shipping_height')}}" name="shipping_height" id="shipping_height">
                                    </div>
                                    <div class="mt-2">
                                        <label for="shipping_lenght">Shipping length(cm)</label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('shipping_lenght')}}" name="shipping_lenght" id="shipping_lenght">
                                    </div>
                               </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mt-2">
                                        <label for="rack_number">Rack number</label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('rack_number')}}" name="rack_number" id="rack_number">
                                    </div>
                                    <div class="mt-2">
                                        <label for="unit">Unit <span class="text-red-500">*</span></label>
                                        <select name="unit" id="unit" class="mt-2 input-border w-full rounded px-2 py-2">
                                            <option value="pcs" selected>PCS</option>
                                            <option value="g">G</option>
                                            <option value="ml">ML</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <label for="unit_amount">Unit amount*</label>
                                        <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="1" name="unit_amount" id="unit_amount">
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
                            <label for="product_category">Product category <span class="text-red-500">*</span></label><br>
                            <select class="mt-4" required name="basic" id="ex-search" multiple>
                                <option value="1">Shanghai</option>
                                <option value="2">Karachi</option>
                                <option value="3">Beijing</option>
                                <option value="4">Tianjin</option>
                                <option value="5">Istanbul</option>
                                <option value="6">Lagos</option>
                                <option value="7">Tokyo</option>
                                <option value="8">Guangzhou</option>
                                <option value="9">Mumbai</option>
                                <option value="10">Moscow</option>
                                <option value="11">Dhaka</option>
                                <option value="12">Cairo</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="product_brand">Product brand</label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2" required value="{{old('product_brand')}}" name="product_brand" id="product_brand">
                        </div>
                        <div class="mt-2">
                            <label for="product_attribute">Product attributes</label>
                            <select class="mt-4" required name="basic" id="ex-search-attr" multiple>
                                <option value="1">Shanghai</option>
                                <option value="2">Karachi</option>
                                <option value="3">Beijing</option>
                                <option value="4">Tianjin</option>
                                <option value="5">Istanbul</option>
                                <option value="6">Lagos</option>
                                <option value="7">Tokyo</option>
                                <option value="8">Guangzhou</option>
                                <option value="9">Mumbai</option>
                                <option value="10">Moscow</option>
                                <option value="11">Dhaka</option>
                                <option value="12">Cairo</option>
                            </select>
                        </div>
                    </div>
                            
               </div>
            </div>
        </div>
    </section>
@endsection

@section('head')
    <style>
        .ck-rounded-corners{
            top:10px;
        }
        .picker{
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
        .picker .pc-element, .picker .pc-trigger {
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

        .picker .pc-element{
            padding: 7px 22px;
            border-radius: 5px;
        }

        .picker .pc-element .pc-close{
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
    <script src="{{asset('js/ckeditor5/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
        } );

        //select picker
        $('#ex-search').picker({search : true});
        $('#ex-search-attr').picker({search : true});
    </script>
@endsection