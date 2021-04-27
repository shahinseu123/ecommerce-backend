<span class="overlay hidden">

</span>
{{-- modal --}}
<div style="position: fixed" class="relative child_modal shadow-xl bg-white p-5 hidden mt-10">
    <div class="flex justify-between">
        <div>
            <h2 class="font-semibold text-gray-700 text-4xl">Featured image</h2>
        </div>
        <div>
            <i class="croxx_btn cursor-pointer fas fa-times"></i>
        </div>
    </div>
    <hr>
    <nav class="flex flex-col sm:flex-row pt-4">
        <button
            class="click_recent_page  mb-2 px-6 block hover:text-blue-500 focus:outline-none border-b-2 border-blue-500 text-blue-500">
            Upload Files
        </button>
        <button
            class="click_all_page mb-2 px-6 block hover:text-blue-500 focus:outline-none  border-b-2 font-medium">
            Media Library
        </button>
    </nav>
    <div class="show_recent_page">
        <div class="text-center mt-5">
            {{-- <label class="px-5 py-2 border-2 border-gray-300 rounded cursor-pointer" for="news_img">Select Image</label> --}}
            <div class="w-full overflow-x-hidden border-t flex flex-col px-4 h-full">
                <div class="mt-4 rounded">
                    <form action="{{ route('backend.media.create') }}" id="myAwesomeDropzone"
                        class="dropzone rounded-lg border-4 border-green-700 border-dashed"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="fallback">
                            <input name="file" accept="image/" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="show_all_page hidden">
        <div class="image_main_div grid grid-cols-6 gap-2">

        </div>   
        <div class=" absolute py-2" style="bottom: 27px; right:20%;">
            <button style="position: absolute;width:200px"
                class="text-white btn-select-image rounded-full set_featured_image_btn  px-2 py-1 bg-green-500 border-2 border-gray-300 ">Set
                Featured Image</button>
        </div>
    </div>
   
</div>

{{-- end modal --}}