<x-mail::message>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: whitesmoke;border: solid 1px">
    <h1 style="text-align: center; color:black">Notifikasi User Baru</h1>
    <p style="text-align: center; color:black">Name : {{ $data->name }}</p>
    <p style="text-align: center; color:black">Email : {{ $data->email }}</p>
    <h2 style="text-align: center; color:black">Terima Kasih</h2>
</body>
</html>

</x-mail::message>