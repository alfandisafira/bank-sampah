@extends('layouts.template')

@section('content')

@include('layouts.navbar_admin')

<div class="container mt-sm-4 mt-5 col-sm-6 col-10 bg-white p-3">
    <h3 class="text-center mb-3">Laporan</h3>

    <table id="listCustomer" class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Saldo</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
    </table>
</div>

@endsection