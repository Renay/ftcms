@if (sizeof($servers))
    <div class="pull-right">
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="true">
                <p><i class="fa fa-ellipsis-v"></i></p>
            </a>
            <ul class="dropdown-menu action">
                @foreach($servers as $server)
                    <li>
                        <a href="#" class="changeServer font-red" data-name="{{$server['name']}}" data-id="{{$server['id']}}" title="">
                            {{$server['name']}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="pull-right">
        <div class="dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="true">
                <p><i class="fa fa-ellipsis-v"></i></p>
            </a>
            <ul class="dropdown-menu action">
                <li>
                    <a href="#" class="font-red" title="">
                        Серверов нет
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endif