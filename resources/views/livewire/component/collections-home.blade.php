<div class="bg-black">
    <div class="w-full bg-black md:pt-20 pt-5 px-5">
        <div class="mx-5 flex md:justify-between">

            <div>
                <h1 class="text-2xl md:text-4xl text-white">Collections</h1>
            </div>

            <div class="ml-2 md:ml-0">
                <hr class="w-20 md:w-[700px] h-1 my-6 md:my-8 bg-white border-0 rounded">
            </div>

            <div class="hidden md:block">
                <h1 class="text-2xl md:text-4xl text-white -scale-x-100 traced-white">Collections</h1>
            </div>
        </div>
    </div>

    <div>
        <div class="bg-black">
            <div class="relative">
                <div class="mx-4 mt-8 py-4 sm:py-6">

                    <div id="slide-container-collections" class="flex overflow-hidden md:ml-10">
                        @foreach ($collections as $collection)
                            <div class="slide-item-collections flex-shrink-0 w-1/1 md:w-1/3 mr-3 md:mr-2">
                                <a href="/collections/details/{{ $collection->id }}" wire:navigate>
                                    <div class="rounded-lg shadow-lg">
                                        <div class="relative">
                                            <img class="w-80 h-80 border-2 border-white object-cover rounded-lg"
                                                src="{{ Storage::url($collection->image) }}"
                                                alt="Sunset in the mountains">
                                            <div>
                                                <div
                                                    class="absolute bottom-8 left-4 border-2 p-2 bg-slate-400 bg-opacity-40 rounded-xl font-bold text-xl hover:underline">
                                                    {{ $collection->brand->name }}
                                                    {{ $collection->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div
                    class="absolute top-0 left-0 z-0 flex items-center justify-center h-full px-4 group focus:outline-none">
                    <button id="prev-btn-collection" class="cursor-pointer rounded-full bg-black hover:bg-white">
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
                    class="absolute top-0 right-0 z-0 flex items-center justify-center h-full px-4 group focus:outline-none">
                    <button id="next-btn-collection" class="cursor-pointer rounded-full bg-black hover:bg-white">
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
    </div>

    <script>
        const slideContainerContainer = document.getElementById("slide-container-collections");
        const slideItemsContainer = document.querySelectorAll(".slide-item-collections");
        const numItemsCollection = slideItemsContainer.length;
        const itemsPerPageCollection = 3;
        let currentPageCollection = 0;

        function showPageCollection(pageCollection) {
            const startIndex = pageCollection;
            const endIndex = startIndex + itemsPerPageCollection;

            slideItemsContainer.forEach((item, index) => {
                const adjustedIndex = (index + numItemsCollection) % numItemsCollection;
                item.style.display = adjustedIndex >= startIndex && adjustedIndex < endIndex ? "block" : "none";
            });
        }

        function nextPage() {
            currentPageCollection = (currentPageCollection + 1) % numItemsCollection;
            showPageCollection(currentPageCollection);
        }

        function prevPage() {
            currentPageCollection = (currentPageCollection - 1 + numItemsCollection) % numItemsCollection;
            showPageCollection(currentPageCollection);
        }

        showPageCollection(currentPageCollection);

        // Adicione event listeners para os botões de navegação (próximo e anterior)
        document.getElementById("next-btn-collection").addEventListener("click", nextPage);
        document.getElementById("prev-btn-collection").addEventListener("click", prevPage);
    </script>
</div>
