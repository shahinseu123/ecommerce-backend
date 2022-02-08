@extends('backend.layout.master')

@section('title')
    <title>General Accounts</title>
@endsection

@section('content')
    <section>
        <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
            <h1 class="text-3xl font-semibold text-gray-600">General Accounts</h1>

        </div>
        <div class="bg-blue-700 rounded mb-3">
            <ul class="flex justify-items-start gap-5 p-2">
                <li class="text-white cursor-pointer daily_li border-b-2 border-white">Daily</li>
                <li class="text-white cursor-pointer monthly_li ">Monthly</li>
                <li class="text-white cursor-pointer yearly_li ">Yearly</li>
            </ul>
        </div>
        <div class="daily_div">
            {{-- daily --}}
            <div class="p-4 shadow-lg rounded-lg bg-white">
                <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                    <h1 class="text-3xl font-semibold text-gray-600">Dailey</h1>

                </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="text-left" data-priority="1">#</th>
                            <th class="text-left" data-priority="2">Name</th>
                            <th class="text-left" data-priority="2">Email</th>
                            <th class="text-left" data-priority="4">Mobile</th>
                            <th class="text-left" data-priority="5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($admin)
                       @foreach ($admin as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                
                                <td class="">
                                    <a href="{{route('admin.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.delete', $item->id)}}"><i class="fas fa-trash text-red-500"></i></a>
                                </td>
                            </tr>
                       @endforeach 
                    @endif --}}

                        <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="monthly_div hidden">
            {{-- monthly --}}
            <div class="p-4 shadow-lg rounded-lg bg-white">
                <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                    <h1 class="text-3xl font-semibold text-gray-600">Monthly</h1>

                </div>
                <table id="examplee" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="text-left" data-priority="1">#</th>
                            <th class="text-left" data-priority="2">Name</th>
                            <th class="text-left" data-priority="2">Email</th>
                            <th class="text-left" data-priority="4">Mobile</th>
                            <th class="text-left" data-priority="5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($admin)
                       @foreach ($admin as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                
                                <td class="">
                                    <a href="{{route('admin.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.delete', $item->id)}}"><i class="fas fa-trash text-red-500"></i></a>
                                </td>
                            </tr>
                       @endforeach 
                    @endif --}}
                        <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="yearly_div hidden">
            {{-- yearly --}}
            <div class="p-4 shadow-lg rounded-lg bg-white">
                <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                    <h1 class="text-3xl font-semibold text-gray-600">Yearly</h1>

                </div>
                <table id="exampleee" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="text-left" data-priority="1">#</th>
                            <th class="text-left" data-priority="2">Name</th>
                            <th class="text-left" data-priority="2">Email</th>
                            <th class="text-left" data-priority="4">Mobile</th>
                            <th class="text-left" data-priority="5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($admin)
                       @foreach ($admin as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                
                                <td class="">
                                    <a href="{{route('admin.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.delete', $item->id)}}"><i class="fas fa-trash text-red-500"></i></a>
                                </td>
                            </tr>
                       @endforeach 
                    @endif --}}

                        <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                    </tbody>
                </table>
            </div>
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
        $(document).ready(function() {

            var table = $('#examplee').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
        $(document).ready(function() {

            var table = $('#exampleee').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
    <script>
        $(document).on('click', '.daily_li', function() {
            $('.daily_li').addClass('border-b-2 border-white')
            $('.monthly_li').removeClass('border-b-2 border-white')
            $('.yearly_li').removeClass('border-b-2 border-white')
            $('.daily_div').removeClass('hidden')
            $('.monthly_div').addClass('hidden')
            $('.yearly_div').addClass('hidden')
        })
        $(document).on('click', '.monthly_li', function() {
            $('.monthly_li').addClass('border-b-2 border-white')
            $('.daily_li').removeClass('border-b-2 border-white')
            $('.yearly_li').removeClass('border-b-2 border-white')
            $('.daily_div').addClass('hidden')
            $('.monthly_div').removeClass('hidden')
            $('.yearly_div').addClass('hidden')
        })
        $(document).on('click', '.yearly_li', function() {
            $('.monthly_li').removeClass('border-b-2 border-white')
            $('.daily_li').removeClass('border-b-2 border-white')
            $('.yearly_li').addClass('border-b-2 border-white')
            $('.daily_div').addClass('hidden')
            $('.monthly_div').addClass('hidden')
            $('.yearly_div').removeClass('hidden')
        })
    </script>
@endsection
