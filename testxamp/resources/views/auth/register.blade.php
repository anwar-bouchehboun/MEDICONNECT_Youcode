<x-guest-layout>


    <div class="mx-auto text-center">
        <a href="">
            <img src="/storage/images/logo.png" alt="logo" class='inline-block' width="200px" />
        </a>
    </div>
    <h4 class="mt-3 mb-3 text-5xl font-semibold text-center">Sign up into your account</h4>
    <form method="POST" action="{{ route('register') }}" class="p-10 rounded bg-cyan-600">
        @csrf
        <div class="grid sm:grid-cols-2 gap-y-7 gap-x-12">
            <div>
                <x-input-label for="cin" :value="__('Cin')" />
                <x-text-input id="cin" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                    type="text" name="cin" :value="old('cin')" />
                <x-input-error :messages="$errors->get('cin')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                    type="text" name="name" :value="old('name')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="Genre" :value="__('Genre')"  />
                 <select name="Genre" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500">
                    <option value="" disabled selected>Genre</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                 </select>

                <x-input-error :messages="$errors->get('Genre')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Mobile No.')" />
                <x-text-input id="phone" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                    type="text" name="phone" :value="old('phone')"  />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                    type="email" name="email" :value="old('email')"   />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500"
                    type="password" name="password"  />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation"
                    class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500" type="password"
                    name="password_confirmation" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="Role" :value="__('Role')"  />
                 <select name="role" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-blue-500">
                    <option value="" disabled selected>Role</option>
                    <option value="patient">Patient</option>
                    <option value="medecin">Medecin</option>
                 </select>

                <x-input-error :messages="$errors->get('Genre')" class="mt-2" />
            </div>
        </div>
        <div class="!mt-10">
            <a class="text-sm text-white underline hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>

