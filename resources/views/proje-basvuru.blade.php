@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title','Proje Başvuru Formu')
@section('content')
  <div id="main"> 

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
              <form method="POST" name="projeform" action="{{route('proje_basvuru.post')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-6">
                        <input name="dernek_adi" placeholder="Dernek Adı*" required type="text">
                      </div>
                      <div class="col-md-6">
                        <input name="dernek_baskan" placeholder="Dernek Başkanı Adı-Soyadı" required type="text">
                      </div>
                      <div class="col-md-6">
                        <input name="dernek_tel" placeholder="Dernek Telefon Numarası*" required type="text">
                      </div>
                      <div class="col-md-6">
                        <input name="dernek_adres" placeholder="Dernek Adresi*" required type="text">
                      </div>
                      <div class="col-md-12">
                        <textarea name="proje_ozet" placeholder="Proje Özetini Kısaca Belirtiniz" cols="10" rows="10"></textarea>
                      </div>
                      <div class="col-md-4" style="margin-bottom: 10px;">
                        <label for="proje">Proje Dosyası Yükleyiniz:</label>
                        <input name="proje" type="file" class="form-control-file" required>
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

  </div>
  @endsection