<div id="u{{$id}}" class="user widget-shadow col-md-4 col-sm-6 media-block">
    <div class="dropdown pull-right">
        <a href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-ellipsis-v text-dark"></i>
        </a>
        <ul class="dropdown-menu action float-right">
            <li><a href="#" onclick="User.edit(event, {{$id}})" class="font-red" title="">
                    <i class="fa fa-edit text-dark"></i>
                    Редактировать
            </a></li>
            <li><a href="#" onclick="User.delete(event, {{$id}})" class="font-red" title="">
                    <i class="fa fa-trash-o text-dark"></i>
                    Удалить навсегда
            </a></li>
        </ul>
    </div>

    <div class="media-heading">
        {{ucfirst($username)}}
    </div>

    <div class="media-users">
        <div>Права: <span class="text-gray">{{$role}}</span></div>
        <div>Дата регистрации: <span class="text-gray">{{$created_at}}</span></div>
    </div>
</div>