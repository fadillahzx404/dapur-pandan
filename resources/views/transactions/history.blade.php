@extends('layouts.root')
@section('title')
    Transactions
@endsection
@section('content')
    <div class="cart-data" data-cart="{!! \Session::get('Success') !!}"></div>
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto flex flex-col gap-12 min-h-screen">
        <div class="text-header max-lg:mt-10">
            <div class="text-2xl font-extrabold underline underline-offset-4">My Transactions</div>
            <div class="text-sm font-light text-gray-500">All transaction on here.</div>
            <p class="mt-2">Informasi Status:</p>
            <div class="item-label grid">
                <div class="flex gap-2">
                    <div class="badge badge-warning mt-2.5 mr-2 font-bold">
                        Unpaid
                    </div>
                    <p class="self-center mt-2.5">Transaksi Belum Dibayarkan.</p>
                </div>
                <div class="flex gap-2">
                    <div class="badge badge-info mt-2.5 mr-6 font-bold">
                        Paid
                    </div>
                    <p class="self-center mt-2.5">Transaksi Sudah Dibayarkan Menunggu Untuk Di lihat Admin dan akan Process.
                    </p>
                </div>
                <div class="flex gap-2">
                    <div class="badge badge-primary mt-2.5 font-bold">
                        Process
                    </div>
                    <p class="self-center mt-2.5">Transaksi Sedang Di Process.</p>
                </div>
                <div class="flex gap-2">
                    <div class="badge badge-error mt-2.5  mr-7 font-bold">
                        Fail
                    </div>
                    <p class="self-center mt-2.5">Transaksi Gagal, Entah Dari Pembayaran Ataupun Pembeli Ingin
                        Membatalkan
                        Pemesanan.</p>
                </div>

            </div>
        </div>

        <div class="flex flex-row gap-10 max-sm:grid">
            <section class="cart-items overflow-x-auto w-full">
                <table class="table table-xs">
                    <!-- head -->
                    <thead>
                        <tr class="text-center">

                            <th>No.</th>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Method Payment</th>
                            <th>Transaction Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($trans_his as $his)
                            <tr class="text-center">
                                <td class="text-lg">
                                    {{ $loop->iteration }}.
                                </td>
                                <th class="text-lg">
                                    {{ $his->order_id }}
                                </th>
                                <td class="text-lg">Rp. {{ number_format($his->total_price) }}</td>
                                <td class="text-lg">
                                    {{ $his->methodPay->method_name }}



                                </td>
                                <td
                                    class="badge  mt-2.5 font-bold @if ($his->transaction_status == 'Unpaid') badge-warning @elseif ($his->transaction_status == 'Paid') badge-info @elseif ($his->transaction_status == 'Process') badge-primary @elseif ($his->transaction_status == 'Paid') badge-info @elseif ($his->transaction_status == 'Fail') badge-error @elseif ($his->transaction_status == 'Success') badge-accent @endif">
                                    {{ $his->transaction_status }}



                                </td>
                                <td><a href="{{ route('transactions-history-details', $his->id) }}"
                                        class="btn btn-sm btn-accent text-white hover:scale-90 transition duration-300"><span><svg
                                                class="w-6 h-6text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M2.539 17h12.476l4-9H5m-2.461 9a1 1 0 0 1-.914-1.406L5 8m-2.461 9H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.443a1 1 0 0 1 .8.4l2.7 3.6H16a1 1 0 0 1 1 1v2H5" />
                                            </svg></span>See Details</a></td>

                            </tr>
                        @endforeach

                        <!-- row 2 -->

                    </tbody>
                    <!-- foot -->


                </table>
            </section>


        </div>

    </div>
@endsection
