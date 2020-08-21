<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yörük Türkmen Birliği Üyelik Formu Başvurusu</title>
</head>
<body>
        <p>Yörük Türkmen Birliği Üyelik formundan yeni başvurunuz var. <br>
             Detaylar:<br> Dernek Adı:{{ $data['dernek_adi'] }} <br> Dernek No: {{ $data['dernek_no'] }} <br>
             Dernek Adresi: {{ $data['dernek_adres'] }} <br> Dernek Telefon: {{ $data['dernek_tel'] }} <br> Dernek Başkanı: {{ $data['dernek_baskan'] }} <br>
             Dernek Amacı: {{ $data['dernek_amac'] }} <br> Dilekçe: {{'http://yorukturkmenbirligi.org/dilekceindir/'.substr($data['dilekce'], 8) }}
             <br> Faaliyet Belgesi: {{'http://yorukturkmenbirligi.org/faaliyetindir/'.substr($data['faaliyet_belgesi'], 17) }} <br>
             Üçüncü Karar Belgesi: {{'http://yorukturkmenbirligi.org/kararindir/'.substr($data['ucuncu_karar'], 13) }} <br> 
             İmza Sirküsü: {{'http://yorukturkmenbirligi.org/sirkuindir/'.substr($data['imza_sirku'], 11) }} <br> 
             Delege Bilgisi:{{'http://yorukturkmenbirligi.org/delegeindir/'.substr($data['delege_bilgi'], 13) }}</p> 

</body>
</html>