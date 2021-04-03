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
                    <h2 class="py-2 border-b-2 text-3xl uppercase text-gray-700 font-semibold">Login</h2>
    
                    {{-- form  --}}
                    <form action="{{route('admin.login.action')}}" method="POST">
                        @csrf
                        
                        <div class="mt-3">
                            <label for="email">Email <span class="text-red-500">*</span></label>
                            <input required value="{{old('email')}}" type="email" name="email" id="email" class="w-full py-2 input-border rounded pl-2">
                            @error('email')
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
                        <p class="mt-4">Not registered? <a class="text-blue-600" href="{{route('admin.register')}}">Register now</a></p>
                        <button type="submit" class="px-10 py-3 rounded text-white btn_primary font-semibold text-sm mt-3">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>