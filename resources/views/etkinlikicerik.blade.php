@extends('master')
@section('title', $etkinlik->baslik)
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@push('head')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
@endpush
@section('content')
  
  <div id="main"> 
    <section class="post-news-row etkinlik-post">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-8">
            <div class="post-box">
              <div class="frame"> <img src="/etkinlik/{!! $etkinlik->id !!}" alt="img"></div>
              <div style="text-align: justify;" class="text-box">
                <h3><a href="#">{!! $etkinlik->baslik !!}</a></h3>
                  {!! $etkinlik->yazi !!}
                  </div>
                  <div class="share-post"> <strong class="title">Sosyal Medyada Paylaşın:</strong>
                    <ul>
                      
                      <li><a href="https://api.whatsapp.com/send?text=https://yorukturkmenbirligi.org/etkinlikicerik/{!! $etkinlik->slug !!}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                     
                      <li><a href="http://www.facebook.com/share.php?u=https://yorukturkmenbirligi.org/etkinlikicerik/{!! $etkinlik->slug !!}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
          <div class="col-md-10 col-md-offset-1">
        <div class="row">
            @foreach($fotogaleri as $foto)
            <a href="/fotogaleribuyuk/{!!$foto->id!!}" data-toggle="lightbox" data-gallery="example-gallery" data-type="image" class="col-sm-4">
                <img src="/fotogalerikucuk/{!! $foto->id !!}" class="img-fluid img-thumbnail mb-3">
            </a>
            @endforeach
        </div>
    </div>
  </div>
        </div>
        
      </div>
    </section>
    <!--POST AND NEWS ROW END--> 
  @endsection
@push('footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/anchor-js/3.2.1/anchor.min.js"></script>
 <script type="text/javascript">
                        $(document).ready(function ($) {
                        	 $().ready(function() {
   $('[data-toggle="lightbox"]').click(function(event) {
     event.preventDefault();
     $(this).ekkoLightbox({
       type: 'image',
       onContentLoaded: function() {
         var item = $('.ekko-lightbox-item>img').css('height');
         $('.ekko-lightbox-container').css('height', item);

          // windowHeight.css('height', item + 150);

         
       }
     });
   });
 });

                           
                        });
                    </script>
@endpush
  