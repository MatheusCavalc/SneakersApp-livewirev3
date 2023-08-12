<div>
    <h1 class="text-xl">Edit Sneaker</h1>

    <form wire:submit="save" class="mt-5">

        <!-- Published -->
        <div class="flex items-center mb-4">
            <input id="published" type="checkbox" wire:model="published"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="published" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Published</label>
        </div>

        <!-- Brand Id -->
        <div class="mb-6">
            <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker Brand
                Id</label>
            <select wire:model="brand_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled>Select a Brand</option>
                @foreach (\App\Models\Brand::all() as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            <div class="text-red-500">
                @error('brand_id')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Image -->
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Sneaker
                Image</label>
            <input wire:model="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file">
            <div class="text-red-500">
                @error('image')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker
                Name</label>
            <input type="text" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="text-red-500">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Price -->
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker
                Price</label>
            <input type="text" wire:model="price"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="text-red-500">
                @error('price')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Promotion Price -->
        <div class="mb-6">
            <label for="promotion_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker
                Promotion Price</label>
            <input type="text" wire:model="promotion_price"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="text-red-500">
                @error('promotion_price')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- In Promotion -->
        <div class="flex items-center mb-4">
            <input id="in_promotion" type="checkbox" wire:model="in_promotion"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="in_promotion" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">In
                Promotion</label>
        </div>

        <!-- Color -->
        <div class="mb-6">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker
                Color</label>
            <input type="text" wire:model="color"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="text-red-500">
                @error('color')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Sizes -->
        <div class="mb-6">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker
                Sizes</label>
            <div class="flex gap-3 items-start mb-1">

                <!-- 38 -->
                <div class="flex items-center h-5">
                    <input type="checkbox" value="38" wire:model="sizes"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                </div>
                <label for="remember" class="text-sm font-medium text-gray-900 dark:text-gray-300">38</label>

                <!-- 39 -->
                <div class="flex items-center h-5">
                    <input type="checkbox" value="39" wire:model="sizes"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                </div>
                <label for="remember" class="text-sm font-medium text-gray-900 dark:text-gray-300">39</label>

                <!-- 40 -->
                <div class="flex items-center h-5">
                    <input type="checkbox" value="40" wire:model="sizes"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                </div>
                <label for="remember" class="text-sm font-medium text-gray-900 dark:text-gray-300">40</label>
            </div>
            <div class="text-red-500">
                @error('sizes')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Collection Id -->
        <div class="mb-6">
            <label for="collection_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sneaker
                Collection
                Id</label>
            <select wire:model="collection_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled>Select a collection</option>
                <option value=""></option>
                @foreach (\App\Models\Collection::all() as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                @endforeach
            </select>
            <div class="text-red-500">
                @error('collection_id')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div>
