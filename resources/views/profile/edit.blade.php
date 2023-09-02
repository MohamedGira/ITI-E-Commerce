<x-app-layout :userData="$userData" >
    
    <div class="flex gap-24 mt-24">
        @include('profile.partials.profile-info')
        @include('profile.partials.packages-info')
    </div>

    <script src="{{ asset('/build/assets/profile.js') }}"></script>
</x-app-layout>
