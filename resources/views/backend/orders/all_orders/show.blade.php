@extends('backend.layout.master')

@section('title')
    <title>Order details</title>
@endsection

@section('content')
    <section class="bg-white">
        @if ($order)
            <div class="p-5 bg-white rounded w-full">
                <div>
                    <img class="w-48"
                        src="https://cdn6.f-cdn.com/contestentries/1263380/27388048/5a905e93737ce_thumb900.jpg" alt="" />
                </div>
                <div class="flex justify-between px-5 mt-10">
                    <div>
                        <h4 class="uppercase font-semibold text-gray-500">billing to</h4>
                        <h2 class="uppercase font-semibold text-2xl tracking-wide">
                            {{ $order->name }}
                        </h2>
                        <span class="inline-block bg-green-600 w-80 " style="height:2px"></span>
                        <div>
                            <p class="text-gray-600">
                                P: <span class="ml-2">{{ $order->phone }}</span>
                            </p>
                            <p class="text-gray-600">
                                E: <span class="ml-2">{{ $order->email }}</span>
                            </p>
                            <p class="text-gray-600">
                                A:
                                <span class="ml-2">{{ $order->apartment }} {{ $order->street }}
                                    {{ $order->city }} {{ $order->state }}
                                    {{ $order->zip }} {{ $order->country }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="mr-20 mt-10">
                        <h1 class="text-4xl text-green-500 font-bold uppercase">
                            in<span class="text-red-400">voice</span>
                        </h1>
                        <div>
                            <p class="text-gray-600">
                                Invoice: <span class="ml-2">41234</span>
                            </p>
                            <p class="text-gray-600">
                                Date: <span class="ml-2">{{ $order->created_at }}</span>
                            </p>
                            <p class="text-gray-600">
                                Due Date:
                                <span class="ml-2">{{ $order->created_at }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-12">
                    <table class="table w-full border-2 border-gray-400">
                        <thead>
                            <tr class="text-center bg-green-500 text-white">
                                <td class="border-2 border-gray-300 py-2">ST</td>
                                <td class="border-2 border-gray-300 py-2">ITEM DESCRIPTION</td>
                                <td class="border-2 border-gray-300 py-2">QUANTITY</td>
                                <td class="border-2 border-gray-300 py-2">RATE</td>
                                <td class="border-2 border-gray-300 py-2">AMOUNT</td>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($order->OrderProducts) > 0)
                                @foreach ($order->OrderProducts as $item)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 text-gray-600 py-2">
                                            {{ $item->id }}
                                        </td>
                                        <td class="border-2 border-gray-300 text-gray-600 py-2">
                                            {{ $item->title }}
                                        </td>
                                        <td class="border-2 border-gray-300 text-gray-600 py-2">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="border-2 border-gray-300 text-gray-600 py-2">
                                            {{ $item->sale_price }} TK
                                        </td>
                                        <td class="border-2 border-gray-300 text-gray-600 py-2">
                                            {{ $item->total_price }} TK
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div>
                    <div class="text-right mr-24 mt-10">
                        <p class="text-gray-600 ">
                            SUB TOTAL
                            <span class="ml-10 w-24 inline-block">{{ $order->product_total }} TK</span>
                        </p>
                        <p class="text-gray-600 text-right">
                            TAX <span class="ml-10 w-24 inline-block">0 TK</span>
                        </p>
                        <p class="text-gray-600 text-right">
                            Discount <span class="ml-10 w-24 inline-block">0 TK</span>
                        </p>
                        <span class="w-60 bg-gray-400 inline-block" style="height: 1px;"></span>
                        <p class="font-bold text-gray-700">
                            TOTAL
                            <span class=" ml-10">{{ $order->product_total }} TK</span>
                        </p>
                    </div>
                </div>
                <div class="flex justify-between px-5">
                    <div>
                        <div class="mb-10">
                            <h4 class="text-green-500 text-xl font-semibold">
                                PAYMENT METHOD
                            </h4>
                            <p class="text-gray-500 font-semibold">Cash on delivery</p>
                        </div>
                        <div class="mb-10">
                            <h4 class="text-green-500 text-xl font-semibold">
                                SHIPPING CHARGE
                            </h4>
                            <p class="text-gray-500 font-bold">
                                {{ $order->shipping_charge }} Taka
                            </p>
                        </div>
                    </div>
                    <div class="text-center mt-10">
                        <img class="w-48"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVzFiXVtYVUtHAWhTo2y-ctFf9wuSD_TUQ5w&usqp=CAU"
                            alt="" />
                        <span class="bg-gray-400 w-60 inline-block mr-20" style="height:2px"></span>
                        <p>Shahin ALam</p>
                    </div>
                </div>
                <div class="flex justify-between mt-16 mx-5 mb-20">
                    <div>
                        <div class="flex justify-start">
                            <img class="w-12 mr-5" src="{{ asset('img/images/phone-call.png') }}" alt="phone" />
                            <div>
                                <p>8937410937434</p>
                                <p>8937410937434</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <img class="w-12 mr-5" src="{{ asset('img/images/globe.png') }}" alt="glob" />
                        <div>
                            <p>admin@dessert_zone@gmail.com</p>
                            <p>info@dessert_zone@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <img class="w-12 mr-5" src="{{ asset('img/images/pin.png') }}" alt="address" />
                        <div>
                            <p>H:23, R:34, DIT Project,</p>
                            <p>Merul Badda, Gulshan, Dhaka 1212</p>
                        </div>
                    </div>
                </div>
            </div>

        @endif


    </section>
@endsection

@section('head')

    <style>

    </style>
@endsection

@section('script')
    <script>

    </script>
@endsection
