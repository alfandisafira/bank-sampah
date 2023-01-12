@extends('layouts.template')

@section('content')

@include('layouts.navbar_admin')

<div class="container mt-sm-4 mt-5 col-sm-6 col-10 bg-white p-3">
    <h4 class="mb-3">Tambah Data</h4>   

    <div class="d-flex justify-content-end">
        <ul class="nav nav-pills mb-3 bg-dark rounded" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white" id="pills-admin-tab" data-toggle="pill" data-target="#pills-admin" type="button" role="tab" aria-controls="pills-admin" aria-selected="true">admin</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-white" id="pills-nasabah-tab" data-toggle="pill" data-target="#pills-nasabah" type="button" role="tab" aria-controls="pills-nasabah" aria-selected="false">nasabah</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
            <form method="POST" action="{{ route('data.store') }}" id="storeAdminForm">
                @csrf
                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="type" type="text" class="form-control" id="type" value="admin" hidden>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" id="email" placeholder="email">
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3 show_hide_password">
                        <input type="password" class="form-control" placeholder="kata sandi" name="password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                                <a href=""><i class="bi bi-eye-fill"></i></a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3 show_hide_password_confirm">
                        <input type="password" class="form-control" placeholder="konfirmasi kata sandi" name="password_confirmation" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                                <a href=""><i class="bi bi-eye-fill"></i></a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" placeholder="nama" name="name" required>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="telpon" placeholder="telepon" name="telephone" required>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="identity_number" placeholder="nomor identitas (ktp/sim/kk)" name="identity_number" required>
                    </div>
                </div>

                <div class="d-flex justify-content-center col-sm-10 mx-auto">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="storeAdmin">tambah</button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade show active" id="pills-nasabah" role="tabpanel" aria-labelledby="pills-nasabah-tab">
            <form method="POST" action="{{ route('data.store') }}" id="storeNasabahForm">
                @csrf
                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="type" type="text" class="form-control" id="type" value="nasabah" hidden>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" id="name" placeholder="nama" required>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="telephone" type="text" class="form-control" id="telephone" placeholder="telepon" required>
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" id="email" placeholder="email">
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <input name="address" type="text" class="form-control" id="address" placeholder="alamat">
                    </div>
                </div>

                <div class="form-group col-sm-10 mx-auto">
                    <div class="input-group mb-3">
                        <select name="gender" id="gender" class="custom-select" required>
                            <option value="" disabled selected>--pilih jenis kelamin--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-center col-sm-10 mx-auto">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="storeNasabah">tambah</button>
                </div>
            </form>
        </div>
    </div>

    <h6 class="mt-4">Kembali ke <a href="{{url ('/admin')}}">transaksi</a></h6>
</div>

@endsection