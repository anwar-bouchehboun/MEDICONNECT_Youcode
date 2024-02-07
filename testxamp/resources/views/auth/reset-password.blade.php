<x-guest-layout>

        <!-- Password Reset Token -->


        <div class="flex flex-col sm:flex-row justify-center font-[sans-serif] text-[#333] sm:h-screen p-4">

            <div class="max-w-md w-full mx-auto border border-gray-300 rounded-md p-6 sm:mr-4">
                <h2 class=" text-4xl font-bold text-teal-600">Form Rest Password</h2>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-6">
                        <x-primary-button>
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="hidden md:block max-w-md p-4">
                <img src="https://readymadeui.com/signin-image.webp" class="w-full h-full object-contain" alt="login-image" />
            </div>
        </div>

</x-guest-layout>
