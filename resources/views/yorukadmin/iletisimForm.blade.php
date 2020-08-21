@extends('yorukadmin.master')
@section('content')
    <div class="main-panel">
    	        <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box horizontal-form">
                            <h5 class="pvr-header">
                                {{ @$iletisim->bandbaslik }}
                            </h5>
                            <div class="">
                                <form method="post" action="{{@$iletisim ? route('iletisim.guncelle', $iletisim->id) : route('iletisim.guncelle') }}" >
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
                                                    <label> E-mail adresi </label>
                                                    <input value="{{ @$iletisim->email }}" name="email" class="form-control" placeholder="Email Giriniz"
                                                           required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Adres </label>
                                                    <input value="{{ @$iletisim->adres }}" name="adres" class="form-control" placeholder="Adres Giriniz"
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
