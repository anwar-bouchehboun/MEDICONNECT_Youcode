<x-admin-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-4xl font-bold" :status="session('status')" />

    <div class="font-[sans-serif] text-[#333]">
        <div class="flex items-center justify-center min-h-screen px-4 py-6 fle-col">
          <div class="grid items-center w-full gap-4 md:grid-cols-2 max-w-7xl">
            <div class="border border-gray-300 rounded-md p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
              <form method="POST" action="{{ route('password.email') }}">
                  @csrf                <h3 class="text-3xl font-extrabold">Sign in to your Email</h3>
                <div class="my-2">
                  <label for="email"  class="font-bold text-black " >Email</label>
                  <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                  </div>
                  <div class="flex items-center justify-end mt-4">
                      <x-primary-button>
                          {{ __('Email Password Reset Link') }}
                      </x-primary-button>
                  </div>
                </div>
                <div class="lg:h-[400px] md:h-[300px] max-md:mt-10">
                  <img src="https://readymadeui.com/login-image.webp" class="object-cover w-full h-full" alt="Dining Experience" />
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>


</x-admin-layout>
