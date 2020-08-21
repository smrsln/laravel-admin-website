@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
 @section('title','Üyelik Başvurusu')
 @section('content')
  <div id="main"> 
    <!--CONTACT SECTION START-->
    <section class="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            @if(session('success'))
            <div class="alert alert-success">
              <strong>{{session('success')}}</strong>
            </div>
            @endif
            @foreach($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            <div class="contact-form">
              <h3>Üyelik Başvuru Formu</h3>
              <form method="POST" name="uyeform" action=" {{route('uye_basvuru.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <input name="dernek_adi" placeholder="Dernek Adı*" required type="text">
                  </div>
                  <div class="col-md-6">
                    <input name="dernek_no" placeholder="Dernek No*" required type="text">
                  </div>
                  <div class="col-md-6">
                    <input name="dernek_adres" placeholder="Dernek Adresi*" required type="text">
                  </div>
                  <div class="col-md-6">
                    <input name="dernek_tel" placeholder="Dernek Telefon Numarası" required type="text">
                  </div>
                  <div class="col-md-6">
                    <input name="dernek_baskan" placeholder="Dernek Başkanı Adı-Soyadı" required type="text">
                  </div>
                  <div class="col-md-12">
                    <textarea name="dernek_amac" placeholder="Derneğinizin Amacını Kısaca Belirtiniz" cols="10" rows="10"></textarea>
                  </div>
                  <div class="col-md-4" style="margin-bottom: 10px;">
                    <label for="dilekce">Dilekçe Yükleyiniz:</label>
                    <input name="dilekce" type="file" class="form-control-file" required>
                  </div>
                  <div class="col-md-4" style="margin-bottom: 10px;">
                      <label for="faaliyet_belgesi">Faaliyet Belgesi Yükleyiniz:</label>
                      <input name="faaliyet_belgesi"  type="file" class="form-control-file" required>
                  </div>
                  <div class="col-md-4" style="margin-bottom: 10px;">
                      <label for="ucuncu_karar">Karar Defteri Sayfası Yükleyiniz:</label>
                      <input name="ucuncu_karar"  type="file" class="form-control-file" required>
                  </div>
                  <div class="col-md-4">
                      <label for="imza_sirku">İmza Sirküsü Yükleyiniz:</label>
                      <input name="imza_sirku"  type="file" class="form-control-file" required>
                  </div>
                  <div class="col-md-4">
                      <label for="delege_bilgi">Delege Bilgisi Yükleyiniz:</label>
                      <input name="delege_bilgi"  type="file" class="form-control-file" required>
                  </div>
                  
                  <div class="col-md-12">
                    <input value="Gönder" type="submit">
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--CONTACT SECTION START--> 
  </div>
  @endsection