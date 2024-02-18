@extends('layouts.app')
@section('title')
    Edit Paynment Methods
@endsection
@section('page-content')
    <div class="flash-data" data-error="{!! \Session::get('error') !!}"></div>
    <div class="container px-12 lg:mt-10 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="product-edit card card-compact bg-white shadow-xl rounded-md">
            <div class="card-body">
                <div class="grid title gap-2">
                    <p class="text-lg font-medium">Edit Payment Methods <b>{{ $pay->method_name }}</b></p>
                    <hr class="mb-3 border-gray-300" />
                </div>
                <form action="{{ route('payment-methods.update', $pay->id) }}" method="POST" class="grid gap-3"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Method Name</span>
                        </label>
                        <input type="text" name="method_name" value="{{ $pay->method_name }}"
                            class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Account Name</span>
                        </label>
                        <input type="text" name="account_name" value="{{ $pay->account_name }}"
                            class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Account Number</span>
                        </label>
                        <input type="number" name="account_number" value="{{ $pay->account_number }}"
                            class="input input-bordered input-accent w-full focus:outline-offset-0 focus:border-accent" />
                    </div>


                    <div class="flex flex-row gap-2 mt-10 justify-end">
                        <a href="{{ route('payment-methods.index') }}"
                            class="btn btn-sm btn-error transition duration-300 hover:scale-90">Cancel</a>
                        <button class="btn btn-sm px-5 btn-accent text-white transition duration-300 hover:scale-90"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </section>

    </div>
@endsection
