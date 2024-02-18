@extends('layouts.root')
@section('title')
    Transaction
@endsection
@section('content')
    <div class="cart-data" data-cart="{!! \Session::get('Success') !!}"></div>
    <div class="container px-20 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto grid gap-12">

        <div class="prose flex flex-row gap-4 text-title">
            <h3>Your Order ID
            </h3>
            <h2>{{ $trans_pay->order_id }}</h2>
        </div>
        <div class="text-countdown grid justify-center gap-4 text-center">
            <p class="text-gray-600 ">Price You Must Paying</p>
            <p class=" text-6xl font-bold">RP. {{ number_format($trans_pay->total_price) }}</p>
            <p>Tranfer to:</p>
            <p class="text-2xl">{{ $trans_pay->methodPay->method_name }} - {{ $trans_pay->methodPay->account_number }}</p>

            <!-- Open the modal using ID.showModal() method -->
            <button class="btn btn-sm btn-accent text-white" onclick="my_modal_5.showModal()">Confirmation Payment</button>
            <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <form action="{{ route('upload-confirm-payment', $trans_pay->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <h3 class="font-bold text-lg">Hello!</h3>
                        <p class="py-4">Please confirmation your payment.</p>


                        <div class="form-control image-up">

                            <label for="files" class="label">
                                <span class="label-text">Upload image</span>

                            </label>

                            <input type="file" accept="image/*" onchange="preview(this)"
                                class="file-input file-input-bordered file-input-accent file-input-sm w-full focus:outline-offset-0 focus:border-accent"
                                name="confirm_payment" />

                            <div class="preview-area flex flex-row gap-2"></div>

                        </div>
                        <div class="modal-action">

                            <button type="submit" class="btn btn-sm btn-accent">Send</button>
                        </div>
                    </form>
                </div>


            </dialog>
        </div>
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
@endsection

{{-- @push('addon-script')
    <script>
        function Timer(duration, display, display1) {
            var timer = duration,
                hours, minutes, seconds;
            setInterval(function() {
                hours = parseInt((timer / 3600) % 24, 10)
                minutes = parseInt((timer / 60) % 60, 10)
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.html(hours + " <span class='text-base'>Hours</span> " + minutes +
                    " <span class='text-base'>Minutes</span> " +
                    seconds +
                    " <span class='text-base'>Second</span> ");
                display1.text(hours + ":" + minutes + ":" +
                    seconds);



                --timer;
            }, 1000);
        }

        jQuery(function($) {
            var twentyFourHours = 24 * 60 * 60;
            var display = $('#demo');
            var display1 = $('#display1');

            Timer(twentyFourHours, display, display1);
        });


        setInterval(function() {
            var transaction_id = $(".transaction_id").data('id');
            var expired = $('#display1').text();


            $.ajax({
                url: "{{ route('transaction-update-expired', $trans_pay->id) }}",
                method: "POST",
                data: {
                    id: transaction_id,
                    expired: expired
                },
                success: function(data) {
                    console.log(data);
                },
            });


        }, 2000);
    </script>
@endpush --}}

@push('addon-script')
    <script>
        function preview(elem, output = '') {
            Array.from(elem.files).map((file) => {
                const blobUrl = window.URL.createObjectURL(file)
                output += `<img class='max-h-[20rem] max-w-[15rem] border-2 mt-3 rounded-md' src=${blobUrl}>`
            })
            elem.nextElementSibling.innerHTML = output
        }
    </script>
@endpush
