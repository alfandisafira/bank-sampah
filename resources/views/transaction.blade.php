@extends('layouts.template')

@section('content')

@include('layouts.navbar_admin')

<div class="container mt-sm-2 mt-4 col-sm-6 col-10 bg-white p-4">
    <h3 class="text-center mb-3">Tambah Transaksi</h3>

    <form action="{{ route('transaction.store') }}" method="POST" id="storeTransactionForm">
        @csrf
        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3 show_hide_rekening">
                <input type="password" name="rekening" class="form-control" placeholder="nomor rekening" id="cardNumber" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        <a href=""><i class="bi bi-eye-fill"></i></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="namaCustomer" placeholder="nama lengkap" name="nama" readonly>
            </div>
        </div>

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="telpCustomer" placeholder="nomor telpon" name="telephone" readonly>
            </div>
        </div>

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        Saldo
                    </span>
                </div>
                <input type="text" name="balance" id="balance" class="form-control" readonly>
            </div>
        </div>

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3 d-flex justify-content-end">
                <a href="javascript:void(0)" id="check" class="btn btn-primary btn-lg" role="button">periksa</a>
            </div>
        </div>

        <!-- <h6 class="mt-4">Belum terdaftar? Klik <a href="{{url ('/beranda')}}">daftar</a></h6> -->
        <!-- </div> -->

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        Tanggal
                    </span>
                </div>
                <input type="date" name="date" class="form-control" required>
            </div>
        </div>

        <div class="form-group col-sm-10 mx-auto">
            <select name="jenis_transaksi" class="custom-select" id="jenisTransaksi" require>
                <option value="" disabled selected>--pilih jenis transaksi--</option>
                <option value="SETOR">Setor Sampah</option>
                <option value="TARIK">Tarik Uang</option>
            </select>
        </div>

        <div class="form-group col-sm-10 mx-auto show_hide_jenis_barang d-none">
            <select name="jenis_barang" class="custom-select" id="jenisBarang">
                <option value="" disabled selected>--pilih jenis barang--</option>
                @foreach($rubishes as $rubish)
                    <option value="{{ $rubish->id }}">{{ $rubish->name }} / Rp.{{ $rubish->price }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-10 mx-auto show_hide_jenis_barang_ammount d-none">
            <div class="input-group mb-3">
                <input type="number" name="amount" class="form-control" id="amount" placeholder="jumlah (kg)">
            </div>
        </div>

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3">
                <input type="number" name="total_amount" class="form-control" id="totalAmount" placeholder="jumlah uang">
            </div>
        </div>

        <div class="d-flex justify-content-center col-sm-10 mx-auto">
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="storeTransaction">simpan transaksi</button>
        </div>

    </form>
</div>
@endsection('content')