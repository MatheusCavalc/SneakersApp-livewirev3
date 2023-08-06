<div>
    <div class="flex justify-end">
        <div>
            <a href="/admin/brands/create" wire:navigate>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Brand
                </button>
            </a>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Sneaker name
                    </th>
                    <!--
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    -->
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr wire:key="{{ $brand->id }}" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $brand->name }}
                        </th>
                        <!--
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                -->
                        <td class="flex gap-2 px-6 py-4">
                            <p>
                                <a href="/admin/brands/edit/{{ $brand->id }}" wire:navigate
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </p>

                            <p>
                                <a wire:click='delete({{ $brand->id }})' href="#"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
