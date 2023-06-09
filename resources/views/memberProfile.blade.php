@section('custom-title')
{{ auth()->user()->name }} Bio
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <img src="../../../img/profile-picture/{{ Auth::user()->avatar }}" class="w-10 h-10 rounded-full inline-block" alt="{{ Auth::user()->name }}"><span class="ml-2">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 text-white rounded p-3">

                <form method="post" action="{{ route('bio.store') }}">
                @csrf
                <div class="flex space-x-4 mb-6">
                    <div class="flex-auto relative max-w-sm">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 helper-text" for="date_of_birth">Date of Birth <span id="helper-text-explanation" class="mt-1 text-xs text-gray-500 dark:text-gray-400">(mm/dd/yyyy)</span></label>
                        <input datepicker datepicker-autohide type="text" id="date_of_birth" name="date_of_birth" class="dark:bg-gray-900 border border-gray-300 dark:text-gray-300 text-sm rounded-md focus:border-indigo-500 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600 mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-sm" placeholder="Date of Birth" required="required" value={{ old('date_of_birth') }}>
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    </div>
                    <div class="flex-auto max-w-sm">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="contact">Contact number</label>
                        <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="contact" name="contact" type="text" placeholder="Contact number" maxlength="10" value={{ old('contact') }}>
                        <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                    </div>
                    <div class="flex-auto max-w-sm">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="alternate_contact">Alternate contact</label>
                        <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="alternate_contact" name="alternate_contact" type="text" placeholder="Alternate number" maxlength="10" value={{ old('alternate_contact') }}>
                        <x-input-error :messages="$errors->get('alternate_contact')" class="mt-2" />
                    </div>
                </div>
                <div class="flex space-x-4 mb-6">
                    <div class="flex-auto max-w-xl">                        
                        <label for="residence" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current address</label>
                        <textarea id="residence" name="residence" rows="4" class="p-2.5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" placeholder="Current address"></textarea>
                        <x-input-error :messages="$errors->get('residence')" class="mt-2" />
                    </div>
                    <div class="flex-auto max-w-xl">
                        <label for="native" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current address</label>
                        <textarea id="native" name="native" rows="4" class="p-2.5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" placeholder="Native address"></textarea>
                        <x-input-error :messages="$errors->get('native')" class="mt-2" />
                    </div>
                </div>
                <div class="flex space-x-4 mb-6">
                    <div class="flex-auto max-w-sm">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="facebook_username">Facebook username</label>
                        <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="facebook_username" name="facebook_username" type="text" placeholder="Facebook username">
                    </div>
                    <div class="flex-auto max-w-sm">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="instagram_username">Instgram username</label>
                        <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="instagram_username" name="instagram_username" type="text" placeholder="Instagram username">
                    </div>
                    <div class="flex-auto max-w-sm">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="linkedin_username">Linkedin username</label>
                        <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="linkedin_username" name="linkedin_username" type="text" placeholder="Linkedin username">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
        
                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
