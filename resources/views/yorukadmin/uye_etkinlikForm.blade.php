@extends('yorukadmin.master')
@push('head')
@endpush
@section('content')
    <div class="main-panel">
    	        <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box horizontal-form">
                            <h5 class="pvr-header">
                                <div class="pvr-box-controls">
                                    <i class="material-icons" data-box="refresh" data-effect="win8_linear">refresh</i>
                                    <a href="/yorukadmin/uye_etkinlik/uye_etkinlik"><i class="material-icons">library_add</i></a> 
                                </div>
                                {{ @$uye_etkinlik ? 'Üye Duyurusu Düzenle' : 'Üye Duyurusu Ekle' }}
                            </h5>
                            <div class="">
                                <form method="post" action="{{ @$uye_etkinlik ? route('uye_etkinlik.guncelle', $uye_etkinlik->id) : route('uye_etkinlik.form.post') }}" enctype="multipart/form-data">
                                    @csrf
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                                @if (@$status == 'ok')
                                    <div class="alert alert-success">
                                        İşleminiz gerçekleştirildi.
                                    </div>
                                @endif
                                    <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Başlık </label>
                                                    <input value="{{ @$uye_etkinlik->baslik }}" name="baslik" class="form-control" placeholder="Başlık Giriniz"
                                                           required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label> Yazı </label>
                                                    <textarea id="editor" name="yazi">{{ @$uye_etkinlik->yazi }}</textarea>
                                                </div>
                                            </div>
                                        
                                            <div class="col-sm-12">
                                            <div class="form-group">
                                   <label> Görsel Ekleyin </label>
                                    <input name="gorsel" type="file" class="form-control-file">
                                </div>
                                </div>
                                <div class="col-sm-12">
                                            <div class="form-group">
                                   <label> Galeri Ekleyin </label>
                                    <input name="foto[]" type="file" enctype="multipart/form-data" class="form-control-file" multiple>
                                </div>
                                </div>
                                        </div>
                                <div style="margin-top: 25px; " class="form-group">
                                    <button type="submit" class="btn btn-primary">Gönder</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
@push('footer')
<script src="{{asset("adminassets/plugins/ckeditor/ckeditor.js")}}"></script>
<script src="{{asset("adminassets/js/pvr_lite_editor.js")}}"></script>
@endpush
