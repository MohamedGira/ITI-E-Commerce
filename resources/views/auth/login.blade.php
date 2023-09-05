<x-guest-layout>
    <!-- Session Status -->
    <div class="flex flex-col text-sm">

        <form class=" mt-24 flex flex-col w-1/4 gap-4 self-center items-center" method="POST"
            action="{{ route('login') }}">
            @csrf

            <h1 class="font-black text-3xl">Sign in</h1>
            <p class="text-left w-full">New user? <a class="font-black"href="{{ route('register') }}">Create an account</a>
            </p>
            <div class="w-full">
                <label for="email" class="text-grey-700">Email</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="email"
                    name="email" id="email" placeholder="Enter your Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="w-full">
                <label for="password" class="text-grey-700">Password</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="password"
                    name="password" id="password" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="block mt-4 self-start">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 "
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="self-end underline text-sm text-gray-600 hover:text-gray-700  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 "
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-auth-session-status :status="session('status')" />

            <button class="bg-orange-400 text-white w-full py-1 rounded-md hover:bg-orange-500 transition-colors"
                name="login">
                Sign in</button>
        </form>
    </div>
</x-guest-layout>
