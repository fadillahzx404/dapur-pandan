<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;

class TransactionsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::all();

        return view('admin.transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions, $id)
    {
        $trans = Transactions::findOrFail($id);
        $transDetails = TransactionDetails::where('order_id', $trans['order_id'])->get();
        return view('admin.transactions.edit', ['trans' => $trans, 'transDetails' => $transDetails]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transactions, $id)
    {
        $data = $request->all();
        $product = Transactions::findOrFail($id)->update([
            'transaction_status' => $data['transaction_status'],
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('Success', 'The Transaction Status has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions, $id)
    {
        $item = Transactions::findOrFail($id);
        $item1 = TransactionDetails::where('order_id', $item['order_id'])->delete();
        $item->delete();

        return redirect()
            ->route('transactions.index')
            ->with('Success', 'The Transaction has been delete');
    }
}
