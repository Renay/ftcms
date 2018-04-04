@extends('admin.base')

@section('title', 'Категории')

@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="grids">
                <div class="col-md-offset-1">
                    <h3 class="title1">Категории
                        <a class="btn btn-primary pull-right" style="margin-right: 17%;" onclick="Category.new(event);">Добавить</a>
                    </h3>

                    <!--button class="btn btn-primary " onclick="Goods.new(event);">Добавить</button-->

                    <div class="col-md-10 col-sm-12 widget-shadow">
                        <div class="panel_2">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td class="head">#</td>
                                    <td class="head">Название</td>
                                    <td class="head">Приоритет</td>
                                    <td class="head">Сервер</td>
                                    <td class="head"></td>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        @include('admin.categories.category', $category)
                                    @empty
                                        <td colspan="4" class="text-center">В базе, пока-что нет категорий. Добавьте их!</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                    <h4 class="modal-title pull-left">Добавление категории</h4>
                </div>
                <div class="modal-body">
                    <form id="new_category" action="/admin/categories/create" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Название</label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Название категории" reqiored>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="priority" class="control-label">Приоритет</label>
                                    <input name="priority" id="priority" type="number" class="form-control" placeholder="Приоритет категории" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" onclick="Category.onCreate()" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
