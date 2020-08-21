<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yörük Türkmen Birliği Proje Formu Başvurusu</title>
</head>
<body>
        <p>Yörük Türkmen Birliği Proje formundan yeni başvurunuz var. <br>
             Detaylar:<br> Dernek Adı:{{ $data['dernek_adi'] }} <br> Dernek Adresi: {{ $data['dernek_adres'] }} <br> 
             Dernek Telefon: {{ $data['dernek_tel'] }} <br> Dernek Başkanı: {{ $data['dernek_baskan'] }} <br>
             Proje Özeti: {{ $data['proje_ozet'] }} <br> Proje Dosyası: {{'http://yorukturkmenbirligi.org/projeindir/'.substr($data['proje'], 6) }}</p> 

</body>
</html>