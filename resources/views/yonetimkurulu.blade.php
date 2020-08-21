@extends('master')
@section('email', $iletisim->email)
@section('adres', $iletisim->adres)
@section('title', 'Yönetim Kurulu')
@section('content')
<style>
.ayar{
  padding: 0 70px 0 70px;
  height: 500px !important;
  margin-bottom: 50px;
}
.ayar .thumbnail{
  
  height: 500px !important;
  -webkit-box-shadow: 0px 0px 29px -8px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 29px -8px rgba(0,0,0,0.75);
box-shadow: 0px 0px 29px -8px rgba(0,0,0,0.75);
border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
border: 0px solid #000000;}
.btn{
	position: absolute;
	bottom: 11px;
}
.img-responsive{
	-webkit-box-shadow: 0px 0px 29px -8px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 0px 29px -8px rgba(0,0,0,0.75);
	box-shadow: 0px 0px 29px -8px rgba(0,0,0,0.75);
	margin-top: 30px; 
	border-radius: 10%
}
</style>
  <div id="main"> 
    <section class="about-section">
      <div class="container">
        @foreach ($veriler as $veri)
        <div class="modal fade" id="{!!$veri->id!!}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <button style="margin: 20px; position:absolute; right: 0;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <img class="img-responsive center-block" src="/ykfoto/{!!$veri->id!!}" >
                  <div class="caption">
                    <h3 style="text-align:center; margin-top: 20px;">{!! $veri->yk_ad_soyad !!}</h3>
                    <div style="padding: 0 30px 30px 30px;">
                    <p style="text-align: justify;">{!! $veri->yk_ozgecmis !!}</p>                    	
                    </div>
                  </div>
              </div>
            </div>
          </div>
        @endforeach
          
          <div class="row">
            @foreach ($veriler as $veri)
            <div class="col-sm-6 col-md-4 ayar">
                <div class="thumbnail">
                  <img style="border-radius: 5%" src="/ykfoto/{!!$veri->id!!}" >
                  <div class="caption">
                    <h3 style="text-align:center;">{!! $veri->yk_ad_soyad !!}</h3>
                    <p>{!! str_limit(strip_tags($veri->yk_ozgecmis), 150) !!}</p>
                    @if(strlen($veri->yk_ozgecmis) > 150 )
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{!!$veri->id!!}">Devamı...</button>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
            
          </div>
      </div>

    </section>
  </div>
  @endsection