<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    {{-- Datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">

    <title>Bank Sampah Berkah 008 | {{ $title }}</title>
</head>

<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <script>
        $(document).ready(function() {

            // get the title for every blade
            var title = $("title").text();
            var arr_title = title.split(" ");
            var sub_title = arr_title[arr_title.length - 1].toLowerCase();
            $('.' + sub_title).addClass("active");
            $('.' + sub_title + ' a').addClass("text-success");

            // data.blade.php
            $(".show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('.show_hide_password input').attr("type") == "text"){
                    $('.show_hide_password input').attr('type', 'password');
                    $('.show_hide_password i').removeClass( "bi-eye-slash-fill" );
                    $('.show_hide_password i').addClass( "bi-eye-fill" );
                } else if($('.show_hide_password input').attr("type") == "password"){
                    $('.show_hide_password input').attr('type', 'text');
                    $('.show_hide_password i').removeClass( "bi-eye-fill" );
                    $('.show_hide_password i').addClass( "bi-eye-slash-fill" );
                }
            });

            $(".show_hide_password_confirm a").on('click', function(event) {
                event.preventDefault();
                if($('.show_hide_password_confirm input').attr("type") == "text"){
                    $('.show_hide_password_confirm input').attr('type', 'password');
                    $('.show_hide_password_confirm i').removeClass( "bi-eye-slash-fill" );
                    $('.show_hide_password_confirm i').addClass( "bi-eye-fill" );
                } else if($('.show_hide_password_confirm input').attr("type") == "password"){
                    $('.show_hide_password_confirm input').attr('type', 'text');
                    $('.show_hide_password_confirm i').removeClass( "bi-eye-fill" );
                    $('.show_hide_password_confirm i').addClass( "bi-eye-slash-fill" );
                }
            });

            // transaction.blade.php
            $(".show_hide_rekening a").on('click', function(event) {
                event.preventDefault();
                if($('.show_hide_rekening input').attr("type") == "text"){
                    $('.show_hide_rekening input').attr('type', 'password');
                    $('.show_hide_rekening i').removeClass( "bi-eye-slash-fill" );
                    $('.show_hide_rekening i').addClass( "bi-eye-fill" );
                } else if($('.show_hide_rekening input').attr("type") == "password"){
                    $('.show_hide_rekening input').attr('type', 'text');
                    $('.show_hide_rekening i').removeClass( "bi-eye-fill" );
                    $('.show_hide_rekening i').addClass( "bi-eye-slash-fill" );
                }
            });

            $('#check').on('click', function(event) {
                var id = $('#cardNumber').val();
                $.ajax({
                    url: '{{ route("transaction.get") }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id,
                        tb_name: 'customers',
                        where_param: 'card_number',
                    },
                    success: function(data) {
                        if (Object.keys(data).length == 0) {
                            $('#namaCustomer').val("");
                            $('#telpCustomer').val("");
                            $('#balance').val("");
                            alert('Nomor rekening tidak terdaftar.')
                        } else if (Object.keys(data).length > 0) {
                            $('#namaCustomer').val(data.name);
                            $('#telpCustomer').val(data.telephone);
                            $('#balance').val(data.balance);
                        }
                    }
                })
            });

            $('#jenisTransaksi').on('change', function(event) {
                var transaction_type = $('#jenisTransaksi').val(); 
                if (transaction_type == 'SETOR') {
                    $('.show_hide_jenis_barang').removeClass("d-none");
                    $('.show_hide_jenis_barang_ammount').removeClass("d-none");
                    $("#totalAmount").prop('readonly', true);
                } else if (transaction_type == 'TARIK') {
                    $('.show_hide_jenis_barang').addClass("d-none");
                    $('.show_hide_jenis_barang_ammount').addClass("d-none");
                    $("#totalAmount").attr('readonly', false);
                    $('#jenisBarang').val(null);
                    $('#amount').val(null);
                    $('#totalAmount').val(null);
                }
            });

            var item_price = 0;
            var amount = 0;
            
            $('.show_hide_jenis_barang').on('change', function(event) {
                var item_value = $('#jenisBarang').val();
                $.ajax({
                    url: '{{ route("transaction.get") }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: item_value,
                        tb_name: 'rubbish_types',
                        where_param: 'id',
                    },
                    success: function(data) {
                        item_price = data.price;
                        amount = $('#amount').val();
                        total_amount = item_price * amount;
                        $('#totalAmount').val(total_amount);
                    }
                })
            });

            $('#amount').on('keyup', function(event) {
                amount = $('#amount').val();
                total_amount = item_price * amount;
                $('#totalAmount').val(total_amount);
            });

            // datatable
            $('#listCustomer').DataTable({
                scrollX: true,
                paging: false,
                ajax: '{{ route("report.get") }}',
                columns: [
                    {
                        data:'name',
                        name: 'name',
                    },
                    {
                        data:'balance',
                        name: 'balance',
                    },
                    {
                        data:'email',
                        name: 'email',
                    },
                    {
                        data:'telephone',
                        name: 'telephone',
                    },
                    {
                        data:'address',
                        name: 'address',
                    },
                    {
                        data:'gender',
                        name: 'gender',
                    },
                ]
            });

        });
    </script>
</body>

</html>