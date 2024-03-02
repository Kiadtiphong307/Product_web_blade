<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />
<div class="flex justify-items-center">
    <div class="w-full mr-10 justify-center">
        <form method="POST" action="{{ route('register') }}">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="font-weight: bold;" href="{{ route('login') }}">
                {{ __('ย้อนกลับ') }}
            </a>
            
            <div class="py-2">
                <h2 class="text-center">สมัครบัญชีผู้ใช้งาน</h2>
                <h3 class="text-center">ขอให้คุณพบแต่ความสุข</h3>
            </div>

            @csrf

            <div>
                <x-label for="name" value="{{ __('ชื่อผู้ใช้') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="กรอกชื่อผู้ใช้งานของคุณ" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('อีเมล') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="กรอกอีเมลของคุณ"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('รหัสผ่าน') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="กรอกรหัสผ่านของคุณ" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('ยืนยันรหัสผ่าน') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="กรอกรหัสผ่านของคุณอีกครั้ง" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="justify-end mt-4 flex flex-col">
                <x-button class="ms-4">
                    {{ __('สร้างบัญชี') }}
                </x-button>
            </div>
        </form>
    </div>
    <div class=" w-full justify-center mt-10 mb-5">
        <img src="https://images.unsplash.com/photo-1678263001211-b1c2f231b5e7?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" style="background-image">
    </div>
</div>
    </x-authentication-card>
</x-guest-layout>

<style>
    .x-authentication-card {
        display: flex;
        flex-direction: row;
    }
    .bg-cover {
        flex: 1;
    }
    form {
        flex: 1;
    }
    
    h2 {
        margin-top: 20px;
    }

    h3 {
        color: #666;
    }
 

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    h4 {
        margin-top: 10px;
        font-size: 150%;
        font-weight: bold;
    }
    h6 {
        margin-top: 10px;
    }
    .w-full img {
    width: 100%;
    height: 103%;
    object-fit: cover;
}
