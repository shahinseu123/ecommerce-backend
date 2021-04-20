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
                        <label for="short_description" class="font-semibold">Short description <span class="text-red-500">*</span></label>
                        <textarea class="input-border rounded px-2 py-2 w-full mt-2" name="short_description" id="short_description" cols="30" rows="10"></textarea>
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
                                <select name="product_type" class="input-border select_product_type px-2 py-2 rounded w-full mt-4" id="product_type" class="input-border">
                                    <option value="simple" selected>Simple</option>
                                    <option value="variable">Variable</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 shadow-lg p-4 bg-white hidden select-attribute">
                            <label for="product_attribute">Product attributes</label>
                            <select class="mt-4" name="basic" id="ex-search-attr">
                                <option selected value="">Select Attribute</option>
                                @if ($attributes)
                                    @foreach($attributes as $item)
                                        <option class="selected-option"  value="{{$item['attr_name']}}">{{$item['attr_name']}}</option>
                                    @endforeach
                                @endif        
                            </select>
                            <button class="btn-select-attr w-full py-2 text-white btn_secondary rounded shadow-lg mt-3 m">SELECT</button>
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
                        <input type="hidden" name="attr_0" id="attr_0">
                        <input type="hidden" name="attr_1" id="attr_1">
                        <div class="add_variation bg-white shadow-lg p-4 mt-4 hidden">

                        </div>
                        <div class="add_variation_items bg-white shadow-lg p-4 mt-4 hidden">

                        </div>
                         <div class="shadow-lg p-4 bg-white mt-4">
                             <h1 class="py-2 font-semibold border-bottom">Product data</h1>
                             
                               <div class="simple_product_data">
                                   <div class="grid grid-cols-3 gap-4">
                                       <div class="mt-2">
                                           <label for="regular_price">Regular price</label>
                                           <input type="number" class="mt-2 input-border w-full rounded px-2 py-2" value="{{old('regular_price')}}" name="regular_price" id="regular_price">
                                       </div>
                                       <div class="mt-2">
                                           <label for="sale_price">Sale price <span class="text-red-500">*</span></label>
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
            </div>
            <div class="lg:w-1/3 xl:w-1/3">
               <div class="bg-white shadow-lg rounded p-4">
                <h1 class="py-2 font-semibold border-bottom">Additional info</h1>
                    <div>
                        <div class="mt-2">
                            <label for="product_category">Product category <span class="text-red-500">*</span></label><br>
                            <select class="mt-4" required name="basic" id="ex-search" multiple>
                                <option value="">Select Category</option>
                                @if ($categories)
                                    @foreach($categories as $item)
                                       <option value="{{$item['id']}}">{{$item['category_title']}}</option>
                                    @endforeach
                                @endif        
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="product_brand">Product brand</label>
                            <select class="mt-4" required name="basic" id="ex-search-brand" multiple>
                                <option value="">Select brand</option>
                                @if ($brands)
                                    @foreach ($brands as $item)
                                      <option value="{{$item['id']}}">{{$item['brand_title']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        {{-- <div class="mt-2">
                            <label for="product_attribute">Product attributes</label>
                            <select class="mt-4" required name="basic" id="ex-search-attr" multiple>
                                <option value="">Select Attribute</option>
                                @if ($attributes)
                                    @foreach($attributes as $item)
                                        <option value="{{$item['id']}}">{{$item['attr_name']}}</option>
                                    @endforeach
                                @endif        
                            </select>
                        </div> --}}
                    </div>
                            
               </div>
               <div class="bg-white shadow-lg rounded p-4 mt-4">
                <div class="w-full sssss-nav pb-4 click_post_btn cursor-pointer">
                    <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Featured image</h1>
                    <div class="w-full sssss">
                        <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                            src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                            alt="img">
                        <input type="hidden" value="" name="page_image" id="news_img" readonly>
                    </div>
                </div>
               </div>
               <div class="bg-white shadow-lg rounded p-4 mt-4">
                <div class="w-full sssss-nav pb-4 click_post_btn cursor-pointer">
                    <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Product gallery</h1>
                    <div action="/file-upload" class="dropzone image-holder-border">
                        <div class="fallback">
                          <input name="file" type="file" multiple />
                        </div>
                    </div>
                </div>
               </div>
               <div class="bg-white shadow-lg rounded p-4 mt-4">
                <div class="w-full sssss-nav pb-4 click_post_btn cursor-pointer">
                    <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">SEO info</h1>
                    <div>
                        <div class="mt-2">
                            <label for="meta_title">Meta title</label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"  value="{{old('meta_title')}}" name="meta_title" id="meta_title">
                        </div>
                        <div class="mt-2">
                            <label for="meta_description">Meta description</label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"  value="{{old('meta_description')}}" name="meta_description" id="meta_description">
                        </div>
                        <div class="mt-2">
                            <label for="meta_tags">Meta tags</label>
                            <input type="text" class="mt-2 input-border w-full rounded px-2 py-2"  value="{{old('meta_tags')}}" name="meta_tags" id="meta_tags">
                        </div>
                    </div>
                </div>
                <div class="border-t-2 border-gray-300">
                    <button class="w-full py-2 text-white btn_secondary rounded shadow-lg mt-3 m" type="submit">CREATE</button>
                    <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                </div>
               </div>
            </div>
        </div>
        <div id="preview-template">
            <div class="dz-preview dz-image-preview" id="dz-preview-template">
                <div class="dz-image">
                    <img data-dz-thumbnail>
                </div>
              <div class="dz-details">
                <div class="dz-filename"><span data-dz-name></span></div>
                <div class="dz-size" data-dz-size></div>
              </div>
              <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
              <div class="dz-success-mark"><span></span></div>
              <div class="dz-error-mark"><span></span></div>
              <div class="dz-error-message"><span data-dz-errormessage></span></div>
              {{-- <a class="dz-remove" href="#" data-dz-remove="">Remove file</a> --}}
              {{-- <input type="text" placeholder="Title"> --}}
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
        .ck-blurred{
            min-height: 300px;
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
        .image-holder-border{
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
        $('#ex-search-attr-items').picker({search : true});
        $('#ex-search-brand').picker({search : true});

        //product type simple to variable
        $(document).on('change', '.select_product_type', () => {
            let product_type = $('.select_product_type').val();
            if(product_type === "variable"){
              $('.simple_product_data').addClass('hidden')  
              $('.select-attribute').removeClass('hidden')  
            }else{
              $('.simple_product_data').removeClass('hidden') 
              $('.select-attribute').addClass('hidden') 
            }
        })

        //select attr
        $(document).on('click', '.btn-select-attr', () => {
           let attr_value = $('#ex-search-attr').val()
           let selected_option = $('.selected-option').val()
           console.log(attr_value)
           console.log(selected_option)
           
            $(`#ex-search-attr option[value="${attr_value}"]`).attr('disabled', 'disabled')
            // $(`.selected-option option:contains(${selected_option})`).attr('disabled', 'disabled')
           
           if(attr_value == null){
                alert("No attribute selected")
            }else{
                $.ajax({
                    type: 'GET',
                    url: '{{route("get.single.attr")}}',
                    data: {attr_value},
                    success:(response) => {  
                        console.log(response)
                        let attr_elect_box = ''
                        attr_elect_box += '<h3 class="pb-2 border-bottom text-xl font-semibold">'+response.attr_name+'</h3>'
                       
                        response.attribute_item.forEach(d => {
                           attr_elect_box += '<div>' 
                           attr_elect_box += '<label class="inline-flex items-center">' 
                           attr_elect_box += '<input type="checkbox" value="'+d.id+'" class="form-checkbox" checked>' 
                           attr_elect_box += '<span class="ml-2">'+d.item_name+'</span>' 
                           attr_elect_box += '</label>' 
                           attr_elect_box += '</div>' 
                        });
                            attr_elect_box += '<button class=" mb-2 btn-add-to-variation py-1 px-2 rounded text-white btn_secondary  shadow-lg mt-3"><i class="fas fa-plus mr-2"></i>SELECT ITEM FOR VARIATION</button>'
                      $('.add_variation').removeClass('hidden')
                      $('.add_variation').html(attr_elect_box)
                    }
                   })     
            }
            
        }) 
        
       
    </script>
    
@endsection
