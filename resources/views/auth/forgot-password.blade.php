<x-guest-layout>


    
    <!-- Session Status -->
    
    <div class="flex flex-col text-sm">
        
        <form class=" mt-24 flex flex-col w-1/4 gap-4 self-center items-center" method="POST"
        action="{{ route('password.email') }}">
        @csrf
        

        <div class="mb-4 text-sm text-gray-600 ">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

            <!-- Email Address -->
            <div class="w-full">
                <label for="email" class="text-grey-700">Email</label>
                <br>
                <input class="w-full border rounded-md p-1 focus:border-orange-400 focus:outline-none" type="email"
                    name="email" id="email" placeholder="Enter your Email">
            </div>
            <x-auth-session-status  :status="session('status')" />

            <div class="flex items-center justify-end mt-4">
                <x-primary-button >
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

       
    </div>
</x-guest-layout>
