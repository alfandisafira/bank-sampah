@extends('layouts.template')

@section('content')

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container centered">
    <form action="{{ route('authenticate') }}" method="POST" id="loginForm" class="bg-white py-4 col-sm-6 mx-auto rounded">
        @csrf
        <h4 class="text-center mb-4">Admin Bank Sampah 008</h4>

        <div class="form-group col-sm-10 mx-auto">
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="email">
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

        <div class="d-flex justify-content-center col-sm-10 mx-auto">
            <button type="submit" class="btn btn-primary btn-lg btn-block">masuk</button>
        </div>


        <h6 class="mt-4">Kembali ke <a href="{{url ('/beranda')}}">beranda</a></h6>
    </form>
</div>

@endsection