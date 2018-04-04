<div id="s{{$id}}" class="media-block">
    <div class="dropdown pull-right">
        <a href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-ellipsis-v text-dark"></i>
        </a>
        <ul class="dropdown-menu action float-right">
            <li>
                <a href="#" onclick="Server.edit(event, {{$id}})" title="">
                    <i class="fa fa-edit text-dark"></i>
                    Редактировать
                </a>
            </li>
            <li>
                <a href="#" onclick="Server.delete(event, {{$id}})" class="font-red" title="">
                    <i class="fa fa-trash-o text-dark"></i>
                    Удалить навсегда
                </a>
            </li>
        </ul>
    </div>

    <div class="media-heading name">
        {{$name}}
    </div>

    <div class="media-body">
            <div>Хост: <span class="text-gray">{{$host}}</span></div>
            <div>Порт: <span class="text-gray">{{$port}}</span></div>
            <div>Пароль: <span class="pointer text-gray" data-password="{{$password}}">•••••••••</span></div>
    </div>
</div>