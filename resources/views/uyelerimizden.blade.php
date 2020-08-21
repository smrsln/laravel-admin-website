@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', 'Üyelerimizden Duyurular')
@section('content')
  <div id="main"> 
    <div id="main"> 
    <section class="news-timeline">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-8">
        @foreach($veriler as $key => $veri)
        
          
            <div class="news-timeline-box"><strong class="date"><span></span></strong>
              <div class="text-box">
                <div class="holder">
                  <h3><a href="uye_etkinlikicerik/{!! $veri->slug !!}">{!! $veri->baslik !!} </a></h3>
                  
                  <p>{!! str_limit( strip_tags($veri->yazi), 180 ) !!}</p>
                  <a href="uye_etkinlikicerik/{!! $veri->slug !!}" class="btn-readmore">Tamamını Gör</a> </div>
                <div class="thumb"><img src="/uye_etkinlikmain/{!!$veri->id!!}" alt="img" height="288" width="251"></div>
              </div>
            </div>
          
        
            @endforeach
            
          
            
            {{ $veriler->links() }}
            
            
         
</div>
          <div class="col-md-3 col-sm-4"> 
          </div>
        </div>
      </div>
    </section>
    <!--POST AND NEWS ROW END--> 
  </div>
@endsection