@extends('backend.layout.master')

@section('content')
    <section>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-2">

            <div class=" shadow-md bg-yellow-500">
                <div class="">
                    <div class="flex justify-between px-4 py-4">
                        <div>
                            <p class="text-3xl font-semibold">{{ \App\Models\order\Order::all()->count() }}</p>
                            <p class="mt-2">All orders's</p>
                        </div>
                        <div>
                            <i class="fas fa-user-plus user-pending text-yellow-300 text-4xl"></i>
                        </div>
                    </div>
                    <p class="p-more-info px-4 py-2 border-yellow-300 bg-yellow-600 border-t-2 text-center">
                        <a class="link-more-info" href="">More info<i class="fas fa-arrow-circle-right ml-2"></i></a>
                    </p>
                </div>
            </div>

            <div class=" shadow-md bg-green-500">
                <div class="">
                    <div class="flex justify-between px-4 py-4">
                        <div>
                            <p class="text-3xl font-semibold">
                                {{ \App\Models\order\Order::where('status', 'delivered')->count() }}</p>
                            <p class="mt-2">Completed order's</p>
                        </div>
                        <div>
                            <i class="fas fa-user-tag user-active text-green-300 text-4xl"></i>
                        </div>
                    </div>
                    <p class="p-more-info px-4 py-2 border-green-300 bg-green-600 border-t-2 text-center">
                        <a class="link-more-info" href="">More info<i class="fas fa-arrow-circle-right ml-2"></i></a>
                    </p>
                </div>
            </div>

            <div class=" shadow-md bg-red-500">
                <div class="">
                    <div class="flex justify-between px-4 py-4">
                        <div>
                            <p class="text-3xl font-semibold">
                                {{ \App\Models\order\Order::where('status', 'returned')->count() }}</p>
                            <p class="mt-2">Returned member's</p>
                        </div>
                        <div>
                            <i class="fas fa-user-times user-reject text-red-300 text-4xl"></i>
                        </div>
                    </div>
                    <p class="p-more-info px-4 py-2 border-red-300 bg-red-600 border-t-2 text-center"><a
                            class="link-more-info" href="">More info<i class="fas fa-arrow-circle-right ml-2"></i></a></p>
                </div>
            </div>
            <div class=" shadow-md bg-blue-500">
                <div class="">
                    <div class="flex justify-between px-4 py-4">
                        <div>
                            <p class="text-3xl font-semibold">{{ \App\Models\User::where('role', 'user')->get()->count() }}
                            </p>
                            <p class="mt-2">All Customer's</p>
                        </div>
                        <div>
                            <i style="z-index: 0" class=" fas fa-users all-users text-blue-300 text-4xl"></i>
                        </div>
                    </div>
                    <p class="p-more-info px-4 py-2 border-blue-300 bg-blue-600 border-t-2 text-center">
                        <a class="link-more-info" href="">More info<i class="fas fa-arrow-circle-right ml-2"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('head')

@endsection

@section('script')

@endsection
