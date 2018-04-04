@extends('admin.base')

@section('title', 'Товары')

@section('content')
    <!-- Start content -->
    <div id="page-wrapper">
        <div class="main-page">
            <h3 class="title1">Товары
                <a class="btn btn-primary pull-right" style="margin-right: 2%;" onclick="Goods.new(event);">Добавить</a>
            </h3>

            <div class="elements row">
                @forelse($goods as $k => $product)
                        @include('admin.goods.product', $product)
                    @empty
                        @include('errors.empty')
                 @endforelse
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    {{--<a href="#add" onclick="Goods.new(event, $(this).attr('href'));"--}}
    {{--class="btn btn-default btn-md waves-effect waves-light m-b-30">--}}
    {{--Добавить--}}

    <div class="modal" role="dialog" style="position: relative;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title pull-left">Добавление товара</h4>
                </div>
                <div class="modal-body">
                    <form id="new_product" action="/admin/goods/create" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Название</label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Название товара" reqiored>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="control-label">Цена</label>
                                    <input name="price" id="price" type="number" class="form-control" placeholder="Цена товара" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="count" class="control-label">Количество (шт.)</label>
                                    <input name="count" id="count" type="number" class="form-control" placeholder="Количество" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="priority" class="control-label">Приоритет</label>
                                    <input name="priority" id="priority" type="number" class="form-control" placeholder="от 1 до 999" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="purchase" class="control-label">Доплата</label>
                                    <select name="purchase" id="purchase" class="form-control" required>
                                        <option value="1">Да</option>
                                        <option value="0">Нет</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="server" class="control-label">Сервер</label>
                                    <select name="server_id" id="server" class="form-control" required>
                                        <option value="0" disabled selected>Не выбран</option>
                                        @foreach($servers as $server)
                                            <option value="{{$server['id']}}">{{$server['name']}}</option>
                                        @endforeach; }}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category" class="control-label">Категория</label>
                                    <select name="categories_id" id="category" class="form-control" required>
                                        <option value="0" disabled selected>Не выбрана</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach;
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cmd">Команды:</label>
                                    <textarea class="form-control" wrap="soft" name="commands" rows="5"
                                              id="cmd" placeholder="Введите каждую новую команду с новой строки" required></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" onclick="Goods.onCreate()" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection