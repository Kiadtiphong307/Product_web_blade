<style>
    .container {

        width: 1240px;
    }
</style>
<x-guest-layout>
    <x-authentication-card>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="items-center justify-center text-center" style="font-size: 1.5rem; font-weight: bold;">
            เข้าสู่ระบบ
        </div>
        <div class="items-center justify-center text-center mb-5" style="color: #979797;">
            ขอให้เป็นวันที่ดีสำหรับทุกๆท่าน🙂
        </div>

        <div class="container flex justify-center items-center ">
            <div class="box-1 mr-5 justify-center w-full">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('อีเมล') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('รหัสผ่าน') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <div class="block mt-4 flex justify-between">
                        <label for="remember_me" class="flex items-center mr-5">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Rememberme') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline ml-12 items-center justify-center text-sm text-gray-600 hover:text-gray-90 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 place-self-start"
                                style="width: 100%;" href="{{ route('password.request') }}">
                                {{ __('ลืมรหัสผ่าน') }}
                            </a>
                        @endif
                    </div>


                    <div class="items-center justify-end mt-4">

                        <x-button class="items-center justify-center text-center" style="width: 100%;">
                            {{ __('เข้าสู่ระบบ') }}
                        </x-button>

                        <x-button-register class="items-center justify-center text-center" style="width: 100%;">
                            <a href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                        </x-button-register>


                    </div>
                </form>
            </div>
            <div class="box-2 justify-center ml-5 w-full">
                <img class="w-full object-cover"
                    src="https://images.unsplash.com/photo-1592195241273-5c30d3935d8c?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="">
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>

<style>
    .box-2 img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
    }
</style>
