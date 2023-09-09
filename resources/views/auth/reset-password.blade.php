<x-guest-layout>
    <div class="flex flex-col text-sm">
     
    <form method="POST" action="{{ route('password.store') }}"
    class=" mt-16 flex flex-col w-96 gap-4 self-center items-center">

        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">


          <!-- Email Address -->
        <div class="w-full">
            <label for="email" class="text-grey-700">Email</label>
            <br>
            <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="email"
                name="email" id="email" placeholder="Enter your Email" value="{{old('email', $request->email)}}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
