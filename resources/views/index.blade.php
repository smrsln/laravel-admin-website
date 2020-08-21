<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yörük Türkmen Birliği Derneği Anasayfa</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163321730-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-163321730-1');
</script>

<!--CUSTOM CSS-->
<link href="{{asset("css/custom.css")}}" rel="stylesheet" type="text/css" />
<!--BOOTSTRAP CSS-->
<link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" />
<!--COLOR CSS-->
<link href="{{asset("css/color.css")}}" rel="stylesheet" type="text/css" />
<!--RESPONSIVE CSS-->
<link href="{{asset("css/responsive.css")}}" rel="stylesheet" type="text/css" />
<!--OWL CAROSEL CSS-->
<link href="{{asset("css/owl.carousel.css")}}" rel="stylesheet" type="text/css" />
<!--PRETTYPHOTO CSS-->
<link href="{{asset("css/prettyPhoto.css")}}" rel="stylesheet" type="text/css" />
<!--ATTEND EVENTS-->
<link href="{{asset("css/no-css.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset("css/swiper.css")}}" rel="stylesheet" type="text/css">
<!--FONT AWESOME CSS-->
<link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
<!--FAVICON ICON-->
<link rel="shortcut icon" type="image/x-icon" href="{{asset("/logo/1")}}">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="theme-style-1">
<div id="wrapper"> 

  <header id="header"> 
    <!--TOPBAR SECTION START-->
    <section class="topbar">
      <div class="container">
        <div class="left-box">
          <ul>
            <li> <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>E-Mail: <a href="mailto:{!! $iletisim->email !!}">{!! $iletisim->email !!}</a></span> </li>
          </ul>
        </div>
        <div class="right-box">
          <div class="topbar-social">
            <ul>
              <!--<li><a href="https://www.instagram.com/yorukturkmenbirligi" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="https://www.twitter.com/yorukturkmenbirligi" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
              <li><a href="https://www.facebook.com/Yörük-Türkmen-Birliği-620622124748120/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <!--<li><a href="https://www.youtube.com/channel/yorukturkmenbirligi" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>-->
            </ul>
          </div>
           </div>
      </div>
    </section>

    <section class="navigation-row">
      <div class="container"> 
        <strong class="logo">
      <a href="/index.php">
        <img src="{{asset("/logo/1")}}" alt="logo">
      </a>
        </strong>
        <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div style="margin-top: 15px;" id="navbar" class="collapse navbar-collapse">
            <ul id="nav" class="nav navbar-nav">
              <li><a href="/index.php">Anasayfa</a>
              </li>
              <li><a href="#">Biz Kimiz ?</a>
              <ul>
                  <li><a href="/misyon.php">Misyon</a></li>
                  <li><a href="/vizyon.php">Vizyon</a></li>
                  <li><a href="/yonetimkurulu.php">Yönetim Kurulu</a></li>
                  <li><a href="/aksakallilar.php">Aksakallılar</a></li>
                  <li><a href="/delikanlilar.php">Delikanlılar</a></li>
                  <li><a href="/bacibeyler.php">Bacıbeyler</a></li>
                </ul>
              </li>
              <li><a href="#">Etkinlikler</a>
              <ul>
                  <li><a href="/yaptiklarimiz.php">Yaptıklarımız</a></li>
                  <li><a href="/uyelerimizden.php">Üyelerimizden Duyurular</a></li>
                </ul>
              </li>
              <li><a href="/blog.php">Kamuoyuna</a>
              </li>
              <li><a href="/stklar.php">Üye STK'lar</a>
              </li>
              <li><a href="#">Başvurular</a>
                <ul>
                  <li><a href="/uye-basvuru.php">Üyelik Başvurusu</a></li>
                  <li><a href="/proje-basvuru.php">Proje Başvurusu</a></li>
                </ul>
              </li>
              <li><a href="/iletisim.php">İletişim</a>
              </li>
            </ul>
          </div>
        </nav>

      </div>
    </section>

  </header>

  <div id="banner">
    <div id="home-banner" class="owl-carousel owl-theme">
      
      @if($sliderlar == '[]')
          <div class="item"> 
          <a href="#">
             <img src="//via.placeholder.com/1920x800" alt="img">
          </div>
          <div class="item"> 
              <a href="#">
                 <img src="//via.placeholder.com/1920x800" alt="img">
              </div>
      @else
      @foreach($sliderlar as $slider)
      <div class="item"> 
      <a href="{!! $slider->sliderlink !!}">
        <img src="{{asset("/sliderfoto/$slider->id")}}" alt="img"></a>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  
  <div id="main"> 
    <section class="why-choose">
      <div class="container">
        <div class="chose-heading"> <span class="icon"><img style="margin-top: 10px; max-width: 60px;" src="{{asset("/logo/1")}}" alt="img"></span>
          <h2>Birliğimiz<br>
         <span>Neden Kuruldu ?</span></h2>
        </div>
        {!! $neden_kuruldu->yazi !!}

      </div>
    </section>
    <div class="swiper-container ">
        </div>
        
        <section class="upcoming-event-section">
      <div class="container">
        <div class="heading-center">
          <h2>Etkinliklerimiz</h2>
        </div>
        <p><em></em></p>
        <div class="upcoming-event-box"> 
          <div id="event-banner" class="owl-carousel owl-theme">
            @foreach($etkinlikler as $etkinlik)
            <div class="item">
              <div class="frame">
                
                <a href="/etkinlikicerik/{!! $etkinlik->slug !!}"><img src="/etkinlikindex/{!!$etkinlik->id!!}" alt="img"></a>
                <div class="caption">
                  <div style="width: all; height: auto; background: rgba(255,255,255, 0.5); box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.36);" class="holder">
                    <h3 style="margin-bottom: -1%;"><a style="color: white !important; font-weight: bold; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" href="/etkinlikicerik/{!! $etkinlik->slug !!}">{!! $etkinlik->baslik !!}</a></h3>
                    
                   </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="btn-row"><a href="/yaptiklarimiz.php" class="btn-style-1">Tüm Etkinlikler</a></div>
        </div>
      </div>
    </section>

<style type="text/css">
  .sectionClass {
  padding: 20px 0px 50px 0px;
  position: relative;
  display: block;
  }
  
  .fullWidth {
  width: 100% !important;
  display: table;
  float: none;
  padding: 0;
  min-height: 1px;
  height: 100%;
  position: relative;
  }
  
  
  .sectiontitle {
  background-position: center;
  margin: 30px 0 0px;
  text-align: center;
  min-height: 20px;
  }
  
  .headerLine {
  width: 160px;
  height: 2px;
  display: inline-block;
  background: #101F2E;
  }
  
  
  .projectFactsWrap{
    display: flex;
  margin-top: 30px;
  flex-direction: row;
  flex-wrap: wrap;
  }
  
  
  #projectFacts .fullWidth{
  padding: 0;
  }
  
  .projectFactsWrap .item{
  width: 25%;
  height: 100%;
  padding: 50px 0px;
  text-align: center;
  }
  
  .projectFactsWrap .item:nth-child(1){
  background: rgb(16, 31, 46);
  }
  
  .projectFactsWrap .item:nth-child(2){
  background: rgb(18, 34, 51);
  }
  
  .projectFactsWrap .item:nth-child(3){
  background: rgb(21, 38, 56);
  }
  
  .projectFactsWrap .item:nth-child(4){
  background: rgb(23, 44, 66);
  }
  
  .projectFactsWrap .item p.number{
  font-size: 40px;
  padding: 0;
  font-weight: bold;
  }
  
  .projectFactsWrap .item p{
  color: rgba(255, 255, 255, 0.8);
  font-size: 18px;
  margin: 20px 0 0 0;
  padding: 10px;
  font-family: 'Open Sans';
  }
  
  
  .projectFactsWrap .item span{
  width: 60px;
  background: rgba(255, 255, 255, 0.8);
  height: 2px;
  display: block;
  margin: 20px auto 5px auto;
  }
  
  
  .projectFactsWrap .item i{
  vertical-align: middle;
  font-size: 50px;
  color: rgba(255, 255, 255, 0.8);
  }
  
  
  .projectFactsWrap .item:hover i, .projectFactsWrap .item:hover p{
  color: white;
  }
  
  .projectFactsWrap .item:hover span{
  background: white;
  }
  
  @media (max-width: 786px){
  .projectFactsWrap .item {
     flex: 0 0 50%;
  }
  }
</style>

    <section> 
    <div class="sectiontitle">
    <h2>İstatistiklerle Yörük Türkmen Birliği</h2>
    <span class="headerLine"></span>
</div>
<div id="projectFacts" class="sectionClass">
    <div class="fullWidth eight columns">
        <div class="projectFactsWrap ">
            <div class="item wow fadeInUpBig animated animated" data-number="12" style="visibility: visible;">
              <i class="fa fa-home"></i>
                <p id="number1" class="number">{{ $sayac->uyedernek }}</p>
                <span></span>
                <p>Üye Dernek Sayısı</p>
            </div>
            <div class="item wow fadeInUpBig animated animated" data-number="55" style="visibility: visible;">
                <i class="fa fa-building"></i>
                <p id="number2" class="number">{!! $sayac->uyefederasyon !!}</p>
                <span></span>
                <p>Üye Federasyon Sayısı</p>
            </div>
            <div class="item wow fadeInUpBig animated animated" data-number="359" style="visibility: visible;">
                <i class="fa fa-fort-awesome"></i>
                <p id="number3" class="number">{!! $sayac->uyekonfederasyon !!}</p>
                <span></span>
                <p>Üye Konfederasyon Sayısı</p>
            </div>
            <div class="item wow fadeInUpBig animated animated" data-number="246" style="visibility: visible;">
                <i class="fa fa-eye"></i>
                <p id="number4" class="number">{!! $sayac->ziyaretci !!}</p>
                <span></span>
                <p>Ziyaretçi Sayısı</p>
            </div>
        </div>
    </div>
</div>
    </section>
    
    <section class="post-news-row">
      <div class="container">
        <div class="col-md-6">
          <div class="left-box">
            <div class="heading-left">
              <h2>Kamuoyuna</h2>
            </div>
            <a href="/blog.php" class="btn-readmore">Tüm Yazıları Gör</a>
            <div id="post-slider" class="owl-carousel owl-theme">
              
              @foreach($yazilar as $yazi)
             <div class="item">
                <div class="post-box">
                  <div class="frame"><img src="/resim/{!!$yazi->id!!}" alt="img"></div>
                  <div class="text-box">
                    <h3><a href="/blogicerik/{!! $yazi->slug !!}">{!! $yazi->baslik !!}</a></h3>
                    {!! str_limit( strip_tags($yazi->yazi), 250 ) !!}
                    <div class="row">
                    <a style="margin-left: 5%;" href="/blogicerik/{!! $yazi->slug !!}" class="btn-readmore">Detayları Gör...</a> 
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-box">
            <div class="heading-left">
              <h2 style="white-space: nowrap;">Üyelerimizden Duyurular</h2>
            </div>
            @foreach($uye_etkinlikler as $uye_etkinlik)
            <div class="news-box">
              <div class="post-box">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <div class="frame"><img src="/uye_etkinlik/{!!$uye_etkinlik->id!!}" alt="img"></div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="text-box">
                      <h3><a href="/uye_etkinlikicerik/{!! $uye_etkinlik->slug !!}">{!! $uye_etkinlik->baslik !!}</a></h3>
                      {!! str_limit( strip_tags($uye_etkinlik->yazi), 50 )  !!}
                      <div class="row">
                      <a href="/uye_etkinlikicerik/{!! $uye_etkinlik->slug !!}" class="btn-readmore">Detayları Gör...</a> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

        


  </div>
  
<footer id="footer">
    <section class="footer-section-1">
        <div class="container">
            <div class="row">
                <div  style="margin-top: -5%; height: 100px;" class=" col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="text-center">
  
                  </div>
                </div>
                <div class=" col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="box" style="display:  grid;">
                        <strong class="footer-logo">
                      <a href="index.php">
                      <img width="180" src="{{asset("/footerlogo/1")}}" alt="logo" style="display: block;margin-left: auto;margin-right: auto;">
                  </a>
                  </strong>
                        <p style="color: #fff;text-align: center;bottom: 0;margin-left: -20px;"><strong class="copyrights"><a href="index.php">YORÜKTÜRKMENBİRLİĞİ</a> © 2020, Tüm Hakları Saklıdır.</strong></p>
                    </div>
                </div>
                <div style="margin-top: 5%;" class=" col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-xs-offset-3 col-sm-offset-0">
                    <div class="box">
                        <div class="address-box">
                            <h3>İletişim Bilgileri</h3>
                            <address>
                        <p><i class="fa fa-home" aria-hidden="true"></i>{!! $iletisim->adres !!}</p>
                        <ul>
                           <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a style="color: #fff;" href="mailto:{!! $iletisim->email !!}">E-Mail: bilgi@yorukturkmenbirligi.org</a></li>
                        </ul>
                     </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
 
</div>


<!--JQUERY--> 
<script src="{{asset("js/jquery.js")}}"></script> 
<!--BOOTSTRAP JS--> 
<script src="{{asset("js/bootstrap.min.js")}}"></script> 
<!--OWL CAROUSEL JS--> 
<script src="{{asset("js/owl.carousel.min.js")}}"></script> 
<!---Modernizr Script.js--> 
<script src="{{asset("js/modernizr.custom.js")}}"></script> 

<!--PROGRESS BAR JS--> 
<script src="{{asset("js/progress.js")}}"></script> 
<!--Running Counter--> 
<script src="{{asset("js/waypoint.js")}}"></script> 
<script src="{{asset("js/jquery.counterup.min.js")}}"></script> 
<!--SELECT JS--> 
<script src="{{asset("js/jquery.noconflict.js")}}"></script> 
<script src="{{asset("js/theme-scripts.js")}}"></script> 
<!--PRETYPHOTO JS--> 
<script src="{{asset("js/jquery.prettyPhoto.js")}}"></script> 
<!--CUSTOM JS--> 
<script src="{{asset("js/custom.js")}}"></script>

<script src="{{asset("js/jquery.plugin.js")}}"></script> 
<script src="{{asset("js/jquery.countdown.js")}}"></script> 
<!--BX SLIDER JS--> 
<script src="{{asset("js/jquery.bxslider.min.js")}}"></script> 

</body>
</html>
