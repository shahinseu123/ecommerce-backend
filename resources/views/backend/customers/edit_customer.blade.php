@extends('backend.layout.master')

@section('title')
    <title>Customers</title>
@endsection

@section('content')
    <section>
        @include('backend.inc.media_modal')
        <h1 class="text-3xl font-semibold uppercase text-gray-600">Customers</h1>
        @if ($customer)
          <form action="{{route("customer.update")}}" method="post">
            @csrf
            <div class="md:flex lg:flex xl:flex gap-4 mt-4">
                <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/3">
                    <div class="shadow-lg bg-white rounded p-4">
                        <div class="lg:grid xl:grid lg:grid-cols-3 xl:grid-cols-3 gap-3">
                            <div>
                                <label for="name">Name <span class="text-red-500">*</span></label>
                                <input type="hidden" name="id" required id="id" value="{{$customer->id}}">
                                <input type="text" name="name" required id="name" value="{{$customer->name}}" class="input-border rounded px-2 py-2 w-full mt-2">
                                 @error('name')
                                   <div class="text-red-500">{{ $message }}</div>
                                 @enderror
                            </div>
                            <div>
                                <label for="email">Email <span class="text-red-500">*</span></label>
                                <input type="text" name="email" required id="email" value="{{$customer->email}}" class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('email')
                                  <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="phone">Phone <span class="text-red-500">*</span></label>
                                <input type="number" name="phone" required id="phone" value="{{$customer->phone}}" class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('phone')
                                  <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="street">Street <span class="text-red-500">*</span></label>
                            <input type="text" name="street" required value="{{$customer->street}}" id="street" class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('street')
                                  <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="lg:grid xl:grid lg:grid-cols-4 xl:grid-cols-4 gap-3 mt-2">
                            <div>
                                <label for="zip">Zip <span class="text-red-500">*</span></label>
                                <input type="number" name="zip" value="{{$customer->zip}}" required id="zip" class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('zip')
                                  <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="city">City <span class="text-red-500">*</span></label>
                                <input type="text" name="city" value="{{$customer->city}}" required id="city" class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('city')
                                  <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="state">State <span class="text-red-500">*</span></label>
                                <input type="text" name="state" value="{{$customer->state}}" required id="state" class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('state')
                                  <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="country">Country <span class="text-red-500">*</span></label>
                                <input type="text" name="country" value="{{$customer->country}}" required id="country" class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('country')
                                   <div class="text-red-500">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3">
                    <div class="bg-white shadow-lg rounded p-4 mb-4">
                        <div class="w-full sssss-nav pb-4 click_post_btn cursor-pointer">
                            <h1 class="text-center py-2 border-b-2 border-gray-300 font-semibold mb-1">Featured image</h1>
                            <div class="w-full sssss">
                                <img class="w-full object-cover h-48 cursor-pointer" id="category-img-tag"
                                    src="{{$customer->image_path}}"
                                    alt="img">
                                <input type="hidden" value="" name="customer_image" id="news_img" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded p-4 mb-4">
                        <div>
                            <label for="password">Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password" required id="password" class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('password')
                                   <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation">Confirm Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" required id="password_confirmation" class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('password_confirmation')
                                   <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="border-t-2 border-gray-300">
                            <button class="w-full py-2 text-white  btn_secondary rounded shadow-lg mt-3 m" type="submit">UPDATE</button>
                            <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                        </div>
                    </div>
                </div>
            </div>
          </form>    
        @endif
    </section>
@endsection

@section('head')
    
@endsection

@section('script')
    <script>
      // editor end 
 $(document).on('click', '.croxx_btn', () => {
    $('.child_modal').addClass('hidden')
    $('.overlay').addClass('hidden')
    $('html, body').css({
        overflow: '',
        height: '100%'
    })
})
$(document).on('click', '.click_post_btn', () => {
    $('.child_modal').removeClass('hidden')
    $('.overlay').removeClass('hidden')
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    })
})

$(document).on('click', '.btn-select-image', function(){
    $('html, body').css({
        overflow: '',
        height: '100%'
    })
})

$(document).on('click', '.click_recent_page', function() {
    $('.show_all_page').addClass('hidden')
    $('.show_recent_page').removeClass('hidden')
    $('.click_recent_page').addClass('border-blue-500 text-blue-500')
    $('.click_all_page').removeClass('border-blue-500 text-blue-500')
})
$(document).on('click', '.click_all_page', function() {
    $('.show_all_page').removeClass('hidden')
    $('.show_recent_page').addClass('hidden')
    $('.click_all_page').addClass('border-blue-500 text-blue-500')
    $('.click_recent_page').removeClass('border-blue-500 text-blue-500')
})
//end model
function getDataByAjwx() {
    $.ajax({
        url: "{{ route('backend.media.ajex') }}",
        success: (response) => {
            let html = ''
            response.forEach(element => {
                html += '<div class="check_and_img  relative">'
                html += '<input type="checkbox" id="media_image_box" data-id="' + element.id +
                    '" value="' + element.media_image +
                    '" class="subject-list absolute inset-0.5 form-checkbox h-5 w-5 text-yellow-600 media_image_box">'
                html +=
                    '<span class=" media_image_all"><img class=" image_uploaded w-full h-28 object-cover" src="/uploads/media/' +
                    element.media_image + '" alt="Media iamge"><span>'
                html += '</div>'
            });
            $('.image_main_div').html(html)
        }
    })
}
getDataByAjwx()
// end
//click image
$(document).on('click', '.media_image_all', function() {
    $('.media_image_box').prop('checked', false);
    $('.image_uploaded').removeClass('border-4 border-blue-400')
    $(this).closest('div').find('.image_uploaded').addClass('border-4 border-blue-400')
    $(this).closest('div').find('.media_image_box').prop('checked', true)
})
//checkbox click
$(document).on('change', '.media_image_box', function() {
    $('.media_image_box').not(this).prop('checked', false);
});
// end
$(document).on('click', '.set_featured_image_btn', (event) => {
    $('.child_modal').addClass('hidden')
    $('.overlay').addClass('hidden')
    var searchIDs = $('#media_image_box:checked').map(function() {
        return $(this).val();
    });
    var image_id = searchIDs.get().toString();
    $('#news_img').val(image_id)
    $('#category-img-tag').attr('src', 'http://127.0.0.1:8000/uploads/media/' + image_id);
});

Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 5, // MB
    init: function() {
        this.on("success", function(file) {
            $('.show_all_page').removeClass('hidden')
            $('.show_recent_page').addClass('hidden')
            $('.click_all_page').addClass('border-blue-500 text-blue-500')
            $('.click_recent_page').removeClass('border-blue-500 text-blue-500')
            getDataByAjwx()
            setTimeout(() => {
                $('#media_image_box').prop("checked", true)
            }, 500)
        });
    }
};
    </script>
@endsection