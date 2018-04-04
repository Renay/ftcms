@extends('admin.base')

@section('title', 'Пользователи')

@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="grids">
                <h3 class="title1">Пользователи
                    <a class="btn btn-primary pull-right" style="margin-right: 2%;" onclick="User.new(event);">Добавить</a>
                </h3>
                <div id="users" class="padding-0">
                    @forelse($users as $user)
                        @include('admin.users.user', $user)
                    @empty
                        <h1>В базе нет пользователей.</h1>
                    @endforelse
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
                    <h4 class="modal-title pull-left">Добавление пользователя</h4>
                </div>
                <div class="modal-body">
                    <form id="new_user" action="/admin/users/create" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Имя пользователя</label>
                                    <input name="username" id="name" type="text" class="form-control" placeholder="Введите имя" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="roles" class="control-label">Права</label>
                                    <select name="roles" id="roles" class="form-control" required>
                                        <option value="0">Не выбраны</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role}}">{{$role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="passwd" class="control-label">Пароль</label>
                                    <input name="password" id="passwd" type="password" class="form-control" placeholder="Введите пароль" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" onclick="User.onCreate()" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection