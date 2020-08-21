<?php 
function basliktemizle($klm) {
$klm  = str_replace("\\","/", $klm ); 
$klm  = str_replace("\"","'", $klm ); 
$klm  = str_replace(PHP_EOL,"", $klm ); 
$klm  = str_replace(chr(13),"", $klm ); 
$klm  = str_replace(chr(10),"", $klm ); 
$klm  = str_replace(chr(9),"", $klm );  
$klm = strip_tags($klm);
$klm  = str_replace("'","''", $klm ); 
return $klm;
}

$errors = '';
$myemail = 'bilgi@btider.org.tr';
if(empty($_POST['isim'])  || 
   empty($_POST['email']) || 
   empty($_POST['konu']) ||
   empty($_POST['dtarihi']) ||
   empty($_POST['telefon']) ||
   empty($_POST['adres']) ||
   empty($_POST['meslek']) ||
   empty($_POST['mesaj']))
{
    $errors .= "\n HATA ! : Tüm alanları doldurunuz.";
}

$isim = basliktemizle($_POST['isim']); 
$email_address = basliktemizle($_POST['email']); 
$mesaj = basliktemizle($_POST['mesaj']); 
$dtarihi = basliktemizle($_POST['dtarihi']); 
$telefon = basliktemizle($_POST['telefon']); 
$adres = basliktemizle($_POST['adres']); 
$meslek = basliktemizle($_POST['meslek']); 
$konu = basliktemizle($_POST['konu']); 
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Hata ! : Geçersiz mail adresi.";
}

if( empty($errors))
{
    $email_body = "Yörük Türkmen Birliği Gönüllülük formundan yeni başvurunuz var. <br>".
    " Detaylar:<br> İsim: $isim <br> Email: $email_address <br> Konu: $konu <br> Mesaj: $mesaj <br> Doğum Tarihi: $dtarihi <br> Telefon Numarası: $telefon <br> Adres: $adres <br> Meslek: $meslek" ; 

    require_once "mail/PHPMailerAutoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.yandex.com';
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet ="utf-8";
    $mail->Username = "bilgi@yorukturkmenbirligi.org"; 
    $mail->Password = "123123..";
    $mail->SetFrom("bilgi@yorukturkmenbirligi.org", $isim); // Mail attigimizda yazacak isim
    $mail->AddAddress("bilgi@yorukturkmenbirligi.org"); // Maili gonderecegimiz kisi/ alici
    $mail->Subject = $konu; // Konu basligi
    $mail->Body = $email_body; // Mailin icerigi
    $mail->Send();
    //redirect to the 'thank you' page
    header('Location: gonulluluk.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
    <title>Gonullu form degerlendir</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>