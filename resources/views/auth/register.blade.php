<x-guest-layout>
    <div class="flex flex-col text-sm">
        
        <form method="POST" action="{{ route('register') }}"
            class=" mt-16 flex flex-col w-96 gap-4 self-center items-center">
            @csrf

            <!-- Name -->
            <div class="w-full">
                <label for="name" class="text-grey-700">Name</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="text"
                    name="name" id="firstName" placeholder="Mohamed">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="w-full">
                <label for="email" class="text-grey-700">Email</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="email"
                    name="email" id="email" placeholder="Enter your Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <!-- Phone Number -->
            <div class="w-full">
                <label for="phoneNumber" class="text-grey-700">phoneNumber</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="tel"
                    name="phoneNumber" id="phoneNumber" placeholder="+201117230998">
                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="w-full">
                <label for="password" class="text-grey-700">Password</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="password"
                    name="password" id="password" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="w-full">
                <label for="password_confirmation" class="text-grey-700">Confirm Password</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="password"
                    name="password_confirmation" id="password_confirmation" placeholder="••••••••">

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

                <a class="self-end underline text-sm text-gray-600 hover:text-gray-700   "
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

            <input type="submit"
                class="bg-orange-400 text-white w-full py-1 rounded-md hover:bg-orange-500 transition-colors"
                value="Register" name="register">


        </form>
    </div>
</x-guest-layout>
