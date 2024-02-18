<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;

class PaymentMethodsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pay = PaymentMethods::all();
        return view('admin.paymentmethods.index', ['payments' => $pay]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paymentmethods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        PaymentMethods::create($data);

        return redirect()
            ->route('payment-methods.index')
            ->with('Success', 'New Payment Methods has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethods $paymentMethods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethods $paymentMethods, $id)
    {
        $pay = PaymentMethods::findOrFail($id);
        return view('admin.paymentmethods.edit', ['pay' => $pay]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethods $paymentMethods, $id)
    {
        $data = $request->all();

        $item = PaymentMethods::findOrFail($id);

        $item->update($data);

        return redirect()
            ->route('payment-methods.index')
            ->with('Success', 'The Payment Methods has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethods $paymentMethods, $id)
    {
        $item = PaymentMethods::findOrFail($id);
        $item->delete();
        return redirect()
            ->route('payment-methods.index')
            ->with('Success', 'The Payment Methods has been delete');
    }
}
