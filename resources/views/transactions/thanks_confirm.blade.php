<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Thanks For Confirmation</title>



    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')


</head>

<body>

    <div class="min-h-screen grid gap-4 place-content-center ">


        <img src="/images/success.svg" class="mx-auto" alt="">

        <div class="grid">
            <p class="text-center font-bold">Thanks For your Confirmation.</p>
            <p class="text-center text-sm">We will check 1/24 hours.</p>
        </div>
        <a href="/" class="btn btn-sm btn-accent">Back to home</a>

    </div>


    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
