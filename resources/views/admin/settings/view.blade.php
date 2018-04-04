@extends('admin.base')

@section('title', 'Настройки')

@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row">
                <h3 class="col-md-offset-2 title1">Настройки</h3>

                <div class="col-md-offset-2 col-md-8 col-sm-12 widget-shadow forms">
                    <form id="settings" action="/admin/settings/save" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Название сайта</label>
                                    <input name="name_site" id="name" type="text" class="form-control" value="{{$name_site}}" placeholder="Введите название сайта" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="merchant" class="control-label">Мерчант</label>
                                    <select name="merchant" id="merchant" class="form-control" required>
                                        <option value="null" disabled selected>Не выбрано</option>
                                        @foreach(array_keys((array) config('app.merchant')) as $key)
                                            <option {{$key === Setting::get('merchant') ?'selected':'' }} value="{{$key}}">{{ucfirst($key)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address" class="control-label">IP Адрес</label>
                                    <input name="ip_address" id="address" type="text" class="form-control" placeholder="Введите ip адрес (отображается на главной)" value="{{$ip_address}}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="form-control btn btn-default" onclick="Setting.save(this)">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection