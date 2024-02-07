<x-admin-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 font-bold text-4xl" :status="session('status')" />

    <div class="font-[sans-serif] text-[#333]">
        <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
          <div class="grid md:grid-cols-2 items-center gap-4 max-w-7xl w-full">
            <div class="border border-gray-300 rounded-md p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
              <form method="POST" action="{{ route('password.email') }}">
                  @csrf                <h3 class="text-3xl font-extrabold">Sign in to your Email</h3>
                <div>
                  <label for="email"  class=" text-black  font-bold" >Email</label>
                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                  </div>
                  <div class="flex items-center justify-end mt-4">
                      <x-primary-button>
                          {{ __('Email Password Reset Link') }}
                      </x-primary-button>
                  </div>
                </div>
                <div class="lg:h-[400px] md:h-[300px] max-md:mt-10">
                  <img src="https://readymadeui.com/login-image.webp" class="w-full h-full object-cover" alt="Dining Experience" />
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>


</x-admin-layout>
