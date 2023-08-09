<div class="bg-white">

    {{-- Page Name --}}
    <div class="pl-3 md:pl-10 py-4 flex gap-4 bg-black text-white text-sm md:text-base">
        <p>Home</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p class="underline">Shopping</p>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
        <p>Payment</p>
    </div>

    @if ($cartBox)
        <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 bg-white py-3">

            <div class="px-4 pt-8 bg-white">
                <p class="text-xl font-medium">Order Summary</p>
                <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>

                {{-- Products on cart --}}
                <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">

                    @foreach ($cartBox as $sneaker)
                        <div wire:key="{{ $sneaker->id }}" class="flex flex-row rounded-lg bg-white">
                            <img class="m-2 h-24 w-24 rounded-md border object-cover object-center"
                                src="{{ Storage::url($sneaker->image) }}" alt="" />
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{ $sneaker->name }}</span>
                                <span class="float-right text-gray-400">{{ $sneaker->size }} BR</span>
                                <p class="text-lg font-bold">
                                    {{ $sneaker->quantity }} x {{ $sneaker->price }} = ${{ $sneaker->total_price }}
                                </p>
                            </div>

                            <div wire:click='removeItem({{ $sneaker->id }})' class="cursor-pointer mt-3 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- Shipping options
            <p class="mt-8 text-lg font-medium">Shipping Methods</p>
            <form class="mt-5 grid gap-6">
                <div class="relative">
                    <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_1">
                        <img class="w-14 object-contain" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Fedex Delivery</span>
                            <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
                        </div>
                    </label>
                </div>
                <div class="relative">
                    <input class="peer hidden" id="radio_2" type="radio" name="radio" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_2">
                        <img class="w-14 object-contain" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Fedex Delivery</span>
                            <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
                        </div>
                    </label>
                </div>
            </form>
            --}}
            </div>


            <div class="mt-10 bg-black px-4 pt-8 lg:mt-0">
                <form wire:submit="placeOrder">
                    <p class="text-xl text-white font-medium">Payment Details</p>
                    <p class="text-white">Complete your order by providing your payment details.</p>

                    {{-- Email --}}
                    <div class="">
                        <label for="email" class="mt-4 mb-2 block text-sm text-white font-medium">Email</label>
                        <div class="relative">
                            <input type="text" id="email" name="email" wire:model='email' required
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-5 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="your.email@gmail.com" />
                        </div>
                        <div class="text-red-500">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Card Holder
                <label for="card-holder" class="mt-4 mb-2 block text-sm text-white font-medium">Card Holder</label>
                <div class="relative">
                    <input type="text" id="card-holder" name="card-holder"
                        class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Your full name here" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                    </div>
                </div>
                --}}

                    {{-- Card Details
                <label for="card-no" class="mt-4 mb-2 block text-sm text-white font-medium">Card Details</label>
                <div class="flex">
                    <div class="relative w-7/12 flex-shrink-0">
                        <input type="text" id="card-no" name="card-no"
                            class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="xxxx-xxxx-xxxx-xxxx" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                            </svg>
                        </div>
                    </div>
                    <input type="text" name="credit-expiry"
                        class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="MM/YY" />
                    <input type="text" name="credit-cvc"
                        class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="CVC" />
                </div> --}}

                    {{-- Address --}}
                    <div class="">
                        <label for="billing-address" class="mt-4 mb-2 block text-sm text-white font-medium">Billing
                            Address</label>
                        <div class="sm:w-full">
                            <div>
                                <input type="text" id="billing-address" name="billing-address" wire:model='address1'
                                    required
                                    class="w-full rounded-md border border-gray-200 px-4 py-3 pl-5 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Street Address" />
                            </div>

                            <div class="text-red-500">
                                @error('address1')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- State --}}
                    <div>
                        <label for="billing-address" class="mt-4 mb-2 block text-sm text-white font-medium">
                            State
                        </label>
                        <div>
                            <div>
                                <input type="text" name="billing-zip" wire:model='state' required
                                    class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 pl-5 text-sm shadow-sm outline-none w-full focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="State" />
                            </div>
                        </div>

                        <div class="text-red-500">
                            @error('state')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Zipcode --}}
                    <div>
                        <label for="billing-address" class="mt-4 mb-2 block text-sm text-white font-medium">
                            Zipcode
                        </label>
                        <div>
                            <div>
                                <input type="text" name="billing-zip" wire:model='zipcode' required
                                    class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 pl-5 text-sm shadow-sm outline-none w-full focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="ZIP" />
                            </div>
                        </div>

                        <div class="text-red-500">
                            @error('zipcode')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="mt-6 border-t border-b py-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-white">Subtotal</p>
                            <p class="font-semibold text-white">${{ $total_value }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-white">Shipping</p>
                            <p class="font-semibold text-white">$0.00</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-white">Total</p>
                        <p class="text-2xl font-semibold text-white">${{ $total_value }}</p>
                    </div>
                    <button type="submit"
                        class="mt-4 mb-8 w-full rounded-md bg-white px-6 py-3 font-medium text-black">Place
                        Order</button>
                </form>
            </div>
        </div>
    @else
        <div class="bg-white ml-10 pb-20">
            <p class="text-very-dark mb-4 font-bold text-3xl lg:text-4xl ml-10 mt-10">
                Cart empty
            </p>
        </div>
    @endif

</div>

</div>
