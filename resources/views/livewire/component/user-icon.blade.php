<div class="">
    <div x-data="{ open: false }">
        <div class="mx-3 pr-2 md:mx-0 md:pr-0 cursor-pointer">
            <div class="flex justify-center items-center" x-on:click="open = !open" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mt-1.5 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div x-show="open" x-on:mouseover="open = true" x-on:mouseleave="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-40 mt-2 md:mt-0 mr-2 right-0 font-normal bg-white rounded-lg shadow" id="dropdown-user">

            <div class="py-3">
                @auth
                    <div class="px-4 pt-2 pb-1" role="none">
                        <p class="text-gray-900 dark:text-white" role="none">
                            {{ $user->name }}
                        </p>
                        <p class="font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                            {{ $user->email }}
                        </p>
                    </div>
                    <ul class="py-1" role="none">
                        <li>
                            <a href="/my-orders" wire:navigate
                                class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem">My Orders</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="cursor-pointer">
                                @csrf

                                <a :href="route('logout')"
                                    class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white""
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="py-1" role="none">
                        <li>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-1 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-1 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                role="menuitem">Register</a>
                        </li>
                    </ul>
                @endauth
            </div>

        </div>
    </div>
</div>
