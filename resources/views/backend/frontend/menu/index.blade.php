@extends('backend.layout.master')

@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col px-4">
    <div class="mt-4 mb-2 p-4 bg-white shadow-md">
        <form action="{{route('backend.menu')}}" method="GET">
            <span>Select a menu to edit:</span>
            @if ($menu !== null)
                <select name="menu" class="px-2 py-2 border-2 border-gray-200 rounded" id="menu_id">
                    <option value="" selected>--Select Menu--</option>
                    @foreach ($menu as $item)
                        {{-- <option {{$letest_menu->menu_name == $item->menu_name ? 'selected':''}} value="{{$item->menu_name}}">{{$item->menu_name}}</option> --}}
                        <option value="{{$item->id}}" {{request('menu') == $item->id ? 'selected' : ''}}>{{$item->menu_name}}</option>
                    @endforeach
                </select>
            @else
                <span class="text-red-500">No menu created yet</span>
            @endif

            <button class="px-4 py-2 bg-green-500 select_menu text-white rounded shadow-md">SELECT</button>
       </form>
    </div>
    <div class="md:flex lg:flex xl:flex gap-2">
        <div class="sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4">
            {{-- <div class=" no_menu_selected bg-white shadow-md p-2 mb-2 mt-4">
                <h3 class="text-yellow-500 text-center text-2xl uppercase">No menu selected</h3>
                <p class="text-green-500 text-center">Please select a menu to edit</p>
            </div> --}}

            <div class="show_all_options shadow-md p-3 mt-4 bg-white">
                <h3 class="uppercase pb-2 text-xl">Add menu items</h3>
                <hr>
                <ul class="bg-white w-full">
                    <li class="click_show_page py-2 px-2 border-b-2 border-gray-200 flex justify-between">Category <i class="fas fa-angle-right text-right block"></i></li>
                    <li class="click_hide_page hidden py-2 px-2 border-b-2 border-gray-200 flex justify-between">Category <i class="fas fa-angle-down text-right block"></i></li>
                    <div class="show_page hidden p-2 border-b-2 border-gray-200">
                        <nav class="flex flex-col sm:flex-row pt-4">
                            <button class="click_recent_page  mb-2 px-6 block hover:text-blue-500 focus:outline-none border-b-2 border-blue-500 text-blue-500">
                              Most recent
                            </button>
                            <button class="click_all_page mb-2 px-6 block hover:text-blue-500 focus:outline-none  border-b-2 font-medium">
                              View all
                            </button>
                        </nav>
                        <div class="show_recent_page">
                           @if ($recent_category)
                                   <form action="{{route('backend.menu-item.add')}}" method="post">
                                        @csrf
                                       <input type="hidden" name="menu_name" class="wild_memu_item_id" >
                                       <ul>
                                            @foreach ($recent_category as $item)
                                                <li>
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" name="menu_item[]" value="{{$item->category_title}}" class="form-checkbox h-5 w-5 text-gray-600"><span class="ml-2 text-gray-700">{{$item->category_title}}</span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <hr>
                                        <button class="px-2 py-1 mt-2 bg-green-500 text-white shadow-md rounded">ADD TO MENU</button>
                                   </form>
                           @endif
                        </div>
                        <div class="show_all_page hidden">
                            @if ($category_all)
                                    <form action="{{route('backend.menu-item.add')}}" method="post">
                                     @csrf
                                    <input type="hidden" name="menu_name" class="wild_memu_item_id" >
                                       <ul>
                                            @foreach ($category_all as $item)
                                                <li>
                                                    <label class="inline-flex items-center mt-3">
                                                        <input type="checkbox" name="menu_item[]" value="{{$item->category_title}}" class="form-checkbox h-5 w-5 text-gray-600"><span class="ml-2 text-gray-700">{{$item->category_title}}</span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <hr>
                                        <button class="px-2 py-1 mt-2 bg-green-500 text-white shadow-md rounded">ADD TO MENU</button>
                                   </form>
                           @endif
                        </div>
                    </div>
                   
                    <li class="py-2 px-2 click_show_custom_link border-b-2 border-gray-200 flex justify-between">Custom link <i class="fas fa-angle-right text-right block"></i></li>
                    <li class="py-2 px-2 click_hide_custom_link hidden border-b-2 border-gray-200 flex justify-between">Custom link <i class="fas fa-angle-down text-right block"></i></li>
                    <div class="show_custom_link hidden p-2 border-b-2 border-gray-200">    
                        <div>
                           <form action="{{route('backend.add.link.action')}}" method="post">
                            @csrf
                               <input type="hidden" name="menu_name" class="wild_memu_item_id" >
                               <label for="menu_item">Label</label>
                               <input type="text" required name="menu_item" id="menu_item" value="{{old('menu_item')}}" class="w-full border-2 border-gray-200 px-2 py-1">
                               <label for="">URL</label>
                               <input type="text" required name="link" id="link" value="{{old('link')}}" class="w-full border-2 border-gray-200 px-2 py-1 mb-2">
                               <hr>
                               <button class="px-2 py-1 mt-2 bg-green-500 text-white shadow-md rounded">ADD TO MENU</button>
                           </form>
                        </div>
                    </div>
                    </div>
                    
                </ul>
            </div>

            {{-- @endif --}}
            <div class="sm:w-full md:w-3/4 lg:w-3/4 xl:w-3/4 shadow-xl">
               <div class="bg-white mt-4 w-full p-2">
                   <form id="menuform" action="{{route('backend.menu.create')}}" method="POST">
                       @csrf
                         <div class="flex justify-between mb-2">
                           <div>
                                <input type="hidden" id="menu_wild_id" value="" name="menu_wild_id">
    
                                <label for="menu_name">Menu Name</label>
                                @if ($selected_menu !== null)
                                    <input type="text" required name="menu_name" value="{{$selected_menu->menu_name}}" id="menu_name" class="rounded py-1 px-2 mx-2 border-2 border-gray-200">
                                @else
                                    <input type="text" required name="menu_name" value="" id="menu_name" class="rounded py-1 px-2 mx-2 border-2 border-gray-200">
                                @endif
                           </div>
                           <div>
                               <button {{$selected_menu !== null?'disabled': '' }} class=" {{$selected_menu !== null?'bg-gray-300': 'bg-green-600' }} px-4 py-1  text-white rounded shadow-md">CREATE MENU</button>
                           </div>
                        </div>
                    </form>
                    <hr>
                    <div>
                        <p class="text-sm my-2">Drag the items into the order you prefer. Click the arrow on the right of the item to reveal additional configuration options.</p>
                        <div class="my-5" style="500px">
    
                              <div class="dd" id="nestable">
            
    
                                    <ol class="dd-list">
                                      @foreach ($menu_items as $menu_item)
                                        <li class="dd-item relative-li flex" data-id="{{$menu_item->id}}">
                                            <span class="click_to_get_item_id" style="position: absolute;
                                                                                        left: 305px;
                                                                                        top: 3px;
                                                                                        cursor: pointer;">x</span>
                                            <div class="dd-handle w-80 border-2 border-gray-200 py-2 my-1" > {{$menu_item->item_name}} </div>
                                            @if(count($menu_item->Children))
                                                <ol class="dd-list">
                                                    @foreach ($menu_item->Children as $children_1)
                                                        <li class="dd-item" data-id="{{$children_1->id}}">
                                                        <span class="click_to_get_item_id" style="position: absolute;
                                                                                        left: 305px;
                                                                                        top: 3px;
                                                                                        cursor: pointer;">x</span>
                                                            <div class="dd-handle w-80 border-2 border-gray-200 py-2 my-1">{{$children_1->item_name}} <i class="click_to_get_item_id block float-right fas fa-times"></i></div>
    
                                                            @if(count($children_1->Children))
                                                                <ol class="dd-list">
                                                                    @foreach ($children_1->Children as $children_2)
                                                                        <li class="dd-item" data-id="{{$children_2->id}}">
                                                                        <span class="click_to_get_item_id" style="position: absolute;
                                                                                        left: 305px;
                                                                                        top: 3px;
                                                                                        cursor: pointer;">x</span>
                                                                            <div class="dd-handle w-80 border-2 border-gray-200 py-2 my-1">{{$children_2->item_name}} <i class="click_to_get_item_id block float-right fas fa-times"></i></div>
    
                                                                            @if(count($children_2->Children))
                                                                                <ol class="dd-list">
                                                                                    @foreach ($children_2->Children as $children_3)
                                                                                        <li class="dd-item" data-id="{{$children_3->id}}">
                                                                                        <span class="click_to_get_item_id" style="position: absolute;
                                                                                        left: 305px;
                                                                                        top: 3px;
                                                                                        cursor: pointer;">x</span>
                                                                                            <div class="dd-handle w-80 border-2 border-gray-200 py-2 my-1">{{$children_3->item_name}} <i class="click_to_get_item_id block float-right fas fa-times"></i></div>
    
                                                                                            @if(count($children_3->Children))
                                                                                                <ol class="dd-list">
                                                                                                    @foreach ($children_3->Children as $children_4)
                                                                                                        <li class="dd-item" data-id="{{$children_4->id}}">
                                                                                                            <div class="dd-handle w-80 border-2 border-gray-200 py-2 my-1">{{$children_4->item_name}} <i class="click_to_get_item_id block float-right fas fa-times"></i></div>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ol>
                                                                                            @endif
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ol>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ol>
                                                            @endif
                                                        </li>
    
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </li>
                                      @endforeach
                                    </ol>
                              </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between mt-2">
                        <div>
                            <form action="{{route('backend.menu.delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="menu_name" id="wildcard_id">
                                <button class="text-red-600 underline" type="submit">Delete menu</button>
                            </form>
                        </div>
                        <div>
                            <form action="{{route('backend.menu-item.updatePosition')}}" method="POST">
                                @csrf
                                <input id="nestable-output" name="json" type="hidden">
    
                                <button class="px-4 py-1 bg-green-500 text-white rounded shadow-md">SAVE MENU</button>
                            </form>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('head')
<style>
    /* .cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
* html .cf { zoom: 1; }
*:first-child+html .cf { zoom: 1; }

html { margin: 0; padding: 0; }
body { font-size: 100%; margin: 0; padding: 1.75em; font-family: 'Helvetica Neue', Arial, sans-serif; } */

h1 { font-size: 1.75em; margin: 0 0 0.6em 0; }

a { color: #2996cc; }
a:hover { text-decoration: none; }

p { line-height: 1.5em; }
.small { color: #666; font-size: 0.875em; }
.large { font-size: 1.25em; }

/**
* Nestable
*/

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
background: #fafafa;
background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
background:         linear-gradient(top, #fafafa 0%, #eee 100%);
-webkit-border-radius: 3px;
        border-radius: 3px;
box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                  -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                     -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                          linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
background-size: 60px 60px;
background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
-webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

/**
* Nestable Extras
*/

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

#nestable2 .dd-handle {
color: #fff;
border: 1px solid #999;
background: #bbb;
background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }

/* @media only screen and (min-width: 700px) {

.dd { float: left; width: 48%; }
.dd + .dd { margin-left: 2%; }

} */

.dd-hover > .dd-handle { background: #2ea8e5 !important; }

/**
* Nestable Draggable Handles
*/

.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
background: #fafafa;
background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
background:         linear-gradient(top, #fafafa 0%, #eee 100%);
-webkit-border-radius: 3px;
        border-radius: 3px;
box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
border: 1px solid #aaa;
background: #ddd;
background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
background:         linear-gradient(top, #ddd 0%, #bbb 100%);
border-top-right-radius: 0;
border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }

/**
* Socialite
*/

.socialite { display: block; float: left; height: 35px; }
</style>
@endsection

@section('script')
<script>
    // $('.dd').nestable('serialize');
    $(document).ready(function() {
        var updateOutput = function(e) {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');

            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));
            }
        };

        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1
        })
        .on('change', updateOutput);


        // output initial serialised data to textarea
        updateOutput(
            $('#nestable').data('output',
            $('#nestable-output'))
        );
    });

    $(document).on('click', '.click_to_get_item_id', function(){
        console.log('clicked')
        let item_id = $(this).closest('li').attr('data-id')
        $.ajax({
        url: "{{ route('backend.single-menu-item.delete') }}",
        type: 'GET',
        data: {item_id},
        success: (response) => {
            location.reload()
         }
       })
    })

    //    var oldContainer;
    //         $("ol.nested_with_switch").sortable({
    //         group: 'nested',
    //         afterMove: function (placeholder, container) {
    //             if(oldContainer != container){
    //             if(oldContainer)
    //                 oldContainer.el.removeClass("active");
    //             container.el.addClass("active");

    //             oldContainer = container;
    //             }
    //         },
    //         onDrop: function ($item, container, _super) {
    //             container.el.removeClass("active");
    //             _super($item, container);
    //         }
    //         });

    //         $(".switch-container").on("click", ".switch", function  (e) {
    //         var method = $(this).hasClass("active") ? "enable" : "disable";
    //         $(e.delegateTarget).next().sortable(method);
    //         });
        // $('.ui-state-default').css('left', function(){
        //     if ('left' > 630+"px"){
        //         return 'red';
        //     }
        //     else {
        //         return 'purple';
        //     }
        // });
        // let val = $('.select_menu').val()
        // if(val === ''){
        //     alert("Pleaase select a item")
        // }



        // /////////////////////////////////////////////////////////Commeny by Sate /////////////////////////////////////
        $(document).on('click', '.select_menu', function(){
            let menu_name = $('#menu_id').val();
            // $('#menu_name').val(menu_name);
            $('#menu_wild_id').val(menu_name);
            $('#wildcard_id').val(menu_name);
        //     $('.no_menu_selected').addClass('hidden')
        //     $('.show_all_options').removeClass('hidden')
            $('.wild_memu_item_id').val(menu_name);
        });
        let menu_name_c = $('#menu_id').val();
        // $('#menu_name').val(menu_name_c);
        $('#menu_wild_id').val(menu_name_c);
        $('#wildcard_id').val(menu_name_c);
        $('.wild_memu_item_id').val(menu_name_c);






        // import Swal from 'sweetalert2';
        //ajex
        // $('#menuform').on('submit',function(event){
        // event.preventDefault();

        // let menu_name = $('#menu_name').val();
        // let route = "{{route('backend.menu.create')}}"
        // $.ajax({
        //   url: route,
        //   type:"POST",
        //   data:{
        //     "_token": "{{ csrf_token() }}",
        //     menu_name:menu_name,
        //   },
        //   success:function(response){

        //   },
        //  });
        // });
        // // end ajex
        //  $( function() {
        //     $( "#sortable" ).sortable({
        //         update: function(){
        //             $(this).children().each(function(index){
        //                 console.log(index)
        //             })
        //         }
        //     });
        // });
        //page
        $(document).on('click', '.click_show_page', function(){
            $('.show_page').removeClass('hidden')
            $('.click_hide_page').removeClass('hidden')
            $('.click_show_page').addClass('hidden')
            //hide posts, custom link, categories
            $('.show_posts').addClass('hidden')
            $('.show_custom_link').addClass('hidden')
            $('.show_categories').addClass('hidden')
            //hide btn down
            $('.click_hide_posts').addClass('hidden')
            $('.click_show_posts').removeClass('hidden')
            $('.click_hide_custom_link').addClass('hidden')
            $('.click_show_custom_link').removeClass('hidden')
            $('.click_hide_categories').addClass('hidden')
            $('.click_show_categories').removeClass('hidden')
        })
        $(document).on('click', '.click_hide_page', function(){
            $('.show_page').addClass('hidden')
            $('.click_hide_page').addClass('hidden')
            $('.click_show_page').removeClass('hidden')
        })
        //post
        $(document).on('click', '.click_show_posts', function(){
            $('.show_posts').removeClass('hidden')
            $('.click_hide_posts').removeClass('hidden')
            $('.click_show_posts').addClass('hidden')
            //hide page, custom link, category
            $('.show_page').addClass('hidden')
            $('.show_custom_link').addClass('hidden')
            $('.show_categories').addClass('hidden')
            //hide btn-down
            $('.click_hide_page').addClass('hidden')
            $('.click_show_page').removeClass('hidden')
            $('.click_hide_custom_link').addClass('hidden')
            $('.click_show_custom_link').removeClass('hidden')
            $('.click_hide_categories').addClass('hidden')
            $('.click_show_categories').removeClass('hidden')
        })
        $(document).on('click', '.click_hide_posts', function(){
            $('.show_posts').addClass('hidden')
            $('.click_hide_posts').addClass('hidden')
            $('.click_show_posts').removeClass('hidden')
        })
        //custom link
        $(document).on('click', '.click_show_custom_link', function(){
            $('.show_custom_link').removeClass('hidden')
            $('.click_hide_custom_link').removeClass('hidden')
            $('.click_show_custom_link').addClass('hidden')
            //hide page, posts, categories
            $('.show_page').addClass('hidden')
            $('.show_posts').addClass('hidden')
            $('.show_categories').addClass('hidden')
            //hide btn-down
            $('.click_hide_page').addClass('hidden')
            $('.click_show_page').removeClass('hidden')
            $('.click_hide_posts').addClass('hidden')
            $('.click_show_posts').removeClass('hidden')
            $('.click_hide_categories').addClass('hidden')
            $('.click_show_categories').removeClass('hidden')
        })
        $(document).on('click', '.click_hide_custom_link', function(){
            $('.show_custom_link').addClass('hidden')
            $('.click_hide_custom_link').addClass('hidden')
            $('.click_show_custom_link').removeClass('hidden')
        })
        //categories
        $(document).on('click', '.click_show_categories', function(){
            $('.show_categories').removeClass('hidden')
            $('.click_hide_categories').removeClass('hidden')
            $('.click_show_categories').addClass('hidden')
            //hide page, posts, custom link
            $('.show_page').addClass('hidden')
            $('.show_posts').addClass('hidden')
            $('.show_custom_link').addClass('hidden')
            //hide btn-down
            $('.click_hide_page').addClass('hidden')
            $('.click_show_page').removeClass('hidden')
            $('.click_hide_posts').addClass('hidden')
            $('.click_show_posts').removeClass('hidden')
            $('.click_hide_custom_link').addClass('hidden')
            $('.click_show_custom_link').removeClass('hidden')
        })
        $(document).on('click', '.click_hide_categories', function(){
            $('.show_categories').addClass('hidden')
            $('.click_hide_categories').addClass('hidden')
            $('.click_show_categories').removeClass('hidden')
        })
        //show recent page
        $(document).on('click', '.click_recent_page', function(){
           $('.show_all_page').addClass('hidden')
           $('.show_recent_page').removeClass('hidden')
           $('.click_recent_page').addClass('border-blue-500 text-blue-500')
           $('.click_all_page').removeClass('border-blue-500 text-blue-500')
        })
        $(document).on('click', '.click_all_page', function(){
           $('.show_all_page').removeClass('hidden')
           $('.show_recent_page').addClass('hidden')
           $('.click_all_page').addClass('border-blue-500 text-blue-500')
           $('.click_recent_page').removeClass('border-blue-500 text-blue-500')
        })
        //show recent posts
        $(document).on('click', '.click_recent_posts', function(){
           $('.show_all_posts').addClass('hidden')
           $('.show_recent_posts').removeClass('hidden')
           $('.click_recent_posts').addClass('border-blue-500 text-blue-500')
           $('.click_all_posts').removeClass('border-blue-500 text-blue-500')
        })
        $(document).on('click', '.click_all_posts', function(){
           $('.show_all_posts').removeClass('hidden')
           $('.show_recent_posts').addClass('hidden')
           $('.click_all_posts').addClass('border-blue-500 text-blue-500')
           $('.click_recent_posts').removeClass('border-blue-500 text-blue-500')
        })
        //show recent custom link
        $(document).on('click', '.click_recent_custom_link', function(){
           $('.show_all_custom_link').addClass('hidden')
           $('.show_recent_custom_link').removeClass('hidden')
           $('.click_recent_custom_link').addClass('border-blue-500 text-blue-500')
           $('.click_all_custom_link').removeClass('border-blue-500 text-blue-500')
        })
        $(document).on('click', '.click_all_custom_link', function(){
           $('.show_all_custom_link').removeClass('hidden')
           $('.show_recent_custom_link').addClass('hidden')
           $('.click_all_custom_link').addClass('border-blue-500 text-blue-500')
           $('.click_recent_custom_link').removeClass('border-blue-500 text-blue-500')
        })
        //show recent categories
        $(document).on('click', '.click_recent_categories', function(){
           $('.show_all_categories').addClass('hidden')
           $('.show_recent_categories').removeClass('hidden')
           $('.click_recent_categories').addClass('border-blue-500 text-blue-500')
           $('.click_all_categories').removeClass('border-blue-500 text-blue-500')
        })
        $(document).on('click', '.click_all_categories', function(){
           $('.show_all_categories').removeClass('hidden')
           $('.show_recent_categories').addClass('hidden')
           $('.click_all_categories').addClass('border-blue-500 text-blue-500')
           $('.click_recent_categories').removeClass('border-blue-500 text-blue-500')
        })
    </script>
@endsection
