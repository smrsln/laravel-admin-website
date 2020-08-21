@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', $blog->baslik)
@section('content')
  
  <div id="main"> 
    <section class="post-news-row blog-post">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-8">
            <div class="post-box">
              <div class="frame"> <img src="/resim/{!! $blog->id !!}" alt="img"></div>
              <div class="text-box">
                <h3><a href="#">{!! $blog->baslik !!}</a></h3>
                  {!! $blog->yazi !!}
                  </div>
                  <div class="share-post"> <strong class="title">Sosyal Medyada Paylaşın:</strong>
                    <ul>
                      
                      <li><a href="https://api.whatsapp.com/send?text=https://yorukturkmenbirligi.org/blogicerik/{!! $blog->slug !!}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                     
                      <li><a href="http://www.facebook.com/share.php?u=https://yorukturkmenbirligi.org/blogicerik/{!! $blog->slug !!}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--POST AND NEWS ROW END--> 
  </div>
  @endsection