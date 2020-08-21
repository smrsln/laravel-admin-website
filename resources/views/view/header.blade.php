@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('header')
<header id="header"> 
    <!--TOPBAR SECTION START-->
    <section class="topbar">
      <div class="container">
        <div class="left-box">
          <ul>
            <li> <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>E-Mail: <a href="mailto:"></a></span> </li>
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
                    <li><a href="/egitim-istegi.php">Üyelik Başvurusu</a></li>
                    <li><a href="/gonulluluk.php">Proje Başvurusu</a></li>
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
@endsection
