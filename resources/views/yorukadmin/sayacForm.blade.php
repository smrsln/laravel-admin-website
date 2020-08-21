@extends('yorukadmin.master')
@section('content')
    <div class="main-panel">
    	        <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box horizontal-form">
                            <h5 class="pvr-header">
                                {{ @$sayac->bandbaslik }}
                            </h5>
                            <div class="">
                                <form method="post" action="{{@$sayac ? route('sayac.guncelle', $sayac->id) : route('sayac.guncelle') }}" >
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
                                                    <label> Üye Dernek Sayısı </label>
                                                    <input value="{{ @$sayac->uyedernek }}" name="uyedernek" class="form-control" placeholder="Değer Giriniz"
                                                           required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Üye Federasyon Sayısı </label>
                                                    <input value="{{ @$sayac->uyefederasyon }}" name="uyefederasyon" class="form-control" placeholder="Değer Giriniz"
                                                           required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Üye Konfederasyon Sayısı </label>
                                                    <input value="{{ @$sayac->uyekonfederasyon }}" name="uyekonfederasyon" class="form-control" placeholder="Değer Giriniz"
                                                           required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Ziyaretçi Sayısı </label>
                                                    <input value="{{ @$sayac->ziyaretci }}" name="ziyaretci" class="form-control" placeholder="Değer Giriniz"
                                                           required="required" type="text">
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
<script src="{{asset("adminassets/js/pvr_lite_editor.js")}}"></script>
@endpush
