<x-admin-layout>
    <!-- Session Status -->

    <div class=" font-[sans-serif] text-[#333]">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="min-h-screen flex flex-col items-center justify-center">
          <div class="max-w-md w-full border py-8 px-6 rounded border-gray-300 bg-white">
            <a href="javascript:void(0)"><img
              src="/storage/images/logo.png" alt="logo" class='w-40 mx-auto' />
            </a>
            <h2 class="text-center text-3xl font-extrabold">
              Log in to your account
            </h2>
                <form method="POST" action="{{ route('login') }}" class="mt-4 space-y-4">
                    @csrf
              <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="w-full text-sm px-4 py-3 rounded outline-none border-2 focus:border-blue-500" type="email" name="email" :value="old('email')"  placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="w-full text-sm px-4 py-3 rounded outline-none border-2 focus:border-blue-500"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />

              </div>
              <div class="flex items-center justify-between gap-4">
                <div class="flex items-center">
                  <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                  <label for="remember-me" class="ml-3 block text-sm">
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

              <div class="flex items-center justify-around  ">
                <div class="!mt-10">
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                  </div>
                <a class="underline text-sm hover:text-gray-900 rounded-md   "
                href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
              </div>
            </form>
          </div>
        </div>
      </div>
</x-admin-layout>

