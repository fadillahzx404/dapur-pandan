@extends('layouts.root')
@section('title')
    Transactions
@endsection
@section('content')
    <div class="cart-data" data-cart="{!! \Session::get('Success') !!}"></div>
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto flex flex-col gap-12 min-h-screen">
        <div class="text-header max-lg:mt-10 grid gap-12">
            <div class="flex justify-between">
                <div class="text-header">
                    <p class="text-2xl">Order ID <span class="text-2xl font-extrabold"> {{ $trans_details->order_id }}</span>
                    </p>
                    <p
                        class="badge  mt-2.5 font-bold @if ($trans_details->transaction_status == 'Unpaid') badge-warning @elseif ($trans_details->transaction_status == 'Paid') badge-info @elseif ($trans_details->transaction_status == 'Process') badge-primary @elseif ($trans_details->transaction_status == 'Paid') badge-info @elseif ($trans_details->transaction_status == 'Fail') badge-error @elseif ($trans_details->transaction_status == 'Success') badge-accent @endif">
                        {{ $trans_details->transaction_status }}
                    </p>
                </div>
                <div class="grid place-content-end">
                    <div class="prose">
                        <h3>Total Payment: </h3>
                        <h1>Rp. {{ number_format($trans_details->total_price) }}</h1>
                    </div>
                </div>
            </div>
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
                                </tr>

                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>


        </div>



    </div>
@endsection
