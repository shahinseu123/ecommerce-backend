@extends('backend.layout.master')

@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col px-4">
    <div class="flex">
        <h3 class="text-2xl my-4">Media Library</h3>  
        <div>
            <button class="add_media mt-4 mx-4 px-5 py-1 text-sm font-semibold border-2 border-gray-200 rounded ">Add New</button>
            {{-- <button class="hidden cancel_add_media mt-4 mx-4 px-5 py-1 text-sm font-semibold border-2 border-gray-200 rounded bg-red-500 text-white">Cancel</button> --}}
        </div>
    </div>
    <div class="hidden show_add_media_image">
        <h1 class="mt-4 text-2xl text-gray-700">Upload New Media</h1>
        <p>JEPG, JPG, PNG supports only <span class="text-red-600"> * </span></p>
        <div class="mt-4 rounded">
            <form action="{{route('backend.media.create')}}" class="dropzone rounded-lg border-4 border-green-700 border-dashed" enctype="multipart/form-data">
             @csrf 
             <div class="fallback">
                <input name="file" accept="image/" type="file" multiple />
              </div>
            </form>
        </div>
    </div>
    <div class="py-2 bg-white shadow-md">
       <button class="delete_media mx-4 px-5 py-1 text-sm font-semibold border-2 border-gray-200 rounded ">Bulk Select</button>
       <button class="cancel_delete_media hidden mx-4 px-5 py-1 text-sm font-semibold border-2 border-gray-200 rounded bg-yellow-500 text-white">Cancel</button>
       <button type="submit" class="action_delete_media hidden mx-4 px-5 py-1 text-sm font-semibold border-2 border-gray-200 rounded bg-red-500 text-white">Delete</button>
    </div>
    <div class="m-2">
       <div class="grid grid-cols-8 gap-2">
           @if ($media)
               @foreach($media as $item)
                  <div class="check_and_img">
                      <form id="delete_media_form" action="{{route('backend.media.delete')}}" method="get">
                          @csrf
                          <input  type="checkbox" class="media_img_class hidden check_boxes form-checkbox h-5 w-5 text-red-600" name="image_id[]"  value="{{$item->id}}">
                        </form>
                      <img class="w-full h-32 object-cover" src="{{asset('/uploads/media/'.$item->media_image)}}" alt="">
                  </div>
               @endforeach
           @endif
       </div>
    </div>
</div>  
@endsection

@section('head')
    <style>
        .check_and_img{
            position: relative;
        }
        .check_boxes{
            position: absolute;
            top: 5px;
            left: 5px;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).on('click', '.add_media', () => {
            $('.show_add_media_image').removeClass('hidden')
        })
        $(document).on('click', '.delete_media', () => {
            $('.check_boxes').removeClass('hidden');
            $('.cancel_delete_media').removeClass('hidden');
            $('.delete_media').addClass('hidden');
            $('.action_delete_media').removeClass('hidden');
        })
        $(document).on('click', '.cancel_delete_media', () => {
            $('.check_boxes').addClass('hidden');
            $('.cancel_delete_media').addClass('hidden');
            $('.delete_media').removeClass('hidden');
            $('.action_delete_media').addClass('hidden');
        })
       $(document).on('click', '.action_delete_media', (event) => {
            var searchIDs = $('input:checked').map(function(){
                return $(this).val();
            });
            var image_id = searchIDs.get();
             $.ajax({
                type:'GET',
                 url: "{{route('backend.media.delete')}}",
                 data: {
                     _token: "{{ csrf_token() }}",
                     image_id: image_id
                 },
                 success: (response) => {
                    // alert(response.message)
                    location.reload()
                 }
             })
        });
    </script>
@endsection