@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', 'Misyon')
@section('content')
  <div id="main"> 
    <section class="about-section">
      <div class="container">
        <div class="welcome-row">
          <div class="row">
            <div class="col-md-4">
              <div class="welcome-frame-1">
                @if($misyon->misyonfoto == '')
                <img src="//via.placeholder.com/340x380" alt="img">
                @else
                <img src="{{asset("/misyonfoto/1")}}" alt="img">
                @endif
              </div>
            </div>
            <div class="col-md-8">
              <div class="text-box">
                <div class="holder">
                 {!! $misyon->yazi !!}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection