<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Mail\SendSecretData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send($email, $secret_data)
    {
        $customer = Customer::where('email', $email)->first();
        $user = User::where('email', $email)->first();

        if ($user) {
            $data = $user;
            $type = 'admin';
        } else if ($customer) {
            $data = $customer;
            $type = 'nasabah';
        }

        $mail_data = [
            'title' => 'Pemberian Data Rahasia',
            'data' => $data,
            'secret_data' => $secret_data,
            'type' => $type
        ];

        Mail::to($email)->send(new SendSecretData($mail_data));
    }
}
