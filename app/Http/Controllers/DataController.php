<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\CreditCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DataController extends Controller
{
    public function index()
    {
        return view('data')->with([
            'title' => 'Data',
            'message' => null,
            'class' => null,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->type == 'nasabah') {
            $request->validate([
                'name' => 'required|string',
                'telephone' => 'required|min:10|max:14',
                'email' => 'required|email',
                'gender' => 'required'
            ]);

            // check customer already exists
            $customer_telp = Customer::where('telephone', $request->telephone)->exists();
            $customer_email = Customer::where('email', $request->email)->exists();

            if ($customer_telp or $customer_email) {
                if ($customer_telp) {
                    $message = 'Nomor telephone telah terdaftar di akun nasabah lain.';
                } elseif ($customer_email) {
                    $message = 'Email telah terdaftar di akun nasabah lain.';
                }
                $class = 'alert-danger';
            } else {
                $check_identity_number = true;
                while ($check_identity_number) {
                    $identity_number = uniqid('IN');
                    $check_identity_number = Customer::where('card_number', $identity_number)->exists();
                }

                Customer::Create(
                    [
                        'name' => $request->name,
                        'telephone' => $request->telephone,
                        'email' => $request->email,
                        'card_number' => $identity_number,
                        'address' => $request->address,
                        'gender' => $request->gender
                    ]
                );

                CreditCard::create(
                    [
                        'card_number' => $identity_number,
                        'balance' => 0,
                        'last_transaction_id' => null,
                    ]
                );

                $message = 'Berhasil membuat akun ' . $request->type;
                $class = 'alert-success';

                app('App\Http\Controllers\MailController')->send($request->email, $identity_number); // send email
            }
        } else if ($request->type == 'admin') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'telephone' => 'required|min:10|max:14',
                'identity_number' => 'required|min:10|max:16',
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)
                        ->mixedCase()
                        ->numbers()
                ],
            ]);

            // check admin already exists or not exists
            $admin_telp = User::where('telephone', $request->telephone)->exists();
            $admin_email = User::where('email', $request->email)->exists();

            if ($admin_telp or $admin_email) {
                if ($admin_email) {
                    $message = 'Email telah terdaftar di akun admin lain.';
                } elseif ($admin_telp) {
                    $message = 'Nomor telephone telah terdaftar di akun admin lain.';
                }
                $class = 'alert-danger';
            } else {
                User::Create(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'telephone' => $request->telephone,
                        'identity_number' => $request->identity_number,
                        'password' => Hash::make($request->password),
                    ]
                );

                $message = 'Berhasil membuat akun ' . $request->type;
                $class = 'alert-success';

                app('App\Http\Controllers\MailController')->send($request->email, $request->password); // send email
            }
        }

        return view('data')->with([
            'title' => 'Data',
            'message' => $message,
            'class' => $class,
        ]);
    }
}
