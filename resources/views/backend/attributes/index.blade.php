@extends('backend.layout.master')

@section('title')
   <title>Attribute</title> 
@endsection

@section('content')
    {{-- modal  --}}
            <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="hidden edit-attribute-modal  z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
           
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <form class="form-update-item" action="{{route('attrinute.item.update')}}" method="post"> 
                @csrf     
                <div class="">
                    
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-2xl uppercase font-semibold leading-6  text-gray-600 border_secondary mb-3 pb-3" id="modal-title">
                        Update Attribute Item
                    </h3>
                    <div class="mt-2">
                        
                           
                            <label for="item_name">Item Name</label>
                            <div>
                                <input type="hidden" name="id" id="id" class="item_id_class">
                                <input class="attribute-item-input input-border rounded px-2 py-2 w-full mt-2" type="text" name="item_name" id="item_name" required >
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="btn-submit w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Update
                </button>
                <button type="button" class="btn-cancel mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                </div>
            </form>
            </div>
            </div>
        </div>
    {{-- modal end --}}
    <div class="hidden edit-attribute-main-modal  z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
       
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <form class="form-update-attr" action="{{route('attribute.update')}}" method="post"> 
            @csrf     
            <div class="">
                
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-2xl uppercase font-semibold leading-6  text-gray-600 border_secondary mb-3 pb-3" id="modal-title">
                    Update Attribute
                </h3>
                <div class="mt-2">
                    
                       
                        <label for="attr_name">Attribute Name</label>
                        <div>
                            <input type="hidden" name="id" id="id" class="item_id_class">
                            <input class="attribute-item-input input-border rounded px-2 py-2 w-full mt-2" type="text" name="attr_name" id="attr_name" required >
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="btn-submit-attr w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-secondary text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Update
            </button>
            <button type="button" class="btn-cancel mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
            </div>
        </form>
        </div>
        </div>
    </div>
    {{--modal 2 --}}
    <section>
        <h1 class="text-3xl font-semibold text-gray-600 uppercase ">Attributes</h1>
        <div class="lg:flex xl:flex gap-4 mt-5">
           <div class="w-full lg:w-1/3 xl:w-1/3">
              <div class="shadow-lg p-4 rounded bg-white">
                 <h1 class="text-2xl mb-3 font-semibold text-gray-600 border-bottom-secondary pb-3 uppercase">Create attribute</h1>
                 <form action="{{route('backend.attribute.add')}}" method="POST">
                     @csrf
                     <label for="attr_name">Attribute name <span class="text-red-500">*</span></label>
                     <div>
                         <input class="input-border rounded px-2 py-2 w-full mt-2" type="text" name="attr_name" id="attr_name" required >
                     </div>
                     <div class="border-t-2 border-gray-300">
                        <button class="w-full py-2 text-white  btn_secondary rounded shadow-lg mt-3 m" type="submit">CREATE</button>
                        <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                    </div>
                 </form>
              </div>
              <div class="shadow-lg p-4 rounded bg-white mt-4">
                <h1 class="text-2xl mb-3 font-semibold text-gray-600 border-bottom-secondary pb-3 uppercase">Create attribute item</h1>
                <form action="{{route('backend.attribute.add-item')}}" method="POST">
                    @csrf
                    <label for="attr_name">Attribute name <span class="text-red-500">*</span></label>
                    <div class="mb-2">
                        <select name="attr_id" id="attr_id" class="input-border rounded px-2 py-2 w-full mt-2">
                            <option value="" selected>--Select attribute--</option>
                            @if ($attr)
                                @foreach ($attr as $item)
                                    <option value="{{$item->id}}">{{$item->attr_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <label for="item_name">Item Name<span class="text-red-500">*</span></label>
                    <div>
                        <input class="input-border rounded px-2 py-2 w-full mt-2" type="text" name="item_name" id="item_name" required >
                    </div>
                    <div class="border-t-2 border-gray-300">
                       <button class="w-full py-2 text-white  btn_secondary rounded shadow-lg mt-3 m" type="submit">CREATE</button>
                       <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                   </div>
                </form>
             </div>
           </div>
           <div class="w-full lg:w-2/3 xl:w-2/3">
               <section class="bg-white">
                   <div class="p-4 shadow-lg rounded-lg">
                       <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                           <h1 class="text-2xl font-semibold text-gray-600 uppercase">Attribute list</h1>
                           {{-- <a href="{{route('backend.attribute.add')}}" class="uppercase px-5 py-2 btn_secondary rounded shadow-lg font-semibold"><i class="fas fa-plus "></i>Add attribute</a> --}}
                       </div>
                       <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                           <thead>
                               <tr>
                                   <th class="text-left" data-priority="1">#</th>
                                   <th class="text-left" data-priority="2">Name</th>
                                   <th class="text-left" data-priority="4">Items</th>
                                   <th class="text-left" data-priority="5">Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @if ($attr)
                                  @foreach ($attr as $item)
                                       <tr>
                                           <td>{{$item->id}}</td>
                                           <td>{{$item->attr_name}}</td>
                                           <td>
                                               @if ($item->AttributeItem)
                                                    <ul>
                                                        @foreach ($item->AttributeItem as $attr_item)
                                                                <li># {{$attr_item->item_name}} <span class="float-right"><i class="fas edit-attr-item fa-edit edit-attr-btn cursor-pointer" data-id="{{$attr_item->id}}"></i><i class="fas fa-trash text-red-500 cursor-pointer" data-id="{{$attr_item->id}}"></i></span></li>
                                                            @endforeach
                                                        </ul>
                                               @endif
                                           </td>
                                           
                                           <td class="">
                                               <i data-id="{{$item->id}}" class="cursor-pointer edit-arrtibute-btn fas fa-edit"></i>
                                               <a href="{{route('attribute.delete', $item->id)}}"><i data-id="{{$item->id}}" class="cursor-pointer fas fa-trash text-red-500"></i></a>
                                           </td>
                                       </tr>
                                  @endforeach 
                               @endif
                                     
                               <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                           </tbody>             
                       </table>
                   </div>
               </section>
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
        color: #4a5568; 			/*text-gray-700*/
        padding-left: 1rem; 		/*pl-4*/
        padding-right: 1rem; 		/*pl-4*/
        padding-top: .5rem; 		/*pl-2*/
        padding-bottom: .5rem; 		/*pl-2*/
        line-height: 1.25; 			/*leading-tight*/
        border-width: 2px; 			/*border-2*/
        border-radius: .25rem; 		
        border-color: #edf2f7; 		/*border-gray-200*/
        background-color: #edf2f7; 	/*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;	/*bg-indigo-100*/
    }
    
    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button		{
        font-weight: 700;				/*font-bold*/
        border-radius: .25rem;			/*rounded*/
        border: 1px solid transparent;	/*border border-transparent*/
    }
    
    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }
    
    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }
    
    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #667eea !important; /*bg-indigo-500*/
    }
    
  </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
			
			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

        // moodal
        $(document).on('click', '.edit-attr-btn', function(){
            $('.edit-attribute-modal').removeClass('hidden').addClass('fixed')
        })
        $(document).on('click', '.edit-arrtibute-btn', function(){
            $('.edit-attribute-main-modal').removeClass('hidden').addClass('fixed')
        })
        $(document).on('click', '.btn-cancel', function(){
            $('.edit-attribute-modal').addClass('hidden').removeClass('fixed')
        })

        // get data for edit
        $(document).on('click', '.edit-attr-item', function(){
            let data_id = $(this).attr('data-id')
            $.ajax({
                url: "{{route('attribute.item.edit')}}",
                data: {data_id},
                mathod: 'GET',
                success: function(response){
                   $('.attribute-item-input').val(response.item_name)
                   $('.item_id_class').val(response.id)
                }
            })
        })
        $(document).on('click', '.edit-arrtibute-btn', function(){
            let data_id = $(this).attr('data-id')
            $.ajax({
                url: "{{route('attribute.edit')}}",
                data: {data_id},
                mathod: 'GET',
                success: function(response){
                   $('.attribute-item-input').val(response.attr_name)
                   $('.item_id_class').val(response.id)
                }
            })
        })
        $(document).on('click', '.fa-trash', function(){
            let data_id = $(this).attr('data-id')
            $.ajax({
                url: "{{route('attribute.item.delete')}}",
                data: {data_id},
                mathod: 'GET',
                success: function(response){
                   location.reload()
                }
            })
        })
        //submit form
        $(document).on('click', '.btn-submit', function(){
            $('.form-update-item').submit()
        })
        $(document).on('click', '.btn-submit-attr', function(){
            $('.form-update-attr').submit()
        })
    </script>
@endsection