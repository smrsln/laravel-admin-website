@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', 'STK\'lar')
@section('content')
<style>
.ayar{
  padding: 0 70px 0 70px;
}
.ayar .thumbnail{
  padding: 0 !important;
}
</style>
  <div id="main"> 
    <section class="about-section">
      <div class="container">
          <div class="row">
            @foreach ($veriler as $veri)
            <div style="height: 450px !important;" class="col-xs-6 col-md-3">
              @if(stripos($veri->link, "http") !== false)
                <a style="height: 415px;" href="{!! $veri->link !!}" target="_blank" class="thumbnail">
              @elseif(!@$veri->link)
              <a style="height: 415px;" href="#" class="thumbnail">
              @else
              <a style="height: 415px;" href="https://{!! $veri->link !!}" target="_blank" class="thumbnail">
              @endif
                  <img src="/stklogo/{!! $veri->id !!}" alt="{!! $veri->stkadi !!}">
                  <h3 class="text-center">{!! $veri->stkadi !!}</h3>
                </a>
              </div>
            @endforeach
            
          </div>
      </div>

    </section>
  </div>
  @endsection