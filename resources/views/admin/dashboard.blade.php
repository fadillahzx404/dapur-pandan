@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('page-content')
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">

        <section class="dashboard w-full">
            <div class="title-heading  text-center w-full mt-8">
                <p class="text-3xl  max-sm:mx-auto p-5 [@media(min-width:625px)]:animate-bounce">Welcome On Dashboard <b>
                        {{ Auth::user()->name }} </b></p>
            </div>
            <div class="grid grid-cols-4  max-sm:grid max-sm:grid-cols-1 pt-5 gap-5 ">




                <a href="{{ route('banners.index') }}"
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-images fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Banners</div>
                        <div class="stat-value">{{ $banners }}</div>

                    </div>

                </a>
                <a href="{{ route('products.index') }}"
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-store fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Products</div>
                        <div class="stat-value">{{ $products }}</div>

                    </div>

                </a>
                <a href="{{ route('category.index') }}"
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-list-ol fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Category Products</div>
                        <div class="stat-value">{{ $categories }}</div>

                    </div>

                </a>
                <a href="{{ route('payment-methods.index') }}"
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-credit-card fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Payment Methods</div>
                        <div class="stat-value">{{ $payments }}</div>

                    </div>

                </a>
                <a href="{{ route('transactions.index') }}"
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-money-bill-wave fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Total Transactions</div>
                        <div class="stat-value">{{ $transactions }}</div>

                    </div>

                </a>
                <a href="{{ route('users-admin.index') }}"
                    class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm shadow-gray-400 rounded-lg transition hover:scale-90 delay-150 duration-300 ease-in-out grid">
                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-users fa-2xl"></i>
                        </div>
                        <div class="stat-title  text-lg font-semibold">Total Users</div>
                        <div class="stat-value">{{ $users }}</div>

                    </div>

                </a>




            </div>
        </section>


    </div>
@endsection
