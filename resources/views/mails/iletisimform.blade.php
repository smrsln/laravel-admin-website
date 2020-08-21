<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>İletişim Formu Başvurusu</title>
</head>
<body>
        <p>Yörük Türkmen Birliği İletişim formundan yeni başvurunuz var. <br>
             Detaylar:<br> İsim:{{ $data['isim'] }} <br> E-mail: {{ $data['email'] }} <br>
             Konu: {{ $data['konu'] }} <br> mesaj: {{ $data['mesaj'] }}</p> 

</body>
</html>