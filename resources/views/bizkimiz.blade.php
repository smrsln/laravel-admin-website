@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', 'Biz Kimiz ?')
@section('content')
  <div id="main"> 
    <section class="about-section">
      <div class="container">
        <div class="welcome-row">
          <div class="row">
            <div class="col-md-4">
              <div class="welcome-frame-1"><img src="//via.placeholder.com/340x380" alt="img"></div>
            </div>
            <div class="col-md-8">
              <div class="text-box">
                <div class="heading-left">
                  <h2>Biz <span>Kimiz ?</span></h2>
                </div>
                <div class="holder">
                  <p> <strong>Yörük Türkmen Birliği Derneği;</strong><br>
                  yazı yazı yazı yazı yazı yazı </p>

                  <ul class="list">
                    <li>MADDE</li>
                    <li>MADDE</li>
                    <li>MADDE</li>
                    <li>MADDE</li>
                    <li>MADDE</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="why-choose">
          <div class="heading-left">
            <h2>Misyon - <span>vizyon</span></h2>
          </div>
          <div class="welcome-tab">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="frame"><img src="//via.placeholder.com/340x430" alt="img"></div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="tab-box">
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-1" role="tab" data-toggle="tab">Misyon</a></li>
                    <li role="presentation"><a href="#tab-2" role="tab" data-toggle="tab">Vizyon</a></li>
                    <li role="presentation"><a href="#tab-3" role="tab" data-toggle="tab">Gelecek Hedeflerimiz</a></li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab-1">
                      <blockquote> Yörük Türkmen Birliği Derneği Misyon </blockquote>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-2">
                      <blockquote> Yörük Türkmen Birliği Derneği Vizyon </blockquote>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-3">
                      <blockquote> Yörük Türkmen Birliği Derneği olarak gelecek hedeflerimiz şunlardır:</blockquote>
                      <ul class="list">
                      <li>MADDE</li>
                      <li>MADDE</li>
                      <li>MADDE</li>
                      <li>MADDE</li>
                      <li>MADDE</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
  @endsection