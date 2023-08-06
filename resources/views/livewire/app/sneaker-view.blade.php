<div x-data="{
    open: false,
    message: '',
    showNotification: function(alert) {
        this.open = true;
        this.message = alert
        setTimeout(() => {
            this.open = false;
        }, 3000);
    }
}" class="bg-white">
    <div class="pl-3 md:pl-10 py-4 flex gap-4 bg-black text-white text-sm md:text-base">
        <p>Home</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p>Sneaker</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p class="underline">{{ $sneaker->brand->name }} {{ $sneaker->name }}</p>
    </div>

    {{-- Product section --}}
    <main class="w-full md:grid md:grid-cols-3 md:gap-1 md:mb-14 md:mt-3">
        <!-- Product images -->
        <section
            class="col-span-2 h-fit flex-col gap-8 my-8 sm:flex sm:flex-row sm:gap-4 sm:h-full sm:mt-24 sm:mx-2 md:gap-8 md:mx-4 lg:flex-col lg:mx-0">
            <picture class="relative flex items-center bg-orange sm:bg-transparent">
                <button
                    class="bg-white w-10 h-10 flex items-center justify-center pr-1 rounded-full absolute left-6 z-10 sm:hidden"
                    id="previous-mobile">
                    <svg width="12" height="18" xmlns="http://www.w3.org/2000/svg" id="previous-mobile">
                        <path d="M11 1 3 9l8 8" stroke="#1D2026" stroke-width="3" fill="none" fill-rule="evenodd"
                            id="previous-mobile" />
                    </svg>
                </button>
                <img src="{{ Storage::url($sneaker->image) }}" alt="sneaker"
                    class="block object-cover mx-2 h-56 w-full md:h-96 md:w-[70%] sm:rounded-xl xl:w-[70%] xl:rounded-xl mt-0 md:mx-auto md:mt-10 pointer-events-none transition duration-300 lg:w-3/4 lg:pointer-events-auto lg:cursor-pointer lg:hover:shadow-xl" />
                <button
                    class="bg-white w-10 h-10 flex items-center justify-center pl-1 rounded-full absolute right-6 z-10 sm:hidden"
                    id="next-mobile">
                    <svg width="13" height="18" xmlns="http://www.w3.org/2000/svg" id="next-mobile">
                        <path d="m2 1 8 8-8 8" stroke="#1D2026" stroke-width="3" fill="none" fill-rule="evenodd"
                            id="next-mobile" />
                    </svg>
                </button>
            </picture>

            <div
                class="thumbnails hidden justify-between gap-4 mx-auto my-8 sm:flex sm:flex-col sm:justify-start sm:items-center sm:h-fit md:gap-5 lg:flex-row">
                <div id="1"
                    class="w-1/5 cursor-pointer rounded-xl sm:w-28 md:w-32 lg:w-[72px] xl:w-[78px] ring-active">
                    <img src="{{ Storage::url($sneaker->image) }}" alt="thumbnail"
                        class="rounded-xl hover:opacity-50 transition active" id="thumb-1" />
                </div>
            </div>
        </section>

        <!-- Product infos -->
        <section class="w-full p-6 lg:mt-10 lg:pr-10 lg:py-2 2xl:pr-40 2xl:mt-40">
            <div class="mb-6">
                <h1 class="text-xl font-bold italic mb-1">
                    {{ $sneaker->brand->name }}
                </h1>
                <h1 class="text-very-dark mb-1 font-bold text-2xl lg:text-4xl">
                    {{ $sneaker->brand->name }} {{ $sneaker->name }}
                </h1>
            </div>

            @if ($sneaker->in_promotion)
                <div class="mb-6">
                    <div class="flex justify-start md:justify-end">
                        <p class="line-through ml-1 md:mr-1">
                            ${{ $sneaker->price }}
                        </p>
                    </div>
                    <div class="flex justify-start md:justify-end gap-4">
                        <h3 class="md:order-2 text-very-dark font-bold text-3xl inline-block">
                            <p>${{ $sneaker->promotion_price }}</p>
                        </h3>
                        <span
                            class="md:order-1 inline-block h-fit py-0.5 px-2 mt-2 md:mt-2 font-bold bg-black text-white rounded-lg text-sm">
                            {{ (int) ((((float) $sneaker->price - (float) $sneaker->promotion_price) / (float) $sneaker->price) * 100) }}%
                            OFF
                        </span>
                    </div>
                </div>
            @else
                <div class="mb-6">
                    <div class="flex justify-start md:justify-end">
                        <h3 class="text-very-dark font-bold text-3xl inline-block">
                            <p>${{ $sneaker->price }}</p>
                        </h3>
                    </div>
                </div>
            @endif

            <div class="mb-6">
                <div class="">
                    <h1 class="text-2xl italic">Color</h1>
                    <div class="flex gap-3">
                        <div class="border-2 border-black rounded-lg">
                            <img class="object-cover w-20 h-14 p-1 rounded-lg"
                                src="{{ Storage::url($sneaker->image) }}" alt="{{ $sneaker->name }}" />
                        </div>
                        <h3 class="text-very-dark font-bold text-xl inline-block">
                            <p>{{ $sneaker->color }}</p>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <div class="">
                    <h1 class="text-2xl italic">Size</h1>
                    <div class="flex">
                        @foreach ($sneaker->sizes as $size)
                            <div wire:click='chooseSize({{ $size }})'
                                class="cursor-pointer mr-2 w-8 h-8 bg-white text-black font-bold text-center rounded-md border border-black hover:bg-black hover:text-white hover:border-white">
                                {{ $size }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mb-16 lg:mb-0">
                <h1 class="text-2xl italic mb-2">Quantity</h1>
                <div class="h-10 text-sm flex gap-4 rounded-lg font-bold relatives">
                    <button {{-- wire:click='decrement' --}} id="minus" class="w-7 h-7 bg-white rounded-full text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>

                    <span class="mt-1">{{ $quantity }}</span>

                    <button {{-- wire:click='increment' --}} id="plus" class="w-7 h-7 bg-black rounded-full text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <div class="w-full my-3">
                    <a wire:click='addToCart({{ $sneaker->id }}, 1)'
                        x-on:click="showNotification('Sneaker add to cart')"
                        class="mb-3 cursor-pointer w-full h-10 bg-black py-2 flex items-center justify-center gap-4 text-xs text-white rounded-lg font-bold text-light shadow-md shadow-orange hover:brightness-125 transition select-none"
                        id="add-cart">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        Add to cart
                    </a>

                    <a wire:click='addToWishlist({{ $sneaker->id }})'
                        x-on:click="showNotification('Sneaker add to wishlist')"
                        class="w-full cursor-pointer h-10 bg-white py-2 flex items-center justify-center gap-4 text-xs text-black rounded-lg font-bold text-light shadow-md shadow-orange hover:brightness-125 transition select-none"
                        id="add-cart">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 22 20" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>

                        Add to wishlist
                    </a>
                </div>
            </div>
        </section>
    </main>

    {{-- For your section  --}}
    <div class="bg-black py-4">
        <h1 class="mt-2 ml-5 md:ml-16 text-2xl md:text-4xl text-white">For You</h1>

        <div class="mx-auto max-w-2xl px-4 py-1 sm:px-6 sm:py-6 lg:max-w-7xl lg:px-8">
            <div class="mt-2 md:flex md:justify-around">
                {{-- @foreach ($sneaker as $sneaker) --}}
                <div
                    class="relative mb-5 md:mb-0 mx-auto md:mx-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white transition shadow-white duration-300 lg:hover:shadow-xl">
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl"
                        href="/sneaker/{{ $sneaker->id }}/slug" wire:navigate>
                        <img class="object-cover h-60 w-80" src="{{ Storage::url($sneaker->image) }}"
                            alt="{{ $sneaker->name }}" />
                        @if ($sneaker->in_promotion)
                            <span
                                class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">
                                {{ (int) ((((float) $sneaker->price - (float) $sneaker->promotion_price) / (float) $sneaker->price) * 100) }}%
                                OFF
                            </span>
                        @endif
                        <a wire:click='addToWishlist({{ $sneaker->id }})'
                            x-on:click="showNotification('Sneaker add to wishlist')"
                            class="cursor-pointer absolute top-2 right-2 m-2 rounded-full bg-black p-2 text-center text-sm font-medium text-white hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </a>
                    </a>
                    <div class="mt-4 px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-slate-900">
                                {{ $sneaker->brand->name }} {{ $sneaker->name }}</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                @if ($sneaker->in_promotion)
                                    <span class="text-3xl font-bold text-slate-900">${{ $sneaker->promotion_price }}
                                    </span>
                                    <span class="text-sm text-slate-900 line-through">${{ $sneaker->price }}</span>
                                @else
                                    <span class="text-3xl font-bold text-slate-900">${{ $sneaker->price }}
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
                        <a wire:click="addToCart({{ $sneaker->id }}, 1)"
                            x-on:click="showNotification('Sneaker add to cart')"
                            class="flex items-center justify-center cursor-pointer rounded-md bg-black px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart</a>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

    {{-- Complete your cart section  --}}
    <div class="bg-white py-4">
        <h1 class="mt-2 ml-5 md:ml-16 text-2xl md:text-4xl text-black">Complete Your Cart</h1>

        <div class="mx-auto max-w-2xl px-4 py-1 sm:px-6 sm:py-6 lg:max-w-7xl lg:px-8">
            <div class="mt-2 md:flex md:justify-around">
                {{-- @foreach ($sneaker as $sneaker) --}}
                <div
                    class="relative mb-5 md:mb-0 mx-auto md:mx-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-black transition shadow-white duration-300 lg:hover:shadow-xl">
                    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl"
                        href="/sneaker/{{ $sneaker->id }}/slug" wire:navigate>
                        <img class="object-cover h-60 w-80" src="{{ Storage::url($sneaker->image) }}"
                            alt="{{ $sneaker->name }}" />
                        @if ($sneaker->in_promotion)
                            <span
                                class="absolute top-0 left-0 m-2 rounded-full bg-white px-2 text-center text-sm font-medium text-black border border-black">
                                {{ (int) ((((float) $sneaker->price - (float) $sneaker->promotion_price) / (float) $sneaker->price) * 100) }}%
                                OFF
                            </span>
                        @endif
                        <a wire:click='addToWishlist({{ $sneaker->id }})'
                            x-on:click="showNotification('Sneaker add to wishlist')"
                            class="cursor-pointer absolute top-2 right-2 m-2 rounded-full bg-white p-2 text-center text-sm font-medium text-black hover:bg-red-700 border border-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </a>
                    </a>
                    <div class="mt-4 px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-white">
                                {{ $sneaker->brand->name }} {{ $sneaker->name }}</h5>
                        </a>
                        <div class="mt-2 mb-5 flex items-center justify-between">
                            <p>
                                @if ($sneaker->in_promotion)
                                    <span class="text-3xl font-bold text-white">${{ $sneaker->promotion_price }}
                                    </span>
                                    <span class="text-sm text-white line-through">${{ $sneaker->price }}</span>
                                @else
                                    <span class="text-3xl font-bold text-white">${{ $sneaker->price }}
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
                        <a wire:click="addToCart({{ $sneaker->id }}, 1)"
                            x-on:click="showNotification('Sneaker add to cart')"
                            class="flex items-center justify-center cursor-pointer rounded-md bg-white px-5 py-2.5 text-center text-sm font-medium text-black hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart</a>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90" class="fixed top-14 right-4">

        <div
            class="flex items-center w-full max-w-xs p-4 space-x-4 bg-white divide-x divide-black rounded-lg shadow-xl space-x text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            <div class="pl-4 text-sm font-bold" x-text="message">

            </div>
        </div>

    </div>
</div>
