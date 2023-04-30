<div>
    <label class="relative block">
        <span class="sr-only">Search</span>
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg aria-hidden="true" class="ml-1 w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </span>
        <input wire:model="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Members..." required>
    </label>
    <ul role="list" class="p-6 divide-y divide-slate-600">
        @foreach ($users as $user)
        <li class="flex py-4 first:pt-0 last:pb-0">
            <img class="h-10 w-10 rounded-full" src="../img/profile-picture/{{ $user->avatar }}" alt="{{ $user->avatar }}" />
            <div class="ml-3 overflow-hidden">
                <p class="text-sm font-medium text-slate-500">{{ $user->name }}</p>
                <p class="text-sm text-slate-500 truncate">{{ $user->email }}</p>
            </div>
          </li>
        @endforeach
      </ul>
</div>
