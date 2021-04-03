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
                                        <label for="sale_price">Sale price<span class="text-red-500">*</span></label>
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
                            <label for="product_category">Product category <span class="text-red-500">*</span></label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('product_category')}}" name="product_category" id="product_category">
                        </div>
                        <div class="mt-2">
                            <label for="product_brand">Product brand</label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2" required value="{{old('product_brand')}}" name="product_brand" id="product_brand">
                        </div>
                        <div class="mt-2">
                            <label for="product_attribute">Product attributes</label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('product_attribute')}}" name="product_attribute" id="product_attribute">
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
    </script>
@endsection