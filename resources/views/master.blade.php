<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yörük Türkmen Birliği Derneği - @yield('title')</title>
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
<!--WRAPPER START-->
<div id="wrapper"> 
  <!--HEADER START-->
  <header id="header"> 
      <!--TOPBAR SECTION START-->
      <section class="topbar">
        <div class="container">
          <div class="left-box">
            <ul>
              <li> <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>E-Mail: <a href="mailto:@yield('email')">@yield('email')</a></span> </li>
            </ul>
          </div>
          <div class="right-box">
            <div class="topbar-social">
              <ul>
                <!--<li><a href="https://www.instagram.com/yorukturkmenbirligi" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.twitter.com/yorukturkmenbirligi" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
                <li><a href="https://www.facebook.com/Yörük-Türkmen-Birliği-620622124748120/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
               <!-- <li><a href="https://www.youtube.com/channel/yorukturkmenbirligi" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li> -->
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
  
  
  <!--HEADER END--> 
  
  <!--INNER BANNER START-->

    <div class="container">
      <h1>@yield('title')</h1>
      <ol class="breadcrumb">
        <li><a href="/index.php">Anasayfa</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </div>

  <!--INNER BANNER END-->
@yield('content')

  
<footer id="footer">
    <section class="footer-section-1">
        <div class="container">
            <div class="row">
                <div  style="margin-bottom: 5%; height: 100px;" class=" col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                        <p><i class="fa fa-home" aria-hidden="true"></i>@yield('adres')</p>
                        <ul>
                           <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a style="color: #fff;" href="mailto:@yield('email')">E-Mail: @yield('email')</a></li>
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
<!--WRAPPER END--> 

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
@stack('footer')
</body>
</html>
