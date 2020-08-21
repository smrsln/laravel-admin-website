@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', 'Kamuoyuna')
@section('content')
  <div id="main"> 
    <!--POST AND NEWS ROW START-->
    <section class="post-news-row blog-post blog-list">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-8">
            @foreach($veriler as $key => $veri)
            <div class="row">
              <div class="col-md-5">
                <div class="frame">
                  <img height="211" width="335" src="resim/{!! $veri->id !!}" alt="img">
                </div>
              </div>
              <div class="col-md-7">
                <div class="post-box">
                  <div class="text-box">
                    <h3><a href="blogicerik/{!! $veri->slug !!}">{!! $veri->baslik !!}</a></h3>
                    <p>{!! str_limit( strip_tags($veri->yazi), 50 ) !!}</p>
                    <a href="blogicerik/{!! $veri->slug !!}" class="btn-readmore">Detayları Gör..</a> </div>
                </div>
              </div>
            </div>
            @endforeach
            
          
            
            {{ $veriler->links() }}
            
            
         <!--   <div class="pagination-box">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li> <a href="#" aria-label="Previous"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li> <a href="#" aria-label="Next"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a> </li>
                </ul>
              </nav>
            </div>
          </div> -->

          <div class="col-md-3 col-sm-4"> 
          </div>
        </div>
      </div>
    </section>
    <!--POST AND NEWS ROW END--> 
  </div>
@endsection