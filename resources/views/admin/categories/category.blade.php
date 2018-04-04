<tr id="c{{$id}}">
    <td>{{$id}}</td>
    <td class="name">{{$name}}</td>
    <td>{{$priority}}</td>
    <td>{{$server}}</td>
    <td>
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="true">
                <p><i class="fa fa-ellipsis-v"></i></p>
            </a>
            <ul class="dropdown-menu action">
                <li>
                    <a href="#" class="font-red" onclick="Category.edit(event, {{$id}});" title="">
                        <i class="fa fa-pencil mail-icon"></i>
                        Редактировать
                    </a>
                </li>
                <li>
                    <a href="#" class="font-red" onclick="Category.onDelete(event, {{$id}})">
                        <i class="fa fa-trash mail-icon"></i>
                        Удалить
                    </a>
                </li>
            </ul>
        </div>
    </td>
</tr>
