@extends('admin.base')

@section('title', 'Консоль')

@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row">

                @if ($user['role'] == 'admin')

                    <h3 class="col-xs-12 col-sm-offset-1 col-sm-10 title1">Пользователи онлайн</h3>

                    <div class="col-sm-offset-1 col-sm-10 col-xs-12" >
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @foreach($users as $u)
                                    <div class="col-md-4">
                                        <span class="label label-success">
                                            * {{ $u['username'] }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <h3 class="col-xs-12 col-sm-offset-1 col-sm-10 title1">Логи команд</h3>

                    <div class="col-sm-offset-1 col-sm-10 col-xs-12" >
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @foreach ($console_log as $cl)
                                    <div class="row">
                                        <div class="col-md-1">{{$cl['id']}}</div>
                                        <div class="col-md-2">{{$cl['username']}}</div>
                                        <div class="col-md-2">
                                            <span class="label label-primary">{{$cl['server']}}</span>
                                        </div>
                                        <div class="col-md-6">{{$cl['cmd']}}</div>
                                        <div class="col-md-1">{{date('H:i', strtotime($cl['created_at']))}}</div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <h3 class="col-xs-12 col-sm-offset-1 col-sm-10 title1">Консоль</h3>

                <div class="col-sm-offset-1 col-sm-10 col-xs-12" >
                    <div id="consoleRow">
                        <div class="panel panel-primary" id="consoleContent">
                            <div class="panel-heading">
                                @include('admin.console.select')
                                <h3 class="panel-title">Напишите команду в строку и нажмите «ENTER»</h3>
                            </div>
                            <div class="panel-body" style="height: 250px;">
                                <ul class="list-group" id="groupConsole"></ul>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group" id="consoleCommand">
                                    <span class="input-group-addon hidden-xs">
                                      <input id="chkAutoScroll" type="checkbox" checked="true" autocomplete="off"  title=""/>
                                        <span class="fa fa-arrow-down"></span>
                                    </span>
                                    <div id="txtCommandResults"></div>
                                    <div class="form-group">
                                        @php $arr = array_shift($servers) @endphp
                                        <input type="text" id="server" value="{{$arr['id']}}"
                                               data-name="{{$arr['name']}}" title="" hidden />
                                        <input type="text" class="form-control" id="txtCommand"  title="" />
                                    </div>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="btnSend">
                                            <span class="fa fa-send"></span>
                                            <span class="hidden-xs"> Send</span>
                                        </button>
                                        <button type="button" class="btn btn-warning hidden-xs" id="btnClearLog">
                                            <span class="fa fa-eraser"></span>
                                            <span class="hidden-xs"> Clear</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('admin/js/console.js?v='.time())}}" type="text/javascript"></script>
@endpush
