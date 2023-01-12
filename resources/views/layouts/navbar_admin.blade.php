<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <a class="navbar-brand" href="/beranda">BSB 008</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item data">
                    <a class="nav-link" href="{{url('/data')}}">Data</a>
                </li>
                <li class="nav-item transaksi">
                    <a class="nav-link" href="{{url('/admin')}}">Transaksi</a>
                </li>
                <li class="nav-item laporan">
                    <a class="nav-link" href="{{url('/report')}}">Laporan</a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('/logout')}}">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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

@if($message)
    <div class="alert {{ $class }} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif