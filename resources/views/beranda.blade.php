@extends('layouts.template')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            BANK SAMPAH BERKAH
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-dark login" href="{{url ('/login')}}">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container d-flex flex-sm-row flex-column justify-content-sm-around justify-content-center mb-3">
    <div class="col-12 col-sm-5">
        <h1 class="beranda"><b>BERSIH, BERGUNA, BERKAH</b></h1>
        <hr class="bg-warning">
        <br>
        <p>Jadilah bagian dari solusi, bukan masalah, dengan membantu mengurangi sampah di lingkungan kita melalui kegiatan di bank sampah. Mari bersikap bijaksana dan peduli terhadap lingkungan dengan mengumpulkan sampah ke Bank Sampah Berkah</p>
    </div>
    <div class="col-12 col-sm-5 bg-white rounded p-4 d-flex justify-content-center align-content-center">
        <img class="mx-auto" src="Tong-sampah.png" alt="" width="350" height="350">
    </div>
</main>

@endsection