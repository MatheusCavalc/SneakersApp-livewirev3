<div x-data="{ open: false }" class="md:mr-6">
    <div class="mx-3 pr-2 md:mx-0 md:pr-0 cursor-pointer">
        <div class="flex justify-center items-center" x-on:click="open = !open">
            <div class="relative">
                <div class="t-0 absolute left-3 bottom-3">
                    <p class="flex h-2 w-2 items-center justify-center rounded-full bg-black p-3 text-xs text-white">
                        {{ $cartItemsTotal }}</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="file: mt-2 h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-3 mr-2 right-0 font-normal bg-white rounded-lg shadow" id="dropdown-user">
        @if ($cartBox)
            <table class="w-full text-sm text-left rounded-lg">
                <thead class="text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:inline-block">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:inline-block">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartBox as $cart)
                        <tr wire:key="{{ $cart->id }}" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="w-10 h-5">
                                    <img class="object-cover" src="{{ Storage::url($cart->image) }}"
                                        alt="{{ $cart->name }}" />
                                </div>
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $cart->name }}
                            </td>
                            <td class="px-6 py-4 text-center hidden md:inline-block">
                                R${{ $cart->price }}
                            </td>
                            <td class="px-6 py-4 text-center hidden md:inline-block">
                                {{ $cart->quantity }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                R${{ (int) $cart->price * $cart->quantity }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <p wire:click='removeItem({{$cart->id}})' class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right my-2 flex justify-end hover:underline">
                <a href="/checkout" wire:navigate class="cursor-pointer">Checkout</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-2 mt-1 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </div>
        @else
            <div class="w-40 h-10 md:w-80 md:h-20">
                <h1 class="ml-5 my-4 md:mt-5 md:my-0">
                    Cart empty
                </h1>
            </div>
        @endif
    </div>
</div>
