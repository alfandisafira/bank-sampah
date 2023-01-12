<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Models\RubbishType;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($message = null, $class = null)
    {
        // get data
        $rubishes = RubbishType::get();

        return view('transaction')->with([
            'title' => 'Transaksi',
            'rubishes' => $rubishes,
            'message' => $message,
            'class' => $class,
        ]);
    }

    public function get(Request $request)
    {
        $data = \DB::table($request->tb_name)->where($request->where_param, $request->id)->first();

        if ($request->where_param == 'card_number' and !empty($data)) {
            $data->balance = CreditCard::where($request->where_param, $request->id)->first()->balance;
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $cc = CreditCard::where('card_number', $request->rekening)->first();

        if (!$cc) {
            return $this->index('Nomor rekening tidak valid!', 'alert-danger');
        } else {
            if ($request->jenis_transaksi == 'SETOR') {
                $cc->balance = $cc->balance + $request->total_amount;
            } else if ($request->jenis_transaksi == 'TARIK') {
                if ($cc->balance >= $request->total_amount) {
                    $cc->balance = $cc->balance - $request->total_amount;
                    $request->total_amount = $request->total_amount - (2 * $request->total_amount);
                } else {
                    return $this->index('Saldo tidak cukup!', 'alert-danger');
                }
            }

            $cc->updated_at = now()->toDateTimeString();
            $cc->save();

            Transaction::create([
                'date' => $request->date,
                'type' => $request->jenis_transaksi,
                'rubbish_code' => $request->jenis_barang,
                'amount' => $request->amount,
                'total_value' => $request->total_amount,
                'customer_number' => $request->rekening,
                'admin_number' => auth()->user()->identity_number,
            ]);

            return $this->index('Transaksi berhasil', 'alert-success');
        }
    }
}
