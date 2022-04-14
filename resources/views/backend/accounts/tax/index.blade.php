@extends('backend.layout.master')

@section('title')
    <title>VAT</title>
@endsection

@section('content')
    <section>
        <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
            <h1 class="text-3xl font-semibold text-gray-600">VAT</h1>

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
            <div class="flex justify-center">
                <div class="p-5 rounded bg-white shadow-md w-3/5 text-center">
                    <p class="mb-5 border-b-2 border-gray-300 pb-2">Date: {{ \Carbon\Carbon::today()->format('M d Y') }}
                    </p>
                    <div class="">
                        <h1 class="text-xl font-bold">Total VAT: {{ $today_vat }}</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="monthly_div hidden">
            {{-- monthly --}}

            <div class="flex justify-center">
                <div class="p-5 rounded bg-white shadow-md w-3/5 text-center">
                    <p class="mb-5 border-b-2 border-gray-300 pb-2">Date: {{ \Carbon\Carbon::today()->format('M d Y') }}
                    </p>
                    <div class="">
                        <h3 class="text-xl font-bold">Total VAT: {{ $month_vat }}</h3>

                    </div>
                </div>
            </div>

        </div>
        <div class="yearly_div hidden">
            {{-- yearly --}}
            <div class="flex justify-center">
                <div class="p-5 rounded bg-white shadow-md w-3/5 text-center">
                    <p class="mb-5 border-b-2 border-gray-300 pb-2">Date: {{ \Carbon\Carbon::today()->format('M d Y') }}
                    </p>
                    <div class="">
                        <h3 class="text-xl font-bold">Total VAT: {{ $year_vat }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('head')
@endsection

@section('script')
    <script>

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
