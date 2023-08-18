<div class="relative">
    <div class="mx-4 mt-8 py-1 sm:py-6">
        <div id="slide-container" class="flex overflow-hidden">
            <!-- Itens do Slide -->
            @foreach ($sneakersNike as $sneaker)
                <div class="slide-item flex-shrink-0 w-1/1 md:w-1/4">
                    <div
                        class="relative mb-5 md:mb-0 mx-auto md:mx-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white transition shadow-white duration-300 lg:hover:shadow-xl">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl"
                            href="/sneaker/{{ $sneaker->id }}/{{ $sneaker->slug }}" wire:navigate>
                            <img class="absolute transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-125     object-cover h-60 w-80"
                                src="{{ Storage::url($sneaker->image) }}" alt="{{ $sneaker->name }}" />
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
                                <h5 class="text-xl tracking-tight text-slate-900 h-14 w-40 md:w-full">
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
                                        class="mr-2 ml-3 rounded bg-black text-white px-2.5 py-0.5 text-xs font-semibold">5.0</span>
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
                </div>
            @endforeach

            <!-- Adicione mais itens conforme necessário -->
        </div>
    </div>

    <div class="absolute top-0 left-0 z-0 flex items-center justify-center h-full px-4 group focus:outline-none">
        <button id="prev-btn" class="cursor-pointer rounded-full bg-black hover:bg-white">
            <span class="inline-flex items-center justify-center w-10 h-9 group-focus:ring-4 group-focus:ring-white">
                <p class="text-5xl traced-white hover:traced-black">
                    < </p>
                        <span class="sr-only">Previous</span>
            </span>
        </button>
    </div>

    {{-- Button Next Slide --}}
    <div class="absolute top-0 right-0 z-0 flex items-center justify-center h-full px-4 group focus:outline-none">
        <button id="next-btn" class="cursor-pointer rounded-full bg-black hover:bg-white">
            <span class="inline-flex items-center justify-center w-10 h-9 group-focus:ring-4 group-focus:ring-white">
                <p class="text-5xl traced-white">
                    >
                </p>
                <span class="sr-only">Previous</span>
            </span>
        </button>
    </div>
</div>
