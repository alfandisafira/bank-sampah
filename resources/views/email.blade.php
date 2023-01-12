<!DOCTYPE html>
<html>
<head>
    <title>Bank Sampah Berkah 008</title>
</head>
<body>
    <h1>{{ $mail_data['title'] }}</h1>
    <br>
  
    <p>Berikut Data Anda</p>
    <br>
    <p>Nama         : {{ $mail_data['data']->name }}</p>
    <p>Telephone    : {{ $mail_data['data']->telephone }}</p>
    <p>Email        : {{ $mail_data['data']->email }}</p>
    @if($mail_data['type'] == 'nasabah')
    <p>No. Rekening : <b>{{ $mail_data['secret_data'] }}</b></p>
    @elseif($mail_data['type'] == 'admin')
    <p>Password     : <b>{{ $mail_data['secret_data'] }}</b></p>
    @endif
    <br>
     
    <p><b>Jangan beri tahu data yang dicetak tebal ke siapa pun!</b></p>
</body>
</html>