@extends('yorukadmin.master')
@section('content')
    <div class="main-panel">
    	        <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box horizontal-form">
                            <h5 class="pvr-header">
                                {{ @$logolar->bandbaslik }}
                            </h5>
                            <div class="">
                                <form method="post" enctype="multipart/form-data" action="{{@$logolar ? route('logolar.guncelle', $logolar->id) : route('logolar.guncelle') }}" >
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
                                   <label> Logo Ekle/Değiştir </label>
                                   @if (@$logolar->logo != '')
                                    <div class="alert alert-success col-sm-4">
                                        <img style="max-width: 180px;" src="{{ asset("/logo/$logolar->id")}}" />
                                    </div>
                                @endif
                                    <input name="logo" type="file" enctype="multipart/form-data" class="form-control-file">
                                </div>
                                </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                   <label> Footer Logo Ekle/Değiştir </label>
                                   @if (@$logolar->footerlogo != '')
                                    <div class="alert alert-success col-sm-4">
                                        <img style="max-width: 180px;" src="{{ asset("/footerlogo/$logolar->id")}}" />
                                    </div>
                                @endif
                                    <input name="footerlogo" type="file" enctype="multipart/form-data" class="form-control-file">
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
