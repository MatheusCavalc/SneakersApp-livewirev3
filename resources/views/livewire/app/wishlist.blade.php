<div x-data="{
    open: false,
    showNotification: function() {
        this.open = true;
        setTimeout(() => {
            this.open = false;
        }, 3000);
    }
}" class="bg-white">
    <div class="md:grid md:grid-cols-3">
        <div class="ml-5 mt-5">
            <h1 class="text-3xl">My Wishlist</h1>
        </div>

        <div class="md:col-span-2">
            <div class="mt-10 md:grid md:grid-cols-3">
                @foreach ($wishlist as $sneaker)
                    <div
                        class="relative my-3 mx-auto md:mx-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl">
                            <img class="object-cover" src="{{ Storage::url($sneaker->sneaker->image) }}"
                                alt="{{ $sneaker->sneaker->name }}" />
                            @if ($sneaker->sneaker->in_promotion)
                                <span
                                    class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">
                                    {{ (int)((((float)$sneaker->sneaker->price - (float)$sneaker->sneaker->promotion_price) / (float)$sneaker->sneaker->price) * 100) }}% OFF
                                </span>
                            @endif
                            <span wire:click='removeToWishlist({{ $sneaker->sneaker->id }})'
                                class="absolute top-0 right-0 m-2 rounded-full bg-black p-2 text-center text-sm font-medium text-white hover:bg-red-700 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </span>
                        </a>
                        <div class="mt-4 px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl tracking-tight text-slate-900">
                                    {{ $sneaker->sneaker->brand->name }} {{ $sneaker->sneaker->name }}</h5>
                            </a>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                    @if ($sneaker->sneaker->in_promotion)
                                        <span
                                            class="text-3xl font-bold text-slate-900">${{ $sneaker->sneaker->promotion_price }}
                                        </span>
                                        <span
                                            class="text-sm text-slate-900 line-through">${{ $sneaker->sneaker->price }}</span>
                                    @else
                                        <span class="text-3xl font-bold text-slate-900">${{ $sneaker->sneaker->price }}
                                        </span>
                                    @endif
                                </p>
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span
                                        class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">5.0</span>
                                </div>
                            </div>
                            <a wire:click="addToCart({{ $sneaker->sneaker->id }}, 1)" x-on:click="showNotification()"
                                class="flex items-center justify-center cursor-pointer rounded-md bg-black px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90" class="fixed bottom-4 right-4">

        <div
            class="flex items-center w-full max-w-xs p-4 space-x-4 bg-white divide-x divide-black rounded-lg shadow-xl space-x text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            <div class="pl-4 text-sm font-bold">
                Sneaker add to cart
            </div>
        </div>

    </div>
</div>
