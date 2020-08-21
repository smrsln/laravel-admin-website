@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('header')    
@section('title', 'İletişim')
@section('content')
<div id="main"> 
    <!--CONTACT SECTION START-->
    <section class="contact-section">
      <div class="container">
          @if(session('success'))
          <div class="alert alert-success">
          <strong>{{session('success')}}</strong>
          </div>
          @endif
          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="contact-form">
              <h3>Bize Ulaşın</h3>
              <form method="POST" name="iletisimform" action="{{route('iletisim_basvuru.post')}}">
                  @csrf
                <div class="row">
                  <div class="col-md-6">
                    <input name="isim" placeholder="İsim" required type="text">
                  </div>
                  <div class="col-md-6">
                    <input name="email" placeholder="E-Mail" required type="email">
                  </div>
                  <div class="col-md-12">
                    <input name="konu" placeholder="Konu" required type="text">
                  </div>
                  <div class="col-md-12">
                    <textarea name="mesaj" placeholder="Mesajınız" cols="10" rows="10" required></textarea>
                  </div>
                  <div class="col-md-12">
                    <input value="Gönder" type="submit">
                  </div>
                </div>
              </form>
              <div class="address-box">
                <h3>İletişim Bilgileri</h3>
                <address>
                <p><i class="fa fa-home" aria-hidden="true"></i>{!! $iletisim->adres !!}</p>
                <ul>
                  <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:{!! $iletisim->email !!}">E-Mail: {!! $iletisim->email !!}</a></li>
                </ul>
                </address>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="contact-map-box">
              <div id="map_contact_1" class="map_canvas active"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  @endsection
  @push('footer')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsQz6iOLo3AgBtSmB4o6Eso6p2Xmu97Rk&callback=initMap" type="text/javascript"></script>
  @endpush