<div id="g{{$product['id']}}">
    <div class="col-md-4 profile widget-shadow">
        <h4 class="title3">Товар {{$name}}
            <div class="pull-right">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-expanded="true">
                        <p><i class="fa fa-ellipsis-v"></i></p>
                    </a>
                    <ul class="dropdown-menu action">
                        <li>
                            <a href="#" class="font-red" onclick="Goods.edit(event, {{$id}});" title="">
                                <i class="fa fa-pencil mail-icon"></i>
                                Редактировать
                            </a>
                        </li>
                        <li>
                            <a href="#" class="font-red" title="" onclick="Goods.onDelete(event, {{$id}})">
                                <i class="fa fa-trash mail-icon"></i>
                                Удалить
                            </a>
                        </li>
                        <li>
                            <a href="#" class="font-red" title="" onclick="Goods.desc(event, {{$id}});">
                                <i class="fa fa-vcard mail-icon"></i>
                                Описание
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </h4>

        <div class="profile-text">
            <div class="profile-row">
                <div class="profile-left">
                    <i class="fa fa-briefcase profile-icon"></i>
                </div>
                <div class="profile-right">
                    <h4>Категория</h4>
                    <p>{{$category}}</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="profile-row row-middle">
                <div class="profile-left m-t-15">
                    <i class="fa fa-server profile-icon"></i>
                </div>
                <div class="profile-right">
                    <h4>Сервер</h4>
                    <p>{{$server ?: 'Не выбран'}}</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="profile-row">
                <div class="profile-left">
                    <i class="fa fa-dollar profile-icon"></i>
                </div>
                <div class="profile-right">
                    <h4>Цена</h4>
                    <p>{{$price}} руб.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="profile-btm">
            <ul>
                <li>
                    <h4>{{$count >= 0 ?: '∞'}}</h4>
                    <h5>Количество</h5>
                </li>
                <li>
                    <h4>{{ $purchase > 0 ? '+' : '-'}}</h4>
                    <h5>Доплата</h5>
                </li>
                <li>
                    <h4>{{count(explode('<br />', $commands))}}</h4>
                    <h5>Команды (шт.)</h5>
                </li>
            </ul>
        </div>
    </div>
</div>