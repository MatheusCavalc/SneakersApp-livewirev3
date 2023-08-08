<div class="pb-32 bg-white">
    {{-- Page Name --}}
    <div class="pl-3 md:pl-10 py-4 flex gap-4 bg-black text-white text-sm md:text-base">
        <p>Home</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p class="">My Orders</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p class="underline">My Orders: {{ $order->id }}</p>
    </div>

    <div>
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="mb-3 mx-6">
                <p class="my-2">Order ID: {{ $order->id }}</p>

                <p class="my-2">Order Date: {{ $order->created_at }}</p>
                <p class="my-2">Order Total: ${{ $order->total_price }}</p>
                <p class="my-2">Order Payment: {{ $order->status_payment }}</p>

                <p class="my-2"> SHIPPING ADDRESS: {{ $order->state }}, {{ $order->address1 }}
                </p>
                <p class="my-2"> ZIPCODE: {{ $order->zipcode }}</p>
            </div>

            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="my-2 mx-6 text-xl flex justify-start">
                Sneakers:
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mx-24">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
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
                                Price (total)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->sneakers as $sneaker)
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $sneaker['name'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $sneaker['quantity'] }}
                                </td>
                                <td class="flex gap-2 px-6 py-4">
                                    ${{ $sneaker['total_price'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
