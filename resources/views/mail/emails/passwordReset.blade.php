<section>
    <div style="background:#EDEDED;max-width: 1000px;width: 900px;margin: auto;padding: 20px">
        <h1 style="text-align: center;font-size: 40px;font-weight: bold;">Welcome to webGiant</h1>
        <div style="text-align: center;">

            <img style="height: 60px;display: inline-block;text-align: center;"
                src="{{ asset('img/webgiant_logo.png') }}" alt="logo">
        </div>
        <hr>
        <div style="margin-top: 20px;">
            <p style="font-weight: 800;font-size: 20px;">To recover your password we have sent you a code below, please
                put the code inside the password reset code field in the Website. Then reset the password and remember
                it.</p>
            <div style="text-align: center;">

                <button disabled
                    style="padding:10px 30px;margin: auto 20px;background-color: lightseagreen;color: white;border-radius: 4px;border: none;">{{ $token }}</button>
            </div>
        </div>
        <p style="font-weight: 800;font-size: 20px;">Thanks, </p>
        <p style="font-weight: 800;font-size: 20px;">Web Giant team </p>
    </div>
</section>
