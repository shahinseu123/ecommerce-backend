<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Admin login</title>
</head>
<body>
    <section>
        <div class="container-x">
            <div class="mt-20">
                <div class="shadow-lg rounded-md p-5 login-card">
                    <h2 class="py-2 border-b-2 text-3xl uppercase text-gray-700 font-semibold">register</h2>
    
                    {{-- form  --}}
                    <form action="{{route('admin.register.action')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <input type="hidden" name="role" id="role" value="admin">
                            <label for="name">Name <span class="text-red-500">*</span></label>
                            <input required value="{{old('name')}}" type="text" name="name" id="name" class="w-full py-2 input-border rounded pl-2">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="email">Email <span class="text-red-500">*</span></label>
                            <input required value="{{old('email')}}" type="email" name="email" id="email" class="w-full py-2 input-border rounded pl-2">
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="phone">Phone <span class="text-red-500">*</span></label>
                            <input required value="{{old('phone')}}" type="number" name="phone" id="phone" class="w-full py-2 input-border rounded pl-2">
                            @error('phone')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="password">Password <span class="text-red-500">*</span></label>
                            <input required value="" type="password" name="password" id="password" class="w-full py-2 input-border rounded pl-2">
                            @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="password_confirmation">Confirm Password <span class="text-red-500">*</span></label>
                            <input required value="" type="password" name="password_confirmation" id="password" class="w-full py-2 input-border rounded pl-2">
                            @error('password_confirmation')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="px-10 py-3 rounded text-white btn_primary font-semibold text-sm mt-3">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>