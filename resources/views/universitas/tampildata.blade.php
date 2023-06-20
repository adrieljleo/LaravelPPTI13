<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>NIM</td>
            <td>Nama Lengkap</td>
            <td>Email</td>
        </tr>
        @foreach($datamhs as $mhs)
        <tr>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama_lengkap }}</td>
            <td>{{ $mhs->email }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>