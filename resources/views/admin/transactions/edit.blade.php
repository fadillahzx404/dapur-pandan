@extends('layouts.app')
@section('title')
    Edit Transaction
@endsection
@section('page-content')
    <div class="flash-data" data-error="{!! \Session::get('error') !!}"></div>
    <div class="container px-12 lg:mt-10 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="product-edit card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Edit Transaction <b>{{ $trans->order_id }}</b>
                        <span
                            class="ml-3 badge @if ($trans->transaction_status == 'Unpaid') badge-warning @elseif ($trans->transaction_status == 'Paid') badge-info @elseif ($trans->transaction_status == 'Process') badge-primary @elseif ($trans->transaction_status == 'Paid') badge-info @elseif ($trans->transaction_status == 'Fail') badge-error @elseif ($trans->transaction_status == 'Success') badge-accent @endif">{{ $trans->transaction_status }}</span>
                    </p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('transactions.update', $trans->id) }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-3">

                        <p class="cols-span-1 self-center text-xl">Order ID: </p>

                        <p class="cols-span-2 self-center text-xl">: <b>{{ $trans->order_id }}</b></p>
                    </div>
                    <div class="grid grid-cols-3">

                        <p class="cols-span-1 self-center text-xl">Name </p>

                        <p class="cols-span-2 self-center text-xl">: <b>{{ $trans->users->name }}</b></p>
                    </div>
                    <div class="grid grid-cols-3">

                        <p class="cols-span-1 self-center text-xl">Price(Tax)</p>

                        <p class="cols-span-2 self-center text-xl">: <b>Rp.
                                {{ number_format($trans->total_price) }}({{ number_format($trans->tax) }})</b></p>
                    </div>
                    <div class="grid grid-cols-3">

                        <p class="cols-span-1 self-center text-xl">Transaction Status Change</p>

                        <select class="select select-accent focus:outline-offset-0 focus:border-none  w-full max-w-xs "
                            name="transaction_status">
                            <option value="Unpaid" @if ($trans->transaction_status == 'Unpaid') selected @endif>Unpaid</option>
                            <option value="Paid" @if ($trans->transaction_status == 'Paid') selected @endif>Paid</option>
                            <option value="Process" @if ($trans->transaction_status == 'Process') selected @endif>Process</option>
                            <option value="Success"@if ($trans->transaction_status == 'Success') selected @endif>Success</option>

                        </select>
                    </div>
                    @if ($trans->transaction_status == 'Paid')
                        <div class="grid grid-cols-3">

                            <p class="cols-span-1 self-center text-xl">Confirmation Payment Image</p>

                            <img src="{{ asset('storage/' . $trans->image_confirm) }}" class="max-h-36 col-span-2"
                                alt="">
                        </div>
                    @endif

                    <div class="divider"></div>

                    <div class="product-list" style="text-align-last: center">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Products Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                @foreach ($transDetails as $item)
                                    <tbody>
                                        <!-- row 1 -->
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->products->name_product }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>Rp. {{ number_format($item->products->price) }}</td>
                                            <td>Rp. {{ number_format($item->products->price * $item->quantity) }}</td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>

                    </div>


                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('transactions.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-accent text-white transition duration-300 hover:scale-90"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </section>

    </div>
@endsection
