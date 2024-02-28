<x-guest-layout>
    <x-authentication-card>

        <x-validation-errors class="mb-4" />
<div class="flex justify-items-center">
    <div class="w-full mr-10 justify-center">
        <form method="POST" action="{{ route('register') }}">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="font-weight: bold;" href="{{ route('login') }}">
                {{ __('Back to login') }}
            </a>
            <h4 class="text-center">Register Account</h4>
            <h6 class="text-center">May you find only happiness :)</h6>
            @csrf

            <div>
                <x-label for="name" value="{{ __('Username') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your username" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
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
                    {{ __('Create an account') }}
                </x-button>
            </div>
        </form>
    </div>
    <div class="box-2 w-full justify-center mt-10 mb-5">
        <img class="w-full object-cover" src="https://plus.unsplash.com/premium_photo-1678520999360-2475faa929b5?q=80&w=1891&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" style="background-image">
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
        font-size: 200%;
        font-weight: bold;
    }
    h6 {
        margin-top: 10px;
    }

    ms-4{
        
    }

    .box-2 img{
        max-width: 100%;
        height: auto;
        border-radius: 15px;
    }
