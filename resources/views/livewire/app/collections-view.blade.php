<div>
    <div class="md:grid md:grid-cols-4 bg-white py-5 mt-1">
        <div class="text-center text-3xl">
            Collections
        </div>

        <div class="md:col-span-3 mt-10 md:mt-0 flex justify center">
            <div class="md:grid md:grid-cols-3 mx-3">

                @foreach ($collections as $collection)
                    <a href="/collections/details/{{ $collection->id }}" wire:navigate>
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img class="w-full" src="{{ Storage::url($collection->image) }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2"> {{ $collection->brand->name }}
                                    {{ $collection->name }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $collection->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
