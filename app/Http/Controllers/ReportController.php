<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('report')->with([
            'title' => 'Laporan',
            'message' => null,
            'class' => null,
        ]);
    }

    public function get()
    {
        $data =
            \DB::table('customers')
            ->select('customers.name', 'credit_cards.balance', 'customers.email',  'customers.telephone', 'customers.address', 'customers.gender')
            ->join('credit_cards', 'customers.card_number', 'credit_cards.card_number')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
