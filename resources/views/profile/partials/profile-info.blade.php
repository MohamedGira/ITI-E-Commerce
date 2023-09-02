<div class="flex flex-col w-1/4 text-center bg-gray-200 rounded-3xl items-center mt-48 mx-10 ">
    <img id="profileImage" src="Images/{{ $userData->profile_image }}" alt=""
        class="rounded-full w-1/2 -translate-y-1/2 border-white border-4 transition-all cursor-pointer object-cover	aspect-square">
    <div id="data" class="-translate-y-1/2 flex flex-col gap-4">
        <div>
            <h1 class="text-2xl text-grey-500">{{ $user->name }}</h1>
        </div>
        <div>
            <h1 class="text-2xl text-grey-500">{{ $user->email }}</h1>
        </div>
        <div>
            <h1 class="text-2xl text-grey-500">{{ $userData->phone_number }}</h1>
        </div>
    </div>
    <form method="post" action="{{ route('profile.update') }}"
        class="-translate-y-1/3 flex flex-col gap-4 w-10/12 hidden" id="editForm" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <input  id="name" type="text" name="name" class=" rounded-md focus:outline-orange-600 w-full text-center text-2xl text-grey-500"
                value="{{$user->name}}" required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div>
            <input id="email"type="email"name="email" class=" rounded-md focus:outline-orange-600 w-full text-2xl text-grey-500 text-center"
                value="{{$user->email}}" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        <div>
            <input id="phone_number" type="tel" name="phone_number" class=" rounded-md focus:outline-orange-600 w-full text-2xl text-grey-500 text-center"
                value="{{ $userData->phone_number }}" required />
        </div>
        <div>
            <input id="imageInput" name="profile_image"type="file" accept="image/png, image/jpeg" class="hidden" value="+201117230998"
                required />
        </div>
        <div class="flex justify-between">
            <input
                class="bg-orange-400 py-1 px-5 text-white rounded-md font-bold  hover:text-orange-400 hover:bg-white transition-colors"
                type="reset" name="reset" id="reset">
            <input
                class="bg-orange-400 py-1 px-5 text-white rounded-md font-bold  hover:text-orange-400 hover:bg-white transition-colors"
                type="submit" name="edit" id="edit">
            <button
                class="bg-orange-400 py-1 px-5 text-white rounded-md font-bold hover:text-orange-400 hover:bg-white transition-colors"
                id="cancel">Cancel</button>
        </div>
        
        <div class="flex items-center gap-4">

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}
            </p>
            @endif
        </div>
    </form>
    <i class='bx bx-edit text-5xl text-gray-500 text-center self-end p-3 cursor-pointer ' id="showForm"></i>
</div>
