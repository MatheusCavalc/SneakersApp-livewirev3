<div>
    <div x-data="{
        open: false,
        message: '',
        showNotification: function(alert) {
            this.open = true;
            this.message = alert;
            setTimeout(() => {
                this.open = false;
            }, 3000);
        }
    }" class="relative">

        {{-- Carousel Home --}}
        <div class="mt-2">
            <livewire:component.carousel-home />
        </div>

        {{-- Last Promotions --}}
        <div class="">
            <div>
                <div class="w-full bg-white pb-6 md:pb-3 md:pt-20 pt-5">

                    {{-- Trendings --}}
                    <div class="flex justify-center bg-white py-5 px-5">
                        <div>
                            <div class="">
                                <hr class="w-20 md:w-[400px] h-1 my-6 md:my-8 bg-black border-0 rounded">
                            </div>
                        </div>
                        <div>
                            <p class="text-2xl md:text-4xl text-black traced-black mx-2">Trending</p>
                        </div>
                        <div>
                            <div class="">
                                <hr class="w-20 md:w-[400px] h-1 my-6 md:my-8 bg-black border-0 rounded">
                            </div>
                        </div>
                    </div>

                    {{-- Trending 1 --}}
                    <div
                        class="grid grid-cols-1 md:grid md:grid-cols-3 md:gap-1 md:mb-14 md:mt-3 md:ml-44 mx-4 md:mx-0">
                        <div class="order-2 md:order-1">
                            <div class="flex justify-center mt-3 md:mt-0">
                                <div class="my-auto">
                                    <div class="text-2xl italic mb-2">
                                        <h1>{{ $first_sneaker->brand->name }}</h1>
                                    </div>

                                    <div class="text-4xl font-bold mb-2">
                                        <h1>{{ $first_sneaker->name }}</h1>
                                    </div>

                                    <div class="mb-2">
                                        <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h1>
                                    </div>

                                    <div class="mb-2">
                                        <h1 class="text-3xl text-right font-bold">${{ $first_sneaker->promotion_price }}
                                        </h1>
                                    </div>

                                    <div>
                                        <a wire:click='addToCart({{ $first_sneaker->id }}, 1)'
                                            x-on:click="showNotification('Sneaker add to cart')"
                                            class="mb-3 cursor-pointer w-full h-10 bg-black hover:bg-white py-2 flex items-center justify-center gap-4 text-xs text-white hover:text-black rounded-lg font-bold text-light shadow-md shadow-orange hover:brightness-125 transition select-none"
                                            id="add-cart">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                            Add to cart
                                        </a>
                                    </div>

                                    <div>
                                        <a wire:click='addToWishlist({{ $first_sneaker->id }})'
                                            x-on:click="showNotification('Sneaker add to wishlist')"
                                            class="w-full cursor-pointer h-10 bg-white hover:bg-black py-2 flex items-center justify-center gap-4 text-xs text-black hover:text-white rounded-lg font-bold text-light shadow-md shadow-orange hover:brightness-125 transition select-none"
                                            id="add-cart">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 22 20" stroke-width="1.5"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2 flex justify-center order-1 md:order-2">
                            <img src="{{ Storage::url($first_sneaker->image) }}" alt="sneaker"
                                class="block object-cover mx-2 h-56 w-full md:h-96 sm:rounded-xl xl:w-[70%] xl:rounded-xl mt-0 md:mt-10 pointer-events-none transition duration-300 lg:w-3/4 lg:pointer-events-auto lg:cursor-pointer lg:hover:shadow-xl" />
                        </div>
                    </div>

                    {{-- Trending 2 --}}
                    <div
                        class="grid grid-cols-1 md:grid md:grid-cols-3 md:gap-1 md:mb-14 mt-6 md:mt-3 md:mr-44 mx-4 md:mx-0">
                        <div class="col-span-2 flex justify-center">
                            <img src="{{ Storage::url($second_sneaker->image) }}" alt="sneaker"
                                class="block object-cover mx-2 h-56 w-full md:h-96 sm:rounded-xl xl:w-[70%] xl:rounded-xl mt-0 md:mt-10 pointer-events-none transition duration-300 lg:w-3/4 lg:pointer-events-auto lg:cursor-pointer lg:hover:shadow-xl" />
                        </div>

                        <div class="flex justify-center mt-3 md:mt-0">
                            <div class="my-auto">
                                <div class="text-2xl italic mb-2">
                                    <h1>{{ $second_sneaker->brand->name }}</h1>
                                </div>

                                <div class="text-4xl font-bold mb-2">
                                    <h1>{{ $second_sneaker->name }}</h1>
                                </div>

                                <div class="mb-2">
                                    <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h1>
                                </div>

                                <div class="mb-2">
                                    <h1 class="text-3xl text-right font-bold">${{ $second_sneaker->price }}
                                    </h1>
                                </div>

                                <div>
                                    <a wire:click='addToCart({{ $second_sneaker->id }}, 1)'
                                        x-on:click="showNotification('Sneaker add to cart')"
                                        class="mb-3 cursor-pointer w-full h-10 bg-black hover:bg-white py-2 flex items-center justify-center gap-4 text-xs text-white hover:text-black rounded-lg font-bold text-light shadow-md shadow-orange hover:brightness-125 transition select-none"
                                        id="add-cart">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        Add to cart
                                    </a>
                                </div>

                                <div>
                                    <a wire:click='addToWishlist({{ $second_sneaker->id }})'
                                        x-on:click="showNotification('Sneaker add to wishlist')"
                                        class="w-full cursor-pointer h-10 bg-white hover:bg-black hover:text-white py-2 flex items-center justify-center gap-4 text-xs text-black rounded-lg font-bold text-light shadow-md shadow-orange hover:brightness-125 transition select-none"
                                        id="add-cart">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 22 20" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                        Add to Wishlist
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Top Brands --}}
        <div class="">

            {{-- Nike --}}
            <div>
                <livewire:component.sneakers-list />
            </div>

            {{-- Air Jordan
                <div>
                    <livewire:component.air-jordan-sneakers-list />
                </div>
            --}}
            {{-- Adidas
                <div>
                    <livewire:component.adidas-sneakers-list />
                </div>
            --}}
        </div>

        {{--
            <div>
                <livewire:component.collections-home />
            </div>
        --}}

        {{-- Brands --}}
        <div class="">
            <div class="flex justify-center bg-white md:pt-20 pt-5 px-5">
                <div>
                    <div class="">
                        <hr class="w-20 md:w-[400px] h-1 my-6 md:my-8 bg-black border-0 rounded">
                    </div>
                </div>
                <div>
                    <p class="text-2xl md:text-4xl text-black traced-black mx-2">Brands</p>
                </div>
                <div>
                    <div class="">
                        <hr class="w-20 md:w-[400px] h-1 my-6 md:my-8 bg-black border-0 rounded">
                    </div>
                </div>
            </div>
            <div class="flex justify-center bg-white">
                <div class="grid grid-cols-3 md:flex gap-4 my-7 mx-5 h-32">
                    @foreach ($allBrands as $brand)
                        <a href="/brands/{{ $brand->id }}/slug" wire:navigate class="hover:italic">
                            <div>
                                <img class="object-cover h-20 w-20 md:h-24 md:w-24 md:hover:h-28 md:hover:w-28 rounded-full border border-black p-1 hover:border-2"
                                    src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" />
                            </div>
                            <div>
                                <p class="text-center">{{ $brand->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- <livewire:component.sneakers-horizontal-list /> --}}

        <!-- Toast Notification -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90" class="fixed bottom-4 right-4">

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
</div>
