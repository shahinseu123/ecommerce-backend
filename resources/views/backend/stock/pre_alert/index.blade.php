@extends('backend.layout.master')

@section('title')
    <title>Pre Alert</title>
@endsection

@section('content')
    <section class="bg-white">
        <div class="p-4 shadow-lg rounded-lg">
            <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                <h1 class="text-3xl font-semibold text-gray-600">Pre Alert</h1>
                {{-- <a href="{{route('backend.adjustment.add')}}" class="uppercase px-5 py-2 btn_secondary rounded shadow-lg font-semibold"><i class="fas fa-plus "></i> Add adjustment</a> --}}
            </div>
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th class="text-left" data-priority="1">#</th>
                        <th class="text-left" data-priority="2">Product Name</th>
                        <th class="text-left" data-priority="2">Image</th>
                        <th class="text-left" data-priority="4">Type</th>
                        <th class="text-left" data-priority="4">Pre Alert Quantity</th>
                        <th class="text-left" data-priority="4">Status</th>
                        <th class="text-left" data-priority="5">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($product_array)
                        @foreach ($product_array as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td><img class="h-10 w-10" src="{{ asset('uploads/media/' . $item->product_image) }}"
                                        alt=""></td>
                                <td class="uppercase">{{ $item->type }}</td>
                                <td>{{ $item->stock_pre_alert_quantity }}</td>
                                <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>


                                <td class="">

                                    <a href="{{ route('brand.delete', $item->id) }}"><i
                                            class="fas fa-trash text-red-500"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                </tbody>
            </table>
        </div>
    </section>
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

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
