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
            <div class="dark:bg-gray-700 text-white rounded p-3">
                {{ $user->name }}<br>{{ $user->email }}
            </div>
        </div>
    </div>
</x-app-layout>
