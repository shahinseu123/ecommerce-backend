@extends('backend.layout.master')

@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col px-4 h-full">
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
@endsection

@section('head')
    <style>
    .dropzone {
    /* border: dotted; */
    min-height: 150px;
    border: 4px dashed #6366F1;
    background: white;
    padding: 20px 20px;
}
    </style>
@endsection

@section('script')
    <script>
       $("div#myId").dropzone({ url: "/file/post" });
    </script>
@endsection