@extends('yorukadmin.master')
@section('content')
    <div class="main-panel">
    	        <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box horizontal-form">
                            <h5 class="pvr-header">
                                {{ @$misyon->bandbaslik }}
                            </h5>
                            <div class="">
                                <form method="post" enctype="multipart/form-data" action="{{@$misyon ? route('misyon.guncelle', $misyon->id) : route('misyon.guncelle') }}" >
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
                                               <label> Yazı </label>
                                                <textarea id="editor" name="yazi">{{ @$misyon->yazi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                   <label> Görsel Ekle/Değiştir </label>
                                   @if (@$misyon->misyonfoto != '')
                                    <div class="alert alert-success col-sm-4">
                                        <img style="max-width: 180px;" src="{{ asset("/misyonfoto/$misyon->id")}}" />
                                    </div>
                                @endif
                                    <input name="misyonfoto" type="file" enctype="multipart/form-data" class="form-control-file">
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
