@extends('backend.layout.master')

@section('title')
    <title>Add Adjustment</title>
@endsection

@section('content')
    <div class=" lg:flex xl:flex gap-2">
        <div class="lg:w-2/5 xl:w-2/5">
            <section class="bg-white">
                <div class="p-4 shadow-lg rounded-lg">
                    <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                        <h1 class="text-3xl font-semibold text-gray-600 uppercase">Search Product</h1>
                    </div>
                    <table id="adjustment" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th class="text-left" data-priority="1">#</th>
                                <th class="text-left" data-priority="1">Name</th>
                                <th class="text-left" data-priority="2">Image</th>
                                <th class="text-left" data-priority="3">Type</th>
                                <th class="text-left" data-priority="6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($product)
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img class="h-10 w-10"
                                                src="{{ asset('uploads/media/' . $item->product_image) }}" alt=""></td>
                                        <td>{{ $item->type }}</td>
                                        <td class="text-center">
                                            <span><i data_main="{{ $item }}"
                                                    class="add_to_adjustment  cursor-pointer text-xl fas fa-plus-circle text-green-500"></i></span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="lg:w-3/5 xl:w-3/5">
            <section class="bg-white ">
                <div class="p-4 shadow-lg rounded-lg overflow-auto">
                    <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                        <h1 class="text-3xl font-semibold text-gray-600 uppercase">Listed Products</h1>
                    </div>
                    <form action="{{ route('adjustment.create') }}" method="post">
                        @csrf
                        <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th class="text-left" data-priority="1">#</th>
                                    <th class="text-left" data-priority="1">Name</th>
                                    <th class="text-left" data-priority="2">Image</th>
                                    <th class="text-left" data-priority="2">Variation</th>
                                    <th class="text-left" data-priority="3">Type</th>
                                    <th class="text-left" data-priority="3">Unit Cost</th>
                                    <th class="text-left" data-priority="3">Quantity</th>
                                    <th class="text-left" data-priority="3">Subtotal</th>
                                    <th class="text-right" data-priority="6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="adJustment_tr_input">

                                </tr>
                            </tbody>
                        </table>
                        <div class="input_bottom_aaa hidden">
                            <div class="flex mt-4 gap-5">
                                <div class="w-1/3">
                                    <label for="grand_total" class="font-semibold">Grand Total</label>
                                    <input type="number"
                                        class="grand_total w-full mt-2 border-2 border-gray-300 rounded px-2 py-2"
                                        name="grand_total">
                                </div>
                                <div class="w-2/3">
                                    <label for="note" class="font-semibold">Note *</label>
                                    <input type="text" required
                                        class="w-full mt-2 border-2 border-gray-300 rounded px-2 py-2" name="note">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit"
                                    class="px-10 py-1 rounded shadow-md bg-green-500 uppercase py-2 text-white font-semibold">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('head')

    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            var table = $('#adjustment').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });

        $(document).on('click', '.add_to_adjustment', function() {
            $('.input_bottom_aaa').removeClass('hidden')
            var data = $(this).attr('data_main')
            data = JSON.parse(data)
            var html = ''
            html += '<td style="width: 40px;" class="border-2 border-gray-300">'
            html += '<input type="number" name="id" value="' + data.id +
                '" class="border-2 border-gray-300 rounded py-2 px-1 w-full">'
            html += '</td>'
            html += '<td style="width: 160px;" class="border-2 border-gray-300">'
            html += '<input type="text" name="prod_title" value="' + data.title +
                '" class="border-2 border-gray-300 rounded py-2 px-1 w-full">'
            html += '</td>'
            html += '<td style="width: 50px;" class="border-2 border-gray-300">'
            html += '<img class="h-10 w-10" src="http://localhost:8000/uploads/media/' + data.product_image +
                '" alt="">'
            html += '</td>'
            html += '<td style="width: 100px;" class="border-2 border-gray-300">'
            html += '<select class="w-full border-2 border-gray-300 rounded py-2" name="variation" id="variation">'
            if (data.type === 'variable') {
                for (let i = 0; i < data.productdata.length; i++) {
                    html += '<option value="' + data.productdata[i].id + '">' + data.productdata[i]
                        .product_excerpt + '</option>'
                }
            } else {
                html += '<option value="' + data.productdata[0].id + '">' + data.productdata[0]
                    .product_excerpt + '</option>'
            }
            html += '</select>'
            html += '</td>'
            html += '<td style="width: 65px;" class="border-2 border-gray-300">'
            html += '<select class="w-full border-2 border-gray-300 rounded py-2" name="op_type" id="op_type">'
            html += '<option value="addition">Add</option>'
            html += '<option value="substruction">Sub</option>'
            html += '<select>'
            html += '<td style="width: 80px;" class=" border-2 border-gray-300">'
            html +=
                '<input type="number" name="unit_cost" class="border-2 unit_cost_class border-gray-300 rounded py-2 px-1 w-full">'
            html += '</td>'
            html += '<td style="width: 60px;" class=" border-2 border-gray-300">'
            html +=
                '<input type="number" name="qnty" class="prod_qnty border-2 border-gray-300 rounded py-2 px-1 w-full" value="1">'
            html += '</td>'
            html += '<td style="width: 60px;" class=" border-2 border-gray-300">'
            html +=
                '<input type="number" name="subtotal" class="subtotal_class border-2 border-gray-300 rounded py-2 px-1 w-full " value="0">'
            html += '</td>'
            html += '<td style="width: 30px;" class=" text-center border-2 border-gray-300">'
            html += '<span><i class="fas remove_item_from_adjus fa-trash-alt text-red-500"></i></span>'
            html += '</td>'

            $('.adJustment_tr_input').html(html)
        })

        $(document).on('keyup', '.unit_cost_class', function() {
            var unit_cost = $(this).val()
            var prod_qnty = $('.prod_qnty').val()
            var sub_total = parseFloat(unit_cost) * parseFloat(prod_qnty)
            $('.subtotal_class').val(sub_total)
            $('.grand_total').val(sub_total)
        })
        $(document).on('keyup', '.prod_qnty', function() {
            var unit_cost = $('.unit_cost_class').val()
            var prod_qnty = $(this).val()
            var sub_total = parseFloat(unit_cost) * parseFloat(prod_qnty)
            $('.subtotal_class').val(sub_total)
            $('.grand_total').val(sub_total)
        })
        $(document).on('click', '.remove_item_from_adjus', function() {
            $('.adJustment_tr_input').find('td').remove()
            $('.input_bottom_aaa').addClass('hidden')
        })
    </script>
@endsection
