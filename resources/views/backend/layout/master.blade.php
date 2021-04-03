<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    @yield('head')
    <title>Tailwind Master Admin</title>
</head>

<body>
    {{-- navbar top --}}
    <section id="nabvar_top">
        <nav class="bg-gray-800">
            <div class=" mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="mobile_menu_button_show inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>

                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>

                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto"
                                src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                                alt="Workflow">
                        </div>

                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <button
                            class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button type="button"
                                    class="btn-user-options bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </button>
                            </div>

                            <div class="hidden user-options-div origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Settings</a>
                                <a href="{{route('backend.user.logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    {{-- navbar top end --}}
    {{-- sidebar --}}
    <section>
        <div class="flex">
            <div class="w-1/5 h-screen relative sm_hidden sidebar_main_width">
                <div class="absolute inset-0 w-full h-hull sidebar_main overflow-y-auto">
                    <ul class="mt-5 px-5">
                        <li class="text-white py-1 nav_item_li cursor-pointer">
                            <span class="w-10 inline-block"><i style="color: #6366F1"
                                    class="fas fa-tachometer-alt mr-2"></i></span><a class="" style="color: #6366F1"
                                href="">Dashboard</a>
                        </li>
                        <li class="text-white py-1 nav_item_li cursor-pointer">
                            <span class="w-10 inline-block"><i style="color: #6366F1"
                                    class="fas fa-users mr-2"></i></span><a class="" style="color: #6366F1"
                                href="">Users</a>
                        </li>
                        <li
                            class="item_has_submenu text-white py-1 nav_item_li nenu_open cursor-pointer transition-all duration-1000">
                            <span class="w-10 inline-block"><i style="color: #6366F1"
                                    class="fas fa-user mr-2"></i></span><span class="#" style="color: #6366F1">
                                <p style="display: inherit">Customer <i style="margin-top: 7px;"
                                        class="fas nav_icon float-right fa-plus"></i></p>
                            </span>
                            {{-- submenu --}}
                            <ul class="submenu_ul hidden">
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Reseller</a>
                                </li>
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Whole seller</a>
                                </li>
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">General customer</a>
                                </li>
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Special customer</a>
                                </li>
                            </ul>
                            {{-- submenu end --}}
                        </li>
                        <li class="text-white py-1 nav_item_li cursor-pointer">
                            <span class="w-10 inline-block"><i style="color: #6366F1"
                                    class="fas fa-user-tag mr-2"></i></span><a class="" style="color: #6366F1"
                                href="">Buyer</a>
                        </li>
                        <li class="text-white py-1 nav_item_li cursor-pointer">
                            <span class="w-10 inline-block"><i style="color: #6366F1"
                                    class="fas fa-cog mr-2"></i></span><a class="" style="color: #6366F1"
                                href="">Settings</a>
                        </li>
                        <li class="text-white py-1 nav_item_li item_has_submenu nenu_open cursor-pointer">
                            <span class="w-10 inline-block"><i style="color: #6366F1"
                                    class="fas fa-user mr-2"></i></span><span class="#" style="color: #6366F1">
                                <p style="display: inherit">Authers <i style="margin-top: 7px;"
                                        class="fas nav_icon float-right fa-plus"></i></p>
                            </span>
                            {{-- submenu --}}
                            <ul class="submenu_ul hidden">
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Shahin Alam</a>
                                </li>
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Sayem Khan</a>
                                </li>
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Ornaments</a>
                                </li>
                                <li class="py-1">
                                    <span class="w-10 inline-block"><i style="color: #6366F1"
                                            class="far fa-circle mr-2"></i></span><a class="" style="color: #6366F1"
                                        href="">Electric</a>
                                </li>
                            </ul>
                            {{-- submenu end --}}
                        </li>


                    </ul>
                </div>
            </div>
            <div class="w-4/5 ">
                {{-- main content --}}
                <div class="container-root" style="margin-top: 70px;">
                    <div class="p-4">
                        @yield('content')
                    </div>
                </div>
                {{-- main content end --}}
            </div>
        </div>
    </section>
    {{-- sidebar end --}}
    {{-- js --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://kit.fontawesome.com/bad080b564.js" crossorigin="anonymous"></script>
    <script>


    </script>
    @yield('script')
</body>

</html>
