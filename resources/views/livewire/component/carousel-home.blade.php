<div>
    <div class="relative bg-white pt-10" x-data="{
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

        {{-- Carousel Slide --}}
        <div class="flex relative h-60 md:h-96 w-full">

            {{-- Slide 1 --}}
            <div class="bg-black absolute w-full" x-show="currentSlide == 1"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                <div class="relative">
                    {{-- Slide Content --}}
                    <img class="h-60 md:h-96 w-full object-cover" alt="1"
                        src="https://cdn.awsli.com.br/1832/1832657/produto/96108710/937ad7e7d6.jpg" />

                    <div class="absolute top-0 left-8">
                        <p class="text-2xl md:text-4xl text-black traced-black mx-2">Gucci</p>
                    </div>
                </div>

            </div>

            {{-- Slide 2 --}}
            <div class="bg-black absolute w-full" x-show="currentSlide == 2"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                <div class="relative">
                    {{-- Slide Content --}}
                    <img class="h-60 md:h-96 w-full object-cover" alt="2"
                        src="https://bexit.gumlet.io/media/catalog/product/i/m/img_2D_0001_129325.jpg?w=440&h=440&trim=5&mode=fill&pad=30" />

                    <div class="absolute top-0 left-8">
                        <p class="text-2xl md:text-4xl text-black traced-black mx-2">Dsquared2</p>
                    </div>
                </div>

            </div>

            {{-- Slide 3 --}}
            <div class="bg-black absolute w-full" x-show="currentSlide == 3"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                <div class="relative">
                    {{-- Slide Content --}}
                    <img class="h-60 md:h-96 w-full object-cover" alt="3"
                        src="https://www.credomen.com/pimages/104-03836-1-750-1000.jpg" />

                    <div class="absolute top-0 left-8">
                        <p class="text-2xl md:text-4xl text-black traced-black mx-2">Dsquared2</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- Indicators Buttons --}}
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" x-on:click="currentSlide = 1"
                :class="{ 'bg-black': currentSlide == 1, 'bg-white': currentSlide != 1 }"
                class="w-5 h-2 rounded-full bg-black" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" x-on:click="currentSlide = 2"
                :class="{ 'bg-black': currentSlide == 2, 'bg-white': currentSlide != 2 }" class="w-5 h-2 rounded-full"
                aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" x-on:click="currentSlide = 3"
                :class="{ 'bg-black': currentSlide == 3, 'bg-white': currentSlide != 3 }" class="w-5 h-2 rounded-full"
                aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>

        {{-- Button Prev Slide --}}
        <div
            class="invisible md:visible absolute top-0 left-0 z-0 flex items-center justify-center h-full px-4 group focus:outline-none">
            <button x-on:click="prevSlide()" class="cursor-pointer rounded-full bg-black hover:bg-white">
                <span
                    class="inline-flex items-center justify-center w-10 h-9 group-focus:ring-4 group-focus:ring-white">
                    <p class="text-5xl traced-white hover:traced-black">
                        < </p>
                            <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>

        {{-- Button Next Slide --}}
        <div
            class="invisible md:visible absolute top-0 right-0 z-0 flex items-center justify-center h-full px-4 group focus:outline-none">
            <button x-on:click="nextSlide()" class="cursor-pointer rounded-full bg-black hover:bg-white">
                <span
                    class="inline-flex items-center justify-center w-10 h-9 group-focus:ring-4 group-focus:ring-white">
                    <p class="text-5xl traced-white">
                        >
                    </p>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>

    </div>
</div>
