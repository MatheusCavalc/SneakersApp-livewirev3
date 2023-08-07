<div>
    <div>
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            <span class="sr-only">Search icon</span>
        </div>
        <input type="text" wire:model.live.debounce.500ms='search' wire:keydown.enter="searchSneakers"
            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-black focus:border-black"
            placeholder="Search...">
    </div>

    @if (sizeof($sneakers) > 0)
        <div x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-80 md:w-64 mt-2 dark:bg-gray-700 dark:divide-gray-600">

            @foreach ($sneakers as $sneaker)
                <div class="p-2 text-sm">
                    <a href="/sneaker/{{ $sneaker->id }}/slug" wire:navigate>
                        {{ $sneaker->name }}
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
