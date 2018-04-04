@extends('admin.base')

@section('title', 'Сервера')

@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="row">
                <h3 class="col-md-offset-2 title1">Сервера
                    <a class="btn btn-primary pull-right" style="margin-right: 20%;" onclick="Server.new(event);">Добавить</a>
                </h3>

                <div class="col-md-offset-2 col-md-8 col-sm-12 p-0">
                    @if(sizeof($servers))
                        <div id="server" class="widget-shadow">
                            @foreach($servers as $server)
                                @include('admin.servers.server', $server)
                            @endforeach
                        </div>
                    @else
                        @include('errors.empty')
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal" role="dialog" style="position: relative;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title pull-left">Добавление сервера</h4>
                </div>
                <div class="modal-body">
                    <form id="new_server" action="/admin/servers/create" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Название</label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Введите название" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="host" class="control-label">Хост</label>
                                    <input name="host" id="host" type="text" class="form-control" placeholder="Введите хост" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="port" class="control-label">Порт</label>
                                    <input name="port" id="port" type="number" class="form-control" placeholder="Введите порт" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="control-label">Пароль</label>
                                    <input name="password" id="password" type="text" class="form-control" placeholder="Введите пароль" value="{{$password}}" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" onclick="Server.onCreate()" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection


@push('scripts')
    <script type="text/javascript">
        $('[data-password]').on('click', function(e) {
            e.preventDefault();
            if ($(this).hasClass('view-pass')) {
                $(this).text('•••••••••').removeClass('view-pass');
            } else {
                $(this).text($(this).data('password')).addClass('view-pass');
            }
        });
    </script>
@endpush