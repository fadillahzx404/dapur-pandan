@extends('layouts.root')
@section('title')
    Cart
@endsection
@section('content')
    <div class="cart-data" data-cart="{!! \Session::get('Success') !!}"></div>
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto grid gap-12">
        <div class="text-header max-lg:mt-10">
            <div class="text-2xl font-extrabold underline underline-offset-4">My Cart</div>
            <div class="text-sm font-light text-gray-500">The products has been chosen by yourself.</div>
        </div>

        <div class="flex flex-row gap-10 max-sm:grid">
            <section class="cart-items overflow-x-auto w-full">
                <table class="table table-xs">
                    <!-- head -->
                    <thead>
                        <tr>

                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="rounded-xl border-2 w-16 h-16">


                                                @forelse ($cart->products->images as $img)
                                                    <img src="{{ asset('storage/' . $img->image_product) }}" class="">
                                                @break

                                                @empty
                                                    {{-- If for some reason the business has no images, you can put here some kind of placeholder image, using 3rd party services or maybe your own generic image --}}
                                                    <img src="//via.placeholder.com/150x150" alt=""
                                                        class="img-fluid" />
                                                @endforelse



                                            </div>

                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $cart->products->name_product }}</div>
                                            <div class="text-sm opacity-50">{{ $cart->products->category->category_name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    RP. {{ number_format($cart->products->price) }}
                                </td>
                                <td>
                                    {{ $cart->quantity }}
                                    <!-- The button to open modal -->
                                    <label for="my_modal_6-{{ $cart->id }}"
                                        class="bg-gray-300 px-2 py-1 rounded-md ml-2"><i
                                            class="fa-solid fa-pen-to-square"></i> </label>

                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="my_modal_6-{{ $cart->id }}" class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box">
                                            <form action="{{ route('update-quantity', $cart->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <h3 class="font-bold text-lg">{{ $cart->products->name_product }}</h3>
                                                <p class="py-4">Edit the quantity of {{ $cart->products->name_product }}!
                                                </p>
                                                <div class="flex flex-row w-full justify-between mb-5">
                                                    <p class="text-sm font-bold">Quantity</p>
                                                    <div class="flex items-center space-x-3">
                                                        <button
                                                            class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 minus"
                                                            type="button" id="minus{{ $cart->id }}"
                                                            onclick="const x = $('#quantity-{{ $cart->id }}').val();$('#quantity-{{ $cart->id }}').val(x-1);"
                                                            data-min="{{ $cart->id }}">
                                                            <span class="sr-only">Quantity button</span>
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <div>
                                                            <input type="hidden" name="users_id"
                                                                value="{{ $cart->users_id }}">
                                                            <input type="hidden" name="name_product"
                                                                value="{{ $cart->products->name_product }}">
                                                            <input type="number" id="quantity-{{ $cart->id }}"
                                                                name="quantity" value="{{ $cart->quantity }}"
                                                                min="1" required
                                                                class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </div>
                                                        <button
                                                            class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                            type="button" id="plus"
                                                            data-plus="plus-{{ $cart->id }}"
                                                            onclick="var x = $('#quantity-{{ $cart->id }}').val();$('#quantity-{{ $cart->id }}').val(++x);">
                                                            <span class="sr-only">Quantity
                                                                button</span>
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="modal-action space-x-2 mt-2">

                                                    <label for="my_modal_6-{{ $cart->id }}"
                                                        class="btn btn-sm">Cancel</label>

                                                    <button type="submit"
                                                        class="btn btn-accent btn-sm text-white">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <label class="modal-backdrop" for="my_modal_6-{{ $cart->id }}">Close</label>
                                    </div>
                                </td>
                                <td>

                                    Rp. {{ number_format($cart->products->price * $cart->quantity) }}


                                </td>
                                <th>

                                    <label for="my_modal_2-{{ $cart->id }}"
                                        class="btn btn-error transition duration-300 hover:scale-90 max-sm:btn-sm"><i
                                            class="fa-solid fa-trash"></i></label>

                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="my_modal_2-{{ $cart->id }}" class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box flex flex-col place-items-center">
                                            <h3 class="text-lg font-bold ">Are you sure!</h3>
                                            <div class="bg-warning rounded-full p-2 mt-2 animate-pulse">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="stroke-current shrink-0 h-10 w-10 " fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>

                                            </div>
                                            <p class="py-4 font-normal">Delete this product
                                                <b>{{ $cart->products->name_product }}</b> on your cart ?
                                            </p>
                                            <div class="modal-action">
                                                <label for="my_modal_2-{{ $cart->id }}"
                                                    class="btn btn-accent btn-sm">Close!</label>
                                                <a href="{{ route('destroy-cart-item', $cart->id) }}"
                                                    class="btn btn-sm btn-error">yes delete it</a>
                                            </div>
                                        </div>
                                        <label class="modal-backdrop" for="my_modal_2-{{ $cart->id }}">Close</label>
                                    </div>

                                </th>
                            </tr>
                        @endforeach

                        <!-- row 2 -->

                    </tbody>
                    <!-- foot -->


                </table>
            </section>

            <section class="card-total card compact min-w-[24rem]">
                <div class="card card-compact w-full bg-base-100 border shadow-xl">

                    <div class="card-body ">
                        <h2 class="card-title">Order Summary</h2>
                        <form action="{{ route('make-payment') }}" method="POST">
                            @csrf

                            <div class="card-item-total-price mx-3 my-3">
                                <div class="grid gap-3">
                                    <div class="total flex flex-row justify-between">
                                        <p class="text-start">Subtotal Products</p>
                                        <p class="text-end font-bold text-base">Rp.
                                            <?php $sum = 0; ?>
                                            @foreach ($carts as $cart)
                                                <?php $subtotal = $cart->products->price * $cart->quantity;
                                                $sum += $subtotal;
                                                ?>
                                            @endforeach
                                            {{ number_format($sum) }}
                                        </p>
                                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">

                                    </div>

                                    <div class="total flex flex-row justify-between">
                                        <p class="text-start">Tax (11%)</p>
                                        <p class="text-end font-bold text-base">
                                            <?php $tax = ($sum * 11) / 100; ?>
                                            Rp.
                                            {{ number_format($tax) }}
                                        </p>
                                        <input type="hidden" name="tax" value="{{ $tax }}">
                                    </div>
                                    <div class="select-payment flex flex-row mt-3 place-items-center">
                                        <p>Payment Method</p>
                                        <select name="method_id"
                                            class="select select-accent focus:outline-offset-0 focus:border-none max-w-xs grow">
                                            @foreach ($payments as $pay)
                                                <option value="{{ $pay->id }}">
                                                    {{ $pay->method_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="" id="delivery_price"></div>
                                    <div class="divider"></div>
                                    <div class="total flex flex-row justify-between">
                                        <p class="text-start text-lg">Total Payment</p>
                                        <p class="text-end font-extrabold text-lg">Rp. {{ number_format($sum + $tax) }}
                                        </p>
                                        @foreach ($carts as $cart)
                                            <input type="hidden" name="products[]" value="{{ $cart->products->id }}">
                                            <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                                        @endforeach
                                        <input type="hidden" name="total_price" value="{{ $sum + $tax }}">
                                        <input type="hidden" name="transaction_status" value="Unpaid">
                                    </div>


                                    @if ($sum !== 0)
                                        <button onclick="my_modal_2.showModal()"
                                            class="btn btn-accent text-white rounded-3xl mt-5 transition duration-300 hover:scale-90">Make
                                            Payment</button>
                                    @endif

                                    <dialog id="my_modal_2" class="modal">
                                        <div class="modal-box">
                                            <form method="dialog">
                                                <button
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <p class="font-bold text-lg">Halo, <span>{{ Auth::user()->name }}</span></p>

                                            <p class="py-4">Make sure your product, payment method and delivery is
                                                correct?
                                            </p>

                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <!-- if there is a button in form, it will close the modal -->
                                                    <button
                                                        class="btn btn-error btn-sm duration-300 hover:scale-90">Back</button>
                                                </form>
                                                <button type="submit"
                                                    class="btn btn-accent btn-sm text-white transition duration-300 hover:scale-90">Continue</button>
                                            </div>

                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </section>
        </div>

    </div>
@endsection
