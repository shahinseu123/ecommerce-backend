@extends('backend.layout.master')

@section('title')
    <title>Create new order</title>
@endsection

@section('content')
    <section>
        <h1 class="py-2 font-semibold text-3xl text-gray-600 uppercase">Create Order</h1>
        <div class="shadow-lg bg-white p-4">
            <div class="grid lg:grid-cols-3 xl:grid-cols-3 gap-5">
                <div>
                    <label for="reference_no" class="font-semibold">Reference No </label>
                    <input class="input-border rounded px-2 py-2 w-full mt-4" type="number" name="reference_no"
                        id="reference_no" value="{{ old('product_title') }}">
                    @error('reference_no')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div><label for="ex-search-product">Select Customer<span class="text-red-500">*</span></label><a
                            class="float-right bg-blue-500 text-white px-2 py-1 rounded"
                            href="{{ route('backend.customer.add') }}"><i class="fas fa-plus"></i></a></div>
                    <select class="mt-4" name="customer[]" id="ex-search-customer">

                        @if ($customer)
                            @foreach ($customer as $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('customer')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div><label for="ex-search-product">Select Product<span class="text-red-500">*</span></label><a
                            class="float-right bg-blue-500 text-white px-2 py-1 rounded"
                            href="{{ route('backend.product.add') }}"><i class="fas fa-plus"></i></a></div>
                    <select name="product" class="search_product" id="ex-search-product">
                        @if ($product)
                            @foreach ($product as $item)
                                <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('product')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <span class="text-gray-600 cursor-pointer btn-add-product-to-list"><i class="fas fa-plus"></i> ADD TO
                        LIST</span>

                </div>
            </div>
        </div>
        <div class="lg:flex xl:flex gap-4 mt-5 ">
            <div class="w-full lg:w-3/4 xl:w-2/3">
                <div class="shadow-lg bg-white p-4">
                    <h3 class="text-xl text-gray-600 font-semibold border-bottom pb-2">Listed Products</h3>
                    <div class="flex flex-col pb-3">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="list-btab min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Image
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Price
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Variation
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Quantity
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Subtotal
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span class="text-gray-600">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white list-table-boly divide-y divide-gray-200">


                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="gap-4 grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                            <div class="mt-5">
                                <label for="order_status" class="font-semibold">Order Status <span
                                        class="text-red-600">*</span> </label>
                                <select name="order_status" class="input-border rounded px-2 py-2 w-full mt-2"
                                    id="order_status">
                                    <option value="processing">Processing</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="completed">Completed</option>
                                </select>
                                @error('order_status')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <label for="payment_status" class="font-semibold">Payment Status <span
                                        class="text-red-600">*</span> </label>
                                <select name="payment_status" class="input-border rounded px-2 py-2 w-full mt-2"
                                    id="payment_status">
                                    <option value="paid">Paid</option>
                                    <option value="due">Due</option>

                                </select>
                                @error('payment_status')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <label for="payment_method" class="font-semibold">Payment Method <span
                                        class="text-red-600">*</span> </label>
                                <select name="payment_method" class="input-border rounded px-2 py-2 w-full mt-2"
                                    id="payment_method">
                                    <option value="online payment">Online Payment</option>
                                    <option value="cash on delivery">Cash on delivary</option>

                                </select>
                                @error('payment_status')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <label for="attachments">Attachments</label>
                                <input type="file" class="input-border rounded px-2 py-2 w-full mt-2" name="attachments"
                                    id="attachments">
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                            <div>
                                <label for="order_note">Order Note</label>
                                <textarea class="w-full mt-2 border-2 border-gray-300 rounded" name="order_note"
                                    id="order_note" cols="30" rows="4"></textarea>
                            </div>
                            <div>
                                <label for="stuff_note">Staff Note</label>
                                <textarea class="w-full mt-2 border-2 border-gray-300 rounded" name="stuff_note"
                                    id="stuff_note" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 xl:w-1/3">
                <div class="shadow-lg bg-white p-4">
                    <h3 class="text-xl text-gray-600 font-semibold border-bottom pb-2">Summary</h3>
                    <table class="table-auto mt-5">
                        <tbody>
                            <tr>
                                <th class="px-4 text-gray-500 text-left border-2 border-gray-300 py-3" style="width: 200px">
                                    Subtotal:</th>
                                <td class="border-2 border-gray-300 px-4"><span class="f_subtotal_span">0</span> <input
                                        type="hidden" class="f_subtotal_input" name="f_subtotal"></td>

                            </tr>
                            <tr>
                                <th class="px-4 text-gray-500 text-left border-2 border-gray-300 py-3" style="width: 200px">
                                    Discount*:</th>
                                <td class="border-2 border-gray-300 "><input type="number" value="0"
                                        class="px-4 discount-p input-border rounded  py-1 w-full mt-2" name="discount"
                                        id="discount"></td>
                            </tr>
                            <tr>
                                <th class="px-4 text-gray-500 text-left border-2 border-gray-300 py-3" style="width: 200px">
                                    After Discount*:</th>
                                <td class="border-2 border-gray-300 px-4"><span class="after-dis-span">0</span><input
                                        type="hidden" class="after-dis-input" name="discount_amount" value="0"></td>
                            </tr>
                            <tr>
                                <th class="px-4 text-gray-500 text-left border-2 border-gray-300 py-3" style="width: 200px">
                                    Tax:</th>
                                <td class="border-2 border-gray-300 px-4"><span>0</span><input type="hidden" name="tax"
                                        value="0"></td>
                            </tr>
                            <tr>
                                <th class="px-4 text-gray-500 text-left border-2 border-gray-300 py-3" style="width: 200px">
                                    Shipping*:</th>
                                <td class="border-2 border-gray-300 "><input type="number" value="0"
                                        class="px-4 input-border rounded  py-1 w-full mt-2" name="shipping" id="shipping">
                                </td>
                            </tr>
                            <tr>
                                <th class="px-4 text-gray-500 text-left border-2 border-gray-300 py-3" style="width: 200px">
                                    Grand Total*:</th>
                                <td class="border-2 border-gray-300 px-4"><span>0</span><input type="hidden" name="total"
                                        value="0"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <button class="w-full py-2 btn_secondary text-white rounded mt-4" type="submit">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#ex-search-customer').picker({
            search: true
        });
        $('#ex-search-product').picker({
            search: true
        });

        //add product to table list
        $(document).on('click', '.btn-add-product-to-list', function() {
            let prod = $('.search_product option:selected').val();
            $.ajax({
                url: "{{ route('get-single-product') }}",
                data: {
                    prod
                },
                success: response => {
                    let index = 0;
                    // console.log(response.product)
                    // console.log(response.attribute)
                    let html = ''
                    html += '<tr>'
                    html += '<td class="px-6 py-4 whitespace-nowrap">'
                    html += '<div class="flex items-center">'
                    html += '<div class="">'
                    html += '<div class="text-sm  font-medium text-gray-900">'
                    html += '<div class="text-left text-sm font-medium text-gray-900">' + response
                        .product.title + '</div>'
                    html += '</div>'
                    html += '</div>'
                    html += '</td>'
                    html += '<td class="px-6 py-4 whitespace-nowrap">'
                    html += '<img class="h-10 w-10 rounded-full" src="/uploads/media/' + response
                        .product.product_image + '" alt="">'
                    html += '</td>'
                    html += '<td class="px-6 py-4 whitespace-nowrap">'
                    if (response.product.type === 'variable') {
                        html +=
                            '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full product-price bg-green-100 text-green-800 price-variable">' +
                            response.product.productdata[0].sale_price + '</span>'
                    } else {
                        html +=
                            '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full product-price bg-green-100 text-green-800">' +
                            response.product.productdata[0].sale_price + '</span>'
                    }
                    html += '</td>'
                    if (response.product.type === 'variable') {
                        html += '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'
                        html +=
                            '<select name="select-variation" class="py-1 select-variation w-full border-2 border-gray-300">'
                        for (let i = 0; i < response.product.productdata.length; i++) {
                            html += '<option data-price="' + response.product.productdata[i]
                                .sale_price + '" value="' + response.product.productdata[i].id + '">' +
                                response.product.productdata[i].product_excerpt + '</option>'
                        }
                        html += '</select>'
                        html += '</td>'
                    } else {
                        html += '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">N/A</td>'
                    }

                    html += '</td>'
                    html +=
                        '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="number" name="quantity" value="1" class="product-quantity px-2 py-1 border-2 border-gray-300 rounded w-full" /></td>'
                    html +=
                        `<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="number" readonly name="subtotal[]" class="product-subtotal px-2 py-1 border-2 border-gray-300 rounded w-full" /></td>`
                    html += '<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">'
                    html +=
                        '<span  class="cursor-pointer text-indigo-600 hover:text-indigo-900 click-to-remove-tr"><i class="fas fa-trash text-red-500"></i></span>'
                    html += '</td>'
                    html += '</tr>'

                    $('.list-table-boly').prepend(html)

                }
            })
            setTimeout(() => {
                let c_price = $(".list-btab tr:nth-child(1)").find('.product-price').text()
                let c_qnty = $(".list-btab tr:nth-child(1)").find('.product-quantity').val()
                let c_sub = parseFloat(c_price * c_qnty)
                $(".list-btab tr:nth-child(1)").find('.product-subtotal').val(c_sub)
                grandTotal()
            }, 500)
        })
        $(document).on('change', '.select-variation', function() {
            let attr_id = $('.select-variation').val()
            let v_price = $('option:selected', this).attr(
            'data-price'); //$("#location option:selected").attr("myTag").
            $(this).closest('tr').find('.price-variable').html(v_price)

            setTimeout(() => {
                let price = $(this).closest('tr').find('.product-price').text()
                let quantity = $(this).closest('tr').find('.product-quantity').val()
                let subtotal = parseFloat(price * quantity)
                $(this).closest('tr').find('.product-subtotal').val(subtotal)
                grandTotal()
            }, 1000)

        })

        $(document).on('keyup', '.product-quantity', function() {
            let price = $(this).closest('tr').find('.product-price').text()
            let qnty = $(this).closest('tr').find('.product-quantity').val()
            let subt = parseFloat(price * qnty)
            // console.log(price)
            $(this).closest('tr').find('.product-subtotal').val(subt)
            grandTotal()
        })


        $(document).on('click', '.click-to-remove-tr', function() {
            $(this).closest('tr').remove()
            grandTotal()
        })

        function grandTotal() {
            let subt_arr = $('.product-subtotal').map(function() {
                return $(this).val()
            }).get()
            if (subt_arr.length === 0) {
                $('.f_subtotal_span').text(0)
                $('.f_subtotal_input').val(0)
            } else {
                let sum_subt = subt_arr.reduce((a, b) => +a + +b)
                $('.f_subtotal_span').text(sum_subt)
                $('.f_subtotal_input').val(sum_subt)

            }
            $(document).on('keyup', '.discount-p', function() {
                let discount = parseFloat($(this).val())
                let sub_t_input = parseFloat($('.f_subtotal_input').val())
                let after_dis = sub_t_input - discount
                $('.after-dis-span').text(after_dis)
                $('.after-dis-input').val(after_dis)

            })
        }
    </script>
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

    </style>
@endsection
