@extends('yorukadmin.master')
@section('content')
    <div class="main-panel">

        <!--Begin Content-->
        <div class="content bg-gray">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pvr-wrapper">
                        <div class="pvr-box">
                            <h5 class="pvr-header">
                                {!! $bandbaslik !!}
                                
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-separate table-extended">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                        </th>
                                @foreach($listebasliklar as $key => $item)
                                        <th>{!! $item['title'] !!}</th>
                                @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                @foreach($veriler as $key => $veri)
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox">
                                                    <span class="form-check-sign"></span>

                                                </label>
                                            </div>
                                        </td>
                                    @foreach($listebasliklar as $key => $item)
                                        <td>
                                            @if ($item['type'] == 'image')
                                                @if($bandbaslik == 'Tüm Etkinlikler')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("/etkinlik/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm Üyelerimizin Duyuruları')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("uye_etkinlik/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm STK\'lar')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("stklogo/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm Yönetim Kurulu Üyeleri')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("ykfoto/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm Delikanlılar Kurulu Üyeleri')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("delikanlifoto/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm Aksakallılar Kurulu Üyeleri')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("aksakallifoto/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm Bacıbeyler Kurulu Üyeleri')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("bacifoto/$veri->id")}}" />
                                            @elseif ($bandbaslik == 'Tüm Slider İçerikleri')
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("sliderfoto/$veri->id")}}" />
                                                @else
                                            <img style="width: 32px; height: 32px;" alt="..." src="{{ asset("resim/$veri->id")}}" />
                                                @endif
                                            @elseif ($item['type'] == 'string')
                                            {!! str_limit( strip_tags($veri->{$key}), 50 ) !!}
                                            @endif
                                        </td>
                                    @endforeach
                                        <td class="text-center">
                                            <a href="{{ route($name.'.sil', $veri->id) }}">
                                                <i title="Sil" class="material-icons align-middle">delete</i>
                                            </a>
                                            <a href="{{ route($name.'.form', $veri->id) }}">
                                                <i title="Düzenle" class="material-icons align-middle">edit</i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $veriler->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Content-->

        <!--Begin Footer-->

        <!--End Footer-->
    </div>@endsection