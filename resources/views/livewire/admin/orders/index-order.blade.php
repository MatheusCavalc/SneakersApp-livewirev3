<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Shipping Status
                    </th>
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
                            {{ $order->status_shipping }}
                        </td>
                        <td class="flex gap-2 px-6 py-4">
                            <p>
                                <a href="/admin/orders/show/{{ $order->id }}" wire:navigate
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
