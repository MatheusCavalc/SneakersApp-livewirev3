<div>
    <div class="" x-data="{ open: false, open2: false }">
        <button x-on:click="open = !open" x-on:mouseover="open = true" x-on:mouseleave="open = false"
            id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
            class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Sneakers
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg></button>
        <!-- Dropdown menu -->
        <div x-show="open" x-on:mouseover="open = true" x-on:mouseleave="open = false"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="absolute p-4 z-10 font-normal divide-y divide-gray-100 rounded-lg shadow bg-black">

            <div class="md:flex md:gap-10">
                <div>
                    <div class="flex justify-center">
                        <a href="/collections" wire:navigate class="text-center text-white font-bold italic text-xl">Collections</a>
                    </div>

                    <div>
                        <ul class="py-2">
                            @foreach (\App\Models\Collection::all() as $collection)
                                <li class="text-white">
                                    <a href="#" class="block px-4 py-2 hover:underline font-bold">
                                        {{ $collection->brand->name }}
                                        {{ $collection->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div>
                    <h1 class="text-center text-white font-bold italic text-xl">Brands</h1>

                    <div>
                        <div class="grid grid-cols-3 gap-4 my-7 mx-5">
                            @foreach (\App\Models\Brand::all() as $brand)
                                <a href="/brands/{{ $brand->id }}/slug" wire:navigate
                                    class="hover:italic hover:underline font-bold">
                                    <div class="bg-white rounded-full">
                                        <img class="transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-125 object-cover h-10 w-14 md:h-10 md:w-14 p-1"
                                            src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" />
                                    </div>
                                    <div>
                                        <p class="text-center text-white">{{ $brand->name }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="relative" x-data="{
                    currentSlide: 1,
                    timeDuration: 15000,

                    nextSlide() {
                        if (this.currentSlide == 3) {
                            this.currentSlide = 1;
                            return;
                        }
                        this.currentSlide++;
                    },

                    prevSlide() {
                        if (this.currentSlide == 1) {
                            this.currentSlide = 3;
                            return;
                        }
                        this.currentSlide--;
                    },

                    autoPlay() {
                        setInterval(() => {
                            this.nextSlide();
                        }, this.timeDuration);
                    },
                }" x-init="autoPlay">

                    <h1 class="text-center text-white font-bold italic text-xl">Sneakers</h1>

                    {{-- Indicators Buttons --}}
                    <div class="my-3 z-30 flex justify-center space-x-3">

                        @foreach ($sneakers as $sneaker)
                            <button type="button" x-on:click="currentSlide = {{ $loop->index + 1 }}"
                                :class="{
                                    'bg-white': currentSlide == {{ $loop->index + 1 }},
                                    'bg-gray-500': currentSlide !=
                                        {{ $loop->index + 1 }}
                                }"
                                class="w-2 h-2 rounded-full bg-black" aria-current="true" aria-label="Slide 1"
                                data-carousel-slide-to="0"></button>
                        @endforeach

                    </div>

                    <div class="flex justify-center px-auto pt-2">

                        {{-- Carousel Slide --}}
                        <div class="flex w-48 h-52">

                            @foreach ($sneakers as $sneaker)
                                {{-- Slide 1 --}}
                                <div class="absolute w-full" x-show="currentSlide == {{ $loop->index + 1 }}"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90">

                                    {{-- Slide Content --}}
                                    <a href="/sneaker/{{ $sneaker->id }}/{{ $sneaker->slug }}" wire:navigate>
                                        <img class="w-48 h-40 object-cover rounded-xl" alt="1"
                                            src="{{ Storage::url($sneaker->image) }}" />

                                        <div class="mt-3 text-white">
                                            <h1 class="italic">{{ $sneaker->brand->name }}</h1>
                                            <h1 class="font-bold">{{ $sneaker->name }}</h1>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
