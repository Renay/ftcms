@extends('admin.base')

@section('title', 'Merchant')

@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <h3 class="col-md-offset-2 title1">Merchant</h3>

            <div class="col-md-8 col-md-offset-2 widget-shadow tabs">
                <ul id="myMerchant" class="nav nav-tabs" role="tablist">
                    @foreach($merchants = array_keys((array) config('app.merchant')) as $key => $pay)
                        <li role="presentation" class="{{$key == 0 ? 'active' : '' }}">
                            <a href="#{{strtolower($pay)}}" id="{{strtolower($pay)}}-tab" role="tab"
                                 data-toggle="tab" aria-controls="{{strtolower($pay)}}" aria-expanded="true">
                                {{ucfirst($pay)}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content scrollbar1" tabindex="5001">
                    @foreach($merchants as $k => $item)
                        <div role="tabpanel" class="tab-pane fade forms in {{$k == 0 ? 'active' : '' }}" id="{{strtolower($item)}}" aria-labelledby="{{strtolower($item)}}-tab">
                            @include('admin.merchant.'. strtolower($item), unserialize($merchlist[$item]) ?: [])
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection