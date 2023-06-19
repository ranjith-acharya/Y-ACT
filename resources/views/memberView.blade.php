@section('custom-title')
@if(Auth::user()->role === 'admin') ADMIN Member View @else {{ $user->name }} @endif
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <img src="../../../img/profile-picture/{{ $user->avatar }}" class="w-10 h-10 rounded-full inline-block" alt="{{ $user->name }}"><span class="ml-2">{{ $user->name }}</span>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium capitalize">
                    {{ session('success') }}          
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif
            @if(Auth::user()->id == $user->id && Auth::user()->role === 'member')
                <a href="{{ route('bio.edit', $profile->id) }}">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Bio Info!</button>
                </a>
            @endif
            <div class="dark:bg-gray-700 text-white rounded p-3">                
                @if(isset($profile) == 0)
                    @if(Auth::user()->id == $user->id && Auth::user()->role === 'member')
                        <a href="{{ route('bio.create') }}">
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Bio Info!</button>
                        </a>
                    @endif
                @else
                <div class="grid grid-cols-4 grid-rows-3 grid-flow-col gap-4">
                    <div class="row-span-3">
                        <img src="../../../img/profile-picture/{{ $profile->user->avatar }}" class="max-w-xs">
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Full name: </label>
                        {{ $profile->user->name }}
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Contact: <span id="helper-text-explanation" class="mt-1 text-xs text-gray-500 dark:text-gray-400">(Click to send message)</span></label>
                        <a href="https://api.whatsapp.com/send?phone=91{{ $profile->contact }}" target="_blank" class="font-semibold text-gray-900 underline dark:text-white decoration-indigo-500">{{ $profile->contact }}</a>&nbsp;/&nbsp;<a href="https://api.whatsapp.com/send?phone=91{{ $profile->alternate_contact }}" target="_blank" class="font-semibold text-gray-900 underline dark:text-white decoration-indigo-500">{{ $profile->alternate_contact }}</a>
                    </div><div></div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email address: </label>
                        {{ $profile->user->email }}
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Date of Birth: </label>
                        {{ Carbon\Carbon::parse($profile->date_of_birth)->format('d-M-Y') }}, {{ Carbon\Carbon::parse($profile->date_of_birth)->diffInYears() }}&nbsp;years
                    </div><div></div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Account created: </label>
                        {{ Carbon\Carbon::parse($profile->user->created_at)->diffForHumans() }}
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Social Profiles: </label>
                        <a href="https://www.facebook.com/{{ $profile->facebook_username }}" target="_blank"><i class="bi bi-facebook font-bold mr-2"></i></a>
                        <a href="https://www.instagram.com/{{ $profile->instagram_username }}" target="_blank"><i class="bi bi-instagram font-bold mr-2"></i></a>
                        <a href="https://www.linkedin.com/in/{{ $profile->linkedin_username }}" target="_blank"><i class="bi bi-linkedin font-bold"></i></a>
                    </div>
                  </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <div class="flex space-x-auto mb-6">
    <div class="flex-auto max-w-xs">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Full name: </label>
        {{ $profile->user->name }}
    </div>
    <div class="flex-auto max-w-xs">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email address: </label>
        {{ $profile->user->email }}
    </div>
    <div class="flex-auto max-w-xs">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Account created: </label>
        {{ Carbon\Carbon::parse($profile->user->created_at)->diffForHumans() }}
    </div>
</div>
<div class="flex space-x-auto mb-6">
    <div class="flex-auto max-w-xs">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Contact: <span id="helper-text-explanation" class="mt-1 text-xs text-gray-500 dark:text-gray-400">(Click to send message)</span></label>
        <a href="https://api.whatsapp.com/send?phone=91{{ $profile->contact }}" target="_blank" class="font-semibold text-gray-900 underline dark:text-white decoration-indigo-500">{{ $profile->contact }}</a>&nbsp;/&nbsp;<a href="https://api.whatsapp.com/send?phone=91{{ $profile->alternate_contact }}" target="_blank" class="font-semibold text-gray-900 underline dark:text-white decoration-indigo-500">{{ $profile->alternate_contact }}</a>
    </div>
    <div class="flex-auto max-w-xs">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Date of Birth: </label>
        {{ Carbon\Carbon::parse($profile->date_of_birth)->format('d-M-Y') }}, {{ Carbon\Carbon::parse($profile->date_of_birth)->diffInYears() }}&nbsp;years
    </div>
    <div class="flex-auto max-w-xs">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Social Profiles: </label>
        <a href="https://www.facebook.com/{{ $profile->facebook_username }}" target="_blank"><i class="bi bi-facebook font-bold mr-2"></i></a>
        <a href="https://www.instagram.com/{{ $profile->instagram_username }}" target="_blank"><i class="bi bi-instagram font-bold mr-2"></i></a>
        <a href="https://www.linkedin.com/in/{{ $profile->linkedin_username }}" target="_blank"><i class="bi bi-linkedin font-bold"></i></a>
    </div>
</div>
<div class="flex space-x-auto mb-6">
    <div class="flex-auto max-w-xl">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Current address: </label>
        {{ $profile->residence }}
    </div>
</div>
<div class="flex space-x-auto mb-2">
    <div class="flex-auto max-w-xl">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Native address: </label>
        {{ $profile->native }}
    </div>
</div> --}}