<div>
    <h1 class="text-xl">Edit Collection</h1>

    <form wire:submit="save" class="mt-5">

        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection
                Name</label>
            <input type="text" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="text-red-500">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Brand Id -->
        <div class="mb-6">
            <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection Brand
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
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Collection
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

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection
                Description</label>
            <input type="text" wire:model="description"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="text-red-500">
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
