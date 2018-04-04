@forelse($payments as $p)
    <tr>
        <th scope="row">{{$p['id']}}</th>
        <td>{{$p['username']}}</td>
        <td>{{$p['goods']}}</td>
        <td>{{$p['server'] ?: 'Все'}}</td>
        @switch($p['status'])
            @case(0)
                <td><span class="label label-warning strong">Не оплачен</span></td>
            @break

            @case(1)
                <td><span class="label label-success strong">Проведен</span></td>
            @break

            @case(2)
            <td><span class="label label-warning strong">Ошибка</span></td>
            @break

            @case(3)
            <td><span class="label label-error strong">Ошибка</span></td>
            @break
        @endswitch
        <td>{{$p['sum']}} руб.</td>
        <td>№{{$p['pay_id'] ?: 0000001}}</td>
        <td>{{$p['created_at']}}</td>
    </tr>
    @empty
    <tr>
        <td colspan="8" class="text-center">По данному запросу платежей не найдено. Или их вообще нет.</td>
    </tr>
@endforelse
