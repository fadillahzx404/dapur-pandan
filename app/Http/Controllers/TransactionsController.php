<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\TransactionDetails;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactions.index');
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
        $data = $request->all();
        $users_id = $data['users_id'];

        $order_random_id = Str::random(10);
        $order_id = "#$order_random_id";

        $expired_time = date('24:00:00');

        $transaction = new Transactions();
        $transaction = Transactions::create([
            'users_id' => $data['users_id'],
            'order_id' => $order_id,
            'total_price' => $data['total_price'],
            'tax' => $data['tax'],
            'method_id' => $data['method_id'],
            'transaction_status' => $data['transaction_status'],
            'expired_time' => $expired_time,
        ]);

        foreach ($data['products'] as $key => $value) {
            $transaction_details = TransactionDetails::create([
                'order_id' => $order_id,
                'transaction_id' => $transaction->id,
                'product_id' => $data['products'][$key],
                'quantity' => $data['quantity'][$key],
            ]);
        }

        Carts::where('users_id', $users_id)->delete();

        return redirect()->route('transaction-payments', $transaction->id);
    }

    /**
     * Display the specified resource.
     */
    public function showPayment(Transactions $transactions, $id)
    {
        $transaction_payments = Transactions::findOrFail($id);
        $transDetails = TransactionDetails::where('order_id', $transaction_payments['order_id'])->get();

        return view('transactions.show_payment', ['trans_pay' => $transaction_payments, 'transDetails' => $transDetails]);
    }

    public function uploadConfirm(Request $request, Transactions $transactions, $id)
    {
        $data = $request->file('confirm_payment');

        $transactions = Transactions::findOrFail($id);
        $path = $data->store('/images/confirm_payment', 'public');
        $transactions->image_confirm = $path;
        $transactions->transaction_status = 'Paid';
        $transactions->save();

        return redirect()->route('thanks-confirm');
    }
    public function thanksConfirm()
    {
        return view('transactions.thanks_confirm');
    }

    public function transactionHistory($id)
    {
        $transactions = Transactions::where('users_id', $id)->get();

        return view('transactions.history', ['trans_his' => $transactions]);
    }
    public function transactionHistoryDetails($id)
    {
        $transactions = Transactions::findOrFail($id);
        $transDetails = TransactionDetails::where('order_id', $transactions['order_id'])->get();
        return view('transactions.history_details', ['trans_details' => $transactions, 'transDetails' => $transDetails]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateExpired(Request $request, Transactions $transactions, $id)
    {
        $item = Transactions::find($id);
        $item->expired_time = $request->expired;
        $item->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
