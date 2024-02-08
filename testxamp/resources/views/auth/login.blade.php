<x-admin-layout>

    <div class=" font-[sans-serif] text-[#333]">
        <div class="flex flex-col items-center justify-center min-h-screen">
          <div class="w-full max-w-md px-6 py-8 bg-white border border-gray-300 rounded">
            <a href="#">
                <img src="/storage/images/logo.png" alt="logo" class="w-40 mx-auto" />
            </a>


            <h2 class="text-3xl font-extrabold text-center">
              Log in to your account
            </h2>
                <form method="POST" action="{{ route('login') }}" class="mt-4 space-y-4">
                    @csrf
              <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="w-full px-4 py-3 text-sm border-2 rounded outline-none focus:border-blue-500" type="email" name="email" :value="old('email')"  placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="w-full px-4 py-3 text-sm border-2 rounded outline-none focus:border-blue-500"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />

              </div>
              <div class="flex items-center justify-between gap-4">
                <div class="flex items-center">
                  <input id="remember-me" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-gray-300 rounded shrink-0 focus:ring-blue-500" />
                  <label for="remember-me" class="block ml-3 text-sm">
                    {{ __('Remember me') }}
                  </label>
                </div>
                <div>
                  @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                              {{ __('Forgot your password?') }}
                  </a>
              @endif
                </div>
              </div>

              <div class="flex items-center justify-around ">
                <div class="!mt-10">
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                  </div>
                <a class="text-sm underline rounded-md hover:text-gray-900 "
                href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
              </div>
            </form>
          </div>
        </div>
      </div>
</x-admin-layout>

