@extends('yorukadmin.master')
@push('head')
@endpush
@section('content')
    <div class="main-panel">
    	        <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box horizontal-form">
                            <h5 class="pvr-header">
                                {{ @$bacibeyler ? 'Bacıbeyler Kurulu Üyesi Düzenle' : 'Bacıbeyler Kurulu Üyesi Ekle' }}
                            </h5>
                            <div class="">
                                <form method="post" action="{{ @$bacibeyler ? route('bacibeyler.guncelle', $bacibeyler->id) : route('bacibeyler.form.post') }}" enctype="multipart/form-data">
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
                                                    <label> Ad - Soyad </label>
                                                    <input value="{{ @$bacibeyler->baci_ad_soyad }}" name="baci_ad_soyad" class="form-control" placeholder="Bacıbeyler Kurulu Üyesi Ad-Soyad Giriniz"
                                                           required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label> Özgeçmiş </label>
                                                    <textarea id="editor" name="baci_ozgecmis">{{ @$bacibeyler->baci_ozgecmis }}</textarea>
                                                </div>
                                            </div>
                                        
                                            <div class="col-sm-12">
                                            <div class="form-group">
                                   <label> Görsel Ekle/Değiştir </label>
                                   @if (@$bacibeyler->bacifoto != '')
                                    <div class="alert alert-success col-sm-4">
                                        <img style="max-width: 180px;" src="{{ asset("/bacifoto/$bacibeyler->id")}}" />
                                    </div>
                                @endif
                                    <input name="bacifoto"  type="file" class="form-control-file">
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
