<div class="bg-white pb-32">

    {{-- Page Name --}}
    <div class="pl-3 md:pl-10 py-4 flex gap-4 bg-black text-white text-sm md:text-base">
        <p>Home</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p class="underline">My Orders</p>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mx-24">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <!--
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
                @foreach ($orders as $order)
                    <tr wire:key="{{ $order->id }}" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <!--
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                -->
                        <td class="flex gap-2 px-6 py-4">
                            <p>
                                <a href="/my-orders/details/{{ $order->id }}" wire:navigate
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
